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
        $config['base_url'] = 'http://localhost/gudangjadi/masuk/index';
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

        $tampil = $this->db->query("SELECT * FROM saldo WHERE kode='$kode'");
        foreach ($tampil->result() as $data) {
            $hasil = $data->saldo + $jumlah;
        }

        // insert riwayat
        $data2 = array(
            'no' => '',
            'tglform' => $tglform,
            'kode' => $koder,
            'noform' => $noform,
            'masuk' => $jumlah,
            'keluar' => '',
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

        $this->db->trans_start();
        $this->masuk_model->update($where1, $data4, "master");
        $this->masuk_model->tambah($data2, "riwayat");
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

    //updateMasuk
    public function update_masuk()
    {
        $no         = $this->input->post('no');
        $date       = $this->input->post('tgl');
        $kode       = $this->input->post('kode');
        $noform     = $this->input->post('noform');
        $nobatch     = $this->input->post('nobatch');
        $sat1       = $this->input->post('sats1');
        $sat2       = $this->input->post('sats2');
        $sat3       = $this->input->post('sats3');
        $tglform    = $this->input->post('tglform');
        $adm        = $this->input->post('adm');
        $cat        = $this->input->post('cat');
        $ket        = "revisiIN";

        $tampil2 = $this->db->query("select * from master WHERE kode ='$kode'");
        foreach ($tampil2->result() as $data2) {
            $sats1    = $sat1 * $data2->max1 * $data2->max2;
            $sats2    = $sat2 * $data2->max2;
            $jumlah = $sats1 + $sats2 + $sat3;
        }
        $tampil1 = $this->db->query("select * from riwayat WHERE no='$no'");
        foreach ($tampil1->result() as $data1) {
            $awal = $data1->masuk;
        }
        $tampil = $this->db->query("select * from saldo WHERE kode ='$kode'");
        foreach ($tampil->result() as $data) {
            $update = $data->saldo - $awal + $jumlah;
        }

        if ($update < 0) {
            $this->session->set_flashdata("gagal", "JUMLAH STOK MINUS !!!");
            redirect("masuk");
        } else {
            // update saldo
            $data = array(
                'saldo' => $update,
                'tgl_update' => $date,
                'tglform' => $tglform
            );
            $where = array(
                'kode' => $kode
            );

            //update riwayat
            $data1 = array(
                'noform' => $noform,
                'nobatch' => $nobatch,
                'kode' => $kode,
                'masuk' => $jumlah,
                'tglform' => $tglform,
                'saldo' => $update,
                'tanggal' => $date,
                'ket' => $ket,
                'adm' => $adm,
                'cat' => $cat
            );
            $where1 = array(
                'no' => $no
            );

            // update masuk
            // $data2 = array(
            //     'noform' => $noform,
            //     'kode' => $kode,
            //     'jumlah' => $jumlah,
            //     'tglform' => $tglform,
            //     'saldo' => $update,
            //     'tanggal' => $date,
            //     'adm' => $adm,
            //     'cat' => $cat

            // );
            // $where2 = array(
            //     'no' => $no
            // );

            $this->db->trans_start();
            $this->masuk_model->update($where, $data, 'saldo');
            $this->masuk_model->update($where1, $data1, 'riwayat');
            $this->db->trans_complete();

            if($this->db->trans_status()===FALSE){
                $this->session->set_flashdata('gagal', 'Update Barang Masuk Error!');
            }else{
                $this->session->set_flashdata('sukses', 'Update Barang Masuk Success!');
            }

            // if (isset($data) && isset($where) && isset($data1) && isset($where1) && isset($data2) && isset($where2)) {
            //     $this->masuk_model->update($where, $data, 'saldo');
            //     $this->masuk_model->update($where1, $data1, 'riwayat');
            //     $this->masuk_model->update($where2, $data2, 'masuk');
            //     $this->session->set_flashdata('sukses', 'Update Barang Masuk Success!');
            //     redirect("masuk");
            // } else {
            //     $this->session->set_flashdata('gagal', 'Update Barang Masuk Error!');
            //     redirect("masuk");
            // }
        }
    }
    public function hapus_masuk($no, $kode)
    {
        $date = date("Y-m-d H:i:s");
        $tampil1 = $this->db->query("select * from riwayat WHERE no='$no'");
        foreach ($tampil1->result() as $riw) {
            $awal = $riw->masuk;
            $tglform = $riw->tglform;
            $noform = $riw->noform;
        }
        $tampil = $this->db->query("select * from saldo WHERE kode='$kode'");
        foreach ($tampil->result() as $sal) {
            $hasil = $sal->saldo - $awal;
        }
        $where = array('no' => $no);
        $where1 = array('kode' => $kode);

        $data1 = array(
            'saldo' => $hasil,
            'tgl_update' => $date
        );

        if ($hasil < 0) {
            $this->session->set_flashdata("gagal", "JUMLAH STOK MINUS !!!");
            redirect("masuk");
        } else {
            $this->db->trans_start();
            $this->masuk_model->update($where1, $data1, 'master');
            $this->masuk_model->hapus($where, 'riwayat');
            $this->db->trans_complete();

            if($this->db->trans_status()===FALSE){
                $this->session->set_flashdata('gagal', 'Delete Barang Masuk Error!');
            }else{
                $this->session->set_flashdata('sukses', 'Delete Barang Masuk Success!');
            }

            // if (isset($where) && isset($where1) && isset($data1)) {
            //     $this->masuk_model->update($where1, $data1, 'saldo');
            //     $this->masuk_model->hapus($where, 'riwayat');
            //     $this->masuk_model->hapus($where, 'masuk');
            //     $this->session->set_flashdata('sukses', 'Delete Barang Masuk Success!');
            //     redirect("masuk");
            // } else {
            //     $this->session->set_flashdata('gagal', 'Delete Barang Masuk Error!');
            //     redirect("masuk");
            // }
            redirect("masuk");
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
}