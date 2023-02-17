<!-- Modal -->
<div class="modal fade" id="hapus_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Produk Keluar</h1>
      </div>
      <form action="<?= base_url("keluar/hapus_keluar")?>" method="post">
      <div class="modal-body">
          <input type="hidden" name="no" class="form-control" id="no">
          <input type="hidden" name="noform" class="form-control" id="noform">
          <input type="hidden" name="nobatch" class="form-control" id="nobatch">
          <input type="hidden" name="kode" class="form-control" id="kode">
          <p>Anda ingin menghapus sebesar : </p>
          <p id="input"></p>
          <br>
          <p>Jumlah yang bisa dihapus : </p>
          <p id="qty"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-danger">Hapus</button>
      </div>
    </form>
    </div>
  </div>
</div>

<script>
    function hapus(no,noform,nobatch,kode,isi1,isi2,isi3,sat1,sat2,sat3){
        document.getElementById("kode").value = kode;
        document.getElementById("no").value = no;
        document.getElementById("noform").value = noform;
        document.getElementById("nobatch").value = nobatch;
        document.getElementById("input").innerHTML = isi1+' '+sat1+' '+isi2+' '+sat2+' '+isi3+' '+sat3;

        $.ajax({
            url: "<?php echo site_url('keluar/getqty'); ?>",
            method: "POST",
            data: {
                noform: noform,
                kode: kode,
                nobatch: nobatch
            },
            async: true,
            dataType: 'json',
            success: function(data) {
                    var sat1 = Math.floor(data[0].qty / (data[0].max1*data[0].max2));
                    var sisa  = data[0].qty - (sat1 * data[0].max1 * data[0].max2);
                    var sat2  = Math.floor(sisa / data[0].max2);
                    var sat3  = sisa - sat2 * data[0].max2;
                    if(data[0].qty!=null){
                        document.getElementById('qty').innerHTML = sat1+' '+data[0].sat1+' '+sat2+' '+data[0].sat2+' '+sat3+' '+data[0].sat3;
                    }else{
                        document.getElementById('qty').innerHTML = 0+' '+data[0].sat1+' '+0+' '+data[0].sat2+' '+0+' '+data[0].sat3;
                    }
                console.log(data);
            }
        });
    }
</script>