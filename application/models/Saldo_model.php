<?php
class saldo_model extends CI_Model
{
    // Get data barang masuk
    public function tampil_saldo($limit, $start,$keyword)
    {
        $this->db->Select("*")
            ->from('detailsal')
            ->join("master","master.kode=detailsal.kode") 
            ->order_by('detailsal.no', 'DESC');
            if($keyword){
                $this->db->group_start();
                $this->db->like('detailsal.nobatch',$keyword);
                $this->db->or_like('detailsal.kode',$keyword);
                $this->db->or_like('master.nama',$keyword);
                $this->db->or_like('detailsal.tgl',$keyword);
                $this->db->or_like('detailsal.nopallet',$keyword);
                $this->db->group_end();
                }
        return $this->db->get('', $limit, $start)->result();
    }

    public function total_saldo($keyword=null)
    {
        $this->db->select('*');
        $this->db->from('detailsal');
        $this->db->join('master', 'master.kode=detailsal.kode');
        if($keyword){
            $this->db->group_start();
            $this->db->like('detailsal.nobatch',$keyword);
            $this->db->or_like('detailsal.kode',$keyword);
            $this->db->or_like('master.nama',$keyword);
            $this->db->or_like('detailsal.tgl',$keyword);
            $this->db->or_like('detailsal.nopallet',$keyword);
            $this->db->group_end();
            }
        return $this->db->count_all_results();
    }
    public function tampilkan(){
        $this->db->select('*');
        $this->db->from('detailsal');
        $this->db->join('master', 'master.kode=detailsal.kode');
        $this->db->order_by("no","DESC");
        return $this->db->get()->result();
    }
}