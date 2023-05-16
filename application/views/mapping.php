<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hello!</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="<?=base_url()?>assets/js/jquery-3.3.1.js"></script>
    <script src="<?=base_url()?>assets/js/jquery-2.1.4.min.js"></script>
    <style>
    .box {
        width: 80px;
        height: 30px;
        border-radius: .5em;
        padding: 10px;
        font-size: 12px;
    }

    .box.over {
        border: 1px dotted #666;
    }

    .new-pallet {
        height: 200px;
        border: 1px solid #666;
        border-radius: .5em;
        padding: 10px;
        margin-top: 5px;
    }

    .kotak {
        margin-top: 10px;
        margin: 10px;
    }

    .sampah {
        width: 200px;
        border: 1px solid #666;
        border-radius: .5em;
        padding: 10px;
        margin-top: 10px;
        max-width: 100%;
    }

    [draggable] {
        user-select: none;
    }

    .cardd {
        min-width: 180px;
        height: auto;
        border: 1px solid;
        padding: 10px;
        border-radius: .5em;
        max-width: 100%;
        margin-right: 10px;
        margin-left: 10px;
    }

    .texte {
        text-align: left;
    }
    </style>
</head>

<body>
    <div class="card shadow border-0 "
        style="z-index:10;position:relative;top:-250px;width:auto;margin-left:3%;margin-right:3%">
        <div class="bg-gradient-light" style="border-radius: 10px 10px 0px 0px; display:block">
            <div class="main-sparkline8-hd justify-content-between"
                style="display:flex; flex:wrap;padding-top:20px;padding-bottom:20px;padding-left:20px;">
                <h1>Layout Mapping</h1>
            </div>
        </div>
        
        <div style="background-color:#fff">
            <div class="sparkline8-graph shadow">
                <div class="blur" style="position:absolute;padding-left:10px;padding-right:10px">
                    <?php 
					$isi=$this->db->query("SELECT COUNT(status) as isi FROM `pallet` WHERE status='isi' GROUP BY status;");
					foreach($isi->result_array() as $i){
						$pisi=$i['isi'];
					}
					$total=$this->db->query("SELECT COUNT(*) as total FROM `pallet`");
					foreach($total->result_array() as $t){
						$ptotal=$t['total'];
					}
					$util=$pisi/$ptotal*100;
					$output = number_format($util, 2, '.', '');
					echo '<h5><b>Utilisasi : </b>'.$output.' %</h5>'
					?>
                    <!-- <a href="<?= base_url('mapping/status')?>" class="btn btn-sm btn-primary">Refresh</a> -->
                </div>
                <div style="overflow:auto">
                    <div style="width:4000px;">
                        <?php
                        $angka = 1;
                        for ($i = 1; $i <= 50; $i++) {
                            echo '<div style="display:flex">';
                            for ($j = 1; $j <= 50; $j++) {
                                $a = $angka++;
                                $pallet = $this->db->query("SELECT * FROM pallet WHERE posisi='$a'");
                                foreach ($pallet->result_array() as $data) {
                                    $kdpallet = $data['kdpallet'];
                                    $warnap = $data['warna'];
                                    $status = $data['status'];
                                    $warnak = $data['warna2'];
                                }
                                $kondisi = $this->db->query("SELECT * FROM kondisi_gudang WHERE posisi='$a'");
                                foreach ($kondisi->result_array() as $dat) {
                                    $ketkondisi = $dat['id'];
                                    $warnak = $dat['warna'];
                                }
                                if ($pallet->num_rows() > 0) {
									if($status=='isi'){
										echo '<a id="lihatPallet" onclick="modal(`'.$kdpallet.'`)" data-toggle="modal" data-target="#exampleModal" style="color:black;text-decoration:none"><div id="' . $kdpallet . '" draggable="true" data="' . $a . '" class="box" style="border: 1px solid #666;background-color: ' . $warnap . ';"><b>' . $kdpallet . '</b></div></a>';
									}else{
										echo '<a id="lihatPallet" onclick="modal(`'.$kdpallet.'`)" data-toggle="modal" data-target="#exampleModal" style="color:black;text-decoration:none"><div id="' . $kdpallet . '" draggable="true" data="' . $a . '" class="box" style="border: 1px solid #666;background-color: ' . $warnak . ';"><b>' . $kdpallet . '</b></div></a>';
									}
                                } elseif ($kondisi->num_rows() != 0) {
                                    echo '<div id="' . $ketkondisi . '" draggable="true" data="' . $a . '" class="box" style="border: 1px solid #666;background-color: ' . $warnak . ';"><b></b></div>';
                                } else {
                                    echo '<div id="null" draggable="true" data="' . $a . '" class="box" style="border: 0px solid #fff;background-color: white;"></div>';
                                }
                            }
                            echo '</div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<?php $this->load->view("modal-mapping")?>

</html>