<?php
  require 'database.php';
  $hasil = $capsule::table('tabel_user')->where('username', $_GET['uid'])->get();
  header('Content-Type: application/json');
  echo json_encode($hasil);


 ?>
