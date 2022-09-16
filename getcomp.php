<?php
include 'conn.php';
// session_start();
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
     .bodx::-webkit-scrollbar {
  display: none;
}
body{
    padding-top: 80px;
}</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script>
  function gen(){
    document.getElementById("compid").value = '<?php echo 'cmp'.rand(100,500); ?>';
}
  </script>
    <title> Complain Master </title>
</head>
<body class="bodx">
<div class="container w-50">
    <div class="row">
        <div class="card-body card my-5 ">
<form method="POST" enctype="multipart/form-data">
    <h1 align="center">
       Complain Master
    </h1>
    
   
    <div class="mb-3 my-3">
  <label for="exampleInputEmail1" class="form-label">Customer Id :</label>
  <?php
  if(isset($_GET['id'])) {
    echo "<input type='text' class='form-control my-1' name='cid' value='".$_GET['id']."'> ";
  }else{
    $sql="select cid from cust_reg where cid='".$_GET['id']."'"; 
    $res=mysqli_query($conn,$sql);  
    echo "<select name='cid' class='w-100 py-2 text-center dropdown'>";
    echo "<option value='' >---Select Your Customer Id---</option>";   
    while ($row=mysqli_fetch_array($res,MYSQLI_ASSOC)){
    echo "<option value='$row[cid]'>$row[cid]</option>";   
    }
  }
  
  
   echo "</select>";
  ?>   

    <div class="mb-3 my-3">
    <label for="exampleInputEmail1" class="form-label">Complain Id :</label>
    <input type="text" class="form-control my-1" name="comp_id" value="" id="compid" aria-describedby="emailHelp">
    <button type="button" class="btn btn-primary" name="generate" onclick="gen()">Generate Complain Id</button>

    <div class="mb-3 my-3">
    <label for="exampleInputEmail1" class="form-label">Product Id :</label>
    <?php 
  $sql="select prod_id,prod_name from product"; 
  $res=mysqli_query($conn,$sql);  
  echo "<select name='prod_id' class='form-select form-select-lg mb-3 text-center'>";
  echo "<option value='' >---Select Your Product Id---</option>";  
  while ($row=mysqli_fetch_array($res,MYSQLI_ASSOC)){
  echo "<option value='$row[prod_id]'>$row[prod_name]</option>";   
  }
  
   echo "</select>";
  ?>   
    

    <div class="mb-3 my-3">
    <label for="exampleInputEmail1" class="form-label">Complain Description :</label>
    <textarea class="form-control" name="comp_desc" value="<?php ?>" id="exampleInputEmail1" aria-describedby="emailHelp"></textarea>
  
    <div class="mb-3 my-3">
  <label for="exampleInputEmail1" class="form-label">Status :</label>
  <select name="comp_status" id="comp" class="form-select form-select-lg mb-3 text-center">
    <option value="">---Select---</option>
    <option value="new" selected>New</option>
    <option value="Pendig" disabled>Pending</option>
    <option value="Completed" disabled>Completed</option>
  </select>
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
        </div>
    </div>
</div>

<?php
if(isset($_POST['submit'])){
    $cid=$_POST['cid'];
    $comp_id=$_POST['comp_id'];
    $prod_id=$_POST['prod_id'];
    $comp_desc=$_POST['comp_desc'];
    $comp_status=$_POST['comp_status'];
    $str="insert into complain values ('$cid','$comp_id','$prod_id','$comp_desc','$comp_status')";
    $query=mysqli_query($conn,$str);
    // echo $str;
}    
echo "<table class='table-hover table text-center'>";
echo "<th>Customer Id</th><th>Complain ID</th><th>Product Id</th><th>Complain_Desc</th><th>Complain Status</th>";
     $str="select * from complain where cid='".$_GET['id']."'";
     $query=mysqli_query($conn,$str);
     while($row=mysqli_fetch_array($query)){
        $cid=$row[0];
        $comp_id=$row[1];
        $prod_id=$row[2];
        $comp_desc=$row[3];
        $comp_status=$row[4];
    echo "<tr><td>$cid</td><td>$comp_id</td><td>$prod_id</td><td>$comp_desc</td><td>$comp_status</td></tr>";
     }
    echo "</table>";

?>


</body>
</html>
<?php
include 'footer.php';
?>