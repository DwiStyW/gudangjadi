<?php
class Master extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != 'user' && $this->session->userdata('role') != 'admin' && $this->session->userdata('role') != 'manager') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  Anda Belum Login!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
            redirect('auth/login');
        }
    }
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
            'kdjenis' => $kdjenis,
            'tgl' => date("Y-m-d H:i:s")
        );

        $data1 = array(
            'no' => $id,
            'kode' => $kode,
            'saldo' => '',
            'tglform ' => '',
            'tanggal' => date("Y-m-d H:i:s")
        );

        if (isset($data) && isset($data1)) {
            $this->insert->tambah($data1, 'saldo');
            $this->insert->tambah($data, 'master');
            redirect('master');
        }
    }

    public function editmas($id)
    {
        $where = array('id' => $id);
        $data['golongan'] = $this->get->tampil_golongan();
        $data['jenis'] = $this->get->tampil_jenis();
        $data['master'] = $this->get->get_where($where, 'master')->result();
        $this->load->view('_partials/header');
        $this->load->view('_partials/menu');
        $this->load->view('master/editmas', $data);
        $this->load->view('_partials/footer');
    }

    public function update_master()
    {
        $id     = $this->input->post('id');
        $kode   = $this->input->post('kode');
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
        $where = array(
            'id' => $id
        );

        $where1 = array(
            'no' => $id
        );

        $data1 = array(
            'kode' => $kode
        );

        $this->edit->update($where1, $data1, 'saldo');
        $this->edit->update($where, $data, 'master');
        redirect('master');
    }

    public function hapus_master($id)
    {
        $where = array('id' => $id);
        $where1 = array('no' => $id);


        if (isset($where) && isset($where1)) {
            $this->delete->hapus($where1, 'saldo');
            $this->delete->hapus($where, 'master');
            redirect('master');
        }
    }
}
