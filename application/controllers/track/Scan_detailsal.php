<?php 
class Scan_detailsal extends CI_Controller{
    public function index(){
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("track/scan_detailsal");
        $this->load->view("_partials/footer");
    }
}