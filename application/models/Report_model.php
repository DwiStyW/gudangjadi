<?php
class Report_model extends CI_Model
{
    public function filriwayat($kode, $where, $where1)
    {
        $this->db->select("*");
        $this->db->from("riwayat, master");
        if ($kode != "" || $kode != 0) {
            $this->db->where("riwayat.kode='$kode' AND master.kode=riwayat.kode AND tglform between '$where' AND '$where1'");
        } else {
            $this->db->where("master.kode=riwayat.kode AND tglform between '$where' AND '$where1'");
        }
        $this->db->order_by("riwayat.tglform", "ASC");
        $this->db->order_by("riwayat.masuk", "DESC");
        return $this->db->get();
    }
    public function filgol($kode, $where, $where1)
    {
        $this->db->select("*");
        $this->db->from("riwayat, master");
        $this->db->where("master.kode=riwayat.kode AND master.kdgol='$kode' AND riwayat.tglform between '$where' AND '$where1'");
        $this->db->order_by("no", "ASC");
        return $this->db->get();
    }

    public function tampil_master()
    {
        return $this->db->get('master')->result();
    }

    public function tampil_golongan()
    {
        return $this->db->get('golongan')->result();
    }
}
