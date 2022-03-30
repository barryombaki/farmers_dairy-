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
body{
      background-color:powderblue;
      margin:0;
        padding:0;
        height:100%;
     
  }
  body,footer{
  display: block;
  overflow-x:hidden;
  overflow-y: scroll
  
  h1{
    color:green
}
#wrapper{
min-height:100%;
position:relative;
}

    </style>
    <body>
    <div id="wrapper">
<h2>Reports</h1> </br>
<div class="span4">
<a href="farmer_monthly.php"class="btn btn-primary" style="text-color:green;"><img src="../img/month.png"><br/></br></br>
   view Per Farmer Delivery</a></div>
<div class="span4">
<a href="all_farmers.php" class="btn btn-primary"><img src="../img/month.png"><br/>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </br></br>
view Total Farmers Delivery</a>
</div>
</div>
</body>
<?php 
#include  '../incl/footer.incl.php';
?>