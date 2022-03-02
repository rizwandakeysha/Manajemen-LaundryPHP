<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link" href="index.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Data Laundry</div>

                <?php if($_SESSION['admin']['level'] ==='admin') : ?>
                <a class="nav-link" href="?p=pengguna">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Pengguna
                </a>
                <a class="nav-link" href="?p=pelanggan">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Pelanggan
                </a>
                <?php endif; ?>

                <a class="nav-link" href="?p=laundry">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Transaksi Laundry
                </a>

                <?php if($_SESSION['admin']['level'] === 'admin') : ?>
                <a class="nav-link" href="?p=transaksi">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Transaksi Pengeluaran
                </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Masuk Sebagai:</div>
            <?= $_SESSION['admin']['username']; ?>
        </div>
    </nav>
</div>