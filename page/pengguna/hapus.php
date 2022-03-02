<?php 
$id_user = $_GET['id'];

$result = $koneksi->query("SELECT * FROM tb_user WHERE id_user = $id_user") or die(mysqli_error($koneksi));
$row = $result->fetch_assoc();
$foto = $row['foto'];
unlink('./img/' . $foto);

$koneksi->query("DELETE FROM tb_user WHERE id_user = $id_user") or die(mysqli_error($koneksi));
echo "<script>alert('Data Pengguna Berhasil Dihapus.');window.location='?p=pengguna';</script>";

?>