<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @property  session $session
 * @property  input $input
 * @property  db $db
 * 
 */
class Pemusnahan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function musnah()
    {
        $id = $this->input->post("id");
        $sat1 = $this->input->post("sat1");
        $sat2 = $this->input->post("sat2");
        $sat3 = $this->input->post("sat3");
        $tglform = $this->input->post("tglform");

        $detailsal = $this->db->where("no",$id)->get("detailsal")->result();
        foreach($detailsal as $ds){
            $kode = $ds->kode;
            $nobatch = $ds->nobatch;
            $nopallet = $ds->nopallet;
        }
        $master = $this->db->where("kode",$kode)->get("master")->result();
        foreach($master as $m){
            $max1 = $m->max1;
            $max2 = $m->max2;
        }
        $sats1 = $sat1 * $max1 * $max2;
        $sats2 = $sat2 * $max2;
        $jumlah = $sats1 + $sats2 + $sat3;
        echo $jumlah;
    }
}

/* End of file Pemusnahan.php and path \application\controllers\track\Pemusnahan.php */
