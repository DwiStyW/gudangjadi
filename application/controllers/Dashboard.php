<?php 
/**
* @property db $db
*/
class Dashboard extends CI_Controller{
    public function index(){
        // $jumlah = $this->db->select("nopallet")->group_by("nopallet")->get("detailsal")->num_rows();
        $data['jumdetsalqty']=$this->db->select("kode,sum(qty)")->from("detailsalqty")->where('ket',"IN")->group_by("kode")->get();
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("dashboard",$data);
        $this->load->view("_partials/footer");
    }
}