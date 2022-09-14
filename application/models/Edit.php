<?php
class edit extends CI_Model
{
    public function update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
