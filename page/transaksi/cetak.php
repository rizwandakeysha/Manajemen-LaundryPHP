<?php 
require_once '../../config/koneksi.php';
$tampilTLaundry = query("SELECT * FROM tb_transaksi INNER JOIN 
						tb_user ON tb_transaksi.id_user = tb_user.id_user") 
or die(mysqli_error($koneksi));

?>
<script>
	window.print();
	window.onfocus = function() {window.close();}
</script>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <link href="../../css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
<body onload="window.print()">

<div class="container">
	<div class="row mt-5">
		<div class="col-md-8 offset-md-2">
				<h4 class="text-center">Laporan Transaksi Pengeluaran & Pengeluaran</h4>
			<table class="table table-bordered">
				<thead>
			    <tr>
			        <th>No</th>
			        <th>Tanggal Transaksi</th>
			        <th>Keterangan</th>
			        <th>Catatan</th>
			        <th>Kasir</th>
			        <th>Pemasukan</th>
			        <th>Pengeluaran</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php 
			  	$no = 1 ;
			  	foreach ($tampilTLaundry as $tTP) : ?>
			  		<tr>
			  			<td><?= $no++; ?></td>
			  			<td><?= $tTP['tgl_transaksi']; ?></td>
			  			<td><?= $tTP['keterangan']; ?></td>
			  			<td><?= $tTP['catatan']; ?></td>
			  			<td><?= $tTP['nama']; ?></td>
			  			<td><?= $tTP['pemasukan']; ?></td>
			  			<td><?= $tTP['pengeluaran']; ?></td>
			  		</tr>
			          <?php 
			          @$masuk = $masuk + $tTP['pemasukan'];
			          @$keluar = $keluar + $tTP['pengeluaran'];
			          $total = $masuk - $keluar;
			          ?>
			  	<?php endforeach; ?>
			  </tbody>
			  <tfoot>
			    <tr>
			        <td colspan="5">Total Pemasukan & Pengeluaran</td>
			        <td>Rp. <?= number_format($masuk); ?></td>
			        <td>Rp. <?= number_format($keluar); ?></td>
			    </tr>
			    <tr>
			        <td colspan="5">Total Saldo</td>
			        <td>Rp. <?= number_format($total); ?></td>
			    </tr>
				</tfoot>              
			</table>
		</div>
	</div>
</div>


</body>