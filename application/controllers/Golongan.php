<?php
class Golongan extends CI_Controller
{
    public function index()
    {
        $data['golongan'] = $this->get->tampil_golongan();
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

        $this->insert->tambah($data, 'golongan');
        redirect('golongan');
    }

    public function update_golongan()
    {
        $id = $this->input->post('id');
        $kdgol = $this->input->post('kdgol');
        $namagol = $this->input->post('namagol');

        $data = array(
            'kdgol' => $kdgol,
            'namagol' => $namagol
        );
        $where = array(
            'id' => $id,
        );

        $this->edit->update($where, $data, 'golongan');
        redirect('golongan');
    }

    public function hapus_golongan($id)
    {
        $where = array('id' => $id);
        $this->delete->hapus($where, 'golongan');
        redirect('golongan');
    }
}
