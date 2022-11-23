<?php
class Masuk_track extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != 'track' && $this->session->userdata('role') != 'admin' && $this->session->userdata('role') != 'manager') {
            $this->session->set_flashdata('pesan', '<div class="fade show" style="color:red" role="alert">
  Anda Belum Login!
</div><br>');
            redirect('auth/logout');
        }
    }

    public function index(){
        $this->load->library('pagination');
        //untuk search
        $keyword=$this->input->post('keyword');
        if(isset($keyword)){
            $data['keyword']=$this->input->post('keyword');
            $this->session->set_userdata('keyword_masuk_track',$data['keyword']);
        }else{
            $data['keyword']=$this->session->userdata('keyword_masuk_track');
        }
        //untuk pagination
        $config['base_url'] = 'http://localhost/gudangjadi/masuk_track/index';
        $config['total_rows'] = $this->masuk_track_model->total_masuk_track($data['keyword']);
        $range = $this->input->post('range');
        $config['per_page'] = $range;
        if ($range == null) {
            $config['per_page'] = 10;
        } elseif ($range == "all") {
            $config['per_page'] = null;
        }
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['masuk'] = $this->masuk_track_model->tampil_masuk_track($config['per_page'], $data['start'], $data['keyword']);
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("track/masuk/masuk_track", $data);
        $this->load->view("_partials/footer");

    }

    public function input_masuk_track(){
        $data['master']=$this->masuk_track_model->tampil_master();
        $data['masuk']=$this->masuk_track_model->riwayat_all();
        $data['pallet']=$this->masuk_track_model->tampil_palet();
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("track/masuk/input_masuk_track",$data);
        $this->load->view("_partials/footer");
    }

    public function tambah_masuk_track()
    {
        $tglform = $this->input->post('tglform');
        $nobatch = $this->input->post('nobatch');
        $nopallet = $this->input->post('nopallet');
        $kode = $this->input->post('kode');
        $sat1 = $this->input->post('sat1');
        $sat2 = $this->input->post('sat2');
        $sat3 = $this->input->post('sat3');
        $tglinput = $this->input->post('tgl');
        $adm = $this->input->post('adm');
        $cat = $this->input->post('cat');

        //get status pallet
        $pallet = $this->db->query("SELECT * FROM pallet where kdpallet='$nopallet'");
        foreach($pallet->result() as $p):
        $status = $p->status;
        $qty    = $p->qty;
        endforeach;

        //konversi 3 satuan
        $master = $this->db->query("SELECT * FROM master where kode='$kode'");
        foreach($master->result() as $m):
        $max1  = $m->max1;
        $max2  = $m->max2;
        $saldo = $m->saldo_track;
        endforeach;
        $sats1    = $sat1 * $max1 * $max2;
        $sats2    = $sat2 * $max2;
        $jumlah = $sats1 + $sats2 + $sat3;

        $saldo_track = $saldo+$jumlah;

        //untuk riwayattrack
        $data=array(
            'tglform'   => $tglform,
            'kode'      => $kode,
            'nobatch'   => $nobatch,
            'nopallet'  => $nopallet,
            'statpallet'=> 'IN',
            'masuk'     => $jumlah,
            'keluar'    => "",
            'saldo'     => $saldo_track,
            'tanggal'   => date("Y-m-d H:i:s"),
            'ket'       => 'input',
            'adm'       => $adm,
            'cat'       => $cat
        );
        //untuk master
        $data1=array(
            'tglform'     => $tglform,
            'tgl_update'  => date("Y-m-d H:i:s"),
            'saldo_track' => $saldo_track
        );
        $where=array('kode' => $kode);
        //untuk pallet
        $data2=array(
            'status' => 'isi',
            'qty'    => $qty+$jumlah
        );
        $where1=array('kdpallet' => $nopallet);
        //untuk utilisasi
       $query = $this->db->where('tanggal',date("Y-m-d"))->get('riwayattrack');
       $pallet = $this->db->get('pallet');

       $palletstat = $this->db->where('kdpallet',$nopallet)->get('pallet');
       foreach($palletstat->result() as $sp):
        $stat = $sp->status;
       endforeach;
       if($stat == 'kosong'){
        $palletin = $query->num_rows()+1;
       }else{
        $palletin = $query->num_rows();
       }
        $data3=array(
            'tgl'       => date('Y-m-d'),
            'palletin'   => $palletin,
            'utilisasi' => $palletin/$pallet->num_rows()
        );
        $where2=array('tgl'=>date("Y-m-d"));

        $this->db->trans_start();
        $this->masuk_track_model->tambah($data, 'riwayattrack');
        $this->masuk_track_model->update($where,$data1,'master');
        $this->masuk_track_model->update($where1,$data2,'pallet');
        if($query->num_rows()>0)
       {
            $this->masuk_track_model->update($where2,$data3,'utilisasi');
       }else{
            $this->masuk_track_model->tambah($data3,'utilisasi');
       }
        $this->db->trans_complete();

        if($this->db->trans_status()===FALSE){
            $this->session->set_flashdata('gagal','Input error');
        }else{
            $this->session->set_flashdata('sukses','Input success');
        }
        redirect('track/masuk_track/input_masuk_track');
    }
}