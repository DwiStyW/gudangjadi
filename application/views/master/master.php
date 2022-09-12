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
                  <a href="inputmas.php"><button class="btn btn-sm btn-primary login-submit-cs" type="submit">Input Master</button></a>
                  <a href="golongan.php"><button class="btn btn-sm btn-primary login-submit-cs" type="submit">Master Golongan</button></a>
                  <a href="jenis.php"><button class="btn btn-sm btn-primary login-submit-cs" type="submit">Master Jenis</button></a>
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
                          <a class="btn btn-sm btn-primary" href="#"><i class="fa fa-edit"></i> Edit</a>
                          <a class="btn btn-sm btn-danger" href="#" onclick="javascript: return confirm('Anda yakin hapus ?')"><i class="fa fa-wrench"></i> Hapus</a>
                          <!-- <a class="btn btn-sm btn-primary" href="editmas.php?hal=edit&kd=<?php echo $data['id']; ?>"><i class="fa fa-edit"></i> Edit</a>
                          <a class="btn btn-sm btn-danger" href="hapusmas.php?hal=hapus&kd=<?php echo $data['id']; ?>" onclick="javascript: return confirm('Anda yakin hapus ?')"><i class="fa fa-wrench"></i> Hapus</a> -->
                        </td>
                      </tr>
                    <?php $no++;
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