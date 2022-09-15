<?php
class Jenis extends CI_Controller
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
            redirect('auth/login');
        }
    }
    public function index()
    {
        $data['jenis'] = $this->get->tampil_jenis();
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

        $this->insert->tambah($data, 'jenis');
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

        $this->edit->update($where, $data, 'jenis');
        redirect('jenis');
    }

    public function hapus_jenis($id)
    {
        $where = array('id' => $id);
        $this->delete->hapus($where, 'jenis');
        redirect('jenis');
    }
}
