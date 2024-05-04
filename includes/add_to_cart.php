<?php
// Include the database connection configuration
include 'config.php';

// Initialize the $message array
$message = [];

// Check if the "Add to Cart" button is clicked
if (isset($_POST['add_to_cart'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = 1; // You can change this to allow users to specify the quantity.

    // Check if the product is already in the cart
    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");

    if (mysqli_num_rows($select_cart) > 0) {
        $message[] = 'Product already added to cart';
    } else {
        // Insert the product into the cart
        $insert_product = mysqli_query($conn, "INSERT INTO `cart` (name, price, image, quantity) VALUES ('$product_name', '$product_price', '$product_image', '$product_quantity')");

        if ($insert_product) {
            $message[] = 'Product added to cart successfully';
        } else {
            $message[] = 'Failed to add product to cart';
        }
    }
}

// Redirect back to the previous page (where the product list is displayed)
header('Location: cart.php');
exit();
?>
