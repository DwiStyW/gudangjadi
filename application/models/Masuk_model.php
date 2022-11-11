<?php
class Masuk_model extends CI_Model
{
    // Get data barang masuk
    public function tampil_barang_masuk($limit, $start)
    {
        $this->db->Select("*")
            ->from('riwayat,master,tb_user')
            ->where("master.kode=riwayat.kode AND riwayat.keluar=0 AND riwayat.adm=tb_user.user_id")
            ->order_by('riwayat.no', 'DESC');
        return $this->db->get('', $limit, $start)->result();
    }

    public function total_barang_masuk()
    {
        $this->db->select('*')->from('riwayat')->where('keluar=0');
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
