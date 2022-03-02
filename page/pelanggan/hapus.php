<?php 
$id_pelanggan = $_GET['id'];

$koneksi->query("DELETE FROM tb_pelanggan WHERE id_pelanggan = $id_pelanggan") or die(mysqli_error($conn));
echo "<script>alert('Data Berhasil Dihapus');window.location='?p=pelanggan';</script>";

?>