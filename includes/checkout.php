<?php
@include 'config.php';

if(isset($_POST['order_btn'])){
   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $method = $_POST['method'];
   
   $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
   $price_total = 0;
   $product_name = array(); // Initialize an array to store product names
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['name'] .' ('. $product_item['quantity'] .') ';
         $product_price = $product_item['price'] * $product_item['quantity'];
         $price_total += $product_price;
      };
   }

   $total_product = implode(', ', $product_name);
   $detail_query = mysqli_query($conn, "INSERT INTO `orders` (name, number, email, total_products, total_price) VALUES ('$name', '$number', '$email', '$total_product', '$price_total')") or die('query failed');
     if($cart_query && $detail_query){
      echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>Thank you for shopping!</h3>
         <div class='order-detail'>
            <span>".$total_product."</span>
            <span class='total'> Total: $".$price_total."/-  </span>
         </div>
         <div class='customer-details'>
            <p>Your name: <span>".$name."</span></p>
            <p>Your number: <span>".$number."</span></p>
            <p>Your email: <span>".$email."</span></p>
            <p>Your payment mode: <span>".$method."</span></p>
            <p><div>
<p>eSewa</a>
</div></p>
         </div>
      </div>
      </div>
      ";
   }
}
 $id = uniqid();

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Checkout</title>

   <!-- Font Awesome CDN link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- Custom CSS file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="pro.css">
</head>
<body>
<div class="container">
   <section class="checkout-form">
      <h1 class="heading">Complete Your Order</h1>
      <form action="" method="post">
         <div class="display-order">
            <?php
            $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
            $grand_total = 0; // Initialize grand total
            if(mysqli_num_rows($select_cart) > 0){
               while($fetch_cart = mysqli_fetch_assoc($select_cart)){
                  $total_price = $fetch_cart['price'] * $fetch_cart['quantity'];
                  $grand_total += $total_price; // Update grand total
            ?>
            <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
            <?php
               }
            } else {
               echo "<div class='display-order'><span>Your cart is empty!</span></div>";
            }
            ?>
            <span class="grand-total">Grand Total: Rs. <?= number_format($grand_total, 2); ?>/-</span>
         </div>
         <div class="flex">
            <div class="inputBox">
               <span>Your Name</span>
               <input type="text" placeholder="Enter your name" name="name" required>
            </div>
            <div class="inputBox">
               <span>Your Number</span>
               <input type="number" placeholder="Enter your number" name="number" required>
            </div>
            <div class="inputBox">
               <span>Your Email</span>
               <input type="email" placeholder="Enter your email" name="email" required>
            </div>
            <div class="inputBox">
               <span>Payment Method</span>
               <select name="method">
                  <option value="cash on delivery" selected>Cash on Delivery</option>
                  <option value="eSewa" >eSewa</option>

               </select>
            </div>
         </div>
         
      </form>
      <div class="esewa-button">
    
         <body>
    <form action="https://uat.esewa.com.np/epay/main" method="POST">

    <input value="<?php echo $grand_total; ?>" name="tAmt" type="hidden">
    <input value="<?php echo $grand_total; ?>" name="amt" type="hidden">
    <input value="0" name="txAmt" type="hidden">
    <input value="0" name="psc" type="hidden">
    <input value="0" name="pdc" type="hidden">
    <input value="EPAYTEST" name="scd" type="hidden">
    <input value="<?php echo $id; ?>" name="pid" type="hidden">
    <input type="hidden" name="customer_id" value="<?php echo isset($result['customer_id'])? $result['customer_id']: '';?>">
    <input value="http://localhost/SP/includes/esewa_payment_success.php" type="hidden" name="su">
    <input value="http://localhost/SP/includes/esewa_payment_failed.php" type="hidden" name="fu">
    <input type="submit" value="Pay" name="order_btn" class="btn">
    </form>
</body> 
      </div>
   </section>
</div>

<!-- Custom JS file link  -->
<script src="js/script.js"></script>
</body>
</html>
