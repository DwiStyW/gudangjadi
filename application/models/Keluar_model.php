<?php
class Keluar_model extends CI_Model
{
    //get data barang keluar
    public function tampil_barang_keluar($limit, $start)
    {
        $this->db->select('*');
        $this->db->from('riwayat,master,tb_user');
        $this->db->where("master.kode=riwayat.kode AND riwayat.masuk=0 AND riwayat.adm=tb_user.user_id");
        $this->db->order_by('riwayat.no', 'DESC');
        return $this->db->get('', $limit, $start)->result();
    }

    public function total_barang_keluar()
    {
        $this->db->select('*')->from('riwayat')->where('masuk=0');
        return $this->db->get()->num_rows();
    }

    // tampil data master
    public function tampil_master()
    {
        return $this->db->get('master')->result();
    }

    public function riwayat_all()
    {
        $this->db->select('*');
        $this->db->from('riwayat,master');
        $this->db->where("master.kode=riwayat.kode");
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
