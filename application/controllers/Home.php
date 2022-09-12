<?php
class Home extends CI_Controller
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
        $data['saldo'] = $this->home_model->tampil_saldo();
        $data['riwayat'] = $this->home_model->tampil_riwayat();
        $this->load->view('_partials/header');
        $this->load->view('_partials/menu');
        $this->load->view('home', $data);
        $this->load->view('_partials/footer');
    }
}
