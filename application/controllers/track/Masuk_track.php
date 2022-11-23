<?php
class Masuk_track extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != 'track' && $this->session->userdata('role') != 'admin' && $this->session->userdata('role') != 'manager') {
            $this->session->set_flashdata('pesan', '<div class="fade show" style="color:red" role="alert">
  Anda Belum Login!
</div><br>');
            redirect('auth/logout');
        }
    }

    public function index(){
        $this->load->library('pagination');
        //untuk search
        $keyword=$this->input->post('keyword');
        if(isset($keyword)){
            $data['keyword']=$this->input->post('keyword');
            $this->session->set_userdata('keyword_masuk_track',$data['keyword']);
        }else{
            $data['keyword']=$this->session->userdata('keyword_masuk_track');
        }
        //untuk pagination
        $config['base_url'] = 'http://localhost/gudangjadi/masuk_track/index';
        $config['total_rows'] = $this->masuk_track_model->total_masuk_track($data['keyword']);
        $range = $this->input->post('range');
        $config['per_page'] = $range;
        if ($range == null) {
            $config['per_page'] = 10;
        } elseif ($range == "all") {
            $config['per_page'] = null;
        }
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['masuk'] = $this->masuk_track_model->tampil_masuk_track($config['per_page'], $data['start'], $data['keyword']);
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("track/masuk/masuk_track", $data);
        $this->load->view("_partials/footer");

    }

    public function input_masuk_track(){
        $data['master']=$this->masuk_track_model->tampil_master();
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("track/masuk/input_masuk_track",$data);
        $this->load->view("_partials/footer");
    }
}