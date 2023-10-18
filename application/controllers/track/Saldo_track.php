<?php
/** 
* @property session $session
* @property db $db
* @property saldo_model $saldo_model
* @property input $input
*/
class saldo_track extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != 'track' && $this->session->userdata('role') != 'admin' && $this->session->userdata('role') != 'manager') {
            $this->session->set_flashdata('pesan', '<div class="fade show" style="color:red" role="alert">
  Anda Belum Login!
</div><br>');
            redirect('auth/logout');
        }
    }

    public function index()
    {
        $data['saldo'] = $this->saldo_model->tampilkan();
        $data['kode']= $this->db->query("SELECT DISTINCT detailsal.kode,nama FROM detailsal inner join master on master.kode=detailsal.kode order by kode");
        $data['batch']= $this->db->query("SELECT DISTINCT nobatch FROM detailsal");
        $data['pallet']= $this->db->query("SELECT DISTINCT nopallet FROM detailsal order by nopallet");
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("track/saldo", $data);
        $this->load->view("_partials/footer");
    }

    public function filter(){
        $kode=$this->input->post('kode');
        $batch=$this->input->post('batch');
        $pallet=$this->input->post('pallet');
        if($kode=="unset"){
            $kode=null;
        }
        if($batch=="unset"){
            $batch=null;
        }
        if($pallet=="unset"){
            $pallet=null;
        }
        //diisi semua
        if($kode!=null and $batch!=null and $pallet!=null){
            $data = $this->db->join('master','master.kode=detailsal.kode')->where('detailsal.kode',$kode)->where('detailsal.nobatch',$batch)->where('detailsal.nopallet',$pallet)->get('detailsal');
        }
        //diisi kode dan batch
        elseif($kode!=null and $batch!=null and $pallet==null){
            $data = $this->db->join('master','master.kode=detailsal.kode')->where('detailsal.kode',$kode)->where('detailsal.nobatch',$batch)->get('detailsal');
        }
        //diisi kode dan pallet
        elseif($kode!=null and $batch==null and $pallet!=null){
            $data = $this->db->join('master','master.kode=detailsal.kode')->where('detailsal.kode',$kode)->where('detailsal.nopallet',$pallet)->get('detailsal');
        }
        //diisi batch dan pallet
        elseif($kode==null and $batch!=null and $pallet!=null){
            $data = $this->db->join('master','master.kode=detailsal.kode')->where('detailsal.nobatch',$batch)->where('detailsal.nopallet',$pallet)->get('detailsal');
        }
        //diisi kode
        elseif($kode!=null and $batch==null and $pallet==null){
            $data = $this->db->join('master','master.kode=detailsal.kode')->where('detailsal.kode',$kode)->get('detailsal');
        }
        //diisi batch
        elseif($kode==null and $batch!=null and $pallet==null){
            $data = $this->db->join('master','master.kode=detailsal.kode')->where('detailsal.nobatch',$batch)->get('detailsal');
        }
        //diisi pallet
        elseif($kode==null and $batch==null and $pallet!=null){
            $data = $this->db->join('master','master.kode=detailsal.kode')->where('detailsal.nopallet',$pallet)->get('detailsal');
        }
        else{
            $data = $this->db->join('master', 'master.kode=detailsal.kode')->order_by('no','DESC')->get('detailsal');
        }

        $no=1;
        foreach($data->result() as $s){
            $sats1 = floor($s->qty / ($s->max1 * $s->max2));
            $sisa = $s->qty - ($sats1 * $s->max1 * $s->max2);
            $sats2 = floor($sisa / $s->max2);
            $sats3 = $sisa - $sats2 * $s->max2;

            // perhitungan expdate
            $batch = $s->nobatch;
            $tahun = strrev(substr(substr($batch, -6), 0, 2));
            $bulan = substr(substr($batch, -6), 2, 2);
            $gabung = $bulan . '/01/' . (2000 + $tahun);
            $tglprod = date("Y-m-d", strtotime($gabung));
            $bulan1 = $s->expdate;
            $tglexp = date("Y-m-d", strtotime('+' . $bulan1 . ' month', strtotime($tglprod)));

            $awal = date_create($tglexp);
            $akhir = date_create(); // waktu sekarang
            $diff = date_diff($akhir, $awal);
            $bln=$diff->y*12+$diff->m;
            $jarak = strtotime($tglexp)-strtotime(date("Y-m-d"));
            
            if ($diff->y == 0 && $diff->m <= 6 && $bln<=12) {
                $test[]=array(
                    "no"=>$no++,
                    "nobatch"=>"<p style='color:red'><b>".$s->nobatch."</b></p>",
                    "kode"=>"<p style='color:red'><b>".$s->kode."</b></p>",
                    "nama"=>"<p style='color:red'><b>".$s->nama."</b></p>",
                    "nopallet"=>"<p style='color:red'><b>".$s->nopallet."</b></p>",
                    "sat1"=>"<p style='color:red'><b>".$sats1.' '.$s->sat1."</b></p>",
                    "sat2"=>"<p style='color:red'><b>".$sats2.' '.$s->sat2."</b></p>",
                    "sat3"=>"<p style='color:red'><b>".$sats3.' '.$s->sat3."</b></p>",
                    "exp"=>$diff->y.' tahun '.$diff->m.' bulan ',
                    "ed"=>$bln,
                );
            }elseif ($diff->y == 0 && $diff->m <= 9 && $jarak >= 0 && $bln<=12) {
                    $test[] = array(
                        "no" => $no++,
                        "nobatch" => "<p style='color:darkorange'><b>" . $s->nobatch . "</b></p>",
                        "kode" => "<p style='color:darkorange'><b>" . $s->kode . "</b></p>",
                        "nama" => "<p style='color:darkorange'><b>" . $s->nama . "</b></p>",
                        "nopallet" => "<p style='color:darkorange'><b>" . $s->nopallet . "</b></p>",
                        "sat1" => "<p style='color:darkorange'><b>" . $sats1 . ' ' . $s->sat1 . "</b></p>",
                        "sat2" => "<p style='color:darkorange'><b>" . $sats2 . ' ' . $s->sat2 . "</b></p>",
                        "sat3" => "<p style='color:darkorange'><b>" . $sats3 . ' ' . $s->sat3 . "</b></p>",
                        "exp" => $diff->y . ' tahun ' . $diff->m . ' bulan ',
                        "ed" => $bln,
                    );
            }else{
                $test[]=array(
                    "no"=>$no++,
                    "nobatch"=>$s->nobatch,
                    "kode"=>$s->kode,
                    "nama"=>$s->nama,
                    "nopallet"=>$s->nopallet,
                    "sat1"=>$sats1.' '.$s->sat1,
                    "sat2"=>$sats2.' '.$s->sat2,
                    "sat3"=>$sats3.' '.$s->sat3,
                    "exp"=>$diff->y.' tahun '.$diff->m.' bulan ',
                    "ed"=>$bln,
                ); 
            }
        }
        $kosong="not found";
        if($data->num_rows()>0){
            echo json_encode($test);
        }else{
            echo json_encode($kosong);
        }
    }

    public function getbatch(){
        $kode=$this->input->post("kode");
        if($kode == "unset"){
            $data = $this->db->query("SELECT DISTINCT nobatch FROM detailsal")->result();
        }else{
            $data = $this->db->query("SELECT DISTINCT nobatch FROM detailsal where kode='$kode'")->result();
        }
        echo json_encode($data);
    }
    public function getpallet(){
        $kode=$this->input->post("kode");
        if($kode == "unset"){
            $data = $this->db->query("SELECT DISTINCT nopallet FROM detailsal")->result();
        }else{
            $data = $this->db->query("SELECT DISTINCT nopallet FROM detailsal where kode='$kode'")->result();
        }
        echo json_encode($data);
    }
    public function getkode(){
        $batch=$this->input->post("batch");
        if($batch == "unset"){
            $data = $this->db->query("SELECT DISTINCT detailsal.kode,master.nama FROM detailsal,master where detailsal.kode=master.kode order by kode")->result();
        }else{
            $data = $this->db->query("SELECT DISTINCT detailsal.kode,master.nama FROM detailsal,master where detailsal.kode=master.kode and nobatch='$batch' order by kode")->result();
        }
        echo json_encode($data);
    }
    public function getnopallet(){
        $batch=$this->input->post("batch");
        if($batch == "unset"){
            $data = $this->db->query("SELECT DISTINCT nopallet FROM detailsal")->result();
        }else{
            $data = $this->db->query("SELECT DISTINCT nopallet FROM detailsal where nobatch='$batch'")->result();
        }
        echo json_encode($data);
    }
    public function getpkode(){
        $pallet=$this->input->post("pallet");
        if($pallet == "unset"){
            $data = $this->db->query("SELECT DISTINCT detailsal.kode,master.nama FROM detailsal,master where detailsal.kode=master.kode order by kode")->result();
        }else{
            $data = $this->db->query("SELECT DISTINCT detailsal.kode,master.nama FROM detailsal,master where detailsal.kode=master.kode and nopallet='$pallet' order by kode")->result();
        }
        echo json_encode($data);
    }
    public function getnobatch(){
        $pallet=$this->input->post("pallet");
        if($pallet == "unset"){
            $data = $this->db->query("SELECT DISTINCT nobatch FROM detailsal")->result();
        }else{
            $data = $this->db->query("SELECT DISTINCT nobatch FROM detailsal where nopallet='$pallet'")->result();
        }
        echo json_encode($data);
    }

    public function saldo_exp(){
        $data['saldo'] = $this->saldo_model->tampilkan();
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("track/saldo_exp", $data);
        $this->load->view("_partials/footer");
    }
    public function saldo_mendekati_exp(){
        $data['saldo'] = $this->saldo_model->tampilkan();
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("track/saldo_mendekati_exp", $data);
        $this->load->view("_partials/footer");
    }
}