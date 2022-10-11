<?php
class Home extends CI_Controller
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
        $data['saldo'] = $this->get->tampil_saldo();
        $data['riwayat'] = $this->get->tampil_riwayat();
        $this->load->view('_partials/header');
        $this->load->view('_partials/menu');
        $this->load->view('home', $data);
        $this->load->view('_partials/footer');
    }
}