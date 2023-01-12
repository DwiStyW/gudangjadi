<?php 
class Keluar_track extends CI_Controller
{
    public function index()
    {
        $this->load->view('_partials/header');
        $this->load->view('_partials/menu');
        $this->load->view('track/keluar/keluar_track');
        $this->load->view('_partials/footer');
    }
}