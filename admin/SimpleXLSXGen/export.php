<?php
include '../../database_connection/database_connection.php';
include '../SimpleXLSXGen/SimpleXLSXGen.php';


$assigments = [
    ['Id', 'Student Name', 'Reg No.', 'School', 'Department', 'Company Name', 'Region', 'Company Supervisor', 'Contact']
];

$id=0;
$mysql_query_1 = "SELECT * FROM students_assumption";
$execute_result_query = mysqli_query($conn,$mysql_query_1);
if (mysqli_num_rows($execute_result_query) > 0) {
    foreach ($execute_result_query as $row) {
        $id++;
        $assigments =array_merge($assigments, array(array($id, $row['first_name'].' '.$row['last_name'], $row['reg_number'], $row['school'], $row['student_department'], $row['company_name'], $row['company_region'], $row['supervisor_name'], $row['supervisor_contact'])));


    }
}
$xlsx = Shuchkin\SimpleXLSXGen::fromArray( $assigments );
$xlsx-> downloadAs('assignments.xlsx');
echo "<prev>";
print_r($assigments);

?>