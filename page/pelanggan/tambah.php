<?php 
$sql = $koneksi->query("SELECT kode_pelanggan FROM tb_pelanggan ORDER BY kode_pelanggan DESC") or die(mysqli_error($conn));
$kode = $sql->fetch_assoc();
$kode_pelanggan = $kode['kode_pelanggan'];
// var_dump($sql);

// acak kode pelanggan
$urut = substr($kode_pelanggan, 4 , 4);
$tambah = (int) $urut + 1;

if(strlen($tambah) == 1) {
	$format = "LAU-" . "000" . $tambah;
} else if(strlen($tambah) == 2) {
	$format = "LAU-" . "00" . $tambah;
} else if(strlen($tambah) == 3) {
	$format = "LAU-" . "0" . $tambah;
} else {
	$format = "LAU-" . $tambah;
}

if(isset($_POST['tambah'])) {
	$kode = htmlspecialchars($_POST['kode_pelanggan']);
	$nama = htmlspecialchars($_POST['nama_pelanggan']);
	$alamat = htmlspecialchars($_POST['alamat']);
	$telp = htmlspecialchars($_POST['telp_pelanggan']);

	$sql = $koneksi->query("INSERT INTO tb_pelanggan VALUES(null, '$kode', '$nama', '$alamat', '$telp')") or die(mysqli_error($conn));
	if($sql) {
		echo "<script>alert('Data Berhasil Ditambahkan');window.location='?p=pelanggan';</script>";
	}
}

?>

<div class="card shadow-lg border-0 rounded-lg mt-5">
    <div class="card-header"><h3 class="text-center font-weight-light my-4">Tambah Data Pelanggan</h3></div>
    <div class="card-body">
        <form action="" method="post">
            <div class="form-group">
                <label class="small mb-1" for="kode_pelanggan">Kode Pelanggan</label>
                <input class="form-control" name="kode_pelanggan" id="kode_pelanggan" readonly="" value="<?= $format ?>" type="text"/>
            </div>
            <div class="form-group">
                <label class="small mb-1" for="nama_pelanggan">Nama Pelanggan</label>
                <input class="form-control" name="nama_pelanggan" id="nama_pelanggan" type="text"/>
            </div>
            <div class="form-group">
                <label class="small mb-1" for="telp_pelanggan">No. Telepon</label>
                <input class="form-control" name="telp_pelanggan" id="telp_pelanggan" type="text"/>
            </div>
            <div class="form-group">
                <label class="small mb-1" for="kode_pelanggan">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control"></textarea>
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit" name="tambah">Tambah Data</button>
            </div>
        </form>
    </div>
</div>