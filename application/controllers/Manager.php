<?php
class Manager extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != 'manager') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  Anda Belum Login!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
        redirect('home');
        }
    }

    public function saldo(){
        $this->load->view("manager/saldo");
    }
}