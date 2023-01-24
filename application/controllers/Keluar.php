<?php
class Keluar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != 'user' && $this->session->userdata('role') != 'admin' && $this->session->userdata('role') != 'manager') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  Anda Belum Login!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
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
            $this->session->set_userdata('keyword',$data['keyword']);
        }else{
            $data['keyword']=$this->session->userdata('keyword');
        }
        
        //untuk pagination
        $config['base_url'] = 'http://localhost/gudangjadi/keluar/index';
        $config['total_rows'] = $this->keluar_model->total_barang_keluar($data['keyword']);
        $range = $this->input->post('range');
        $config['per_page'] = $range;
        if ($range == null) {
            $config['per_page'] = 10;
        } elseif ($range == "all") {
            $config['per_page'] = null;
        }
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data["keluar"] = $this->keluar_model->tampil_barang_keluar($config['per_page'], $data['start'],$data['keyword']);
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("keluar/keluar", $data);
        $this->load->view("_partials/footer");
    }

    public function input_keluar()
    {
        $data['masuk'] = $this->keluar_model->riwayat_all();
        $data['master'] = $this->keluar_model->tampil_master();
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("keluar/inputkeluar", $data);
        $this->load->view("_partials/footer");
    }

    public function tambah_barang_keluar()
    {
        $tglform            = $this->input->post('tglform');
        $tgl                = $this->input->post('tgl');
        $noform             = $this->input->post('noform');
        $nobatch            = $this->input->post('nobatch');
        $koder              = $this->input->post('kode');
        $sat1               = $this->input->post('sat1');
        $sat2               = $this->input->post('sat2');
        $sat3               = $this->input->post('sat3');
        $adm                = $this->input->post('adm');

        $tampil1 = $this->db->query("SELECT * FROM master WHERE kode='$koder'");
        foreach ($tampil1->result() as $data1) {
            //konvert 3 Satuan
            $sats1    = $sat1 * $data1->max1 * $data1->max2;
            $sats2    = $sat2 * $data1->max2;
            $jumlah = $sats1 + $sats2 + $sat3;
        }

        $tampil = $this->db->query("SELECT * FROM master WHERE kode='$koder'");
        foreach ($tampil->result() as $data) {
            $hasil = $data->saldo - $jumlah;
        }

        if ($hasil < 0) {
            $this->session->set_flashdata('gagal', 'JUMLAH STOK MINUS !!!');
            redirect("keluar/input_keluar");
        } else {
            //update saldo
            $data2 = array(
                'saldo' => $hasil,
                'tglform' => $tglform,
                'tgl_update' => $tgl
            );
            $where = array(
                'kode' => $koder
            );

            //insert riwayat
            $data3 = array(
                'no' => '',
                'tglform' => $tglform,
                'kode' => $koder,
                'noform' => $noform,
                'nobatch'=>$nobatch,
                'masuk' => '',
                'keluar' => $jumlah,
                'saldo' => $hasil,
                'ket' => 'Output',
                'tanggal' => $tgl,
                'adm' => $adm
            );

            //insert keluar
            // $data4 = array(
            //     'no' => '',
            //     'tglform' => $tglform,
            //     'noform' => $noform,
            //     'kode' => $koder,
            //     'jumlah' => $jumlah,
            //     'tanggal' => $tgl,
            //     'saldo' => $hasil,
            //     'adm' => $adm
            // );

            $this->db->trans_start();
            $this->keluar_model->tambah($data3, 'riwayat');
            $this->keluar_model->update($where, $data2, 'master');
            $this->db->trans_complete();

            if($this->db->trans_status()===FALSE){
                $this->session->set_flashdata('gagal', 'Input Barang Keluar Error!');
            }else{
                $this->session->set_flashdata('sukses', 'Input Barang Keluar Success!');
            }
            // if ((isset($data4) && isset($where) && isset($data2) && isset($data3)) && $jumlah > 0) {
            //     $this->keluar_model->tambah($data3, 'riwayat');
            //     $this->keluar_model->update($where, $data2, 'saldo');
            //     $this->keluar_model->tambah($data4, 'keluar');
            //     $this->session->set_flashdata('sukses', 'Input Barang Keluar Success!');
            //     redirect('keluar/input_keluar');
            // } else {
            //     $this->session->set_flashdata('gagal', 'Input Barang Keluar Error!');
            //     redirect('keluar/input_keluar');
            // }
            redirect('keluar/input_keluar');
        }
    }

    public function edit_keluar($no)
    {
        $where = array('no' => $no);
        $data['riwayat'] = $this->keluar_model->get_where($where, 'riwayat')->result();
        $this->load->view('_partials/header');
        $this->load->view('_partials/menu');
        $this->load->view('keluar/editkeluar', $data);
        $this->load->view('_partials/footer');
    }

    public function update_keluar()
    {
        $no         = $this->input->post('no');
        $date       = $this->input->post('tgl');
        $kode       = $this->input->post('kode');
        $noform     = $this->input->post('noform');
        $nobatch            = $this->input->post('nobatch');
        $sat1       = $this->input->post('sats1');
        $sat2       = $this->input->post('sats2');
        $sat3       = $this->input->post('sats3');
        $tglform    = $this->input->post('tglform');
        $adm        = $this->input->post('adm');
        $cat        = $this->input->post('cat');
        $ket        = "revisiOUT";

        $tampil2 = $this->db->query("SELECT * FROM master WHERE kode='$kode'");
        foreach ($tampil2->result() as $data2) {
            $max1 = $data2->max1;
            $max2 = $data2->max2;
        }

        $sats1    = $sat1 * $max1 * $max2;
        $sats2    = $sat2 * $max2;
        $jumlah = $sats1 + $sats2 + $sat3;

        $tampil1 = $this->db->query("SELECT * FROM riwayat WHERE no='$no'");
        foreach ($tampil1->result() as $data1) {
        }
        $tampil = $this->db->query("SELECT * FROM master WHERE kode='$kode'");
        foreach ($tampil->result() as $data) {
        }
        $awal = $data1->keluar;
        $update = $data->saldo + $awal - $jumlah;

        if ($update < 0) {
            $this->session->set_flashdata('gagal', 'JUMLAH STOK MINUS !!!');
            redirect("keluar/input_keluar");
        } else {
            //update saldo
            $data3 = array(
                'saldo' => $update,
                'tanggal' => $date,
                'tglform' => $tglform
            );

            $where1 = array(
                'kode' => $kode
            );

            //update riwayat
            $data4 = array(
                'kode' => $kode,
                'noform' => $noform,
                'nobatch' => $nobatch,
                'keluar' => $jumlah,
                'tglform' => $tglform,
                'saldo' => $update,
                'tanggal' => $date,
                'ket' => $ket,
                'adm' => $adm
            );
            $where2 = array(
                'no' => $no
            );

            //update keluar
            $data5 = array(
                'noform' => $noform,
                'kode' => $kode,
                'jumlah' => $jumlah,
                'tglform' => $tglform,
                'saldo' => $update,
                'tanggal' => $date,
                'adm' => $adm
            );
            $where3 = array(
                'no' => $no
            );
            $this->db->trans_start();
            $this->keluar_model->update($where1, $data3, 'saldo');
            $this->keluar_model->update($where2, $data4, 'master');
            if($this->db->trans_status()===FALSE){
                $this->session->set_flashdata('gagal', 'Update Barang Keluar Error!');
            }else{
                $this->session->set_flashdata('sukses', 'Update Barang Keluar Success!');
            }
            redirect('keluar');

            // if (isset($data3) && isset($data4) && isset($data5) && isset($where1) && isset($where2) && isset($where3)) {
            //     $this->keluar_model->update($where1, $data3, 'saldo');
            //     $this->keluar_model->update($where2, $data4, 'riwayat');
            //     $this->keluar_model->update($where3, $data5, 'keluar');
            //     $this->session->set_flashdata('sukses', 'Update Barang Keluar Success!');
            //     redirect('keluar');
            // } else {
            //     $this->session->set_flashdata('gagal', 'Update Barang Keluar Error!');
            //     redirect('keluar');
            // }
        }
    }

    public function hapus_keluar($no, $kode)
    {
        $date = date("Y-m-d H:i:s");
        $tampil1 = $this->db->query("SELECT * FROM riwayat WHERE no = $no");
        foreach ($tampil1->result() as $data1) {
            $awal = $data1->keluar;
        }
        $tampil = $this->db->query("SELECT * FROM master WHERE kode='$kode'");
        foreach ($tampil->result() as $data) {
            $hasil = $data->saldo + $awal;
        }

        //update saldo
        $data2 = array(
            'saldo' => $hasil,
            'tanggal' => $date,
        );
        $where = array('kode' => $kode);
        $where1 = array('no' => $no);

        $this->db->trans_start();
        $this->keluar_model->update($where, $data2, 'saldo');
        $this->keluar_model->hapus($where1, 'riwayat');
        $this->db->trans_complete();
        if($this->db->trans_status()===FALSE){
            $this->session->set_flashdata('gagal', 'Delete Barang Keluar Error!');
        }else{
            $this->session->set_flashdata('sukses', 'Delete Barang Keluar Success!');
        }
        redirect("keluar");
        // if (isset($data2) && isset($where) && isset($where1)) {
        //     $this->keluar_model->update($where, $data2, 'saldo');
        //     $this->keluar_model->hapus($where1, 'riwayat');
        //     $this->keluar_model->hapus($where1, 'keluar');
        //     redirect("keluar");
        // } else {
        //     $this->session->set_flashdata('gagal', 'Delete Barang Keluar Error!');
        // }
    }

    public function cekduplicate()
    {
        $noform  = $this->input->post('q');
        $sql     = $this->db->query("select * from riwayat where noform = '$noform'");

        if ($sql->num_rows() > 0) {
            echo " &#10060; No Form Duplicate!!! Cek tabel di bawah.";
        }
    }
}
