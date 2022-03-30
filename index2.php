<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <script type="text/javascript" src="http://localhost/Dairy/js/jquery-1.8.2.js"></script>
        <script type="text/javascript" src="http://localhost/Dairy/js/bootstrap.js"></script>
        <script type="text/javascript" src="http://localhost/Dairy/js/bootstrap-datetimepicker.min.js"></script>

        <link type="text/css" rel="stylesheet" href="http://localhost/Dairy/css/bootstrap.css" />
        <link type="text/css" rel="stylesheet"	href="http://localhost/Dairy/css/bootstrap-responsive.css" />
        <link type="text/css" rel="stylesheet" href="http://localhost/Dairy/css/main.css" />
    
        <link type="text/css" rel="stylesheet" href="http://localhost/Dairy/css/bootstrap-datetimepicker.min.css" />
        <title>Chaka Ranch Record Mananagement System - Login</title>
    </head>
    <body>
       <div class="container">
           <div id="top" class="page-header">
               <a href="http://localhost/Dairy/"><img src="http://localhost/Dairy/img/logo.png"/ alt="logo" id="logo"></a>

               <div id="navigation" class="navbar ">
                   <h1 id="title" >*</h1>
               </div>
           </div>
           <div class="wrapper">
               <form name="login" method="post" class="form-signin form-horizontal loginform" enctype="application/x-www-form-urlencoded" action="">
                   <h3 class="form-signin-heading"> Farmer? Please Sign In</h3>
                   <hr class="colorgraph"><br>

                   <input type="text" class="form-control input-xlarge input-block-level" name="f_no" placeholder="Farmer Number" required="" autofocus="" />
                   <input type="password" class="form-control input-xlarge input-block-level input" name="f_phone" placeholder="Password" required=""/>
                   <input name="action" id="action" value="login" type="hidden">
                   <input class="btn btn-lg btn-primary btn-block"  name="login" value="Login" type="Submit">
                   <br />
                   <br />
                   <br />
                   <a href="index.php">already an Employer? login here</a>
               </form>

               <?php




               $connect = mysqli_connect("127.0.0.1", "root", "", "dairy");

               if (mysqli_connect_errno()) {
                   echo "Failed to connect". mysqli_connect_errno();
               }

               if(isset($_POST['login'])){

                   $f_no = $_POST['f_no'];
                   $f_phone = $_POST['f_phone'];

                   if($f_no && $f_phone){
                       $check = mysqli_query($connect, "SELECT * FROM farmers WHERE f_no='".$f_no."'");
                       $rows = mysqli_num_rows($check);

                       if(mysqli_num_rows($check) !=0){

                           while ($row = mysqli_fetch_assoc($check)) {
                               $db_no= $row['f_no'];
                               $db_phone = $row['f_phone'];
                           }

                           if($f_no == $db_no && $f_phone == $db_phone){

                               @$_SESSION["f_no"] = $f_no;

                               header("Location:farmers_supply/index.php");
                           }
                           else{
                               echo "<script>alert('Your user id is wrong!');</script>";
                           }

                       }else{
                           echo "<script>alert('Could not find your details');</script>";
                       }
                   }
                   else{
                       echo "<style type='text/css'>#user{border:1px solid red;}</style>";
                   }

               }

               ?>


           </div>
       </div>
    </body>
</html>