<?php
class Home_model extends CI_Model
{
    // Get data home
    public function tampil_saldo($limit,$start,$keyword=null)
    {
        $this->db->select('*');
        $this->db->from('saldo,master,golongan,jenis');
        $this->db->where('master.kode = saldo.kode AND master.kdgol = golongan.id AND master.kdjenis = jenis.id');
        if($keyword){
            $this->db->like('namagol',$keyword);
            $this->db->or_like('namajenis',$keyword);
            $this->db->or_like('master.kode',$keyword);
            $this->db->or_like('master.nama',$keyword);
            $this->db->or_like('saldo.tglform',$keyword);
            $this->db->or_like('saldo.tanggal',$keyword);
        }
        return $this->db->get('',$limit,$start)->result();
    }

    public function total_saldo($keyword=null)
    {
        $this->db->select('*');
        $this->db->from('saldo');
        $this->db->join('master','master.kode = saldo.kode')->join ('golongan','master.kdgol = golongan.id')->join('jenis','master.kdjenis = jenis.id');
        if($keyword){
            $this->db->like('namagol',$keyword);
            $this->db->or_like('namajenis',$keyword);
            $this->db->or_like('master.kode',$keyword);
            $this->db->or_like('master.nama',$keyword);
            $this->db->or_like('saldo.tglform',$keyword);
            $this->db->or_like('saldo.tanggal',$keyword);
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
