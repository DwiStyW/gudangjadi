<?php
class Penginput extends CI_Controller
{
    public function user($adm)
    {
        $where = array('adm' => $adm);
        $data['penginput'] = $this->get->get_where($where, 'riwayat')->result();
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("penginput", $data);
        $this->load->view("_partials/footer");
    }
}
