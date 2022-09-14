<?php
class auth_model extends CI_Model
{
    public function cek_login()
    {
        $username = set_value('username');
        $password = md5(set_value('password'));

        $result = $this->db->get('tb_user')->where('username', $username)->where('password', $password)->limit(1);
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }
}
