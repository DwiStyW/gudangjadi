<?php
class Report extends CI_Controller
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
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("report/report");
        $this->load->view("_partials/footer");
    }

    public function tampilreport()
    {
        $start = $this->input->post("start");
        $end   = $this->input->post("end");

        $data = array('start' => $start, 'end' => $end);

        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("report/tampilreport", $data);
        $this->load->view("_partials/footer");
    }

    public function printrep($start, $end)
    {
        $data = array('start' => $start, 'end' => $end);

        $this->load->view("_partials/header");
        $this->load->view("report/printrep", $data);
    }
}
