<?php 
include '../../incl/header.incl.php';
include '../../incl/conn.incl.php';

if (isset($_GET['delete'])) {
    $id = (int) $_GET['id'];
    mysqli_query($conn,"DELETE FROM `settings_rates` WHERE `id` = '$id' ");
    echo (mysqli_affected_rows($conn)) ? "Row deleted.<br /> " : "Nothing deleted.<br /> ";
}
?>
<style>

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

</style>
<a class="btn btn-large btn-primary" href="new.php"><i class="icon-plus icon-white"></i>Add Rates</a><br/><br/>
<table border=1 class='table table-hover table-striped table-condensed table-bordered'>

    <thead class="" >
    <th>#</th>
    <th>From</th>
    <th>To</th>
    <th>Rate</th>
    <?php if ($current_user['role'] != 'Clerk') { ?><th style="text-align: center">Tasks</th> <?php } ?>
</thead>
<tbody>
    <?php
    $result = mysqli_query($conn,"SELECT * FROM `settings_rates`") or trigger_error(mysqli_error($conn));
    $i = 0;
    while ($row = mysqli_fetch_array($result)) {
        foreach ($row AS $key => $value) {
            $row[$key] = stripslashes($value);
        }
        echo "<tr>";
        echo "<td valign='top'>" . ($i + 1) . "</td>";
        echo "<td valign='top'>" . nl2br($row['from']) . "</td>";
        echo "<td valign='top'>" . nl2br($row['to']) . "</td>";
        echo "<td valign='top'>" . nl2br($row['rate']) . "</td>";
        if ($current_user['role'] == 'Manager') {
            echo '<td  style="text-align: center">
                <a href=edit.php?edit=1&id=' . $row['id'] . ' class="btn btn-primary btn-mini"><i class="icon-edit icon-white"></i>Edit</a> | 
                <a href=?delete=1&id=' . $row['id'] . ' class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i>Delete</a> 
             </td>';
        }

//        echo "<td valign='top'><a href=edit.php?id={$row['id']}>Edit</a></td><td>
//            <a href=delete.php?id={$row['id']} .'" class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i>Delete</a> 
//                </td> ";
        echo "</tr>";
    }
    ?>
</tbody>
</table>
