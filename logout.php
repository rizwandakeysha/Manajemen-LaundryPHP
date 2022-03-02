<?php 
session_start();
session_destroy();
session_unset();

setcookie('id', '', time()+3600);
setcookie('key', '', time()+3600);

echo "<script>alert('Berhasil Logout');window.location='login.php';</script>";

?>