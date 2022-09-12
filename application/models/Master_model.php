<?php
class master_model extends CI_Model
{
    public function tampil_master()
    {
        $this->db->select('master.*,golongan.namagol,jenis.namajenis');
        $this->db->from('master,golongan,jenis');
        $this->db->where('master.kdgol = golongan.id AND master.kdjenis = jenis.id');
        $this->db->order_by('master.id', 'DESC');
        return $this->db->get()->result();
    }

    public function tambah_master($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function edit_master($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function get_gol()
    {
        return $this->db->get('golongan')->result();
    }

    public function get_jen()
    {
        return $this->db->get('jenis')->result();
    }

    public function update_master($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapus_master($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
