<?php 
include 'conn.php';
include 'header.php';
    $x=$_GET['stsid'];
    $cmp=$_GET['compid'];
    $cid=$_GET['cid'];
    if($x==2)
    {
        $xy=mysqli_query($conn,"UPDATE complain SET comp_status='compeleted' WHERE comp_id='$cmp'");
        $del=mysqli_query($conn,"DELETE from compalloc where comp_id='$cmp'"); 
        header('location:compview.php');
    }else{
        $xy=mysqli_query($conn,"UPDATE complain SET comp_status='new' WHERE comp_id='$cmp'");
        
        header('location:compview.php');
    }
  ?>    
   
