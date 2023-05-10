<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class detailsal_api extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
    }

    //Menampilkan data kontak
    function index_get() {
        $detailsal = $this->db->get("detailsal")->result();
        $this->response($detailsal);
    }


    //Masukan function selanjutnya disini
}
?>