<?php
	include '../database_connection/database_connection.php';


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
  $student_deparment = $get_user_info["student_department"];

  setcookie("student_school_holder",$student_school,time() + (86400 * 30));
  setcookie("student_department_holder",$student_school,time() + (86400 * 30));
  setcookie("student_course_holder",$student_course,time() + (86400 * 30));
  $status_number = 2;
}

$sql = "SELECT * FROM attachment_report_submissions";
$result = mysqli_query($conn, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Uploads files
if (isset($_POST['btn_submit_upload'])) { // if save button on the form is clicked
    
    // name of the uploaded file
    $report_file = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = '../uploads_report/' . $report_file;
    

    // get the file extension
    $extension = pathinfo($report_file, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $file_size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['pdf', 'docx'])) {
        echo "You file extension must be .pdf or .docx";
    } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    }else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
			$sql = "INSERT INTO attachment_report_submissions  (first_name, last_name,  reg_number, school, student_department, course, report_file, file_size, downloads) VALUES ('$student_fname',
            		'$student_lname', '$student_reg', '$student_school', '$student_department', '$student_course','$report_file', $file_size, 0)";
            if (mysqli_query($conn, $sql)) {
 
                echo "File uploaded successfully";
            }
        } else {
            echo "Failed to upload file.";
        }
    }

	
	// else {
    //     // move the uploaded (temporary) file to the specified destination
    //     if (move_uploaded_file($file, $destination)) {
    //         $my_insert_query = "INSERT INTO  attachment_report_submissions  (id, first_name, last_name,  reg_number, school, course, report_file, file_size, downloads) VALUES ('$student_fname',
	// 		'$student_lname', '$student_reg_number', '$student_school', '$student_course','$report_file', $file_size, 0)";
    //         if (mysqli_query($conn,$my_insert_query)) {
    //             echo "File uploaded successfully";
    //         }
    //     } else {
    //         echo "Failed to upload file.";
    //     }
    // }
}

?>