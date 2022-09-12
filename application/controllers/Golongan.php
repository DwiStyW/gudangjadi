<?php
class Golongan extends CI_Controller
{
    public function index()
    {
        $data['golongan'] = $this->golongan_model->tampil_golongan();
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("golongan", $data);
        $this->load->view("_partials/footer");
    }

    public function tambah_golongan()
    {
        $id = $this->input->post('id');
        $kdgol = $this->input->post('kdgol');
        $namagol = $this->input->post('namagol');

        $data = array(
            'id' => $id,
            'kdgol' => $kdgol,
            'namagol' => $namagol
        );

        $this->golongan_model->tambah_golongan($data, 'golongan');
        redirect('golongan');
    }
}
