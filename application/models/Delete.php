<?php
class delete extends CI_Model
{
    public function hapus($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
