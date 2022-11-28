<?php
class Settings extends CI_Controller
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
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("settings");
        $this->load->view("_partials/footer");
    }

    public function set_akun()
    {
        $user_id  = $this->input->post("id");
        $username = $this->input->post("user");
        $fullname = $this->input->post("nama");
        $password = $this->input->post("pass");

        $where = array('user_id' => $user_id);
        $data = array(
            'username' => $username,
            'fullname' => $fullname,
            'password' => md5($password)
        );
        if (isset($data) && isset($where)) {
            $this->report_model->update($where, $data, 'tb_user');
            redirect("auth/logout");
        } else {
            redirect("settings");
        }
    }
}
