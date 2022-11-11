<?php
class Master_model extends CI_Model
{
    // Get data master
    public function tampil_master($limit, $start)
    {
        $this->db->select('master.*,golongan.namagol,jenis.namajenis');
        $this->db->from('master,golongan,jenis');
        $this->db->where('master.kdgol = golongan.id AND master.kdjenis = jenis.id');
        $this->db->order_by('master.id', 'DESC');
        return $this->db->get('', $limit, $start)->result();
    }
    public function total_master()
    {
        $this->db->select('*');
        $this->db->from('master,golongan,jenis');
        $this->db->where('master.kdgol = golongan.id AND master.kdjenis = jenis.id');
        $this->db->order_by('master.id', 'DESC');
        return $this->db->get()->num_rows();
    }

    //Get data jenis
    public function tampil_jenis()
    {
        return $this->db->get('jenis')->result();
    }

    //insert Master & Saldo
    public function tambah($data, $table)
    {
        $this->db->insert($table, $data);
    }

    //get where
    public function get_where($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    //Update Master
    public function update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    //Hapus Master
    public function hapus($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
