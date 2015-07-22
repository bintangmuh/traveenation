<?php
/**
 *
 */
class Template
{
  public $baseurl = 'http://localhost/traveenation/';
  public function css()
  {
    return '<link rel="stylesheet" href="'.$this->baseurl.'css/materialize.min.css">
    <link rel="stylesheet" href="'.$this->baseurl.'css/userpage.css">
    <link href="'.$this->baseurl.'icon.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="'.$this->baseurl.'assets/favicon_small.png" />';
  }
  function javas() {
    return '<script src="'.$this->baseurl.'js/jquery.js"></script>
    <script src="'.$this->baseurl.'js/materialize.min.js"></script>';
  }
}

?>
