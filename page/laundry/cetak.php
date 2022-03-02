<?php 
require_once '../../config/koneksi.php';
$id_tranlaundry = $_GET['id'];
$tampilTLaundry = $koneksi->query("SELECT * FROM tb_tranlaundry INNER JOIN 
												tb_pelanggan ON tb_tranlaundry.id_pelanggan = tb_pelanggan.id_pelanggan INNER JOIN tb_user ON tb_tranlaundry.id_user = tb_user.id_user WHERE id_tranlaundry = $id_tranlaundry") 
or die(mysqli_error($koneksi));
$data = $tampilTLaundry->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <link href="../../css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
<body onload="window.print()" style="background: #eee;">
<div class="container">
	<div class="row mt-5">
		<div class="col-md-7 offset-md-3 p-5" style="background: #fff;">
			<table>
	  <tbody>
	  	<tr>
	  		<td><center>Laundrianne.id</center></td>
	  	</tr>  	
	  	<tr>
	  		<td>Jl. Danau Ranau X G7D/02</td>
	  	</tr>
	  	<tr>
	  		<td>Telp 085156563724</td>
	  	</tr>
	  </tbody>
	</table>
	<table>
		<tbody>
				<hr>
			<tr>
				<td>Pelanggan</td>
				<td>:</td>
				<td><?= $data['nama_pelanggan']; ?></td>
			</tr>
			<tr>
				<td>Tanggal Terima</td>
				<td>:</td>
				<td><?= $data['tgl_terima']; ?></td>
			</tr>
			<tr>
				<td>Tanggal Selesai</td>
				<td>:</td>
				<td><?= $data['tgl_selesai']; ?></td>
			</tr>
			<tr>
				<td>Kiloan</td>
				<td>:</td>
				<td><?= $data['jumlah_kiloan']; ?></td>
			</tr>
			<tr>
				<td>Total</td>
				<td>:</td>
				<td><?= $data['nominal']; ?></td>
			</tr>
			<tr>
				<td>Status</td>
				<td>:</td>
				<td><?= $data['status']; ?></td>
			</tr>
			<tr>
				<td>Catatan</td>
				<td>:</td>
				<td><?= $data['catatan']; ?></td>
			</tr>
		</tbody>
	</table>
	
	<br><br>
	
	<table>
		<tr>
			<td><b>Catatan:</b></td>
		</tr>
		<tr>
			<td>Jika barang tidak diambil selama 3 bulan, kami tidak bertanggung jawab. apabila barang hilang atau lainnya.</td>
		</tr>
	</table>
		</div>
	</div>
</div>
	

<script>
	window.print();
	window.onfocus = function() {window.close();}	
</script>

</body>
