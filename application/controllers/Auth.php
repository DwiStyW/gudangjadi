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
            $this->load->view('_partials/header_log.php');
            $this->load->view('login');
            $this->load->view('_partials/footer_log.php');
            
        } else {
            $auth = $this->auth_model->cek_login();
            if ($auth == FALSE) {
                $this->session->set_flashdata('pesan', '<div class="" role="">Username atau Password Anda Salah!</div>');
                redirect('auth/login');
            } else {

                $this->session->set_userdata('fullname', $auth->fullname);
                $this->session->set_userdata('user_id', $auth->user_id);
                $this->session->set_userdata('username', $auth->username);
                $this->session->set_userdata('role', $auth->role);
                switch ($auth->role) {
                    case 'admin':
                        redirect('home');
                        break;
                    case 'manager':
                        redirect('home');
                        break;
                    case 'user':
                        redirect('home');
                        break;
                    case 'track':
                        redirect('home');
                        break;
                    case 'ppic':
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
        $this->session->sess_destroy();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
  Anda Berhasil Logout
</div>');
        redirect('auth/login');
    }
}