<?php
include 'connection.php';
?>
<style>

.text{
    text-align: center; color:black; size: min;
    font-size: 15px;

}



.center{
    text-align: center;
    background-color: lightgray;
    font-size: 100px;


}
</style>
<?php include_once 'header.php'?>
<div class="container">
 <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h2 class="center" >Our Products</h2>
            </div>
        </div>
    </div>
</div>
        


<html>
  <head>
    <!-- Bootstra[ CSS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>CRUD</title>
  </head>
  <body>
    
  <div class="conatiner">
<button class="btn btn-primary my-5"> <a href="addproducts.php" class="text-light"> add
  </a>
</button>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Price</th>
      <th scope="col">Image</th>
      <th scope="col">Quantity</th>


      <th scope="col">Operation</th>

    </tr>
  </thead>
  <tbody>

  <?php
  $sql="select * from product";
  $result=mysqli_query($conn,$sql);
  if($result){
   while($row=mysqli_fetch_assoc($result)){
    $id=$row['Product_id'];
    $name=$row['Name'];
    $description=$row['Description'];
    $price=$row['Price'];
    $file=$row['Image'];
    $quantity=$row['Quantity'];

    echo  '<tr>
       <th scope="row">'.$id.'</th>
      <td>'.$name.'</td>
      <td>'.$description.'</td>
      <td>'.$price.'</td>
      <td>' .$file.'</td>
      <td>'.$quantity.'</td>

      <td>
  <button class="btn btn-primary"><a href="updateproduct.php? updateid='.$id.'" class="text-light">update</a></button>
  <button class="btn btn-danger"><a href="deleteproduct.php? deleteid='.$id.'"class="text-light">delete</a></button>
  
</td>

     </tr>';

   }
  }



?>


  
  </tbody>
</table>


  </div>


  </body>
</html>
