<?php	
include '../incl/header.incl.php';
include '../incl/conn.incl.php';

if ($current_user['role'] != 'Manager') {
    echo "sorry you are not allowed to access this module";
    exit();
}


$f_no = '';
if (isset($_POST['submitted'])) {
    foreach ($_POST AS $key => $value) {
        $_POST[$key] = mysqli_real_escape_string($conn, $value);
    }
    
    $sql = "INSERT INTO `farmers` ( `f_no` ,  `f_id` ,  `f_name` ,  `f_locallity` ,  `f_ac` , `f_phone`  )
     VALUES(  '{$_POST['f_no']}' ,  '{$_POST['f_id']}' ,  '{$_POST['f_name']}' ,  '{$_POST['f_locallity']}' ,  '{$_POST['f_ac']}' , '{$_POST['f_phone']}' ) ";
    mysqli_query($conn,$sql) or die(mysqli_error($conn));
    $f_no = $_POST['f_no'];
    echo "Employee added<br />";
    echo "<a href='index.php'>Back To Employees</a>";
}	
   
?>
<h1>Add Farmers</h1>

<a href='index.php' class='btn btn-primary'>Back To Farmers</a>
<form action='' method='post' class="form-horizontal"> 
    <div class="control-group">
        <label class="control-label" for="f_no"> No:</label >
        <div class="controls">
            <input class="input-xlarge" type="text" placeholder="CCF****" name='f_no'/>

        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="f_id">ID No:</label >
        <div class="controls">
            <input class="input-xlarge" type="text" placeholder="CCF****" name='f_id'/> 

        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="f_name"> Name of Farmer:</label >
        <div class="controls">
            <input class="input-xlarge" type="text" placeholder="Name.." name='f_name'/> 
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="f_locallity"> Locality of Farmer:</label >
        <div class="controls">
            <input class="input-xlarge" type="text" placeholder="Area-X.." name='f_locallity'/> 
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="f_ac"> Farmer's A/C NO:</label >
        <div class="controls">
            <input  class="input-xlarge" type="text" placeholder="Bank account number ******.." name='f_ac'/> 
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="f_phone"> Farmer Phone NO:</label >
        <div class="controls">
            <input class="input-xlarge" type="text" placeholder="+254******.." name='f_phone'/> 
        </div>
    </div>
    <div class="control-group">

        <div class="controls">
            <input type='hidden' value='1' name='submitted' />
            <input type='submit' value='Add Farmer' class="btn btn-success btn-large" /> 
             
        </div>
    </div>
</form>


<?php
include '../incl/footer.incl.php';
?>
