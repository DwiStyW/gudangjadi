<?php
class Master extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != 'user' && $this->session->userdata('role') != 'admin' && $this->session->userdata('role') != 'manager') {
            $this->session->set_flashdata('pesan', '<div class="fade show" style="color:red" role="alert">
  Anda Belum Login!
</div><br>');
            redirect('auth/login');
        }
    }
    public function index()
    {
        //load library
        $this->load->library('pagination');

        //set config
        $config['base_url'] = 'http://localhost/gudangjadi/master/index';
        $config['total_rows'] = $this->master_model->total_master();
        $range = $this->input->post('range');
        $config['per_page'] = $range;
        if ($range == null) {
            $config['per_page'] = 15;
        } elseif ($range == "all") {
            $config['per_page'] = null;
        }
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['master'] = $this->master_model->tampil_master($config['per_page'], $data['start']);
        $data['golongan'] = $this->golongan_model->tampil_golongan();
        $data['jenis'] = $this->master_model->tampil_jenis();
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

        $data1 = array(
            'no' => '',
            'kode' => $kode,
            'saldo' => 0,
            'tglform' => date("Y-m-d"),
            'tanggal' => date("Y-m-d H:i:s")
        );

        if (isset($data) && isset($data1)) {
            $this->master_model->tambah($data, 'master');
            $this->master_model->tambah($data1, 'saldo');
            $this->session->set_flashdata("berhasil", "Input Master Success");
            redirect('master');
        } else {
            $this->session->set_flashdata("gagal", "Input Master Error");
            redirect('master');
        }
    }

    public function editmas($id)
    {
        $where = array('id' => $id);
        $data['golongan'] = $this->golongan_model->tampil_golongan();
        $data['jenis'] = $this->master_model->tampil_jenis();
        $data['master'] = $this->master_model->get_where($where, 'master')->result();
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

        $this->master_model->update($where, $data, 'master');
        redirect('master');
    }

    public function hapus_master($id)
    {
        $where = array('id' => $id);
        $saldo = $this->db->query("SELECT kode from master where id = '$id'");
        foreach ($saldo->result() as $data) {
            $kode = $data->kode;
        }
        $where1 = array('kode' => $kode);
        if (isset($where) && isset($where1)) {
            $this->master_model->hapus($where1, 'saldo');
            $this->master_model->hapus($where, 'master');
            $this->session->set_flashdata("berhasil", "Hapus Master Success");
            redirect('master');
        } else {
            $this->session->set_flashdata("gagal", "Hapus Master Error");
            redirect('master');
        }
    }
}
