<?php
class Jenis extends CI_Controller
{
    public function index()
    {
        $data['jenis'] = $this->get->tampil_jenis();
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("jenis", $data);
        $this->load->view("_partials/footer");
    }

    public function tambah_jenis()
    {
        $id = $this->input->post('id');
        $kdjenis = $this->input->post('kdjenis');
        $namajenis = $this->input->post('namajenis');

        $data = array(
            'id' => $id,
            'kdjenis' => $kdjenis,
            'namajenis' => $namajenis
        );

        $this->insert->tambah($data, 'jenis');
        redirect('jenis');
    }

    public function update_jenis()
    {
        $id = $this->input->post('id');
        $kdjenis = $this->input->post('kdjenis');
        $namajenis = $this->input->post('namajenis');

        $data = array(
            'kdjenis' => $kdjenis,
            'namajenis' => $namajenis
        );
        $where = array(
            'id' => $id,
        );

        $this->edit->update($where, $data, 'jenis');
        redirect('jenis');
    }

    public function hapus_jenis($id)
    {
        $where = array('id' => $id);
        $this->delete->hapus($where, 'jenis');
        redirect('jenis');
    }
}
