<?php 
class mapping2 extends CI_Controller
{
    public function index()
    {
        $this->load->view('_partials/header');
        $this->load->view('_partials/menu');
        $this->load->view('mapping2');
        $this->load->view('_partials/footer');
    }
	function edit(){
		$pallet1 = $this->input->post('pallet1',TRUE);
		$pallet2 = $this->input->post('pallet2',TRUE);
		$posisi1 = $this->input->post('posisi1',TRUE);
		$posisi2 = $this->input->post('posisi2',TRUE);

		if($pallet2!=null){
			$cekpallet=$this->db->query("SELECT * From pallet where kdpallet='$pallet2'");
			$cekkondisi=$this->db->query("SELECT * From kondisi_gudang where id='$pallet2'");

			if($cekpallet->num_rows()!=0){
				$this->db->query("UPDATE pallet SET posisi='$posisi1' WHERE kdpallet='$pallet2'");
			}
			
			if($cekkondisi->num_rows()!=0){
				$this->db->query("UPDATE kondisi_gudang SET posisi='$posisi1' WHERE id='$pallet2'");
			}
		}
		if($pallet1!=null){
			$cekpallet=$this->db->query("SELECT * From pallet where kdpallet='$pallet1'");
			$cekkondisi=$this->db->query("SELECT * From kondisi_gudang where id='$pallet1'");

			if($cekpallet->num_rows()!=0){
				$this->db->query("UPDATE pallet SET posisi='$posisi2' WHERE kdpallet='$pallet1'");
			}
			
			if($cekkondisi->num_rows()!=0){
				$this->db->query("UPDATE kondisi_gudang SET posisi='$posisi2' WHERE id='$pallet1'");
			}
		}
	}
}