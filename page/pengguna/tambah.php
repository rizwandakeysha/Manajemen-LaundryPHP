<?php
// if(!isset($_SESSION['kasir'])) {
    // var_dump($_SESSION['kasir']);
// } else if(!isset($_SESSION['admin']))
// var_dump($_SESSION['admin']);

if(isset($_POST['tambah'])) {
    $username = htmlspecialchars($_POST['username']);
    $nama = htmlspecialchars($_POST['nama']);
    $password = htmlspecialchars($_POST['password']);
    $foto = $_FILES['foto']['name'];
    $tmpFoto = $_FILES['foto']['tmp_name'];

    if(empty($username && $nama && $password && $foto)) {
        echo "<script>alert('Inputan tidak boleh kosong.')</script>";
        return false;
    }

    $ektensiValid = ['jpg', 'jpeg', 'png'];
    $ektensiFoto = explode('.', $foto);
    $ektensiFoto = strtolower(end($ektensiFoto));

    if(!in_array($ektensiFoto, $ektensiValid)) {
        echo "<script>alert('Pastikan anda upload foto jpg atau png.');window.location='?p=pengguna';</script>";
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ektensiFoto;

    move_uploaded_file($tmpFoto, './img/' . $namaFileBaru);

    // menampilkan level, tergantung siap yang sedang login
    if($_SESSION['admin']) {
        $user = $_SESSION['admin']['id_user'];
    } else if($_SESSION['kasir']) {
        $user = $_SESSION['kasir']['id_user'];
    }
    $resutl = $koneksi->query("SELECT * FROM tb_user WHERE id_user = $user") or die(mysqli_error($koneksi));
    $data = $resutl->fetch_assoc();
    $level = $data['level'];


    // var_dump($_SESSION['level']['admin']);

    $sql = $koneksi->query("INSERT INTO tb_user VALUES (null, '$username', '$nama', '$password', '$level', '$namaFileBaru')") or die(mysqli_error($conn));
    if($sql) {
        echo "<script>alert('Berhasil menambah pengguna.');window.location='?p=pengguna';</script>";
    }
    return $namaFileBaru;
}

?>

<div class="card shadow-lg border-0 rounded-lg mt-5">
    <div class="card-header"><h3 class="text-center font-weight-light my-4">Tambah Data Pengguna</h3></div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="small mb-1" for="username">Username</label>
                <input class="form-control" name="username" id="username" required="" type="text"/>
            </div>
            <div class="form-group">
                <label class="small mb-1" for="nama">Nama</label>
                <input class="form-control" required="" name="nama" id="nama" type="text"/>
            </div>
            <div class="form-group">
                <label class="small mb-1" for="password">Password</label>
                <input class="form-control" required="" name="password" id="password" type="password"/>
            </div>
            <div class="form-group">
                <label class="small mb-1" for="foto">Foto</label>
                <input class="form-control" name="foto" id="foto" type="file"/>
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit" name="tambah">Tambah Data</button>
            </div>
        </form>
    </div>
</div>