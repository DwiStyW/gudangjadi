<?php

/**
 * @property  session $session
 * @property  input $input
 * @property  db $db
 * @property  keluar_track_model $keluar_track_model
 * 
 */
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

    public function index()
    {
        $data['keluar'] = $this->keluar_track_model->tampil_keluar_track();
        $this->load->view("track/keluar/keluar_track", $data);

    }

    public function getkeluar(){
        $get = $this->keluar_track_model->tampil_keluar_track();
        $no=1;
        foreach($get as $m){
            $sats1  = floor($m->keluar / ($m->max1 * $m->max2));
            $sisa   = $m->keluar - ($sats1 * $m->max1 * $m->max2);
            $sats2  = floor($sisa / $m->max2);
            $sats3  = $sisa - $sats2 * $m->max2;
            $data[]=array(
                "no"=>$no++,
                "tglform"=>date("d-m-Y", strtotime($m->tanggalform)),
                "noform"=>$m->noform,
                "kode"=>$m->kode,
                "nama"=>$m->nama,
                "nobatch"=>$m->nobatch,
                "nopallet"=>$m->nopallet,
                "status"=>$m->statpallet,
                "sat1"=>$sats1.' '.$m->sat1,
                "sat2"=>$sats2.' '.$m->sat2,
                "sat3"=>$sats3.' '.$m->sat3,
                "tanggal"=>$m->tanggal,
                "adm"=>$m->username,
                "cat"=>$m->cat,
                "aksi"=>'<a class="btn btn-sm btn-primary mb-2" href="'. base_url("track/keluar_track/edit_keluar_track/" . $m->no) .'"><i class="fa fa-edit"></i> Edit</a><br><a class="btn btn-sm btn-danger" onclick="konfirmasi(`'. $m->no .'`)"><i class="fa fa-trash"></i> Hapus</a>'
            );
        }
        echo json_encode($data);
    }
    public function input_keluar_track()
    {
        $data['master'] = $this->keluar_track_model->detsal();
        $data['keluar'] = $this->keluar_track_model->riwayat_all();
        $data['pallet'] = $this->keluar_track_model->tampil_palet();
        $data['kode'] = $this->input->post('kode');
        $this->session->set_userdata('kodem', $data['kode']);
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("track/keluar/input_keluar_track", $data);
        $this->load->view("_partials/footer");
    }

    public function bantuan($kode)
    {
        $data['cod'] = $kode;
        $this->load->view("track/keluar/bantuan", $data);
    }

    public function tambah_keluar_track()
    {
    $nobatch = $this->input->post('nobatch');
    $qty1 = substr($this->input->post('nobatch'), strpos($this->input->post('nobatch'), '-', 0) + 1, strlen($this->input->post('nobatch')));
    $nopallet = $this->input->post('nopallet');
    $kode = $this->input->post('kode');
    $sat1 = $this->input->post('sat1');
    $sat2 = $this->input->post('sat2');
    $sat3 = $this->input->post('sat3');
    $isi_pallet = $this->input->post('isi_pallet');
    $tglinput = $this->input->post('tgl');
    $tglform = $this->input->post('tglform');
    $noform = $this->input->post('noform');
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

    //get qty detailsal
    $quer = $this->db->where('kode', $kode)->where('nobatch', $nobatch)->where('nopallet', $nopallet)->get('detailsal');
    foreach ($quer->result() as $qu) {
        $quty = $qu->qty;
    }

    //get permintaan keluar
    $sppb = $this->db->where('kode', $kode)->where('noform', $noform)->where('ket', 'OUT')->get('detailsalqty');
    foreach ($sppb->result() as $s) {
        $permintaan = $s->qty;
    }

    // get status pallet
    $pallet = $this->db->query("SELECT * FROM pallet where kdpallet='$nopallet'");
    foreach ($pallet->result() as $p):
        $status = $p->status;
        $qty = $p->qty;
    endforeach;

    //konversi 3 satuan
    $master = $this->db->query("SELECT * FROM master where kode='$kode'");
    foreach ($master->result() as $m):
        $max1 = $m->max1;
        $max2 = $m->max2;
        $saldo = $m->saldo_track;
        $sal = $m->saldo;
    endforeach;
    $sats1 = $sat1 * $max1 * $max2;
    $sats2 = $sat2 * $max2;
    $jumlah = $sats1 + $sats2 + $sat3;

    $saldo_track = $saldo - $jumlah;
    $saldo_tot = $sal - $jumlah;
    $hitung = $qty - $jumlah;
    //untuk riwayattrack
    if ($hitung > 0) {
        $statusr = 'NONE';
    } else {
        $statusr = 'OUT';
    }
    $data = array(
        'tglform' => $tglform,
        'noform' => $noform,
        'kode' => $kode,
        'nobatch' => $nobatch,
        'nopallet' => $nopallet,
        'statpallet' => $statusr,
        'masuk' => '',
        'keluar' => $jumlah,
        'saldo' => $saldo_track,
        'tanggal' => date("Y-m-d H:i:s"),
        'ket' => 'output',
        'adm' => $adm,
        'cat' => $cat,
    );

    // untuk master
    $data1 = array(
        'tglform' => $tglform,
        'tgl_update' => date("Y-m-d H:i:s"),
        'saldo_track' => $saldo_track,
    );
    $where = array('kode' => $kode);

    // untuk pallet
    if ($hitung > 0) {
        $data2 = array(
            'status' => 'isi',
            'qty' => $qty - $jumlah,
        );
    } else {
        $data2 = array(
            'status' => 'kosong',
            'qty' => $qty - $jumlah,
        );
    }
    $where1 = array('kdpallet' => $nopallet);

    //untuk utilisasi
    $total = $this->db->query("SELECT sum(palletin) as totin, sum(palletout) as totout FROM utilisasi");
    foreach ($total->result() as $t) {
        $masuk = $t->totin;
        $keluar = $t->totout;
    }
    $pemakaian_pallet = $masuk - $keluar;
    $query = $this->db->order_by('no', 'DESC')->limit(1)->get('utilisasi');
    $pallet = $this->db->get('pallet');
    foreach ($query->result() as $que) {
        $out = $que->palletout;
        $in = $que->palletin;
        $tgl = $que->tgl;
    }
    $jum = $permintaan - $jumlah;
    $hitung_pallet = $isi_pallet - $jumlah;
    if($tgl != date("Y-m-d")) {
        $in = 0;
        $out= 0;
    }
    if ($hitung_pallet > 0) {
        $data3 = array(
            'tgl' => date("Y-m-d"),
            'palletin' => $in,
            'palletout' => $out,
            'utilisasi' => ($masuk - $keluar) / $pallet->num_rows() * 100,
        );
    } else {
        $data3 = array(
            'tgl' => date("Y-m-d"),
            'palletin' => $in,
            'palletout' => $out + 1,
            'utilisasi' => ($masuk - $keluar - 1) / $pallet->num_rows() * 100,
        );
    }
    $where2 = array('tgl' => date("Y-m-d"));

    // untuk detailsal
    $data4 = array(
        'qty' => $quty - $jumlah,
    );
    $where3 = array(
        'kode' => $kode,
        'nobatch' => $nobatch,
        'nopallet' => $nopallet,
    );

    //untuk detailsalqty
    $data5 = array('qty' => $permintaan - $jumlah);
    $where4 = array(
        'kode' => $kode,
        'noform' => $noform,
        'ket' => 'OUT'
    );

    $cek = $this->db->where("noform",$noform)->where('tglform', $tglform)->where('kode', $kode)->where('nobatch', $nobatch)->where('nopallet', $nopallet)->where('keluar', $jumlah)->get('riwayattrack');
    if($cek->num_rows()>0) {
        $this->session->set_flashdata('gagal', 'Data telah di input sebelumnya!');
    } else {

    if ($jumlah <= $saldo) {
        if ($quty < 0) {
            $this->session->set_flashdata('gagal', 'Tidak ada barang dalam pallet!');
        } else {
            if ($jumlah > $isi_pallet) {
                $this->session->set_flashdata('gagal', 'Barang di pallet tidak mencukupi!');
            } else {
                if ($jumlah > $permintaan) {
                    $this->session->set_flashdata('gagal', 'Jumlah inputan anda melebihi permintaan!');
                } else {
                    $this->db->trans_start();
                    if ($jum > 0) {
                        $this->keluar_track_model->update($where4, $data5, 'detailsalqty');
                    } else {
                        $this->keluar_track_model->hapus($where4, 'detailsalqty');
                    }
                    $this->keluar_track_model->tambah($data, 'riwayattrack');
                    $this->keluar_track_model->update($where, $data1, 'master');
                    $this->keluar_track_model->update($where1, $data2, 'pallet');
                    if ($quty - $jumlah > 0) {
                        $this->keluar_track_model->update($where3, $data4, 'detailsal');
                    } else {
                        $this->keluar_track_model->hapus($where3, 'detailsal');
                    }
                    // if ($tgl == date("Y-m-d")) {
                    //     $this->keluar_track_model->update($where2, $data3, 'utilisasi');
                    // } else {
                    //     $this->keluar_track_model->tambah($data3, 'utilisasi');
                    // }
                    $this->db->trans_complete();

                    if ($this->db->trans_status() === false) {
                        $this->session->set_flashdata('gagal', 'Input error!');
                    } else {
                        $this->session->set_flashdata('sukses', 'Input success!');
                    }
                }
            }
        }
        } else {
            $this->session->set_flashdata('gagal', 'Saldo tidak mencukupi!');
        }
    }
        redirect('track/keluar_track/input_keluar_track');
}

    public function hapus($no)
    {
        $riwtrack = $this->db->where("no",$no)->get('riwayattrack');
        foreach($riwtrack->result() as $r){
            $kode = $r->kode;
            $nopallet = $r->nopallet;
            $nobatch = $r->nobatch;
            $jumlah = $r->keluar;
            $noform = $r->noform;
            $tglform = $r->tglform;
        }
        //untuk riwayattrack
        $where = array('no' => $no);
        //untuk master
        $master = $this->db->where('kode', $kode)->get('master');
        foreach ($master->result() as $m) {
            $saldo = $m->saldo_track;
        }
        $saldo_track = $saldo + $jumlah;
        $data = array(
            'tgl_update' => date("Y-m-d H:i:s"),
            'saldo_track' => $saldo_track,
        );
        $where1 = array('kode' => $kode);

        //untuk pallet
        $pal = $this->db->where('kdpallet', $nopallet)->get('pallet');
        foreach ($pal->result() as $pal) {
            $palqty = $pal->qty;
        }
        $palqtyakhir = $palqty + $jumlah;
        $datapal = array(
            'status' => 'isi',
            'qty' => $palqtyakhir,
        );
        $datapal0 = array(
            'status' => 'kosong',
            'qty' => $palqtyakhir,
        );
        $where2 = array('kdpallet' => $nopallet);

        //untuk detailsal
        $cekDetsal = $this->db->query("SELECT * FROM detailsal WHERE kode='$kode' AND nopallet='$nopallet' AND nobatch = '$nobatch'");
        foreach($cekDetsal->result() as $c){
            $isiDetsal = $c->qty;
        }
        if($cekDetsal->num_rows()>0){
            $dataDetsal = array(
                'qty' => $isiDetsal + $jumlah
            );
            $where3 = array(
                'kode' => $kode,
                'nopallet' => $nopallet,
                'nobatch' => $nobatch,
            );
        }else{
            $dataDetsal = array(
                'tgl'=>date("Y-m-d H:i:s"),
                'kode' => $kode,
                'nopallet' => $nopallet,
                'nobatch' => $nobatch,
                'qty' => $jumlah
            );
        }

        //untuk detailsalqty
        $detsalqty = $this->db->where("kode", $kode)->where("noform", $noform)->get('detailsalqty');
        foreach ($detsalqty->result() as $d) {
            $detailqty = $d->qty;
        }
        $jum_detsal_qty = $detailqty + $jumlah;
        $dataqty = array('qty' => $jum_detsal_qty);
        $wheredsq = array(
            'kode' => $kode,
            'noform' => $noform,
        );
        if($noform == ""){
            $dataqty1 = array(
                'kode' => $kode,
                'nobatch' => "",
                'noform' => "SJ_LAMA",
                'tglform' => $tglform,
                'qty' => $jumlah,
                'ket' => "OUT",
            );
        }else{
        $dataqty1 = array(
            'kode' => $kode,
            'nobatch' => "",
            'noform' => $noform,
            'tglform' => $tglform,
            'qty' => $jumlah,
            'ket' => "OUT",
        );
    }
        

        //untuk utilisasi

        $util = $this->db->order_by('no', 'DESC')->limit(1)->get('utilisasi');
        foreach ($util->result() as $u) {
            $in = $u->palletin;
            $out = $u->palletout;
            $tgl = $u->tgl;
        }
        $pallet = $this->db->get('pallet');
        foreach ($pallet->result() as $p) {
            $isipallet = $p->qty - $jumlah;
        }
        if ($isipallet > 0) {
            $data3 = array(
                'palletin' => $in,
                'palletout' => $out,
                'utilisasi' => $in / $pallet->num_rows() * 100,
            );
        } else {
            $data3 = array(
                'tgl' => date("Y-m-d"),
                'palletin' => $in - 1,
                'palletout' => $out,
                'utilisasi' => $in - 1 / $pallet->num_rows() * 100,
            );
        }
        $where4 = array("tgl", date("Y-m-d"));

        if ($palqtyakhir >= 0) {
            $this->db->trans_start();
            $this->keluar_track_model->hapus($where, 'riwayattrack');
            $this->keluar_track_model->update($where1, $data, 'master');
            if ($palqtyakhir == 0) {
                $this->keluar_track_model->update($where2, $datapal0, 'pallet');
            } else {
                $this->keluar_track_model->update($where2, $datapal, 'pallet');
            }
            if($cekDetsal->num_rows()>0){
                $this->keluar_track_model->update($where3, $dataDetsal, 'detailsal');
            }else{
                $this->keluar_track_model->tambah($dataDetsal, 'detailsal');
            }
            if($detsalqty->num_rows() > 0){
                $this->keluar_track_model->update($wheredsq, $dataqty, 'detailsalqty');
            }else{
                $this->keluar_track_model->tambah($dataqty1, 'detailsalqty');
            }
            // if ($tgl != date("Y-m-d")) {
            //     $this->keluar_track_model->tambah($data3, 'utilisasi');
            // } else {
            //     $this->keluar_track_model->update($where4, $data3, 'utilisasi');
            // }
            $this->db->trans_complete();
        }
        if ($palqtyakhir >= 0) {
            if ($this->db->trans_status() === false) {
                $this->session->set_flashdata('gagal', 'Hapus error!');
            } else {
                $this->session->set_flashdata('sukses', 'Hapus success!');
            }
        } else {
            $this->session->set_flashdata('gagal', 'Saldo Minus!');
        }
        redirect('track/keluar_track');
    }

    public function get_kode()
    {
        $noform = $this->input->post('id', true);
        $data = $this->keluar_track_model->get_kode($noform)->result();
        echo json_encode($data);
    }
    public function get_batch()
    {
        $kode = $this->input->post('id', true);
        $data = $this->keluar_track_model->get_batch($kode)->result();
        // $data = $this->db->where('kode',$kode)->get('master')->result():
        echo json_encode($data);
    }

    public function get_pallet()
    {
        $batch = $this->input->post('id', true);
        $kode = $this->input->post('kode', true);
        $data = $this->keluar_track_model->get_pallet($batch, $kode)->result();
        echo json_encode($data);
    }

    public function get_qty()
    {
        $id = $this->input->post('id', true);
        $kode = $this->input->post('kode', true);
        $batch = $this->input->post('batch', true);
        $data = $this->keluar_track_model->get_qty($id, $kode, $batch)->result();
        echo json_encode($data);
    }
    public function get_keluar()
    {
        $id = $this->input->post('id', true);
        $noform = $this->input->post('noform', true);
        $data = $this->keluar_track_model->get_keluar($id, $noform)->result();
        echo json_encode($data);
    }

    public function edit_keluar_track($no)
    {
        $where = array('no' => $no);
        $data['keluar'] = $this->db->select('*,riwayattrack.tglform as tanggalform')->from('riwayattrack')->where('no', $no)->join('master', 'master.kode=riwayattrack.kode')->get()->result();
        $data['master'] = $this->keluar_track_model->tampil_master();
        $data['pallet'] = $this->keluar_track_model->tampil_palet();
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("track/keluar/edit_keluar_track", $data);
        $this->load->view("_partials/footer");
    }

    public function update()
    {
        $no = $this->input->post('no');
        $nobatch = $this->input->post('nobatch');
        $qtylama = $this->input->post('qtylama');
        $permintaanterlama = $this->input->post('permintaanterlama');
        $nopallet = $this->input->post('nopallet');
        $kode = $this->input->post('kode');
        $sat1 = $this->input->post('sat1');
        $sat2 = $this->input->post('sat2');
        $sat3 = $this->input->post('sat3');
        $tglinput = $this->input->post('tgl');
        $tglform = $this->input->post('tglform');
        $noform = $this->input->post('noform');
        $adm = $this->input->post('adm');
        $cat = $this->input->post('cat');
        $isi_pallet = $this->input->post("isi_pallet");

        //konversi 3 satuan
        $master = $this->db->query("SELECT * FROM master where kode='$kode'");
        foreach ($master->result() as $m):
            $max1 = $m->max1;
            $max2 = $m->max2;
        endforeach;
        $sats1 = $sat1 * $max1 * $max2;
        $sats2 = $sat2 * $max2;
        $jumlah = $sats1 + $sats2 + $sat3;
        if ($jumlah > $permintaanterlama) {
            $this->session->set_flashdata('gagal', 'Inputan melebihi permintaan!');
        } else {
            if ($jumlah > $isi_pallet) {
                $this->session->set_flashdata('gagal', 'Saldo dalam pallet tidak cukup!');
            } else {
                //riwayattrack
                $riwayattrack = $this->db->where('no', $no)->get('riwayattrack');
                foreach ($riwayattrack->result() as $rt) {
                    $nobatchlama = $rt->nobatch;
                    $kodelama = $rt->kode;
                    $nopalletlama = $rt->nopallet;
                    $qtyrt = $rt->keluar;
                }
                if ($qtyrt==$jumlah && $nopallet==$nopalletlama) {
                    $this->session->set_flashdata('gagal', 'Tidak ada data yang di ubah!');
                }else{
                    $wherert = array('no' => $no);
                    $statpallet = $this->db->where('kdpallet', $nopallet)->get('pallet');
                    foreach ($statpallet->result() as $sp) {
                        $statuspallet = $sp->status;
                    }
                    if ($statuspallet == "kosong") {
                        $status="IN";
                    } else {
                        $status="NONE";
                    }
                    $updatert = array(
                        'keluar' => $jumlah,
                        'adm' => $adm,
                        'cat' => $cat,
                        'nopallet' => $nopallet,
                    );

                    //untuk master
                    $master=$this->db->where('kode', $kodelama)->get('master');
                    foreach ($master->result() as $m) {
                        $saldo_track = $m->saldo_track + $qtyrt - $jumlah;
                    }
                    $updatem = array('saldo_track'=> $saldo_track);
                    $wherem = array('kode'=>$kodelama);

                    //untuk detailsalqty
                    $detsalqty = $this->db->where('kode', $kodelama)->where('noform', $noform)->where('ket', 'OUT')->get('detailsalqty');
                    foreach ($detsalqty->result() as $dsq) {
                        if ($detsalqty->num_rows()>0) {
                            $qtydsq = $dsq->qty + $qtyrt-$jumlah;
                        } else {
                            $qtydsq=$qtyrt-$jumlah;
                        }
                    }
                    $updatedsq = array('qty' => $qtydsq);
                    $wheredsq = array(
                        'kode'=>$kodelama,
                        'noform'=>$noform,
                        'ket'=>'OUT'
                    );
                    $tambahdsq=array(
                        'kode'=>$kodelama,
                        'noform'=>$noform,
                        'nobatch'=>"",
                        'tglform'=>$tglform,
                        'qty'=>$qtyrt-$jumlah,
                        'ket'=>'OUT'
                    );

                    //untuk detailsal
                    $detsal = $this->db->where('nobatch', $nobatchlama)->where('kode', $kodelama)->where('nopallet', $nopalletlama)->get('detailsal');
                    foreach($detsal->result() as $ds){
                    if ($nopallet==$nopalletlama) {
                        if($detsal->num_rows()<1){
                            $qtyds = $qtyrt - $jumlah;
                        }else{
                            $qtyds = $ds->qty + $qtyrt-$jumlah;
                        }
                    }else{
                        $qtyds = $ds->qty+$jumlah;    
                    }
                    }
                    $updatedspalsama = array('qty'=>$qtyds);
                    $tambahdspalsama = array(
                        'tgl' => $tglform,
                        'kode'=>$kodelama,
                        'nobatch'=>$nobatchlama,
                        'nopallet'=>$nopalletlama,
                        'qty'=>abs($qtyrt-$jumlah),
                    );
                    $wheredspalsama=array(
                        'nobatch'=>$nobatchlama,
                        'kode'=>$kodelama,
                        'nopallet'=>$nopalletlama,
                    );

                    $detailsalbaru = $this->db->where('nopallet',$nopallet)->where('kode',$kodelama)->where('nobatch',$nobatchlama)->get('detailsal');
                    foreach($detailsalbaru->result() as $dsb){
                        $qtydsbaru = $dsb->qty-$jumlah;
                    }
                    $updatedspalbaru = array('qty'=>$qtydsbaru);
                    $tambahdspalganti = array(
                        'tgl' => $tglform,
                        'kode'=>$kodelama,
                        'nobatch'=>$nobatchlama,
                        'nopallet'=>$nopalletlama,
                        'qty'=>$dsb->qty - $qtydsbaru,
                    );
                    $wheredspalbaru=array(
                        'nobatch'=>$nobatchlama,
                        'kode'=>$kodelama,
                        'nopallet'=>$nopallet,
                    );
                    $tambahrt=array(
                        'kode'=>$kodelama,
                        'noform'=>$noform,
                        'nobatch'=>$nobatchlama,
                        'tglform'=>$tglform,
                        'tanggal'=>date("Y-m-d H:i:s"),
                        'masuk'=>0,
                        'keluar'=>abs($qtyrt-$jumlah),
                        'cat' => $cat,
                        'adm' => $adm,
                        'saldo'=>0,
                        'statpallet'=>$status,
                        'nopallet'=>$nopalletlama,
                        'ket' => 'revisiOUT'
                    );

                    //untuk pallet
                    $pallet = $this->db->where('kdpallet',$nopalletlama)->get('pallet');
                    foreach($pallet->result() as $p){
                        $qtyp = $p->qty;
                    }
                    $qtypallet = $qtyp + $qtyrt - $jumlah;
                    if ($qtypallet>0) {
                        $datapalletsama = array(
                            'qty'=>$qtypallet,
                            'status'=>'isi'
                        );
                    }else{
                        $datapalletsama = array(
                            'qty'=>$qtypallet,
                            'status'=>'kosong'
                        );
                    }
                    $wherepalletlama = array('kdpallet'=>$nopalletlama);
                    $palletbaru = $this->db->where('kdpallet',$nopallet)->get('pallet');
                    foreach($palletbaru->result() as $p){
                        $qtypb = $p->qty;
                    }
                    $qtypalletganti = $qtyp + $jumlah;
                    $qtypalletbaru = $qtypb - $jumlah;
                    if ($qtypalletbaru>0) {
                        $datapalletbaru = array(
                            'qty'=>$qtypalletbaru,
                            'status'=>'isi'
                        );
                    }else{
                        $datapalletbaru = array(
                            'qty'=>$qtypalletbaru,
                            'status'=>'kosong'
                        );
                    }
                    if ($qtypallet>0) {
                        $datapalletganti = array(
                            'qty'=>$qtypalletganti,
                            'status'=>'isi'
                        );
                    }else{
                        $datapalletganti = array(
                            'qty'=>$qtypalletganti,
                            'status'=>'kosong'
                        );
                    }
                    $wherepalletbaru = array('kdpallet'=>$nopallet);

                    $this->db->trans_start();
                    if($nopallet == $nopalletlama){
                        $this->keluar_track_model->update($wherert, $updatert, 'riwayattrack');
                        $this->keluar_track_model->update($wherem, $updatem, 'master');
                        if ($detsal->num_rows()>0) {
                            $this->keluar_track_model->update($wheredspalsama, $updatedspalsama, 'detailsal');
                        }else{
                            $this->keluar_track_model->tambah($tambahdspalsama, 'detailsal');
                        }
                        if ($detsalqty->num_rows()>0) {
                            $this->keluar_track_model->update($wheredsq, $updatedsq, 'detailsalqty');
                            if($qtydsq == 0){
                                $this->keluar_track_model->hapus($wheredsq,'detailsalqty');
                            }
                        $this->keluar_track_model->update($wherepalletlama,$datapalletsama,'pallet');
                        } else {
                            $this->keluar_track_model->tambah($tambahdsq, 'detailsalqty');
                        }
                    }else{
                        if($jumlah<=$qtyrt) {
                            if($qtyrt-$jumlah!=0) {
                                $this->keluar_track_model->tambah($tambahrt, 'riwayattrack');
                                $this->keluar_track_model->update($wherert, $updatert, 'riwayattrack');
                            }else{
                                $this->keluar_track_model->update($wherert, $updatert, 'riwayattrack');
                            }

                            if($detsal->num_rows()>0) {
                                $this->keluar_track_model->update($wheredspalsama, $updatedspalsama, 'detailsal');
                                $this->keluar_track_model->update($wheredspalbaru, $updatedspalbaru, 'detailsal');
                            } else {
                                $this->keluar_track_model->update($wheredspalbaru, $updatedspalbaru, 'detailsal');
                                $this->keluar_track_model->tambah($tambahdspalganti, 'detailsal');
                            }
                            $this->keluar_track_model->update($wherepalletlama, $datapalletganti, 'pallet');
                            $this->keluar_track_model->update($wherepalletbaru, $datapalletbaru, 'pallet');
                        }else{
                            $this->session->set_flashdata("gagal","barang yang di pindah melebihi jumlah!");
                        }
                    }
                    
                    $this->db->trans_complete();
                    $this->keluar_track_model->hapus(array("qty"=>0),"detailsal");

                    if ($this->db->trans_status()===false) {
                        $this->session->set_falshdata('gagal', 'Gagal di edit!');
                    } else {
                        $this->session->set_flashdata('sukses', 'Berhasil di edit!');
                    }
                }
            }
        }
        redirect('track/keluar_track');
    }
}