
<?php

include '../database_connection/database_connection.php';

$student_fname = $_COOKIE["student_first_name"];
$student_lname = $_COOKIE["student_last_name"];
$student_reg = $_COOKIE["student_reg_number"];


// Downloads files
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM attachment_documents WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../uploads_documents/' . $file['document_file'];
    

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../uploads_documents/' . $file['document_file']));
        readfile('../uploads_documents/' . $file['document_file']);
        

        // Now update downloads count
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE attachment_documents SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);
        exit;
    }

}

 ?>


<!DOCTYPE html>
<html lang="en" class="bg-pink">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UOK-IAMS</title>

  <link rel="stylesheet" href="../css/bootstrap-theme.min.css"/>
  <link rel="stylesheet" href="../css/bootstrap.min.css"/>
  <link rel="stylesheet" href="../css/main_page_style.css"/>
  <link rel="stylesheet" href="download_attachment_documents.css"/>

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
    <a class="menu_items_link" href="download_attachment_documents.php"><li class="menu_items_list" style="background-color:orange;padding-left:16px">Download Attachment Documents</li></a>
	  <a class="menu_items_link" href="../student_assumption/student_assumption.php"><li class="menu_items_list">Submit Assupmtion</li></a>
	  <a class="menu_items_link" href="../e-logbook/elogbook.php"><li class="menu_items_list">E-Logbook</li></a>
	  <a class="menu_items_link" href="../company_supervisor/company_supervisor_login.php"><li class="menu_items_list">Company Supervisor</li></a>
	  <a class="menu_items_link" href="../visiting_supervisor/visiting_supervisor_login.php"><li class="menu_items_list">Visiting Supervisor</li></a>
	  <a class="menu_items_link" href="../sumit_report/submit_report.php"><li class="menu_items_list" >Submit Report</li></a>
	  <a class="menu_items_link" href="../index.php"><li class="menu_items_list">Logout</li></a>
</ul>
</div>

<div id="main_content">
  <div class="container-fluid">
    <div class = "panel">
       <div class = "panel-heading phead">
          <h2 class = "panel-title ptitle"> Download Attachement Application Documents</h2>
       </div>

              <br>
              <table class="table table-bordered table-hover">

                  <thead>
                    <tr>
                        <th style="text-align:center">ID</th>
                        <th style="text-align:center">Document File</th>
                        <th style="text-align:center">Downloads</th>
                        <th style="text-align:center">Action</th>

                    </tr>

                  </thead>

                  <tbody>
                    <?php
                    $mysql_query_1 = "SELECT * FROM attachment_documents";
                    $execute_result_query = mysqli_query($conn,$mysql_query_1);
                    while ($row_set = mysqli_fetch_array($execute_result_query)){

                      echo "<tr style='text-align:center;font-size:1.1em'>";

                      echo "<td>".$row_set["id"]."</td>";
                      echo "<td>".$row_set["document_file"]."</td>";
                      echo "<td>".$row_set["downloads"]."</td>";
                      echo "<td>"."<a href='download_attachment_documents.php?file_id=".$row_set["id"]."'>Download</a>". "</td>";


                      echo "</tr>";

                    }

                     ?>
                  </tbody>
            </table>
     </div>
   </div>
 </div>

</body>
</html>
