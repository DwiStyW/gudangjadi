<?php
/**
 * @property  session $session
 * @property  input $input
 * @property  db $db
 * @property  keluar_model $keluar_model
 * @property  keluar_track_model $keluar_track_model
 * 
 */
class Keluar extends CI_Controller
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
            redirect('auth/logout');
        }
    }
    public function index()
    {
        $data["keluar"] = $this->keluar_model->tampil_barang_keluar();
        $this->load->view("keluar/keluar", $data);
    }

    public function getkeluar(){
        $get = $this->keluar_model->tampil_barang_keluar();
        $no=1;
        foreach($get as $get){
            $sats1  = floor($get->keluar / ($get->max1 * $get->max2));
            $sisa   = $get->keluar - ($sats1 * $get->max1 * $get->max2);
            $sats2  = floor($sisa / $get->max2);
            $sats3  = $sisa - $sats2 * $get->max2;
            $data[] =array(
                "no"=>$no++,
                "tglform"=>date("d-m-Y", strtotime($get->tanggalform)),
                "noform"=>$get->noform,
                "nosppb"=>$get->nobatch,
                "kode"=>$get->kode,
                "nama"=>$get->nama,
                "sat1"=>$sats1.' '.$get->sat1,
                "sat2"=>$sats2.' '.$get->sat2,
                "sat3"=>$sats3.' '.$get->sat3,
                "tanggal"=>$get->tanggal,
                "penginput"=>$get->username,
                "aksi"=>'<a class="btn btn-sm btn-primary" href="'. base_url("keluar/edit_keluar/" . $get->no) .'"><i class="fa fa-edit"></i> Edit</a><a onclick="hapus(`'.$get->no.'`,`'.$get->noform.'`,`'.$get->nobatch.'`,`'.$get->kode.'`,`'. $sats1.'`,`'. $sats2.'`,`'. $sats3.'`,`'. $get->sat1.'`,`'. $get->sat2.'`,`'. $get->sat3.'`)" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapus_modal"><i class="fa fa-trash"></i> Hapus</a>'
            );
        }
        echo json_encode($data);
    }

    public function input_keluar()
    {
        $data['masuk'] = $this->keluar_model->riwayat_all();
        $data['master'] = $this->keluar_model->tampil_master();
        $this->load->view("_partials/header");
        $this->load->view("_partials/menu");
        $this->load->view("keluar/inputkeluar", $data);
        $this->load->view("_partials/footer");
    }

    public function tambah_barang_keluar()
    {
        $tglform = $this->input->post('tglform');
        $tgl = $this->input->post('tgl');
        $noform = $this->input->post('noform');
        $nosppb = $this->input->post('nosppb');
        $koder = $this->input->post('kode');
        $sat1 = $this->input->post('sat1');
        $sat2 = $this->input->post('sat2');
        $sat3 = $this->input->post('sat3');
        $adm = $this->input->post('adm');
        $tglsppb = $this->input->post('tglsppb');

        $tampil1 = $this->db->query("SELECT * FROM master WHERE kode='$koder'");
        foreach ($tampil1->result() as $data1) {
            //konvert 3 Satuan
            $sats1 = $sat1 * $data1->max1 * $data1->max2;
            $sats2 = $sat2 * $data1->max2;
            $jumlah = $sats1 + $sats2 + $sat3;
        }

        $tampil = $this->db->query("SELECT * FROM master WHERE kode='$koder'");
        foreach ($tampil->result() as $data) {
            $hasil = $data->saldo - $jumlah;
        }

        if ($hasil < 0) {
            $this->session->set_flashdata('gagal', 'JUMLAH STOK MINUS !!!');
            redirect("keluar/input_keluar");
        } else {
            //update saldo
            $data2 = array(
                'saldo' => $hasil,
                'tglform' => $tglform,
                'tgl_update' => $tgl,
            );
            $where = array(
                'kode' => $koder,
            );

            //insert riwayat
            $data3 = array(
                'no' => '',
                'tglform' => $tglform,
                'tglsppb' => $tglsppb,
                'kode' => $koder,
                'noform' => $noform,
                'nobatch' => $nosppb,
                'keluar' => 0,
                'keluar' => $jumlah,
                'saldo' => $hasil,
                'ket' => 'Output',
                'tanggal' => $tgl,
                'adm' => $adm,
            );

            //insert detailsalqty
            $detsal = $this->db->where('kode', $koder)->where('ket', 'OUT')->where('noform',$noform)->get('detailsalqty');
            foreach ($detsal->result() as $det) {
                $salqty[] = $det->qty;
            }
            $jumsalqty = 0;
            for ($i = 0; $i < $detsal->num_rows(); $i++) {
                $jumsalqty += $salqty[$i];
            }
            $total = $jumlah + $jumsalqty;
            if ($detsal->num_rows() > 0) {
                $data4 = array(
                    'tglform' => $tglform,
                    'kode' => $koder,
                    'noform' => $noform,
                    'nobatch' => "",
                    'qty' => $total,
                    'ket' => 'OUT',
                );
            } else {
                $data4 = array(
                    'tglform' => $tglform,
                    'kode' => $koder,
                    'noform' => $noform,
                    'nobatch' => "",
                    'qty' => $jumlah,
                    'ket' => 'OUT',
                );
            }
            $where2 = array(
                'kode' => $koder,
                'noform'=> $noform,
            );
            //insert keluar
            // $data4 = array(
            //     'no' => '',
            //     'tglform' => $tglform,
            //     'noform' => $noform,
            //     'kode' => $koder,
            //     'jumlah' => $jumlah,
            //     'tanggal' => $tgl,
            //     'saldo' => $hasil,
            //     'adm' => $adm
            // );

            $this->db->trans_start();
            $this->keluar_model->tambah($data3, 'riwayat');
            $this->keluar_model->update($where, $data2, 'master');
            if ($detsal->num_rows() > 0) {
                $this->keluar_track_model->update($where2, $data4, 'detailsalqty');
            } else {
                $this->keluar_track_model->tambah($data4, 'detailsalqty');
            }
            $this->db->trans_complete();

            if ($this->db->trans_status() === false) {
                $this->session->set_flashdata('gagal', 'Input Barang Keluar Error!');
            } else {
                $this->session->set_flashdata('sukses', 'Input Barang Keluar Success!');
            }
            // if ((isset($data4) && isset($where) && isset($data2) && isset($data3)) && $jumlah > 0) {
            //     $this->keluar_model->tambah($data3, 'riwayat');
            //     $this->keluar_model->update($where, $data2, 'saldo');
            //     $this->keluar_model->tambah($data4, 'keluar');
            //     $this->session->set_flashdata('sukses', 'Input Barang Keluar Success!');
            //     redirect('keluar/input_keluar');
            // } else {
            //     $this->session->set_flashdata('gagal', 'Input Barang Keluar Error!');
            //     redirect('keluar/input_keluar');
            // }
            redirect('keluar/input_keluar');
        }
    }

    public function edit_keluar($no)
    {
        $where = array('no' => $no);
        $data['riwayat'] = $this->keluar_model->get_where($where, 'riwayat')->result();
        $this->load->view('_partials/header');
        $this->load->view('_partials/menu');
        $this->load->view('keluar/editkeluar', $data);
        $this->load->view('_partials/footer');
    }

    public function update_keluar()
    {
        $no     = $this->input->post('no');
        $date   = $this->input->post('tgl');
        $kode   = $this->input->post('kode');
        $noform = $this->input->post('noform');
        $nosppb = $this->input->post('nosppb');
        $sat1   = $this->input->post('sats1');
        $sat2   = $this->input->post('sats2');
        $sat3   = $this->input->post('sats3');
        $tglform= $this->input->post('tglform');
        $tglsppb= $this->input->post('tglsppb');
        $adm    = $this->input->post('adm');
        $cat    = $this->input->post('cat');
        $ket    = "revisiOUT";

        $tampil1 = $this->db->where('no',$no)->get('riwayat');
        foreach ($tampil1->result() as $data1) {
            $noformawal = $data1->noform;
            $qtyawal = $data1->keluar;
        }
        $tampil2 = $this->db->where('kode',$kode)->get('master');
        foreach ($tampil2->result() as $data2) {
            $sats1    = $sat1 * $data2->max1 * $data2->max2;
            $sats2    = $sat2 * $data2->max2;
            $jumlah   = $sats1 + $sats2 + $sat3;
            $saldoakhir = $data2->saldo + $qtyawal - $jumlah; 
        }
        // echo $saldoakhir."  ";
        // echo $qtyawal."  ";
        // echo $jumlah."  ";
        // echo $data2->saldo."  ";

    
        //datalama detailsalqty
        $tampil = $this->db->where('kode',$kode)->where('noform',$noformawal)->WHERE('ket','OUT')->get('detailsalqty');
        $cek = $tampil->num_rows();
        foreach ($tampil->result() as $data) {
            $qtyakhir = $data->qty - $qtyawal + $jumlah;
            $hpsdsq   = $data->qty - $qtyawal;
        } 
        // data saldo
        $data = array(
            'saldo' => $saldoakhir,
            'tgl_update' => $date,
            'tglform' => $tglform
        );
        $where = array(
            'kode' => $kode
        );

        //data riwayat
        $data1 = array(
            'noform' => $noform,
            'nobatch' => $nosppb,
            'kode' => $kode,
            'keluar' => $jumlah,
            'tglsppb' => $tglsppb,
            'tglform' => $tglform,
            'saldo' => $qtyakhir,
            'tanggal' => $date,
            'ket' => $ket,
            'adm' => $adm,
            'cat' => $cat
        );
        $where1 = array(
            'no' => $no
        );
        
        //data detailsalqty
        $data2 = array(
            'qty' => $qtyakhir
        );
        $data3 = array(
            'qty' => $hpsdsq
        );
        //kondisi awal
        $where2 = array(
            'noform'=>$noformawal,
            'kode'=>$kode,
            'ket'=>'OUT'
        );
        //kondisi baru
        $where3 = array(
            'noform'=>$noform,
            'kode'=>$kode,
            'ket'=>'OUT'
        );

        if($cek>0){
            //rubah qty saja
            if($noform==$noformawal) {
                if ($qtyakhir>0) {
                    $this->db->trans_start();
                    $this->keluar_model->update($where2, $data2, 'detailsalqty');
                    $this->keluar_model->update($where, $data, 'master');
                    $this->keluar_model->update($where1, $data1, 'riwayat');
                    $this->db->trans_complete();
                } else {
                    $this->session->set_flashdata("gagal", "JUMLAH STOK MINUS !!!");
                    redirect("keluar");
                }
            } else {
                //beda nobatch atau noform
                //hapus atau edit datalama
                if($hpsdsq==0){
                    //hapus detailsalqty lama bila 0
                    $this->db->trans_start();
                    $this->keluar_model->hapus($where2, 'detailsalqty');
                } else {
                    //update detailsalqty lama tidak 0
                    $this->db->trans_start();
                    $this->keluar_model->update($where2, $data3, 'detailsalqty');
                }

                //ambil databaru
                $tampil3 = $this->db->where('kode',$kode)->where('noform',$noform)->WHERE('ket','OUT')->get('detailsalqty');
                $cek1 = $tampil3->num_rows();
                foreach ($tampil3->result() as $datanew) {
                    $qtynew = $datanew->qty + $jumlah;
                }
                if($cek1>0){
                    //jika detailsalqty baru ada saldo
                    $data4 = array(
                        'qty' => $qtynew
                    );
                    //update detailsalqty baru
                    $this->keluar_model->update($where3, $data4, 'detailsalqty');
                } else {
                    //tambah detailsalqty baru
                    $data5 = array(
                        'qty' => $jumlah,
                        'noform'=>$noform,
                        'kode'=>$kode,
                        'tglform'=>$tglform,
                        'nobatch'=>'',
                        'ket'=>'OUT'
                    );
                    $this->keluar_model->tambah($data5,'detailsalqty');
                }
                $this->keluar_model->update($where, $data, 'master');
                $this->keluar_model->update($where1, $data1, 'riwayat');
                $this->db->trans_complete();
            }

            if ($this->db->trans_status()===false) {
                $this->session->set_flashdata('gagal', 'Edit Barang keluar Error!');
            } else {
                $this->session->set_flashdata('sukses', 'Edit Barang keluar Success!');
            }
            redirect("keluar");
        } else { 
            //else keberadaan kosong
            $this->session->set_flashdata("gagal", "Gagal ! ! Barang Telah di pindah Ke Pallet !!!");
            redirect("keluar");
        }
        
    }

    public function hapus_keluar()
    {
        $kode = $this->input->post('kode');
        $no = $this->input->post('no');
        $noform = $this->input->post('noform');
        $nobatch = $this->input->post('nobatch');

        $date = date("Y-m-d H:i:s");
        $tampil1 = $this->db->query("SELECT * FROM riwayat WHERE no = $no");
        foreach ($tampil1->result() as $data1) {
            $awal = $data1->keluar;
        }
        $tampil = $this->db->query("SELECT * FROM master WHERE kode='$kode'");
        foreach ($tampil->result() as $data) {
            $hasil = $data->saldo + $awal;
        }

        //update master
        $data2 = array(
            'saldo' => $hasil,
            'tgl_update' => $date,
        );
        $where = array('kode' => $kode);
        $where1 = array('no' => $no);

        //untuk detailsalqty
        $dsq = $this->db->where('kode',$kode)->where('noform',$noform)->where('ket','OUT')->get('detailsalqty');
        foreach($dsq->result() as $d){
            $qty = $d->qty;
        }
        //update detailsalqty
        $data3 = array(
            'qty' => $qty-$awal
        );
        $where2 = array(
            'noform'=>$noform,
            'kode'=>$kode,
        );
        $cek_dsq = $qty - $awal;
        
        if($cek_dsq < 0){
            $this->session->set_flashdata("gagal", "JUMLAH STOK MINUS !!!");
            redirect("keluar");
        }else{
            $this->db->trans_start();
            $this->keluar_model->update($where, $data2, 'master');
            $this->keluar_model->hapus($where1, 'riwayat');
            if ($cek_dsq == 0) {
                $this->keluar_model->hapus($where2, 'detailsalqty');
            } else {
                $this->keluar_model->update($where2, $data3, 'detailsalqty');
            }
            $this->db->trans_complete();
            if ($this->db->trans_status() === false) {
                $this->session->set_flashdata('gagal', 'Delete Barang Keluar Error!');
            } else {
                $this->session->set_flashdata('sukses', 'Delete Barang Keluar Success!');
            }
            redirect("keluar");
        }
    }

    public function cekduplicate()
    {
        $noform = $this->input->post('q');
        $sql = $this->db->query("select * from riwayat where noform = '$noform'");

        if ($sql->num_rows() > 0) {
            echo " &#10060; No Form Duplicate!!! Cek tabel di bawah.";
        }
    }

    public function getqty()
    {
        $noform = $this->input->post('noform', true);
        $kode = $this->input->post('kode', true);
        // $nobatch = $this->input->post('nobatch', true);
        $query = $this->db->join('master','master.kode = detailsalqty.kode')->where('noform',$noform)->where('detailsalqty.ket','OUT')->where('detailsalqty.kode',$kode)->get('detailsalqty');
        if($query->num_rows()>0){
            $data = $query->result();
        }else{
            $data = $this->db->where('kode',$kode)->get('master')->result();
        }
        echo json_encode($data);
    }

    public function tambah_keluar(){
        for($i=0;$i<=$this->input->post('index');$i++){
            $master = $this->db->where("kode",$this->input->post("kode")[$i])->get("master")->result();
            foreach($master as $m){
                $sats1  = $m->max1;
                $sats2  = $m->max2;
                $saldo  = $m->saldo;
                $nama   = $m->nama;
                // $jumlah = $sats1 + $sats2 + $this->input->post("sat3")[$i];
            }
            $sat1 = $sats1*$this->input->post("sat1")[$i]*$sats2;
            $sat2 = $sats2*$this->input->post("sat2")[$i];
            $jumlah = $sat1 + $sat2 + $this->input->post("sat3")[$i];
            $sisa_saldo = $saldo - $jumlah;
            $minus[]=array(
                "no"=>$i+1,
                "kode"=>$this->input->post("kode")[$i],
                "nama"=>$nama,
                "cek"=>$sisa_saldo,
                "status"=>'<i class="fa fa-times-circle fa-lg text-danger"></i>'
            );
            $data[] = array(
                'tglform'=>$this->input->post("tglform"),
                'noform'=>$this->input->post("noform"),
                'kode'=>$this->input->post("kode")[$i],
                'nobatch'=>$this->input->post("nosppb"),
                'tanggal'=>$this->input->post("tgl"),
                'tglsppb'=>$this->input->post("tglsppb"),
                'adm'=>$this->input->post("adm"),
                'suplai'=>$this->input->post("supplier"),
                'masuk'=>0,
                'keluar'=>$jumlah,
                'saldo'=>$sisa_saldo,
                'cat'=>$this->input->post("cat"),
                'ket'=>"Output"
            );
            $datamaster[]=array('saldo'=>$sisa_saldo);
            $wheremaster[]=array('kode'=>$this->input->post("kode")[$i]);
            $detsal = $this->db->where('kode',$this->input->post("kode")[$i])->where('ket','OUT')->where('noform',$this->input->post("noform"))->get('detailsalqty');
            if($detsal->num_rows() > 0) {
                foreach($detsal->result() as $det) {
                    $salqty[] = $det->qty;
                }
            }else{
                $salqty[]=0;
            }
            $total[] = $jumlah+$salqty[$i];
            $datadsq[]=array(
                'tglform'=>$this->input->post("tglform"),
                'noform'=>$this->input->post("noform"),
                'kode'=>$this->input->post("kode")[$i],
                'qty'=>$jumlah,
                'ket'=>'OUT'
            );
            $updatedsq[]=array('qty'=>$total[$i]);
            $wheredsq[]=array(
                'kode'=>$this->input->post('kode')[$i],
                'noform'=>$this->input->post("noform"),
            );

            if($saldo - $jumlah >= 0) {
                $this->db->trans_start();
                $this->db->insert("riwayat", $data[$i]);
                $this->db->where($wheremaster[$i])->update("master", $datamaster[$i]);
                if($detsal->num_rows() > 0) {
                    $this->db->where($wheredsq[$i])->update("detailsalqty", $updatedsq[$i]);
                } else {
                    $this->db->insert("detailsalqty", $datadsq[$i]);
                }
                $this->db->trans_complete();
                if($this->db->trans_status()===FALSE){
                    $minus[$i]["status"]='<i class="fa fa-times-circle fa-lg text-danger"></i>';
                }else{
                    $minus[$i]["status"]='<i class="fa fa-check-circle fa-lg text-success"></i>';
                }
            }
        }
        echo json_encode($minus);
    }
}