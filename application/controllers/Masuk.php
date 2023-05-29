<?php
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
        $this->load->library('pagination');
        //untuk search
        $keyword=$this->input->post('keyword');
        if(isset($keyword)){
            $data['keyword']=$this->input->post('keyword');
            $this->session->set_userdata('keyword_masuk',$data['keyword']);
        }else{
            $data['keyword']=$this->session->userdata('keyword_masuk');
        }
        //untuk pagination
        $config['base_url'] = 'http://192.168.10.99/gudangtrial/masuk/index';
        $config['total_rows'] = $this->masuk_model->total_barang_masuk($data['keyword']);
        $range = $this->input->post('range');
        $config['per_page'] = $range;
        if ($range == null) {
            $config['per_page'] = 10;
        } elseif ($range == "all") {
            $config['per_page'] = null;
        }
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['masuk'] = $this->masuk_model->tampil_barang_masuk($config['per_page'], $data['start'], $data['keyword']);
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("masuk/masuk", $data);
        $this->load->view("_partials/footer");
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
}