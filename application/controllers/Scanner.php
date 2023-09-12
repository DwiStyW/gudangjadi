<?php
/**
 * @property  session $session
 * @property  input $input
 * @property  db $db
 */
class Scanner extends CI_Controller{

    public function index(){
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view('track/scan_detailsal');
        $this->load->view("_partials/footer");
    }

    public function detailpallet($nopallet){
        $data['saldo']=$this->db->select('*')->from('detailsal')->join('master', 'master.kode=detailsal.kode')->where("nopallet",$nopallet)->order_by("no","DESC")->get()->result();
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("track/tampil_scan",$data);
        $this->load->view("_partials/footer");
        
    }
}