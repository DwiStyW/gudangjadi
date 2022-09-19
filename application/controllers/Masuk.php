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
            redirect('auth/login');
        }
    }
    public function index()
    {
        $data['masuk'] = $this->get->tampil_barang_masuk();
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("masuk/masuk", $data);
        $this->load->view("_partials/footer");
    }

    // load view input barang masuk
    public function input_masuk()
    {
        $data['masuk'] = $this->get->riwayat_all();
        $data['master'] = $this->get->tampil_master();
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

        $tampil1 = $this->db->query("SELECT * FROM master WHERE id='$koder'");
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
            'tanggal' => $tgl
        );
        $where1 = array(
            'kode' => $kode
        );

        if ((isset($data4) && isset($where1) && isset($data3) && isset($data2)) && ($sat1 > 0 && $sat2 >= 0 && $sat3 >= 0)) {
            $this->edit->update($where1, $data4, "saldo");
            $this->insert->tambah($data3, "masuk");
            $this->insert->tambah($data2, "riwayat");
            $this->session->set_flashdata('sukses', 'Data Berhasil di Update!');
            redirect("masuk");
        } else {
            $this->session->set_flashdata('gagal', 'Data Gagal di Update!');
            redirect("masuk");
        }
    }

    public function edit_masuk($no)
    {
        $where = array('no' => $no);
        $data['riwayat'] = $this->get->edit_masuk($where, 'riwayat')->result();
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
        $sat1       = $this->input->post('sats1');
        $sat2       = $this->input->post('sats2');
        $sat3       = $this->input->post('sats3');
        $tglform    = $this->input->post('tglform');
        $adm        = $this->input->post('adm');
        $cat        = $this->input->post('cat');
        $ket        = "revisiIN";

        $tampil2 = $this->db->query("select * from master WHERE id='$kode'");
        foreach ($tampil2->result() as $data2) {
            $sats1    = $sat1 * $data2->max1 * $data2->max2;
            $sats2    = $sat2 * $data2->max2;
            $jumlah = $sats1 + $sats2 + $sat3;
        }
        $tampil1 = $this->db->query("select * from riwayat WHERE no='$no'");
        foreach ($tampil1->result() as $data1) {
            $awal = $data1->masuk;
        }
        $tampil = $this->db->query("select * from saldo WHERE no='$kode'");
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
                'tanggal' => $date,
                'tglform' => $tglform
            );
            $where = array(
                'no' => $kode
            );

            //update riwayat
            $data1 = array(
                'noform' => $noform,
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
            $data2 = array(
                'noform' => $noform,
                'kode' => $kode,
                'jumlah' => $jumlah,
                'tglform' => $tglform,
                'saldo' => $update,
                'tanggal' => $date,
                'adm' => $adm,
                'cat' => $cat

            );
            $where2 = array(
                'no' => $no
            );

            if (isset($data) && isset($where) && isset($data1) && isset($where1) && isset($data2) && isset($where2)) {
                $this->edit->update($where, $data, 'saldo');
                $this->edit->update($where1, $data1, 'riwayat');
                $this->edit->update($where2, $data2, 'masuk');
                $this->session->set_flashdata('sukses', 'Data Berhasil di Update!');
                redirect("masuk");
            } else {
                $this->session->set_flashdata('gagal', 'Data gagal di Update!');
                redirect("masuk");
            }
        }
    }
    public function hapus_masuk($no, $kode)
    {
        $date = date("Y-m-d H:i:s");
        $tampil1 = $this->db->query("select * from riwayat WHERE no='$no'");
        foreach ($tampil1->result() as $riw) {
            $awal = $riw->masuk;
            $tglform = $riw->tglform;
            $tglform = $riw->noform;
        }
        $tampil = $this->db->query("select * from saldo WHERE kode='$kode'");
        foreach ($tampil->result() as $sal) {
            $hasil = $sal->saldo - $awal;
        }
        $where = array('no' => $no);
        $where1 = array('kode' => $kode);

        $data1 = array(
            'saldo' => $hasil,
            'tanggal' => $date
        );

        if ($hasil < 0) {
            $this->session->set_flashdata("gagal", "JUMLAH STOK MINUS !!!");
            redirect("masuk");
        } else {
            if (isset($where) && isset($where1) && isset($data1)) {
                $this->edit->update($where1, $data1, 'saldo');
                $this->delete->hapus($where, 'riwayat');
                $this->delete->hapus($where, 'masuk');
                $this->session->set_flashdata('sukses', 'Data Berhasil di Update!');
                redirect("masuk");
            } else {
                $this->session->set_flashdata('gagal', 'Data Gagal di Update!');
                redirect("masuk");
            }
        }
    }
}