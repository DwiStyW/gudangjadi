<?php
class Masuk_track extends CI_Model
{
    public function tampil_masuk_track()
    {
        $this->db->select('*');
        $this->db->from('riwayattrack');
        return $this->db->get()->result();
    }
}