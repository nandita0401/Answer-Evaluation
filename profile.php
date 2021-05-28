<?php

//profile.php

include('master/Examination.php');

$exam = new Examination;

$exam->user_session_private();

include('header.php');

$exam->query = "
	SELECT * FROM user_table 
	WHERE user_id = '".$_SESSION['user_id']."'
";

$result = $exam->query_result();

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
    background-image: url("imgf.png");
}

.row{
  margin-left: 160px;
}
</style>
</head>
<body>
	<div class="containter">
		<div class="d-flex justify-content-center">
			<br /><br />
			<span id="message"></span>
			<div class="card" style="margin-top:50px;margin-bottom: 100px;width:500px; box-shadow: 3px 8px 22px rgba(94,28,68,0.15);">
        		<div class="card-header" style="background: #CBC1EB;box-shadow: 3px 8px 22px rgba(94,28,68,0.15); text-align: center; font-weight: bold;"><h4>Profile</h4></div>
        		<div class="card-body" style="background: linear-gradient(45deg, #CB88E5, #CBC1EB); box-shadow: 3px 8px 22px rgba(94,28,68,0.15);">
        			<form method="post" id="profile_form">
        				<?php
        				foreach($result as $row)
        				{
        				?>
        				<script>
        				$(document).ready(function(){
        					$('#user_gender').val("<?php echo $row["user_gender"]; ?>");
        				});
        				</script>
					    <div class="form-group">
					        <label>Enter Name</label>
					        <input type="text" name="user_name" id="user_name" class="form-control" value="<?php echo $row["user_name"]; ?>" />
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
					        <textarea name="user_address" id="user_address" class="form-control"><?php echo $row["user_address"]; ?></textarea>
					    </div>
					    <div class="form-group">
					        <label>Enter Mobile Number</label>
					        <input type="text" name="user_mobile_no" id="user_mobile_no" class="form-control" value="<?php echo $row["user_mobile_no"]; ?>" />
					    </div>
					    <div class="form-group">
					        <label>Select Profile Image - </label>
					        <input type="file" name="user_image" id="user_image" accept="image/*" /><br />
					        <img src="upload/<?php echo $row["user_image"]; ?>" class="img-thumbnail" width="250"  />
					        <input type="hidden" name="hidden_user_image" value="<?php echo $row["user_image"]; ?>" />
					    </div>
					    <br />
					    <div class="form-group" align="center">
					        <input type="hidden" name="page" value="profile" />
					        <input type="hidden" name="action" value="profile" />
					        <input type="submit" name="user_profile" id="user_profile" class="btn btn-info" value="Save" style="background:#5C55A6;"/>
					    </div>
					    <?php
						}
					    ?>
          			</form>
        		</div>
      		</div>
      		<br /><br />
      		<br /><br />
		</div>
	</div>

</body>

</html>

<script>

$(document).ready(function(){

	$('#profile_form').parsley();
	
	$('#profile_form').on('submit', function(event){

		event.preventDefault();

		$('#user_name').attr('required', 'required');

		$('#user_name').attr('data-parsley-pattern', '^[a-zA-Z ]+$');

		$('#user_address').attr('required', 'required');

		$('#user_mobile_no').attr('required', 'required');

		$('#user_mobile_no').attr('data-parsley-pattern', '^[0-9]+$');

		//$('#user_image').attr('required', 'required');

		$('#user_image').attr('accept', 'image/*');

		if($('#profile_form').parsley().validate())
		{
			$.ajax({
				url:"user_ajax_action.php",
				method:"POST",
				data: new FormData(this),
				dataType:"json",
				contentType: false,
				cache: false,
				processData:false,				
				beforeSend:function()
				{
					$('#user_profile').attr('disabled', 'disabled');
					$('#user_profile').val('please wait...');
				},
				success:function(data)
				{
					if(data.success)
					{
						location.reload(true);
					}
					else
					{
						$('#message').html('<div class="alert alert-danger">'+data.error+'</div>');
					}
					$('#user_profile').attr('disabled', false);
					$('#user_profile').val('Save');
				}
			});
		}
	});
});

</script>