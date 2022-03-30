<?php
include ("incl/header.incl.php");
?>

<style type="text/css">
    a{
        color: white;
        text-decoration:underline;
    }
    p{
        color: grey
    }
    h1,h2,h3,h4,h5,h6{
        color: red;
    }
</style>

<body style=" background-color:green;">

<h1>Home</h1>
<div class="container">
    <div class="span">
        <div class="span span3" >
            <a href='farmers/index.php'>
                <img src="img/faamer.png"><br/>
                <strong> Farmers</strong>
            </a>
        </div>
        <div class="span span3" >
            <a href='employees/index.php'>
                <img src="img/employeees.png"><br/>
                <strong>   Employees</strong>
            </a>
        </div>
        <div class="span span3" >
            <a href='delivery/index.php'>
                <img src="img/delivery.jpg"><br/>
                <strong>  Deliveries</strong>
            </a>
        </div>
		<!--<div class="span span3" >
            <a href='Mpesa/index.php'>
                <img src="Mpesa/mpesa.png"><br/>
                <strong> Mpesa PAY online</strong>
            </a>-->
        </div>
        <div class="span span3" >
           <a href='reports/index.php'>
                <img src="img/reeports.png"><br/>
                <strong>  Reports</strong>
            </a>
        </div>
        <div class="span span3" >
            <a href='payment/index.php'>
                <img src="img/paayment.png"><br/>
                <strong> Payments</strong>
            </a>
        </div>
        <div class="span span3" >
            <a href='settings/index.php'>
                <img src="img/setting.png"><br/>
                <strong>   Settings</strong>
            </a>
			
        </div>
          <div class="span span3" >
            <a href='sms/index.php'>
                <img src="img/smartphone.png"><br/>
                <strong>   Sms</strong>
            </a>
            
        </div>
    </div>
</div>
 

<?php
$footer = 'incl/footer.incl.php';
include ("$footer");
?>