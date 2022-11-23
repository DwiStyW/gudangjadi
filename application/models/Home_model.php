<?php
class Home_model extends CI_Model
{
    // Get data home
    public function tampil_saldo($limit,$start,$keyword=null)
    {
        $this->db->select('master.*,golongan.namagol,jenis.namajenis');
        $this->db->from('master,golongan,jenis');
        $this->db->where('master.kdgol = golongan.id AND master.kdjenis = jenis.id');
        $this->db->order_by('master.id', 'DESC');
        if($keyword){
            $this->db->group_start();
            $this->db->like('kode',$keyword);
            $this->db->or_like('nama',$keyword);
            $this->db->or_like('ukuran',$keyword);
            $this->db->or_like('sat1',$keyword);
            $this->db->or_like('max1',$keyword);
            $this->db->or_like('sat2',$keyword);
            $this->db->or_like('sat3',$keyword);
            $this->db->or_like('namagol',$keyword);
            $this->db->or_like('namajenis',$keyword);
            $this->db->group_end();
            }
        return $this->db->get('', $limit, $start)->result();
    }

    public function total_saldo($keyword=null)
    {
        $this->db->select('*');
        $this->db->from('master');
        $this->db->join ('golongan','master.kdgol = golongan.id')->join('jenis','master.kdjenis = jenis.id');
        if($keyword){
            $this->db->like('namagol',$keyword);
            $this->db->or_like('namajenis',$keyword);
            $this->db->or_like('master.kode',$keyword);
            $this->db->or_like('master.nama',$keyword);
            $this->db->or_like('master.tglform',$keyword);
            $this->db->or_like('master.tgl_update',$keyword);
        }
        return $this->db->count_all_results();
    }

    public function tampil_riwayat()
    {
        $this->db->select('*');
        $this->db->from('riwayat,master,tb_user');
        $this->db->where('master.kode= riwayat.kode AND riwayat.adm = tb_user.user_id');
        $this->db->order_by('riwayat.no', 'DESC');
        return $this->db->get()->result();
    }
    //end get data home
}
