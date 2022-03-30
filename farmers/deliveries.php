

<?php 
include '../incl/header.incl.php';
include '../incl/conn.incl.php';
//include('../incl/auth.incl.php');

?>
<style>
h1{
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
</style>
<h1>Farmer's Deliveries</h1>
<br/>
<form action ="search.php" method="post">
  <input class="input-large" type ="text" placeholder="search...for deliveries" name="search">
  <input type="submit" class="btn  btn-primary"name="submmit" value="search" >&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  
<a class="btn btn-large btn-primary" href="index.php"><i class="icon-user icon-white"></i>back to Farmers</a> &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href='../reports/index.php' class="btn-large btn-primary">Go to Reports</a>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  
<a href='../delivery/index.php' class="btn-large btn-primary">Add deliveries</a>
</form>


<?php

?>


<table class="table table-hover table-striped table-condensed table-bordered">
  
    <thead class="" >
        <th>s/n</th>
       
        <th>Farmer No</th>
        <th> (KGs.)</th>
        <th>rate per KGs (Ksh)</th>
        <th>Total_price (Ksh)</th>
        <th>Delivery Date</th>
       
        <th>deliverer</th>

        </thead>
    <tbody>
 <?php
$result = mysqli_query($conn,"SELECT * FROM `delivery`") or trigger_error(mysqli_error($conn)); 
$i=0;
while($row = mysqli_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
$i+=1;
echo "<tr>";  
 echo '<td>'.$i.'</td>';
 
echo "<td valign='top'>" . nl2br( $row['r_f_no']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['r_kg']) . "</td>";
echo "<td valign='top'>" . nl2br( $row['rate']) . "</td>";
echo "<td valign='top'>" . nl2br( $row['r_kg'])* nl2br( $row['rate']). "</td>";
echo "<td valign='top'>" . nl2br( $row['r_dt']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['r_deliverer']) . "</td>";  
  if ($current_user['role'] != 'Clerk') {
     
  }
echo "</tr>"; 
} 
echo "</tbody>
</table>"; 



include '../incl/footer.incl.php';
?>