<?php
/**
 * @property session $session
 * @property db $db
 * @property masuk_model $masuk_model
 * @property input $input
 */
class Masuk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != 'user' && $this->session->userdata('role') != 'admin' && $this->session->userdata('role') != 'manager') {
            $this->session->set_flashdata('pesan', '<div class="fade show" style="color:red" role="alert">
  Anda Belum Login!
</div><br>');
            redirect('auth/logout');
        }
    }
    public function index()
    {
        $data['masuk'] = $this->masuk_model->tampil_barang_masuk();
        $this->load->view("masuk/masuk",$data);
    }
    public function getmasuk()
    {
        $data = $this->masuk_model->tampil_barang_masuk();
        $no = 0;
        foreach($data as $d){
            $sats1  = floor($d->masuk / ($d->max1 * $d->max2));
            $sisa   = $d->masuk - ($sats1 * $d->max1 * $d->max2);
            $sats2  = floor($sisa / $d->max2);
            $sats3  = $sisa - $sats2 * $d->max2;
            $test[]=array(
                "id"=>$no=$no+1,
                "tglform"=>date("d-m-Y", strtotime($d->tanggalform)),
                "noform"=>$d->noform,
                "kode"=>$d->kode,
                "nama"=>$d->nama,
                "nobatch"=>$d->nobatch,
                "sats1"=>$sats1.' '.$d->sat1,
                "sats2"=>$sats2.' '.$d->sat2,
                "sats3"=>$sats3.' '.$d->sat3,
                "tanggal"=>$d->tanggal,
                "adm"=>$d->username,
                "suplai"=>$d->suplai,
                "cat"=>$d->cat,
                "aksi"=>'<a class="btn btn-sm btn-primary" href="'. base_url("masuk/edit_masuk/". $d->no).'" ><i class="fa fa-edit"></i> Edit</a><a onclick="hapus(`'.$d->no.'`,`'.$d->noform.'`,`'.$d->nobatch.'`,`'.$d->kode.'`,`'. $sats1.'`,`'. $sats2.'`,`'. $sats3.'`,`'. $d->sat1.'`,`'.$d->sat2.'`,`'.$d->sat3.'`)" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapus_modal"><i class="fa fa-trash"></i> Hapus</a>'
            );
        }
        echo json_encode($test);
    }

    // load view input barang masuk
    public function input_masuk()
    {
        $data['masuk'] = $this->masuk_model->riwayat_all();
        $data['master'] = $this->masuk_model->tampil_master();
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("masuk/inputmasuk", $data);
        $this->load->view("_partials/footer");
    }

    // tambah barang masuk
    public function barang_masuk()
    {
        error_reporting(0);
        $tglform = $this->input->post('tglform');
        $noform = $this->input->post('noform');
        $nobatch = $this->input->post('nobatch');
        $koder = $this->input->post('kode');
        $sat1 = $this->input->post('sat1');
        $sat2 = $this->input->post('sat2');
        $sat3 = $this->input->post('sat3');
        $tgl = $this->input->post('tgl');
        $cat = $this->input->post('cat');
        $adm = $this->input->post('adm');

        $tampil1 = $this->db->query("SELECT * FROM master WHERE kode='$koder'");
        foreach ($tampil1->result() as $data1) {
            $kode = $data1->kode;
        }

        //konvert 3 Satuan
        $sats1    = $sat1 * $data1->max1 * $data1->max2;
        $sats2    = $sat2 * $data1->max2;
        $jumlah = $sats1 + $sats2 + $sat3;

        $tampil = $this->db->query("SELECT * FROM master WHERE kode='$kode'");
        foreach ($tampil->result() as $data) {
            $hasil = $data->saldo + $jumlah;
        }

        // insert riwayat
        $data2 = array(
            'no' => '',
            'tglform' => $tglform,
            'kode' => $koder,
            'noform' => $noform,
            'nobatch'=> $nobatch,
            'masuk' => $jumlah,
            'keluar' => 0,
            'saldo' => $hasil,
            'ket' => 'Input',
            'tanggal' => $tgl,
            'adm' => $adm,
            'cat' => $cat
        );

        // insert masuk
        $data3 = array(
            'no' => '',
            'tglform' => $tglform,
            'noform' => $noform,
            'nobatch'=>$nobatch,
            'kode' => $koder,
            'jumlah' => $jumlah,
            'tanggal' => $tgl,
            'saldo' => $hasil,
            'adm' => $adm,
            'cat' => $cat
        );

        // update saldo
        $data4 = array(
            'saldo' => $hasil,
            'tglform' => $tglform,
            'tgl_update' => $tgl
        );
        $where1 = array(
            'kode' => $koder
        );

        //untuk detailsalqty
        $detsal = $this->db->where('kode',$kode)->where('ket','IN')->where('nobatch',$nobatch)->get('detailsalqty');
        foreach($detsal->result() as $det){
            $salqty[]=$det->qty;
        }
        $jumsalqty=0;
        for($i=0;$i<$detsal->num_rows();$i++)
        {
            $jumsalqty+=$salqty[$i];
        }
        $total = $jumlah+$jumsalqty;
        if($detsal->num_rows()>0){
            $data5 = array(
                'tglform' => $tglform,
                'kode'    => $koder,
                'noform'  => $noform,
                'nobatch' => $nobatch,
                'qty'     => $total,
                'ket'     => "IN"
            );
        }else{
            $data5 = array(
                'tglform' => $tglform,
                'kode'    => $koder,
                'nobatch' => $nobatch,
                'noform'  => $noform,
                'qty'     => $jumlah,
                'ket'     => "IN"
            );
        }
        $where2 = array(
            'kode' => $koder,
            'nobatch'=>$nobatch
        );

        $this->db->trans_start();
        $this->masuk_model->update($where1, $data4, "master");
        $this->masuk_model->tambah($data2, "riwayat");
        if($detsal->num_rows()>0){
            $this->masuk_model->update($where2,$data5,'detailsalqty');
        }else{
            $this->masuk_model->tambah($data5,'detailsalqty');
        }
        $this->db->trans_complete();

        if($this->db->trans_status()===FALSE){
            $this->session->set_flashdata('gagal', 'Input Barang Masuk Error!');
        }else{
            $this->session->set_flashdata('sukses', 'Input Barang Masuk Success!');
        }
        redirect("masuk/input_masuk");
    }

    public function edit_masuk($no)
    {
        $where = array('no' => $no);
        $data['riwayat'] = $this->masuk_model->get_where($where, 'riwayat')->result();
        $this->load->view('_partials/header');
        $this->load->view('_partials/menu');
        $this->load->view('masuk/editmasuk', $data);
        $this->load->view('_partials/footer');
    }

    public function update_masuk()
    {
        $no         = $this->input->post('no');
        $date       = $this->input->post('tgl');
        $kode       = $this->input->post('kode');
        $noform     = $this->input->post('noform');
        $nobatch    = $this->input->post('nobatch');
        $sat1       = $this->input->post('sats1');
        $sat2       = $this->input->post('sats2');
        $sat3       = $this->input->post('sats3');
        $tglform    = $this->input->post('tglform');
        $adm        = $this->input->post('adm');
        $cat        = $this->input->post('cat');
        $ket        = "revisiIN";

        $tampil1 = $this->db->query("select * from riwayat WHERE no='$no'");
        foreach ($tampil1->result() as $data1) {
            $noformawal = $data1->noform;
            $nobatchawal = $data1->nobatch;
            $qtyawal = $data1->masuk;
        }

        $tampil2 = $this->db->query("select * from master WHERE kode ='$kode'");
        foreach ($tampil2->result() as $data2) {
            $sats1    = $sat1 * $data2->max1 * $data2->max2;
            $sats2    = $sat2 * $data2->max2;
            $jumlah   = $sats1 + $sats2 + $sat3;
            $saldoakhir = $data2->saldo - $qtyawal + $jumlah; 
        }
        //datalama detailsalqty
        $tampil = $this->db->where('kode',$kode)->where('nobatch',$nobatchawal)->WHERE('ket','IN')->get('detailsalqty');
        $cek = $tampil->num_rows();
        foreach ($tampil->result() as $data) {
            $qtyakhir = $data->qty - $qtyawal + $jumlah;
            $hpsdsq   = $data->qty - $qtyawal;
        } 
        // data saldo
        $data = array(
            'saldo' => $saldoakhir,
            'tgl_update' => $date,
            'tglform' => $tglform
        );
        $where = array(
            'kode' => $kode
        );

        //data riwayat
        $data1 = array(
            'noform' => $noform,
            'nobatch' => $nobatch,
            'kode' => $kode,
            'masuk' => $jumlah,
            'tglform' => $tglform,
            'saldo' => $qtyakhir,
            'tanggal' => $date,
            'ket' => $ket,
            'adm' => $adm,
            'cat' => $cat
        );
        $where1 = array(
            'no' => $no
        );
        
        //data detailsalqty
        $data2 = array(
            'qty' => $qtyakhir
        );
        $data3 = array(
            'qty' => $hpsdsq
        );
        //kondisi awal
        $where2 = array(
            'kode'=>$kode,
            'nobatch'=>$nobatchawal,
        );
        //kondisi baru
        $where3 = array(
            'kode'=>$kode,
            'nobatch'=>$nobatch,
        );

        
        if($cek>0){
       
        
            //rubah qty saja
            if($nobatch==$nobatchawal&$noform==$noformawal) {
                if ($qtyakhir>0) {
                    $this->db->trans_start();
                    $this->masuk_model->update($where2, $data2, 'detailsalqty');
                    $this->masuk_model->update($where, $data, 'master');
                    $this->masuk_model->update($where1, $data1, 'riwayat');
                    $this->db->trans_complete();
                } else {
                    $this->session->set_flashdata("gagal", "JUMLAH STOK MINUS !!!");
                    redirect("masuk");
                }
            } else {
                //beda nobatch atau noform
                //hapus atau edit datalama
                if($hpsdsq==0){
                    //hapus detailsalqty lama bila 0
                    $this->db->trans_start();
                    $this->masuk_model->hapus($where2, 'detailsalqty');
                } else {
                    //update detailsalqty lama tidak 0
                    $this->db->trans_start();
                    $this->masuk_model->update($where2, $data3, 'detailsalqty');
                }

                //ambil databaru
                $tampil3 = $this->db->where('kode',$kode)->where('nobatch',$nobatch)->WHERE('ket','IN')->get('detailsalqty');
                $cek1 = $tampil3->num_rows();
                foreach ($tampil3->result() as $datanew) {
                    $qtynew = $datanew->qty + $jumlah;
                }
                if($cek1>0){
                    //jika detailsalqty baru ada saldo
                    $data4 = array(
                        'qty' => $qtynew
                    );
                    //update detailsalqty baru
                    $this->masuk_model->update($where3, $data4, 'detailsalqty');
                } else {
                    //tambah detailsalqty baru
                    $data5 = array(
                        'qty' => $jumlah,
                        'noform'=>$noform,
                        'kode'=>$kode,
                        'nobatch'=>$nobatch,
                        'tglform'=>$tglform,
                        'ket'=>'IN'
                    );
                    $this->masuk_model->tambah($data5,'detailsalqty');
                }
                $this->masuk_model->update($where, $data, 'master');
                $this->masuk_model->update($where1, $data1, 'riwayat');
                $this->db->trans_complete();
            }

            if ($this->db->trans_status()===false) {
                $this->session->set_flashdata('gagal', 'Edit Barang Masuk Error!');
            } else {
                $this->session->set_flashdata('sukses', 'Edit Barang Masuk Success!');
            }
            redirect("masuk");
        } else { 
            //else keberadaan kosong
            $this->session->set_flashdata("gagal", "Gagal ! ! Barang Telah di pindah Ke Pallet !!!");
            redirect("masuk");
        }
    }
    public function hapus_masuk()
    {
        $kode = $this->input->post('kode');
        $no = $this->input->post('no');
        $noform = $this->input->post('noform');
        $nobatch = $this->input->post('nobatch');

        $date = date("Y-m-d H:i:s");
        $tampil1 = $this->db->query("select * from riwayat WHERE no='$no'");
        foreach ($tampil1->result() as $riw) {
            $awal = $riw->masuk;
            $tglform = $riw->tglform;
            $noform = $riw->noform;
        }
        $tampil = $this->db->query("select * from master WHERE kode='$kode'");
        foreach ($tampil->result() as $sal) {
            $hasil = $sal->saldo - $awal;
        }
        $where = array('no' => $no);
        $where1 = array('kode' => $kode);

        $data1 = array(
            'saldo' => $hasil,
            'tgl_update' => $date
        );

        //untuk detailsalqty
        $dsq = $this->db->where('kode',$kode)->where('ket','IN')->where('nobatch',$nobatch)->get('detailsalqty');
        foreach($dsq->result() as $d){
            $qty = $d->qty;
        }
        //update detailsalqty
        $data2 = array(
            'qty' => $qty-$awal
        );
        $where2 = array(
            'noform'=>$noform,
            'kode'=>$kode,
            'nobatch'=>$nobatch,
        );
        $cek_dsq = $qty - $awal;
        if($cek_dsq < 0){
            $this->session->set_flashdata("gagal", "JUMLAH STOK MINUS !!!");
            redirect("masuk");
        }else{
            if ($hasil < 0) {
                $this->session->set_flashdata("gagal", "JUMLAH STOK MINUS !!!");
                redirect("masuk");
                    } else {
                $this->db->trans_start();
                $this->masuk_model->update($where1, $data1, 'master');
                $this->masuk_model->hapus($where, 'riwayat');
                if ($cek_dsq == 0) {
                    $this->masuk_model->hapus($where2, 'detailsalqty');
                } else {
                    $this->masuk_model->update($where2, $data2, 'detailsalqty');
                }
                $this->db->trans_complete();

                if ($this->db->trans_status()===false) {
                    $this->session->set_flashdata('gagal', 'Delete Barang Masuk Error!');
                } else {
                    $this->session->set_flashdata('sukses', 'Delete Barang Masuk Success!');
                }
                redirect("masuk");
            }
        }
    }

    // Cek Duplicate
    public function cekduplicate()
    {
        $noform  = $this->input->post('q');
        $sql     = $this->db->query("select * from riwayat where noform = '$noform'");

        if ($sql->num_rows() > 0) {
            echo " &#10060; No Form Duplicate!!! Cek tabel di bawah.";
        }
    }
    public function getqty()
    {
        $noform = $this->input->post('noform', true);
        $kode = $this->input->post('kode', true);
        $nobatch = $this->input->post('nobatch', true);
        $query = $this->db->join('master','master.kode = detailsalqty.kode')->where('nobatch',$nobatch)->where('ket','IN')->where('detailsalqty.kode',$kode)->get('detailsalqty');
        if($query->num_rows()>0){
            $data = $query->result();
        }else{
            $data = $this->db->where('kode',$kode)->get('master')->result();
        }
        echo json_encode($data);
    }

    public  function getsatuan(){
        $kode = $this->input->post("kode");
        $query = $this->db->where("kode",$kode)->get("master")->result();
        foreach($query as $q){
            $data = array(
                "sat1"=>$q->sat1,
                "sat2"=>$q->sat2,
                "sat3"=>$q->sat3,
            );
        }
        echo json_encode($data);
    }

    public function tambah_masuk(){
        $index = $this->input->post("index");
        for($i=0;$i<=$index;$i++){
            $master = $this->db->where("kode",$this->input->post("kode")[$i])->get("master")->result();
            foreach($master as $m){
                $sats1  = $m->max1;
                $sats2  = $m->max2;
                $saldo = $m->saldo;
                // $jumlah = $sats1 + $sats2 + $this->input->post("sat3")[$i];
            }
            $sat1 = $sats1*$this->input->post("sat1")[$i]*$sats2;
            $sat2 = $sats2*$this->input->post("sat2")[$i];
            $jumlah = $sat1 + $sat2 + $this->input->post("sat3")[$i];
            $sisa_saldo = $saldo + $jumlah;
            $datariwayat[] = array(
                "kode" => $this->input->post('kode')[$i],
                "nobatch" => $this->input->post('nobatch')[$i],
                "masuk" => $jumlah,
                "keluar"=> 0,
                "saldo" => $sisa_saldo,
                "tglform"=>$this->input->post("tglform"),
                "noform"=>$this->input->post("noform"),
                "adm"=>$this->input->post("adm"),
                "cat"=>$this->input->post("cat")[$i],
                "ket"=>"Input",
                "tanggal"=>$this->input->post("tgl")[$i]
            );
            $datamasuk[] = array(
                'no' => '',
                "tglform"=>$this->input->post("tglform"),
                "noform"=>$this->input->post("noform"),
                "kode" => $this->input->post('kode')[$i],
                "nobatch" => $this->input->post('nobatch')[$i],
                'jumlah' => $sisa_saldo,
                'tanggal' => $this->input->post("tgl")[$i],
                'saldo' => $saldo,
                'adm' => $this->input->post("adm"),
                "cat"=>$this->input->post("cat")[$i],
            );
            $datamaster[] = array("saldo"=>$sisa_saldo);
            $wheremaster[] = array("kode"=>$this->input->post("kode")[$i]);

        //untuk detailsalqty
        $detsal = $this->db->where('kode',$this->input->post("kode")[$i])->where('ket','IN')->where('nobatch',$this->input->post("nobatch")[$i])->get('detailsalqty');
        if($detsal->num_rows() > 0) {
            foreach($detsal->result() as $det) {
                $salqty[] = $det->qty;
            }
        }else{
            $salqty[]=0;
        }
        $total[] = $jumlah+$salqty[$i];
        $datadetailsalqty[] = array(
            'tglform' => $this->input->post('tglform'),
            'kode'    => $this->input->post('kode')[$i],
            'noform'  => $this->input->post('noform'),
            'nobatch' => $this->input->post('nobatch')[$i],
            'qty'     => $total[$i],
            'ket'     => "IN"
        );
        $detailsalqtyupdate[] = array(
            'qty'=>$total[$i]
        );
        $wheredsqupdate[] = array(
            'kode'    => $this->input->post('kode')[$i],
            'nobatch' => $this->input->post('nobatch')[$i],
            'ket'     => "IN"
        );
        $this->db->trans_start();
        // insert riwayat true
        $this->db->insert("riwayat",$datariwayat[$i]);
        // update master true
        $this->db->where($wheremaster[$i])->update("master",$datamaster[$i]);
        if($detsal->num_rows()>0){
            $this->db->where($wheredsqupdate[$i])->update("detailsalqty",$detailsalqtyupdate[$i]);
        }else{
            $this->db->insert("detailsalqty",$datadetailsalqty[$i]);
        }
        $this->db->trans_complete();
            }
        // echo $this->db->trans_status();
        echo json_encode($datariwayat);
    }
}