<?php
/**
 * @property  session $session
 * @property  input $input
 * @property  db $db
 * @property  home_model $home_model
 * 
 */
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != 'user' && $this->session->userdata('role') != 'ppic' && $this->session->userdata('role') != 'admin' && $this->session->userdata('role') != 'manager' && $this->session->userdata('role') != 'track') {
            $this->session->set_flashdata('pesan', '<div class="fade show" style="color:red" role="alert">
  Anda Belum Login!
</div><br>');
            redirect('auth/logout');
        }
    }
    public function index()
    {
        $data['saldo'] = $this->home_model->tampil_saldo();
        $data['riwayat'] = $this->home_model->tampil_riwayat();
        $this->load->view('home', $data);
    }
}
