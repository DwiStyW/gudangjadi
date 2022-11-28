 <?php
    ini_set('date.timezone', 'Asia/Jakarta');
    ?>
 <div class="layarlebar">
     <div class="admin-dashone-data-table-area mg-b-40">
         <div class="container" style="position:relative;top:-250px;z-index: 1">
             <div class="d-flex">
                 <div class="bg-gradient-light" style="border-radius: 10px 10px 0px 0px; display:block">
                     <div class="container">
                         <h4 class="mt-3 mb-3 ml-3"><b>Master Golongan</b></h4>
                     </div>
                 </div>
                 <div style="background-color:#fff">
                     <div class="sparkline8-graph">
                         <div class="datatable-dashv1-list custom-datatable-overright" style="margin-left:10px;margin-right:10px;padding-bottom:10px">
                             <div id="toolbar">
                                 <button class="btn btn-sm btn-primary login-submit-cs" data-toggle="modal" data-target="#exampleModal">Input Golongan</button>
                                 <a href="<?= base_url('master') ?>"><button class="btn btn-white" type="button">Kembali</button></a>
                             </div>
                             <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                 <thead>
                                     <tr>
                                         <th data-field="no">No</th>
                                         <th data-field="kode">Kode Golongan</th>
                                         <th data-field="name">Nama Golongan</th>
                                         <th data-field="aksi">Aksi</th>

                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php
                                        $no = 1;
                                        foreach ($golongan as $g) {
                                        ?>
                                         <tr>
                                             <td><?php echo $no++; ?></td>
                                             <td><?php echo $g->kdgol; ?></td>
                                             <td><?php echo $g->namagol; ?></td>
                                             <td>
                                                 <!-- <a class="btn btn-sm btn-primary" href="editgol.php?hal=edit&kd=<?php echo $data['id']; ?>"><i class="fa fa-edit"></i> Edit</a>
                          <a class="btn btn-sm btn-danger" href="hapusgr.php?hal=hapus&kd=<?php echo $data['id']; ?>" onclick="javascript: return confirm('Anda yakin hapus ?')"><i class="fa fa-wrench"></i> Hapus</a> -->
                                                 <a class="btn btn-sm btn-primary" href="#" data-toggle="modal" data-target="#editmodal" id="tomboledit" data-id="<?= $g->id ?>" data-kdgol="<?= $g->kdgol ?>" data-namagol="<?= $g->namagol ?>"><i class="fa fa-edit"></i> Edit</a>
                                                 <a class="btn btn-sm btn-danger" href="<?= base_url("golongan/hapus_golongan/" . $g->id) ?>" onclick="javascript: return confirm('Anda yakin hapus ?')"><i class="fa fa-trash"></i> Hapus</a>
                                             </td>
                                         </tr>
                                     <?php } ?>
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- Data table area End-->

 <!-- Modal Tambah golongan -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 200000;">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <label class="modal-title" id="exampleModalLabel">Form Tambah Golongan</label>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <form action="<?= base_url() . 'golongan/tambah_golongan' ?>" method="post">

                     <div class="form group">
                         <label>kode Golongan</label>
                         <input type="text" name="kdgol" class="form-control">
                     </div>

                     <div class="form group">
                         <label>Nama Golongan</label>
                         <input type="text" name="namagol" class="form-control">
                     </div>

             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-primary">Simpan</button>
             </div>
             </form>
         </div>
     </div>
 </div>
 <!-- END Modal -->

 <!-- Modal Edit Golongan -->
 <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 200000;">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <label class="modal-title" id="exampleModalLabel">Form Edit Golongan</label>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <form action="<?= base_url() . 'golongan/update_golongan' ?>" method="post">

                     <input type="hidden" id="id" name="id" class="form-control">

                     <div class="form group">
                         <label>kode Golongan</label>
                         <input type="text" id="kdgol" name="kdgol" class="form-control">
                     </div>

                     <div class="form group">
                         <label>Nama Golongan</label>
                         <input type="text" id="namagol" name="namagol" class="form-control">
                     </div>

             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-primary">Simpan</button>
             </div>
             </form>
         </div>
     </div>
 </div>
 <!-- END Modal -->

 <!-- get data -->
 <script src="<?= base_url() ?>assets/js/jquery-3.2.1.min.js"></script>
 <script>
     $(document).on("click", "#tomboledit", function() {
         let id = $(this).data('id');
         let kdgol = $(this).data('kdgol');
         let namagol = $(this).data('namagol');

         $(".modal-body #id").val(id);
         $(".modal-body #kdgol").val(kdgol);
         $(".modal-body #namagol").val(namagol);

     });
 </script>

 <script src="<?= base_url() ?>assets/sweetalert2/swal2.js"></script>
 <?php if ($this->session->flashdata('berhasil')) : ?>
     <script>
         Swal.fire({
             icon: 'success',
             position: 'top-end',
             title: '<?= $this->session->flashdata('berhasil') ?>',
             showConfirmButton: false,
             timer: 1500,
             allowOutsideClick: false,
             timerProgressBar: true
         })
     </script>
 <?php endif ?>

 <?php if ($this->session->flashdata('gagal')) : ?>
     <script>
         Swal.fire({
             icon: 'error',
             position: 'top-end',
             title: '<?= $this->session->flashdata('gagal') ?>',
             showConfirmButton: false,
             timer: 1500,
             allowOutsideClick: false,
             timerProgressBar: true
         })
     </script>
 <?php
    endif ?>