<?php
class Manager extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != 'manager') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  Anda Belum Login!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
        redirect('home');
        }
    }

    public function saldo(){
        $riw = $this->db->join("master","master.kode = riwayat.kode")->get("riwayat")->result();
        $no=0;
        foreach($riw as $r){
            $riwayat[]=array(
                "no"=>$no=$no+1,
                "kode"=>$r->kode,
                "nama"=>$r->nama,
                "tglform"=>$r->tglform,
                "noform"=>$r->noform,
                "nobatch"=>$r->nobatch,
                "ket"=>$r->ket,
                "cat"=>$r->cat,
                "tanggal"=>$r->tanggal,
            );
        }
        // $data["riwayat"]= json_encode($riwayat);
        $this->load->view("manager/saldo",$riwayat);
    }
}