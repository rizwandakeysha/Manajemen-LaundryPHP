<?php 
// menampilkan semua isi table pelanggan
$tampilPelanggan = query("SELECT * FROM tb_pelanggan ORDER BY id_pelanggan ASC") or die(mysqli_error($koneksi));
?>
<h1 class="mt-4">Pelanggan</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
    <li class="breadcrumb-item active">Data Pelanggan</li>
</ol>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Tabel
    </div>
    <div class="card-body">
    	<a href="?p=pelanggan&aksi=tambah" class="btn btn-primary mb-2">Tambah Data Pelanggan</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Pelanggan</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                	<?php 
                	$no = 1 ;
                	foreach ($tampilPelanggan as $tP) : ?>
                		<tr>
                			<td><?= $no++; ?></td>
                			<td><?= $tP['kode_pelanggan']; ?></td>
                			<td><?= $tP['nama_pelanggan']; ?></td>
                			<td><?= $tP['alamat_pelanggan']; ?></td>
                			<td><a href="https://wa.me/<?= $tP['telp_pelanggan'];?>" target="_blank"><?= $tP['telp_pelanggan']; ?></a></td>
                			<td>
                				<a href="?p=pelanggan&aksi=hapus&id=<?= $tP['id_pelanggan']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')"><i class="fa fa-trash"></i></a>
                				<a href="?p=pelanggan&aksi=ubah&id=<?= $tP['id_pelanggan']; ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                			</td>
                		</tr>
                	<?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>