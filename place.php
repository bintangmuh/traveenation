<?php
  require_once 'autoload.php';
  require 'pariwisata.php';
  if(isset($_GET['pid'])) {
    try {
      $location = Pariwisata::where('slug', $_GET['pid'])->firstOrFail();
    } catch (Exception $e) {
        header('location: 404.php');
    }
  } else {
    header('location: 404.php');
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $location->nama_destinasi ?> - Traveenation</title>

    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/materialize.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/userpage.css">
    <link href="<?php echo BASE_URL; ?>/icon.css" rel="stylesheet">
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <script>
          function initialize() {
          var myLatlng = new google.maps.LatLng(<?php echo $location->lat ?>,<?php echo $location->long ?>);
          var mapOptions = {
            zoom: 18,
            center: myLatlng
          }
          var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

          var marker = new google.maps.Marker({
              position: myLatlng,
              map: map,
              title: '<?php echo $location->nama_destinasi ?>'
          });
          }

          google.maps.event.addDomListener(window, 'load', initialize);
    </script>

  </head>
  <body>

    <div class="row">
      <div class="parallax-container" style="position: relative">
        <div class="parallax">
          <img src="<?php echo $location->header ?>">
        </div>
        <!-- <h4 class="center-aligned">Lava Tour - Direktori Pariwisata indonesia</h4> -->
        <div class="destinasi">
          <div class="container row">
            <div class="col s6 m6 title-destinasi">
              <span><?php echo $location->nama_destinasi ?><br><small><?php echo $location->address ?></small></span>
            </div>
            <div class="col s6 m6 right-align" style="display: table-cell">
              <a href="#" class="btn-large waves-effect waves-light red" style="valign: middle"><i class="material-icons left">pin_drop</i> Visit!</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- content -->
    <div class="row">
      <div class="container">
        <div class="col s12 m8 l8">
          <h5>Deskripsi</h5>
          <?php echo $location->desc ?>
          <h5><i class="small material-icons">place</i>Location</h5>
          <p>
            <table class="tbl-loc">
              <tr>
                <td>Latitude:</td>
                <td><?php echo $location->lat ?></td>
              </tr>
              <tr>
                <td>Longitude:</td>
                <td><?php echo $location->long ?></td>
              </tr>
            </table>
            <div id="map-canvas"></div>

          </p>
        </div>
        <div class="col s12 m4 l4">
          <h5><i class="material-icons">person</i> Visitor</h5>
          <a href="#usercall" class="modal-trigger profil-btn" data-user="bintangmuh"><img src="bintang.jpg" height=60px class="circle tooltipped" data-position="bottom" data-delay="50" data-tooltip="Bintang Muhammad" alt="" /></a>
          <a href="#usercall" class="modal-trigger profil-btn" data-user="verdian"><img src="verdian.jpg" height=60px class="circle tooltipped" data-position="bottom" data-delay="50" data-tooltip="Verdian Desya" alt="" /></a>

          <br>
          <a href="#modal1" class="waves-effect waves-light btn modal-trigger">See All</a>

          <div id="modal1" class="modal">
            <div class="modal-content">
              <h4>Modal Header</h4>
              <p>A bunch of text</p>
              <div id="results">

              </div>
            </div>
            <div class="modal-footer">
              <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
            </div>
          </div>

          <!-- User Profile -->
          <div id="usercall" class="modal profile-modal">
            <div class="modal-content">
              <div class="fluid-header" id="modal-profil-header" style="background-image: url(#)">
                <a href="#!" class="btn-flat modal-action modal-close waves-teal btn-flat  close-btn"><i class="material-icons">close</i></a>
                <img id="modal-profil-photo" src="#" class="circle" alt="" />
              </div>
              <h5 class="center-align" id="modal-profil-name"></h5>
              <p id="modal-profil-about" class="center-align"></p>
              <div class="row">
                <div class="col offset-m3 s6 m3 center-align">
                  <span class="count_int">11</span><br>
                  <span>Follower</span>
                </div>
                <div class="col s6 m3 center-align">
                  <span class="count_int">11</span><br>
                  <span>Place</span>
                </div>
              </div>
              <div class="center-align">
                <a href="#" class="btn waves-effect waves-blue blue"><i class="material-icons left">person_add</i> Follow</a>
                <a href="#" class="btn waves-effect waves-blue green"><i class="material-icons left">visibility</i>Profile</a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="row">
      <div class="col s12 m12 l12">
        <div class="container">
          <h5 class="center-aligned">Gallery</h5>

          <div class="row">
            <div class="col s12 m4 l4">
              <img class="materialboxed responsive-img" width="650" src="img1.jpg">
            </div>
            <div class="col s12 m4 l4">
              <img class="materialboxed responsive-img" width="650" src="img2.jpg">
            </div>
            <div class="col s12 m4 l4">
              <img class="materialboxed responsive-img" width="650" src="img3.jpg">
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Javascript Goes Here -->
    <script src="<?php echo BASE_URL; ?>/js/jquery.js"></script>
    <script src="<?php echo BASE_URL; ?>/js/materialize.min.js"></script>


    <script src="<?php echo BASE_URL; ?>/js/gmaps.js"></script>

    <script type="text/javascript">
      $(document).ready(function(){
        $('.parallax').parallax();
      });
      $(document).ready(function(){
        $('.tooltipped').tooltip({delay: 50});
      });

      $(document).ready(function(){
        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
        $('.modal-trigger').leanModal();
        $('.profil-btn').click(function(){
            var userid = $(this).data("user");
            $.ajax({
                url: "db.php?uid="+userid+"",
                //force to handle it as text
                dataType: "text",
                success: function(data) {

                    //data downloaded so we call parseJSON function
                    //and pass downloaded data
                    var json = $.parseJSON(data);
                    //now json variable contains data in json format
                    //let's display a few items
                    $('#modal-profil-photo').attr('src',json['0'].profil_img);
                    $('#modal-profil-header').css('background-image', 'url('+ json['0'].header_img +')');
                    $('#modal-profil-name').html(json['0'].real_name);
                    $('#modal-profil-about').html(json['0'].about);
                }

            });
      });
    });
    </script>
  </body>
</html>
