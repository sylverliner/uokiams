<?php

include '../database_connection/database_connection.php';

$student_fname = $_COOKIE["student_first_name"];
$student_lname = $_COOKIE["student_last_name"];
$reg_number_holder = $_COOKIE["student_reg_number"];
$student_reg = "";

$departments = array("-","Mathematics and Statistics","Computing Information Systems & Knowledge Management","Physical Sciences","Nursing",
"Clinical Medicine","Biological Sciences","Humanities","Education Administration, Planning and Management","Education Administration, Psychology and Foundation",
"CIEM","Finance & Economics","Marketing, Human Resource, Tourism and Hospitality","Agricultural Biosystems and Economics","Horticulture");

$courses = array("-","Bsc. Computer Science","Bsc. Information Technology","Bsc. Actuarial Science","Bsc. Communication and Public Relations","Bsc. Human Resource Management","Bsc. Applied Statistics","Bachelor of Science","Bsc. Clinical Medicine","Bsc. Biochemistry","Bsc. Agricultural Economics and Resource Management"," 	Bsc. Agriculture","Bsc. Education Science","Bsc. English Literature","Bachelor of Business Management","Bachelor of Hotel and Hospitality Management");

$schools = array("-","SASNR","SOBE","SEASS","SHS","SST");

$levels = array("-","Degree","Diploma");

if(isset($_POST["btn_submit"])){
  if($_POST["student_department"]!="" && $_POST["student_course"]!=""  && $_POST["student_level"]!="" && $_POST["student_school"]!="" 
  && $_POST["student_nok"]!="" && $_POST["student_contact"]!="" && $_POST["nok_contact"]!="" && $_POST["nok_relationship"]!="" 
  && $_POST["nok_relationship"]!=""){

    $other_name = $_POST["student_other_name"];
    $student_reg = $_POST["txt_reg_number"];
    $student_contact = $_POST["student_contact"];
    $student_department_selected = $_POST["student_department"];
    $student_level_selected = $_POST["student_level"];
    $student_course_selected = $_POST["student_course"];
	  $student_school = $_POST["student_school"];
    $student_nok = $_POST["student_nok"];
    $nok_contact =$_POST["nok_contact"];
    $nok_relationship =$_POST["nok_relationship"];


      $check_user_existence = "SELECT * FROM industrial_registration WHERE reg_number='$student_reg' LIMIT 1";
      $execute_check_existence = mysqli_query($conn,$check_user_existence);
      $check_user = mysqli_num_rows($execute_check_existence);
      if($check_user==1){
       echo "<script>alert('Sorry You Have Registered Already')</script>";
     }else{
        $insert_details_command = "INSERT INTO `industrial_registration` (`id`, `first_name`, `last_name`,`other_name`,`student_contact`,
        `student_nok`,`nok_contact`,`nok_relationship`,`level`, `student_department`, `course`,`school`,`date`, `reg_number`)
         VALUES (NULL, '$student_fname', '$student_lname','$other_name', '$student_contact','$student_nok','$nok_contact','$nok_relationship',
         '$student_level_selected', '$student_department_selected', '$student_course_selected','$student_school', CURRENT_TIMESTAMP, 
         '$student_reg')";
        if($run_insert_query = mysqli_query($conn,$insert_details_command)){
        echo "<script>alert('Details Have Been Sent Successfully')</script>";
      }else{
        echo "<script>alert('Details Not Submitted')</script>";
      }
     }

   
  }
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
  <link rel="stylesheet" href="register_page.css"/>

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
  <a class="menu_items_link" href="../Register_page/Register_page.php"><li class="menu_items_list"style="background-color:orange;padding-left:16px">Register</li></a>
  <a class="menu_items_link" href="../download_attachment_documents/download_attachment_documents.php"><li class="menu_items_list">Download Attachment Documents</li></a>
  <a class="menu_items_link" href="../student_assumption/student_assumption.php"><li class="menu_items_list">Submit Assupmtion</li></a>
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
       <div class = "panel-heading industrial_phead">
          <h2 class = "panel-title industrial_ptitle"> Industrial Registration</h2>
       </div>

            <div class = "panel-body industrial_pbody">

         <div class="panel panel-adjusted">
           <div class="panel-body">
             <form method="post" action="">
               <div class="form-group">
                <label for="txtfname">First Name </label>
                <input type="text" class="form-control form-control-adjusted" id="txtfname" placeholder="Enter first name" disabled <?php echo "value='$student_fname'"?>>
              </div>

              <div class="form-group">
               <label for="txtlname">Last Name </label>
               <input type="text" class="form-control form-control-adjusted" id="txtlname" placeholder="Enter last name" disabled <?php echo "value='$student_lname'"?>>
             </div>

             <div class="form-group">
              <label for="txtothername">Other Name(s) </label>
              <input type="text" class="form-control form-control-adjusted" id="txtothername" placeholder="Enter other name(s)" name="student_other_name">
            </div>

            <div class="form-group">
             <label for="txtregnumber">Registration Number </label>
             <input type="text" class="form-control form-control-adjusted" id="txtregnumber" placeholder="Enter registration number" name="txt_reg_number" value=<?php echo $reg_number_holder?>>
           </div>

           <div class="form-group">
              <label for="txtstudentcontact">Student contact</label>
              <input type="text" class="form-control form-control-adjusted" id="txtstudentcontact" placeholder="Enter Contact (0700000000)" name="student_contact">
            </div>

            <div class="form-group">
              <label for="txtnextofkin">Next of Kin(NoK)</label>
              <input type="text" class="form-control form-control-adjusted" id="txtnextofkin" placeholder="Enter Name of NoK" name="student_nok">
            </div>

            <div class="form-group">
              <label for="txtnokcontact">Phone Number of NoK</label>
              <input type="text" class="form-control form-control-adjusted" id="txtnokcontact" placeholder="Enter Contact of NoK" name="nok_contact">
            </div>

            <div class="form-group">
              <label for="txtnokrelation">Relationship</label>
              <input type="text" class="form-control form-control-adjusted" id="txtnokrelation" placeholder="NoK Relationship" name="nok_relationship">
            </div>

            <div class="form-group">
              <label for="selected_school">Select School :</label>
              <select class="form-control form-control-adjusted" id="selected_school" name="student_school">
                <?php
              foreach($schools as $val) { echo "<option>".$val."</option>";};
                ?>
              </select>
            </div>

            <div class="form-group">
            <label for="selected_department">Select Department:</label>
            <select class="form-control form-control-adjusted" id="selected_department" name="student_department">
              <?php
                foreach($departments as $val) { echo "<option>".$val."</option>";};
               ?>
            </select>
          </div>

          <div class="form-group">
          <label for="selected_course">Select Course:</label>
          <select class="form-control form-control-adjusted" id="selected_course" name="student_course">
            <?php
          foreach($courses as $val) { echo "<option>".$val."</option>";};
             ?>
          </select>
        </div>

        <div class="form-group">
          <label for="selected_level">Select Level:</label>
          <select class="form-control form-control-adjusted" id="selected_level" name="student_level">
            <?php
          foreach($levels as $val) { echo "<option>".$val."</option>";};
             ?>
          </select>
        </div>
          


          <div id="btn_submit_holder">
          <input type="submit" class="btn btn-primary" value="Submit"  name="btn_submit"/>
        </div>
           </form>
     </div>
     </panel>
       </div>
     </div>
   </div>
 </div>

</body>
</html>
