<?php
class Jenis extends CI_Controller
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
        $data['jenis'] = $this->jenis_model->tampil_jenis();
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("jenis", $data);
        $this->load->view("_partials/footer");
    }

    public function tambah_jenis()
    {
        $id = $this->input->post('id');
        $kdjenis = $this->input->post('kdjenis');
        $namajenis = $this->input->post('namajenis');

        $data = array(
            'id' => $id,
            'kdjenis' => $kdjenis,
            'namajenis' => $namajenis
        );

        if (isset($data)) {
            $this->jenis_model->tambah($data, 'jenis');
            $this->session->set_flashdata('berhasil', 'Input Jenis Success');
        } else {
            $this->session->set_flashdata('gagal', 'Input Jenis Error');
        }
        redirect('jenis');
    }

    public function update_jenis()
    {
        $id = $this->input->post('id');
        $kdjenis = $this->input->post('kdjenis');
        $namajenis = $this->input->post('namajenis');

        $data = array(
            'kdjenis' => $kdjenis,
            'namajenis' => $namajenis
        );
        $where = array(
            'id' => $id,
        );

        if (isset($data) && isset($where)) {
            $this->jenis_model->update($where, $data, 'jenis');
            $this->session->set_flashdata('berhasil', 'Update Jenis Success');
        } else {
            $this->session->set_flashdata('gagal', 'Update Jenis Error');
        }
        redirect('jenis');
    }

    public function hapus_jenis($id)
    {
        $where = array('id' => $id);
        if (isset($where)) {
            $this->jenis_model->hapus($where, 'jenis');
            $this->session->set_flashdata('berhasil', 'Delete Jenis Success');
        } else {
            $this->session->set_flashdata('gagal', 'Delete Jenis Error');
        }
        redirect('jenis');
    }
}
