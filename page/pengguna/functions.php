<?php 
require_once './config/koneksi.php';

function ubah($data) {
	global $koneksi;
	$id_user = $data['id_user'];
	$username = htmlspecialchars($data['username']);
  $nama = htmlspecialchars($data['nama']);
  $password = htmlspecialchars($data['password']);
  $fotoLama = $data['gambarLama'];
  
  // cek gambar
  if($_FILES['foto']['error'] === 4) {
  	$foto = $fotoLama;
  } else {
  	$foto = upload();
  }
  

  $koneksi->query("UPDATE tb_user SET username = '$username', nama = '$nama', password = '$password', foto = '$foto' WHERE id_user = $id_user ") or die(mysqli_error($koneksi));
  return $koneksi->affected_rows;
}


function upload() {
	$foto = $_FILES['foto']['name'];
  $ukuranFoto = $_FILES['foto']['size'];
  $tmpFoto = $_FILES['foto']['tmp_name'];

  $ektensiValid = ['jpg', 'jpeg', 'png'];
  $ektensiFoto = explode('.', $foto);
  $ektensiFoto = strtolower(end($ektensiFoto));

  if(!in_array($ektensiFoto, $ektensiValid)) {
  	echo "<script>alert('Pastikan anda upload jpg atau png.')</script>";
  	return false;
  }

  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ektensiFoto;

  // hapus foto/replace
  $fotoLama = $_POST['gambarLama'];
  if(file_exists('./img/' . $fotoLama)) {
  	unlink('./img/' . $fotoLama);
  }

  move_uploaded_file($tmpFoto, './img/' . $namaFileBaru);
  return $namaFileBaru;
}