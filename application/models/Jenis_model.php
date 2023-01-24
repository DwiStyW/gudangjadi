<?php
class Jenis_model extends CI_Model
{
    //Get data jenis
    public function tampil_jenis()
    {
        return $this->db->get('jenis')->result();
    }

    //insert jenis
    public function tambah($data, $table)
    {
        $this->db->insert($table, $data);
    }

    //update jenis
    public function update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    //Delete jenis
    public function hapus($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
