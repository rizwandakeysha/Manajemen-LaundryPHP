<?php 

// menampilkan semua isi table pelanggan
$tampilPengguna = query("SELECT * FROM tb_user ORDER BY id_user DESC") or die(mysqli_error($koneksi));
?>
<h1 class="mt-4">Pengguna</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
    <li class="breadcrumb-item active">data pengguna</li>
</ol>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Data Pengguna
    </div>
    <div class="card-body">
    	<a href="?p=pengguna&aksi=tambah" class="btn btn-primary mb-2">Tambah Data Pengguna</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Password</th>
                        <th>Level</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                	<?php 
                	$no = 1 ;
                	foreach ($tampilPengguna as $tPengguna) : ?>
                		<tr>
                			<td><?= $no++; ?></td>
                			<td><?= $tPengguna['username']; ?></td>
                			<td><?= $tPengguna['nama']; ?></td>
                			<td><?= $tPengguna['password']; ?></td>
                			<td><?= $tPengguna['level']; ?></td>
                			<td>
                				<img src="./img/<?= $tPengguna['foto']; ?>" width="100">
                			</td>
                			<td>
                				<a href="?p=pengguna&aksi=hapus&id=<?= $tPengguna['id_user']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ?')"><i class="fa fa-trash"></i></a>
                				<a href="?p=pengguna&aksi=ubah&id=<?= $tPengguna['id_user']; ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                			</td>
                		</tr>
                	<?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>