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
            this.style.opacity = '0.4';

            dragSrcEl = this;
            // console.log(dragSrcEl);
            e.dataTransfer.effectAllowed = 'move';
            e.dataTransfer.setData('text/html', this.innerHTML);
            e.dataTransfer.setData('id', this.id);
            e.dataTransfer.setData('data', this.getAttribute('data'));
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
                this.innerHTML = e.dataTransfer.getData('text/html');
                this.id = e.dataTransfer.getData('id');
                this.data = e.dataTransfer.getData('data');
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
                    success: function(data) {
                        // dragSrcEl.innerHTML = this.innerHTML;
                        // dragSrcEl.id = this.id;
                        // dragSrcEl.data = this.data;
                        // this.innerHTML = e.dataTransfer.getData('text/html');
                        // this.id = e.dataTransfer.getData('id');
                        // this.data = e.dataTransfer.getData('data');
                        // console.log('id', this.id)
                    }
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

    [draggable] {
        user-select: none;
    }
    </style>
</head>

<body>
    <div class="card shadow border-0 "
        style="z-index:10;position:relative;top:-250px;width:auto;margin-left:5%;margin-right:5%">
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
									if($pallet->num_rows()!=0){
									echo '<div id="'.$kdpallet.'" draggable="true" data="'.$a.'" class="box" style="border: 1px solid #666;background-color: #ddd;"><b>'.$kdpallet.'</b></div>';
									}else{
									echo '<div id="null" draggable="true" data="'.$a.'" class="box" style="border: 1px solid #666;background-color: #ddd;"></div>';
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


</html>
