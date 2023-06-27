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
        $data['masuk'] = $this->masuk_track_model->tampil_masuk_track();
        $this->load->view("track/masuk/masuk_track", $data);
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
        $detailsal = $this->db->where('nobatch',$nobatchlama)->where('nopallet',$nopalletlama)->where('kode',$kodelama)->get('detailsal');
        foreach($detailsal->result() as $detsal){
            $qtydipallet = $detsal->qty;
        }
        // echo $qtydipallet-$qtyrt;
        if($detailsal->num_rows()<1){
            $this->session->set_flashdata('gagal','Saldo Minus!');
        }else{
            $cek1 = $qtydipallet-$qtyrt;
            if($cek1 < 0){
                $this->session->set_flashdata('gagal','Barang di pallet sudah pernah di keluarkan!');
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

                if($qtyterlama < $jumlah){
                $this->session->set_flashdata('gagal','Saldo Minus!');
                }else{
                    $detailsalqty = $this->db->where('nobatch',$nobatchlama)->where('kode',$kodelama)->get('detailsalqty');
                    if($detailsalqty->num_rows()>0){
                        foreach($detailsalqty->result() as $dsq){
                        $qtybelumdipallet = $qtyrt + $dsq->qty;
                        }
                    }else{
                        $qtybelumdipallet = $qtyrt;
                    }

                    //untuk riwayattrack
                    if ($nopallet==$nopalletlama) {
                        $datart=array(
                            'masuk'=>$jumlah,
                            'cat' => $cat,
                            'adm' => $adm,
                            'ket' => 'revisiIN'
                        );
                        $wherert=array('no'=>$no);
                    }else{
                        $qtypindahpallet = $qtyrt-$jumlah;
                        $datart=array(
                            'masuk'=>$qtypindahpallet,
                            'cat' => $cat,
                            'adm' => $adm,
                            'ket' => 'revisiIN'
                        );
                        $wherert=array('no'=>$no);
                        $statpallet = $this->db->where('kdpallet',$nopallet)->get('pallet');
                        foreach($statpallet->result() as $sp){
                            $statuspallet = $sp->status;
                        }
                        if($statuspallet == "kosong"){
                            $status="IN";
                        }else{
                            $status="NONE";
                        }
                        $tambahrt=array(
                            'kode'=>$kodelama,
                            'noform'=>$noform,
                            'nobatch'=>$nobatchlama,
                            'tglform'=>$tglform,
                            'tanggal'=>date("Y-m-d H:i:s"),
                            'masuk'=>$jumlah,
                            'keluar'=>0,
                            'cat' => $cat,
                            'adm' => $adm,
                            'saldo'=>0,
                            'statpallet'=>$status,
                            'nopallet'=>$nopallet,
                            'ket' => 'revisiIN'
                        );
                    }
                    //untuk master
                    $master = $this->db->where('kode',$kodelama)->get('master');
                    foreach($master->result() as $m){
                        $saldo_track = $m->saldo_track;
                    }
                    $total = $saldo_track-$qtyrt+$jumlah;
                    $datamaster = array('saldo_track'=> $total);
                    $wheremaster = array('kode'=> $kodelama);

                    //untuk detailsal
                    $baru = $this->db->where('nobatch',$nobatchlama)->where('kode',$kodelama)->where('nopallet',$nopallet)->get('detailsal');
                    foreach($baru->result() as $b){
                        $qtybaru = $b->qty;
                    }
                    if ($nopallet == $nopalletlama) {
                        $qtydetailsal = $qtydipallet - $qtyrt + $jumlah;
                        $datadetailsal = array('qty'=>$qtydetailsal);
                        $wheredetailsal = array(
                            'nobatch'=>$nobatchlama,
                            'nopallet'=>$nopalletlama,
                            'kode'=>$kodelama
                        );
                    }else{
                        $qtydipalletlama = $qtydipallet - $jumlah;
                        $detsalpalletlama = array('qty'=>$qtydipalletlama);
                        $wheredetsalpalletlama = array(
                            'nobatch'=>$nobatchlama,
                            'nopallet'=>$nopalletlama,
                            'kode'=>$kodelama
                        );
                        $jumlahbaru = $qtybaru + $jumlah;
                        $detsalpalletbaru = array('qty'=>$jumlahbaru);
                        $wheredetsalpalletbaru = array(
                            'nobatch'=>$nobatchlama,
                            'nopallet'=>$nopallet,
                            'kode'=>$kodelama
                        );
                        $tambahkepalletbaru = array(
                            'tgl'=>$tglform,
                            'kode'=>$kodelama,
                            'nobatch'=>$nobatchlama,
                            'nopallet'=>$nopallet,
                            'qty'=>$jumlah
                        );
                    }

                    //untuk detailsalqty
                    $qtydetailsalqty =$qtyrt - $jumlah + $dsq->qty;
                    $updatedetailsalqty= array('qty'=>$qtydetailsalqty);
                    $wheredetailsalqty = array(
                        'kode'=>$kodelama,
                        'nobatch'=>$nobatchlama
                    );
                    $tambahdetailsalqty=array(
                        'tglform'=>$tglform,
                        'noform'=>$noform,
                        'kode'=>$kodelama,
                        'nobatch'=>$nobatchlama,
                        'qty'=>$qtydetailsalqty,
                        'ket'=>"IN"
                    );

                    //untuk pallet
                    $pallet = $this->db->where('kdpallet',$nopalletlama)->get('pallet');
                    foreach($pallet->result() as $p){
                        $qtyp = $p->qty;
                    }
                    $qtypallet = $qtyp - $qtyrt + $jumlah;
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
                    $qtypalletganti = $qtyp - $jumlah;
                    $qtypalletbaru = $qtypb + $jumlah;
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
                    if ($nopallet == $nopalletlama) {
                        $this->masuk_track_model->update($wheremaster,$datamaster,'master');
                        $this->masuk_track_model->update($wherert, $datart, 'riwayattrack');
                    }else{
                        if($qtypindahpallet>0){
                            $this->masuk_track_model->update($wherert, $datart, 'riwayattrack');
                            $this->masuk_track_model->tambah($tambahrt, 'riwayattrack');
                        }else{
                            $this->masuk_track_model->hapus($wherert, 'riwayattrack');
                            $this->masuk_track_model->tambah($tambahrt, 'riwayattrack');
                        }
                    }
                    if ($nopallet == $nopalletlama) {
                        $this->masuk_track_model->update($wherepalletlama,$datapalletsama,'pallet');
                        if ($qtydetailsal>0) {
                            $this->masuk_track_model->update($wheredetailsal, $datadetailsal, 'detailsal');
                        } else {
                            $this->masuk_track_model->hapus($wheredetailsal, 'detailsal');
                        }
                        if($detailsalqty->num_rows()>0){
                            $this->masuk_track_model->update($wheredetailsalqty,$updatedetailsalqty,'detailsalqty');
                            if($qtydetailsalqty == 0){
                                $this->masuk_track_model->hapus($wheredetailsalqty,'detailsalqty');
                            }
                        }else{
                            $this->masuk_track_model->tambah($tambahdetailsalqty,'detailsalqty');
                            if($qtydetailsalqty == 0){
                                $this->masuk_track_model->hapus($wheredetailsalqty,'detailsalqty');
                            }
                        }
                    }else{
                        $this->masuk_track_model->update($wherepalletlama,$datapalletganti,'pallet');
                        $this->masuk_track_model->update($wherepalletbaru,$datapalletbaru,'pallet');
                        if ($detailsal->num_rows()>0) {
                            if ($qtydipalletlama==0) {
                                $this->masuk_track_model->hapus($wheredetsalpalletlama, 'detailsal');
                                if($baru->num_rows()>0){
                                    $this->masuk_track_model->update($wheredetsalpalletbaru, $detsalpalletbaru, 'detailsal');
                                }else{
                                    $this->masuk_track_model->tambah($tambahkepalletbaru, 'detailsal');
                                }
                                // $this->masuk_track_model->tambah($tambahkepalletbaru, 'detailsal');
                            } else {
                                $this->masuk_track_model->update($wheredetsalpalletlama, $detsalpalletlama, 'detailsal');
                                if($baru->num_rows()>0){
                                    $this->masuk_track_model->update($wheredetsalpalletbaru, $detsalpalletbaru, 'detailsal');
                                }else{
                                    $this->masuk_track_model->tambah($tambahkepalletbaru, 'detailsal');
                                }
                            }
                        }else{
                            $this->masuk_track_model->tambah($tambahkepalletbaru, 'detailsal');
                        }
                    }
                    $this->db->trans_complete();

                    if($this->db->trans_status() === false){
                        $this->session->set_flashdata('gagal','Gagal di edit!');
                    }else{
                        $this->session->set_flashdata('sukses', 'Berhasil di edit!');
                    }
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
