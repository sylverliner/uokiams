<?php
include '../../database_connection/database_connection.php';
include '../SimpleXLSXGen/SimpleXLSXGen.php';


$students_reg_details = [
    ['Id', 'Student Name', 'Reg No.', 'Student Contact', 'School', 'Department', 'Next of Kin(NoK)', 'NoK Relationship', 'NoK Contact']
];

$id=0;
$mysql_query_1 = "SELECT * FROM industrial_registration";
$execute_result_query = mysqli_query($conn,$mysql_query_1);
if (mysqli_num_rows($execute_result_query) > 0) {
    foreach ($execute_result_query as $row) {
        $id++;
        $students_reg_details =array_merge($students_reg_details, array(array($id, $row['first_name'].' '.$row['last_name'], $row['reg_number'], $row['student_contact'], $row['school'], $row['student_department'], $row['student_nok'], $row['nok_relationship'], $row['nok_contact'])));


    }
}
$xlsx = Shuchkin\SimpleXLSXGen::fromArray( $students_reg_details );
$xlsx-> downloadAs('students_reg_details.xlsx');
echo "<prev>";
print_r($students_reg_details);

?>