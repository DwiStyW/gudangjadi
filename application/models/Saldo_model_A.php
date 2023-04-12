<?php
class saldo_model extends CI_Model
{
    // Get data barang masuk
    public function tampil_saldo_A($limit, $start,$keyword)
    {
        $this->db->Select("*")
            ->from('detailsalqty')
            ->join("master","master.kode=detailsalqty.kode") 
            ->order_by('detailsalqty.no', 'DESC');
            if($keyword){
                $this->db->group_start();
                $this->db->like('detailsalqty.nobatch',$keyword);
                $this->db->or_like('detailsalqty.kode',$keyword);
                $this->db->or_like('master.nama',$keyword);
                $this->db->or_like('detailsalqty.tglform',$keyword);
                $this->db->or_like('detailsalqty.noform',$keyword);
                $this->db->group_end();
                }
        return $this->db->get('', $limit, $start)->result();
    }

    public function total_saldo_A($keyword=null)
    {
        $this->db->select('*');
        $this->db->from('detailsalqty');
        $this->db->join('master', 'master.kode=detailsalqty.kode');
        if($keyword){
            $this->db->group_start();
            $this->db->like('detailsalqty.nobatch',$keyword);
            $this->db->or_like('detailsalqty.kode',$keyword);
            $this->db->or_like('master.nama',$keyword);
            $this->db->or_like('detailsalqty.tglform',$keyword);
            $this->db->or_like('detailsalqty.noform',$keyword);
            $this->db->group_end();
            }
        return $this->db->count_all_results();
    }

}