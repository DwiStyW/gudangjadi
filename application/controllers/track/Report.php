<?php
class Report extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != 'track' && $this->session->userdata('role') != 'manager') {
            $this->session->set_flashdata('pesan', '<div class="fade show" style="color:red" role="alert">
  Anda Belum Login!
</div><br>');
            redirect('auth/logout');
        }
    }

    public function riwayat(){
        $data['master'] = $this->db->get("master")->result();
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("track/report/riw_fil",$data);
        $this->load->view("_partials/footer");
    }

    public function tampilriwayat(){
        $start = $this->input->post("start");
        $end   = $this->input->post("end");
        $kode = $this->input->post("kode");

        $data['riwayat'] = $this->report_model_track->filriwayat($kode, $start, $end);
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("track/report/riw_tampil", $data);
        $this->load->view("_partials/footer");
    }

    public function printriw($start, $end, $code)
    {
        $data = array('start' => $start, 'end' => $end, 'kode' => $code);
        $data['riwayat'] = $this->report_model_track->filriwayat($code, $start, $end);
        $this->load->view("_partials/header");
        $this->load->view("track/report/riw_print", $data);
        $this->load->view("_partials/footer");
    }

    public function filgolongan(){
        $data['golongan'] = $this->report_model->tampil_golongan();
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("track/report/gol_fil", $data);
        $this->load->view("_partials/footer");
    }

    public function tampil_gol()
    {
        $start = $this->input->post("start");
        $end   = $this->input->post("end");
        $kdgol = $this->input->post("kode");

        $data = array(
            'start' => $start,
            'end'   => $end,
            'kode'  => $kdgol
        );

        $data["riwayat"] = $this->report_model_track->filgol($kdgol, $start, $end);
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("track/report/gol_tampil", $data);
        $this->load->view("_partials/footer");
    }

    public function gol_print($start, $end, $kode)
    {
    $data = array(
        'start' => $start,
        'end'  => $end,
        'kode' => $kode
    );

    $this->load->view("_partials/header");
    $this->load->view("track/report/gol_print",$data);
    }

    public function repall()
    {
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("track/report/repall_fil");
        $this->load->view("_partials/footer");
    }

    public function tampilrepall()
    {
        $start = $this->input->post("start");
        $end   = $this->input->post("end");

        $data = array('start' => $start, 'end' => $end);

        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("track/report/repall_tampil", $data);
        $this->load->view("_partials/footer");
    }
    
    public function printrepall($start, $end)
    {
        $data = array('start' => $start, 'end' => $end);

        $this->load->view("_partials/header");
        $this->load->view("track/report/repall_print", $data);
    }

    public function repsa()
    {
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("track/report/sa_fil");
        $this->load->view("_partials/footer");
    }

    public function tampilsa()
    {
        $start = $this->input->post("start");
        $end = $this->input->post("end");

        $data = array('start' => $start, 'end' => $end);

        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("track/report/sa_tampil", $data);
        $this->load->view("_partials/footer");
    }

    public function printsa($start, $end)
    {
        $data = array('start' => $start, 'end' => $end);
        $this->load->view("_partials/header");
        $this->load->view("track/report/sa_print", $data);
    }

}