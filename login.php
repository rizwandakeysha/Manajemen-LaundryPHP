<?php 
session_start();
require_once 'config/koneksi.php';

if(isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit;
}

// konfir COOKIE
if(isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    $result = $koneksi->query("SELECT username FROM tb_user WHERE username = $id") or die(mysqli_error($koneksi));
    $row = $result->fetch_assoc();

    if($key == hash('sha256', $row['username'])) {
        $_SESSION['admin'] = $row;
    } 
}

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = $koneksi->query("SELECT * FROM tb_user WHERE username = '$username'") or die(mysqli_error($koneksi));
    if($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if($data = $row['level'] == 'admin' || $data = $row['level'] == 'kasir') {
            // pasang session
            $_SESSION['admin'] = $row;
            $_SESSION['kasir'] = $row;

            // saat di klik tombol remember me
            if(isset($_POST['remember'])) {
                setcookie('id', $row['id_user'], time() + 60);
                setcookie('key', hash('sha256', $row['username']), time() + 60);
            }

            header("Location: index.php");
            exit;
        } 
    }
        $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="template1/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="template1/assets/img/favicon.png">
  <title>
    Login - Laundrianne.id
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins" />
  <!-- Nucleo Icons -->
  <link href="template1/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="template1/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="template1/assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
</head>

<body style="background-color: #f0f0f0" >
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('template1/assets/img/laundry.jpg'); background-size: cover;">
              </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
              <div class="card card-plain">
                <div class="card-header">
                  <h4 style="font-family: Poppins">Laundrianne.id</h4>
                  <p class="mb-0" style="font-family: Poppins">Jangan lupa makan ya ayang :3</p>
                </div>
                <div class="card-body">
                    <?php if(isset($error)) : ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                          <strong>Gagal Login!</strong> Username/Password anda salah.
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                    <?php endif; ?>
                  <form method="post" autocomplete="off">
                    <div class="input-group input-group-outline mb-3" autocomplete="off">
                      <label class="form-label">Nama Pengguna</label>
                      <input id="username" name="username" type="username" class="form-control" required>
                    </div>
                    <div class="input-group input-group-outline mb-5">
                      <label class="form-label">Kata Sandi</label>
                      <input id="password" name="password" type="password" class="form-control" required>
                    </div>
                    <div class="form-check form-check-info text-start ps-0">
                      <div class="form-group">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" required>
                        <label class="form-check-label" for="remember" style="font-family: Poppins">Ingat saya</label>
                      </div>
                    <div class="text-center">
                        <button type="submit" name="login" class="btn btn-primary">Masuk</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </section>
  </main>
  <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted"> Designed by Rizwanda K | XI RPL 1 / 37  |   <a href='https://instagram.com/rizwandakeysha' title='Instagram Rizwanda'  target='_blank'>Instagram Saya</a>  |  <a href='https://twitter.com/rizzwand' title='Twitter Rizwanda'  target='_blank'>Twitter Saya</a>
                            </div>
                            <div>
                                <a href="https://www.apexannunciator.com/privacy-policy/?gclid=CjwKCAiA55mPBhBOEiwANmzoQtWG2jPhtSv_VJCkJ66PtWy6a2SRD_8TKniu8bSDFcTMaefrEASaahoChFkQAvD_BwE">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
  <!--   Core JS Files   -->
  <script src="template1/assets/js/core/popper.min.js"></script>
  <script src="template1/assets/js/core/bootstrap.min.js"></script>
  <script src="template1/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="template1/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="template1/assets/js/material-dashboard.min.js?v=3.0.0"></script>
</body>

</html>

<!-- <!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login dulu dong!</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body style="background-color: #99CCFF">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container"  >
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4" style="font-family: Poppins, sans-serif">Laundrianne</h3><center><h6>Laundry No. 1 se-Malang Raya</h6></center></div>
                                    
                                    <div class="card-body">
                                        <?php if(isset($error)) : ?>
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                          <strong>Gagal Login!</strong> Username/Password anda salah.
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <?php endif; ?>
                                        <form action="" method="post">
                                            <div class="form-group">
                                                <label class="small mb-1" for="username">Username</label>
                                                <input class="form-control py-4" id="username" name="username" type="username" placeholder="Masukan username anda" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="password">Password</label>
                                                <input class="form-control py-4" id="password" name="password" type="password" placeholder="Masukan password" />
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" id="remember" name="remember" type="checkbox" />
                                                    <label class="custom-control-label" for="remember">Ingat password</label>
                                                </div>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button type="submit" name="login" class="btn btn-primary">Masuk</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted"> Designed by Rizwanda K | XI RPL 1 / 37  |   <a href='https://instagram.com/rizwandakeysha' title='Instagram Rizwanda'  target='_blank'>Instagram Saya</a>  |  <a href='https://twitter.com/rizzwand' title='Twitter Rizwanda'  target='_blank'>Twitter Saya</a>
                            </div>
                            <div>
                                <a href="https://www.apexannunciator.com/privacy-policy/?gclid=CjwKCAiA55mPBhBOEiwANmzoQtWG2jPhtSv_VJCkJ66PtWy6a2SRD_8TKniu8bSDFcTMaefrEASaahoChFkQAvD_BwE">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html> -->
