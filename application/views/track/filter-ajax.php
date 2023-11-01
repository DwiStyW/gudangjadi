<script>
    $(document).ready(function() {
    $("#kode").select2({
        placeholder: "Nama Produk",
    });
    $("#batch").select2({
        placeholder: "No. Batch",
    });
    $("#pallet").select2({
        placeholder: "No. Pallet",
    });
    $("#tabel").dataTable({
        columnDefs: [{
            targets: -1,
            className: 'dt-body-nowrap',
        }],
        "lengthMenu":[
            [10,50,100,-1],
            [10,50,100,"All"]
        ],
        dom: 'lBftip',
        buttons: [
            'copy','excel','print','pdf'
        ],
        order:[[9, 'asc']],
        "columnDefs": [
            { "visible": false, "targets": 9 }
        ]
    });
});
    function filter(){
        var kode = document.getElementById('kode').value
        var batch = document.getElementById('batch').value
        var pallet = document.getElementById('pallet').value
        $.ajax({
            url: "<?php echo site_url('track/saldo_track/filter'); ?>",
            method: "POST",
            data: {
                kode: kode,
                batch:batch,
                pallet:pallet
            },
            async: true,
            dataType: 'json',
            success: function(html) {
                if(html=="not found"){
                    document.getElementById("isi").innerHTML = "<tr><td colspan='9' style='text-align:center'>Data tidak ditemukan</td></tr>"
                }else{
                    $("#tabel").dataTable({
                        destroy:true,
                        data:html,
                        columns:[
                            {data:"no"},
                            {data:"nobatch"},
                            {data:"kode"},
                            {data:"nama"},
                            {data:"nopallet"},
                            {data:"sat1"},
                            {data:"sat2"},
                            {data:"sat3"},
                            {data:"exp"},
                            {data:"ed"},
                            {data:"aksi"},
                        ],
                        "lengthMenu":[
                            [10,50,100,-1],
                            [10,50,100,"All"]
                        ],
                        columnDefs: [{
                            targets: -1,
                            className: 'dt-body-nowrap',
                        }],
                        dom: 'lBftip',
                        buttons: [
                            'copy','excel','print','pdf'
                        ],
                        order:[[9, 'asc']],
                        "columnDefs": [
                            { "visible": false, "targets": 9 }
                        ]
                    });
                }
            }
        });
    }
</script>

<!-- Untuk kode -->
<script>
    // set batch
    $(document).ready(function(){
        $("#kode").change(function(){
            var kode=document.getElementById("kode").value;
            $.ajax({
            url: "<?php echo site_url('track/saldo_track/getbatch'); ?>",
            method: "POST",
            data: {
                kode: kode,
            },
            async: true,
            dataType: 'json',

            success: function(data){
                var html='';
                let i =0;
                html+='<option value=""></option>'
                html+='<option value="unset">Pilih batch</option>'
                for(i=0;i<data.length;i++){
                    html+='<option value="'+data[i].nobatch+'">'+data[i].nobatch+'</option>'
                }
                $("#batch").html(html);
            }
            })
        })
        // set pallet
        $("#kode").change(function(){
            var kode=document.getElementById("kode").value;
            $.ajax({
            url: "<?php echo site_url('track/saldo_track/getpallet'); ?>",
            method: "POST",
            data: {
                kode: kode,
            },
            async: true,
            dataType: 'json',

            success: function(data){
                var html='';
                let i =0;
                html+='<option value=""></option>'
                html+='<option value="unset">Pilih pallet</option>'
                for(i=0;i<data.length;i++){
                    html+='<option value="'+data[i].nopallet+'">'+data[i].nopallet+'</option>'
                }
                $("#pallet").html(html);
            }
            })
        })
    }) 
</script>
<!-- Untuk batch -->
<script>
    // set kode
    $(document).ready(function(){
        $("#batch").change(function(){
            var batch=document.getElementById("batch").value;
            $.ajax({
            url: "<?php echo site_url('track/saldo_track/getkode'); ?>",
            method: "POST",
            data: {
                batch: batch,
            },
            async: true,
            dataType: 'json',

            success: function(data){
                var html='';
                let i =0;
                html+='<option value=""></option>'
                html+='<option value="unset">Pilih kode</option>'
                for(i=0;i<data.length;i++){
                    html+='<option value="'+data[i].kode+'">'+data[i].nama+'</option>'
                }
                $("#kode").html(html);
            }
            })
        })
        // set pallet
        $("#batch").change(function(){
            var batch=document.getElementById("batch").value;
            $.ajax({
            url: "<?php echo site_url('track/saldo_track/getnopallet'); ?>",
            method: "POST",
            data: {
                batch: batch,
            },
            async: true,
            dataType: 'json',

            success: function(data){
                var html='';
                let i =0;
                html+='<option value=""></option>'
                html+='<option value="unset">Pilih pallet</option>'
                for(i=0;i<data.length;i++){
                    html+='<option value="'+data[i].nopallet+'">'+data[i].nopallet+'</option>'
                }
                $("#pallet").html(html);
            }
            })
        })
    }) 
</script>
<!-- Untuk pallet -->
<script>
    // set kode
    $(document).ready(function(){
        $("#pallet").change(function(){
            var pallet=document.getElementById("pallet").value;
            $.ajax({
            url: "<?php echo site_url('track/saldo_track/getpkode'); ?>",
            method: "POST",
            data: {
                pallet: pallet,
            },
            async: true,
            dataType: 'json',

            success: function(data){
                var html='';
                let i =0;
                html+='<option value=""></option>'
                html+='<option value="unset">Pilih kode</option>'
                for(i=0;i<data.length;i++){
                    html+='<option value="'+data[i].kode+'">'+data[i].nama+'</option>'
                }
                $("#kode").html(html);
            }
            })
        })
        // set pallet
        $("#pallet").change(function(){
            var pallet=document.getElementById("pallet").value;
            $.ajax({
            url: "<?php echo site_url('track/saldo_track/getnobatch'); ?>",
            method: "POST",
            data: {
                pallet: pallet,
            },
            async: true,
            dataType: 'json',

            success: function(data){
                var html='';
                let i =0;
                html+='<option value=""></option>'
                html+='<option value="unset">Pilih batch</option>'
                for(i=0;i<data.length;i++){
                    html+='<option value="'+data[i].nobatch+'">'+data[i].nobatch+'</option>'
                }
                $("#batch").html(html);
            }
            })
        })
    }) 
</script>