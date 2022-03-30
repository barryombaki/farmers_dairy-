<?php 
include '../incl/header.incl.php';
include '../incl/conn.incl.php';
//include('../incl/auth.incl.php');

?>
<!doctype html>
<html lang="en">
<head>
  
    <title>deliveries information</title>
</head>


<style>
    .button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 10px 16px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  
  
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
    
  color:green;
  text-align: center;
  text-decoration: underline;
}

</style>
<body>
<h1>Farmer's Deliveries</h1>
<br/>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h3>Enter farmers Number to search for Deliveries </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="POST">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search"  class="form-control" placeholder="Search for deliveries">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                
                                <th>Farmer No</th>
                                <th> (KGs.)</th>
                                <th>rate per KGs (Ksh)</th>
                                <th>Total_price(Ksh)</th>
                                <th>Delivery Date</th>
                                
                                <th>deliverer</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                            <?php

                            $search = $_POST['search'];

                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $db = "dairy";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sql = "select * from delivery where r_f_no = '$search'";

$result = $conn->query($sql);

if ($result->num_rows > 0){
while($row = $result->fetch_assoc() ){
	echo "<tr>";  
 
echo "<td valign='top'>" . nl2br( $row['r_f_no']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['r_kg']) . "</td>";
echo "<td valign='top'>" . nl2br( $row['rate']) . "</td>";
echo "<td valign='top'>" . nl2br( $row['r_kg'])* nl2br( $row['rate']). "</td>";
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
} else {
	echo "oops!! no records to display, serach again!!!";
}

$conn->close();

?>
                            </tbody>
                            
                        </table>
                        <button><a class="button" href="deliveries.php" button type="button" class="btn btn-primary">back to deliveries</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>