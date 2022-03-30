

<?php 
include '../incl/header.incl.php';
include '../incl/conn.incl.php';
//include('../incl/auth.incl.php');



if(isset($_GET['delete'])){
    $id = (int) $_GET['id']; 
mysqli_query($conn,"DELETE FROM `delivery` WHERE `id` = '$id' ") ; 
echo (mysqli_affected_rows($conn)) ? "Row deleted.<br /> " : "Nothing deleted.<br /> "; 
}
?>
<style>
h1{
  color:green;
  text-align: center;
  
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
</style>
<h1>Deliveries</h1>
<br/>
<a href='add.php' class='btn btn-large btn-primary'  ><i class="icon-plus icon-white"></i>New Delivery</a>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href='../farmers/deliveries.php' class='btn btn-large btn-primary'  ><i class="icon-goods icon-white"></i>more</a>
<table class="table table-hover table-striped table-condensed table-bordered">
    <thead class="" >
        <th>#</th>
       
         <th>Farmer NO:</th>
        <th>KGs:</th>
        <th>rate per KGs (Ksh)</th>
        <th>Total_price(Ksh)</th>
        <th>Date</th>
        <th>Deliverer:</th>
        <?php if ($current_user['role'] != 'Clerk') {?><th style="text-align: center">Tasks</th><?php } ?>
        </thead>
    <tbody>
 <?php
$result = mysqli_query($conn,"SELECT * FROM `delivery`") or trigger_error(mysqli_error($conn)); 
$i=0;
$total = 0;
$total_price=0;
$farmer_total=0;
while($row = mysqli_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
$i+=1;

$total=nl2br($row['r_kg'])*  nl2br( $row['rate']);
$total_price+=$total;
$farmer_total+=nl2br($row['r_kg']);


echo "<tr>";  
 
echo "<td valign='top'>" . nl2br( $row['id']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['r_f_no']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['r_kg']) . "</td>";
echo "<td valign='top'>" . nl2br( $row['rate']) . "</td>";
echo "<td valign='top'>" . $total . "</td>";
echo "<td valign='top'>" . nl2br( $row['r_dt']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['r_deliverer']) . "</td>";  
  if ($current_user['role'] != 'Clerk') {
      echo '<td  style="text-align: center">
                <a href="'.PAGE_URL.'delivery/edit.php?edit=1&id='.$row['id'].'" class="btn btn-primary btn-mini"><i class="icon-edit icon-white"></i>Edit</a> | 
                <a href="'.PAGE_URL.'delivery/?delete=1&id='.$row['id'].'" class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i>Delete</a> 
             </td>';
  }
echo "</tr>"; 
} 
 echo "<tr><td><strong>Total</strong></td><td>--</td><td><strong>$farmer_total</strong><td>--</td><td><strong>$total_price</strong></td></tr>";
echo "</tbody></table>"; 



include '../incl/footer.incl.php';
?>