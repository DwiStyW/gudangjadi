<?php
/**
 * @property masuk_model $masuk_model
 * @property session $session
 */
class Penginput extends CI_Controller
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
    public function user($adm)
    {
        $where = array('adm' => $adm);
        $data['penginput'] = $this->masuk_model->get_where($where, 'riwayat')->result();
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("penginput", $data);
        $this->load->view("_partials/footer");
    }
}
