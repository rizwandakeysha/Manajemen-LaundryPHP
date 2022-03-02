<?php

$id_pelanggan = $_GET['id'];

if(isset($_POST['ubah'])) {
	$kode = htmlspecialchars($_POST['kode_pelanggan']);
	$nama = htmlspecialchars($_POST['nama_pelanggan']);
	$alamat = htmlspecialchars($_POST['alamat']);
	$telp = htmlspecialchars($_POST['telp_pelanggan']);

	$sql = $koneksi->query("UPDATE tb_pelanggan SET kode_pelanggan = '$kode', nama_pelanggan = '$nama', alamat_pelanggan = '$alamat', telp_pelanggan = '$telp' WHERE id_pelanggan = $id_pelanggan") or die(mysqli_error($conn));
	if($sql) {
		echo "<script>alert('Data Berhasil Diubah');window.location='?p=pelanggan';</script>";
	}
}

$tampilPelanggan = $koneksi->query("SELECT * FROM tb_pelanggan WHERE id_pelanggan = $id_pelanggan") or die(mysqli_error($conn));
$pecahPelanggan = $tampilPelanggan->fetch_assoc();

?>

<div class="card shadow-lg border-0 rounded-lg mt-5">
    <div class="card-header"><h3 class="text-center font-weight-light my-4">Ubah Data Pelanggan</h3></div>
    <div class="card-body">
        <form action="" method="post">
            <div class="form-group">
                <label class="small mb-1" for="kode_pelanggan">Kode Pelanggan</label>
                <input class="form-control" name="kode_pelanggan" id="kode_pelanggan" readonly="" value="<?= $pecahPelanggan['kode_pelanggan']; ?>" type="text"/>
            </div>
            <div class="form-group">
                <label class="small mb-1" for="nama_pelanggan">Nama Pelanggan</label>
                <input class="form-control" name="nama_pelanggan" id="nama_pelanggan" value="<?= $pecahPelanggan['nama_pelanggan']; ?>" type="text"/>
            </div>
            <div class="form-group">
                <label class="small mb-1" for="telp_pelanggan">No. Telepon</label>
                <input class="form-control" name="telp_pelanggan" id="telp_pelanggan" value="<?= $pecahPelanggan['telp_pelanggan']; ?>" type="text"/>
            </div>
            <div class="form-group">
                <label class="small mb-1" for="kode_pelanggan">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control"><?= $pecahPelanggan['alamat_pelanggan']; ?></textarea>
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit" name="ubah">Ubah Data</button>
            </div>
        </form>
    </div>
</div>