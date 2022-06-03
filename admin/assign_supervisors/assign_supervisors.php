<?php

include '../../database_connection/database_connection.php';

$regions = array("Rift-Valley Region","Central Region","Eastern Region","Western Region",
  "Nyanza Region","North East Region","Coastal Region","Nairobi");

$regions_2 = array("-- Select Resident Region --","Rift Valley Region","Central Region","Eastern Region","Western Region",
"Nyanza Region","North East Region","Coastal Region","Nairobi");

$schools = array("-- Select Lecturer School --","SASNR","SOBE","SEASS","SHS","SST");

$departments = array("-- Select Lecturer Department -- ","Mathematics and Statistics","Computing Information Systems & Knowledge Management","Physical Sciences","Nursing","Clinical Medicine",
	"Biological Sciences","Humanities","Education Administration, Planning and Management","Education Administration, Psychology and Foundation",
	"CIEM","Finance & Economics","Marketing, Human Resource, Tourism and Hospitality","Agricultural Biosystems and Economics","Horticulture");

$mysql_query_1 = "SELECT * FROM visiting_lecturers";

$mysql_query_sasnr = "SELECT * FROM visiting_lecturers WHERE lecturer_school = 'SASNR'";
$mysql_query_sobe = "SELECT * FROM visiting_lecturers WHERE lecturer_school = 'SOBE'";
$mysql_query_seass = "SELECT * FROM visiting_lecturers WHERE lecturer_school = 'SEASS'";
$mysql_query_shs = "SELECT * FROM visiting_lecturers WHERE lecturer_school = 'SHS'";
$mysql_query_sst = "SELECT * FROM visiting_lecturers WHERE lecturer_school = 'SST'";

 ?>


<!DOCTYPE html>
<html lang="en" class="bg-pink">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UOK-IAMS</title>

  <link rel="stylesheet" href="../../css/bootstrap-theme.min.css"/>
  <link rel="stylesheet" href="../../css/bootstrap.min.css"/>
  <link rel="stylesheet" href="../../css/main_page_style.css"/>
  <link rel="stylesheet" href="assign_supervisors.css"/>

  <script type="text/javascript" src="../../js/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="../../js/bootstrap.min.js"></script>


</head>
<body>

<div id="top-navigation">
<div id="header_logo"><img src="../../img/UOKIAMS-logo.jpg" class="img-responsive" alt="logo" style="float:left;width:150px; height:50px;position:relative;left:20px"/></div>
<div id="student_name"><span style="color:rgb(255, 198, 0);font-size:1.1em"><em>Welcome,</em>&nbsp; </span><span style="font-family:serif"><?php echo "Admin"?></span></div>
</div>

<div id="left_side_bar">
<ul id="menu_list">
  <a class="menu_items_link" href="../view_registered_students/view_registered_students.php"><li class="menu_items_list">Registered Students</li></a>
  <a class="menu_items_link" href="../attachment_documents/attachment_documents.php"><li class="menu_items_list" >Upload Attachment Docs</li></a>
  <a class="menu_items_link" href="../students_assumptions/students_assumptions.php"><li class="menu_items_list" >Student Assumptions</li></a>
  <a class="menu_items_link" href="assign_supervisors.php"><li class="menu_items_list" style="background-color:orange;padding-left:16px">Assign Supervisors</li></a>
  <a class="menu_items_link" href="../visiting_score/visiting_supervisors_score.php"><li class="menu_items_list">Visiting Superviors Score</li></a>
  <a class="menu_items_link" href="../company_score/company_supervisor_score.php"><li class="menu_items_list">Company Supervisor Score</li></a>
  <a class="menu_items_link" href="../check_attachment_reports/download_students_reports.php"><li class="menu_items_list">Report Submissions</li></a>
  <a class="menu_items_link" href="../change_password/change_password.php"><li class="menu_items_list">Change Password</li></a>
  <a class="menu_items_link" href="../../index.php"><li class="menu_items_list">Logout</li></a>
</ul>
</div>

