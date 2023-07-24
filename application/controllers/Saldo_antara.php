<?php
/**
 * @property  session $session
 * @property  input $input
 * @property  db $db
 */
class Saldo_antara extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != 'track' && $this->session->userdata('role') == 'admin' && $this->session->userdata('role') != 'manager') {
            $this->session->set_flashdata('pesan', '<div class="fade show" style="color:red" role="alert">
  Anda Belum Login!
</div><br>');
            redirect('auth/logout');
        }
    }

    public function in()
    {
        $this->load->view("track/saldo_antara");
    }
    public function out()
    {
        $this->load->view("track/saldo_out");
    }

    public function getdetailsalin(){
        $get=$this->db->Select("*")->from('detailsalqty')->where("ket","IN")->join("master","master.kode=detailsalqty.kode") ->order_by('detailsalqty.id', 'DESC')->get()->result();
        $no=1;
        foreach($get as $s){
            $sats1  = floor($s->qty / ($s->max1 * $s->max2));
            $sisa   = $s->qty - ($sats1 * $s->max1 * $s->max2);
            $sats2  = floor($sisa / $s->max2);
            $sats3  = $sisa - $sats2 * $s->max2;
            $data[]=array(
                "no"=> $no++,
                "nobatch"=>$s->nobatch,
                "kode"=>$s->kode,
                "nama"=>$s->nama,
                "sat1"=>$sats1.' '.$s->sat1,
                "sat2"=>$sats2.' '.$s->sat2,
                "sat3"=>$sats3.' '.$s->sat3,
                "ket"=>$s->ket,
            );
        }
        echo json_encode($data);
    }
    public function getdetailsalout(){
        $get=$this->db->Select("*")->from('detailsalqty')->where("ket","OUT")->join("master","master.kode=detailsalqty.kode") ->order_by('detailsalqty.id', 'DESC')->get()->result();
        $no=1;
        foreach($get as $s){
            $sats1  = floor($s->qty / ($s->max1 * $s->max2));
            $sisa   = $s->qty - ($sats1 * $s->max1 * $s->max2);
            $sats2  = floor($sisa / $s->max2);
            $sats3  = $sisa - $sats2 * $s->max2;
            $data[]=array(
                "no"=> $no++,
                "noform"=>$s->noform,
                "kode"=>$s->kode,
                "nama"=>$s->nama,
                "sat1"=>$sats1.' '.$s->sat1,
                "sat2"=>$sats2.' '.$s->sat2,
                "sat3"=>$sats3.' '.$s->sat3,
                "ket"=>$s->ket,
            );
        }
        echo json_encode($data);
    }
}