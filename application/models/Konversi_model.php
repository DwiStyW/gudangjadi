<?php
class Konversi_model extends CI_Model
{
    public function tampil_konversi($limit, $start,$keyword)
    {
        $this->db->Select("*,riwayat.tglform as tanggalform")
            ->from('riwayat')
            ->join("master","master.kode=riwayat.kode") 
            ->join("tb_user", "riwayat.adm=tb_user.user_id")
            ->order_by('riwayat.no', 'DESC');
            if($keyword){
                $this->db->group_start();
                $this->db->like('noform',$keyword);
                $this->db->or_like('riwayat.kode',$keyword);
                $this->db->or_like('master.nama',$keyword);
                $this->db->or_like('riwayat.tglform',$keyword);
                $this->db->or_like('tanggal',$keyword);
                $this->db->or_like('tglsppb',$keyword);
                $this->db->or_like('ket',$keyword);
                $this->db->or_like('tb_user.username',$keyword);
                $this->db->group_end();
                }
        return $this->db->get('', $limit, $start)->result();
    }
    public function total_konversi($keyword=null)
    {
        $this->db->select('*');
        $this->db->from('riwayat');
        $this->db->join('master', 'master.kode=riwayat.kode')->join('tb_user','tb_user.user_id=riwayat.adm');
        if($keyword){
            $this->db->group_start();
            $this->db->like('noform',$keyword);
                $this->db->or_like('riwayat.kode',$keyword);
                $this->db->or_like('master.nama',$keyword);
                $this->db->or_like('riwayat.tglform',$keyword);
                $this->db->or_like('tanggal',$keyword);
                $this->db->or_like('tglsppb',$keyword);
                $this->db->or_like('ket',$keyword);
                $this->db->or_like('tb_user.username',$keyword);
            $this->db->group_end();
        }
            return $this->db->count_all_results();
    }
    public function tampil_konversi_track($limit, $start,$keyword)
    {
        $this->db->Select("*,riwayattrack.tglform as tanggalform")
            ->from('riwayattrack')
            ->join("master","master.kode=riwayattrack.kode") 
            ->join("tb_user", "riwayattrack.adm=tb_user.user_id")
            ->order_by('riwayattrack.no', 'DESC');
            if($keyword){
                $this->db->group_start();
                $this->db->like('noform',$keyword);
                $this->db->or_like('riwayattrack.kode',$keyword);
                $this->db->or_like('master.nama',$keyword);
                $this->db->or_like('riwayattrack.tglform',$keyword);
                $this->db->or_like('tanggal',$keyword);
                $this->db->or_like('tglsppb',$keyword);
                $this->db->or_like('ket',$keyword);
                $this->db->or_like('tb_user.username',$keyword);
                $this->db->group_end();
                }
        return $this->db->get('', $limit, $start)->result();
    }
    public function total_konversi_track($keyword=null)
    {
        $this->db->select('*');
        $this->db->from('riwayattrack');
        $this->db->join('master', 'master.kode=riwayattrack.kode')->join('tb_user','tb_user.user_id=riwayattrack.adm');
        if($keyword){
            $this->db->group_start();
            $this->db->like('noform',$keyword);
                $this->db->or_like('riwayattrack.kode',$keyword);
                $this->db->or_like('master.nama',$keyword);
                $this->db->or_like('riwayattrack.tglform',$keyword);
                $this->db->or_like('tanggal',$keyword);
                $this->db->or_like('tglsppb',$keyword);
                $this->db->or_like('ket',$keyword);
                $this->db->or_like('tb_user.username',$keyword);
            $this->db->group_end();
        }
            return $this->db->count_all_results();
    }
}