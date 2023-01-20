<?php
class Mapping extends CI_Controller
{
    
    public function index()
    {
       
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("mapping");
        $this->load->view("_partials/footer");
    }
	public function modal($pallet)
    {
		$data['pallet']=$pallet;
		$this->load->view("_partials/header");
        $this->load->view("modal-mapping.php",$data);
		$this->load->view("_partials/footer_modal");
    }
}