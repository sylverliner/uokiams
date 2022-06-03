<?php
include '../database_connection/database_connection.php';



?>


<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>UOK-IAMS-Password-Reset</title>


  <link rel="stylesheet" href="forgot_password.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


  <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>

</head>

<body>
<div class="container">
    <div class="card">
        <div class="card-header text-center">
            Reset Password In PHP MySQL
        </div>
        <div class="card-body">
        <?php
        if($_GET['key'] && $_GET['token']) {
            $email = $_GET['key'];
            $token = $_GET['token'];
            $query = mysqli_query($conn,
            "SELECT * FROM `users` WHERE `reset_link_token`='".$token."' and `email`='".$email."';");
            $curDate = date("Y-m-d H:i:s");
            if (mysqli_num_rows($query) > 0) {
                $row= mysqli_fetch_array($query);
                if($row['exp_date'] >= $curDate){
        ?>
        
        <form action="update-forget-password.php" method="post">
            <input type="hidden" name="email" value="<?php echo $email;?>">
            <input type="hidden" name="reset_link_token" value="<?php echo $token;?>">
            <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input type="password" name='password' class="form-control">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Confirm Password</label>
                <input type="password" name='cpassword' class="form-control">
            </div>
            <input type="submit" name="new-password" class="btn btn-primary">
        </form>
        <?php } } else{
            <p>This forget password link has been expired</p>
            }
        }
        ?>
        </div>
    </div>
</div>

</body>
</html>
