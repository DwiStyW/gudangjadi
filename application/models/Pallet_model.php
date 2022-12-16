<?php
class Pallet_model extends CI_Model
{

    function get_new_posisi($pallet1)
    {
        $query = $this->db->query("SELECT * FROM pallet where kdpallet='$pallet1'");
		return $query;
    }

}
