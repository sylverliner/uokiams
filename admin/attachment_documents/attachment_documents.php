<?php

include '../../database_connection/database_connection.php';
$sql = "SELECT * FROM attachment_documents";
$result = mysqli_query($conn, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Uploads files
if (isset($_POST['btn_submit_upload'])) { // if save button on the form is clicked
    
    // name of the uploaded file
    $document_file = $_FILES['ia_uploads']['name'];

    // destination of the file on the server
    $destination = '../../uploads_documents/' . $document_file;
    

    // get the file extension
    $extension = pathinfo($document_file, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['ia_uploads']['tmp_name'];
    $file_size = $_FILES['ia_uploads']['size'];

    if (!in_array($extension, ['pdf', 'docx'])) {
        echo "You file extension must be .pdf or .docx";
    } elseif ($_FILES['ia_uploads']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    }else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
			$sql = "INSERT INTO attachment_documents  ( document_file, file_size, downloads) VALUES ('$document_file', $file_size, 0)";
            if (mysqli_query($conn, $sql)) {
 
                echo "File uploaded successfully";
            }
        } else {
            echo "Failed to upload file.";
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
  <title>IAMS</title>

  <link rel="stylesheet" href="../../css/bootstrap-theme.min.css"/>
  <link rel="stylesheet" href="../../css/bootstrap.min.css"/>
  <link rel="stylesheet" href="../../css/bootstrap-select.css"/>
  <link rel="stylesheet" href="../../css/main_page_style.css"/>
  <link rel="stylesheet" href="attachment_documents.css"/>

  <script type="text/javascript" src="../../js/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="../../js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../../js/jquery.form.min.js"></script>

</head>
<body>

<div id="top-navigation">
<div id="header_logo"><img src="../../img/UOKIAMS-logo.jpg" class="img-responsive" alt="logo" style="float:left;width:150px; height:50px;position:relative;left:20px"/></div>
<div id="student_name"><span style="color:rgb(255, 198, 0);font-size:1.1em"><em>Welcome,</em>&nbsp; </span><span style="font-family:serif"><?php echo "Admin"?></span></div>
</div>

<div id="left_side_bar">
<ul id="menu_list">
<a class="menu_items_link" href="../view_registered_students/view_registered_students.php"><li class="menu_items_list">Registered Students</li></a>
<a class="menu_items_link" href="attachment_documents.php"><li class="menu_items_list" style="background-color:orange;padding-left:16px">Upload Attachment Docs</li></a>
  <a class="menu_items_link" href="../students_assumptions/students_assumptions.php"><li class="menu_items_list" >Student Assumptions</li></a>
  <a class="menu_items_link" href="../assign_supervisors/assign_supervisors.php"><li class="menu_items_list">Assign Supervisors</li></a>
  <a class="menu_items_link" href="../visiting_score/visiting_supervisors_score.php"><li class="menu_items_list">Visiting Superviors Score</li></a>
  <a class="menu_items_link" href="../company_score/company_supervisor_score.php"><li class="menu_items_list">Company Supervisor Score</li></a>
  <a class="menu_items_link" href="../check_attachment_reports/download_students_reports.php"><li class="menu_items_list">Report Submissions</li></a>
  <a class="menu_items_link" href="../change_password/change_password.php"><li class="menu_items_list">Change Password</li></a>
  <a class="menu_items_link" href="../index.php"><li class="menu_items_list">Logout</li></a>
</ul>
</div>

<div id="main_content">
  <div class="container-fluid">
    <div class = "panel">
       <div class = "panel-heading industrial_phead">
          <h2 class = "panel-title industrial_ptitle"> Attachment Documents</h2>
       </div>

        <div class = "panel-body industrial_pbody">
            
            <form method="POST" action="attachment_documents.php" enctype="multipart/form-data" id="form">
                <h1 style="text-align: center">Upload Attachment Documents</h1>
                <input type="file" name="ia_uploads" multiple required>
                <input type="submit" value="Upload" id="sub-but" name="btn_submit_upload">
                <h4 style="text-align: center"><strong style="color: #E13F41">Please Ensure That the documents are in a Microsoft Word or PDF format before uploading it</strong></h4>
                <h4 style="text-align: center">Any work not in Microsoft Word or PDF format would be discarded </h4>
                

            </form>

         </div>
   </div>
 </div>
</div>




</body>
</html>
