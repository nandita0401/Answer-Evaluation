<?php

//register.php

include('master/Examination.php');

$exam = new Examination;

$exam->user_session_public();

include('header.php');

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
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
    float: left;
    box-sizing: border-box;
    padding: 200px 200px;
    background-image: url("master/1f.png");
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
        <img src="master/logo.png" class="img-fluid" width="300" alt="" />
      </a>
    </nav>
  </header>
	<div class="containter">
		<div class="">
      <div class="row">
      <div class="col-md-6" style="">
			<div class="card" style="margin-left: 250px;width:500px; box-shadow: 3px 8px 22px rgba(94,28,68,0.15);">
        		<div class="card-header" style="background: #CBC1EB;box-shadow: 3px 8px 22px rgba(94,28,68,0.15); text-align: center; font-weight: bold;"><h4>Student Registration</h4></div>
        		<div class="card-body" style="background: linear-gradient(45deg, #CB88E5, #CBC1EB); box-shadow: 3px 8px 22px rgba(94,28,68,0.15);">
        			   <span id="message"></span>
                <form method="post" id="user_register_form">
                  <div class="form-group">
                    <label>Enter Email Address</label>
                    <input type="text" name="user_email_address" id="user_email_address" class="form-control" data-parsley-checkemail data-parsley-checkemail-message='Email Address already Exists' />
                  </div>
                  <div class="form-group">
                    <label>Enter Password</label>
                    <input type="password" name="user_password" id="user_password" class="form-control" />
                  </div>
                  <div class="form-group">
                    <label>Enter Confirm Password</label>
                    <input type="password" name="confirm_user_password" id="confirm_user_password" class="form-control" />
                  </div>
                  <div class="form-group">
                    <label>Enter Name</label>
                    <input type="text" name="user_name" id="user_name" class="form-control" /> 
                  </div>
                  <div class="form-group">
                    <label>Select Gender</label>
                    <select name="user_gender" id="user_gender" class="form-control">
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                  </select> 
                  </div>
                  <div class="form-group">
                    <label>Enter Address</label>
                    <textarea name="user_address" id="user_address" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <label>Enter Mobile Number</label>
                    <input type="text" name="user_mobile_no" id="user_mobile_no" class="form-control" /> 
                  </div>
                  <div class="form-group">
                    <label>Select Profile Image </label>
                    <input type="file" name="user_image" id="user_image" />
                  </div>
                  <br />
                  <div class="form-group" align="center">
                    <input type="hidden" name='page' value='register' />
                    <input type="hidden" name="action" value="register" />
                    <input type="submit" name="user_register" id="user_register" class="btn btn-info" value="Register" style="background:#5C55A6;"/>
                  </div>
                </form>
          			<div align="center">
          				<a href="login.php"style="color: #000000; font-weight: bold;">Login</a>
          			</div>
        		</div>
      		</div>
      		<br /><br />
      		<br /><br />
        </div>
      </div>
		</div>
	</div>

</body>

</html>

<script>

$(document).ready(function(){

  window.ParsleyValidator.addValidator('checkemail', {
    validateString: function(value){
      return $.ajax({
        url:'user_ajax_action.php',
        method:'post',
        data:{page:'register', action:'check_email', email:value},
        dataType:"json",
        async: false,
        success:function(data)
        {
          return true;
        }
      });
    }
  });

  $('#user_register_form').parsley();

  $('#user_register_form').on('submit', function(event){
    event.preventDefault();

    $('#user_email_address').attr('required', 'required');

    $('#user_email_address').attr('data-parsley-type', 'email');

    $('#user_password').attr('required', 'required');

    $('#confirm_user_password').attr('required', 'required');

    $('#confirm_user_password').attr('data-parsley-equalto', '#user_password');

    $('#user_name').attr('required', 'required');

    $('#user_name').attr('data-parsley-pattern', '^[a-zA-Z ]+$');

    $('#user_address').attr('required', 'required');

    $('#user_mobile_no').attr('required', 'required');

    $('#user_mobile_no').attr('data-parsley-pattern', '^[0-9]+$');

    $('#user_image').attr('required', 'required');

    $('#user_image').attr('accept', 'image/*');

    if($('#user_register_form').parsley().validate())
    {
      $.ajax({
        url:'user_ajax_action.php',
        method:"POST",
        data:new FormData(this),
        dataType:"json",
        contentType:false,
        cache:false,
        processData:false,
        beforeSend:function()
        {
          $('#user_register').attr('disabled', 'disabled');
          $('#user_register').val('please wait...');
        },
        success:function(data)
        {
          if(data.success)
          {
            $('#message').html('<div class="alert alert-success">Registered Successfully</div>');
            $('#user_register_form')[0].reset();
            $('#user_register_form').parsley().reset();
          }

          $('#user_register').attr('disabled', false);

          $('#user_register').val('Register');
        }
      })
    }

  });
	
});

</script>