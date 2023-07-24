<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class detailsal_api extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    //Menampilkan data kontak
     public function store(){
        $index = $this->input->post('index');
        for($i=0;$i<=$index;$i++) {
            $saldo = $this->db->select("saldo")->where("kode",$this->input->post('kode')[$i])->get("saldo")->result();
            foreach($saldo as $s) {
                $saldo_arr[$i]=$s->saldo;
                $total[$i] = $saldo_arr[$i] + $this->input->post('qty')[$i];
            }
            $data_riwayat=array(
                "tglform"=>$this->input->post('tglform'),
                "noform"=>$this->input->post('noform'),
                "kode"=>$this->input->post('kode')[$i],
                "masuk"=>$this->input->post('qty')[$i],
                "suplai"=>$this->input->post('suplier')[$i],
                "cat"=>$this->input->post('cat')[$i],
                "keluar"=>0,
                "saldo"=>$saldo_arr[$i],
                "tanggal"=>date("Y-m-d H:i:s"),
                "ket"=>"Input",
                "adm"=>6,
                "tgltrima"=>"0000-00-00",
            );
            $data_masuk=array(
                "tglform"=>$this->input->post('tglform'),
                "noform"=>$this->input->post('noform'),
                "kode"=>$this->input->post('kode')[$i],
                "jumlah"=>$this->input->post('qty')[$i],
                "saldo"=>$saldo_arr[$i],
                "suplai"=>$this->input->post('suplier')[$i],
                "cat"=>$this->input->post('cat')[$i],
                "tanggal"=>date("Y-m-d H:i:s"),
                "adm"=>6,
            );
            $data_saldo = array("saldo"=>$total[$i]);

            $this->db->trans_start();
            $this->db->insert('riwayat', $data_riwayat);
            $this->db->where("kode",$this->input->post('kode')[$i])->update('saldo', $data_saldo);
            $this->db->insert('masuk',$data_masuk);
            $this->db->trans_complete();
            
            if($this->db->trans_status()===false) {
                $response[] = array(
                    "text"=>"Gagal ditambahkan!",
                    "icon"=>"error",
                    "bg"=>"bg-danger"
                );
            } else {
                $response[] = array(
                    "text"=>"Berhasil ditambahkan!",
                    "icon"=>"success",
                    "bg"=>"bg-success"
                );
            }
        }
        echo json_encode($response);
    }

    public function edit(){
        $data_riwayat = array(
            "tglform"=>$this->input->post("tglform"),
            "noform"=>$this->input->post("noform"),
            "masuk"=>$this->input->post("qty"),
            "suplai"=>$this->input->post("suplier"),
            "cat"=>$this->input->post("cat"),
            "ket"=>"revisiIN"
        );
        $saldo = $this->db->where('kode',$this->input->post("kodelama"))->get("saldo")->result();
        foreach($saldo as $s){
            $total = $s->saldo - $this->input->post("qtylama") + $this->input->post("qty");
        }
        $data_saldo = array("saldo"=>$total);
        if($total>=0){
            $this->db->trans_start();
            $this->db->where("no",$this->input->post("no"))->update("riwayat",$data_riwayat);
            $this->db->where("kode",$this->input->post("kodelama"))->update("saldo",$data_saldo); 
            $this->db->trans_complete();
            
            if($this->db->trans_status()=== FALSE){
                $this->session->set_flashdata("gagal","Gagal di edit!");
            }else{
                $this->session->set_flashdata("berhasil","Berhasil di edit!");
            }
        } else{
            $this->session->set_flashdata("gagal","Stock tidak cukup!");
        }
        redirect("gudang/masuk");
    }

    public function hapus(){
        $no = $this->input->post("no");
        $kode = $this->input->post("kode");
        $qty = $this->input->post("qty");
        $saldo = $this->db->where('kode',$this->input->post("kode"))->get("saldo")->result();
        foreach($saldo as $s){
            $total = $s->saldo - $qty;
        }
        $data_saldo = array("saldo"=>$total);
        if($total>=0) {
            $this->db->trans_start();
            $this->db->where("no", $no)->delete('riwayat');
            $this->db->where("kode", $kode)->update('saldo',$data_saldo);
            $this->db->trans_complete();

            if($this->db->trans_status()=== FALSE){
                $this->session->set_flashdata("gagal","Gagal di hapus!");
            }else{
                $this->session->set_flashdata("berhasil","Berhasil di hapus!");
            }
        }else{
            $this->session->set_flashdata("gagal","Gagal di hapus karena jumlah stock tersisa:".$s->saldo."!");
        }
        redirect("gudang/masuk");
    }


    //Masukan function selanjutnya disini
}
?>