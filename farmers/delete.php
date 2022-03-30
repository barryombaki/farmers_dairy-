<?php
include '../incl/header.incl.php';
include '../incl/conn.incl.php';
if ($current_user['role'] != 'Manager') {
    echo "sorry you are not allowed to access this module";
    exit();
}
$f_no = $_GET['f_no'];
mysqli_query($conn,"DELETE FROM `farmers` WHERE `f_no` = '$f_no' ");
echo (mysqli_affected_rows($conn)) ? "farmer deleted.<br /> " : "Nothing deleted.<br /> ";
?> 

<a href='index.php'>Back To farmers</a>