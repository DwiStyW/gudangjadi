<?php
class Utilisasi extends CI_Controller
{
    
    public function index()
    {
       
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("utilisasi");
        $this->load->view("_partials/footer");
    }

}