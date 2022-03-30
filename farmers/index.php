<?php 
include '../incl/header.incl.php';
include '../incl/conn.incl.php';

?>
<style>
h2{
  color:green;
  text-align: center;
  text-decoration: underline;
}
table,td{
    border:2px solid green;
    padding:8px;
}
th{
    padding-top:8px;
    padding-bottom:8px;
    text-align:left;
    background-color: green;
    color:white;
}
table{
    background-color:powderblue;
    cellpadding:8px;


}
body{
    background-color: powderblue;
}
h1{
    color:green
}
}
</style>
<h1>Farmers</h1>
<?php
if(isset($_GET['delete'] , $_GET['f_no'])){
    if ($current_user['role'] == 'Clerk') {
echo "sorry Clerks are not allowed to access this module";
exit();
}
$row = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `farmers` WHERE `f_no` ='$f_no'"));
$f_no = (int) $_GET['f_no']; 
mysqli_query($conn,"DELETE FROM `farmers` WHERE `f_no` = '" .stripslashes($f_no)." ") ; 
echo (mysqli_affected_rows($conn)) ? "farmer deleted." : "Nothing deleted. ";
}
?> 
<a class="btn btn-large btn-primary" href="add.php"><i class="icon-plus icon-white"></i>Add Farmer</a>  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a class="btn btn-large btn-primary " style="background-color-red"href="deliveries.php" ><i  class="icon-eye" style="font-size:24px;color:red;"></i>view farmer's deliveries</a>
<table border="3px" 



<?php
?><br/><br/>
<table  class='table table-hover table-striped table-condensed table-bordered'>
    <h2>Registered Farmers</h2>
    <thead><tr>
        <!-- //<th>Id</th>";  -->
        <th> Farmer no</th>
        <th> Farmer ID</th>
<!-- //        <th> Pass</th>";  -->
        <th> Farmer name</th>
        <th> locallity</th>
        <th>bank account number</th>
         <th>phone number</th> 
         <th>Action</th></th></tr> </thead><tbody>
        <?php
    $result = mysqli_query($conn,"SELECT * FROM `farmers`") or trigger_error(mysqli_error($conn)); 
    while($row = mysqli_fetch_array($result)){ 
    foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
    echo "<tr>";  
        //echo "<td>" . nl2br( $row['id']) . "</td>";  
        echo "<td>" . nl2br( $row['f_no']) . "</td>";  
        echo "<td>" . nl2br( $row['f_id']) . "</td>";  
//        echo "<td>" . nl2br( $row['e_pass']) . "</td>";  
        echo "<td>" . nl2br( $row['f_name']) . "</td>";  
        echo "<td>" . nl2br( $row['f_locallity']) . "</td>";  
        echo "<td>" . nl2br( $row['f_ac']) . "</td>";  
        echo "<td>" . nl2br( $row['f_phone']) . "</td>";  
        echo "<td><a href=edit.php?f_no={$row['f_no']}>Edit</a> | <a href=delete.php?f_no={$row['f_no']}>Delete</a></td> "; 
        echo "</tr>"; 
    } 
    echo "</tbody></table>"; 
 include '../incl/footer.incl.php';
?>
     
        
       </body>
   
  
