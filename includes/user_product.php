<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your HTML head content -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Products</title>
   
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet"  href="pro.css">
    <script src="../js/script.txt" defer></script>
</head>
<body>
<header class="header">
    <a href="#" class="logo"> Optics Gallery </a>
    <nav class="navbar">
        <ul>
            <li><a href="user_product.php">Products</a></li>
        </ul>
    </nav>
    <div class="icons">
        <div id="menu-btn" class="fas fa-bars"></div>
        <a href="cart.php" class="fas fa-shopping-cart"></a>
    </div>
    <div class="icons">
        <a href="logout.php" onclick="return confirm('Are you sure you want to logout?')">Logout</a>
    </div>
</header>

<section class="products">
    <h1 class="heading">Latest products</h1>
    <div class="box-container">
        <?php
        // Include the database connection configuration
        include 'config.php';

        // Retrieve and display products from the database
        $select_products = mysqli_query($conn, "SELECT * FROM `product`");
        if (mysqli_num_rows($select_products) > 0) {
            while ($fetch_product = mysqli_fetch_assoc($select_products)) {
                ?>
                <form action="add_to_cart.php" method="post">
                    <div class="box">
                        <img src="<?php echo $fetch_product['Image']; ?>" alt="">
                        <h3><?php echo $fetch_product['Name']; ?></h3>
                        <div class="price">Rs <?php echo $fetch_product['Price']; ?>/-</div>
                        <input type="hidden" name="product_name" value="<?php echo $fetch_product['Name']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $fetch_product['Price']; ?>">
                        <input type="hidden" name="product_image" value="<?php echo $fetch_product['Image']; ?>">
                        <input type="submit" class="btn" value="Add to Cart" name="add_to_cart">
                    </div>
                </form>
                <?php
            };
        } else {
            echo '<p>No products available.</p>';
        }
        ?>
    </div>
</section>

</body>
</html>
