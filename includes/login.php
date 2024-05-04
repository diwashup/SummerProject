<?php
session_start();
?>
<?php
// $message="";

    if (isset($_POST['submit'])) {
	$conn = mysqli_connect('localhost','root','','sp') or die('Unable to connect');
	$name=$_POST["name"];
	$password=$_POST["pass"];
	$sql="SELECT * FROM customer where customer_username='$name' and customer_password='$password'";
	$result= mysqli_query($conn,$sql);
	$row=mysqli_num_rows($result);
	if ($row) {
		$user_pass=mysqli_fetch_assoc($result);
        $db_pass=$user_pass['customer_password'];
      
        if($db_pass){
            $_SESSION['user_name']=$name;
            header('location:user.php');
        }
        else{
            echo "password incorrect"; 
        }
	}
	else 
	{
		echo "invalid username";
	}
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>login</title>

   
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />


    <link rel="stylesheet" href="../css/style.css" />
    <script src="../js/script.txt" defer></script>
  </head>
  <body>
  <?php
    include_once 'header.php';
    ?>
    <!-- login form section starts -->
   

    <section class="login-form">
    <form method="POST" action="<?php echo$_SERVER['PHP_SELF']?>">
        <h3>user login</h3>
        <div class="inputBox">
          <span class="fas fa-user"></span>
          <input type="text" name="name" placeholder="enter username"  id="" />
        </div>
        <div class="inputBox">
          <span class="fas fa-lock"></span>
          <input
            type="password"
            name="pass"
            placeholder="enter your password"
            id=""
          />
        </div>
        <input type="submit" value="log in" class="btn"  name="submit"/>
        <div class="flex">+
          <input type="checkbox" name="" id="remember-me" />
          <label for="remember-me">remember me</label>
          <a href="#">forgot password?</a>
        </div>
        <a href="register.php" class="btn">create an account</a>
      </form>
    </section>

    <!-- login form section ends -->

    <!-- footer section starts  -->

    
  </body>
</html>
