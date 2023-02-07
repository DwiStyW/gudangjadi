<?php
class Report_model_track extends CI_Model
{
    public function filriwayat($kode, $where, $where1)
    {
        $query=$this->db->query("SELECT * FROM riwayattrack,master WHERE riwayattrack.kode='$kode' AND master.kode=riwayattrack.kode AND riwayattrack.tglform between '$where' AND '$where1' order by riwayattrack.masuk DESC");
        return $query->result();
    }

    public function filgol($kode, $where, $where1)
    {
        $query = $this->db->query("SELECT * FROM riwayattrack,master WHERE master.kode = riwayattrack.kode AND master.kdgol='$kode' AND riwayattrack.tglform between '$where' AND '$where1' order by no ASC");
        return $query;
    }

    public function tampil_master()
    {
        return $this->db->get('master')->result();
    }

    public function tampil_golongan()
    {
        return $this->db->get('golongan')->result();
    }

    public function update($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
