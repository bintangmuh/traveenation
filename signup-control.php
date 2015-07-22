<?php
  require 'autoload.php';
  $username = $_POST['idname'];
  $realname = $_POST['fullname'];
  $mail = $_POST['email'];
  $password = $_POST['passwd'];

  $date = date('Y-m-d H:i:s');

  $signup = new User;
  $encrypt = new Password;

  // saving the data
  try {
    $signup->username = $username;
    $signup->password = $encrypt->setPassword($password);
    $signup->real_name = $realname;
    $signup->mail = $mail;
    $signup->date_created = $date;
    $signup->save();
  } catch (Exception $e) {
    header('location: signup.php');
  }



?>
