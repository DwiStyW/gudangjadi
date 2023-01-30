<?php
class Mapping extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != 'track' && $this->session->userdata('role') != 'manager') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  Anda Belum Login!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
        redirect('home');
        }
    }
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

    public function getkdpallet(){
        $kdpallet = $this->input->post('kdpallet');
        $data = $this->db->where('nopallet',$kdpallet)->join('master', 'master.kode = detailsal.kode')->get('detailsal')->result();
        echo json_encode($data);
    }
}