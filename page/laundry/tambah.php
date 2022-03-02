<?php 

// menampilkan data pelanggan
$tampilPelanggan = query("SELECT * FROM tb_pelanggan") or die(mysqli_error($koneksi));

$tgl = date('d-m-Y');

if(isset($_POST['tambah'])) {
	$nama = htmlspecialchars($_POST['nama_pelanggan']);
	$tgl_terima = htmlspecialchars($_POST['tgl_terima']);
	$tgl_selesai = htmlspecialchars($_POST['tgl_selesai']);
	$jumlah_kiloan = htmlspecialchars($_POST['jumlah_kiloan']);
    $total = htmlspecialchars($_POST['total']);
    $status = htmlspecialchars($_POST['status']);
    $catatan = htmlspecialchars($_POST['catatan']);

	$sql = $koneksi->query("INSERT INTO tb_tranlaundry VALUES(null, '$nama', '$id_user', '$tgl_terima', '$tgl_selesai', '$jumlah_kiloan', '$total', '$status', '$catatan')") or die(mysqli_error($koneksi));
	if($sql) {
		echo "<script>alert('Data Berhasil Ditambahkan');window.location='?p=laundry';</script>";
	}

    if($status == 'Lunas') {
        $koneksi->query("INSERT INTO tb_transaksi VALUES(null, '$id_user', '$tgl_terima', '$total', '0', '$catatan', 'pemasukan')") or die(mysqli_error($koneksi));
            echo "<script>alert('Data Berhasil Ditambahkan');window.location='?p=laundry';</script>";
    }

}

?>

<div class="card shadow-lg border-0 rounded-lg mt-5">
    <div class="card-header"><h3 class="text-center font-weight-light my-4">Tambah Data Transaksi Laundry</h3></div>
    <div class="card-body">
        <form action="" method="post">
            <div class="form-group">
                <label for="nama_pelanggan">Nama Pelanggan</label>
                <select name="nama_pelanggan" id="nama_pelanggan" class="form-control" required="">
                    <option value="">-- Pilih Pelanggan --</option>
                    <?php foreach($tampilPelanggan as $tP) : ?>
                        <option value="<?= $tP['id_pelanggan']; ?>"><?= $tP['nama_pelanggan']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label class="small mb-1" for="tgl_terima">Tanggal Terima</label>
                <input class="form-control" name="tgl_terima" id="tgl_terima" required="" value="<?= $tgl ?>" type="date"/>
            </div>
            <div class="form-group">
                <label class="small mb-1" for="tgl_selesai">Tanggal Selesai</label>
                <input class="form-control" name="tgl_selesai" id="tgl_selesai" required="" value="<?= $tgl ?>" type="date"/>
            </div>
            <div class="form-group">
                <label class="small mb-1" for="jumlah_kiloan">Jumlah Kiloan</label>
                <input class="form-control" name="jumlah_kiloan" id="jumlah_kiloan" required="" onkeyup="sum()" value="<?= $tgl ?>" type="number"/>
            </div>
            <div class="form-group">
                <label class="small mb-1" for="total">Total</label>
                <input class="form-control" name="total" id="nominal" required="" readonly="" value="<?= $tgl ?>" type="number"/>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" required="">
                    <option value="">-- Pilih Pelanggan --</option>
                    <option value="Lunas">Lunas</option>
                    <option value="Belum Lunas">Belum Lunas</option>
                </select>
            </div>
            <div class="form-group">
                <label for="catatan">Catatan</label>
                <textarea name="catatan" id="catatan" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" name="tambah" class="btn btn-primary">Tambah Data</button>
            </div>
        </form>
    </div>
</div>

<script>
    function sum() {
        const jumlah_kiloan = document.getElementById('jumlah_kiloan').value;
        const total = parseInt(jumlah_kiloan) * 7000;

        if(!isNaN(total)) {
            document.getElementById('nominal').value = total;
        }
    }
</script>