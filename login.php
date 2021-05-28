<?php

//login.php

include('master/Examination.php');

$exam = new Examination;

$exam->user_session_public();

include('header.php');

?>
<html>
<head>
<style>
body{
  background: url(master/background-master.png); 
}
/*#myVideo {
  position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%; 
  min-height: 100%;
}*/

.container{
  margin-top: 15px;
}

.container .row .col-md-3{
    position: relative;
    width: 50%;
    height: 100%;
    float: right;
    box-sizing: border-box;
    padding: 200px 200px;
    background-image: url("master/1f.png");
}

.row{
  margin-left: 190px;
}
</style>
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-sm">
      <a class="navbar-brand" href="#">
        <img src="master/logo.png" class="img-fluid" width="300" alt="" />
      </a>
    </nav>
  </header>
  <!--<video autoplay muted loop id="myVideo">
  <source src="master/back.mp4" type="video/mp4">
  Your browser does not support HTML5 video.
</video>-->
  <div class="container">

      <div class="row">
        <div class="col-md-6" style="">
          

            <span id="message">
            <?php
            if(isset($_GET['verified']))
            {
              echo '
              <div class="alert alert-success">
                Your email has been verified, now you can login
              </div>
              ';
            }
            ?>   
            </span>
            <div class="card" style="width:400px;height:400px;box-shadow: 3px 8px 22px rgba(94,28,68,0.15);">
              <div class="card-header" style="background: #CBC1EB;box-shadow: 3px 8px 22px rgba(94,28,68,0.15); text-align: center; font-weight: bold;">Student Login</div>
              <div class="card-body" style="background: linear-gradient(45deg, #CB88E5, #CBC1EB); box-shadow: 3px 8px 22px rgba(94,28,68,0.15);">
                <form method="post" id="user_login_form">
                  <div class="form-group" style="margin-top: 20px;">
                    <label>Enter Email Address</label>
                      <input type="text" name="user_email_address" id="user_email_address" class="form-control" />
                    </div>
                  <div class="form-group">
                    <label>Enter Password</label>
                    <input type="password" name="user_password" id="user_password" class="form-control" />
                  </div>
                  <div class="form-group">
                    <input type="hidden" name="page" value="login" />
                    <input type="hidden" name="action" value="login" />
                    <input type="submit" name="user_login" id="user_login" class="btn btn-info" value="Login" style="margin-left: 146px;background:#5C55A6; margin-top: 20px;" />
                  </div>
                </form>
                <div align="center" >
                  <a href="register.php" style="color: #000000; font-weight: bold;">Register</a>
                </div>
                <div align="center" >
                  <a href="master/login.php" style="color: #000000; font-weight: bold;">Moderator Login</a>
                </div>
              </div>
            </div>
        </div>
        <div class="col-md-3">
        </div>
      </div>
  </div>
  

</body>
</html>

<script>

$(document).ready(function(){

  $('#user_login_form').parsley();

  $('#user_login_form').on('submit', function(event){
    event.preventDefault();

    $('#user_email_address').attr('required', 'required');

    $('#user_email_address').attr('data-parsley-type', 'email');

    $('#user_password').attr('required', 'required');

    if($('#user_login_form').parsley().validate())
    {
      $.ajax({
        url:"user_ajax_action.php",
        method:"POST",
        data:$(this).serialize(),
        dataType:"json",
        beforeSend:function()
        {
          $('#user_login').attr('disabled', 'disabled');
          $('#user_login').val('please wait...');
        },
        success:function(data)
        {
          if(data.success)
          {
            location.href='index.php';
          }
          else
          {
            $('#message').html('<div class="alert alert-danger">'+data.error+'</div>');
          }

          $('#user_login').attr('disabled', false);

          $('#user_login').val('Login');
        }
      })
    }

  });

});


var video = document.getElementById("myVideo");
var btn = document.getElementById("myBtn");

function myFunction() {
  if (video.paused) {
    video.play();
    btn.innerHTML = "Pause";
  } else {
    video.pause();
    btn.innerHTML = "Play";
  }
}


</script>