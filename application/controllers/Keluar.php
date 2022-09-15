<?php
class Keluar extends CI_Controller
{
    public function index()
    {
        $data["keluar"] = $this->get->tampil_barang_keluar();
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("keluar/keluar", $data);
        $this->load->view("_partials/footer");
    }
}
