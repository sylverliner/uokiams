	<?php

	include '../database_connection/database_connection.php';
	include 'filesLogic.php';
	

	$student_fname = $_COOKIE["student_first_name"];
	$student_lname = $_COOKIE["student_last_name"];
	$student_reg = $_COOKIE["student_reg_number"];
	$reg_number_holder = $_COOKIE["student_reg_number"];

	$checking_user_industrial = "SELECT * FROM industrial_registration WHERE reg_number='$student_reg' AND first_name='$student_fname' AND last_name='$student_lname'";
    $checking_user_query = mysqli_query($conn,$checking_user_industrial);
    $check_existence = mysqli_num_rows($checking_user_query);
    if($check_existence==1){

      $get_user_info = mysqli_fetch_assoc($checking_user_query);

      $student_course = $get_user_info["course"];
      $student_school = $get_user_info["school"];
      $student_department = $get_user_info["student_department"];

      setcookie("student_school_holder",$student_school,time() + (86400 * 30));
      setcookie("student_department_holder",$student_department,time() + (86400 * 30));
      setcookie("student_course_holder",$student_course,time() + (86400 * 30));
	  $status_number = 2;
	}

	?>

	<!DOCTYPE html>
	<html lang="en">
	<head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <title>UOK-IAMS</title>

	  <link rel="stylesheet" href="../css/bootstrap-theme.min.css"/>
	  <link rel="stylesheet" href="../css/bootstrap.min.css"/>
	  <link rel="stylesheet" href="../css/bootstrap-select.css"/>
	  <link rel="stylesheet" href="../css/main_page_style.css"/>
	  <link rel="stylesheet" href="submit_report.css"/>

	  <script type="text/javascript" src="../js/jquery-3.1.1.min.js"/></script>
	  <script type="text/javascript" src="../js/bootstrap.min.js"/></script>
	  <script type="text/javascript" src="../js/jquery.form.min.js"/></script>

	</head>
	<body>

	<div id="top-navigation">
  <div id="header_logo"><img src="../img/UOKIAMS-logo.jpg" class="img-responsive" alt="logo" style="float:left;width:150px; height:50px;position:relative;left:20px"/></div>
<div id="student_name"><span style="color:rgb(255, 198, 0);font-size:1.1em"><em>Welcome,</em>&nbsp; </span><span style="font-family:serif"><?php echo $student_fname." ".$student_lname;?></span></div>
</div>

	<div id="left_side_bar">
	<ul id="menu_list">
	  <a class="menu_items_link" href="../instructions_page/instructions_page.php"><li class="menu_items_list">Instructions</li></a>
	  <a class="menu_items_link" href="../Register_page/Register_page.php"><li class="menu_items_list">Register</li></a>
	  <a class="menu_items_link" href="../download_attachment_documents/download_attachment_documents.php"><li class="menu_items_list">Download Attachment Documents</li></a>
	  <a class="menu_items_link" href="../student_assumption/student_assumption.php"><li class="menu_items_list">Submit Assupmtion</li></a>
	  <a class="menu_items_link" href="../e-logbook/elogbook.php"><li class="menu_items_list">E-Logbook</li></a>
	  <a class="menu_items_link" href="../company_supervisor/company_supervisor_login.php"><li class="menu_items_list">Company Supervisor</li></a>
	  <a class="menu_items_link" href="../visiting_supervisor/visiting_supervisor_login.php"><li class="menu_items_list">Visiting Supervisor</li></a>
	  <a class="menu_items_link" href="submit_report.php"><li class="menu_items_list" style="background-color:orange;padding-left:16px">Submit Report</li></a>
	  <a class="menu_items_link" href="../index.php"><li class="menu_items_list">Logout</li></a>
	</ul>
	</div>

	<div id="main_content">
  		<div class="container-fluid">
    		<div class = "panel">
       			<div class = "panel-heading industrial_phead">
          			<h2 class = "panel-title industrial_ptitle"> Report Submission</h2>
       			</div>
            	<div class = "panel-body industrial_pbody">
         			<div class="panel panel-adjusted">
           				<div class="panel-body">
            				<form method="post" action="submit_report.php" enctype="multipart/form-data">
               					<div class="form-group">
                					<label for="txtfname">First Name </label>
               						<input type="text" class="form-control form-control-adjusted" id="txtfname" placeholder="Enter first name" disabled <?php echo "value='$student_fname'"?>>
              					</div>

								<div class="form-group">
									<label for="txtlname">Last Name </label>
									<input type="text" class="form-control form-control-adjusted" id="txtlname" placeholder="Enter last name" disabled value=<?php echo $student_lname;?>>
								</div>
								<div class="form-group">
									<label for="txtindexnumber">Registration Number </label>
									<input type="text" class="form-control form-control-adjusted" id="txtindexnumber" placeholder="Enter index number"  disabled value=<?php echo $student_reg;?>>
								</div>
								<div class="form-group">
									<label for="txtschool">School </label>
									<input type="text" class="form-control form-control-adjusted" id="txtschool" placeholder="Enter school" name="student_school" disabled value="<?php echo $student_school;?>">
								</div>					
								<div class="form-group">
									<label for="txtdepartment">Deparment </label>
									<input type="text" class="form-control form-control-adjusted" id="txtdepartment" placeholder="Enter Deparment" name="student_department" disabled value="<?php echo $student_department;?>">
								</div>
								<div class="form-group">
									<label for="txtcourse">Course </label>
									<input type="text" class="form-control form-control-adjusted" id="txtcourse" placeholder="Enter your course" name="student_course" disabled value=<?php echo $student_course;?>>
								</div>
								
								<div class="form-group">
									<label for="txtcourse">Upload Report</label>									
										<input type="file" name="myfile" multiple required>																		
								</div>             

								<div id="btn_submit_holder">
									<input type="submit" class="btn btn-primary" value="Submit Report"  name="btn_submit_upload"/>
								</div>
           					</form>
     					</div>
					</div>
       			</div>
     		</div>
  		</div>
 	</div>









	
	<!-- <script>
	$(document).ready(function () {
		$(document).ready(function(){
			$("#form").on('submit',function(e){
				e.preventDefault();
				$(this).ajaxSubmit({
					url:'upload.php',
					beforeSend:function(){
						$("#prog").show();
						$("#prog").attr('value','0');
					},
					uploadProgress:function(event,position,total,percentComplete){
						$("#prog").attr('value',percentComplete);
						$('#sub-but').val(percentComplete+'%');
					},
					success:function(){
						$('#sub-but').val('Files Uploaded!!');
						setTimeout(function(){
							$('#sub-but').val('Upload');
						},1000);
					},
				});
			});
		});
	});
</script> -->


	</body>
	</html>
