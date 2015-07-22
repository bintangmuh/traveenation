<?php
  require 'database.php';

  /**
   *
   */
  use Illuminate\Database\Eloquent\Model as Model;
  class Negara extends Model
  {
    protected $table = 'negara';
    public function provinsi()
    {
      return $this->hasMany('Provinsi','id_negara','id');
    }
    public function kabupaten()
    {
      return $this->hasMany('Kabupaten','id_negara','id');
    }
  }

  class Provinsi extends Model
  {
    protected $table = 'provinsi';
    public function negara()
    {
      return $this->belongsTo('Negara','id_negara','id');
    }
    public function kabupaten()
    {
      return $this->hasMany('Kabupaten','id_provinsi','id');
    }
  }
  /**
   *
   */
  class Kabupaten extends Model
  {
    protected $table = 'kabupaten';
    public function provinsi()
    {
      return $this->belongsTo('Provinsi','id_provinsi','id');
    }
  }



  $lokasi = Negara::with('provinsi','provinsi.kabupaten')->where('id',1)->get()->toArray();

 ?>
  <?php foreach ($lokasi[0]['provinsi'] as $province): ?>
    <h3><?php echo $province['nama'] ?></h3>
    <table border="1">
      <thead>
        <td>
          Kode
        </td>
        <td>
          Kabupaten
        </td>
      </thead>
      <?php foreach ($province['kabupaten'] as $kabupaten): ?>
        <tr>
          <td>
            <?php echo $kabupaten['id']; ?>
          </td>
          <td>
            <?php echo $kabupaten['Nama']; ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>

  <?php endforeach; ?>
