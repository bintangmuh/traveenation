<?php
  require 'database.php';

  $users = $capsule::table('tabel_user')->get();
  echo var_dump($users);
?>
