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
                <h2 class="center" >Our Payment</h2>
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

  </a>
</button>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Customer_Id</th>
    
      <th scope="col">amount</th>
      <th scope="col">paymentMethod</th>
      <th scope="col">PaidTime</th>
   


      

    </tr>
  </thead>
  <tbody>

  <?php
  $sql="select * from payment";
  $result=mysqli_query($conn,$sql);
  if($result){
   while($row=mysqli_fetch_assoc($result)){
    $id=$row['id'];
    
 
    $price=$row['amount'];
    $paymentmode=$row['payment_method'];
    $paymentTime=$row['created_at'];

    echo  '<tr>
       <th scope="row">'.$id.'</th>
     
      
      <td>'.$price.'</td>
      <td>' .$paymentmode.'</td>
      <td>'.$paymentTime.'</td>

  

     </tr>';

   }
  }



?>


  
  </tbody>
</table>


  </div>


  </body>
</html>
