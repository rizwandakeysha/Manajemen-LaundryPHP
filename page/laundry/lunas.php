<?php  
$id_tranlaundry = $_GET['id'];

$tampilLaundry = $koneksi->query("SELECT * FROM tb_tranlaundry WHERE id_tranlaundry = $id_tranlaundry") or die(mysqli_error($koneksi));
$data = $tampilLaundry->fetch_assoc();
$tgl_terima = $data['tgl_terima'];
$nominal = $data['nominal'];
$catatan = $data['catatan'];
$id_user = $data['id_user'];

$koneksi->query("INSERT INTO tb_transaksi VALUES(null, '$id_user', '$tgl_terima', '$nominal', '0', '$catatan', 'pemasukan')") or die(mysqli_error($koneksi));

$koneksi->query("UPDATE tb_tranlaundry SET status = 'Lunas' WHERE id_tranlaundry = $id_tranlaundry") or die(mysqli_error($koneksi));
echo "<script>alert('Berhasil dilunasi');window.location='?p=laundry';</script>";
?>