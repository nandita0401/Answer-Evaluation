<?php

//login.php

include('Examination.php');

$exam = new Examination;

$exam->admin_session_public();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Decsriptive Answer Evaluation</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/guillaumepotier/Parsley.js@2.9.1/dist/parsley.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../style/style.css" />
    <style type="text/css">
    
      body{
  background: url(background.png); 
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
    float: left;
    box-sizing: border-box;
    padding: 200px 200px;
    background-image: url("1f.png");
}

.row{
  margin-left: 160px;
}
    </style>
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-sm">
      <a class="navbar-brand" href="#">
        <img src="logo.png" class="img-fluid" width="300" alt="Online Examination System in PHP" />
      </a>
      <div class="container">
    </nav>
  </header>

  <div class="container">
      <div class="row">
        
        <div class="col-md-6" style="margin-top:20px;">
          
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
            <div class="card-header"style="background: #CBC1EB;box-shadow: 3px 8px 22px rgba(94,28,68,0.15); text-align: center; font-weight: bold;">Moderator Login</div>
            <div class="card-body"style="background: linear-gradient(45deg, #CB88E5, #CBC1EB); box-shadow: 3px 8px 22px rgba(94,28,68,0.15);">
              <form method="post" id="admin_login_form">
                <div class="form-group" style="margin-top: 20px;">
                  <label>Enter Email Address</label>
                  <input type="text" name="admin_email_address" id="admin_email_address" class="form-control" />
                </div>
                <div class="form-group">
                  <label>Enter Password</label>
                  <input type="password" name="admin_password" id="admin_password" class="form-control" />
                </div>
                <div class="form-group">
                  <input type="hidden" name="page" value="login" />
                  <input type="hidden" name="action" value="login" />
                  <input type="submit" name="admin_login" id="admin_login" class="btn btn-info" value="Login" style="margin-left: 146px;background:#5C55A6; margin-top: 20px;" />
                </div>
              </form>
              <div align="center">
                <a href="register.php" style="color: #000000; font-weight: bold;">Register</a>
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

  $('#admin_login_form').parsley();

  $('#admin_login_form').on('submit', function(event){
    event.preventDefault();

    $('#admin_email_address').attr('required', 'required');

    $('#admin_email_address').attr('data-parsley-type', 'email');

    $('#admin_password').attr('required', 'required');

    if($('#admin_login_form').parsley().validate())
    {
      $.ajax({
        url:"ajax_action.php",
        method:"POST",
        data:$(this).serialize(),
        dataType:"json",
        beforeSend:function(){
          $('#admin_login').attr('disabled', 'disabled');
          $('#admin_login').val('please wait...');
        },
        success:function(data)
        {
          if(data.success)
          {
            location.href="index.php";
          }
          else
          {
            $('#message').html('<div class="alert alert-danger">'+data.error+'</div>');
          }
          $('#admin_login').attr('disabled', false);
          $('#admin_login').val('Login');
        }
      });
    }

  });

});

</script>