<?php
class Master extends CI_Controller
{
    public function index()
    {
        $data['master'] = $this->master_model->tampil_master();
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("master/master", $data);
        $this->load->view("_partials/footer");
    }
}
