<?php
  require 'database.php';
  require 'user.php';
  $hasil = User::where('username', $_GET['uid'])->get();
  header('Content-Type: application/json');
  echo json_encode($hasil);


 ?>
