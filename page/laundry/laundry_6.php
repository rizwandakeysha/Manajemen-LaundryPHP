<?php 
// menampilkan semua isi table pelanggan
$tampilTLaundry = query("SELECT * FROM tb_tranlaundry INNER JOIN 
												tb_pelanggan ON tb_tranlaundry.id_pelanggan = tb_pelanggan.id_pelanggan INNER JOIN tb_user ON tb_tranlaundry.id_user = tb_user.id_user ORDER BY id_tranlaundry DESC") 
or die(mysqli_error($koneksi));
?>
<!-- <pre>
	<?php var_dump($tampilTLaundry); ?>
</pre> -->
<h1 class="mt-4">Pelanggan</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
    <li class="breadcrumb-item active">data laundry</li>
</ol>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Data Laundry
    </div>
    <div class="card-body">
    	<a href="?p=laundry&aksi=tambah" class="btn btn-primary mb-2">Tambah Data Laundry</a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pelanggan</th>
                        <th>Tanggal Terima</th>
                        <th>Tanggal Selesai</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Catatan</th>
                        <th>Status</th>
                        <th>Kasir</th>
                        <th>Cetak</th>
                    </tr>
                </thead>
                <tbody>
                	<?php 
                	$no = 1 ;
                	foreach ($tampilTLaundry as $tTP) : ?>
                		<tr>
                			<td><?= $no++; ?></td>
                			<td><?= $tTP['nama_pelanggan']; ?></td>
                			<td><?= $tTP['tgl_terima']; ?></td>
                			<td><?= $tTP['tgl_selesai']; ?></td>
                			<td><?= $tTP['jumlah_kiloan']; ?></td>
                            <td><?= $tTP['nominal']; ?></td>
                			<td><?= $tTP['catatan']; ?></td>
                			<td><?= $tTP['status']; ?></td>
                			<td><?= $tTP['nama']; ?></td>
                			<td>
                                <?php if($tTP['status'] == 'Belum Lunas') : ?>
                                <a href="?p=laundry&aksi=lunas&id=<?= $tTP['id_tranlaundry']; ?>" class="btn btn-success btn-sm">Bayar</a>
                                <?php endif; ?>
                                <a href="page/laundry/struk.php?id=<?= $tTP['id_tranlaundry']; ?>" class="btn btn-secondary btn-sm" target="_blank"><i class="fa fa-print"></i></a>
                			</td>
                		</tr>
                	<?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>