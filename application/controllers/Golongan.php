<?php
class Golongan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != 'user' && $this->session->userdata('role') != 'admin' && $this->session->userdata('role') != 'manager') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  Anda Belum Login!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
            redirect('auth/login');
        }
    }
    public function index()
    {
        $data['golongan'] = $this->get->tampil_golongan();
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("golongan", $data);
        $this->load->view("_partials/footer");
    }

    public function tambah_golongan()
    {
        $id = $this->input->post('id');
        $kdgol = $this->input->post('kdgol');
        $namagol = $this->input->post('namagol');

        $data = array(
            'id' => $id,
            'kdgol' => $kdgol,
            'namagol' => $namagol
        );

        $this->insert->tambah($data, 'golongan');
        redirect('golongan');
    }

    public function update_golongan()
    {
        $id = $this->input->post('id');
        $kdgol = $this->input->post('kdgol');
        $namagol = $this->input->post('namagol');

        $data = array(
            'kdgol' => $kdgol,
            'namagol' => $namagol
        );
        $where = array(
            'id' => $id,
        );

        $this->edit->update($where, $data, 'golongan');
        redirect('golongan');
    }

    public function hapus_golongan($id)
    {
        $where = array('id' => $id);
        $this->delete->hapus($where, 'golongan');
        redirect('golongan');
    }

    public function filgolongan()
    {
        $data['golongan'] = $this->get->tampil_golongan();
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("report/reportgr", $data);
        $this->load->view("_partials/footer");
    }

    public function tampilreportgr()
    {
        $start = $this->input->post("start");
        $end   = $this->input->post("end");
        $kdgol = $this->input->post("kode");

        $data = array(
            'start' => $start,
            'end'   => $end,
            'kode'  => $kdgol
        );

        $data["riwayat"] = $this->get->filgol($kdgol, $start, $end);
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("report/tampilreportgr", $data);
        $this->load->view("_partials/footer");
    }

    public function printrepgr($start, $end, $kode)
    {
        $data = array(
            'start' => $start,
            'end'  => $end,
            'kode' => $kode
        );

        $this->load->view("_partials/header");
        $this->load->view("report/printrepgr", $data);
    }
}
