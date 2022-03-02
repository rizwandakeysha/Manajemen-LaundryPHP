<?php 
// menampilkan semua isi table pelanggan
$tampilTLaundry = query("SELECT * FROM tb_transaksi INNER JOIN 
						tb_user ON tb_transaksi.id_user = tb_user.id_user") 
or die(mysqli_error($koneksi));
?>
<!-- <pre>
	<?php var_dump($tampilTLaundry); ?>
</pre> -->
<h1 class="mt-4">Transaksi Pengeluaran</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
    <li class="breadcrumb-item active">data transaksi</li>
</ol>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Data Transaksi Pengeluaran
    </div>
    <div class="card-body">
    	<a href="?p=transaksi&aksi=tambah" class="btn btn-primary mb-2">Tambah Data Transaksi</a>
        <a href="page/transaksi/cetak.php" class="btn btn-secondary mb-2" target="_blank"><i class="fa fa-print"></i></a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Transaksi</th>
                        <th>Keterangan</th>
                        <th>Catatan</th>
                        <th>Kasir</th>
                        <th>Pemasukan</th>
                        <th>Pengeluaran</th>
                    </tr>
                </thead>
                <tbody>
                	<?php 
                	$no = 1 ;
                	foreach ($tampilTLaundry as $tTP) : ?>
                		<tr>
                			<td><?= $no++; ?></td>
                			<td><?= $tTP['tgl_transaksi']; ?></td>
                			<td><?= $tTP['keterangan']; ?></td>
                			<td><?= $tTP['catatan']; ?></td>
                			<td><?= $tTP['nama']; ?></td>
                			<td><?= $tTP['pemasukan']; ?></td>
                			<td><?= $tTP['pengeluaran']; ?></td>
                		</tr>
                        <?php 
                        @$masuk = $masuk + $tTP['pemasukan'];
                        @$keluar = $keluar + $tTP['pengeluaran'];
                        $total = $masuk - $keluar;
                        ?>
                	<?php endforeach; ?>
                </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5">Total Pemasukan & Pengeluaran</td>
                                <td>Rp. <?= number_format($masuk); ?></td>
                                <td>Rp. <?= number_format($keluar); ?></td>
                            </tr>
                            <tr>
                                <td colspan="5">Total Saldo</td>
                                <td>Rp. <?= number_format($total); ?></td>
                            </tr>
                        </tfoot>
            </table>
        </div>
    </div>
</div>