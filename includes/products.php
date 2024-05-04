
<?php
include 'config.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>products</title>

 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    
    <link rel="stylesheet"href="style.css">
    <script>
        function addToCart(productName, productPrice) {
    // You can implement your cart logic here
    // For now, let's just display an alert with product details
    alert(`Product added to cart:\nName: ${productName}\nPrice: ${productPrice}`);

        }
    </script>
    <link rel="stylesheet" href="pro.css">

    <script src="js/script.js" defer>
    </script>

</head>
<body>
  <?PHP
include_once 'header.php';
  ?>

<section class="products">

   <h1 class="heading">latest products</h1>

   <div class="box-container">

      <?php
      
      $select_products = mysqli_query($conn, "SELECT * FROM `product`");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>

      <form action="cart.php" method="post">
         <div class="box">
            <img src="<?php echo $fetch_product['Image']; ?>" alt="">
            <h3><?php echo $fetch_product['Name']; ?></h3>
            <div class="price">Rs <?php echo $fetch_product['Price']; ?>/-</div>
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['Name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['Price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['Image']; ?>">
           
         </div>
      </form>

      <?php
         };
      };
      ?>

   </div>

</section>
</div>
</body>
</html>
