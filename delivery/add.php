<?php
include '../incl/header.incl.php';
include '../incl/conn.incl.php';
include 'validate.php';
$validation = array('valid' => true, 'fn' => '', 'kg' => '', 'dt' => '');

if (isset($_POST['submitted'])) {
    foreach ($_POST AS $key => $value) {
        $_POST[$key] = mysqli_real_escape_string($conn, $value);
    }
    $validation = validate_delivery($_POST['r_f_no'], @$_POST['r_kg'], $_POST['r_dt']);
    if ($validation['valid']) {
        $datetime = strtotime($_POST['r_dt']);
        
        $date = new EJ\DatePicker("datePicker");
        echo $date->value(new DateTime())->minDate(new DateTime("11/1/2016"))->maxDate(new DateTime("11/24/2016"))->render();
    
        $sql = "INSERT INTO `delivery` ( `r_f_no` ,  `r_kg` ,`rate` ,  `r_dt` ,  `r_deliverer`   ) VALUES(  '{$_POST['r_f_no']}' ,  '{$_POST['r_kg']}' , '{$_POST['rate']}' ,  '{$mysqldate}' ,  '{$_POST['r_deliverer']}'  ) ";
        mysqli_query($conn,$sql) or die(mysqli_error($conn));
        echo "Saved!.<br />";
        echo "<a href='index.php' class='btn btn-primary'>Back To Deliveries</a>";
    }
}
?>
<h1>Add Deliveries</h1>

<?php
include 'form.php';
include '../incl/footer.incl.php'; 

?>