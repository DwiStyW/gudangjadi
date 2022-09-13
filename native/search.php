<?php
include "koneksi.php";

$mysqli = new mysqli('localhost', 'root', '', 'gudangjadi');

$sql = 'SELECT * FROM riwayat WHERE noform LIKE ? ORDER BY no DESC LIMIT 20';
$stmt = $mysqli->prepare($sql);

$stmt->bind_param('s', $val);
$val = '%' . trim($_GET['q']) . '%';

$res = $stmt->execute();
$stmt->store_result();
$stmt->bind_result($no, $tglform, $noform, $kode, $masuk, $keluar, $saldo, $ket, $tanggal, $adm, $suplai, $cat);

if ($res) {
	if ($stmt->num_rows) { ?>

		<thead>
			<tr>
				<th data-field="no">No</th>
				<th data-field="tglform">Tgl Form</th>
				<th data-field="noform">No Form</th>
				<th data-field="kode">Kode</th>
				<th data-field="nama">Nama Barang</th>
				<th data-field="sat1">Sat 1</th>
				<th data-field="sat2">Sat 2</th>
				<th data-field="sat3">Sat 3</th>
				<th data-field="saldo">Ket</th>
				<th data-field="tanggal">Tgl Input</th>
				<th data-field="aksi">Aksi</th>
			</tr>
		</thead>

		<tbody>
			<?php
			$n = 1;
			while ($stmt->fetch()) { ?>
				<tr>
					<td><?php echo $n; ?></td>
					<td><?php echo $tglform; ?></td>
					<td><?php echo $noform; ?></td>
					<td><?php
						$tampil = mysqli_query($conn, "select * from master WHERE id='$kode'");
						$data = mysqli_fetch_array($tampil);
						echo $data['kode'];
						?></td>
					<td><?php echo $data['nama']; ?></td>
					<?php
					if ($masuk == 0) {

						//Perhitungan 3 Satuan
						$sats1  = floor($keluar / ($data['max1'] * $data['max2']));
						$sisa   = $keluar - ($sats1 * $data['max1'] * $data['max2']);
						$sats2  = floor($sisa / $data['max2']);
						$sats3  = $sisa - $sats2 * $data['max2'];
					} else {

						//Perhitungan 3 Satuan
						$sats1  = floor($masuk / ($data['max1'] * $data['max2']));
						$sisa   = $masuk - ($sats1 * $data['max1'] * $data['max2']);
						$sats2  = floor($sisa / $data['max2']);
						$sats3  = $sisa - $sats2 * $data['max2'];
					}
					?>
					<td><?php echo $sats1; ?></td>
					<td><?php echo $sats2; ?></td>
					<td><?php echo $sats3; ?></td>

					<td><?php echo $ket; ?></td>
					<td><?php echo $tanggal; ?></td>
					<td><?php if ($masuk == 0) { ?>
							<a href="editkeluar.php?hal=edit&kd=<?php echo $no; ?>">Edit</a> |
							<a href="hapuskeluar.php?hal=<?php echo $data['kode']; ?>&kd=<?php echo $no; ?>" onclick="javascript: return confirm('Anda yakin hapus ?')">Hapus</a>
						<?php } else { ?>
							<a href="editbahan.php?hal=edit&kd=<?php echo $no; ?>">Edit</a> |
							<a href="hapusbahan.php?hal=<?php echo $data['kode']; ?>&kd=<?php echo $no; ?>" onclick="javascript: return confirm('Anda yakin hapus ?')">Hapus</a>
						<?php } ?>

					</td>
				</tr>
			<?php $n++;
			} ?>
		</tbody>


<?php
		$stmt->free_result();
	} else {
		echo "Data Not Found";
	}
}


?>