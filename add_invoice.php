<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $client_id = $_POST['client_id'];
    $client_name = $_POST['client_name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $product = $_POST['product'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $tax = $_POST['tax'];

    $total = ($price * $quantity) + $tax;

    $sql = "INSERT INTO invoices (client_id, client_name, age, gender, address, product, quantity, price, tax, total) 
            VALUES ('$client_id', '$client_name', '$age', '$gender', '$address', '$product', '$quantity', '$price', '$tax', '$total')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?success=Record added successfully");
    } else {
        echo "Error: " . $conn->error;
    }
}