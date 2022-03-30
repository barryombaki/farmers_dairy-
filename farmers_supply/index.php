<?php

session_start();

if(@$_SESSION['f_no']){



?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <!-- for faster page loads these should be on the footer, but careful on having jQuery code in your pages if you do -->
    <script type="text/javascript" src="http://localhost/Dairy/js/jquery-1.8.2.js"></script>
    <script type="text/javascript" src="http://localhost/Dairy/js/bootstrap.js"></script>
    <script type="text/javascript" src="http://localhost/Dairy/js/bootstrap-datetimepicker.min.js"></script>

    <link type="text/css" rel="stylesheet" href="http://localhost/Dairy/css/bootstrap.css" />
    <link type="text/css" rel="stylesheet"	href="http://localhost/Dairy/css/bootstrap-responsive.css" />
    <link type="text/css" rel="stylesheet" href="http://localhost/Dairy/css/main.css" />
    <link type="text/css" rel="stylesheet" href="http://localhost/Dairy/css/bootstrap-datetimepicker.min.css" />
    <title>Mt Kenya milk management system</title>
</head>
<body >
<!--    The top of the page visible on all pages in the system-->

<?php




$connect = mysqli_connect("127.0.0.1", "root", "", "dairy");

if (mysqli_connect_errno()) {
    echo "Failed to connect". mysqli_connect_errno();
}

    $check = mysqli_query($connect, "SELECT * FROM farmers WHERE f_no='".$_SESSION['f_no']."'");
    $rows = mysqli_num_rows($check);

    if(mysqli_num_rows($check) != 0){

        while ($row = mysqli_fetch_assoc($check)) {


            ?>

            <div id="top" class="page-header">
                <div id="user" class='pull-right'>
                    Welcome <?php echo $row['f_name']; ?>
                    <a class="" href=http://localhost/Dairy/auth/logout.php>logout</a>
                </div>
                <!--top logo-->
                <a href="http://localhost/Dairy/"><img src="http://localhost/Dairy/img/logo.png"/ alt="logo" id="logo"></a>

                <div id="navigation" class="navbar pull-right">
                    <h1 id="title">Mt Kenya milk management system</h1>
                </div> <!--end navigation-->
            </div>
            <!--beginning of the pages' body-->
            <div id="main-content" class="modal-body"><h1>Deliveries</h1>
                <br/>
                <table class="table table-hover table-striped table-condensed table-bordered">
                    <thead class="">
                        <th>Farmer's NO:</th>
                       <!-- <th>Total Payments</th>-->
                        <th>Amount of Milk(Litres)</th>
                        <th>Delivery date</th>
                        
                        <th>Delivered by?</th>
						<!--<th>Payment Dates</th>-->
                    </thead>
                    <tbody>
                        <?php
                        $check = mysqli_query($connect, "SELECT * FROM delivery,farmers WHERE r_f_no='".$_SESSION['f_no']."'");
                        $rows = mysqli_num_rows($check);

                        if(mysqli_num_rows($check) != 0){

                            while ($row = mysqli_fetch_assoc($check)) {
                        ?>
                        <tr>
                            <td valign='top'><?php echo $row['r_f_no']; ?></td>
                            <!--<td valign='top'><?php echo $row['Amount_paid']; ?></td>-->
                            <td valign='top'><?php echo $row['r_kg']; ?></td>
                            <td valign='top'><?php echo $row['r_dt']; ?></td>
                           
                            <td valign='top'><?php echo $row['r_deliverer']; ?></td>
							<td valign='top'><?php echo $row['last_paid']; ?></td> 
                        </tr>
                                <?php } }  ?>
                    </tbody>
                </table>
            </div>
            </body>
            </html>
            <?php
        }
        }else{
            echo "ID not found";
        }

        ?>
    <?php


    } else{

        echo "<script>alert('You must be logged in');</script>";
        echo"<script>location.href = 'index.php';</script>";

    }
    ?>