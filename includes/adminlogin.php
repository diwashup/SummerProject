<?php
session_start();
?>
<?php

if (isset($_POST['login'])) {
	$conn = mysqli_connect('localhost','root','','sp') or die('Unable to connect');
	$name=$_POST["name"];
	$password=$_POST["pass"];
	$sql="SELECT * FROM admin where admin_name='$name' and admin_password='$password'";
	$result= mysqli_query($conn,$sql);
	$row=mysqli_num_rows($result);
  $user_password=[];
	if ($row) {
		$user_password=mysqli_fetch_assoc($result);
        $db_pass=$user_password['admin_password'];
        $_SESSION['name']=$user_password;
        if($db_pass){
            
            header("location:../admin/includes/index.php");          
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
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login Panel</title>
  <link rel="stylesheet" href="../css/style2.css">
</head>
<body>
  
  <div class="container">
    <div class="myform">
      <form method="post" action="<?php echo$_SERVER['PHP_SELF']?>">
        <h2>ADMIN LOGIN</h2>
        <input type="text"  name="name" placeholder="Admin Name">
        <input type="password" name="pass" placeholder="Password">
        <button type="submit" name="login">LOGIN</button>
      </form>
    </div>
    <div class="image">
      <img src="../includes/images/image.jpg">
    </div>
  </div>

</body>
</html>