<div class="container-fluid">
<div id="main_content">
	<div class = "panel">
	   <div class = "panel-heading phead">
		  <h2 class = "panel-title ptitle"> Assign Supervisors</h2>
	   </div>
			<div class = "panel-body pbody">

			<div class = "panel">
			<div class = "panel-heading phead">
				<h2 class = "panel-title ptitle"> Students Statistics</h2>
		   </div>
				<div class = "panel-body pbody">

			  <table class="table table-bordered table-hover">

				  <thead>
					<tr>
						<th style="text-align:center">Rift Valley</th>
						<th style="text-align:center">Central</th>
						<th style="text-align:center">Eastern</th>
						<th style="text-align:center">Western</th>
						<th style="text-align:center">Nyanza</th>
						<th style="text-align:center">North East</th>
						<th style="text-align:center">Coastal</th>
						<th style="text-align:center">Nairobi</th>

					</tr>

				  </thead>

				  <tbody>
					<?php

					echo "<tr style='text-align:center;font-size:1.1em' width='100%'>";

					$mycounter = 0;                
					while($mycounter < 8){	
					$selected_item = $regions[$mycounter];
					$mysql_query_command_1 = "SELECT company_region FROM students_assumption WHERE company_region='$selected_item'";				
					$execute_result_query = mysqli_query($conn,$mysql_query_command_1);
					$row_cnt = mysqli_num_rows($execute_result_query); 					
					echo "<td>".$row_cnt."</td>";						
					$mycounter++;							
					}

					echo "</tr>";

					 ?>
				  </tbody>
			</table>
	 </div>
   </div>


			   <div class = "panel">
			<div class = "panel-heading phead">
				<h2 class = "panel-title ptitle"> Registered Lecturers</h2>
		   </div>
				<div class = "panel-body pbody">

			  <table class="table table-bordered table-hover">

				  <thead>
					<tr>
						<th style="text-align:center">Name</th>
						<th style="text-align:center">School</th>
						<th style="text-align:center">Department</th>
						<th style="text-align:center">Phone Number</th>
						<th style="text-align:center">Residence Region</th>
						<th style="text-align:center">E-mail</th>

					</tr>

				  </thead>

				  <tbody>
					<?php

					echo "<tr style='text-align:center;font-size:1.1em' width='100%'>";

					$mysql_query_command_1 = $mysql_query_1;
					$execute_result_query = mysqli_query($conn,$mysql_query_command_1);
					while ($row_set = mysqli_fetch_array($execute_result_query)){

					  echo "<tr style='text-align:center;font-size:1.1em'>";

					  echo "<td>".$row_set["lecturer_name"]."</td>";
					  echo "<td>".$row_set["lecturer_school"]."</td>";
					  echo "<td>".$row_set["lecturer_department"]."</td>";
					  echo "<td>".$row_set["lecturer_phone_number"]."</td>";
					  echo "<td>".$row_set["lecturer_region_residence"]."</td>";
					  echo "<td>".$row_set["lecturer_email"]."</td>";

					  echo "</tr>";

					}


					echo "</tr>";

					 ?>
				  </tbody>
			</table>
	 </div>
   </div>

   <div class="panel">
	 <div class = "panel-heading phead phead-adjusted">
		  <h2 class = "panel-title ptitle"> Add Lecturer</h2>
	   </div>
			<div class = "panel-body">

			<form method="post" action="">

			<div class="row">
			<div class="col-md-12">

			<div class="col-md-5 col-md-offset-1">
			<input type="text" placeholder="Enter Name" name="txt_lecturer_name" class="form-control"/>
			</div>

			<div class="col-md-5">
			 <select class="form-control" id="lecturers_department" name="lecturers_department">
			  <?php
			  foreach($departments as $val) { echo "<option>".$val."</option>";};
			  ?>
			</select>
			</div>


			</div>
			</div>
			<br>

			<div class="row">
			<div class="col-md-12">

			<div class="col-md-5 col-md-offset-1">
			<input type="text" placeholder="Enter Contact (0700000000)" name="txt_lecturer_contact" class="form-control"/>
			</div>

			<div class="col-md-5">
			<select class="form-control" id="lecturer_school" name="lecturer_school">
			  <?php
				foreach($schools as $val) { echo "<option>".$val."</option>";};
			   ?>
			</select>
			</div>


			</div>
			</div>
			<br>

			<div class="row">
			<div class="col-md-12">

			<div class="col-md-5 col-md-offset-1">
			<input type="email" placeholder="Enter valid email address" name="txt_lecturer_email" class="form-control"/>
			</div>

			<div class="col-md-5">
			<select class="form-control" id="selected_region" name="selected_region">
			<?php
			foreach($regions_2 as $val) { echo "<option>".$val."</option>";};
			?>
			</select>
			</div>

			</div>
			</div>

			<div style="float: right">
			<input type="submit" value="Add" name="btn_add_lecturer" class="btn btn-primary"/>
			</div>

			</div>           

	   </div>

			</form>	
   </div>

 </div>



 <div class = "panel">
			<div class = "panel-heading phead">
				<h2 class = "panel-title ptitle"> Assign Supervisors</h2>
		   </div>
				<div class = "panel-body pbody">
			  
			  <form method="post" action="">

			  <table class="table table-bordered table-hover">

				  <thead>
					<tr>
						<th style="text-align:center" width="10%">Regions</th>
						<th colspan="5" style="text-align:center">Schools</th>

					</tr>

				  </thead>
		  
				  <tbody>


				  <tr style='text-align:center;font-size:1.1em' width='100%'>

						<td></td>
						<td>SASNR</td>
						<td>SOBE</td>
						<td>SEASS</td>
						<td>SHS</td>
						<td>SST</td>

				  </tr>

				  <tr>

					<td>Rift Valley Region</td>  
					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_rift_valley_sasnr">              	
					<?php
					$execute_mysql_query_sasnr = mysqli_query($conn,$mysql_query_sasnr);
					while($get_sasnr_details = mysqli_fetch_array($execute_mysql_query_sasnr)){								
						echo "<option>".$get_sasnr_details["lecturer_name"]."</option>";							
					}	
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_rift_valley_sasnr">                  	
					<?php
					$execute_mysql_query_sasnr = mysqli_query($conn,$mysql_query_sasnr);
					while($get_sasnr_details = mysqli_fetch_array($execute_mysql_query_sasnr)){								
						echo "<option>".$get_sasnr_details["lecturer_name"]."</option>";							
					}
					?>             	
					</select>
	
					

					</td>  

					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_rift_valley_sobe">              	
					<?php
					$execute_mysql_query_sobe = mysqli_query($conn,$mysql_query_sobe);
					while($get_sobe_details = mysqli_fetch_array($execute_mysql_query_sobe)){								
						echo "<option>".$get_sobe_details["lecturer_name"]."</option>";
					}	

					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_rift_valley_sobe">                  	
					<?php
					$execute_mysql_query_sobe = mysqli_query($conn,$mysql_query_sobe);
					while($get_sobe_details = mysqli_fetch_array($execute_mysql_query_sobe)){								
						echo "<option>".$get_sobe_details["lecturer_name"]."</option>";							
					}	
					?>            	
					</select>


					</td>  


					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_rift_valley_seass">              	
					<?php
					$execute_mysql_query_seass = mysqli_query($conn,$mysql_query_seass);
					while($get_seass_details = mysqli_fetch_array($execute_mysql_query_seass)){								
						echo "<option>".$get_seass_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_rift_valley_seass">                  	
					<?php
					$execute_mysql_query_seass = mysqli_query($conn,$mysql_query_seass);
					while($get_seass_details = mysqli_fetch_array($execute_mysql_query_seass)){								
						echo "<option>".$get_seass_details["lecturer_name"]."</option>";
					}							
					?>            	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_3_rift_valley_seass">                  	
					<?php
					$execute_mysql_query_seass = mysqli_query($conn,$mysql_query_seass);
					while($get_seass_details = mysqli_fetch_array($execute_mysql_query_seass)){								
						echo "<option>".$get_seass_details["lecturer_name"]."</option>";
					}							
					?>            	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_4_rift_valley_seass">                  	
					<?php
					$execute_mysql_query_seass = mysqli_query($conn,$mysql_query_seass);
					while($get_seass_details = mysqli_fetch_array($execute_mysql_query_seass)){								
						echo "<option>".$get_seass_details["lecturer_name"]."</option>";
					}							
					?>            	
					</select>


					</td>

					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_rift_valley_shs">              	
					<?php
					$execute_mysql_query_shs = mysqli_query($conn,$mysql_query_shs);
					while($get_shs_details = mysqli_fetch_array($execute_mysql_query_shs)){								
						echo "<option>".$get_shs_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_rift_valley_shs">                  	
					<?php
					$execute_mysql_query_shs = mysqli_query($conn,$mysql_query_shs);
					while($get_shs_details = mysqli_fetch_array($execute_mysql_query_shs)){								
						echo "<option>".$get_shs_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>


					</td>                  	                  	                 	        	        	                 	  
					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_rift_valley_sst">              	
					<?php
					$execute_mysql_query_sst = mysqli_query($conn,$mysql_query_sst);
					while($get_sst_details = mysqli_fetch_array($execute_mysql_query_sst)){								
						echo "<option>".$get_sst_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_rift_valley_sst">                  	
					<?php
					$execute_mysql_query_sst = mysqli_query($conn,$mysql_query_sst);
					while($get_sst_details = mysqli_fetch_array($execute_mysql_query_sst)){								
						echo "<option>".$get_sst_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_3_rift_valley_sst">                  	
					<?php
					$execute_mysql_query_sst = mysqli_query($conn,$mysql_query_sst);
					while($get_sst_details = mysqli_fetch_array($execute_mysql_query_sst)){								
						echo "<option>".$get_sst_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_4_rift_valley_sst">                  	
					<?php
					$execute_mysql_query_sst = mysqli_query($conn,$mysql_query_sst);
					while($get_sst_details = mysqli_fetch_array($execute_mysql_query_sst)){								
						echo "<option>".$get_sst_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>
	

					</td>      	        	                  	                 	        	        	           	        	

				  </tr>                 

				  <tr>

					<td>Central Region</td>  
					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_central_sasnr">              	
					<?php
					$execute_mysql_query_sasnr = mysqli_query($conn,$mysql_query_sasnr);
					while($get_sasnr_details = mysqli_fetch_array($execute_mysql_query_sasnr)){								
						echo "<option>".$get_sasnr_details["lecturer_name"]."</option>";							
					}	
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_central_sasnr">               	
					<?php
					$execute_mysql_query_sasnr = mysqli_query($conn,$mysql_query_sasnr);
					while($get_sasnr_details = mysqli_fetch_array($execute_mysql_query_sasnr)){								
						echo "<option>".$get_sasnr_details["lecturer_name"]."</option>";							
					}
					?>             	
					</select>


					</td>  

					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_central_sobe">              	
					<?php
					$execute_mysql_query_sobe = mysqli_query($conn,$mysql_query_sobe);
					while($get_sobe_details = mysqli_fetch_array($execute_mysql_query_sobe)){								
						echo "<option>".$get_sobe_details["lecturer_name"]."</option>";
					}	

					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_central_sobe">                  	
					<?php
					$execute_mysql_query_sobe = mysqli_query($conn,$mysql_query_sobe);
					while($get_sobe_details = mysqli_fetch_array($execute_mysql_query_sobe)){								
						echo "<option>".$get_sobe_details["lecturer_name"]."</option>";							
					}	
					?>            	
					</select>


					</td>  


					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_central_seass">              	
					<?php
					$execute_mysql_query_seass = mysqli_query($conn,$mysql_query_seass);
					while($get_seass_details = mysqli_fetch_array($execute_mysql_query_seass)){								
						echo "<option>".$get_seass_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_central_seass">                 	
					<?php
					$execute_mysql_query_seass = mysqli_query($conn,$mysql_query_seass);
					while($get_seass_details = mysqli_fetch_array($execute_mysql_query_seass)){								
						echo "<option>".$get_seass_details["lecturer_name"]."</option>";
					}							
					?>            	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_3_central_seass">                 	
					<?php
					$execute_mysql_query_seass = mysqli_query($conn,$mysql_query_seass);
					while($get_seass_details = mysqli_fetch_array($execute_mysql_query_seass)){								
						echo "<option>".$get_seass_details["lecturer_name"]."</option>";
					}							
					?>            	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_4_central_seass">                 	
					<?php
					$execute_mysql_query_seass = mysqli_query($conn,$mysql_query_seass);
					while($get_seass_details = mysqli_fetch_array($execute_mysql_query_seass)){								
						echo "<option>".$get_seass_details["lecturer_name"]."</option>";
					}							
					?>            	
					</select>
	

					</td>

					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_central_shs">              	
					<?php
					$execute_mysql_query_shs = mysqli_query($conn,$mysql_query_shs);
					while($get_shs_details = mysqli_fetch_array($execute_mysql_query_shs)){								
						echo "<option>".$get_shs_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_central_shs">                	
					<?php
					$execute_mysql_query_shs = mysqli_query($conn,$mysql_query_shs);
					while($get_shs_details = mysqli_fetch_array($execute_mysql_query_shs)){								
						echo "<option>".$get_shs_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>


					</td>                  	                  	                 	        	        	                 	  
					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_central_sst">              	
					<?php
					$execute_mysql_query_sst = mysqli_query($conn,$mysql_query_sst);
					while($get_sst_details = mysqli_fetch_array($execute_mysql_query_sst)){								
						echo "<option>".$get_sst_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_central_sst">                	
					<?php
					$execute_mysql_query_sst = mysqli_query($conn,$mysql_query_sst);
					while($get_sst_details = mysqli_fetch_array($execute_mysql_query_sst)){								
						echo "<option>".$get_sst_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_3_central_sst">                	
					<?php
					$execute_mysql_query_sst = mysqli_query($conn,$mysql_query_sst);
					while($get_sst_details = mysqli_fetch_array($execute_mysql_query_sst)){								
						echo "<option>".$get_sst_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_4_central_sst">                	
					<?php
					$execute_mysql_query_sst = mysqli_query($conn,$mysql_query_sst);
					while($get_sst_details = mysqli_fetch_array($execute_mysql_query_sst)){								
						echo "<option>".$get_sst_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>


					</td>      	        	                  	                 	        	        	           	        	

				  </tr>

				  <tr>

					<td>Eastern Region</td>  
					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_eastern_sasnr">              	
					<?php
					$execute_mysql_query_sasnr = mysqli_query($conn,$mysql_query_sasnr);
					while($get_sasnr_details = mysqli_fetch_array($execute_mysql_query_sasnr)){								
						echo "<option>".$get_sasnr_details["lecturer_name"]."</option>";							
					}	
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_eastern_sasnr">               	
					<?php
					$execute_mysql_query_sasnr = mysqli_query($conn,$mysql_query_sasnr);
					while($get_sasnr_details = mysqli_fetch_array($execute_mysql_query_sasnr)){								
						echo "<option>".$get_sasnr_details["lecturer_name"]."</option>";							
					}
					?>             	
					</select>


					</td>  

					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_eastern_sobe">              	
					<?php
					$execute_mysql_query_sobe = mysqli_query($conn,$mysql_query_sobe);
					while($get_sobe_details = mysqli_fetch_array($execute_mysql_query_sobe)){								
						echo "<option>".$get_sobe_details["lecturer_name"]."</option>";
					}	

					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_eastern_sobe">                	
					<?php
					$execute_mysql_query_sobe = mysqli_query($conn,$mysql_query_sobe);
					while($get_sobe_details = mysqli_fetch_array($execute_mysql_query_sobe)){								
						echo "<option>".$get_sobe_details["lecturer_name"]."</option>";							
					}	
					?>            	
					</select>


					</td>  


					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_eastern_seass">              	
					<?php
					$execute_mysql_query_seass = mysqli_query($conn,$mysql_query_seass);
					while($get_seass_details = mysqli_fetch_array($execute_mysql_query_seass)){								
						echo "<option>".$get_seass_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_eastern_seass">                 	
					<?php
					$execute_mysql_query_seass = mysqli_query($conn,$mysql_query_seass);
					while($get_seass_details = mysqli_fetch_array($execute_mysql_query_seass)){								
						echo "<option>".$get_seass_details["lecturer_name"]."</option>";
					}							
					?>            	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_3_eastern_seass">                 	
					<?php
					$execute_mysql_query_seass = mysqli_query($conn,$mysql_query_seass);
					while($get_seass_details = mysqli_fetch_array($execute_mysql_query_seass)){								
						echo "<option>".$get_seass_details["lecturer_name"]."</option>";
					}							
					?>            	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_4_eastern_seass">                 	
					<?php
					$execute_mysql_query_seass = mysqli_query($conn,$mysql_query_seass);
					while($get_seass_details = mysqli_fetch_array($execute_mysql_query_seass)){								
						echo "<option>".$get_seass_details["lecturer_name"]."</option>";
					}							
					?>            	
					</select>


					</td>

					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_eastern_shs">              	
					<?php
					$execute_mysql_query_shs = mysqli_query($conn,$mysql_query_shs);
					while($get_shs_details = mysqli_fetch_array($execute_mysql_query_shs)){								
						echo "<option>".$get_shs_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_eastern_shs">                	
					<?php
					$execute_mysql_query_shs = mysqli_query($conn,$mysql_query_shs);
					while($get_shs_details = mysqli_fetch_array($execute_mysql_query_shs)){								
						echo "<option>".$get_shs_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>


					</td>                  	                  	                 	        	        	                 	  
					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_eastern_sst">              	
					<?php
					$execute_mysql_query_sst = mysqli_query($conn,$mysql_query_sst);
					while($get_sst_details = mysqli_fetch_array($execute_mysql_query_sst)){								
						echo "<option>".$get_sst_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_eastern_sst">                	
					<?php
					$execute_mysql_query_sst = mysqli_query($conn,$mysql_query_sst);
					while($get_sst_details = mysqli_fetch_array($execute_mysql_query_sst)){								
						echo "<option>".$get_sst_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_3_eastern_sst">                	
					<?php
					$execute_mysql_query_sst = mysqli_query($conn,$mysql_query_sst);
					while($get_sst_details = mysqli_fetch_array($execute_mysql_query_sst)){								
						echo "<option>".$get_sst_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_4_eastern_sst">                	
					<?php
					$execute_mysql_query_sst = mysqli_query($conn,$mysql_query_sst);
					while($get_sst_details = mysqli_fetch_array($execute_mysql_query_sst)){								
						echo "<option>".$get_sst_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>


					</td>      	        	                  	                 	        	        	           	        	

				  </tr>

				  <tr>

					<td>Western Region</td>  
					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_western_sasnr">              	
					<?php
					$execute_mysql_query_sasnr = mysqli_query($conn,$mysql_query_sasnr);
					while($get_sasnr_details = mysqli_fetch_array($execute_mysql_query_sasnr)){								
						echo "<option>".$get_sasnr_details["lecturer_name"]."</option>";							
					}	
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_western_sasnr">               	
					<?php
					$execute_mysql_query_sasnr = mysqli_query($conn,$mysql_query_sasnr);
					while($get_sasnr_details = mysqli_fetch_array($execute_mysql_query_sasnr)){								
						echo "<option>".$get_sasnr_details["lecturer_name"]."</option>";							
					}
					?>             	
					</select>


					</td>  

					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_western_sobe">              	
					<?php
					$execute_mysql_query_sobe = mysqli_query($conn,$mysql_query_sobe);
					while($get_sobe_details = mysqli_fetch_array($execute_mysql_query_sobe)){								
						echo "<option>".$get_sobe_details["lecturer_name"]."</option>";
					}	

					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_western_sobe">                	
					<?php
					$execute_mysql_query_sobe = mysqli_query($conn,$mysql_query_sobe);
					while($get_sobe_details = mysqli_fetch_array($execute_mysql_query_sobe)){								
						echo "<option>".$get_sobe_details["lecturer_name"]."</option>";							
					}	
					?>            	
					</select>


					</td>  


					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_western_seass">              	
					<?php
					$execute_mysql_query_seass = mysqli_query($conn,$mysql_query_seass);
					while($get_seass_details = mysqli_fetch_array($execute_mysql_query_seass)){								
						echo "<option>".$get_seass_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_western_seass">                 	
					<?php
					$execute_mysql_query_seass = mysqli_query($conn,$mysql_query_seass);
					while($get_seass_details = mysqli_fetch_array($execute_mysql_query_seass)){								
						echo "<option>".$get_seass_details["lecturer_name"]."</option>";
					}							
					?>            	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_3_western_seass">                 	
					<?php
					$execute_mysql_query_seass = mysqli_query($conn,$mysql_query_seass);
					while($get_seass_details = mysqli_fetch_array($execute_mysql_query_seass)){								
						echo "<option>".$get_seass_details["lecturer_name"]."</option>";
					}							
					?>            	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_4_western_seass">                 	
					<?php
					$execute_mysql_query_seass = mysqli_query($conn,$mysql_query_seass);
					while($get_seass_details = mysqli_fetch_array($execute_mysql_query_seass)){								
						echo "<option>".$get_seass_details["lecturer_name"]."</option>";
					}							
					?>            	
					</select>
	

					</td>

					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_western_shs">              	
					<?php
					$execute_mysql_query_shs = mysqli_query($conn,$mysql_query_shs);
					while($get_shs_details = mysqli_fetch_array($execute_mysql_query_shs)){								
						echo "<option>".$get_shs_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_western_shs">                	
					<?php
					$execute_mysql_query_shs = mysqli_query($conn,$mysql_query_shs);
					while($get_shs_details = mysqli_fetch_array($execute_mysql_query_shs)){								
						echo "<option>".$get_shs_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>


					</td>                  	                  	                 	        	        	                 	  
					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_western_sst">              	
					<?php
					$execute_mysql_query_sst = mysqli_query($conn,$mysql_query_sst);
					while($get_sst_details = mysqli_fetch_array($execute_mysql_query_sst)){								
						echo "<option>".$get_sst_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_western_sst">                	
					<?php
					$execute_mysql_query_sst = mysqli_query($conn,$mysql_query_sst);
					while($get_sst_details = mysqli_fetch_array($execute_mysql_query_sst)){								
						echo "<option>".$get_sst_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_3_western_sst">                	
					<?php
					$execute_mysql_query_sst = mysqli_query($conn,$mysql_query_sst);
					while($get_sst_details = mysqli_fetch_array($execute_mysql_query_sst)){								
						echo "<option>".$get_sst_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_4_western_sst">                	
					<?php
					$execute_mysql_query_sst = mysqli_query($conn,$mysql_query_sst);
					while($get_sst_details = mysqli_fetch_array($execute_mysql_query_sst)){								
						echo "<option>".$get_sst_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>
		
					</td>      	        	                  	                 	        	        	           	        	

				  </tr>

				  <tr>

					<td>Nyanza Region</td>  
					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_nyanza_sasnr">              	
					<?php
					$execute_mysql_query_sasnr = mysqli_query($conn,$mysql_query_sasnr);
					while($get_sasnr_details = mysqli_fetch_array($execute_mysql_query_sasnr)){								
						echo "<option>".$get_sasnr_details["lecturer_name"]."</option>";							
					}	
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_nyanza_sasnr">               	
					<?php
					$execute_mysql_query_sasnr = mysqli_query($conn,$mysql_query_sasnr);
					while($get_sasnr_details = mysqli_fetch_array($execute_mysql_query_sasnr)){								
						echo "<option>".$get_sasnr_details["lecturer_name"]."</option>";							
					}
					?>             	
					</select>


					</td>  

					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_nyanza_sobe">              	
					<?php
					$execute_mysql_query_sobe = mysqli_query($conn,$mysql_query_sobe);
					while($get_sobe_details = mysqli_fetch_array($execute_mysql_query_sobe)){								
						echo "<option>".$get_sobe_details["lecturer_name"]."</option>";
					}	

					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_nyanza_sobe">                	
					<?php
					$execute_mysql_query_sobe = mysqli_query($conn,$mysql_query_sobe);
					while($get_sobe_details = mysqli_fetch_array($execute_mysql_query_sobe)){								
						echo "<option>".$get_sobe_details["lecturer_name"]."</option>";							
					}	
					?>            	
					</select>


					</td>  


					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_nyanza_seass">              	
					<?php
					$execute_mysql_query_seass = mysqli_query($conn,$mysql_query_seass);
					while($get_seass_details = mysqli_fetch_array($execute_mysql_query_seass)){								
						echo "<option>".$get_seass_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_nyanza_seass">                 	
					<?php
					$execute_mysql_query_seass = mysqli_query($conn,$mysql_query_seass);
					while($get_seass_details = mysqli_fetch_array($execute_mysql_query_seass)){								
						echo "<option>".$get_seass_details["lecturer_name"]."</option>";
					}							
					?>            	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_3_nyanza_seass">                 	
					<?php
					$execute_mysql_query_seass = mysqli_query($conn,$mysql_query_seass);
					while($get_seass_details = mysqli_fetch_array($execute_mysql_query_seass)){								
						echo "<option>".$get_seass_details["lecturer_name"]."</option>";
					}							
					?>            	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_4_nyanza_seass">                 	
					<?php
					$execute_mysql_query_seass = mysqli_query($conn,$mysql_query_seass);
					while($get_seass_details = mysqli_fetch_array($execute_mysql_query_seass)){								
						echo "<option>".$get_seass_details["lecturer_name"]."</option>";
					}							
					?>            	
					</select>


					</td>

					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_nyanza_shs">              	
					<?php
					$execute_mysql_query_shs = mysqli_query($conn,$mysql_query_shs);
					while($get_shs_details = mysqli_fetch_array($execute_mysql_query_shs)){								
						echo "<option>".$get_shs_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_nyanza_shs">                	
					<?php
					$execute_mysql_query_shs = mysqli_query($conn,$mysql_query_shs);
					while($get_shs_details = mysqli_fetch_array($execute_mysql_query_shs)){								
						echo "<option>".$get_shs_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>


					</td>                  	                  	                 	        	        	                 	  
					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_nyanza_sst">              	
					<?php
					$execute_mysql_query_sst = mysqli_query($conn,$mysql_query_sst);
					while($get_sst_details = mysqli_fetch_array($execute_mysql_query_sst)){								
						echo "<option>".$get_sst_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_nyanza_sst">                	
					<?php
					$execute_mysql_query_sst = mysqli_query($conn,$mysql_query_sst);
					while($get_sst_details = mysqli_fetch_array($execute_mysql_query_sst)){								
						echo "<option>".$get_sst_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_3_nyanza_sst">                	
					<?php
					$execute_mysql_query_sst = mysqli_query($conn,$mysql_query_sst);
					while($get_sst_details = mysqli_fetch_array($execute_mysql_query_sst)){								
						echo "<option>".$get_sst_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_4_nyanza_sst">                	
					<?php
					$execute_mysql_query_sst = mysqli_query($conn,$mysql_query_sst);
					while($get_sst_details = mysqli_fetch_array($execute_mysql_query_sst)){								
						echo "<option>".$get_sst_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>


					</td>      	        	                  	                 	        	        	           	        	

				  </tr>

				  <tr>

					<td>North East Region</td>  
					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_north_east_sasnr">              	
					<?php
					$execute_mysql_query_sasnr = mysqli_query($conn,$mysql_query_sasnr);
					while($get_sasnr_details = mysqli_fetch_array($execute_mysql_query_sasnr)){								
						echo "<option>".$get_sasnr_details["lecturer_name"]."</option>";							
					}	
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_north_east_sasnr">               	
					<?php
					$execute_mysql_query_sasnr = mysqli_query($conn,$mysql_query_sasnr);
					while($get_sasnr_details = mysqli_fetch_array($execute_mysql_query_sasnr)){								
						echo "<option>".$get_sasnr_details["lecturer_name"]."</option>";							
					}
					?>             	
					</select>


					</td>  

					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_north_east_sobe">              	
					<?php
					$execute_mysql_query_sobe = mysqli_query($conn,$mysql_query_sobe);
					while($get_sobe_details = mysqli_fetch_array($execute_mysql_query_sobe)){								
						echo "<option>".$get_sobe_details["lecturer_name"]."</option>";
					}	

					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_north_east_sobe">               	
					<?php
					$execute_mysql_query_sobe = mysqli_query($conn,$mysql_query_sobe);
					while($get_sobe_details = mysqli_fetch_array($execute_mysql_query_sobe)){								
						echo "<option>".$get_sobe_details["lecturer_name"]."</option>";							
					}	
					?>            	
					</select>


					</td>  


					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_north_east_seass">              	
					<?php
					$execute_mysql_query_seass = mysqli_query($conn,$mysql_query_seass);
					while($get_seass_details = mysqli_fetch_array($execute_mysql_query_seass)){								
						echo "<option>".$get_seass_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_north_east_seass">                	
					<?php
					$execute_mysql_query_seass = mysqli_query($conn,$mysql_query_seass);
					while($get_seass_details = mysqli_fetch_array($execute_mysql_query_seass)){								
						echo "<option>".$get_seass_details["lecturer_name"]."</option>";
					}							
					?>            	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_3_north_east_seass">                	
					<?php
					$execute_mysql_query_seass = mysqli_query($conn,$mysql_query_seass);
					while($get_seass_details = mysqli_fetch_array($execute_mysql_query_seass)){								
						echo "<option>".$get_seass_details["lecturer_name"]."</option>";
					}							
					?>            	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_4_north_east_seass">                	
					<?php
					$execute_mysql_query_seass = mysqli_query($conn,$mysql_query_seass);
					while($get_seass_details = mysqli_fetch_array($execute_mysql_query_seass)){								
						echo "<option>".$get_seass_details["lecturer_name"]."</option>";
					}							
					?>            	
					</select>


					</td>

					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_north_east_shs">              	
					<?php
					$execute_mysql_query_shs = mysqli_query($conn,$mysql_query_shs);
					while($get_shs_details = mysqli_fetch_array($execute_mysql_query_shs)){								
						echo "<option>".$get_shs_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_north_east_shs">               	
					<?php
					$execute_mysql_query_shs = mysqli_query($conn,$mysql_query_shs);
					while($get_shs_details = mysqli_fetch_array($execute_mysql_query_shs)){								
						echo "<option>".$get_shs_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>



					</td>                  	                  	                 	        	        	                 	  
					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_north_east_sst">              	
					<?php
					$execute_mysql_query_sst = mysqli_query($conn,$mysql_query_sst);
					while($get_sst_details = mysqli_fetch_array($execute_mysql_query_sst)){								
						echo "<option>".$get_sst_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_north_east_sst">               	
					<?php
					$execute_mysql_query_sst = mysqli_query($conn,$mysql_query_sst);
					while($get_sst_details = mysqli_fetch_array($execute_mysql_query_sst)){								
						echo "<option>".$get_sst_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_3_north_east_sst">               	
					<?php
					$execute_mysql_query_sst = mysqli_query($conn,$mysql_query_sst);
					while($get_sst_details = mysqli_fetch_array($execute_mysql_query_sst)){								
						echo "<option>".$get_sst_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_4_north_east_sst">               	
					<?php
					$execute_mysql_query_sst = mysqli_query($conn,$mysql_query_sst);
					while($get_sst_details = mysqli_fetch_array($execute_mysql_query_sst)){								
						echo "<option>".$get_sst_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>


					</td>      	        	                  	                 	        	        	           	        	

				  </tr>

				  <tr>

					<td>Coastal Region</td>  
					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_coastal_sasnr">              
					<?php
					$execute_mysql_query_sasnr = mysqli_query($conn,$mysql_query_sasnr);
					while($get_sasnr_details = mysqli_fetch_array($execute_mysql_query_sasnr)){								
						echo "<option>".$get_sasnr_details["lecturer_name"]."</option>";							
					}	
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_coastal_sasnr">               	
					<?php
					$execute_mysql_query_sasnr = mysqli_query($conn,$mysql_query_sasnr);
					while($get_sasnr_details = mysqli_fetch_array($execute_mysql_query_sasnr)){								
						echo "<option>".$get_sasnr_details["lecturer_name"]."</option>";							
					}
					?>             	
					</select>


					</td>  

					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_coastal_sobe">              	
					<?php
					$execute_mysql_query_sobe = mysqli_query($conn,$mysql_query_sobe);
					while($get_sobe_details = mysqli_fetch_array($execute_mysql_query_sobe)){								
						echo "<option>".$get_sobe_details["lecturer_name"]."</option>";
					}	

					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_coastal_sobe">               	
					<?php
					$execute_mysql_query_sobe = mysqli_query($conn,$mysql_query_sobe);
					while($get_sobe_details = mysqli_fetch_array($execute_mysql_query_sobe)){								
						echo "<option>".$get_sobe_details["lecturer_name"]."</option>";							
					}	
					?>            	
					</select>


					</td>  


					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_coastal_seass">              	
					<?php
					$execute_mysql_query_seass = mysqli_query($conn,$mysql_query_seass);
					while($get_seass_details = mysqli_fetch_array($execute_mysql_query_seass)){								
						echo "<option>".$get_seass_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_coastal_seass">                	
					<?php
					$execute_mysql_query_seass = mysqli_query($conn,$mysql_query_seass);
					while($get_seass_details = mysqli_fetch_array($execute_mysql_query_seass)){								
						echo "<option>".$get_seass_details["lecturer_name"]."</option>";
					}							
					?>            	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_3_coastal_seass">                	
					<?php
					$execute_mysql_query_seass = mysqli_query($conn,$mysql_query_seass);
					while($get_seass_details = mysqli_fetch_array($execute_mysql_query_seass)){								
						echo "<option>".$get_seass_details["lecturer_name"]."</option>";
					}							
					?>            	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_4_coastal_seass">                	
					<?php
					$execute_mysql_query_seass = mysqli_query($conn,$mysql_query_seass);
					while($get_seass_details = mysqli_fetch_array($execute_mysql_query_seass)){								
						echo "<option>".$get_seass_details["lecturer_name"]."</option>";
					}							
					?>            	
					</select>


					</td>

					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_coastal_shs">              	
					<?php
					$execute_mysql_query_shs = mysqli_query($conn,$mysql_query_shs);
					while($get_shs_details = mysqli_fetch_array($execute_mysql_query_shs)){								
						echo "<option>".$get_shs_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_coastal_shs">               	
					<?php
					$execute_mysql_query_shs = mysqli_query($conn,$mysql_query_shs);
					while($get_shs_details = mysqli_fetch_array($execute_mysql_query_shs)){								
						echo "<option>".$get_shs_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>


					</td>                  	                  	                 	        	        	                 	  
					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_coastal_sst">              	
					<?php
					$execute_mysql_query_sst = mysqli_query($conn,$mysql_query_sst);
					while($get_sst_details = mysqli_fetch_array($execute_mysql_query_sst)){								
						echo "<option>".$get_sst_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_coastal_sst">               	
					<?php
					$execute_mysql_query_sst = mysqli_query($conn,$mysql_query_sst);
					while($get_sst_details = mysqli_fetch_array($execute_mysql_query_sst)){								
						echo "<option>".$get_sst_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_3_coastal_sst">               	
					<?php
					$execute_mysql_query_sst = mysqli_query($conn,$mysql_query_sst);
					while($get_sst_details = mysqli_fetch_array($execute_mysql_query_sst)){								
						echo "<option>".$get_sst_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_4_coastal_sst">               	
					<?php
					$execute_mysql_query_sst = mysqli_query($conn,$mysql_query_sst);
					while($get_sst_details = mysqli_fetch_array($execute_mysql_query_sst)){								
						echo "<option>".$get_sst_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>


					</td>      	        	                  	                 	        	        	           	        	

				  </tr>

				  <tr>

					<td>Nairobi</td>  
					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_nairobi_sasnr">              
					<?php
					$execute_mysql_query_sasnr = mysqli_query($conn,$mysql_query_sasnr);
					while($get_sasnr_details = mysqli_fetch_array($execute_mysql_query_sasnr)){								
						echo "<option>".$get_sasnr_details["lecturer_name"]."</option>";							
					}	
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_nairobi_sasnr">               	
					<?php
					$execute_mysql_query_sasnr = mysqli_query($conn,$mysql_query_sasnr);
					while($get_sasnr_details = mysqli_fetch_array($execute_mysql_query_sasnr)){								
						echo "<option>".$get_sasnr_details["lecturer_name"]."</option>";							
					}
					?>             	
					</select>


					</td>  

					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_nairobi_sobe">              	
					<?php
					$execute_mysql_query_sobe = mysqli_query($conn,$mysql_query_sobe);
					while($get_sobe_details = mysqli_fetch_array($execute_mysql_query_sobe)){								
						echo "<option>".$get_sobe_details["lecturer_name"]."</option>";
					}	

					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_nairobi_sobe">               	
					<?php
					$execute_mysql_query_sobe = mysqli_query($conn,$mysql_query_sobe);
					while($get_sobe_details = mysqli_fetch_array($execute_mysql_query_sobe)){								
						echo "<option>".$get_sobe_details["lecturer_name"]."</option>";							
					}	
					?>            	
					</select>


					</td>  


					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_nairobi_seass">              	
					<?php
					$execute_mysql_query_seass = mysqli_query($conn,$mysql_query_seass);
					while($get_seass_details = mysqli_fetch_array($execute_mysql_query_seass)){								
						echo "<option>".$get_seass_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_nairobi_seass">                	
					<?php
					$execute_mysql_query_seass = mysqli_query($conn,$mysql_query_seass);
					while($get_seass_details = mysqli_fetch_array($execute_mysql_query_seass)){								
						echo "<option>".$get_seass_details["lecturer_name"]."</option>";
					}							
					?>            	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_3_nairobi_seass">                	
					<?php
					$execute_mysql_query_seass = mysqli_query($conn,$mysql_query_seass);
					while($get_seass_details = mysqli_fetch_array($execute_mysql_query_seass)){								
						echo "<option>".$get_seass_details["lecturer_name"]."</option>";
					}							
					?>            	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_4_nairobi_seass">                	
					<?php
					$execute_mysql_query_seass = mysqli_query($conn,$mysql_query_seass);
					while($get_seass_details = mysqli_fetch_array($execute_mysql_query_seass)){								
						echo "<option>".$get_seass_details["lecturer_name"]."</option>";
					}							
					?>            	
					</select>


					</td>

					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_nairobi_shs">              	
					<?php
					$execute_mysql_query_shs = mysqli_query($conn,$mysql_query_shs);
					while($get_shs_details = mysqli_fetch_array($execute_mysql_query_shs)){								
						echo "<option>".$get_shs_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_nairobi_shs">               	
					<?php
					$execute_mysql_query_shs = mysqli_query($conn,$mysql_query_shs);
					while($get_shs_details = mysqli_fetch_array($execute_mysql_query_shs)){								
						echo "<option>".$get_shs_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>


					</td>                  	                  	                 	        	        	                 	  
					<td>
					<select class="form-control form-control-adjusted" name="selected_lecturer_1_nairobi_sst">              	
					<?php
					$execute_mysql_query_sst = mysqli_query($conn,$mysql_query_sst);
					while($get_sst_details = mysqli_fetch_array($execute_mysql_query_sst)){								
						echo "<option>".$get_sst_details["lecturer_name"]."</option>";
					}							
					?>        	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_2_nairobi_sst">               	
					<?php
					$execute_mysql_query_sst = mysqli_query($conn,$mysql_query_sst);
					while($get_sst_details = mysqli_fetch_array($execute_mysql_query_sst)){								
						echo "<option>".$get_sst_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_3_nairobi_sst">               	
					<?php
					$execute_mysql_query_sst = mysqli_query($conn,$mysql_query_sst);
					while($get_sst_details = mysqli_fetch_array($execute_mysql_query_sst)){								
						echo "<option>".$get_sst_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>
					<select class="form-control form-control-adjusted" name="selected_lecturer_4_nairobi_sst">               	
					<?php
					$execute_mysql_query_sst = mysqli_query($conn,$mysql_query_sst);
					while($get_sst_details = mysqli_fetch_array($execute_mysql_query_sst)){								
						echo "<option>".$get_sst_details["lecturer_name"]."</option>";
					}							
					?>           	
					</select>

					</td>      	        	                  	                 	        	        	           	        	

				  </tr>



				  </tbody>
				  
			</table>

			  <div style="float: right">
			<input type="submit" name="btn-assign-lecturers" class="btn btn-primary" value="Assign Supervisors"/>
			</div>
			
			</form>
	 </div>
	</div>
 </div>

<?php 

	if(isset($_POST["btn_add_lecturer"])){

		$lecturer_name = $_POST["txt_lecturer_name"];
		$lecturer_department = $_POST["lecturers_department"];
		$lecturer_contact = $_POST["txt_lecturer_contact"];
		$lecturer_school = $_POST["lecturer_school"];
		$lecturer_email = $_POST["txt_lecturer_email"];
		$lecturer_region = $_POST["selected_region"];

		if($lecturer_name!=""&&$lecturer_department!=""&&$lecturer_contact!=""&&$lecturer_school!=""&&$lecturer_region!=""){
			$my_insert_query = "INSERT INTO `visiting_lecturers` (`id`, `lecturer_name`, `lecturer_school`, `lecturer_phone_number`, `lecturer_region_residence`, `lecturer_department`, `lecturer_email`) VALUES (NULL, '$lecturer_name', '$lecturer_school', '$lecturer_contact', '$lecturer_region', '$lecturer_department', '$lecturer_email')";
			if($execute_my_insert_query = mysqli_query($conn,$my_insert_query)){				
				echo "<script>alert ('Lecturer Has Been Added Successfully');</script>";
			}
		}else{
			echo "<script>alert ('Please Fill All Required Spaces');</script>";
		}
	}

	if(isset($_POST["btn-assign-lecturers"])){
		
		$lecturer_1_rift_valley_sasnr = $_POST["selected_lecturer_1_rift_valley_sasnr"];
		$lecturer_2_rift_valley_sasnr = $_POST["selected_lecturer_2_rift_valley_sasnr"];
		$lecturer_1_rift_valley_sobe = $_POST["selected_lecturer_1_rift_valley_sobe"];
		$lecturer_2_rift_valley_sobe = $_POST["selected_lecturer_2_rift_valley_sobe"];
		$lecturer_1_rift_valley_seass = $_POST["selected_lecturer_1_rift_valley_seass"];
		$lecturer_2_rift_valley_seass = $_POST["selected_lecturer_2_rift_valley_seass"];
		$lecturer_3_rift_valley_seass = $_POST["selected_lecturer_3_rift_valley_seass"];
		$lecturer_4_rift_valley_seass = $_POST["selected_lecturer_4_rift_valley_seass"];
		$lecturer_1_rift_valley_shs = $_POST["selected_lecturer_1_rift_valley_shs"];
		$lecturer_2_rift_valley_shs = $_POST["selected_lecturer_2_rift_valley_shs"];
		$lecturer_1_rift_valley_sst = $_POST["selected_lecturer_1_rift_valley_sst"];
		$lecturer_2_rift_valley_sst = $_POST["selected_lecturer_2_rift_valley_sst"];
		$lecturer_3_rift_valley_sst = $_POST["selected_lecturer_3_rift_valley_sst"];
		$lecturer_4_rift_valley_sst = $_POST["selected_lecturer_4_rift_valley_sst"];

		$lecturer_1_central_sasnr = $_POST["selected_lecturer_1_central_sasnr"];
		$lecturer_2_central_sasnr = $_POST["selected_lecturer_2_central_sasnr"];
		$lecturer_1_central_sobe = $_POST["selected_lecturer_1_central_sobe"];
		$lecturer_2_central_sobe = $_POST["selected_lecturer_2_central_sobe"];
		$lecturer_1_central_seass = $_POST["selected_lecturer_1_central_seass"];
		$lecturer_2_central_seass = $_POST["selected_lecturer_2_central_seass"];
		$lecturer_3_central_seass = $_POST["selected_lecturer_3_central_seass"];
		$lecturer_4_central_seass = $_POST["selected_lecturer_4_central_seass"];
		$lecturer_1_central_shs = $_POST["selected_lecturer_1_central_shs"];
		$lecturer_2_central_shs = $_POST["selected_lecturer_2_central_shs"];
		$lecturer_1_central_sst = $_POST["selected_lecturer_1_central_sst"];
		$lecturer_2_central_sst = $_POST["selected_lecturer_2_central_sst"];
		$lecturer_3_central_sst = $_POST["selected_lecturer_3_central_sst"];
		$lecturer_4_central_sst = $_POST["selected_lecturer_4_central_sst"];

		$lecturer_1_eastern_sasnr = $_POST["selected_lecturer_1_eastern_sasnr"];
		$lecturer_2_eastern_sasnr = $_POST["selected_lecturer_2_eastern_sasnr"];
		$lecturer_1_eastern_sobe = $_POST["selected_lecturer_1_eastern_sobe"];
		$lecturer_2_eastern_sobe = $_POST["selected_lecturer_2_eastern_sobe"];
		$lecturer_1_eastern_seass = $_POST["selected_lecturer_1_eastern_seass"];
		$lecturer_2_eastern_seass = $_POST["selected_lecturer_2_eastern_seass"];
		$lecturer_3_eastern_seass = $_POST["selected_lecturer_3_eastern_seass"];
		$lecturer_4_eastern_seass = $_POST["selected_lecturer_4_eastern_seass"];
		$lecturer_1_eastern_shs = $_POST["selected_lecturer_1_eastern_shs"];
		$lecturer_2_eastern_shs = $_POST["selected_lecturer_2_eastern_shs"];
		$lecturer_1_eastern_sst = $_POST["selected_lecturer_1_eastern_sst"];
		$lecturer_2_eastern_sst = $_POST["selected_lecturer_2_eastern_sst"];
		$lecturer_3_eastern_sst = $_POST["selected_lecturer_3_eastern_sst"];
		$lecturer_4_eastern_sst = $_POST["selected_lecturer_4_eastern_sst"];
		$lecturer_1_western_sasnr = $_POST["selected_lecturer_1_western_sasnr"];
		$lecturer_2_western_sasnr = $_POST["selected_lecturer_2_western_sasnr"];
		$lecturer_1_western_sobe = $_POST["selected_lecturer_1_western_sobe"];
		$lecturer_2_western_sobe = $_POST["selected_lecturer_2_western_sobe"];
		$lecturer_1_western_seass = $_POST["selected_lecturer_1_western_seass"];
		$lecturer_2_western_seass = $_POST["selected_lecturer_2_western_seass"];
		$lecturer_3_western_seass = $_POST["selected_lecturer_3_western_seass"];
		$lecturer_4_western_seass = $_POST["selected_lecturer_4_western_seass"];
		$lecturer_1_western_shs = $_POST["selected_lecturer_1_western_shs"];
		$lecturer_2_western_shs = $_POST["selected_lecturer_2_western_shs"];
		$lecturer_1_western_sst = $_POST["selected_lecturer_1_western_sst"];
		$lecturer_2_western_sst = $_POST["selected_lecturer_2_western_sst"];
		$lecturer_3_western_sst = $_POST["selected_lecturer_3_western_sst"];
		$lecturer_4_western_sst = $_POST["selected_lecturer_4_western_sst"];

		$lecturer_1_nyanza_sasnr = $_POST["selected_lecturer_1_nyanza_sasnr"];
		$lecturer_2_nyanza_sasnr = $_POST["selected_lecturer_2_nyanza_sasnr"];
		$lecturer_1_nyanza_sobe = $_POST["selected_lecturer_1_nyanza_sobe"];
		$lecturer_2_nyanza_sobe = $_POST["selected_lecturer_2_nyanza_sobe"];
		$lecturer_1_nyanza_seass = $_POST["selected_lecturer_1_nyanza_seass"];
		$lecturer_2_nyanza_seass = $_POST["selected_lecturer_2_nyanza_seass"];
		$lecturer_3_nyanza_seass = $_POST["selected_lecturer_3_nyanza_seass"];
		$lecturer_4_nyanza_seass = $_POST["selected_lecturer_4_nyanza_seass"];
		$lecturer_1_nyanza_shs = $_POST["selected_lecturer_1_nyanza_shs"];
		$lecturer_2_nyanza_shs = $_POST["selected_lecturer_2_nyanza_shs"];
		$lecturer_1_nyanza_sst = $_POST["selected_lecturer_1_nyanza_sst"];
		$lecturer_2_nyanza_sst = $_POST["selected_lecturer_2_nyanza_sst"];
		$lecturer_3_nyanza_sst = $_POST["selected_lecturer_3_nyanza_sst"];
		$lecturer_4_nyanza_sst = $_POST["selected_lecturer_4_nyanza_sst"];

		$lecturer_1_north_east_sasnr = $_POST["selected_lecturer_1_north_east_sasnr"];
		$lecturer_2_north_east_sasnr = $_POST["selected_lecturer_2_north_east_sasnr"];
		$lecturer_1_north_east_sobe = $_POST["selected_lecturer_1_north_east_sobe"];
		$lecturer_2_north_east_sobe = $_POST["selected_lecturer_2_north_east_sobe"];
		$lecturer_1_north_east_seass = $_POST["selected_lecturer_1_north_east_seass"];
		$lecturer_2_north_east_seass = $_POST["selected_lecturer_2_north_east_seass"];
		$lecturer_3_north_east_seass = $_POST["selected_lecturer_3_north_east_seass"];
		$lecturer_4_north_east_seass = $_POST["selected_lecturer_4_north_east_seass"];
		$lecturer_1_north_east_shs = $_POST["selected_lecturer_1_north_east_shs"];
		$lecturer_2_north_east_shs = $_POST["selected_lecturer_2_north_east_shs"];
		$lecturer_1_north_east_sst = $_POST["selected_lecturer_1_north_east_sst"];
		$lecturer_2_north_east_sst = $_POST["selected_lecturer_2_north_east_sst"];
		$lecturer_3_north_east_sst = $_POST["selected_lecturer_3_north_east_sst"];
		$lecturer_4_north_east_sst = $_POST["selected_lecturer_4_north_east_sst"];

		$lecturer_1_coastal_sasnr = $_POST["selected_lecturer_1_coastal_sasnr"];
		$lecturer_2_coastal_sasnr = $_POST["selected_lecturer_2_coastal_sasnr"];
		$lecturer_1_coastal_sobe = $_POST["selected_lecturer_1_coastal_sobe"];
		$lecturer_2_coastal_sobe = $_POST["selected_lecturer_2_coastal_sobe"];
		$lecturer_1_coastal_seass = $_POST["selected_lecturer_1_coastal_seass"];
		$lecturer_2_coastal_seass = $_POST["selected_lecturer_2_coastal_seass"];
		$lecturer_3_coastal_seass = $_POST["selected_lecturer_3_coastal_seass"];
		$lecturer_4_coastal_seass = $_POST["selected_lecturer_4_coastal_seass"];
		$lecturer_1_coastal_shs = $_POST["selected_lecturer_1_coastal_shs"];
		$lecturer_2_coastal_shs = $_POST["selected_lecturer_2_coastal_shs"];
		$lecturer_1_coastal_sst = $_POST["selected_lecturer_1_coastal_sst"];
		$lecturer_2_coastal_sst = $_POST["selected_lecturer_2_coastal_sst"];
		$lecturer_3_coastal_sst = $_POST["selected_lecturer_3_coastal_sst"];
		$lecturer_4_coastal_sst = $_POST["selected_lecturer_4_coastal_sst"];

		$lecturer_1_nairobi_sasnr = $_POST["selected_lecturer_1_nairobi_sasnr"];
		$lecturer_2_nairobi_sasnr = $_POST["selected_lecturer_2_nairobi_sasnr"];
		$lecturer_1_nairobi_sobe = $_POST["selected_lecturer_1_nairobi_sobe"];
		$lecturer_2_nairobi_sobe = $_POST["selected_lecturer_2_nairobi_sobe"];
		$lecturer_1_nairobi_seass = $_POST["selected_lecturer_1_nairobi_seass"];
		$lecturer_2_nairobi_seass = $_POST["selected_lecturer_2_nairobi_seass"];
		$lecturer_3_nairobi_seass = $_POST["selected_lecturer_3_nairobi_seass"];
		$lecturer_4_nairobi_seass = $_POST["selected_lecturer_4_nairobi_seass"];
		$lecturer_1_nairobi_shs = $_POST["selected_lecturer_1_nairobi_shs"];
		$lecturer_2_nairobi_shs = $_POST["selected_lecturer_2_nairobi_shs"];
		$lecturer_1_nairobi_sst = $_POST["selected_lecturer_1_nairobi_sst"];
		$lecturer_2_nairobi_sst = $_POST["selected_lecturer_2_nairobi_sst"];
		$lecturer_3_nairobi_sst = $_POST["selected_lecturer_3_nairobi_sst"];
		$lecturer_4_nairobi_sst = $_POST["selected_lecturer_4_nairobi_sst"];


		
		$check_database_table_for_assignment = "SELECT * FROM assigned_lecturers WHERE id='1' LIMIT 1";
		$execute_check_database = mysqli_query($conn,$check_database_table_for_assignment);
		$get_check_database_details = mysqli_num_rows($execute_check_database);
		
		if($get_check_database_details == 1){
			
			
		$mysql_update_rift_valley_query = "UPDATE `assigned_lecturers` SET `1st_supervisor_sasnr` = '$lecturer_1_rift_valley_sasnr', `2nd_supervisor_sasnr` = '$lecturer_2_rift_valley_sasnr',
		`1st_supervisor_sobe` = '$lecturer_1_rift_valley_sobe', `2nd_supervisor_sobe` = '$lecturer_2_rift_valley_sobe', 
		`1st_supervisor_seass` = '$lecturer_1_rift_valley_seass', `2nd_supervisor_seass` = '$lecturer_2_rift_valley_seass', `3rd_supervisor_seass` = '$lecturer_3_rift_valley_seass', `4th_supervisor_seass` = '$lecturer_4_rift_valley_seass', 
		`1st_supervisor_shs` = '$lecturer_1_rift_valley_shs', `2nd_supervisor_shs` = '$lecturer_2_rift_valley_shs', 
		`1st_supervisor_sst` = '$lecturer_1_rift_valley_sst', `2nd_supervisor_sst` = '$lecturer_2_rift_valley_sst' `3rd_supervisor_sst` = '$lecturer_3_rift_valley_sst' 
		`4th_supervisor_sst` = '$lecturer_4_rift_valley_sst' 
		 WHERE `regions` = 'Rift Valley Region'"; 			
		
		$execute_update_for_rift_valley_query = mysqli_query($conn,$mysql_update_rift_valley_query);
			
			//
		
		
		$mysql_update_central_query = "UPDATE `assigned_lecturers` SET `1st_supervisor_sasnr` = '$lecturer_1_central_sasnr', `2nd_supervisor_sasnr` = '$lecturer_2_central_sasnr', 
		`1st_supervisor_sobe` = '$lecturer_1_central_sobe', `2nd_supervisor_sobe` = '$lecturer_2_central_sobe', 
		`1st_supervisor_seass` = '$lecturer_1_central_seass', `2nd_supervisor_seass` = '$lecturer_2_central_seass', `3rd_supervisor_seass` = '$lecturer_3_central_seass', `4th_supervisor_seass` = '$lecturer_4_central_seass', 
		`1st_supervisor_shs` = '$lecturer_1_central_shs', `2nd_supervisor_shs` = '$lecturer_2_central_shs', 
		`1st_supervisor_sst` = '$lecturer_1_central_sst', `2nd_supervisor_sst` = '$lecturer_2_central_sst' `3rd_supervisor_sst` = '$lecturer_3_central_sst' 
		`4th_supervisor_sst` = '$lecturer_4_central_sst' 
		WHERE `regions` = 'Central Region'"; 			
		
		$execute_update_for_central_query = mysqli_query($conn,$mysql_update_central_query);
			
			//
	
		$mysql_update_eastern_query = "UPDATE `assigned_lecturers` SET `1st_supervisor_sasnr` = '$lecturer_1_eastern_sasnr', `2nd_supervisor_sasnr` = '$lecturer_2_eastern_sasnr', 
		`1st_supervisor_sobe` = '$lecturer_1_eastern_sobe', `2nd_supervisor_sobe` = '$lecturer_2_eastern_sobe', 
		`1st_supervisor_seass` = '$lecturer_1_eastern_seass', `2nd_supervisor_seass` = '$lecturer_2_eastern_seass', `3rd_supervisor_seass` = '$lecturer_3_eastern_seass', `4th_supervisor_seass` = '$lecturer_4_eastern_seass', 
		`1st_supervisor_shs` = '$lecturer_1_eastern_shs', `2nd_supervisor_shs` = '$lecturer_2_eastern_shs', 
		`1st_supervisor_sst` = '$lecturer_1_eastern_sst', `2nd_supervisor_sst` = '$lecturer_2_eastern_sst' `3rd_supervisor_sst` = '$lecturer_3_eastern_sst' 
		`4th_supervisor_sst` = '$lecturer_4_eastern_sst' 
		WHERE `regions` = 'Eastern Region'"; 
		
		$execute_update_for_eastern_query = mysqli_query($conn,$mysql_update_eastern_query);
			
			//
		
		
		$mysql_update_western_query = "UPDATE `assigned_lecturers` SET `1st_supervisor_sasnr` = '$lecturer_1_western_sasnr', `2nd_supervisor_sasnr` = '$lecturer_2_western_sasnr', 
		`1st_supervisor_sobe` = '$lecturer_1_western_sobe', `2nd_supervisor_sobe` = '$lecturer_2_western_sobe', 
		`1st_supervisor_seass` = '$lecturer_1_western_seass', `2nd_supervisor_seass` = '$lecturer_2_western_seass', `3rd_supervisor_seass` = '$lecturer_3_western_seass', `4th_supervisor_seass` = '$lecturer_4_western_seass', 
		`1st_supervisor_shs` = '$lecturer_1_western_shs', `2nd_supervisor_shs` = '$lecturer_2_western_shs', 
		`1st_supervisor_sst` = '$lecturer_1_western_sst', `2nd_supervisor_sst` = '$lecturer_2_western_sst' `3rd_supervisor_sst` = '$lecturer_3_western_sst' 
		`4th_supervisor_sst` = '$lecturer_4_western_sst' 
		WHERE `regions` = 'Western Region'"; 
					
		$execute_update_for_western_query = mysqli_query($conn,$mysql_update_western_query);
			
			//
		
		
		$mysql_update_nyanza_query = "UPDATE `assigned_lecturers` SET `1st_supervisor_sasnr` = '$lecturer_1_nyanza_sasnr', `2nd_supervisor_sasnr` = '$lecturer_2_nyanza_sasnr', 
		`1st_supervisor_sobe` = '$lecturer_1_nyanza_sobe', `2nd_supervisor_sobe` = '$lecturer_2_nyanza_sobe', 
		`1st_supervisor_seass` = '$lecturer_1_nyanza_seass', `2nd_supervisor_seass` = '$lecturer_2_nyanza_seass', `3rd_supervisor_seass` = '$lecturer_3_nyanza_seass', `4th_supervisor_seass` = '$lecturer_4_nyanza_seass', 
		`1st_supervisor_shs` = '$lecturer_1_nyanza_shs', `2nd_supervisor_shs` = '$lecturer_2_nyanza_shs', 
		`1st_supervisor_sst` = '$lecturer_1_nyanza_sst', `2nd_supervisor_sst` = '$lecturer_2_nyanza_sst' `3rd_supervisor_sst` = '$lecturer_3_nyanza_sst' 
		`4th_supervisor_sst` = '$lecturer_4_nyanza_sst' 
		WHERE `regions` = 'Nyanza Region'"; 
					
		$execute_update_for_nyanza_query = mysqli_query($conn,$mysql_update_nyanza_query);
			
			//
		
		
		$mysql_update_north_east_query = "UPDATE `assigned_lecturers` SET `1st_supervisor_sasnr` = '$lecturer_1_north_east_sasnr', `2nd_supervisor_sasnr` = '$lecturer_2_north_east_sasnr', 
		`1st_supervisor_sobe` = '$lecturer_1_north_east_sobe', `2nd_supervisor_sobe` = '$lecturer_2_north_east_sobe', 
		`1st_supervisor_seass` = '$lecturer_1_north_east_seass', `2nd_supervisor_seass` = '$lecturer_2_north_east_seass', `3rd_supervisor_seass` = '$lecturer_3_north_east_seass', `4th_supervisor_seass` = '$lecturer_4_north_east_seass', 
		`1st_supervisor_shs` = '$lecturer_1_north_east_shs', `2nd_supervisor_shs` = '$lecturer_2_north_east_shs', 
		`1st_supervisor_sst` = '$lecturer_1_north_east_sst', `2nd_supervisor_sst` = '$lecturer_2_north_east_sst' `3rd_supervisor_sst` = '$lecturer_3_north_east_sst' 
		`4th_supervisor_sst` = '$lecturer_4_north_east_sst' 
		WHERE `regions` = 'North East Region'"; 
					
		$execute_update_for_north_east_query = mysqli_query($conn,$mysql_update_north_east_query);
			
			//
		
		
		$mysql_update_coastal_query = "UPDATE `assigned_lecturers` SET `1st_supervisor_sasnr` = '$lecturer_1_coastal_sasnr', `2nd_supervisor_sasnr` = '$lecturer_2_coastal_sasnr', 
		`1st_supervisor_sobe` = '$lecturer_1_coastal_sobe', `2nd_supervisor_sobe` = '$lecturer_2_coastal_sobe', 
		`1st_supervisor_seass` = '$lecturer_1_coastal_seass', `2nd_supervisor_seass` = '$lecturer_2_coastal_seass', `3rd_supervisor_seass` = '$lecturer_3_coastal_seass', `4th_supervisor_seass` = '$lecturer_4_coastal_seass', 
		`1st_supervisor_shs` = '$lecturer_1_coastal_shs', `2nd_supervisor_shs` = '$lecturer_2_coastal_shs', 
		`1st_supervisor_sst` = '$lecturer_1_coastal_sst', `2nd_supervisor_sst` = '$lecturer_2_coastal_sst' `3rd_supervisor_sst` = '$lecturer_3_coastal_sst' 
		`4th_supervisor_sst` = '$lecturer_4_coastal_sst' 
		WHERE `regions` = 'Coastal Region'"; 
					
		$execute_update_for_coastal_query = mysqli_query($conn,$mysql_update_coastal_query);
			
			//
		
		
		$mysql_update_nairobi_query = "UPDATE `assigned_lecturers` SET `1st_supervisor_sasnr` = '$lecturer_1_nairobi_sasnr', `2nd_supervisor_sasnr` = '$lecturer_2_nairobi_sasnr', 
		`1st_supervisor_sobe` = '$lecturer_1_nairobi_sobe', `2nd_supervisor_sobe` = '$lecturer_2_nairobi_sobe', 
		`1st_supervisor_seass` = '$lecturer_1_nairobi_seass', `2nd_supervisor_seass` = '$lecturer_2_nairobi_seass', `3rd_supervisor_seass` = '$lecturer_3_nairobi_seass', `4th_supervisor_seass` = '$lecturer_4_nairobi_seass', 
		`1st_supervisor_shs` = '$lecturer_1_nairobi_shs', `2nd_supervisor_shs` = '$lecturer_2_nairobi_shs', 
		`1st_supervisor_sst` = '$lecturer_1_nairobi_sst', `2nd_supervisor_sst` = '$lecturer_2_nairobi_sst' `3rd_supervisor_sst` = '$lecturer_3_nairobi_sst' 
		`4th_supervisor_sst` = '$lecturer_4_nairobi_sst' 
		WHERE `regions` = 'Nairobi Region'"; 
					
		$execute_update_for_nairobi_query = mysqli_query($conn,$mysql_update_nairobi_query);
			
			//
	
								
		}else{


		$mysql_insert_rift_valley_query = "INSERT INTO `assigned_lecturers` (`id`, `regions`, `1st_supervisor_sasnr`, `2nd_supervisor_sasnr`, 
		`1st_supervisor_sobe`, `2nd_supervisor_sobe`, 
		`1st_supervisor_seass`, `2nd_supervisor_seass`, `3rd_supervisor_seass`, `4th_supervisor_seass`, 
		`1st_supervisor_shs`, `2nd_supervisor_shs`, 
		`1st_supervisor_sst`, `2nd_supervisor_sst`, `3rd_supervisor_sst`, `4th_supervisor_sst`, 
		`date`) VALUES (NULL, 'Rift Valley Region', '$lecturer_1_rift_valley_sasnr', '$lecturer_2_rift_valley_sasnr', 
		'$lecturer_1_rift_valley_sobe', '$lecturer_2_rift_valley_sobe', 
		'$lecturer_1_rift_valley_seass', '$lecturer_2_rift_valley_seass', '$lecturer_3_rift_valley_seass', '$lecturer_4_rift_valley_seass', 
		'$lecturer_1_rift_valley_shs', '$lecturer_2_rift_valley_shs', 
		'$lecturer_1_rift_valley_sst', '$lecturer_2_rift_valley_sst', '$lecturer_3_rift_valley_sst', '$lecturer_4_rift_valley_sst', 
		CURRENT_TIMESTAMP)"; 			
		
		$execute_insert_for_rift_valley_query = mysqli_query($conn,$mysql_insert_rift_valley_query);
			
			//
		
		
		$mysql_insert_central_query = "INSERT INTO `assigned_lecturers` (`id`, `regions`, `1st_supervisor_sasnr`, `2nd_supervisor_sasnr`, 
		`1st_supervisor_sobe`, `2nd_supervisor_sobe`, 
		`1st_supervisor_seass`, `2nd_supervisor_seass`, `3rd_supervisor_seass`, `4th_supervisor_seass`, 
		`1st_supervisor_shs`, `2nd_supervisor_shs`, 
		`1st_supervisor_sst`, `2nd_supervisor_sst`, `3rd_supervisor_sst`, `4th_supervisor_sst`, 
		`date`) VALUES (NULL, 'Central Region', '$lecturer_1_central_sasnr', '$lecturer_2_central_sasnr', 
		'$lecturer_1_central_sobe', '$lecturer_2_central_sobe', 
		'$lecturer_1_central_seass', '$lecturer_2_central_seass', '$lecturer_3_central_seass', '$lecturer_4_central_seass', 
		'$lecturer_1_central_shs', '$lecturer_2_central_shs', 
		'$lecturer_1_central_sst', '$lecturer_2_central_sst', '$lecturer_3_central_sst', '$lecturer_4_central_sst', 
		CURRENT_TIMESTAMP)"; 			
		
		$execute_insert_for_central_query = mysqli_query($conn,$mysql_insert_central_query);
			
			//
		
		
		$mysql_insert_eastern_query = "INSERT INTO `assigned_lecturers` (`id`, `regions`, `1st_supervisor_sasnr`, `2nd_supervisor_sasnr`, 
		`1st_supervisor_sobe`, `2nd_supervisor_sobe`, 
		`1st_supervisor_seass`, `2nd_supervisor_seass`, `3rd_supervisor_seass`, `4th_supervisor_seass`, 
		`1st_supervisor_shs`, `2nd_supervisor_shs`, 
		`1st_supervisor_sst`, `2nd_supervisor_sst`, `3rd_supervisor_sst`, `4th_supervisor_sst`, 
		`date`) VALUES (NULL, 'Eastern Region', '$lecturer_1_eastern_sasnr', '$lecturer_2_eastern_sasnr', 
		'$lecturer_1_eastern_sobe', '$lecturer_2_eastern_sobe', 
		'$lecturer_1_eastern_seass', '$lecturer_2_eastern_seass', '$lecturer_3_eastern_seass', '$lecturer_4_eastern_seass', 
		'$lecturer_1_eastern_shs', '$lecturer_2_eastern_shs', 
		'$lecturer_1_eastern_sst', '$lecturer_2_eastern_sst', '$lecturer_3_eastern_sst', '$lecturer_4_eastern_sst', 
		CURRENT_TIMESTAMP)"; 
		
		$execute_insert_for_eastern_query = mysqli_query($conn,$mysql_insert_eastern_query);
			
			//
		
		
		$mysql_insert_western_query = "INSERT INTO `assigned_lecturers` (`id`, `regions`, `1st_supervisor_sasnr`, `2nd_supervisor_sasnr`, 
		`1st_supervisor_sobe`, `2nd_supervisor_sobe`, 
		`1st_supervisor_seass`, `2nd_supervisor_seass`, `3rd_supervisor_seass`, `4th_supervisor_seass`, 
		`1st_supervisor_shs`, `2nd_supervisor_shs`, 
		`1st_supervisor_sst`, `2nd_supervisor_sst`, `3rd_supervisor_sst`, `4th_supervisor_sst`, 
		`date`) VALUES (NULL, 'Western Region', '$lecturer_1_western_sasnr', '$lecturer_2_western_sasnr', 
		'$lecturer_1_western_sobe', '$lecturer_2_western_sobe', 
		'$lecturer_1_western_seass', '$lecturer_2_western_seass', '$lecturer_3_western_seass', '$lecturer_4_western_seass', 
		'$lecturer_1_western_shs', '$lecturer_2_western_shs', 
		'$lecturer_1_western_sst', '$lecturer_2_western_sst', '$lecturer_3_western_sst', '$lecturer_4_western_sst', 
		CURRENT_TIMESTAMP)"; 
					
		$execute_insert_for_western_query = mysqli_query($conn,$mysql_insert_western_query);
			
			//
		
		
		$mysql_insert_nyanza_query = "INSERT INTO `assigned_lecturers` (`id`, `regions`, `1st_supervisor_sasnr`, `2nd_supervisor_sasnr`, 
		`1st_supervisor_sobe`, `2nd_supervisor_sobe`, 
		`1st_supervisor_seass`, `2nd_supervisor_seass`, `3rd_supervisor_seass`, `4th_supervisor_seass`, 
		`1st_supervisor_shs`, `2nd_supervisor_shs`, 
		`1st_supervisor_sst`, `2nd_supervisor_sst`, `3rd_supervisor_sst`, `4th_supervisor_sst`, 
		`date`) VALUES (NULL, 'Nyanza Region', '$lecturer_1_nyanza_sasnr', '$lecturer_2_nyanza_sasnr', 
		'$lecturer_1_nyanza_sobe', '$lecturer_2_nyanza_sobe', 
		'$lecturer_1_nyanza_seass', '$lecturer_2_nyanza_seass', '$lecturer_3_nyanza_seass', '$lecturer_4_nyanza_seass', 
		'$lecturer_1_nyanza_shs', '$lecturer_2_nyanza_shs', 
		'$lecturer_1_nyanza_sst', '$lecturer_2_nyanza_sst', '$lecturer_3_nyanza_sst', '$lecturer_4_nyanza_sst', 
		CURRENT_TIMESTAMP)"; 
					
		$execute_insert_for_nyanza_query = mysqli_query($conn,$mysql_insert_nyanza_query);
			
			//
		
		
		$mysql_insert_north_east_query = "INSERT INTO `assigned_lecturers` (`id`, `regions`, `1st_supervisor_sasnr`, `2nd_supervisor_sasnr`, 
		`1st_supervisor_sobe`, `2nd_supervisor_sobe`, 
		`1st_supervisor_seass`, `2nd_supervisor_seass`, `3rd_supervisor_seass`, `4th_supervisor_seass`, 
		`1st_supervisor_shs`, `2nd_supervisor_shs`, 
		`1st_supervisor_sst`, `2nd_supervisor_sst`, `3rd_supervisor_sst`, `4th_supervisor_sst`, 
		`date`) VALUES (NULL, 'North East Region', '$lecturer_1_north_east_sasnr', '$lecturer_2_north_east_sasnr', 
		'$lecturer_1_north_east_sobe', '$lecturer_2_north_east_sobe', 
		'$lecturer_1_north_east_seass', '$lecturer_2_north_east_seass', '$lecturer_3_north_east_seass', '$lecturer_4_north_east_seass', 
		'$lecturer_1_north_east_shs', '$lecturer_2_north_east_shs', 
		'$lecturer_1_north_east_sst', '$lecturer_2_north_east_sst', '$lecturer_3_north_east_sst', '$lecturer_4_north_east_sst', 
		CURRENT_TIMESTAMP)"; 
					
		$execute_insert_for_north_east_query = mysqli_query($conn,$mysql_insert_north_east_query);
			
			//
		
		
		$mysql_insert_coastal_query = "INSERT INTO `assigned_lecturers` (`id`, `regions`, `1st_supervisor_sasnr`, `2nd_supervisor_sasnr`, 
		`1st_supervisor_sobe`, `2nd_supervisor_sobe`, 
		`1st_supervisor_seass`, `2nd_supervisor_seass`, `3rd_supervisor_seass`, `4th_supervisor_seass`, 
		`1st_supervisor_shs`, `2nd_supervisor_shs`, 
		`1st_supervisor_sst`, `2nd_supervisor_sst`, `3rd_supervisor_sst`, `4th_supervisor_sst`, 
		`date`) VALUES (NULL, 'Coastal Region', '$lecturer_1_coastal_sasnr', '$lecturer_2_coastal_sasnr',
		 '$lecturer_1_coastal_sobe', '$lecturer_2_coastal_sobe', 
		 '$lecturer_1_coastal_seass', '$lecturer_2_coastal_seass', '$lecturer_3_coastal_seass', '$lecturer_4_coastal_seass', 
		 '$lecturer_1_coastal_shs', '$lecturer_2_coastal_shs', 
		 '$lecturer_1_coastal_sst', '$lecturer_2_coastal_sst', '$lecturer_3_coastal_sst', '$lecturer_4_coastal_sst', 
		 CURRENT_TIMESTAMP)"; 
					
		$execute_insert_for_coastal_query = mysqli_query($conn,$mysql_insert_coastal_query);
			
			//
		
		
		$mysql_insert_nairobi_query = "INSERT INTO `assigned_lecturers` (`id`, `regions`, `1st_supervisor_sasnr`, `2nd_supervisor_sasnr`, 
		`1st_supervisor_sobe`, `2nd_supervisor_sobe`, 
		`1st_supervisor_seass`, `2nd_supervisor_seass`, `3rd_supervisor_seass`, `4th_supervisor_seass`, 
		`1st_supervisor_shs`, `2nd_supervisor_shs`, 
		`1st_supervisor_sst`, `2nd_supervisor_sst`, `3rd_supervisor_sst`, `4th_supervisor_sst`, 
		`date`) VALUES (NULL, 'Nairobi Region', '$lecturer_1_nairobi_sasnr', '$lecturer_2_nairobi_sasnr', 
		'$lecturer_1_nairobi_sobe', '$lecturer_2_nairobi_sobe', 
		'$lecturer_1_nairobi_seass', '$lecturer_2_nairobi_seass', '$lecturer_3_nairobi_seass', '$lecturer_4_nairobi_seass', 
		'$lecturer_1_nairobi_shs', '$lecturer_2_nairobi_shs', 
		'$lecturer_1_nairobi_sst', '$lecturer_2_nairobi_sst', '$lecturer_3_nairobi_sst', '$lecturer_4_nairobi_sst', 
		CURRENT_TIMESTAMP)"; 
					
		$execute_insert_for_nairobi_query = mysqli_query($conn,$mysql_insert_nairobi_query);
			
			//
							
		}
		

		
		$assign_students_lecturers_rift_valley_sasnr = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_1_rift_valley_sasnr' WHERE school='SASNR' AND student_department='Agricultural Biosystems and Economics' AND attachment_region='Rift Valley Region'";
			
		$execute_assign_students_lecturers_rift_valley_sasnr = mysqli_query($conn,$assign_students_lecturers_rift_valley_sasnr);
			
			//
		$assign_students_lecturers_rift_valley_sasnr = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_rift_valley_sasnr' WHERE school='SASNR' AND student_department='Horticulture' AND attachment_region='Rift Valley Region'";
		
		$execute_assign_students_lecturers_rift_valley_sasnr = mysqli_query($conn,$assign_students_lecturers_rift_valley_sasnr);
			
			//

	
			
		// 	// RV SOBE			
			
		$assign_students_lecturers_rift_valley_sobe = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_1_rift_valley_sobe' WHERE school='SOBE' AND student_department='Finance & Economics' AND attachment_region='Rift Valley Region'";
			
		$execute_assign_students_lecturers_rift_valley_sobe = mysqli_query($conn,$assign_students_lecturers_rift_valley_sobe);
			
			//
		$assign_students_lecturers_rift_valley_sobe = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_rift_valley_sobe' WHERE school='SOBE' AND student_department='Marketing, Human Resource, Tourism and Hospitality' AND attachment_region='Rift Valley Region'";
		
		$execute_assign_students_lecturers_rift_valley_sobe = mysqli_query($conn,$assign_students_lecturers_rift_valley_sobe);
			
			//
		
			
			//RV SEASS
			
		$assign_students_lecturers_rift_valley_seass = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_1_rift_valley_seass' WHERE school='SEASS' AND student_department='Education Administration, Planning and Management' AND attachment_region='Rift Valley Region'";
			
		$execute_assign_students_lecturers_rift_valley_seass = mysqli_query($conn,$assign_students_lecturers_rift_valley_seass);
			
			//
		$assign_students_lecturers_rift_valley_seass = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_rift_valley_seass' WHERE school='SEASS' AND student_department='Education Administration, Psychology and Foundation' AND attachment_region='Rift Valley Region'";
		
		$execute_assign_students_lecturers_rift_valley_seass = mysqli_query($conn,$assign_students_lecturers_rift_valley_seass);
			
			//
		$assign_students_lecturers_rift_valley_seass = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_3_rift_valley_seass' WHERE school='SEASS' AND student_department='Humanities' AND attachment_region='Rift Valley Region'";
		
		$execute_assign_students_lecturers_rift_valley_seass = mysqli_query($conn,$assign_students_lecturers_rift_valley_seass);
			
			//
		$assign_students_lecturers_rift_valley_seass = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_4_rift_valley_seass' WHERE school='SEASS' AND student_department='CIEM' AND attachment_region='Rift Valley Region'";
	
		$execute_assign_students_lecturers_rift_valley_seass = mysqli_query($conn,$assign_students_lecturers_rift_valley_seass);
			
			//RV SHS
			
		$assign_students_lecturers_rift_valley_shs = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_1_rift_valley_shs' WHERE school='SHS' AND student_department='Nursing' AND attachment_region='Rift Valley Region'";
			
		$execute_assign_students_lecturers_rift_valley_shs = mysqli_query($conn,$assign_students_lecturers_rift_valley_shs);
			
			//
		$assign_students_lecturers_rift_valley_shs = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_rift_valley_shs' WHERE school='SHS' AND student_department='Clinical Medicine' AND attachment_region='Rift Valley Region'";
		
		$execute_assign_students_lecturers_rift_valley_shs = mysqli_query($conn,$assign_students_lecturers_rift_valley_shs);
			
			//RV SST
			
		$assign_students_lecturers_rift_valley_sst = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_1_rift_valley_sst' WHERE school='SST' AND student_department='Computing Information Systems & Knowledge Management' AND attachment_region='Rift Valley Region'";
			
		$execute_assign_students_lecturers_rift_valley_sst = mysqli_query($conn,$assign_students_lecturers_rift_valley_sst);
			
			//
		$assign_students_lecturers_rift_valley_sst = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_rift_valley_sst' WHERE school='SST' AND student_department='Mathematics and Statistics' AND attachment_region='Rift Valley Region'";
		
		$execute_assign_students_lecturers_rift_valley_sst = mysqli_query($conn,$assign_students_lecturers_rift_valley_sst);
			
			//
		$assign_students_lecturers_rift_valley_sst = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_3_rift_valley_sst' WHERE school='SST' AND student_department='Physical Sciences' AND attachment_region='Rift Valley Region'";
	
		$execute_assign_students_lecturers_rift_valley_sst = mysqli_query($conn,$assign_students_lecturers_rift_valley_sst);
			
			//
		$assign_students_lecturers_rift_valley_sst = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_4_rift_valley_sst' WHERE school='SST' AND student_department='Biological Sciences' AND attachment_region='Rift Valley Region'";

		$execute_assign_students_lecturers_rift_valley_sst = mysqli_query($conn,$assign_students_lecturers_rift_valley_sst);
			
			//CENTRAL SASNR
			
		$assign_students_lecturers_central_sasnr = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_1_central_sasnr' WHERE school='SASNR' AND attachment_region='Central Region'";
			
		$execute_assign_students_lecturers_central_sasnr = mysqli_query($conn,$assign_students_lecturers_central_sasnr);
			
			//
		$assign_students_lecturers_central_sasnr = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_central_sasnr' WHERE school='SASNR' AND student_department='Horticulture' AND student_department='Agricultural Biosystems and Economics' AND attachment_region='Central Region'";
		
		$execute_assign_students_lecturers_central_sasnr = mysqli_query($conn,$assign_students_lecturers_central_sasnr);
			
			// CENTRAL SOBE
			
		$assign_students_lecturers_central_sobe = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_1_central_sobe' WHERE school='SOBE' AND student_department='Finance & Economics' AND attachment_region='Central Region'";
			
		$execute_assign_students_lecturers_central_sobe = mysqli_query($conn,$assign_students_lecturers_central_sobe);
			
			//
		$assign_students_lecturers_central_sobe = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_central_sobe' WHERE school='SOBE' AND student_department='Marketing, Human Resource, Tourism and Hospitality' AND attachment_region='Central Region'";
		
		$execute_assign_students_lecturers_central_sobe = mysqli_query($conn,$assign_students_lecturers_central_sobe);
			
			
			// CENTRAL SEASS
			
		$assign_students_lecturers_central_seass = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_1_central_seass' WHERE school='SEASS' AND student_department='Education Administration, Planning and Management' AND attachment_region='Central Region'";
			
		$execute_assign_students_lecturers_central_seass = mysqli_query($conn,$assign_students_lecturers_central_seass);
			
			//
		$assign_students_lecturers_central_seass = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_central_seass' WHERE school='SEASS' AND student_department='Education Administration, Psychology and Foundation' AND attachment_region='Central Region'";
		
		$execute_assign_students_lecturers_central_seass = mysqli_query($conn,$assign_students_lecturers_central_seass);
			
			//
		$assign_students_lecturers_central_seass = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_3_central_seass' WHERE school='SEASS' AND student_department='Humanities' AND attachment_region='Central Region'";
		
		$execute_assign_students_lecturers_central_seass = mysqli_query($conn,$assign_students_lecturers_central_seass);
			
			//
		$assign_students_lecturers_central_seass = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_4_central_seass' WHERE school='SEASS' AND student_department='CIEM' AND attachment_region='Central Region'";
	
		$execute_assign_students_lecturers_central_seass = mysqli_query($conn,$assign_students_lecturers_central_seass);
			
			// CENTRAL SHS
			
		$assign_students_lecturers_central_shs = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_1_central_shs' WHERE school='SHS' AND student_department='Clinical Medicine' AND student_department='Nursing' AND attachment_region='Central Region'";
			
		$execute_assign_students_lecturers_central_shs = mysqli_query($conn,$assign_students_lecturers_central_shs);
			
			//
		$assign_students_lecturers_central_shs = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_central_shs' WHERE school='SHS' AND attachment_region='Central Region'";
		
		$execute_assign_students_lecturers_central_shs = mysqli_query($conn,$assign_students_lecturers_central_shs);
			
			// CENTRAL SST
			
		$assign_students_lecturers_central_sst = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_1_central_sst' WHERE school='SST' AND student_department='Computing Information Systems & Knowledge Management' AND attachment_region='Central Region'";
			
		$execute_assign_students_lecturers_central_sst = mysqli_query($conn,$assign_students_lecturers_central_sst);		
		
		// 
		$assign_students_lecturers_central_sst = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_central_sst' WHERE school='SST' AND student_department='Mathematics and Statistics' AND attachment_region='Central Region'";
			
		$execute_assign_students_lecturers_central_sst = mysqli_query($conn,$assign_students_lecturers_central_sst);		
		
		//
		$assign_students_lecturers_central_sst = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_3_central_sst' WHERE school='SST' AND student_department='Physical Sciences' AND attachment_region='Central Region'";
			
		$execute_assign_students_lecturers_central_sst = mysqli_query($conn,$assign_students_lecturers_central_sst);		
		
		//
		$assign_students_lecturers_central_sst = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_4_central_sst' WHERE school='SST' AND student_department='Biological Sciences' AND attachment_region='Central Region'";
			
		$execute_assign_students_lecturers_central_sst = mysqli_query($conn,$assign_students_lecturers_central_sst);		
		
		// EASTERN SASNR
		
		$assign_students_lecturers_eastern_sasnr = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_1_eastern_sasnr' WHERE school='SASNR' AND student_department='Agricultural Biosystems and Economics' AND attachment_region='Eastern Region'";
			
		$execute_assign_students_lecturers_eastern_sasnr = mysqli_query($conn,$assign_students_lecturers_eastern_sasnr);
			
		//
		$assign_students_lecturers_eastern_sasnr = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_eastern_sasnr' WHERE school='SASNR' AND student_department='Horticulture' AND attachment_region='Eastern Region'";
			
		$execute_assign_students_lecturers_eastern_sasnr = mysqli_query($conn,$assign_students_lecturers_eastern_sasnr);
			
		// EASTERN SOBE
			
		$assign_students_lecturers_eastern_sobe = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_1_eastern_sobe' WHERE school='SOBE' AND student_department='Finance & Economics' AND attachment_region='Eastern Region'";
			
		$execute_assign_students_lecturers_eastern_sobe = mysqli_query($conn,$assign_students_lecturers_eastern_sobe);
			
		//
		$assign_students_lecturers_eastern_sobe = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_eastern_sobe' WHERE school='SOBE' AND student_department='Marketing, Human Resource, Tourism and Hospitality' AND attachment_region='Eastern Region'";
			
		$execute_assign_students_lecturers_eastern_sobe = mysqli_query($conn,$assign_students_lecturers_eastern_sobe);
			
		// EASTERN SEASS
			
		$assign_students_lecturers_eastern_seass = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_1_eastern_seass' WHERE school='SEASS' AND student_department='Education Administration, Planning and Management' AND attachment_region='Eastern Region'";
			
		$execute_assign_students_lecturers_eastern_seass = mysqli_query($conn,$assign_students_lecturers_eastern_seass);
			
		//
		$assign_students_lecturers_eastern_seass = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_eastern_seass' WHERE school='SEASS' AND student_department='Education Administration, Psychology and Foundation' AND attachment_region='Eastern Region'";
			
		$execute_assign_students_lecturers_eastern_seass = mysqli_query($conn,$assign_students_lecturers_eastern_seass);
			
		//
		$assign_students_lecturers_eastern_seass = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_3_eastern_seass' WHERE school='SEASS' AND student_department='Humanities' AND attachment_region='Eastern Region'";
			
		$execute_assign_students_lecturers_eastern_seass = mysqli_query($conn,$assign_students_lecturers_eastern_seass);
			
		//
		$assign_students_lecturers_eastern_seass = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_4_eastern_seass' WHERE school='SEASS' AND student_department='CIEM' AND attachment_region='Eastern Region'";
			
		$execute_assign_students_lecturers_eastern_seass = mysqli_query($conn,$assign_students_lecturers_eastern_seass);
			
		//EASTERN SHS
			
		$assign_students_lecturers_eastern_shs = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_1_eastern_shs' WHERE school='SHS' AND student_department='Nursing' AND attachment_region='Eastern Region'";
			
		$execute_assign_students_lecturers_eastern_shs = mysqli_query($conn,$assign_students_lecturers_eastern_shs);
			
		//
		$assign_students_lecturers_eastern_shs = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_eastern_shs' WHERE school='SHS' AND student_department='Clinical Medicine' AND attachment_region='Eastern Region'";
			
		$execute_assign_students_lecturers_eastern_shs = mysqli_query($conn,$assign_students_lecturers_eastern_shs);
			
		// EASTERN SST
			
		$assign_students_lecturers_eastern_sst = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_1_eastern_sst' WHERE school='SST' AND student_department='Computing Information Systems & Knowledge Management' AND attachment_region='Eastern Region'";
			
		$execute_assign_students_lecturers_eastern_sst = mysqli_query($conn,$assign_students_lecturers_eastern_sst);
			
		//
		$assign_students_lecturers_eastern_sst = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_eastern_sst' WHERE school='SST' AND student_department='Mathematics and Statistics' AND attachment_region='Eastern Region'";
			
		$execute_assign_students_lecturers_eastern_sst = mysqli_query($conn,$assign_students_lecturers_eastern_sst);
			
		//
		$assign_students_lecturers_eastern_sst = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_3_eastern_sst' WHERE school='SST' AND student_department='Physical Sciences' AND attachment_region='Eastern Region'";
			
		$execute_assign_students_lecturers_eastern_sst = mysqli_query($conn,$assign_students_lecturers_eastern_sst);
			
		//
		$assign_students_lecturers_eastern_sst = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_4_eastern_sst' WHERE school='SST' AND student_department='Biological Sciences' AND attachment_region='Eastern Region'";
			
		$execute_assign_students_lecturers_eastern_sst = mysqli_query($conn,$assign_students_lecturers_eastern_sst);
			
		// WESTERN SASNR
			
		$assign_students_lecturers_western_sasnr = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_1_western_sasnr' WHERE school='SASNR' AND student_department='Agricultural Biosystems and Economics' AND attachment_region='Western Region'";
			
		$execute_assign_students_lecturers_western_sasnr = mysqli_query($conn,$assign_students_lecturers_western_sasnr);
			
		//
		$assign_students_lecturers_western_sasnr = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_western_sasnr' WHERE school='SASNR' AND student_department='Horticulture' AND attachment_region='Western Region'";
			
		$execute_assign_students_lecturers_western_sasnr = mysqli_query($conn,$assign_students_lecturers_western_sasnr);
			
		// WESTERN SOBE
			
		$assign_students_lecturers_western_sobe = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_1_western_sobe' WHERE school='SOBE' AND student_department='Finance & Economics' AND attachment_region='Western Region'";
			
		$execute_assign_students_lecturers_western_sobe = mysqli_query($conn,$assign_students_lecturers_western_sobe);
			
		//
		$assign_students_lecturers_western_sobe = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_western_sobe' WHERE school='SOBE' AND student_department='Marketing, Human Resource, Tourism and Hospitality' AND attachment_region='Western Region'";
			
		$execute_assign_students_lecturers_western_sobe = mysqli_query($conn,$assign_students_lecturers_western_sobe);
			
		// WESTERN SEASS
			
		$assign_students_lecturers_western_seass = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_1_western_seass' WHERE school='SEASS' AND student_department='Education Administration, Planning and Management' AND attachment_region='Western Region'";
			
		$execute_assign_students_lecturers_western_seass = mysqli_query($conn,$assign_students_lecturers_western_seass);
			
		//
		$assign_students_lecturers_western_seass = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_western_seass' WHERE school='SEASS' AND student_department='Education Administration, Psychology and Foundation' AND attachment_region='Western Region'";
			
		$execute_assign_students_lecturers_western_seass = mysqli_query($conn,$assign_students_lecturers_western_seass);
			
		//
		$assign_students_lecturers_western_seass = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_3_western_seass' WHERE school='SEASS' AND student_department='Humanities' AND attachment_region='Western Region'";
			
		$execute_assign_students_lecturers_western_seass = mysqli_query($conn,$assign_students_lecturers_western_seass);
			
		//
		$assign_students_lecturers_western_seass = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_4_western_seass' WHERE school='SEASS' AND student_department='CIEM' AND attachment_region='Western Region'";
			
		$execute_assign_students_lecturers_western_seass = mysqli_query($conn,$assign_students_lecturers_western_seass);
			
		// WESTERN SHS
			
		$assign_students_lecturers_western_shs = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_1_western_shs' WHERE school='SHS' AND student_department='Nursing' AND attachment_region='Western Region'";
			
		$execute_assign_students_lecturers_western_shs = mysqli_query($conn,$assign_students_lecturers_western_shs);
			
		//
		$assign_students_lecturers_western_shs = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_western_shs' WHERE school='SHS' AND student_department='Clinical Medicine' AND attachment_region='Western Region'";
			
		$execute_assign_students_lecturers_western_shs = mysqli_query($conn,$assign_students_lecturers_western_shs);
			
		//WESTERN SST
			
		$assign_students_lecturers_western_sst = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_1_western_sst' WHERE school='SST' AND student_department='Computing Information Systems & Knowledge Management' AND attachment_region='Western Region'";
			
		$execute_assign_students_lecturers_western_sst = mysqli_query($conn,$assign_students_lecturers_western_sst);
			
		// 
		$assign_students_lecturers_western_sst = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_western_sst' WHERE school='SST' AND student_department='Mathematics and Statistics' AND attachment_region='Western Region'";
			
		$execute_assign_students_lecturers_western_sst = mysqli_query($conn,$assign_students_lecturers_western_sst);
			
		//
		$assign_students_lecturers_western_sst = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_3_western_sst' WHERE school='SST' AND student_department='Physical Sciences' AND attachment_region='Western Region'";
			
		$execute_assign_students_lecturers_western_sst = mysqli_query($conn,$assign_students_lecturers_western_sst);
			
		//
		$assign_students_lecturers_western_sst = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_4_western_sst' WHERE school='SST' AND student_department='Biological Sciences' AND attachment_region='Western Region'";
			
		$execute_assign_students_lecturers_western_sst = mysqli_query($conn,$assign_students_lecturers_western_sst);
			
		// NYANZA SASNR
			
		$assign_students_lecturers_nyanza_sasnr = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_1_nyanza_sasnr' WHERE school='SASNR' AND student_department='Agricultural Biosystems and Economics' AND attachment_region='Nyanza Region'";
			
		$execute_assign_students_lecturers_nyanza_sasnr = mysqli_query($conn,$assign_students_lecturers_nyanza_sasnr);
			
		//
		$assign_students_lecturers_nyanza_sasnr = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_nyanza_sasnr' WHERE school='SASNR' AND student_department='Horticulture' AND attachment_region='Nyanza Region'";
			
		$execute_assign_students_lecturers_nyanza_sasnr = mysqli_query($conn,$assign_students_lecturers_nyanza_sasnr);

			
		// NYANZA SOBE
			
		$assign_students_lecturers_nyanza_sobe = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_1_nyanza_sobe' WHERE school='SOBE' AND student_department='Finance & Economics' AND attachment_region='Nyanza Region'";
			
		$execute_assign_students_lecturers_nyanza_sobe = mysqli_query($conn,$assign_students_lecturers_nyanza_sobe);
			
		//
		$assign_students_lecturers_nyanza_sobe = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_nyanza_sobe' WHERE school='SOBE' AND student_department='Marketing, Human Resource, Tourism and Hospitality' AND attachment_region='Nyanza Region'";
			
		$execute_assign_students_lecturers_nyanza_sobe = mysqli_query($conn,$assign_students_lecturers_nyanza_sobe);
			
		// NYANZA SEASS
			
		$assign_students_lecturers_nyanza_seass = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_1_nyanza_seass' WHERE school='SEASS' AND student_department='Education Administration, Planning and Management' AND attachment_region='Nyanza Region'";
			
		$execute_assign_students_lecturers_nyanza_seass = mysqli_query($conn,$assign_students_lecturers_nyanza_seass);
			
		//
		$assign_students_lecturers_nyanza_seass = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_nyanza_seass' WHERE school='SEASS' AND student_department='Education Administration, Psychology and Foundation' AND attachment_region='Nyanza Region'";
			
		$execute_assign_students_lecturers_nyanza_seass = mysqli_query($conn,$assign_students_lecturers_nyanza_seass);
			
		//
		$assign_students_lecturers_nyanza_seass = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_3_nyanza_seass' WHERE school='SEASS' AND student_department='Humanities' AND attachment_region='Nyanza Region'";
			
		$execute_assign_students_lecturers_nyanza_seass = mysqli_query($conn,$assign_students_lecturers_nyanza_seass);
			
		//
		$assign_students_lecturers_nyanza_seass = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_4_nyanza_seass' WHERE school='SEASS' AND student_department='CIEM' AND attachment_region='Nyanza Region'";
			
		$execute_assign_students_lecturers_nyanza_seass = mysqli_query($conn,$assign_students_lecturers_nyanza_seass);
			
		// NYANZA SHS
			
		$assign_students_lecturers_nyanza_shs = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_1_nyanza_shs' WHERE school='SHS' AND student_department='Nursing' AND attachment_region='Nyanza Region'";
			
		$execute_assign_students_lecturers_nyanza_shs = mysqli_query($conn,$assign_students_lecturers_nyanza_shs);
			
		//
		$assign_students_lecturers_nyanza_shs = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_nyanza_shs' WHERE school='SHS' AND student_department='Clinical Medicine' AND attachment_region='Nyanza Region'";
			
		$execute_assign_students_lecturers_nyanza_shs = mysqli_query($conn,$assign_students_lecturers_nyanza_shs);
			
		// NYANZA SST
			
		$assign_students_lecturers_nyanza_sst = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_1_nyanza_sst' WHERE school='SST' AND student_department='Computing Information Systems & Knowledge Management' AND attachment_region='Nyanza Region'";
			
		$execute_assign_students_lecturers_nyanza_sst = mysqli_query($conn,$assign_students_lecturers_nyanza_sst);
			
		//
		$assign_students_lecturers_nyanza_sst = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_nyanza_sst' WHERE school='SST' AND student_department='Mathematics and Statistics' AND attachment_region='Nyanza Region'";
			
		$execute_assign_students_lecturers_nyanza_sst = mysqli_query($conn,$assign_students_lecturers_nyanza_sst);
			
		//
		$assign_students_lecturers_nyanza_sst = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_3_nyanza_sst' WHERE school='SST' AND student_department='Physical Sciences' AND attachment_region='Nyanza Region'";
			
		$execute_assign_students_lecturers_nyanza_sst = mysqli_query($conn,$assign_students_lecturers_nyanza_sst);
			
		//
		$assign_students_lecturers_nyanza_sst = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_4_nyanza_sst' WHERE school='SST' AND student_department='Biological Sciences' AND attachment_region='Nyanza Region'";
			
		$execute_assign_students_lecturers_nyanza_sst = mysqli_query($conn,$assign_students_lecturers_nyanza_sst);
			
		// NORTH-EAST SASNR
			
		$assign_students_lecturers_north_east_sasnr = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_1_north_east_sasnr' WHERE school='SASNR' AND student_department='Agricultural Biosystems and Economics' AND attachment_region='North East Region'";
			
		$execute_assign_students_lecturers_north_east_sasnr = mysqli_query($conn,$assign_students_lecturers_north_east_sasnr);
			
		//
		$assign_students_lecturers_north_east_sasnr = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_north_east_sasnr' WHERE school='SASNR' AND student_department='Horticulture' AND attachment_region='North East Region'";
			
		$execute_assign_students_lecturers_north_east_sasnr = mysqli_query($conn,$assign_students_lecturers_north_east_sasnr);
			
		// NORTH-EAST SOBE
			
		$assign_students_lecturers_north_east_sobe = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_1_north_east_sobe' WHERE school='SOBE' AND student_department='Finance & Economics' AND attachment_region='North East Region'";
			
		$execute_assign_students_lecturers_north_east_sobe = mysqli_query($conn,$assign_students_lecturers_north_east_sobe);
			
		//
		$assign_students_lecturers_north_east_sobe = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_north_east_sobe' WHERE school='SOBE' AND student_department='Marketing, Human Resource, Tourism and Hospitality' AND attachment_region='North East Region'";
			
		$execute_assign_students_lecturers_north_east_sobe = mysqli_query($conn,$assign_students_lecturers_north_east_sobe);
			
		// NORTH-EAST SEASS
			
		$assign_students_lecturers_north_east_seass = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_1_north_east_seass' WHERE school='SEASS' AND student_department='Education Administration, Planning and Management' AND attachment_region='North East Region'";
			
		$execute_assign_students_lecturers_north_east_seass = mysqli_query($conn,$assign_students_lecturers_north_east_seass);
			
		//
		$assign_students_lecturers_north_east_seass = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_north_east_seass' WHERE school='SEASS' AND student_department='Education Administration, Psychology and Foundation' AND attachment_region='North East Region'";
			
		$execute_assign_students_lecturers_north_east_seass = mysqli_query($conn,$assign_students_lecturers_north_east_seass);
			
		//
		$assign_students_lecturers_north_east_seass = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_3_north_east_seass' WHERE school='SEASS' AND student_department='Humanities' AND attachment_region='North East Region'";
			
		$execute_assign_students_lecturers_north_east_seass = mysqli_query($conn,$assign_students_lecturers_north_east_seass);
			
		//
		$assign_students_lecturers_north_east_seass = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_4_north_east_seass' WHERE school='SEASS' AND student_department='CIEM' AND attachment_region='North East Region'";
			
		$execute_assign_students_lecturers_north_east_seass = mysqli_query($conn,$assign_students_lecturers_north_east_seass);
			
		// NORTH-EAST SHS
			
		$assign_students_lecturers_north_east_shs = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_1_north_east_shs' WHERE school='SHS' AND student_department='Nursing' AND attachment_region='North East Region'";
			
		$execute_assign_students_lecturers_north_east_shs = mysqli_query($conn,$assign_students_lecturers_north_east_shs);
			
		//
		$assign_students_lecturers_north_east_shs = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_north_east_shs' WHERE school='SHS' AND student_department='Clinical Medicine' AND attachment_region='North East Region'";
			
		$execute_assign_students_lecturers_north_east_shs = mysqli_query($conn,$assign_students_lecturers_north_east_shs);
			
		// NORTH-EAST SST
			
		$assign_students_lecturers_north_east_sst = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_1_north_east_sst' WHERE school='SST' AND student_department='Computing Information Systems & Knowledge Management' AND attachment_region='North East Region'";
			
		$execute_assign_students_lecturers_north_east_sst = mysqli_query($conn,$assign_students_lecturers_north_east_sst);
			
		//
		$assign_students_lecturers_north_east_sst = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_north_east_sst' WHERE school='SST' AND student_department='Mathematics and Statistics' AND attachment_region='North East Region'";
			
		$execute_assign_students_lecturers_north_east_sst = mysqli_query($conn,$assign_students_lecturers_north_east_sst);
			
		//
		$assign_students_lecturers_north_east_sst = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_3_north_east_sst' WHERE school='SST' AND student_department='Physical Sciences' AND attachment_region='North East Region'";
			
		$execute_assign_students_lecturers_north_east_sst = mysqli_query($conn,$assign_students_lecturers_north_east_sst);
			
		//
		$assign_students_lecturers_north_east_sst = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_4_north_east_sst' WHERE school='SST' AND student_department='Biological Sciences' AND attachment_region='North East Region'";
			
		$execute_assign_students_lecturers_north_east_sst = mysqli_query($conn,$assign_students_lecturers_north_east_sst);
			
		// COASTAL SASNR
			
		$assign_students_lecturers_coastal_sasnr = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_1_coastal_sasnr' WHERE school='SASNR' AND student_department='Agricultural Biosystems and Economics' AND attachment_region='Coastal Region'";
			
		$execute_assign_students_lecturers_coastal_sasnr = mysqli_query($conn,$assign_students_lecturers_coastal_sasnr);
			
		//
		$assign_students_lecturers_coastal_sasnr = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_coastal_sasnr' WHERE school='SASNR' AND student_department='Horticulture' AND attachment_region='Coastal Region'";
			
		$execute_assign_students_lecturers_coastal_sasnr = mysqli_query($conn,$assign_students_lecturers_coastal_sasnr);
			
		// COASTAL SOBE
			
		$assign_students_lecturers_coastal_sobe = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_1_coastal_sobe' WHERE school='SOBE' AND student_department='Finance & Economics' AND attachment_region='Coastal Region'";
			
		$execute_assign_students_lecturers_coastal_sobe = mysqli_query($conn,$assign_students_lecturers_coastal_sobe);
			
		//
		$assign_students_lecturers_coastal_sobe = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_coastal_sobe' WHERE school='SOBE' AND student_department='Marketing, Human Resource, Tourism and Hospitality' AND attachment_region='Coastal Region'";
			
		$execute_assign_students_lecturers_coastal_sobe = mysqli_query($conn,$assign_students_lecturers_coastal_sobe);
			
		// COASTAL SEASS
			
		$assign_students_lecturers_coastal_seass = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_1_coastal_seass' WHERE school='SEASS' AND student_department='Education Administration, Planning and Management' AND attachment_region='Coastal Region'";
			
		$execute_assign_students_lecturers_coastal_seass = mysqli_query($conn,$assign_students_lecturers_coastal_seass);
			
		//
		$assign_students_lecturers_coastal_seass = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_coastal_seass' WHERE school='SEASS' AND student_department='Education Administration, Psychology and Foundation' AND attachment_region='Coastal Region'";
			
		$execute_assign_students_lecturers_coastal_seass = mysqli_query($conn,$assign_students_lecturers_coastal_seass);
			
		//
		$assign_students_lecturers_coastal_seass = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_3_coastal_seass' WHERE school='SEASS' AND student_department='Humanities' AND attachment_region='Coastal Region'";
			
		$execute_assign_students_lecturers_coastal_seass = mysqli_query($conn,$assign_students_lecturers_coastal_seass);
			
		//
		$assign_students_lecturers_coastal_seass = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_4_coastal_seass' WHERE school='SEASS' AND student_department='CIEM' AND attachment_region='Coastal Region'";
			
		$execute_assign_students_lecturers_coastal_seass = mysqli_query($conn,$assign_students_lecturers_coastal_seass);
			
		// COASTAL SHS
			
		$assign_students_lecturers_coastal_shs = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_1_coastal_shs' WHERE school='SHS' AND student_department='Nursing' AND attachment_region='Coastal Region'";
			
		$execute_assign_students_lecturers_coastal_shs = mysqli_query($conn,$assign_students_lecturers_coastal_shs);
			
		//
		$assign_students_lecturers_coastal_shs = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_coastal_shs' WHERE school='SHS' AND student_department='Clinical Medicine' AND attachment_region='Coastal Region'";
			
		$execute_assign_students_lecturers_coastal_shs = mysqli_query($conn,$assign_students_lecturers_coastal_shs);
			
		// COASTAL SST
			
		$assign_students_lecturers_coastal_sst = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_1_coastal_sst' WHERE school='SST' AND student_department='Computing Information Systems & Knowledge Management' AND attachment_region='Coastal Region'";
			
		$execute_assign_students_lecturers_coastal_sst = mysqli_query($conn,$assign_students_lecturers_coastal_sst);
			
		// 
		$assign_students_lecturers_coastal_sst = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_coastal_sst' WHERE school='SST' AND student_department='Mathematics and Statistics' AND attachment_region='Coastal Region'";
			
		$execute_assign_students_lecturers_coastal_sst = mysqli_query($conn,$assign_students_lecturers_coastal_sst);
			
		//
		$assign_students_lecturers_coastal_sst = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_3_coastal_sst' WHERE school='SST' AND student_department='Physical Sciences' AND attachment_region='Coastal Region'";
			
		$execute_assign_students_lecturers_coastal_sst = mysqli_query($conn,$assign_students_lecturers_coastal_sst);
			
		//
		$assign_students_lecturers_coastal_sst = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_4_coastal_sst' WHERE school='SST' AND student_department='Biological Sciences' AND attachment_region='Coastal Region'";
			
		$execute_assign_students_lecturers_coastal_sst = mysqli_query($conn,$assign_students_lecturers_coastal_sst);
			
		// NAIROBI SASNR
			
			
		$assign_students_lecturers_nairobi_sasnr = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_1_nairobi_sasnr' WHERE school='SASNR' AND student_department='Agricultural Biosystems and Economics' AND attachment_region='Nairobi Region'";
			
		$execute_assign_students_lecturers_nairobi_sasnr = mysqli_query($conn,$assign_students_lecturers_nairobi_sasnr);
			
		//
		$assign_students_lecturers_nairobi_sasnr = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_nairobi_sasnr' WHERE school='SASNR' AND student_department='Horticulture' AND attachment_region='Nairobi Region'";
			
		$execute_assign_students_lecturers_nairobi_sasnr = mysqli_query($conn,$assign_students_lecturers_nairobi_sasnr);
			
		// NAIROBI SOBE
			
		$assign_students_lecturers_nairobi_sobe = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_1_nairobi_sobe' WHERE school='SOBE' AND student_department='Finance & Economics' AND attachment_region='Nairobi Region'";
			
		$execute_assign_students_lecturers_nairobi_sobe = mysqli_query($conn,$assign_students_lecturers_nairobi_sobe);
			
		//
		$assign_students_lecturers_nairobi_sobe = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_nairobi_sobe' WHERE school='SOBE' AND student_department='Marketing, Human Resource, Tourism and Hospitality' AND attachment_region='Nairobi Region'";
			
		$execute_assign_students_lecturers_nairobi_sobe = mysqli_query($conn,$assign_students_lecturers_nairobi_sobe);
			
		// NAIROBI SEASS
			
		$assign_students_lecturers_nairobi_seass = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_1_nairobi_seass' WHERE school='SEASS' AND student_department='Education Administration, Planning and Management' AND attachment_region='Nairobi Region'";
			
		$execute_assign_students_lecturers_nairobi_seass = mysqli_query($conn,$assign_students_lecturers_nairobi_seass);
			
		//
		$assign_students_lecturers_nairobi_seass = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_nairobi_seass' WHERE school='SEASS' AND student_department='Education Administration, Psychology and Foundation' AND attachment_region='Nairobi Region'";
			
		$execute_assign_students_lecturers_nairobi_seass = mysqli_query($conn,$assign_students_lecturers_nairobi_seass);
			
		//
		$assign_students_lecturers_nairobi_seass = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_3_nairobi_seass' WHERE school='SEASS' AND student_department='Humanities' AND attachment_region='Nairobi Region'";
			
		$execute_assign_students_lecturers_nairobi_seass = mysqli_query($conn,$assign_students_lecturers_nairobi_seass);
			
		//
		$assign_students_lecturers_nairobi_seass = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_4_nairobi_seass' WHERE school='SEASS' AND student_department='CIEM' AND attachment_region='Nairobi Region'";
			
		$execute_assign_students_lecturers_nairobi_seass = mysqli_query($conn,$assign_students_lecturers_nairobi_seass);
			
		// NAIROBI SHS
			
		$assign_students_lecturers_nairobi_shs = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_1_nairobi_shs' WHERE school='SHS' AND student_department='Nursing' AND attachment_region='Nairobi Region'";
			
		$execute_assign_students_lecturers_nairobi_shs = mysqli_query($conn,$assign_students_lecturers_nairobi_shs);
			
		//
		$assign_students_lecturers_nairobi_shs = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_nairobi_shs' WHERE school='SHS' AND student_department='Clinical Medicine' AND attachment_region='Nairobi Region'";
			
		$execute_assign_students_lecturers_nairobi_shs = mysqli_query($conn,$assign_students_lecturers_nairobi_shs);
			
		// NAIROBI SST
			
		$assign_students_lecturers_nairobi_sst = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_1_nairobi_sst' WHERE school='SST' AND student_department='Computing Information Systems & Knowledge Management' AND attachment_region='Nairobi Region'";
			
		$execute_assign_students_lecturers_nairobi_sst = mysqli_query($conn,$assign_students_lecturers_nairobi_sst);

		//
		$assign_students_lecturers_nairobi_sst = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_2_nairobi_sst' WHERE school='SST' AND student_department='Mathematics and Statistics' AND attachment_region='Nairobi Region'";
			
		$execute_assign_students_lecturers_nairobi_sst = mysqli_query($conn,$assign_students_lecturers_nairobi_sst);

		//
		$assign_students_lecturers_nairobi_sst = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_3_nairobi_sst' WHERE school='SST' AND student_department='Physical Sciences' AND attachment_region='Nairobi Region'";
			
		$execute_assign_students_lecturers_nairobi_sst = mysqli_query($conn,$assign_students_lecturers_nairobi_sst);

		//
		$assign_students_lecturers_nairobi_sst = "UPDATE industrial_registration SET visiting_supervisor_name = '$lecturer_4_nairobi_sst' WHERE school='SST' AND student_department='Biological Sciences' AND attachment_region='Nairobi Region'";
			
		$execute_assign_students_lecturers_nairobi_sst = mysqli_query($conn,$assign_students_lecturers_nairobi_sst);

		//
		
	}
?>
</body>
</html>
