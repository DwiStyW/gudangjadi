<?php
class Home extends CI_Controller
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
            $this->session->set_userdata('keyword_home',$data['keyword']);
        }else{
            $data['keyword']=$this->session->userdata('keyword_home');
        }

        //set config
        $config['base_url'] = 'http://192.168.10.99/gudangtrial/home/index';
        $config['total_rows'] = $this->home_model->total_saldo($data['keyword']);
        $range = $this->input->post('range');
        $config['per_page'] = $range;
        if ($range == null) {
            $config['per_page'] = 10;
        } elseif ($range == "all") {
            $config['per_page'] = null;
        }
        $this->pagination->initialize($config);

        // $this->db->query("UPDATE pallet SET status = 'kosong'");
        // $this->db->query("UPDATE pallet SET qty = 0");
        // $detailsal = $this->db->query("SELECT nopallet,sum(qty) as qty FROM `detailsal` GROUP BY nopallet");
        // foreach($detailsal->result() as $detsal){
        //     $nopallet = $detsal->nopallet;
        //     $qty = $detsal->qty;
        //     $this->db->query('UPDATE pallet SET qty = "'.$qty.'" WHERE kdpallet = "'.$nopallet.'"');
        //     $this->db->query('UPDATE pallet SET status = "isi" WHERE kdpallet = "'.$nopallet.'"');
        //     // echo "<table><tr><td>". $i++ ."</td><td>".$nopallet."</td><td>".$qty."</td></tr></table>";
        // }

        $data['start'] = $this->uri->segment(3);
        $data['saldo'] = $this->home_model->tampil_saldo($config['per_page'], $data['start'],$data['keyword']);
        $data['riwayat'] = $this->home_model->tampil_riwayat();
        $this->load->view('_partials/header');
        $this->load->view('_partials/menu');
        $this->load->view('home', $data);
        $this->load->view('_partials/footer');
    }
}
