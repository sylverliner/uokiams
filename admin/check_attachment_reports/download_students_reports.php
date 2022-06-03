
<?php

include '../../database_connection/database_connection.php';

$mysql_query_1 = "SELECT * FROM attachment_report_submissions";

if(isset($_POST["btn_search"])){

  $search_by = $_POST["filter-by"];
  $search_term = $_POST["txt_search_term"];

  if($search_by!=""&& $search_term!=""){

    switch ($search_by) {
      case 'Filter By':
        $mysql_query_1 = "SELECT * FROM attachment_report_submissions";

        break;

      case 'First Name':

      $mysql_query_1 = "SELECT * FROM attachment_report_submissions WHERE first_name LIKE '%$search_term%'";

      break;

      case 'Last Name':

      $mysql_query_1 = "SELECT * FROM attachment_report_submissions WHERE last_name LIKE '%$search_term%'";

      break;

      case 'Reg Number':

      $mysql_query_1 = "SELECT * FROM attachment_report_submissions WHERE reg_number LIKE '%$search_term%'";

        break;

      case 'School':

      $mysql_query_1 = "SELECT * FROM attachment_report_submissions WHERE school LIKE '%$search_term%'";

        break;

      case 'Deparment':

      $mysql_query_1 = "SELECT * FROM attachment_report_submissions WHERE student_department LIKE '%$search_term%'";
  
        break;

      case 'Course':

      $mysql_query_1 = "SELECT * FROM attachment_report_submissions WHERE course LIKE '%$search_term%'";

        break;

      default:

      $mysql_query_1 = "SELECT * FROM attachment_report_submissions";

        break;
    }
  }
}
// Downloads files
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM attachment_report_submissions WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../../uploads_report/' . $file['report_file'];
    

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../../uploads_report/' . $file['report_file']));
        readfile('../../uploads_report/' . $file['report_file']);
        

        // Now update downloads count
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE attachment_report_submissions SET downloads=$newCount WHERE id=$id";
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

  <link rel="stylesheet" href="../../css/bootstrap-theme.min.css"/>
  <link rel="stylesheet" href="../../css/bootstrap.min.css"/>
  <link rel="stylesheet" href="../../css/main_page_style.css"/>
  <link rel="stylesheet" href="download_students_reports.css"/>

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
  <a class="menu_items_link" href="../students_assumptions/students_assumptions.php"><li class="menu_items_list">Student Assumptions</li></a>
  <a class="menu_items_link" href="../assign_supervisors/assign_supervisors.php"><li class="menu_items_list">Assign Supervisors</li></a>
  <a class="menu_items_link" href="#"><li class="menu_items_list">Visiting Superviors Score</li></a>
  <a class="menu_items_link" href="../company_score/company_supervisor_score.php"><li class="menu_items_list">Company Supervisor Score</li></a>
  <a class="menu_items_link" href="download_students_reports.php"><li class="menu_items_list" style="background-color:orange;padding-left:16px">Report Submissions</li></a>
  <a class="menu_items_link" href="../change_password/change_password.php"><li class="menu_items_list">Change Password</li></a>
  <a class="menu_items_link" href="../../index.php"><li class="menu_items_list">Logout</li></a>
</ul>
</div>

<div id="main_content">
  <div class="container-fluid">
    <div class = "panel">
       <div class = "panel-heading phead">
          <h2 class = "panel-title ptitle"> View Students' Report Submissions</h2>
       </div>
            <div class = "panel-body pbody">

              <form method="post" action="">
              <div class="container">
                  <div class="row">
                      <div class="col-xs-5 col-xs-offset-6">
              		    <div class="input-group">
                              <div class="input-group-btn search-panel">
                                  <select class="form-control search_by_side" name="filter-by">
                                    <option>FilterBy</option>
                                    <option>First Name</option>
                                    <option>Last Name</option>
                                    <option>Registration Number</option>
                                    <option>School</option>
                                    <option>Deparment</option>
                                    <option>Course</option>

                                  </select>

                              </div>
                              <input type="hidden" name="search_param" value="all" id="search_param">
                              <input type="text" class="form-control" name="txt_search_term" placeholder="Search term...">
                              <span class="input-group-btn">
                                  <input type="submit" class="btn btn-primary" value="search" name="btn_search" id="btn_search">
                              </span>
                            </form>
                          </div>
                      </div>
              	</div>
              </div>
              <br>
              <table class="table table-bordered table-hover">

                  <thead>
                    <tr>
                        <th style="text-align:center">ID</th>
                        <th style="text-align:center">Registration Number</th>
                        <th style="text-align:center">School</th>
                        <th style="text-align:center">Department</th>
                        <th style="text-align:center">Course</th>
                        <th style="text-align:center">Report File</th>
                        <th style="text-align:center">Downloads</th>
                        <th style="text-align:center">Action</th>

                    </tr>

                  </thead>

                  <tbody>
                    <?php
                    $mysql_query_command_1 = $mysql_query_1;
                    $execute_result_query = mysqli_query($conn,$mysql_query_command_1);
                    while ($row_set = mysqli_fetch_array($execute_result_query)){

                      echo "<tr style='text-align:center;font-size:1.1em'>";

                      echo "<td>".$row_set["id"]."</td>";
                      echo "<td>".$row_set["reg_number"]."</td>";
                      echo "<td>".$row_set["school"]."</td>";
                      echo "<td>".$row_set["student_department"]."</td>";
                      echo "<td>".$row_set["course"]."</td>";
                      echo "<td>".$row_set["report_file"]."</td>";
                      echo "<td>".$row_set["downloads"]."</td>";
                      echo "<td>"."<a href='download_students_reports.php?file_id=".$row_set["id"]."'>Download</a>". "</td>";


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
