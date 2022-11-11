<?php
class Riwayat extends CI_Controller
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
        $data['master'] = $this->report_model->tampil_master();
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("riwayat/riwayat", $data);
        $this->load->view("_partials/footer");
    }

    public function tampilriwayat()
    {
        $start = $this->input->post("start");
        $end   = $this->input->post("end");
        $kode = $this->input->post("kode");

        $data['riwayat'] = $this->report_model->filriwayat($kode, $start, $end)->result();
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        if ($this->report_model->filriwayat($kode, $start, $end)->num_rows() > 0) {
            $this->load->view("riwayat/tampilriwayat", $data);
        } else {
            $this->session->set_flashdata("kosong", "Riwayat Barang Masuk dan Keluar Kosong!");
            redirect("riwayat");
        }
        $this->load->view("_partials/footer");
    }

    public function print($start, $end, $code)
    {
        $data = array('start' => $start, 'end' => $end, 'kode' => $code);
        $data['riwayat'] = $this->report_model->filriwayat($code, $start, $end)->result();
        $this->load->view("_partials/header");
        $this->load->view("riwayat/printriw", $data);
        $this->load->view("_partials/footer");
    }
}
