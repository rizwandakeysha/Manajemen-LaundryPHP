<?php
require_once 'functions.php';
$id_pengguna = $_GET['id'];

$tampilPengguna = $koneksi->query("SELECT * FROM tb_user WHERE id_user = $id_pengguna") or die(mysqli_error($koneksi));
$dataPengguna = $tampilPengguna->fetch_assoc();

if(isset($_POST['tambah'])) {
    if(ubah($_POST) > 0) {
        echo "<script>alert('Data berhasil diubah.');window.location='?p=pengguna';</script>";
    } else {
        echo "<script>alert('Data gagal diubah.');window.location='?p=pengguna';</script>";
    }    
}

?>

<div class="card shadow-lg border-0 rounded-lg mt-5">
    <div class="card-header"><h3 class="text-center font-weight-light my-4">Tambah Data Pengguna</h3></div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="text" name="id_user" value="<?= $dataPengguna['id_user']; ?>">
            <div class="form-group">
                <label class="small mb-1" for="username">Username</label>
                <input class="form-control" value="<?= $dataPengguna['username']; ?>" name="username" id="username" required="" type="text"/>
            </div>
            <div class="form-group">
                <label class="small mb-1" for="nama">Nama</label>
                <input class="form-control" value="<?= $dataPengguna['nama']; ?>" required="" name="nama" id="nama" type="text"/>
            </div>
            <div class="form-group">
                <label class="small mb-1" for="password">Password</label>
                <input class="form-control" value="<?= $dataPengguna['password']; ?>" required="" name="password" id="password" type="password"/>
            </div>
            <div class="form-group">
                <label class="small mb-1" for="foto">Foto</label>
                <img src="./img/<?= $dataPengguna['foto']; ?>" width="100" style="display: block;">
                <input type="text" name="gambarLama" value="<?= $dataPengguna['foto']; ?>">
                <input class="form-control mt-1" name="foto" id="foto" type="file"/>
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit" name="tambah">Tambah Data</button>
            </div>
        </form>
    </div>
</div>