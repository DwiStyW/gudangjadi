<?php
class get extends CI_Model
{
    // Get data home
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
    //end get data home

    // Get data master
    public function tampil_master()
    {
        $this->db->select('master.*,golongan.namagol,jenis.namajenis');
        $this->db->from('master,golongan,jenis');
        $this->db->where('master.kdgol = golongan.id AND master.kdjenis = jenis.id');
        $this->db->order_by('master.id', 'DESC');
        return $this->db->get()->result();
    }

    public function edit_master($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    //end get data master

    //Get data golongan
    public function tampil_golongan()
    {
        return $this->db->get('golongan')->result();
    }
    //end get data golongan

    //Get data jenis
    public function tampil_jenis()
    {
        return $this->db->get('jenis')->result();
    }
    //end get data jenis

    // Get data barang masuk
    public function tampil_barang_masuk()
    {
        $this->db->select('*');
        $this->db->from('riwayat,master,tb_user');
        $this->db->where("master.id=riwayat.kode AND riwayat.keluar=0 AND riwayat.adm=tb_user.user_id");
        $this->db->order_by('riwayat.no', 'DESC');
        return $this->db->get()->result();
    }
    //end get data barang masuk

    public function riwayat_all()
    {
        $this->db->select('*');
        $this->db->from('riwayat,master');
        $this->db->where("master.id=riwayat.kode");
        $this->db->order_by('riwayat.no', 'DESC')->limit(20);
        return $this->db->get()->result();
    }

    public function edit_masuk($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
}
