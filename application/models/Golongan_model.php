<?php
class Golongan_model extends CI_Model
{
    //Get data golongan
    public function tampil_golongan()
    {
        return $this->db->get('golongan')->result();
    }

    //insert golongan
    public function tambah($data, $table)
    {
        $this->db->insert($table, $data);
    }

    //update golongan
    public function update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    //Delete golongan
    public function hapus($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
