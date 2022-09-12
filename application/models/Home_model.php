<?php
class home_model extends CI_Model
{
    public function tampil_saldo()
    {
        $this->db->select('*');
        $this->db->from('saldo,master,golongan,jenis');
        $this->db->where('master.kode = saldo.kode AND master.kdgol = golongan.id AND master.kdjenis = jenis.id');
        return $this->db->get()->result();
    }

    public function tampil_riwayat()
    {
        $this->db->select('*');
        $this->db->from('riwayat,master,tb_user');
        $this->db->where('master.id = riwayat.kode AND riwayat.adm = tb_user.user_id');
        $this->db->order_by('riwayat.no', 'DESC');
        return $this->db->get()->result();
    }
}
