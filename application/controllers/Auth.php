<?php
class Auth extends CI_Controller
{
    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required', [
            'required' => 'username harus di isi!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required' => 'password harus di isi!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
            $this->load->view('_partials/footer.php');
        } else {
            $auth = $this->auth_model->cek_login();
            if ($auth == FALSE) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  Username atau Password Anda Salah!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
                redirect('auth/login');
            } else {
                $this->session->set_userdata('username', $auth->username);
                $this->session->set_userdata('role', $auth->role);
                $this->session->set_userdata('fullname', $auth->fullname);
                switch ($auth->role) {
                    case 'admin':
                        redirect('home');
                        break;
                    case 'manager':
                        redirect('admin/dashboard_admin');
                        break;
                    case 'user':
                        redirect('home');
                        break;
                    default:
                        break;
                }
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('password');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('fullname');
        $this->session->unset_userdata('role');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  Anda Berhasil Logout
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
        redirect('auth/login');
    }
}
