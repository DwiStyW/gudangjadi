<?php
class Masuk extends CI_Controller
{
    public function index()
    {
        $data['masuk'] = $this->get->tampil_barang_masuk();
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("masuk", $data);
        $this->load->view("_partials/footer");
    }
}
