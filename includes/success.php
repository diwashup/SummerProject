
<?php
 session_start();

 @include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Receipt</h2>
    <table class="tbl" border="1px solid blue">
        <thead>
            <tr>
                <th class="th">Customer Name</th>
                <th class="th">CustomerId</th>
                <th class="th">Payment Method</th>
                <th class="th">Product Amount</th>
                <th class="th">Payment Date</th>


            </tr>
        </thead>
        <tbody class="tbdy">
            <?php
          $get_products="select * from `payment`";
          $result=mysqli_query($conn,$get_products);
          
          while($row=mysqli_fetch_assoc($result)){
              $payment_id=$row['id'];
              $payment_method=$row['payment_method'];
              $payment_amount=$row['amount'];
              $created_at=$row['created_at'];
          
          }
          ?>

            <td><?php echo   $_SESSION['user_name'];?></td><br>
            <td><?php echo $payment_id;?></td>
            <td><?php echo $payment_method;?></td>
            <td><?php echo $payment_amount;?>/-</td>
            <td><?php echo $created_at;?></td>



        </tbody>



    </table>
    <div>
        <h3>Your payment has been made please print the following receipt in case </h3>
    </div>
    <a href="user_product.php" class="option-btn" style="margin-top: 0;">Continue</a></td></button>
</body>

</html>