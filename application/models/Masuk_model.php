<?php
class Masuk_model extends CI_Model
{
    // Get data barang masuk
    public function tampil_barang_masuk($limit, $start,$keyword)
    {
        $this->db->Select("*")
            ->from('riwayat,master,tb_user')
            ->where("master.kode=riwayat.kode AND riwayat.keluar=0 AND riwayat.adm=tb_user.user_id")
            ->order_by('riwayat.no', 'DESC');
            if($keyword){
                $this->db->group_start();
                $this->db->like('noform',$keyword);
                $this->db->or_like('riwayat.kode',$keyword);
                $this->db->or_like('master.nama',$keyword);
                $this->db->or_like('tglform',$keyword);
                $this->db->or_like('tanggal',$keyword);
                $this->db->or_like('tb_user.username',$keyword);
                $this->db->group_end();
                }
        return $this->db->get('', $limit, $start)->result();
    }

    public function total_barang_masuk($keyword=null)
    {
        $this->db->select('*');
        $this->db->from('riwayat');
        $this->db->join('master', 'master.kode=riwayat.kode')->join('tb_user','tb_user.user_id=riwayat.adm');
        $this->db->where('keluar=0');
        if($keyword){
            $this->db->group_start();
            $this->db->like('noform',$keyword);
            $this->db->or_like('riwayat.kode',$keyword);
            $this->db->or_like('master.nama',$keyword);
            $this->db->or_like('tglform',$keyword);
            $this->db->or_like('tanggal',$keyword);
            $this->db->or_like('tb_user.username',$keyword);
            $this->db->group_end();
            }
            return $this->db->count_all_results();
    }

    // tampil data master
    public function tampil_master()
    {
        return $this->db->get('master')->result();
    }

    public function riwayat_all($noform=null)
    {
        $this->db->select('*');
        $this->db->from('riwayat');
        if($noform){
            $this->db->where('noform',$noform);
        }
        $this->db->join('master', 'master.kode=riwayat.kode');
        $this->db->order_by('riwayat.no', 'DESC')->limit(20);
        return $this->db->get()->result();
    }

    //get where
    public function get_where($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    // Edit Barang Masuk
    public function update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    // Tambah Barang Masuk
    public function tambah($data, $table)
    {
        $this->db->insert($table, $data);
    }

    // Hapus Barang Masuk
    public function hapus($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
