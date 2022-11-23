<?php
class Masuk_track_model extends CI_Model
{
    public function tampil_masuk_track($limit,$start,$keyword=null)
    {
        $this->db->Select("*")
            ->from('riwayattrack,master,tb_user')
            ->where("master.kode=riwayattrack.kode AND riwayattrack.keluar=0 AND riwayattrack.adm=tb_user.user_id")
            ->order_by('riwayattrack.no', 'DESC');
            if($keyword){
                $this->db->group_start();
                $this->db->like('noform',$keyword);
                $this->db->or_like('riwayattrack.kode',$keyword);
                $this->db->or_like('master.nama',$keyword);
                $this->db->or_like('tglform',$keyword);
                $this->db->or_like('tanggal',$keyword);
                $this->db->or_like('tb_user.username',$keyword);
                $this->db->group_end();
                }
        return $this->db->get('', $limit, $start)->result();
    }

    public function total_masuk_track($keyword=null)
    {
        $this->db->select('*');
        $this->db->from('riwayattrack');
        $this->db->join('master', 'master.kode=riwayattrack.kode')->join('tb_user','tb_user.user_id=riwayattrack.adm');
        $this->db->where('keluar=0');
        if($keyword){
            $this->db->group_start();
            $this->db->like('noform',$keyword);
            $this->db->or_like('riwayattrack.kode',$keyword);
            $this->db->or_like('master.nama',$keyword);
            $this->db->or_like('tglform',$keyword);
            $this->db->or_like('tanggal',$keyword);
            $this->db->or_like('tb_user.username',$keyword);
            $this->db->group_end();
        }
            return $this->db->count_all_results();
    }

    public function tampil_master()
    {
        return $this->db->get('master')->result();
    }

    public function tampil_palet()
    {
        return $this->db->get('pallet')->result();
    }

    public function riwayat_all()
    {
        $this->db->select('*');
        $this->db->from('riwayattrack');
        $this->db->join('master', 'master.kode=riwayattrack.kode');
        $this->db->order_by('riwayattrack.no', 'DESC')->limit(20);
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