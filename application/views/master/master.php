<?php
// include "koneksi.php";
// include "cek-login.php";

// $timeout = 10; // Set timeout menit
// $logout_redirect_url = "logout.php"; // Set logout URL



// $timeout = $timeout * 60; // Ubah menit ke detik
// if (isset($_SESSION['start_time'])) {
//   $elapsed_time = time() - $_SESSION['start_time'];
//   if ($elapsed_time >= $timeout) {
//     session_destroy();
//     echo "<script>alert('Session Anda Telah Habis!'); window.location = '$logout_redirect_url'</script>";
//   }
// }
// $_SESSION['start_time'] = time();
?>

<body>
  <?php
  // $username = $_SESSION['username'];
  // $query_user_login = mysqli_query($conn, "select * from tb_user where username='$username'");
  // $user_login = mysqli_fetch_array($query_user_login);
  ini_set('date.timezone', 'Asia/Jakarta');
  ?>
  <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

  <!-- Data table area Start-->
  <div class="admin-dashone-data-table-area mg-b-40">
    <br />
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="sparkline8-list shadow-reset">
            <div class="sparkline8-hd">
              <div class="main-sparkline8-hd">
                <h1>Master Barang Gudang</h1>
              </div>
            </div>
            <div class="sparkline8-graph">
              <div class="datatable-dashv1-list custom-datatable-overright">
                <div id="toolbar">
                  <button class="btn btn-sm btn-primary login-submit-cs" data-toggle="modal" data-target="#exampleModal">Input Master</button></a>
                  <a href="<?= base_url("golongan") ?>"><button class="btn btn-sm btn-primary login-submit-cs" type="submit">Master Golongan</button></a>
                  <a href="<?= base_url("jenis") ?>"><button class="btn btn-sm btn-primary login-submit-cs" type="submit">Master Jenis</button></a>
                  <!-- <a target="_blank" href="printmaster.php"><button class="btn btn-sm btn-success login-submit-cs" type="submit">Print Master</button></a> -->
                  <a href="index.php"><button class="btn btn-white" type="button">Kembali</button></a>
                </div>
                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                  <thead>
                    <tr>
                      <th data-field="no">No</th>
                      <th data-field="kode">Kode Barang</th>
                      <th data-field="name">Nama Barang</th>
                      <th data-field="ukuran">Ukuran</th>
                      <th data-field="sat1">Sat 1</th>
                      <th data-field="isi1">Isi 1</th>
                      <th data-field="sat2">Sat 2</th>
                      <th data-field="isi2">Isi 2</th>
                      <th data-field="sat3">Sat 3</th>
                      <th data-field="kdgol">Golongan</th>
                      <th data-field="jenis">Jenis</th>
                      <th data-field="aksi">Aksi</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($master as $m) {
                    ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $m->kode ?></td>
                        <td><?php echo $m->nama; ?></td>
                        <td><?php echo $m->ukuran ?></td>
                        <td><?php echo $m->sat1 ?></td>
                        <td><?php echo $m->max1 ?></td>
                        <td><?php echo $m->sat2 ?></td>
                        <td><?php echo $m->max2 ?></td>
                        <td><?php echo $m->sat3 ?></td>
                        <td><?php echo $m->namagol ?></td>
                        <td><?php echo $m->namajenis ?></td>
                        <td>
                          <a class="btn btn-sm btn-primary" href="<?= base_url("master/editmas/" . $m->id) ?>"><i class="fa fa-edit"></i> Edit</a>
                          <a class="btn btn-sm btn-danger" href="<?= base_url("master/hapus_master/" . $m->id) ?>" onclick="javascript: return confirm('Anda yakin hapus ?')"><i class="fa fa-trash"></i> Hapus</a>
                        </td>
                      </tr>
                    <?php
                    } ?>
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

  <!-- Modal Tambah Master -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <label class="modal-title" id="exampleModalLabel">Form Input Master</label>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url('') . 'master/tambah_master' ?>" method="post">

            <input type="text" name="id" class="form-control">
            <div class="form group">
              <label>kode Barang</label>
              <input type="text" name="kode" class="form-control">
            </div>

            <div class="form group">
              <label>Nama barang</label>
              <input type="text" name="nama" class="form-control">
            </div>

            <div class="form group">
              <label>Ukuran</label>
              <input type="text" name="ukuran" class="form-control">
            </div>

            <div class="form group">
              <label>Satuan 1</label>
              <input type="text" name="sat1" class="form-control">
            </div>

            <div class="form group">
              <label>Isi Satuan 1</label>
              <input type="text" name="max1" class="form-control">
            </div>

            <div class="form group">
              <label>Satuan 2</label>
              <input type="text" name="sat2" class="form-control">
            </div>

            <div class="form group">
              <label>Isi Satuan 2</label>
              <input type="text" name="max2" class="form-control">
            </div>

            <div class="form group">
              <label>Satuan 3</label>
              <input type="text" name="sat3" class="form-control">
            </div>

            <div class="form group">
              <label>Golongan</label>
              <select type="select" name="kdgol" class="form-control">
                <option disabled selected value hidden>Pilih Golongan</option>
                <?php foreach ($golongan as $g) { ?>
                  <option value="<?= $g->id ?>"><?= $g->namagol ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="form group">
              <label>Jenis</label>
              <select type="select" name="kdjenis" class="form-control">
                <option disabled selected value hidden>Pilih Jenis</option>
                <?php foreach ($jenis as $j) { ?>
                  <option value="<?= $j->id ?>"><?= $j->namajenis ?></option>
                <?php } ?>
              </select>
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