<?php
class SaldoAntara extends CI_Controller{
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

    public function index()
    {
        $this->load->library('pagination');
        //untuk search
        $keyword=$this->input->post('keyword');
        if(isset($keyword)){
            $data['keyword']=$this->input->post('keyword');
            $this->session->set_userdata('keyword_saldo_A',$data['keyword']);
        }else{
            $data['keyword']=$this->session->userdata('keyword_saldo_A');
        }

        //untuk pagination
        $this->load->model('Saldo_model');
        $config['base_url'] = 'http://localhost/gudangtrial/saldo_antara/index';
        $config['total_rows'] = $this->Saldo_model->total_saldo($data['keyword']);
        $range = $this->input->post('range');
        $config['per_page'] = $range;
        if ($range == null) {
            $config['per_page'] = 10;
        } elseif ($range == "all") {
            $config['per_page'] = null;
        }
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(4);
        $data['saldo'] = $this->Saldo_model->tampil_saldo($config['per_page'], $data['start'], $data['keyword']);
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("saldo_antara", $data);
        $this->load->view("_partials/footer");
    }
}