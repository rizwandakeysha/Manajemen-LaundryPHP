<?php 
session_start();
require_once 'config/koneksi.php';

if(empty($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

$page = @$_GET['p'];
$aksi = @$_GET['aksi'];
// var_dump($_SESSION['kasir']);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>
            <?php 
            if($page == 'pelanggan') {
             if($aksi == '') {
                echo "Halaman Pelanggan";
             } else if($aksi == 'tambah') {
                echo "Tambah Data Pelanggan";
             } else if($aksi == 'ubah') {
                echo "Ubah Data Pelanggan";
             }   
            } else if($page == 'pengguna') {
                if($aksi == '') {
                    echo "Halaman Pengguna";
                } else if($aksi == 'tambah') {
                    echo "Tambah Data Pelanggan";
                } else if($aksi == 'ubah') {
                    echo "Ubah Data Pelanggan";
                }
            } else if($page == 'laundry') {
                if($aksi == '') {
                    echo "Halaman Laundry";
                } else if($aksi == 'tambah') {
                    echo "Tambah Data Laundry";
                }
            } else if($page == 'transaksi') {
                if($aksi == '') {
                    echo "Halaman Transaksi Pengeluaran";
                } else if($aksi == 'tambah') {
                    echo "Tambah Transaksi Pengeluaran";
                }
            } else {
                echo "Dashboard | Laundry";
            }
            ?>
        </title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <!-- -----------Header-------- -->
        <?php require_once 'themeplates/header.php'; ?>
        <!-- -----------End Header-------- -->

        <div id="layoutSidenav">
            <!-- -----------Menu-------- -->
            <?php require_once 'themeplates/menu.php'; ?>
            <!-- ----------- END Menu-------- -->

            <div id="layoutSidenav_content">
                <button class="btn btn-sm btn-success"><marquee behavior="scroll">Selamat datang <b>
                    <?php 
                    if(isset($_SESSION['admin'])) {
                        echo $_SESSION['admin']['username'];
                    } else {
                        echo $_SESSION['kasir']['username'];
                    }
                    ?> 
                </b>di Laundrianne.id</marquee></button>
                <main>
                    <div class="container-fluid">
                        <!-- <h1 class="mt-4">Static Navigation</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Static Navigation</li>
                        </ol> -->
                    <!-- ----------- Konten-------- -->
                    <?php require_once 'themeplates/konten.php'; ?>
                    <!-- ----------- END Konten-------- -->
                        
                        
                    </div>
                </main>
                <?php require_once 'themeplates/footer.php'; ?>
