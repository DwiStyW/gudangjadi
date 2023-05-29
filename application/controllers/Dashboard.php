<?php 
class Dashboard extends CI_Controller{
    public function index(){
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("dashboard");
        $this->load->view("_partials/footer");
    }
}