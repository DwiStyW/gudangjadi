<?php
class Riwayat extends CI_Controller
{
    public function index()
    {
        $data['master'] = $this->get->tampil_master();
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

        $data['riwayat'] = $this->get->filriwayat($kode, $start, $end);
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("riwayat/tampilriwayat", $data);
        $this->load->view("_partials/footer");
    }

    public function print($start, $end, $code)
    {
        $data = array('start' => $start, 'end' => $end, 'kode' => $code);
        $data['riwayat'] = $this->get->filriwayat($code, $start, $end);
        $this->load->view("_partials/header");
        $this->load->view("riwayat/printriw", $data);
        $this->load->view("_partials/footer");
    }
}
