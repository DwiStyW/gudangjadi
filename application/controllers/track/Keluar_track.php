<?php
class Keluar_track extends CI_Controller
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
            $this->session->set_userdata('keyword_keluar_track',$data['keyword']);
        }else{
            $data['keyword']=$this->session->userdata('keyword_keluar_track');
        }
        //untuk pagination
        $config['base_url'] = 'http://localhost/gudangjadi/keluar_track/index';
        $config['total_rows'] = $this->keluar_track_model->total_keluar_track($data['keyword']);
        $range = $this->input->post('range');
        $config['per_page'] = $range;
        if ($range == null) {
            $config['per_page'] = 10;
        } elseif ($range == "all") {
            $config['per_page'] = null;
        }
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['keluar'] = $this->keluar_track_model->tampil_keluar_track($config['per_page'], $data['start'], $data['keyword']);
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("track/keluar/keluar_track", $data);
        $this->load->view("_partials/footer");

    }

    public function input_keluar_track(){
        $data['master']=$this->keluar_track_model->detsal();
        $data['keluar']=$this->keluar_track_model->riwayat_all();
        $data['pallet']=$this->keluar_track_model->tampil_palet();
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("track/keluar/input_keluar_track",$data);
        $this->load->view("_partials/footer");
    }

    public function tambah_keluar_track()
    {
        $nobatch = substr($this->input->post('nobatch'),0,strpos($this->input->post('nobatch'),"-",0));
        $qty1     = substr($this->input->post('nobatch'),strpos($this->input->post('nobatch'),'-',0)+1,strlen($this->input->post('nobatch')));
        $nopallet = $this->input->post('nopallet');
        $kode = $this->input->post('kode');
        $sat1 = $this->input->post('sat1');
        $sat2 = $this->input->post('sat2');
        $sat3 = $this->input->post('sat3');
        $tglinput = $this->input->post('tgl');
        $adm = $this->input->post('adm');
        $cat = $this->input->post('cat');
        if($sat1 == ""){
            $sat1=0;
        }
        if($sat2 == ""){
            $sat2=0;
        }
        if($sat3 == ""){
            $sat3=0;
        }
        
        //get tglform detailsalqty
        $quer = $this->db->where('kode',$kode)->where('nobatch',$nobatch)->get('detailsalqty');
        foreach($quer->result() as $qu){
            $tglform = $qu->tglform;
        }

        // get status pallet
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
        $sal   = $m->saldo;
        endforeach;
        $sats1    = $sat1 * $max1 * $max2;
        $sats2    = $sat2 * $max2;
        $jumlah = $sats1 + $sats2 + $sat3;

        $saldo_track = $saldo-$jumlah;

        //untuk riwayattrack
        $data=array(
            'tglform'   => $tglform,
            'kode'      => $kode,
            'nobatch'   => $nobatch,
            'nopallet'  => $nopallet,
            'statpallet'=> 'OUT',
            'masuk'     => "",
            'keluar'    => $jumlah,
            'saldo'     => $saldo_track,
            'tanggal'   => date("Y-m-d H:i:s"),
            'ket'       => 'input',
            'adm'       => $adm,
            'cat'       => $cat
        );

    //     //untuk master
        $data1=array(
            'tglform'     => $tglform,
            'tgl_update'  => date("Y-m-d H:i:s"),
            'saldo_track' => $saldo_track
        );
        $where=array('kode' => $kode);

        //untuk pallet
        $hitung = $qty - $jumlah;
        if($hitung > 0){
            $data2=array(
                'status' => 'isi',
                'qty'    => $hitung
            );
        }else{
            $data2=array(
                'status' => 'kosong',
                'qty'    => $hitung
            );
        }
        $where1=array('kdpallet' => $nopallet);

        //untuk utilisasi
       $query = $this->db->where('tgl',date("Y-m-d"))->get('utilisasi');
       $pallet = $this->db->get('pallet');

        $palletin = $query->num_rows()+1;
        $data3=array(
            'tgl'       => date('Y-m-d'),
            'palletin'   => $palletin,
            'utilisasi' => $palletin/$pallet->num_rows()*100
        );
        $where2=array('tgl'=>date("Y-m-d"));

        //untuk detailsal
        $data4=array(
            'tgl'       => date("Y-m-d"),
            'kode'      => $kode,
            'nobatch'   => $nobatch,
            'nopallet'  => $nopallet,
            'qty'       => $jumlah
        );

        if($sal>=$jumlah && $jumlah>0){
        $this->db->trans_start();
        $this->keluar_track_model->tambah($data, 'riwayattrack');
        $this->keluar_track_model->update($where,$data1,'master');
        $this->keluar_track_model->update($where1,$data2,'pallet');
        $this->keluar_track_model->tambah($data4, 'detailsal');
        if($query->num_rows()>0)
       {
            $this->keluar_track_model->update($where2,$data3,'utilisasi');
       }else{
            $this->keluar_track_model->tambah($data3,'utilisasi');
       }
        $this->db->trans_complete();

        if($this->db->trans_status()===FALSE){
            $this->session->set_flashdata('gagal','Input error!');
        }else{
            $this->session->set_flashdata('sukses','Input success!');
        }
    }else{
        $this->session->set_flashdata('gagal','Saldo tidak mencukupi!');
    }
        redirect('track/keluar_track/input_keluar_track');
    }
    public function edit_keluar_track($no){
        $where=array('no'=>$no);
        $data['keluar'] = $this->keluar_track_model->get_where($where,'riwayattrack')->result();
        $data['master']=$this->keluar_track_model->tampil_master();
        $data['pallet']=$this->keluar_track_model->tampil_palet();
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("track/keluar/edit_keluar_track",$data);
        $this->load->view("_partials/footer");
    }
}