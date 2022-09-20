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
        $data['golongan'] = $this->get->tampil_golongan();
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("report/reportgr", $data);
        $this->load->view("_partials/footer");
    }

    public function tampilreportgr()
    {
        $start = $this->input->post("start");
        $end   = $this->input->post("end");
        $kode = $this->input->post("kode");

        $data['riwayat'] = $this->get->filreportgr($kode, $start, $end)->result();
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        if ($this->get->filreportgr($kode, $start, $end)->num_rows() > 0) {
            $this->load->view("report/tampilreportgr", $data);
        } else {
            $this->session->set_flashdata("kosong", "Report Per Golongan Kosong!");
            redirect("report");
        }
        $this->load->view("_partials/footer");
    }

    public function print($start, $end, $code)
    {
        $data = array('start' => $start, 'end' => $end, 'kode' => $code);
        $data['report'] = $this->get->filreportgr($code, $start, $end)->result();
        $this->load->view("_partials/header");
        $this->load->view("report/printriw", $data);
        $this->load->view("_partials/footer");
    }
}