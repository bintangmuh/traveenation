<?php
  use Illuminate\Database\Eloquent\Model as Model;

  class User extends Model {
    protected $table = 'tabel_user';
    protected $hidden = ['id','password'];
  }

?>
