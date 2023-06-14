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
        $this->load->view("manager/saldo");
    }

    public function tampil(){
        $riw= $this->db->join("master","master.kode = riwayat.kode")->order_by("no","DESC")->get("riwayat")->result();
        $no=0;
        foreach($riw as $r){
            if($r->masuk>0){
                $sats1  = floor($r->masuk / ($r->max1 * $r->max2));
                $sisa   = $r->masuk - ($sats1 * $r->max1 * $r->max2);
                $sats2  = floor($sisa / $r->max2);
                $sats3  = $sisa - $sats2 * $r->max2;
            }
            if($r->keluar>0){
                $sats1  = floor($r->keluar / ($r->max1 * $r->max2));
                $sisa   = $r->keluar - ($sats1 * $r->max1 * $r->max2);
                $sats2  = floor($sisa / $r->max2);
                $sats3  = $sisa - $sats2 * $r->max2;
            }
            $riwayat[]=array(
                "no"=>$no=$no+1,
                "kode"=>$r->kode,
                "nama"=>$r->nama,
                "tglform"=>$r->tglform,
                "noform"=>$r->noform,
                "nobatch"=>$r->nobatch,
                "sats1"=>$sats1.' '.$r->sat1,
                "sats2"=>$sats2.' '.$r->sat2,
                "sats3"=>$sats3.' '.$r->sat3,
                "ket"=>$r->ket,
                "cat"=>$r->cat,
                "tanggal"=>$r->tanggal,
            );
        }
        echo json_encode($riwayat);
    }
}