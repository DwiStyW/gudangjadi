<?php
class master_model extends CI_Model
{
    public function tampil_master()
    {
        $this->db->select('*');
        $this->db->from('master,golongan,jenis');
        $this->db->where('master.kdgol = golongan.id AND master.kdjenis = jenis.id');
        $this->db->order_by('master.id', 'DESC');
        return $this->db->get()->result();
    }
}
