<!-- Copyright 2018 Google LLC.
SPDX-License-Identifier: Apache-2.0 -->

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hello!</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="<?= base_url() ?>assets/js/jquery-3.3.1.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', (event) => {

        var dragSrcEl = null;

        function handleDragStart(e) {
            // this.style.opacity = '0.4';

            dragSrcEl = this;
            // console.log(dragSrcEl);
            e.dataTransfer.effectAllowed = 'move';
            e.dataTransfer.setData('text/html', this.innerHTML);
            e.dataTransfer.setData('id', this.id);
            e.dataTransfer.setData('data', this.getAttribute('data'));
            e.dataTransfer.setData('style', this.getAttribute('style'));
            console.log(this.getAttribute('style'))
        }

        function handleDragOver(e) {
            if (e.preventDefault) {
                e.preventDefault();
            }

            e.dataTransfer.dropEffect = 'move';

            return false;
        }

        function handleDragEnter(e) {
            this.classList.add('over');
        }

        function handleDragLeave(e) {
            this.classList.remove('over');
        }

        function handleDrop(e) {
            if (e.stopPropagation) {
                e.stopPropagation(); // stops the browser from redirecting.
            }

            if (dragSrcEl != this) {

                dragSrcEl.innerHTML = this.innerHTML;
                dragSrcEl.id = this.id;
                dragSrcEl.data = this.getAttribute('data');
                dragSrcEl.style = this.getAttribute('style');
                this.innerHTML = e.dataTransfer.getData('text/html');
                this.id = e.dataTransfer.getData('id');
                this.data = e.dataTransfer.getData('data');
                this.style = e.dataTransfer.getData('style');
                // console.log(dragSrcEl.id)


                posisiA = this.data;
                pA = this.id;
                posisiB = dragSrcEl.data;
                pB = dragSrcEl.id;
                // console.log(this);
                // console.log(pA + " to " + pB);
                // console.log(posisiB + " to " + posisiA);
                console.log(this.id);
                console.log(this.data);
                console.log(dragSrcEl.id);
                console.log(dragSrcEl.data);


                $.ajax({
                    url: "<?php echo site_url('mapping2/edit');?>",
                    method: "POST",
                    data: {
                        pallet1: pA,
                        pallet2: pB,
                        posisi1: posisiA,
                        posisi2: posisiB,
                    },
                    async: true,
                    dataType: 'json',
                    success: function(data) {}
                });
                return false;
            }

            return false;
        }

        function handleDragEnd(e) {
            this.style.opacity = '1';

            items.forEach(function(item) {
                item.classList.remove('over');
            });

        }


        let items = document.querySelectorAll('.box');
        // console.log(items);
        items.forEach(function(item) {
            item.addEventListener('dragstart', handleDragStart, false);
            item.addEventListener('dragenter', handleDragEnter, false);
            item.addEventListener('dragover', handleDragOver, false);
            item.addEventListener('dragleave', handleDragLeave, false);
            item.addEventListener('drop', handleDrop, false);
            item.addEventListener('dragend', handleDragEnd, false);
        });
    });
    </script>
    <style>
    .box {
        width: 80px;
        height: 30px;
        border-radius: .5em;
        padding: 10px;
        cursor: move;
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
        width: auto;
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
                <h1>Edit Mapping</h1>
            </div>
        </div>

        <div style="background-color:#fff">
            <div class="sparkline8-graph shadow">
                <div style="overflow:auto">
                    <div style="width:4000px;">
                        <?php
							$angka=1;
							for($i=1;$i<=50;$i++){
								echo '<div style="display:flex">';
								for($j=1;$j<=50;$j++){
									$a=$angka++;
									$pallet=$this->db->query("SELECT * FROM pallet WHERE posisi='$a'");
									foreach($pallet->result_array() as $data){
										$kdpallet=$data['kdpallet'];
										$warnap=$data['warna'];
									}
                                    $kondisi=$this->db->query("SELECT * FROM kondisi_gudang WHERE posisi='$a'");
                                    foreach($kondisi->result_array() as $dat){
										$ketkondisi=$dat['id'];
										$warnak=$dat['warna'];
									}
									if($pallet->num_rows()!=0){
									echo '<div id="'.$kdpallet.'" draggable="true" data="'.$a.'" class="box" style="border: 1px solid #666;background-color: '.$warnap.';"><b>'.$kdpallet.'</b></div>';
									}elseif($kondisi->num_rows()!=0){
									echo '<div id="'.$ketkondisi.'" draggable="true" data="'.$a.'" class="box" style="border: 1px solid #666;background-color: '.$warnak.';"><b></b></div>';
									}else{
									echo '<div id="null" draggable="true" data="'.$a.'" class="box" style="border: 1px solid #666;background-color: #ddd;"></div>';
									}
								}
								echo '</div>';
							}
							?>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-9 col-md-12">
                        <div class="kotak">
                            <button class="btn btn-sm btn-primary" style="display:flex" data-toggle="modal"
                                data-target="#tambahpallet">Tambah</button>
                            <div class="new-pallet">
                                <?php 
								$pallet=$this->db->query("SELECT * FROM pallet WHERE posisi=''");
									foreach($pallet->result_array() as $data){
										$kdpallet=$data['kdpallet'];
										echo '<div id="'.$kdpallet.'" draggable="true" data="" class="box" style="border: 1px solid #666;background-color: #ddd;"><b>'.$kdpallet.'</b></div>';
									}
							?>
                            </div>
                        </div>
                        <!-- <div class="kotak">
                            <button class="btn btn-sm btn-primary" style="display:flex">Tambah</button>
                            <div class="new-pallet">
                                <?php 
									$q1=$this->db->query("SELECT * FROM kondisi_gudang  WHERE posisi=''");
									foreach($q1->result_array() as $dq1){
										$warnadq1[]=$dq1['warna'];
										$ketdq1[]=$dq1['id'];

									}
									$q2=$this->db->query("SELECT * FROM kondisi_gudang group by warna");
									$rq2=$q2->num_rows();
									echo '<div style="display: flex;flex-wrap:wrap;justify-content: start;">';
									foreach ($q2->result_array() as $dq2){
										$vwar=$dq2['warna'];
										$vket=$dq2['id'];
										echo '<div><div class="cardd"><h6 class="texte">'.$dq2['ket'].'</h6></div>';

										$q3=$this->db->query("SELECT * FROM kondisi_gudang where warna='$vwar' and posisi=''");
										foreach ($q3->result_array() as $dq3){
											echo '<div style="margin-left:10px;"><div id="'.$dq3['id'].'" draggable="true" data="" class="box" style="border: 1px solid #666;background-color:'.$dq3['warna'].';"><b></b></div></div>';
										}
										echo '</div>';
									}
									echo '</div>';
									$angka=1;
									for($i=1;$i<=5;$i++){
										echo '<div style="display:flex">';
										for($j=1;$j<=6;$j++){
											$a=$angka++;
											if (isset($warnadq1[$a-1])!=null){
												// echo $warnadq1[$a-1];
												// echo '<div id="'.$ketdq1[$a-1].'" draggable="true" data="" class="box" style="border: 1px solid #666;background-color:'.$warnadq1[$a-1].';"><b></b></div>';
											}
										}
											echo '</div>';
									}
									?>
                            </div>
                        </div> -->
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <h5>Sampah</h5>
                        <div class="sampah">
                            <div style="overflow:auto;margin-top:10px">
                                <div style="width:800px">
                                    <?php 
										for($i=1;$i<=6;$i++){
										echo '<div style="display: flex;flex-wrap:wrap;">';
										for($j=1;$j<=10;$j++){
											echo '<div id="null" draggable="true" data="" class="box"
												style="border: 1px solid #ddd;background-color: whitesmoke;">
												</div>';	
										}
										echo '</div>';
									}
									?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


<!-- Modal -->
<div class="modal fade" id="tambahpallet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pallet Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nomor Pallet</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1">
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="warna1">Warna Ketika isi</label>
                            <input type="color" value="#d9b432" class="form-control" id="warna1">
                        </div>
                        <div class="col-lg-6">
                            <label for="warna2">Warna Ketika Kosong</label>
                            <input type="color" value="#f7e7ad" class="form-control" id="warna2">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>



</html>