<?php
include '../database_connection/database_connection.php';


if(isset($_POST["btn_login"])){
  if( $_POST["admin_name"]!="" && $_POST["password"]!="" ){
  $admin_name = $_POST["admin_name"];
  $password = $_POST["password"];
    $check_credentials_query = "SELECT * FROM system_admin WHERE admin_name='$admin_name' AND password='$password' LIMIT 1";
    $execute_check_credentials_query = mysqli_query($conn,$check_credentials_query);
    $check_admin_validity = mysqli_num_rows($execute_check_credentials_query);

    if($check_admin_validity==1){
      $row= mysqli_fetch_array($execute_check_credentials_query);
      if ($row["admin_role"]=="Admin") {
      //echo "Admin";
        header("Location:view_registered_students/admin_view_registered_students.php");
      }elseif ($row["admin_role"]=="Supervisor") {
        //echo "Supervisor";
        header("Location:view_registered_students/view_registered_students.php");
    }
    }else{
		echo "<script>alert('Entered Admin Name OR Password Is Incorrect')</script>";
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
  <title>IASMS</title>

  <link rel="stylesheet" href="../css/bootstrap-theme.min.css"/>
  <link rel="stylesheet" href="../css/bootstrap.min.css"/>
  <link rel="stylesheet" href="../css/bootstrap-select.css"/>
  <link rel="stylesheet" href="../css/main_page_style.css"/>
  <link rel="stylesheet" href="index.css"/>

  <script type="text/javascript" src="../js/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>

</head>
<body>
<div id="top-navigation">
  <div id="header_logo"><img src="../img/UOKIAMS-logo.jpg" class="img-responsive" alt="logo" style="float:left;width:150px; height:50px;position:relative;left:20px"/></div>
<div id="student_name"><span style="color:rgb(255, 198, 0);font-size:1.1em"><em>Welcome,</em>&nbsp; </span><span style="font-family:serif">Admin</span></div>
</div>

<div  class="d-flex justify-content-center justify-items-center">
  <div class="container">
    <div class = "panel panel-adjusted" >
      <div class = "panel-heading phead">
          <h2 class = "panel-title ptitle">Login - Administrator</h2>
      </div>
      <!-- <form  method="post" action=""> -->
        <div class = "panel-body pbody">

            
            <form  method="post" action="">
            
              <div class="group mb-3">
                <label for="admin_name" class="label" style="color: #403e3e; font-size: 13px;">Admin Name</label>
                <input id="admin_name" type="text" class="form-control form-control-adjusted" name="admin_name" placeholder="Enter Admin Name" required>
              </div>
              <div class="group mb-3">
                <label for="password" class="label" style="color: #403e3e; font-size: 13px;">Password</label>
                <input id="password" type="password" class="form-control form-control-adjusted" name="password" placeholder="Enter Password" required>
              </div>
              <br>
              <div id="btn_login_holder" style="float: right">
              <input type="submit" class="btn btn-primary" value="Login" id="btn_visiting_login" name="btn_login"/>
              </div>

            </form>
            <br><br>
            <div class="d-flex justify-content-center">
              <span><a href="../index.php"><u>Go Back To Main Login</u></a></span>
            </div>
            

        </div>

        <!-- <div style="margin-left: 35%">
     	    <span><a href="../index.php"><u>Go Back To Main Login</u></a></span>
        </div> -->
      <!-- </form> -->
    </div>
  </div>
</div>

</body>
</html>
