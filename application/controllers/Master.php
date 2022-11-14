<?php
class Master extends CI_Controller
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
        $data['master'] = $this->get->tampil_master();
        $data['golongan'] = $this->get->tampil_golongan();
        $data['jenis'] = $this->get->tampil_jenis();
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("master/master", $data);
        $this->load->view("_partials/footer");
    }

    public function tambah_master()
    {
        $id     = $this->input->post('id');
        $kode     = $this->input->post('kode');
        $nama     = $this->input->post('nama');
        $ukuran     = $this->input->post('ukuran');
        $sat1     = $this->input->post('sat1');
        $max1     = $this->input->post('max1');
        $sat2     = $this->input->post('sat2');
        $max2     = $this->input->post('max2');
        $sat3     = $this->input->post('sat3');
        $kdgol     = $this->input->post('kdgol');
        $kdjenis     = $this->input->post('kdjenis');

        $data = array(
            'id' => $id,
            'kode' => $kode,
            'nama' => $nama,
            'ukuran' => $ukuran,
            'sat1' => $sat1,
            'max1' => $max1,
            'sat2' => $sat2,
            'max2' => $max2,
            'sat3' => $sat3,
            'kdgol' => $kdgol,
            'kdjenis' => $kdjenis
        );

        $data1 = array(
            'no' => '',
            'kode' => $kode,
            'saldo' => 0,
            'tglform' => date("Y-m-d"),
            'tanggal' => date("Y-m-d H:i:s")
        );

        if (isset($data) && isset($data1)) {
            $this->insert->tambah($data, 'master');
            $this->insert->tambah($data1, 'saldo');
            $this->session->set_flashdata("berhasil", "Input Master Success");
            redirect('master');
        }
        // $query1 = $this->insert->tambah($data, 'master');
        // if ($query1) {
        //     $query2 = $this->insert->tambah($data1, 'saldo');
        //     if ($query2) {
        //         $this->session->set_flashdata("berhasil", "Input Master Success");
        //         redirect('master');
        //     } else {
        //         $where = array('kode' => $kode);
        //         $this->delete->hapus($where, 'master');
        //         $this->session->set_flashdata("gagal", "Input Master Error");
        //         redirect('master');
        //     }
        else {
            $this->session->set_flashdata("gagal", "Input Master Error");
            redirect('master');
        }
    }

    public function editmas($id)
    {
        $where = array('id' => $id);
        $data['golongan'] = $this->get->tampil_golongan();
        $data['jenis'] = $this->get->tampil_jenis();
        $data['master'] = $this->get->get_where($where, 'master')->result();
        $this->load->view('_partials/header');
        $this->load->view('_partials/menu');
        $this->load->view('master/editmas', $data);
        $this->load->view('_partials/footer');
    }

    public function update_master()
    {
        $id     = $this->input->post('id');
        $nama     = $this->input->post('nama');
        $ukuran     = $this->input->post('ukuran');
        $sat1     = $this->input->post('sat1');
        $max1     = $this->input->post('max1');
        $sat2     = $this->input->post('sat2');
        $max2     = $this->input->post('max2');
        $sat3     = $this->input->post('sat3');
        $kdgol     = $this->input->post('kdgol');
        $kdjenis     = $this->input->post('kdjenis');
        $expdate     = $this->input->post('expdate');

        $data = array(
            'nama' => $nama,
            'ukuran' => $ukuran,
            'sat1' => $sat1,
            'max1' => $max1,
            'sat2' => $sat2,
            'max2' => $max2,
            'sat3' => $sat3,
            'kdgol' => $kdgol,
            'kdjenis' => $kdjenis,
            'expdate' => $expdate
        );
        $where = array(
            'id' => $id
        );

        $this->edit->update($where, $data, 'master');
        redirect('master');
    }

    public function hapus_master($id)
    {
        $where = array('id' => $id);
        $saldo = $this->db->query("SELECT kode from master where id = '$id'");
        foreach ($saldo->result() as $data) {
            $kode = $data->kode;
        }
        $where1 = array('kode' => $kode);
        if (isset($where) && isset($where1)) {
            $this->delete->hapus($where1, 'saldo');
            $this->delete->hapus($where, 'master');
            $this->session->set_flashdata("berhasil", "Hapus Master Success");
            redirect('master');
        } else {
            $this->session->set_flashdata("gagal", "Hapus Master Error");
            redirect('master');
        }
    }
}
