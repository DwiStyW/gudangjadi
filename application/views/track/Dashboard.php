<?php 
/**
* @property db $db
*/
class Dashboard extends CI_Controller{
    public function index(){
        // $jumlah = $this->db->select("nopallet")->group_by("nopallet")->get("detailsal")->num_rows();
        $data['belumpallet']=$this->db->select("kode,sum(qty)")->from("detailsalqty")->where('ket',"IN")->group_by("kode")->get();
        $data['belumkeluar']=$this->db->select("kode,sum(qty)")->from("detailsalqty")->where('ket',"OUT")->group_by("kode")->get();
        $this->load->view("dashboard",$data);
    }

    public function refresh(){
        $this->db->query("UPDATE pallet SET status = 'kosong'");
        $this->db->query("UPDATE pallet SET qty = 0");
        $detailsal = $this->db->query("SELECT nopallet,sum(qty) as qty FROM `detailsal` GROUP BY nopallet");
        foreach($detailsal->result() as $detsal){
            $nopallet = $detsal->nopallet;
            $qty = $detsal->qty;
            $this->db->query('UPDATE pallet SET qty = "'.$qty.'" WHERE kdpallet = "'.$nopallet.'"');
            $this->db->query('UPDATE pallet SET status = "isi" WHERE kdpallet = "'.$nopallet.'"');
        }
        $terpakai = $this->db->select("nopallet")->group_by("nopallet")->get("detailsal")->num_rows();
        $pallet = $this->db->get("pallet")->num_rows();
        $takterpakai = abs($pallet - $terpakai);
        $data = array(
            "terpakai"=>$terpakai,
            "takterpakai"=>$takterpakai,
        );
        echo json_encode($data);
    }
}