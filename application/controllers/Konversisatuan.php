<?php
/**
 * @property  session $session
 * @property  input $input
 * @property  db $db
 * @property  uri $uri
 * @property  pagination $pagination
 * @property  konversi_model $konversi_model
 * 
 */
class Konversisatuan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != 'user' && $this->session->userdata('role') != 'admin' && $this->session->userdata('role') != 'manager') {
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
            $this->session->set_userdata('keyword_konversi',$data['keyword']);
        }else{
            $data['keyword']=$this->session->userdata('keyword_konversi');
        }
        //untuk pagination
        $config['base_url'] = 'http://localhost/gudangtrial/konversisatuan/index';
        $config['total_rows'] = $this->konversi_model->total_konversi($data['keyword']);
        $range = $this->input->post('range');
        $config['per_page'] = $range;
        if ($range == null) {
            $config['per_page'] = 10;
        } elseif ($range == "all") {
            $config['per_page'] = null;
        }
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['master'] = $this->db->get('master')->result();
        $data['masuk'] = $this->konversi_model->tampil_konversi($config['per_page'], $data['start'], $data['keyword']);
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("convertsatuan", $data);
        $this->load->view("_partials/footer");
    }
    public function getkonversi()
    {
        $kode = $this->input->post('kode', true);
        $data = $this->db->where('kode',$kode)->get('master')->result();
        echo json_encode($data);
    }
}