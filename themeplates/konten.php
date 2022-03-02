<?php 

if($_SESSION['admin']) {
	$user = $_SESSION['admin']['id_user'];
} else if($_SESSION['kasir']) {
	$user = $_SESSION['kasir']['id_user'];
}


// menampilkan angka data di halaman dashboard
$pengguna = $koneksi->query("SELECT * FROM tb_user") or die(mysqli_error($koneksi));
$dataPengguna = $pengguna->num_rows;

$pelanggan = $koneksi->query("SELECT * FROM tb_pelanggan") or die(mysqli_error($koneksi));
$dataPelanggan = $pelanggan->num_rows;

$laundry = $koneksi->query("SELECT * FROM tb_tranlaundry") or die(mysqli_error($koneksi));
$dataLaundry = $laundry->num_rows;

$transaksi = $koneksi->query("SELECT * FROM tb_transaksi") or die(mysqli_error($koneksi));
$dataTransaksi = $transaksi->num_rows;


// var_dump($user);
$sql = $koneksi->query("SELECT * FROM tb_user WHERE id_user = $user") or die(mysqli_error($koneksi));
$data = $sql->fetch_assoc();
$id_user = $data['id_user'];
// echo $id_user;
// echo $nama = $data['foto'];

if($page == 'pelanggan') {
	if($aksi == '') {
		require_once 'page/pelanggan/pelanggan.php';
	} else if($aksi == 'tambah') {
		require_once 'page/pelanggan/tambah.php';
	} else if($aksi == 'ubah') {
		require_once 'page/pelanggan/ubah.php';
	} else if($aksi == 'hapus') {
		require_once 'page/pelanggan/hapus.php';
	}
} else if($page == 'pengguna') {
	if($aksi == '') {
		require_once 'page/pengguna/pengguna.php';
	} else if($aksi == 'tambah') {
		require_once 'page/pengguna/tambah.php';
	} else if($aksi == 'ubah') {
		require_once 'page/pengguna/ubah.php';
	} else if($aksi == 'hapus') {
		require_once 'page/pengguna/hapus.php';
	}
} else if($page == 'laundry') {
	if($aksi == '') {
		require_once 'page/laundry/laundry_6.php';
	} else if($aksi == 'tambah') {
		require_once 'page/laundry/tambah.php';
	} else if($aksi == 'lunas') {
		require_once 'page/laundry/lunas.php';
	}
} else if($page == 'transaksi') {
	if($aksi == '') {
		require_once 'page/transaksi/transaksi.php';
	} else if($aksi == 'tambah') {
		require_once 'page/transaksi/tambah.php';
	}
} else { ?>
	<h1 class='mt-4'>Dashboard</h1><ol class='breadcrumb mb-4'><li class='breadcrumb-item'><a href='index.php'>Dashboard</a></li><li class='breadcrumb-item active'>Laundrianne.id</li></ol>
	<div class="card">
  <div class="card-body">
    <img src="./img/<?= $data['foto']; ?>" class="rounded-circle shadow" width = "50" height = "50">
    <p style="display: inline;">&nbsp; Halo, anda sedang login sebagai,<b> <?= $data['username']; ?></b></p>
  </div>
</div>

<div class="row mt-4">
    <div class="col-xl-3 col-md-6">
        <div class="card bg-info text-white mb-4">
            <div class="card-body"><i class="fa fa-user float-right"></i>Pengguna<h3><?= $dataPengguna ?></h3>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
            	<?php if($_SESSION['admin']['level'] === 'admin') : ?>
                <a class="small text-white stretched-link" href="?p=pengguna">Lihat rincian</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
              <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-warning text-white mb-4">
            <div class="card-body"><i class="fa fa-users float-right"></i>Pelanggan<h3><?= $dataPelanggan ?></h3></div>
            <div class="card-footer d-flex align-items-center justify-content-between">
            	<?php if($_SESSION['admin']['level'] === 'admin') : ?>
                <a class="small text-white stretched-link" href="?p=pelanggan">Lihat rincian</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
              <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body"><i class="fa fa-handshake float-right" aria-hidden="true"></i>Transaksi Laundry<h3><?= $dataLaundry ?></h3></div>
            <div class="card-footer d-flex align-items-center justify-content-between">
            	<?php if($_SESSION['admin']['level'] === 'admin') : ?>
                <a class="small text-white stretched-link" href="?p=laundry">Lihat rincian</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
              <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card bg-danger text-white mb-4">
            <div class="card-body"><i class="fa fa-credit-card float-right"></i>Transaksi<h3><?= $dataTransaksi ?></h3></div>
            <div class="card-footer d-flex align-items-center justify-content-between">
            	<?php if($_SESSION['admin']['level'] === 'admin') : ?>
                <a class="small text-white stretched-link" href="?p=transaksi">Lihat rincian</a>
                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
              <?php endif; ?>
            </div>
        </div>
    </div>
</div>
	
<?php
}

?>