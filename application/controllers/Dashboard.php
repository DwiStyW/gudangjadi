<?php 
/**
* @property db $db
* @property db $saldo_model
*/
class Dashboard extends CI_Controller{
    public function index(){
        // $jumlah = $this->db->select("nopallet")->group_by("nopallet")->get("detailsal")->num_rows();
        $saldo = $this->saldo_model->tampilkan();
        $no=1;
        foreach($saldo as $s) {
            $sats1 = floor($s->qty / ($s->max1 * $s->max2));
            $sisa = $s->qty - ($sats1 * $s->max1 * $s->max2);
            $sats2 = floor($sisa / $s->max2);
            $sats3 = $sisa - $sats2 * $s->max2;

            // perhitungan expdate
            $string = $s->nobatch;
            $batch = preg_replace("/[^0-9]/","",$string);
            $tahun = strrev(substr(substr($batch, -6), 0, 2));
            $bulan = substr(substr($batch, -6), 2, 2);
            $gabung = $bulan . '/01/' . (2000 + $tahun);
            $tglprod = date("Y-m-d", strtotime($gabung));
            $bulan1 = $s->expdate;
            $tglexp = date("Y-m-d", strtotime('+' . $bulan1 . ' month', strtotime($tglprod)));

            $awal = date_create($tglexp);
            $akhir = date_create(); // waktu sekarang
            $diff = date_diff($akhir, $awal);
            $bln = $diff->y * 12 + $diff->m;
            $jarak = strtotime($tglexp) - strtotime(date("Y-m-d"));

            if ($tahun+2000<=date("Y") && $bulan<=12 && $jarak<=0) {
                $red[] = array(
                    "no" => $no++,
                    "nobatch" => "<p style='color:red'><b>" . $s->nobatch . "</b></p>",
                    "kode" => "<p style='color:red'><b>" . $s->kode . "</b></p>",
                    "nama" => "<p style='color:red'><b>" . $s->nama . "</b></p>",
                    "nopallet" => "<p style='color:red'><b>" . $s->nopallet . "</b></p>",
                    "sat1" => "<p style='color:red'><b>" . $sats1 . ' ' . $s->sat1 . "</b></p>",
                    "sat2" => "<p style='color:red'><b>" . $sats2 . ' ' . $s->sat2 . "</b></p>",
                    "sat3" => "<p style='color:red'><b>" . $sats3 . ' ' . $s->sat3 . "</b></p>",
                    "exp" => $diff->y . ' tahun ' . $diff->m . ' bulan ',
                    "ed" => $bln,
                );
            }
            if ($diff->y == 0 && $diff->m <= 9 && $bulan<=12 && $jarak>=0 && $tahun+2000<=date("Y")) {
                $yellow[] = array(
                    "no" => $no++,
                    "nobatch" => "<p style='color:red'><b>" . $s->nobatch . "</b></p>",
                    "kode" => "<p style='color:red'><b>" . $s->kode . "</b></p>",
                    "nama" => "<p style='color:red'><b>" . $s->nama . "</b></p>",
                    "nopallet" => "<p style='color:red'><b>" . $s->nopallet . "</b></p>",
                    "sat1" => "<p style='color:red'><b>" . $sats1 . ' ' . $s->sat1 . "</b></p>",
                    "sat2" => "<p style='color:red'><b>" . $sats2 . ' ' . $s->sat2 . "</b></p>",
                    "sat3" => "<p style='color:red'><b>" . $sats3 . ' ' . $s->sat3 . "</b></p>",
                    "exp" => $diff->y . ' tahun ' . $diff->m . ' bulan ',
                    "ed" => $bln,
                );
            }
            if ($bulan>12) {
                $bet[] = array(
                    "no" => $no++,
                    "nobatch" => "<p style='color:red'><b>" . $s->nobatch . "</b></p>",
                    "kode" => "<p style='color:red'><b>" . $s->kode . "</b></p>",
                    "nama" => "<p style='color:red'><b>" . $s->nama . "</b></p>",
                    "nopallet" => "<p style='color:red'><b>" . $s->nopallet . "</b></p>",
                    "sat1" => "<p style='color:red'><b>" . $sats1 . ' ' . $s->sat1 . "</b></p>",
                    "sat2" => "<p style='color:red'><b>" . $sats2 . ' ' . $s->sat2 . "</b></p>",
                    "sat3" => "<p style='color:red'><b>" . $sats3 . ' ' . $s->sat3 . "</b></p>",
                    "exp" => $diff->y . ' tahun ' . $diff->m . ' bulan ',
                    "ed" => $bln,
                );
            }
        }
        if(!isset($red)){
            $merah = 0;
        }else{
            $merah = count($red);
        }
        if(!isset($yellow)){
            $kuning = 0;
        }else{
            $kuning = count($yellow);
        }
        if(!isset($bet)){
            $unknown=0;
        }else{
            $unknown = count($bet);
        }
        $data['merah'] = $merah;
        $data['kuning'] = $kuning;
        $data['unknown'] = $unknown;
        $data['belumpallet']=$this->db->select("kode,sum(qty)")->from("detailsalqty")->where('ket',"IN")->group_by("kode")->get();
        $data['belumkeluar']=$this->db->select("kode,sum(qty)")->from("detailsalqty")->where('ket',"OUT")->group_by("kode")->get();
        $this->load->view("dashboard",$data);
    }

    public function refresh(){
        $this->db->query("UPDATE pallet SET status = 'kosong'");
        $this->db->query("UPDATE pallet SET qty = 0");
        $detailsal = $this->db->query("SELECT nopallet,sum(qty) as qty FROM `detailsal` GROUP BY nopallet");
        foreach($detailsal->result() as $detsal){
            $nopallet = $detsal->nopallet;
            $qty = $detsal->qty;
            $this->db->query('UPDATE pallet SET qty = "'.$qty.'" WHERE kdpallet = "'.$nopallet.'"');
            $this->db->query('UPDATE pallet SET status = "isi" WHERE kdpallet = "'.$nopallet.'"');
        }
        $terpakai = $this->db->select("nopallet")->group_by("nopallet")->get("detailsal")->num_rows();
        $pallet = $this->db->get("pallet")->num_rows();
        $takterpakai = abs($pallet - $terpakai);
        $data = array(
            "terpakai"=>$terpakai,
            "takterpakai"=>$takterpakai,
        );
        echo json_encode($data);
    }
}