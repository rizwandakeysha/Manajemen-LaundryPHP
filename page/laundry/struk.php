<?php 
require_once '../../config/koneksi.php';
$id_tranlaundry = $_GET['id'];
$tampilTLaundry = $koneksi->query("SELECT * FROM tb_tranlaundry INNER JOIN 
												tb_pelanggan ON tb_tranlaundry.id_pelanggan = tb_pelanggan.id_pelanggan INNER JOIN tb_user ON tb_tranlaundry.id_user = tb_user.id_user WHERE id_tranlaundry = $id_tranlaundry") 
or die(mysqli_error($koneksi));
$data = $tampilTLaundry->fetch_assoc();

$id_pelanggan = $_GET['id'];
$tampilPelanggan = $koneksi->query("SELECT * FROM tb_pelanggan ORDER BY id_pelanggan ASC") or die(mysqli_error($koneksi));
$kodeP = $tampilPelanggan->fetch_assoc();
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Cetak Struk</title>

		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 45px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Poppins';
				color: #555;
                background-color: #ffffff;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 20px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}

            .h2{
                font-family: Poppins;
                font-size: 50px;
            }
		</style>
	</head>

	<body onload="window.print()"> 
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
                                    <h1 class="h2">Laundrianne</h1>
								</td>

								<td>
									Kode Pelanggan: <?= $kodeP['kode_pelanggan']; ?><br />
									Tanggal: <?= $data['tgl_terima']; ?>    <br/>
									Due: <?= $data['tgl_selesai']; ?>
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									Jl. Danau Ranau X G7D/2<br />
									Sawojajar, Kedungkandang<br />
									Kota Malang, 65139
								</td>

								<td>
                                    <?= $data['nama_pelanggan']; ?><br />
									<?= $data['alamat_pelanggan']; ?><br />
									<a href="https://wa.me/<?= $data['telp_pelanggan'];?>" target="_blank"><?= $data['telp_pelanggan']; ?></a>
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td>Metode Pembayaran</td>

					<td>Nominal Pembayaran</td>
				</tr>

				<tr class="details">
					<td>Tunai</td>

					<td>Rp<?= $data['nominal']; ?>,00</td>
				</tr>

				<tr class="heading">
					<td>Detail</td>

					<td>Harga</td>
				</tr>
                
				<tr class="item">
					<td><?= $data['catatan']; ?></td>

					<td>Rp<?= $data['nominal']; ?>,00</td>
				</tr>

				<tr class="total">
					<td></td>

					<td>Total: Rp<?= $data['nominal'];?>,00</td>
				</tr>
			</table>
		</div>
	</body>
</html>