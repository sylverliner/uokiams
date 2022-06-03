<?php

  include '../database_connection/database_connection.php';

  $student_fname = $_COOKIE["student_first_name"];
  $student_lname = $_COOKIE["student_last_name"];
  $student_reg = $_COOKIE["student_reg_number"];

  $regions = array("Rift-Valley Region","Central Region","Eastern Region","Western Region",
  "Nyanza Region","North-East Region","Coastal Region","Nairobi");

  $departments =  array("-","Mathematics and Statistics","Computing Information Systems & Knowledge Management","Physical Sciences","Nursing","Clinical Medicine",
  "Biological Sciences","Humanities","Education Administration, Planning and Management","Education Administration, Psychology and Foundation",
  "CIEM","Finance & Economics","Marketing, Human Resource, Tourism and Hospitality","Agricultural Biosystems and Economics","Horticulture");


    $checking_user_industrial = "SELECT * FROM industrial_registration WHERE reg_number='$student_reg' AND first_name='$student_fname' AND last_name='$student_lname'";
    $checking_user_query = mysqli_query($conn,$checking_user_industrial);
    $check_existence = mysqli_num_rows($checking_user_query);
    if($check_existence==1){

      $get_user_info = mysqli_fetch_assoc($checking_user_query);

      $student_course = $get_user_info["course"];
      $student_level = $get_user_info["level"];
      $student_school = $get_user_info["school"];
      $student_department = $get_user_info["student_department"];
      $student_other_name = $get_user_info["other_name"];

      setcookie("student_department_holder",$student_department,time() + (86400 * 30));
      setcookie("student_school_holder",$student_school,time() + (86400 * 30));
      setcookie("student_level_holder",$student_level,time() + (86400 * 30));
      setcookie("student_course_holder",$student_course,time() + (86400 * 30));
      setcookie("student_other_name_holder",$student_other_name,time() + (86400 * 30));
      $status_number = 2;

    }else{
      header("Location:../Register_Page/register_page.php");
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
  <link rel="stylesheet" href="student_assumption.css"/>

  <script type="text/javascript" src="../js/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>

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
  <a class="menu_items_link" href="student_assumption.php"><li class="menu_items_list" style="background-color:orange;padding-left:16px">Submit Assupmtion</li></a>
  <a class="menu_items_link" href="../e-logbook/elogbook.php"><li class="menu_items_list">E-Logbook</li></a>
  <a class="menu_items_link" href="../company_supervisor/company_supervisor_login.php"><li class="menu_items_list">Company Supervisor</li></a>
  <a class="menu_items_link" href="../visiting_supervisor/visiting_supervisor_login.php"><li class="menu_items_list">Visiting Supervisor</li></a>
  <a class="menu_items_link" href="../submit_report/submit_report.php"><li class="menu_items_list">Submit Report</li></a>
  <a class="menu_items_link" href="../index.php"><li class="menu_items_list">Logout</li></a>
</ul>
</div>

<div id="main_content">
  <div class="container-fluid">
    <div class = "panel">
       <div class = "panel-heading phead">
          <h2 class = "panel-title ptitle"> ASSUMPTION OF DUTY FORM</h2>
       </div>
            <div class = "panel-body pbody">


          <div class="panel panel-adjusted">
           <div class="panel-body pbody_student_info">
             <br>
             <div style="float:left;font-size:.9em"><strong>Student Information</strong></div>
             <hr>
         <form method="post" action="">
           <div class="form-group">
            <label for="txtfname">First Name </label>
            <input type="text" class="form-control form-control-adjusted" id="txtfname" placeholder="Enter first name" disabled value=<?php echo $student_fname;?>>
          </div>

          <div class="form-group">
           <label for="txtlname">Last Name </label>
           <input type="text" class="form-control form-control-adjusted" id="txtlname" placeholder="Enter last name" disabled value=<?php echo $student_lname;?>>
         </div>

         <div class="form-group">
          <label for="txtothername">Other Name(s) </label>
          <input type="text" class="form-control form-control-adjusted" id="txtothername" placeholder="Enter other name(s)" disabled value=<?php echo $student_other_name;?>>
        </div>

        <div class="form-group">
         <label for="txtstudent_department">student_department </label>
         <input type="text" class="form-control form-control-adjusted" id="txtstudent_department" placeholder="Enter student department" disabled value="<?php echo $student_department;?>">
       </div>


       <div class="form-group">
        <label for="txtindexnumber">Registration Number </label>
        <input type="text" class="form-control form-control-adjusted" id="txtindexnumber" placeholder="Enter index number"  disabled value=<?php echo $student_reg;?>>
      </div>

      <div class="form-group">
        <label for="txtschool">School </label>
        <input type="text" class="form-control form-control-adjusted" id="txtschool" placeholder="Enter your School" disabled value=<?php echo $student_school;?>>
      </div>

       <div class="form-group">
        <label for="txtcourse">Course </label>
        <input type="text" class="form-control form-control-adjusted" id="txtcourse" placeholder="Enter your course" disabled value=<?php echo $student_course;?>>
      </div>

      <div class="form-group">
       <label for="txtlevel">Level </label>
       <input type="text" class="form-control form-control-adjusted" id="txtlevel" placeholder="Enter your level" disabled value=<?php echo $student_level;?>>
     </div>

     <br>
     <div style="float:left;font-size:.9em"><strong>Company Information</strong></div>
     <hr>

     <div class="form-group">
      <label for="txtcompanyname">Company Name : </label>
      <input type="text" class="form-control form-control-adjusted" id="txtcompanyname" placeholder="Enter company name" name="txt_company_name">
    </div>

    <div class="form-group">
     <label for="txtsupervisorsname">Supervisors Name : </label>
     <input type="text" class="form-control form-control-adjusted" id="txtsupervisorsname" placeholder="Enter supervisors name" name="txt_supervisors_name">
   </div>

   <div class="form-group">
    <label for="txtsupervisorscontact">Supervisors Contact : </label>
    <input type="text" maxlength="15" class="form-control form-control-adjusted" id="txtsupervisorscontact" placeholder="Enter supervisors contact" name="txt_supervisors_contact">
  </div>

  <div class="form-group">
   <label for="txtsupervisorsemail">Supervisors Email : </label>
   <input type="email" class="form-control form-control-adjusted" id="txtsupervisorsemail" placeholder="Enter supervisors e-mail" name="txt_supervisors_email">
 </div>

     <div class="form-group">
     <label for="selected_region">Select company region :</label>
     <select class="form-control form-control-adjusted" id="selected_region" name="selected_region">
       <?php
     foreach($regions as $val) { echo "<option>".$val."</option>";};
        ?>
     </select>
   </div>

   <div class="form-group">
  <label for="company_address">Address :</label>
  <textarea class="form-control" id="company_address" width="100%" name="txt_address"></textarea>
  </div>

  <div id="btn_submit_holder">
  <input type="submit" class="btn btn-primary" value="Submit" name="btn_submit"/>
  </div>
  
       </form>
     </div>
     </panel>
       </div>
     </div>
   </div>
 </div>

 <?php

 if(isset($_POST["btn_submit"])){

   if($_POST["txt_company_name"]!="" && $_POST["txt_supervisors_name"]!="" && $_POST["txt_supervisors_contact"]!="" && $_POST["txt_supervisors_email"]!="" && $_POST["selected_region"]!="" && $_POST["txt_address"]!=""){

      $student_company_name = $_POST["txt_company_name"];
      $student_supervisor_name = $_POST["txt_supervisors_name"];
      $student_supervisor_contact = $_POST["txt_supervisors_contact"];
      $student_supervisor_email = $_POST["txt_supervisors_email"];
      $student_company_region = $_POST["selected_region"];
      $student_company_address = $_POST["txt_address"];

      $avoid_duplicate = "SELECT * FROM students_assumption WHERE reg_number='$student_reg' LIMIT 1";
      $execute_avoid_duplicate_query = mysqli_query($conn,$avoid_duplicate);
      $check_avoidance_query = mysqli_num_rows($execute_avoid_duplicate_query);

      if($check_avoidance_query==1){
        echo "<script>alert('You have submitted details already')</script>";
      }else{
      $my_insert_query = "INSERT INTO `students_assumption` (`id`, `first_name`, `last_name`, `other_name`,`reg_number`, `level`, `school`, 
      `student_department`, `course`,`company_name`, `supervisor_name`, `supervisor_contact`,`supervisor_email`, `company_region`, `company_address`,
      `date`) VALUES (NULL, '$student_fname', '$student_lname', '$student_other_name', '$student_reg', '$student_level', '$student_school',
      '$student_department', '$student_course', '$student_company_name', '$student_supervisor_name','$student_supervisor_contact', '$student_supervisor_email',
      '$student_company_region', '$student_company_address', CURRENT_TIMESTAMP)";

      if($run_query = mysqli_query($conn,$my_insert_query)){
          echo "<script>alert('Details Have Been Submitted Successfully')</script>";


            $my_update_query = "UPDATE `industrial_registration` SET `company_supervisor_name` = '$student_supervisor_name' WHERE reg_number = '$student_reg'";
            $execute_my_update_query = mysqli_query($conn,$my_update_query);

            $my_update_query2 = "UPDATE `industrial_registration` SET `company_supervisor_contact` = '$student_supervisor_contact' WHERE reg_number = '$student_reg'";
            $execute_my_update_query = mysqli_query($conn,$my_update_query2);
				
			$my_update_query3 = "UPDATE `industrial_registration` SET `attachment_region` = '$student_company_region' WHERE reg_number = '$student_reg'";
            $execute_my_update_query = mysqli_query($conn,$my_update_query3);
           
          }else{
          echo "<script>alert('Details Not Submitted ')</script>";
      }

    }

   }
 }
  ?>

</body>
</html>
