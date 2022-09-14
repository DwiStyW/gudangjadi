<?php
class Master extends CI_Controller
{
    public function index()
    {
        $data['master'] = $this->get->tampil_master();
        $data['golongan'] = $this->get->tampil_golongan();
        $data['jenis'] = $this->get->tampil_jenis();
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("master/master", $data);
        $this->load->view("_partials/footer");
    }

    public function tambah_master()
    {
        $id     = $this->input->post('id');
        $kode     = $this->input->post('kode');
        $nama     = $this->input->post('nama');
        $ukuran     = $this->input->post('ukuran');
        $sat1     = $this->input->post('sat1');
        $max1     = $this->input->post('max1');
        $sat2     = $this->input->post('sat2');
        $max2     = $this->input->post('max2');
        $sat3     = $this->input->post('sat3');
        $kdgol     = $this->input->post('kdgol');
        $kdjenis     = $this->input->post('kdjenis');

        $data = array(
            'id' => $id,
            'kode' => $kode,
            'nama' => $nama,
            'ukuran' => $ukuran,
            'sat1' => $sat1,
            'max1' => $max1,
            'sat2' => $sat2,
            'max2' => $max2,
            'sat3' => $sat3,
            'kdgol' => $kdgol,
            'kdjenis' => $kdjenis
        );


        $this->insert->tambah($data, 'master');
        redirect('master');
    }

    public function editmas($id)
    {
        $where = array('id' => $id);
        $data['golongan'] = $this->get->tampil_golongan();
        $data['jenis'] = $this->get->tampil_jenis();
        $data['master'] = $this->get->edit_master($where, 'master')->result();
        $this->load->view('_partials/header');
        $this->load->view('_partials/menu');
        $this->load->view('master/editmas', $data);
        $this->load->view('_partials/footer');
    }

    public function update_master()
    {
        $id     = $this->input->post('id');
        $nama     = $this->input->post('nama');
        $ukuran     = $this->input->post('ukuran');
        $sat1     = $this->input->post('sat1');
        $max1     = $this->input->post('max1');
        $sat2     = $this->input->post('sat2');
        $max2     = $this->input->post('max2');
        $sat3     = $this->input->post('sat3');
        $kdgol     = $this->input->post('kdgol');
        $kdjenis     = $this->input->post('kdjenis');

        $data = array(
            'nama' => $nama,
            'ukuran' => $ukuran,
            'sat1' => $sat1,
            'max1' => $max1,
            'sat2' => $sat2,
            'max2' => $max2,
            'sat3' => $sat3,
            'kdgol' => $kdgol,
            'kdjenis' => $kdjenis
        );
        $where = array(
            'id' => $id
        );

        $this->edit->update($where, $data, 'master');
        redirect('master');
    }

    public function hapus_master($id)
    {
        $where = array('id' => $id);
        $this->delete->hapus($where, 'master');
        redirect('master');
    }
}
