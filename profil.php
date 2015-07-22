<?php
  require_once 'autoload.php';
  require 'user.php';
  $user = User::where('username', $_GET['uid'])->first();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $user->real_name ?> - Traveenation</title>

    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/userpage.css">
    <link href="icon.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="assets/favicon_small.png" />

  </head>
  <body>

    <div class="row">
      <div class="parallax-container" style="position: relative">
        <div class="parallax">
          <?php if ($user->header_img): ?>
            <img src="<?php echo $user->header_img ?>">
          <?php endif; ?>
        </div>
        <!-- <h4 class="center-aligned">Lava Tour - Direktori Pariwisata indonesia</h4> -->
        <div class="destinasi">
          <div class="container row">
            <div class="col s3 m2 l1">
              <img src="<?php echo $user->profil_img ?>" class="profpic responsive-img circle" />
            </div>
            <div class="col s9 m10 l8 title-destinasi">
              <span><?php echo $user->real_name ?><br><small><?php echo "11 Posts" ?></small></span>
            </div>
            <div class="col s12 m12  l3 right-align" style="display: table-cell">
              <a href="#" class="btn-large waves-effect waves-light teal darken1 follow-button" style="width: 100%;valign: middle"><i class="material-icons left">person_add</i> Follow</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- content -->
    <div class="row">
      <div class="">
        <div class="col s12 m8 l8">
          <div class="row">
            <div class="col s12">
              <ul class="tabs">
                <li class="tab col s3"><a class="active" href="#post">Posts</a></li>
                <li class="tab col s3"><a href="#place">Place</a></li>
                <li class="tab col s3"><a href="#info">Info</a></li>
              </ul>
            </div>
            <div id="post" class="col s12">
              <p class="center-align" style="color: #969696">
                <span style="font-size: 20px">Oops, This user never post or visited any place yet</span>
              </p>
            </div>
            <div id="place" class="col s12">
              <p class="center-align" style="color: #969696">
                <span style="font-size: 20px">Oops, This user never visited any place yet</span>
              </p>
            </div>
            <div id="info" class="col s12">
              <p>
                <b>Username:</b><br>
                <?php echo $user->username ?>
              </p>
              <p>
                <b>Fullname:</b><br>
                <?php echo $user->real_name ?>
              </p>
              <p>
                <b>Joined:</b><br>
                <?php echo $user->date_created ?>
              </p>
              <p>
                <b>About</b><br>
                <?php echo $user->about ?>
              </p>
            </div>
          </div>

          </p>
        </div>
        <div class="col s12 m4 l4">
          <div class="row">
            <div class="col s6 m12">
              <h5><a href="#modal1" class="modal-trigger"><i class="material-icons">person</i> Follower</a></h5>
              <a href="#usercall" class="modal-trigger profil-btn" data-user="bintangmuh"><img src="bintang.jpg" height=60px class="circle tooltipped" data-position="bottom" data-delay="50" data-tooltip="Bintang Muhammad" alt="" /></a>
              <a href="#usercall" class="modal-trigger profil-btn" data-user="verdian"><img src="verdian.jpg" height=60px class="circle tooltipped" data-position="bottom" data-delay="50" data-tooltip="Verdian Desya" alt="" /></a>
            </div>
            <div class="col s6 m12">
              <h5><a href="#modal1" class="modal-trigger"><i class="material-icons">person</i> Following</a></h5>
              <a href="#usercall" class="modal-trigger profil-btn" data-user="bintangmuh"><img src="bintang.jpg" height=60px class="circle tooltipped" data-position="bottom" data-delay="50" data-tooltip="Bintang Muhammad" alt="" /></a>
              <a href="#usercall" class="modal-trigger profil-btn" data-user="verdian"><img src="verdian.jpg" height=60px class="circle tooltipped" data-position="bottom" data-delay="50" data-tooltip="Verdian Desya" alt="" /></a>
            </div>
          </div>

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
                <a id="modal-profil-link" href="#" class="btn waves-effect waves-blue blue"><i class="material-icons left">person_add</i> Follow</a>
                <a id="modal-follow-link" href="#" class="btn waves-effect waves-blue green"><i class="material-icons left">visibility</i>Profile</a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <!-- Javascript Goes Here -->
    <script src="js/jquery.js"></script>
    <script src="js/materialize.min.js"></script>

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
                    $('#modal-profil-link').attr('href','profil.php?uid='+json['0'].username);
                    $('#modal-follow-link').attr('href',json['0'].username);
                }

            });
      });

    });
    </script>
  </body>
</html>
