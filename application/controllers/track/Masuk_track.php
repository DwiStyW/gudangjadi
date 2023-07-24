<?php
/**
 * @property  session $session
 * @property  input $input
 * @property  db $db
 * @property  masuk_track_model $masuk_track_model
 * 
 */
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
        $this->load->view("track/masuk/masuk_track");
    }

    public function get_masuk(){
        $get = $this->db->Select("*,riwayattrack.tglform as tanggalform")
        ->from('riwayattrack,master,tb_user')
        ->where("master.kode=riwayattrack.kode AND riwayattrack.keluar=0 AND riwayattrack.adm=tb_user.user_id")
        ->order_by('riwayattrack.no', 'DESC')->get()->result();
        $no=1;
        foreach($get as $m){

            $sats1  = floor($m->masuk / ($m->max1 * $m->max2));
            $sisa   = $m->masuk - ($sats1 * $m->max1 * $m->max2);
            $sats2  = floor($sisa / $m->max2);
            $sats3  = $sisa - $sats2 * $m->max2;

            $data[] = array(
                "no"=>$no++,
                "tglform"=>$m->tanggalform,
                "noform"=>$m->noform,
                "kode"=>$m->kode,
                "nama"=>$m->nama,
                "nobatch"=>$m->nobatch,
                "nopallet"=>$m->nopallet,
                "statpallet"=>$m->statpallet,
                "sat1"=>$sats1.' '.$m->sat1,
                "sat2"=>$sats2.' '.$m->sat2,
                "sat3"=>$sats3.' '.$m->sat3,
                "tanggal"=>$m->tanggal,
                "adm"=>$m->username,
                "cat"=>$m->cat,
                "aksi"=> '<a class="btn btn-sm btn-primary" href="'. base_url("track/masuk_track/edit_masuk_track/" . $m->no) .'"> <i class="fa fa-edit"></i> Edit</button> <a class="btn btn-sm btn-danger" onclick="konfirmasi(`'.$m->no.'`)"><i class="fa fa-trash"></i> Hapus</a>'
            );
        }
        
        echo json_encode($data);
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
        $qty1 = $this->input->post('jumlah');
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
        if ($sat1 == "") {
            $sat1 = 0;
        }
        if ($sat2 == "") {
            $sat2 = 0;
        }
        if ($sat3 == "") {
            $sat3 = 0;
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
        endforeach;
        $sats1 = $sat1 * $max1 * $max2;
        $sats2 = $sat2 * $max2;
        $jumlah = $sats1 + $sats2 + $sat3;

        $saldo_track = $saldo + $jumlah;

        //untuk riwayattrack
        if ($status == 'isi') {
            $statusr = 'NONE';
        } else {
            $statusr = 'IN';
        }
        $data = array(
            'tglform' => $tglform,
            'kode' => $kode,
            'nobatch' => $nobatch,
            'nopallet' => $nopallet,
            'statpallet' => $statusr,
            'masuk' => $jumlah,
            'keluar' => "",
            'saldo' => $saldo_track,
            'tanggal' => date("Y-m-d H:i:s"),
            'ket' => 'input',
            'adm' => $adm,
            'cat' => $cat,
            'noform'=>$noform,
        );

        //untuk master
        $data1 = array(
            'tglform' => $tglform,
            'tgl_update' => date("Y-m-d H:i:s"),
            'saldo_track' => $saldo_track,
        );
        $where = array('kode' => $kode);

        //untuk pallet
        $data2 = array(
            'status' => 'isi',
            'qty' => $qty + $jumlah,
        );
        $where1 = array('kdpallet' => $nopallet);

        //untuk utilisasi
        $total = $this->db->query("SELECT sum(palletin) as totin, sum(palletout) as totout FROM utilisasi");
        foreach ($total->result() as $t) {
            $masuk = $t->totin;
            $keluar = $t->totout;
        }
        $utilisasi = $this->db->query("SELECT * FROM pallet where status = 'isi'");
        $query = $this->db->order_by('no', 'DESC')->limit(1)->get('utilisasi');
        $pallet = $this->db->get('pallet');
        foreach ($query->result() as $que) {
            $in = $que->palletin;
            if (isset($que->palletout)) {
                $out = $que->palletout;
            } else {
                $out = 0;
            }
            $tgl = $que->tgl;
        }
        if ($status == 'kosong') {
            if ($tgl == date("Y-m-d")) {
                $palletin = $in + 1;
            } else {
                $no = 0;
                $palletin = $no + 1;
            }
        }
        if ($status == 'isi') {
            if ($tgl == date("Y-m-d")) {
                $palletin = $in;
            } else {
                $in = 0;
                $palletin = $in;
            }
        }
        if ($status == 'kosong') {
            $data3 = array(
                'tgl' => date('Y-m-d'),
                'palletin' => $palletin,
                'palletout' => $out,
                'utilisasi' => ($masuk - $keluar + 1) / $pallet->num_rows() * 100,
            );
        } else {
            $data3 = array(
                'tgl' => date('Y-m-d'),
                'palletin' => $palletin,
                'palletout' => $out,
                'utilisasi' => ($masuk - $keluar) / $pallet->num_rows() * 100,
            );
        }
        $where2 = array('tgl' => date("Y-m-d"));

        //untuk detailsal
        $data4 = array(
            'tgl' => date("Y-m-d H:is"),
            'kode' => $kode,
            'nobatch' => $nobatch,
            'nopallet' => $nopallet,
            'qty' => $jumlah,
        );

        //get detailsal
        $que = $this->db->where('kode', $kode)->where('nobatch', $nobatch)->where('nopallet', $nopallet)->get('detailsal');
        foreach ($que->result() as $q) {
            $qtypal = $q->qty;
        }
        //update detailsal
        $data6 = array(
            'qty' => $qtypal + $jumlah,
            'tgl' => date("Y-m-d H:i:s"),
        );
        $where4 = array(
            'kode' => $kode,
            'nobatch' => $nobatch,
            'nopallet' => $nopallet,
        );

        // untuk detailsalqty
        $hitung = $qty1 - $jumlah;
        $data5 = array(
            'qty' => $hitung,
        );
        $where3 = array(
            'kode' => $kode,
            'nobatch' => $nobatch,
            'noform'  => $noform
        );
        $cek = $this->db->where('tglform', $tglform)->where('kode', $kode)->where('nobatch', $nobatch)->where('nopallet', $nopallet)->where('masuk', $jumlah)->get('riwayattrack');
        if($cek->num_rows()>0) {
            $this->session->set_flashdata('gagal', 'Data telah di input sebelumnya!');
        } else {
    if ($qty1 >= $jumlah && $jumlah>0) {
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
        // if ($tgl == date("Y-m-d")) {
        //     $this->masuk_track_model->update($where2, $data3, 'utilisasi'); //tgl detailsalqty && num rows>0 if pallet status berubah jadi kosong maka pallet in -1
        // } else {
        //     $this->masuk_track_model->tambah($data3, 'utilisasi'); //insert tgl detailsalqty ubah pallet kosong menjadi isi
        // }
        $this->db->trans_complete();

        if ($this->db->trans_status() === false) {
            $this->session->set_flashdata('gagal', 'Input error!');
        } else {
            $this->session->set_flashdata('sukses', 'Input success!');
        }
    } else {
        $this->session->set_flashdata('gagal', 'Saldo tidak mencukupi!');
    }
}
        redirect('track/masuk_track/input_masuk_track');
    }
    public function edit_masuk_track($no)
    {
        $where = array('no' => $no);
        // $data['kode'] = $this->db->join('master','master.kode=riwayattrack.kode')->where($where)->get('riwayattrack')->result();
        $data['kode'] = $this->db->query("SELECT *, riwayattrack.tglform as tanggalform FROM riwayattrack INNER JOIN master ON master.kode=riwayattrack.kode where riwayattrack.no = $no");
        $data['masuk'] = $this->db->where('ket','IN')->get('detailsalqty')->result();
        $data['master'] = $this->masuk_track_model->tampil_master();
        $data['pallet'] = $this->masuk_track_model->tampil_palet();
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("track/masuk/edit_masuk_track", $data);
        $this->load->view("_partials/footer");
    }

    public function update(){
        $no = $this->input->post('no');
        $nobatch = $this->input->post('nobatch');
        $qtylama = $this->input->post('qtylama');
        $qtyterlama = $this->input->post('qtyterlama');
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

        //cek qty riwayattrack - detailsal
        $riwayattrack = $this->db->where('no',$no)->get('riwayattrack');
        foreach($riwayattrack->result() as $rt){
            $nobatchlama = $rt->nobatch;
            $kodelama = $rt->kode;
            $nopalletlama = $rt->nopallet;
            $qtyrt = $rt->masuk;
        }
        $master_track = $this->db->where("kode",$kodelama)->get("master")->result();
        foreach($master_track as $mt){
            $saldo_track=$mt->saldo_track;
        }
        $detailsal = $this->db->where('nobatch',$nobatchlama)->where('nopallet',$nopalletlama)->where('kode',$kodelama)->get('detailsal');
        if($detailsal->num_rows()<0){
            $this->session->set_flashdata('gagal','Saldo Minus!');
        }else{
                //konversi 3 satuan
                $master = $this->db->query("SELECT * FROM master where kode='$kodelama'");
                foreach ($master->result() as $m):
                    $max1 = $m->max1;
                    $max2 = $m->max2;
                endforeach;
                $sats1 = $sat1 * $max1 * $max2;
                $sats2 = $sat2 * $max2;
                $jumlah = $sats1 + $sats2 + $sat3;

                $total_st=$saldo_track-$qtyrt+$jumlah;

                if($qtyterlama < $jumlah || $total_st<0){
                    $this->session->set_flashdata('gagal','Saldo Minus!');
                }else{
                    $detailsalqty = $this->db->where('nobatch',$nobatchlama)->where('kode',$kodelama)->get('detailsalqty');
                    if($detailsalqty->num_rows()>0){
                        foreach($detailsalqty->result() as $dsq){
                        $qtybelumdipallet = $qtyrt + $dsq->qty;
                        //detailsalqty
                        $datadsq=array(
                            "qty"=>$qtybelumdipallet-$jumlah
                        );
                        $wheredsq=array(
                            "nobatch"=>$nobatchlama,
                            "kode"=>$kodelama,
                            "ket"=>"IN",
                        );
                        }
                    }else{
                        $qtybelumdipallet = $qtyrt;
                        $tambahdsq=array(
                            "kode"=>$kodelama,
                            "tglform"=>$tglform,
                            "nobatch"=>$nobatchlama,
                            "noform"=>"",
                            "qty"=>$qtybelumdipallet-$jumlah,
                            "ket"=>"IN"
                        );
                    }

                    //master
                    $datamaster=array(
                        "saldo_track"=>$total_st
                    );
                    $wheremaster=array(
                        "kode"=>$kodelama
                    );

                    $statpallet = $this->db->where('kdpallet',$nopallet)->get('pallet');
                    foreach($statpallet->result() as $sp){
                        $statuspallet = $sp->status;
                    }
                    if($statuspallet == "kosong"){
                        $status="IN";
                    }else{
                        $status="NONE";
                    }
                    if ($nopallet==$nopalletlama) {
                        //riwayattrack
                        $datart=array(
                            'masuk'=>$jumlah,
                            'nopallet'=>$nopalletlama,
                            'ket' => 'revisiIN'
                        );
                        $wherert=array('no'=>$no);
                        //detailsal
                        $datads=array(
                            "qty"=>$jumlah
                        );
                        $whereds=array(
                            "kode"=>$kodelama,
                            "nobatch"=>$nobatchlama,
                            "nopallet"=>$nopalletlama,
                        );

                        //pallet
                        $datapallet=array(
                            "qty"=>$jumlah,
                            "status"=>"isi"
                        );
                        $wherepallet=array("kdpallet"=>$nopalletlama);
                    }else{
                        $datart=array(
                            'masuk'=>$jumlah,
                            'nopallet'=>$nopallet,
                            'ket' => 'revisiIN'
                        );
                        $wherert=array('no'=>$no);

                        $datads=array(
                            "nopallet"=>$nopallet,
                            "qty"=>$jumlah
                        );
                        $whereds=array(
                            "kode"=>$kodelama,
                            "nobatch"=>$nobatchlama,
                            "nopallet"=>$nopalletlama,
                        );

                        $datapalletlama=array(
                            "qty"=>0,
                            "status"=>"kosong"
                        );
                        $wherepalletlama=array("kdpallet"=>$nopalletlama);
                        $datapalletbaru=array(
                            "qty"=>$jumlah,
                            "status"=>"isi"
                        );
                        $wherepalletbaru=array("kdpallet"=>$nopallet);
                    }

                    // $this->db->trans_start();
                    if($qtybelumdipallet-$jumlah>=0) {
                        if($detailsalqty->num_rows()>0) {
                            $this->db->where($wherert)->update("riwayattrack", $datart);
                            $this->db->where($wheredsq)->update("detailsalqty", $datadsq);
                            $this->db->where($whereds)->update("detailsal",$datads);
                            if($nopallet==$nopalletlama){
                                $this->db->where($wherepallet)->update("pallet",$datapallet);
                            }else{
                                $this->db->where($wherepalletlama)->update("pallet",$datapalletlama);
                                $this->db->where($wherepalletbaru)->update("pallet",$datapalletbaru);
                            }
                        } else {
                            $this->db->where($wherert)->update("riwayattrack", $datart);
                            $this->db->insert("detailsalqty",$tambahdsq);
                            $this->db->where($whereds)->update("detailsal",$datads);
                            if($nopallet==$nopalletlama){
                                $this->db->where($wherepallet)->update("pallet",$datapallet);
                            }else{
                                $this->db->where($wherepalletlama)->update("pallet",$datapalletlama);
                                $this->db->where($wherepalletbaru)->update("pallet",$datapalletbaru);
                            }
                        }
                        $this->db->where("qty",0)->delete("detailsalqty");
                        $this->db->where($wheremaster)->update("master",$datamaster);
                        $this->db->where("qty",0)->delete("detailsal");
                        $this->db->where("masuk",0)->where("keluar",0)->delete("riwayattrack");
                        $this->db->where("status","isi")->where("qty",0)->update("pallet",array("status"=>"kosong"));
                        $this->db->where("status","kosong")->where("qty > 0")->update("pallet",array("status"=>"kosong"));
                    }
                    $this->db->trans_complete();

                    if($this->db->trans_status() === false){
                        $this->session->set_flashdata('gagal','Gagal di edit!');
                    }else{
                        $this->session->set_flashdata('sukses', 'Berhasil di edit!');
                    }
                }
        }
        redirect('track/masuk_track');
    }

    public function hapus($no)
    {
        $riwtrack = $this->db->where("no",$no)->get('riwayattrack');
        foreach($riwtrack->result() as $r){
            $kode = $r->kode;
            $nopallet = $r->nopallet;
            $nobatch = $r->nobatch;
            $jumlah = $r->masuk;
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
        $saldo_track = $saldo - $jumlah;
        $data = array(
            'tgl_update' => date("Y-m-d H:i:s"),
            'saldo_track' => $saldo_track,
        );
        $where1 = array('kode' => $kode);

        //untuk detailsalqty
        $detsalqty = $this->db->where("kode", $kode)->where("nobatch", $nobatch)->get('detailsalqty');
        foreach ($detsalqty->result() as $d) {
            $detailqty = $d->qty;
        }
        $jum_detsal_qty = $detailqty + $jumlah;
        $data1 = array('qty' => $jum_detsal_qty);
        $wheredsq = array(
            'kode' => $kode,
            'nobatch' => $nobatch,
            'ket' =>'IN'
        );
        $data2 = array(
            'kode' => $kode,
            'nobatch' => $nobatch,
            'noform' => $noform,
            'tglform' => $tglform,
            'qty' => $jumlah,
            'ket' => "IN",
        );

        //untuk pallet
        $pal = $this->db->where('kdpallet', $nopallet)->get('pallet');
        foreach ($pal->result() as $pal) {
            $palqty = $pal->qty;
        }
        $palqtyakhir = $palqty - $jumlah;
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
        $que = $this->db->where('kode', $kode)->where('nobatch', $nobatch)->where('nopallet', $nopallet)->get('detailsal');
        foreach ($que->result() as $q) {
            $detsal = $q->qty;
        }
        $cek = $detsal - $jumlah;
        $where3 = array(
            'kode' => $kode,
            'nopallet' => $nopallet,
            'nobatch' => $nobatch,
        );
        $data_detsal = array(
            'qty' => $cek
        );

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

        if ($cek >= 0) {
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
            if ($cek==0) {
                $this->masuk_track_model->hapus($where3, 'detailsal');
            }else{
                $this->masuk_track_model->update($where3, $data_detsal,'detailsal');
            }
            // if ($tgl != date("Y-m-d")) {
            //     $this->masuk_track_model->tambah($data3, 'utilisasi');
            // } else {
            //     $this->masuk_track_model->update($where4, $data3, 'utilisasi');
            // }
            $this->db->trans_complete();
        }else {
            $this->session->set_flashdata('gagal', 'Saldo Minus!');
        }
        if ($cek >= 0) {
            if ($this->db->trans_status() === false) {
                $this->session->set_flashdata('gagal', 'Hapus error!');
            } else {
                $this->session->set_flashdata('sukses', 'Hapus success!');
            }
        } else {
            $this->session->set_flashdata('gagal', 'Saldo Minus!');
        }
        redirect('track/masuk_track');
    }

    //untuk AJAX
    public function get_batch()
    {
        $kode = $this->input->post('id', true);
        $data = $this->masuk_track_model->get_batch($kode)->result();
        echo json_encode($data);
    }

    public function get_qty()
    {
        $id = $this->input->post('id', true);
        $kode = $this->input->post('kode', true);
        $data = $this->masuk_track_model->get_qty($id, $kode)->result();
        echo json_encode($data);
    }
}
