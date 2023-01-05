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
        width: auto;
    }

    .kotak {
        width: 100%;
        margin-top: 10px;
        margin: 10px;
    }

    [draggable] {
        user-select: none;
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
									}
                                    $kondisi=$this->db->query("SELECT * FROM kondisi_gudang WHERE posisi='$a'");
                                    foreach($kondisi->result_array() as $dat){
										$ketkondisi=$dat['ket'];
										$warna=$dat['warna'];
									}
									if($pallet->num_rows()!=0){
									echo '<div id="'.$kdpallet.'" draggable="true" data="'.$a.'" class="box" style="border: 1px solid #666;background-color: #ddd;"><b>'.$kdpallet.'</b></div>';
									}elseif($kondisi->num_rows()!=0){
									echo '<div id="'.$ketkondisi.'" draggable="true" data="'.$a.'" class="box" style="border: 1px solid #666;background-color: '.$warna.';"><b>'.$ketkondisi.'</b></div>';
									}else{
									echo '<div id="null" draggable="true" data="'.$a.'" class="box" style="border: 1px solid #666;background-color: #ddd;"></div>';
									}
								}
								echo '</div>';
							}
							?>
                    </div>
                </div>
                <div class="justify-content-between" style="display:flex">
                    <div class="kotak">
                        <button class="btn btn-sm btn-primary" style="display:flex">Tambah</button>
                        <div class="new-pallet">
                            <div style="color:#ddd;margin-left:11%;position:absolute">
                                <h4>Pallet Tidak Dalam Map</h4>
                            </div>
                            <?php 
								$pallet=$this->db->query("SELECT * FROM pallet WHERE posisi=''");
									foreach($pallet->result_array() as $data){
										$kdpallet=$data['kdpallet'];
										echo '<div id="'.$kdpallet.'" draggable="true" data="" class="box" style="border: 1px solid #666;background-color: #ddd;"><b>'.$kdpallet.'</b></div>';
									}
							?>
                        </div>
                    </div>
                    <div class="kotak">
                        <button class="btn btn-sm btn-primary" style="display:flex">Tambah</button>
                        <div class="new-pallet">
                            <div style="color:#ddd;margin-left:14%;position:absolute">
                                <h4>Kondisi Gudang</h4>
                            </div>
                            <?php 
								$kondisi=$this->db->query("SELECT * FROM kondisi_gudang WHERE posisi=''");
									foreach($kondisi->result_array() as $datak){
										$ketkondisi=$datak['ket'];
										$color=$datak['warna'];
										echo '<div id="'.$ketkondisi.'" draggable="true" data="" class="box" style="border: 1px solid #666;background-color:'.$color.';"><b>'.$ketkondisi.'</b></div>';
									}
							?>
                        </div>
                    </div>
                    <div class="kotak" style="max-width:200px">
                        <div class="new-pallet" style="height: 100%">
                            <div style="color:#ddd;margin-left:5%;position:absolute;margin-top:7%">
                                <h4>Sampah</h4>
                            </div>
                            <div style="overflow:auto;margin-top:10px">
                                <div style="width:800px">
                                    <?php 
										for($i=1;$i<=6;$i++){
										echo '<div style="display:flex">';
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

</html>