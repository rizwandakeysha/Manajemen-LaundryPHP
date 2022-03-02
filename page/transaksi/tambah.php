<?php
if(isset($_POST['tambah'])) {
    $tgl_transaksi = htmlspecialchars($_POST['tgl_transaksi']);
    $nominal = htmlspecialchars($_POST['nominal']);
    $catatan = htmlspecialchars($_POST['catatan']);

    $sql = $koneksi->query("INSERT INTO tb_transaksi VALUES(null, '$id_user', '$tgl_transaksi', '0', '$nominal', '$catatan', 'pengeluaran')") or die(mysqli_error($koneksi));
    if($sql) {
        echo "<script>alert('Data Berhasil Ditambahkan');window.location='?p=transaksi';</script>";
    }
}
?>

<div class="card shadow-lg border-0 rounded-lg mt-5">
    <div class="card-header"><h3 class="text-center font-weight-light my-4">Tambah Data Transaksi</h3></div>
    <div class="card-body">
        <form action="" method="post">
            <div class="form-group">
                <label class="small mb-1" for="tgl_transaksi">Tanggal</label>
                <input class="form-control" name="tgl_transaksi" id="tgl_transaksi" required="" type="date"/>
            </div>
            <div class="form-group">
                <label class="small mb-1" for="nominal">Nominal</label>
                <input class="form-control" name="nominal" id="nominal" required="" type="number"/>
            </div>
            <div class="form-group">
                <label class="small mb-1" for="catatan">Catatan</label>
                <textarea name="catatan" id="catatan" class="form-control"></textarea>
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit" name="tambah">Tambah Data</button>
            </div>
        </form>
    </div>
</div>