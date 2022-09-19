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
            redirect('auth/login');
        }
    }
    public function index()
    {
        $data["keluar"] = $this->get->tampil_barang_keluar();
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("keluar/keluar", $data);
        $this->load->view("_partials/footer");
    }

    public function input_keluar()
    {
        $data['masuk'] = $this->get->riwayat_all();
        $data['master'] = $this->get->tampil_master();
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("keluar/inputkeluar", $data);
        $this->load->view("_partials/footer");
    }
}
