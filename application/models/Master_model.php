<?php
class Master_model extends CI_Model
{
    // Get data master
    public function tampil_master()
    {
        $this->db->select('master.*,golongan.namagol,jenis.namajenis');
        $this->db->from('master,golongan,jenis');
        $this->db->where('master.kdgol = golongan.id AND master.kdjenis = jenis.id');
        $this->db->order_by('master.id', 'DESC');
        return $this->db->get()->result();
    }
    public function total_master($keyword)
    {
        $this->db->select('*');
        $this->db->from('master');
        $this->db->join('golongan','master.kdgol = golongan.id')->join('jenis','master.kdjenis = jenis.id');
        $this->db->order_by('master.id', 'DESC');
        if($keyword){
            $this->db->group_start();
            $this->db->like('kode',$keyword);
            $this->db->or_like('nama',$keyword);
            $this->db->or_like('ukuran',$keyword);
            $this->db->or_like('sat1',$keyword);
            $this->db->or_like('max1',$keyword);
            $this->db->or_like('sat2',$keyword);
            $this->db->or_like('max2',$keyword);
            $this->db->or_like('sat3',$keyword);
            $this->db->or_like('namagol',$keyword);
            $this->db->or_like('namajenis',$keyword);
            $this->db->group_end();
            }
        return $this->db->get()->num_rows();
    }

    //Get data jenis
    public function tampil_jenis()
    {
        return $this->db->get('jenis')->result();
    }

    //insert Master & Saldo
    public function tambah($data,$table)
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
