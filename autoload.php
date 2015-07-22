<?php
  require_once('database.php');
  function my_autoload ($pClassName) {
        include(__DIR__ . "/module/" . $pClassName . ".php");
    }
  spl_autoload_register("my_autoload");


?>
