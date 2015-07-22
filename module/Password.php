<?php
  /**
   *
   */
  class Password
  {

    public function setPassword($password)
    {
      return password_hash($password,PASSWORD_DEFAULT);
    }
  }


 ?>
