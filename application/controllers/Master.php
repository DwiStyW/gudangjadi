<?php
class Master extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != 'user' && $this->session->userdata('role') != 'ppic' && $this->session->userdata('role') != 'admin' && $this->session->userdata('role') != 'manager' && $this->session->userdata('role') != 'track') {
            $this->session->set_flashdata('pesan', '<div class="fade show" style="color:red" role="alert">
  Anda Belum Login!
</div><br>');
            redirect('auth/logout');
        }
    }
    public function index()
    {
        //load library
        $this->load->library('pagination');

        //untuk search
        $keyword=$this->input->post('keyword');
        if(isset($keyword)){
            $data['keyword']=$this->input->post('keyword');
            $this->session->set_userdata('keyword',$data['keyword']);
        }else{
            $data['keyword']=$this->session->userdata('keyword');
        }

        //set config
        $config['base_url'] = 'http://localhost/gudangjadi_CI/master/index';
        $config['total_rows'] = $this->master_model->total_master($data['keyword']);
        $range = $this->input->post('range');
        $config['per_page'] = $range;
        if ($range == null) {
            $config['per_page'] = 10;
        } elseif ($range == "all") {
            $config['per_page'] = null;
        }
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['master'] = $this->master_model->tampil_master($config['per_page'], $data['start'],$data['keyword']);
        $data['golongan'] = $this->golongan_model->tampil_golongan();
        $data['jenis'] = $this->master_model->tampil_jenis();
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("master/master", $data);
        $this->load->view("_partials/footer");
    }

    public function input_master(){
        $data['golongan'] = $this->golongan_model->tampil_golongan();
        $data['jenis'] = $this->master_model->tampil_jenis();
        $this->load->view('_partials/header');
        $this->load->view('_partials/menu');
        $this->load->view('master/inputmaster',$data);
        $this->load->view('_partials/footer');
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
        $expdate     = $this->input->post('expdate');

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
            'saldo' => 0,
            'tgl_dibuat'=>date("Y-m-d"),
            'tglform'=>'',
            'tgl_update'=>date('Y-m-d'),
            'saldo_track'=>0,
            'expdate' => $expdate
        );

        // $data1=array(
        //     'no'=>'',
        //     'kode' => $kode,
        //     'saldo' => 0,
        //     'tglform'=>'',
        //     'tanggal'=> date("Y-m-d H:i:s")
        // );

        $q = $this->db->query("SELECT * FROM master where kode = '$kode'");
        $kodem = $q->num_rows();
        if($kodem>0){
            $this->session->set_flashdata("peringatan", "Kode Barang $kode sudah ada sebelumnya");
            redirect('master/input_master');
        }else{
            $this->db->trans_start();
            $this->master_model->tambah($data,'master');
            // $this->master_model->tambah($data1, 'saldo');
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE)
            {
                // generate an error... or use the log_message() function to log your error
                $this->session->set_flashdata("gagal", "Input Master Error");
            }else{
                $this->session->set_flashdata("berhasil", "Input Master Success");
            }
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
        $id       = $this->input->post('id');
        $nama     = $this->input->post('nama');
        $ukuran   = $this->input->post('ukuran');
        $sat1     = $this->input->post('sat1');
        $max1     = $this->input->post('max1');
        $sat2     = $this->input->post('sat2');
        $max2     = $this->input->post('max2');
        $sat3     = $this->input->post('sat3');
        $kdgol    = $this->input->post('kdgol');
        $kdjenis  = $this->input->post('kdjenis');
        $expdate  = $this->input->post('expdate');
        

        $data = array(
            'nama' => $nama,
            'ukuran' => $ukuran,
            'sat1' => $sat1,
            'max1' => $max1,
            'sat2' => $sat2,
            'max2' => $max2,
            'sat3' => $sat3,
            'kdgol' => $kdgol,
            'kdjenis' => $kdjenis,
            'expdate' => $expdate
        );
        $where = array(
            'id' => $id
        );

        $this->db->trans_start();
            $this->master_model->update($where,$data,'master');
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE)
            {
                // generate an error... or use the log_message() function to log your error
                $this->session->set_flashdata("gagal", "Input Master Error");
            }else{
                $this->session->set_flashdata("berhasil", "Input Master Success");
            }
                redirect('master');
    }

    public function hapus_master($id)
    {
        $where = array('id' => $id);
        $this->db->trans_start();
            $this->master_model->hapus($where,'master');
            // $this->master_model->tambah($data1, 'saldo');
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE)
            {
                // generate an error... or use the log_message() function to log your error
                $this->session->set_flashdata("gagal", "Input Master Error");
            }else{
                $this->session->set_flashdata("berhasil", "Input Master Success");
            }
                redirect('master');
    }
}