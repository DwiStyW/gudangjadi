<?php
class golongan_model extends CI_Model
{
    public function tampil_golongan()
    {
        return $this->db->get('golongan')->result();
    }

    public function tambah_golongan($data, $table)
    {
        $this->db->insert($table, $data);
    }
}
