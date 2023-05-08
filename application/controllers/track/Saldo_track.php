<?php
class saldo_track extends CI_Controller
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

    public function index()
    {
        $this->load->library('pagination');
        //untuk search
        $keyword=$this->input->post('keyword');
        if(isset($keyword)){
            $data['keyword']=$this->input->post('keyword');
            $this->session->set_userdata('keyword_saldo',$data['keyword']);
        }else{
            $data['keyword']=$this->session->userdata('keyword_saldo');
        }

        //untuk pagination
        $this->load->model('Saldo_model');
        $config['base_url'] = 'http://localhost/gudangtrial/track/saldo_track/index';
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
        $data['kode']= $this->db->query("SELECT DISTINCT kode FROM detailsal");
        $data['batch']= $this->db->query("SELECT DISTINCT nobatch FROM detailsal");
        $data['pallet']= $this->db->query("SELECT DISTINCT nopallet FROM detailsal");
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("track/saldo", $data);
        $this->load->view("_partials/footer");
    }

    public function filter(){
        $kode=$this->input->post('kode');
        $batch=$this->input->post('batch');
        $pallet=$this->input->post('pallet');
        //diisi semua
        if($kode!=null and $batch!=null and $pallet!=null){
            $data = $this->db->join('master','master.kode=detailsal.kode')->where('detailsal.kode',$kode)->where('detailsal.nobatch',$batch)->where('detailsal.nopallet',$pallet)->get('detailsal')->result();
        }
        //diisi kode dan batch
        elseif($kode!=null and $batch!=null and $pallet==null){
            $data = $this->db->join('master','master.kode=detailsal.kode')->where('detailsal.kode',$kode)->where('detailsal.nobatch',$batch)->get('detailsal')->result();
        }
        //diisi kode dan pallet
        elseif($kode!=null and $batch==null and $pallet!=null){
            $data = $this->db->join('master','master.kode=detailsal.kode')->where('detailsal.kode',$kode)->where('detailsal.nopallet',$pallet)->get('detailsal')->result();
        }
        //diisi batch dan pallet
        elseif($kode==null and $batch!=null and $pallet!=null){
            $data = $this->db->join('master','master.kode=detailsal.kode')->where('detailsal.nobatch',$batch)->where('detailsal.nopallet',$pallet)->get('detailsal')->result();
        }
        //diisi kode
        elseif($kode!=null and $batch==null and $pallet==null){
            $data = $this->db->join('master','master.kode=detailsal.kode')->where('detailsal.kode',$kode)->get('detailsal')->result();
        }
        //diisi batch
        elseif($kode==null and $batch!=null and $pallet==null){
            $data = $this->db->join('master','master.kode=detailsal.kode')->where('detailsal.nobatch',$batch)->get('detailsal')->result();
        }
        //diisi pallet
        elseif($kode==null and $batch==null and $pallet!=null){
            $data = $this->db->join('master','master.kode=detailsal.kode')->where('detailsal.nopallet',$pallet)->get('detailsal')->result();
        }
        echo json_encode($data);
    }
}