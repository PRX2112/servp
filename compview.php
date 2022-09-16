<?php 
include 'header.php';
include 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
     .bodx::-webkit-scrollbar {
  display: none;
}
body{
    padding-top: 80px;
}
</style>

</head>
<body class="bodx">
<?php


echo "<table class='table-hover table text-center'><h2 class='text-center'>Complain Master</h2><hr><h6 class='text-center'>Not Yet Allocated</h6><hr>"; echo "<th>Customer Id</th><th>Complain ID</th><th>Product Id</th><th>Complain_Desc</th><th>Complain Status</th><th>Allocation</th>";
    $comp="select name,comp_id from compalloc";
     $q=mysqli_query($conn,$comp);
     while($row=mysqli_fetch_array($q)){
        $name=$row['name'];
        $cmpid=$row['comp_id'];
     }
    $str="select * from complain where comp_status='pending' and comp_id='$cmpid'";
     $query=mysqli_query($conn,$str);
     while($row=mysqli_fetch_array($query)){
        $cid=$row[0];$comp_id=$row[1];$prod_id=$row[2];$comp_desc=$row[3];$comp_status=$row[4];
    echo "<tr><td>$cid</td><td>$comp_id</td><td>$prod_id</td><td>$comp_desc</td><td>$comp_status</td>
   <td><form method='POST'>
    <button  class='btn btn-dark'name='allocate' id='allo'><a name='update' class='text-decoration-none text-light'  href='status.php?stsid=2&compid=$comp_id&cid=$cid'>Completed</a></button>
    </form></td></tr>";
     }echo "</table>";
?>
<?php
echo "<table class='table-hover table text-center'><hr><h6 class='text-center'>Get Allocated</h6><hr>"; echo "<th>Customer Id</th><th>Complain ID</th><th>Product Id</th><th>Complain_Desc</th><th>Complain Status</th><th>Allocation</th>";
     $str="select * from complain where comp_status='compeleted'";
     $query=mysqli_query($conn,$str);
     while($row=mysqli_fetch_array($query)){
        $cid=$row[0];$comp_id=$row[1];$prod_id=$row[2];$comp_desc=$row[3];$comp_status=$row[4];
    echo "<tr><td>$cid</td><td>$comp_id</td><td>$prod_id</td><td>$comp_desc</td><td>$comp_status</td><td>
    <form method='POST'>
    <button  class='btn btn-dark'name='allocate' id='allo' ><a name='update' class='text-decoration-none text-light'  href='status.php?stsid=1&compid=$comp_id&cid=$cid'>De-Allocate</a></button>
    </form>
    </td></tr>";
     }
     echo "</table>";   
?>

</body>
</html>
<script>
    // if($comp_status=='pending'){
    // document.getElementsById('allo').disabled=true;
    // }
</script>
<?php 
include 'footer.php';
?>