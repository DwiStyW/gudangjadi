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

    public function index()
    {
        $this->load->library('pagination');
        //untuk search
        $keyword = $this->input->post('keyword');
        if (isset($keyword)) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword_masuk_track', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword_masuk_track');
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

    public function input_masuk_track()
    {
        $data['master'] = $this->masuk_track_model->detsal();
        $data['masuk'] = $this->masuk_track_model->riwayat_all();
        $data['pallet'] = $this->masuk_track_model->tampil_palet();
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("track/masuk/input_masuk_track", $data);
        $this->load->view("_partials/footer");
    }

    public function tambah_masuk_track()
    {
        $nobatch = $this->input->post('nobatch');
        $qty1     = $this->input->post('jumlah');
        $nopallet = $this->input->post('nopallet');
        $kode = $this->input->post('kode');
        $sat1 = $this->input->post('sat1');
        $sat2 = $this->input->post('sat2');
        $sat3 = $this->input->post('sat3');
        $tglinput = $this->input->post('tgl');
        $adm = $this->input->post('adm');
        $cat = $this->input->post('cat');
        if ($sat1 == "") {
            $sat1 = 0;
        }
        if ($sat2 == "") {
            $sat2 = 0;
        }
        if ($sat3 == "") {
            $sat3 = 0;
        }

        //get tglform detailsalqty
        $quer = $this->db->where('kode', $kode)->where('nobatch', $nobatch)->get('detailsalqty');
        foreach ($quer->result() as $qu) {
            $tglform = $qu->tglform;
        }

        // get status pallet
        $pallet = $this->db->query("SELECT * FROM pallet where kdpallet='$nopallet'");
        foreach ($pallet->result() as $p) :
            $status = $p->status;
            $qty    = $p->qty;
        endforeach;

        //konversi 3 satuan
        $master = $this->db->query("SELECT * FROM master where kode='$kode'");
        foreach ($master->result() as $m) :
            $max1  = $m->max1;
            $max2  = $m->max2;
            $saldo = $m->saldo_track;
            $sal   = $m->saldo;
        endforeach;
        $sats1    = $sat1 * $max1 * $max2;
        $sats2    = $sat2 * $max2;
        $jumlah = $sats1 + $sats2 + $sat3;

        $saldo_track = $saldo + $jumlah;

        //untuk riwayattrack
        if ($status == 'isi') {
            $statusr = 'NONE';
        } else {
            $statusr = 'IN';
        }
        $data = array(
            'tglform'   => $tglform,
            'kode'      => $kode,
            'nobatch'   => $nobatch,
            'nopallet'  => $nopallet,
            'statpallet' => $statusr,
            'masuk'     => $jumlah,
            'keluar'    => "",
            'saldo'     => $saldo_track,
            'tanggal'   => date("Y-m-d H:i:s"),
            'ket'       => 'input',
            'adm'       => $adm,
            'cat'       => $cat
        );

        //untuk master
        $data1 = array(
            'tglform'     => $tglform,
            'tgl_update'  => date("Y-m-d H:i:s"),
            'saldo_track' => $saldo_track
        );
        $where = array('kode' => $kode);

        //untuk pallet
        $data2 = array(
            'status' => 'isi',
            'qty'    => $qty + $jumlah
        );
        $where1 = array('kdpallet' => $nopallet);

        //untuk utilisasi
        $utilisasi = $this->db->query("SELECT * FROM pallet where status = 'isi'");
        $query = $this->db->order_by('no', 'DESC')->limit(1)->get('utilisasi');
        $pallet = $this->db->get('pallet');
        foreach ($query->result() as $que) {
            $in = $que->palletin;
			if(isset($que->palletout)){
				$out = $que->palletout;
			}else{
				$out = 0;
			}
			$tgl = $que->tgl;
        }
        if ($status == 'kosong') {
            $palletin = $in+1;
        }
        if ($status == 'isi') {
            $palletin = $in;
        }
        $data3 = array(
            'tgl'       => date('Y-m-d'),
            'palletin'   => $palletin,
            'palletout'   => $out,
            'utilisasi' => $palletin / $pallet->num_rows() * 100
        );
        $where2 = array('tgl' => date("Y-m-d"));

        //untuk detailsal
        $data4 = array(
            'tgl'       => date("Y-m-d"),
            'kode'      => $kode,
            'nobatch'   => $nobatch,
            'nopallet'  => $nopallet,
            'qty'       => $jumlah
        );

        //get detailsal
        $que = $this->db->where('tgl', date("Y-m-d"))->where('kode', $kode)->where('nobatch', $nobatch)->where('nopallet', $nopallet)->get('detailsal');
        foreach ($que->result() as $q) {
            $qtypal = $q->qty;
        }
        //update detailsal
        $data6 = array(
            'qty' => $qtypal + $jumlah
        );
        $where4 = array(
            'tgl'       => date("Y-m-d"),
            'kode'      => $kode,
            'nobatch'   => $nobatch,
            'nopallet'  => $nopallet,
        );

        // untuk detailsalqty
        $hitung = $qty1 - $jumlah;
        $data5 = array(
            'qty' => $hitung,
        );
        $where3 = array(
            'kode'   => $kode,
            'nobatch' => $nobatch,
        );

        if ($sal >= $jumlah && $jumlah > 0) {
            $this->db->trans_start();
            $this->masuk_track_model->tambah($data, 'riwayattrack'); //id hapus riwayat
            $this->masuk_track_model->update($where, $data1, 'master'); //kode kurangi saldo dengan jumlah masuk
            $this->masuk_track_model->update($where1, $data2, 'pallet'); //nopallet kurangi qty pallet dengan jumlah masuk
            if ($que->num_rows() > 0) {
                $this->masuk_track_model->update($where4, $data6, 'detailsal'); //kode & nobatch kurangi qty detailsal dengan jumlah masuk
            } else {
                $this->masuk_track_model->tambah($data4, 'detailsal'); //ketika qty = 0 hapus
            }
            if ($hitung > 0) {
                $this->masuk_track_model->update($where3, $data5, 'detailsalqty'); //kode nobatch nopallet ditambah jumlah masuk
            } else {
                $this->masuk_track_model->hapus($where3, 'detailsalqty'); // insert dengan qty jumlah masuk
            }
            if ($tgl == date("Y-m-d")) {
                $this->masuk_track_model->update($where2, $data3, 'utilisasi'); //tgl detailsalqty && num rows>0 if pallet status berubah jadi kosong maka pallet in -1
            } else {
                $this->masuk_track_model->tambah($data3, 'utilisasi'); //insert tgl detailsalqty ubah pallet kosong menjadi isi
            }
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->session->set_flashdata('gagal', 'Input error!');
            } else {
                $this->session->set_flashdata('sukses', 'Input success!');
            }
        } else {
            $this->session->set_flashdata('gagal', 'Saldo tidak mencukupi!');
        }
        redirect('track/masuk_track/input_masuk_track');
    }
    public function edit_masuk_track($no)
    {
        $where = array('no' => $no);
        $data['masuk'] = $this->masuk_track_model->get_where($where, 'riwayattrack')->result();
        $data['master'] = $this->masuk_track_model->tampil_master();
        $data['pallet'] = $this->masuk_track_model->tampil_palet();
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("track/masuk/edit_masuk_track", $data);
        $this->load->view("_partials/footer");
    }

    public function hapus($no, $kode, $nopallet, $nobatch, $jumlah)
    {
        //untuk riwayattrack
        $where = array('no' => $no);
        //untuk master
        $master = $this->db->where('kode', $kode)->get('master');
        foreach ($master->result() as $m) {
            $saldo = $m->saldo_track;
        }
        $saldo_track = $saldo - $jumlah;
        $data = array(
            'tgl_update'  => date("Y-m-d H:i:s"),
            'saldo_track' => $saldo_track
        );
        $where1 = array('kode' => $kode);

        //untuk detailsalqty
        $detsalqty = $this->db->where("kode",$kode)->where("nobatch",$nobatch)->get('detailsalqty');
        foreach($detsalqty->result() as $d){
            $detailqty = $d->qty;
        }
        $jum_detsal_qty = $detailqty + $jumlah;
        $data1 = array('qty'=>$jum_detsal_qty);
        $wheredsq = array(
            'kode' => $kode,
            'nobatch' => $nobatch
        );
        $data2 = array(
            'kode'=>$kode,
            'nobatch'=>$nobatch,
            'qty'=>$jumlah,
            'ket'=>"IN"
        );

        //untuk pallet
        $pal = $this->db->where('kdpallet',$nopallet)->get('pallet');
        foreach($pal->result() as $pal){
            $palqty = $pal->qty;
        }
        $palqtyakhir = $palqty - $jumlah;
            $datapal = array(
                'status' => 'isi',
                'qty'    => $palqtyakhir
            );
            $datapal0 = array(
                'status' => 'kosong',
                'qty'    => $palqtyakhir
            );
        $where2 = array('kdpallet'=>$nopallet);

        //untuk detailsal
        $where3 = array(
            'kode'=>$kode,
            'nopallet'=>$nopallet,
            'nobatch'=>$nobatch,
        );

        //untuk utilisasi
		
        $util = $this->db->order_by('no', 'DESC')->limit(1)->get('utilisasi');
		foreach($util->result() as $u){
			$in = $u->palletin;
			$out = $u->palletout;
			$tgl = $u->tgl;
		}
		$pallet = $this->db->get('pallet');
		foreach($pallet->result() as $p){
			$isipallet = $p->qty - $jumlah;
		}
        if($isipallet>0){
            $data3=array(
                'palletin'=> $in,
                'palletout'=> $out,
				'utilisasi'=> $in / $pallet->num_rows() * 100
            );
        }else{
			$data3=array(
				'tgl' => date("Y-m-d"),
				'palletin'=>$in-1,
				'palletout'=>$out,
				'utilisasi'=> $in-1 / $pallet->num_rows() * 100
			);
		}
		$where4 = array("tgl",date("Y-m-d"));

        if ($palqtyakhir >=0) {
            $this->db->trans_start();
            $this->masuk_track_model->hapus($where, 'riwayattrack');
            $this->masuk_track_model->update($where1, $data, 'master');
            if ($detsalqty->num_rows() > 0) {
                $this->masuk_track_model->update($wheredsq, $data1, 'detailsalqty');
            } else {
                $this->masuk_track_model->tambah($data2, 'detailsalqty');
            }
            if ($palqtyakhir == 0) {
                $this->masuk_track_model->update($where2, $datapal0, 'pallet');
            } else {
                $this->masuk_track_model->update($where2, $datapal, 'pallet');
            }
            $this->masuk_track_model->hapus($where3, 'detailsal');
            if ($tgl != date("Y-m-d")) {
                $this->masuk_track_model->tambah($data3, 'utilisasi');
            } else {
                $this->masuk_track_model->update($where4, $data3, 'utilisasi');
            }
            $this->db->trans_complete();
        }
        if ($palqtyakhir>=0) {
            if ($this->db->trans_status() === false) {
                $this->session->set_flashdata('gagal', 'Hapus error!');
            } else {
                $this->session->set_flashdata('sukses', 'Hapus success!');
            }
        }else{
            $this->session->set_flashdata('gagal', 'Saldo Minus!');
        }
        redirect('track/masuk_track');
    }

    //untuk AJAX
    function get_batch()
    {
        $kode = $this->input->post('id', TRUE);
        $data = $this->masuk_track_model->get_batch($kode)->result();
        echo json_encode($data);
    }

    function get_qty()
    {
        $id = $this->input->post('id', TRUE);
        $kode = $this->input->post('kode', TRUE);
        $data = $this->masuk_track_model->get_qty($id, $kode)->result();
        echo json_encode($data);
    }
}
