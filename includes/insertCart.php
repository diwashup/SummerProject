<?PHP
session_start();
$name=$_POST['product_name'];
$price=$_POST['product_price'];
$product_image=$_POST['product_image'];

$product=array($name,$price,$product_image);

$_SESSION[$name]=$product;



?>