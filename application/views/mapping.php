<!-- Copyright 2018 Google LLC.
SPDX-License-Identifier: Apache-2.0 -->

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hello!</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<<<<<<< HEAD
    <script src="<?= base_url() ?>assets/js/jquery-3.3.1.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery-2.1.4.min.js"></script>
=======
    <script src="<?=base_url()?>assets/js/jquery-3.3.1.js"></script>
    <script src="<?=base_url()?>assets/js/jquery-2.1.4.min.js"></script>
>>>>>>> 41c1f6245091b6743a47652aa8978494afb0e756
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
                                }
                                $kondisi = $this->db->query("SELECT * FROM kondisi_gudang WHERE posisi='$a'");
                                foreach ($kondisi->result_array() as $dat) {
                                    $ketkondisi = $dat['id'];
                                    $warnak = $dat['warna'];
                                }
<<<<<<< HEAD
                                if ($pallet->num_rows() > 0) {
                                    echo '<a id="lihatPallet" onclick="modal(`' . $kdpallet . '`)" data-toggle="modal" data-target="#exampleModal" style="color:black;text-decoration:none"><div id="' . $kdpallet . '" draggable="true" data="' . $a . '" class="box" style="border: 1px solid #666;background-color: ' . $warnap . ';"><b>' . $kdpallet . '</b></div></a>';
=======
                                if ($pallet->num_rows() != 0) {
                                    echo '<div id="' . $kdpallet . '" draggable="true" data="' . $a . '" class="box" style="border: 1px solid #666;background-color: ' . $warnap . ';"><a id="lihatPallet" onclick="modal(`'.$kdpallet.'`)" type="button" data-toggle="modal" data-target="#exampleModal" style="color:black;text-decoration:none"><b>' . $kdpallet . '</b></a></div>';
>>>>>>> 41c1f6245091b6743a47652aa8978494afb0e756
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

<script>
<<<<<<< HEAD
function modal(kdpallet) {
    document.getElementById('exampleModalLabel').innerHTML = kdpallet;
    console.log(kdpallet);
    $.ajax({
        url: "<?php echo site_url('mapping/getkdpallet'); ?>",
        method: "POST",
        data: {
            kdpallet: kdpallet
        },
        async: true,
        dataType: 'json',
        success: function(data) {
            var html = '';
            for (i = 0; i < data.length; i++) {
                html += '<tr>'
                html += '<td>' + parseInt(i + 1) + '</td>'
                html += '<td>' + data[i].tglform + '</td>'
                html += '<td>' + data[i].nobatch + '</td>'
                html += '<td>' + data[i].kode + '</td>'
                html += '<td>' + data[i].nama + '</td>'
                var sat1 = Math.floor(data[i].qty / (data[i].max1 * data[i].max2));
                var sisa = data[i].qty - (sat1 * data[i].max1 * data[i].max2);
                var sat2 = Math.floor(sisa / data[i].max2);
                var sat3 = sisa - sat2 * data[i].max2;
                html += '<td>' + sat1 + ' ' + data[i].sat1 + '</td>'
                html += '<td>' + sat2 + ' ' + data[i].sat2 + '</td>'
                html += '<td>' + sat3 + ' ' + data[i].sat3 + '</td>'
                html += '</tr>'
            }
            console.log(html);
            $('#isiPallet').html(html);
        }
    });
=======
function modal(kdpallet){
document.getElementById('exampleModalLabel').innerHTML = kdpallet;
>>>>>>> 41c1f6245091b6743a47652aa8978494afb0e756
}
</script>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<<<<<<< HEAD
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
            </div>
            <div class="modal-body">
                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true"
                    data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true"
                    data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId"
                    data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                    <thead>
                        <tr>
                            <th rowspan="2" style="vertical-align : middle;text-align:center;">No</th>
                            <th rowspan="2">Tanggal Form</th>
                            <th rowspan="2">No Batch</th>
                            <th rowspan="2">Kode</th>
                            <th rowspan="2">Nama Barang</th>
                            <th colspan="3" style="vertical-align : middle;text-align:center;">saldo</th>
                        </tr>
                        <tr>
                            <th>Sat 1</th>
                            <th>Sat 2</th>
                            <th>Sat 3</th>
                        </tr>
                    </thead>


                    <tbody id="isiPallet">
                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

=======
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true"
                data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true"
                data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId"
                data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                <thead>
                    <tr>
                        <th rowspan="2" style="vertical-align : middle;text-align:center;">No</th>
                        <th rowspan="2">Tanggal</th>
                        <th rowspan="2">No Batch</th>
                        <th rowspan="2">Kode</th>
                        <th rowspan="2">Nama Barang</th>
                        <th colspan="3" style="vertical-align : middle;text-align:center;">saldo</th>
                    </tr>
                    <tr>
                        <th>Sat 1</th>
                        <th>Sat 2</th>
                        <th>Sat 3</th>
                    </tr>
                </thead>


                <tbody>
                    <td></td>
                </tbody>
            </table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<script>
    $(document).ready(function() {
    $('#exampleModalLabel').click(function() {
        var kdpallet = document.getElementById("exampleModalLabel").innerHTML;
        console.log(kdpallet);
        $.ajax({
            url: "<?php echo site_url('mapping/getkdpallet'); ?>",
            method: "POST",
            data: {
                kdpallet: kdpallet
            },
            async: true,
            dataType: 'json',
            success: function(data) {
                // for (i = 0; i < data.length; i++) {
                //     html += '<option value=' + data[i].kode + '>' + data[i]
                //         .nama + '</option>';
                // }
                html1 = data[0].nopallet
                console.log(html1)
                // $('#isiPallet').html(html);
            }
        });
        return false;
    });
});
</script>
>>>>>>> 41c1f6245091b6743a47652aa8978494afb0e756
</html>