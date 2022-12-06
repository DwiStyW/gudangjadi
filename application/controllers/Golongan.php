<?php
class Golongan extends CI_Controller
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
        $data['golongan'] = $this->golongan_model->tampil_golongan();
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("golongan", $data);
        $this->load->view("_partials/footer");
    }

    public function tambah_golongan()
    {
        $id = $this->input->post('id');
        $kdgol = $this->input->post('kdgol');
        $namagol = $this->input->post('namagol');

        $data = array(
            'id' => $id,
            'kdgol' => $kdgol,
            'namagol' => $namagol
        );
        if (isset($data)) {
            $this->golongan_model->tambah($data, 'golongan');
            $this->session->set_flashdata('berhasil', 'Input Golongan Success');
        } else {
            $this->session->set_flashdata('gagal', 'Input Golongan Error');
        }
        redirect('golongan');
    }

    public function update_golongan()
    {
        $id = $this->input->post('id');
        $kdgol = $this->input->post('kdgol');
        $namagol = $this->input->post('namagol');

        $data = array(
            'kdgol' => $kdgol,
            'namagol' => $namagol
        );
        $where = array(
            'id' => $id,
        );

        if (isset($data) && isset($where)) {
            $this->golongan_model->update($where, $data, 'golongan');
            $this->session->set_flashdata('berhasil', 'Update Golongan Success');
        } else {
            $this->session->set_flashdata('gagal', 'Update Golongan Error');
        }
        redirect('golongan');
    }

    public function hapus_golongan($id)
    {
        $where = array('id' => $id);
        if (isset($where)) {
            $this->golongan_model->hapus($where, 'golongan');
            $this->session->set_flashdata('berhasil', 'Delete Golongan Success');
        } else {
            $this->session->set_flashdata('gagal', 'Delete Golongan Error');
        }
        redirect('golongan');
    }
}
