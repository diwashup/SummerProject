<?php
include 'connection.php';
$id=$_GET['updateid'];
$sql="select * from product where Product_id=$id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['Name'];
$description=$row['Description'];
$price=$row['Price'];
$file=$row['Image'];
$quantity=$row['Quantity'];





if(isset($_POST['submit'])){
  $name=$_POST['pname'];
  $description=$_POST['des'];

  $price=$_POST['price'];

  $file=$_FILES['image'];
    $quantity=$_POST['qty'];
 // print_r($file);
 $filename=$file['name'];
 $filepath=$file['tmp_name'];
 $fileerror=$file['error'];
 
 if($fileerror==0){
     $destfile='images/'.$filename;
     // echo "$destfile";
     move_uploaded_file($filepath,$destfile);


  $sql="update  product set Product_id=$id,Name='$name',Description='$description',Price='$price',Image='$destfile' where Product_id=$id ";
  $result=mysqli_query($conn,$sql);
  if($result){
    header('location:products.php');
  }else{
    die(mysqli_error($conn));
  }
}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>
    Specs Management System
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.min.css" rel="stylesheet" />
  <style>
    .form-control{
      border: 1px solid black;
      padding: 8px 10px;
    }
  </style>
</head>

<body class="g-sidenav-show  bg-gray-200">

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    
<div class="container">
 <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Update Product</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="#" enctype="multipart/form-data">
                <label for="">Name</label>
                    <input type="text" name="pname" class="form-control" value="<?php echo $name;?>" >
                <label for="">Description</label>
                    <input type="text"  name="des" class="form-control" value="<?php echo $description;?>" >
                <label for="">Price</label>
                    <input type="text"  name="price" class="form-control" value="<?php echo $price;?>">
                <label for="">Image</label>
                    <input type="file" name="image" class="form-control"value="<?php echo $file;?>" >
                <label for="">Quantity</label>
                    <input type="text"  name="qty"class="form-control"value="<?php echo $quantity;?>" >
                    <button type="submit" class="btn btn-primary" name="submit">Update</button>
                </form>
            </div>
        </div>
    </div>
 </div>
</div>
</main>
</body>
</html>
