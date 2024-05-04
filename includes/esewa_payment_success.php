<?php
session_start();

// Include your database connection code here
// For example:
$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "sp";

// Create a connection to the database
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_REQUEST['oid']) && isset($_REQUEST['amt']) && isset($_REQUEST['refId'])) {
    // Fetch payment details from the request
    $order_id = $_REQUEST['oid'];
    $amount = $_REQUEST['amt'];
    $ref_id = $_REQUEST['refId'];

    // Prepare and execute the INSERT statement for payment details
    $sql = "INSERT INTO payment (customer_id, amount, payment_method, created_at)
        VALUES (?, ?, 'eSewa', NOW())";

    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $customer_id = $_SESSION['customer_id'];
        $stmt->bind_param('sd', $customer_id, $amount);
        $result = $stmt->execute();

        if ($result) {
            // Redirect to a success page or display a success message
            header('Location: success.php');
        } else {
            echo "Error executing statement: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
} elseif (isset($_POST['tAmt']) && isset($_POST['pid'])) {
    // Retrieve customer data from eSewa callback
    $name = $_POST['name']; // Modify this to match the POST field name from eSewa
    $number = $_POST['number']; // Modify this to match the POST field name from eSewa
    $email = $_POST['email']; // Modify this to match the POST field name from eSewa
    $method = $_POST['method']; // Modify this to match the POST field name from eSewa

    // Insert customer data into the "orders" table
    $total_product = ''; // Modify this to get the products if needed
    $price_total = $_POST['tAmt']; // Total price from eSewa

    $detail_query = mysqli_query($conn, "INSERT INTO `orders` (name, number, email, total_products, total_price) VALUES ('$name', '$number', '$email', '$total_product', '$price_total')") or die('query failed');

    if ($detail_query) {
        // The data has been successfully inserted into the "orders" table.
        // You can display a success message or redirect the user to a thank you page.
        echo "Payment successful. Thank you for your order!";
    } else {
        // Handle the case where the data insertion fails.
        echo "Payment successful, but there was an issue processing your order. Please contact support.";
    }
} else {
    // Handle the case where eSewa callback data is missing or invalid.
    echo "Invalid callback data. Please try again or contact support.";
}

// Close the database connection
$conn->close();
?>
