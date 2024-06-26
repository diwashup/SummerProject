<?php
session_start();
echo "Welcome ".$_SESSION['user_name'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>home</title>

   
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />

    <link rel="stylesheet" href="../css/style.css" />
    <script src="../js/script.txt" defer></script>
  </head>
  <body>
  <header class="header">
      <a href="#" class="logo"> Optics Gallery </a>
      <nav class="navbar">
        <ul>
          <li><a href="user_product.php">products</a></li>
          
        </ul>
      </nav>
      <div class="icons">
        <div id="menu-btn" class="fas fa-bars"></div>
        <a href="cart.php" class="fas fa-shopping-cart"></a>
      </div>
      <div class="icons">
        <a href="logout.php"onclick="return confirm('are you sure want to logout??')">logout</a>
      </div>
    </header>
    <!-- home section starts      -->

    <section class="home">
      <div
        class="slide active"
        style="background: url(images/f.jpeg) no-repeat"
      >
        <div class="content">
          <span>protect your eyes</span>
          <h3>upto 50% off</h3>
        </div>
      </div>

      <div
        class="slide"
        style="background: url(images/home-bg-2.png) no-repeat"
      >
        <div class="content">
          <span>protect your eyes</span>
          <h3>upto 50% off</h3>
          <a href="user_product.php" class="btn">shop now</a>
        </div>
      </div>

      <div
        class="slide"
        style="background: url(images/home-bg-3.png) no-repeat"
      >
        <div class="content">
          <span>protect your eyes</span>
          <h3>upto 50% off</h3>
          <a href="user_product.php" class="btn">shop now</a>
        </div>
      </div>
    </section>

    <!-- home section ends     -->

    <!-- banner section starts  -->

    <section class="banner">
      <div class="box">
        <img src="images/banner-1.jpg" alt="" />
        <div class="content">
          <span>special offer</span>
          <h3>upto 50% off</h3>
          <a href="user_product.php" class="btn">shop now</a>
        </div>
      </div>

      <div class="box">
        <img src="images/banner-2.jpg" alt="" />
        <div class="content">
          <span>special offer</span>
          <h3>upto 50% off</h3>
          <a href="user_product.php" class="btn">shop now</a>
        </div>
      </div>

      <div class="box">
        <img src="images/banner-3.jpg" alt="" />
        <div class="content">
          <span>special offer</span>
          <h3>upto 50% off</h3>
          <a href="user_product.php" class="btn">shop now</a>
        </div>
      </div>
    </section>

    <!-- banner section ends -->

    <!-- footer section starts  -->

    <section class="footer">
      <div class="box-container">
        <div class="box">
          <h3>quick links</h3>
          <a href="home.php"> <i class="fas fa-angle-right"></i> home</a>
          <a href="products.html">
            <i class="fas fa-angle-right"></i> products</a
          >
          <a href="about.html"> <i class="fas fa-angle-right"></i> about</a>
          <a href="blogs.html"> <i class="fas fa-angle-right"></i> blogs</a>
          <a href="contact.html"> <i class="fas fa-angle-right"></i> contact</a>
          <a href="login.php"> <i class="fas fa-angle-right"></i> login</a>
          <a href="register.php">
            <i class="fas fa-angle-right"></i> register</a
          >
          <a href="cart.html"> <i class="fas fa-angle-right"></i> cart</a>
        </div>

        <div class="box">
          <h3>extra links</h3>
          <a href="#"> <i class="fas fa-angle-right"></i> my account </a>
          <a href="#"> <i class="fas fa-angle-right"></i> my order </a>
          <a href="#"> <i class="fas fa-angle-right"></i> my wishlist </a>
          <a href="#"> <i class="fas fa-angle-right"></i> terms of use </a>
          <a href="#"> <i class="fas fa-angle-right"></i> privacy policy </a>
        </div>

        <div class="box">
          <h3>follow us</h3>
          <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
          <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
          <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
          <a href="#"> <i class="fab fa-pinterest"></i> pinterest </a>
          <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a>
        </div>
<!--
        <div class="box">
          <h3>newsletter</h3>
          <p>subscribe for latest updates</p>
          <form action="">
            <input type="email" placeholder="enter your emal" />
            <input type="submit" value="subscribe" class="btn" />
          </form>
        </div>
      </div>

      <div class="credit">
        created by <span>mr .web designer</span> | all rights reserved
      </div>
    </section>

    <!-- footer section ends -->
  </body>
</html>
