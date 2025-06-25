<?php
include 'db_connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM invoices WHERE id='$id'");
    $invoice = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Print Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        window.onload = function() { window.print(); }
    </script>
</head>
<body>
<div class="container mt-5">
    <h2>Invoice</h2>
    <table class="table table-bordered">
        <tr><th>Client ID</th><td><?php echo $invoice['client_id']; ?></td></tr>
        <tr><th>Client Name</th><td><?php echo $invoice['client_name']; ?></td></tr>
        <tr><th>Age</th><td><?php echo $invoice['age']; ?></td></tr>
        <tr><th>Gender</th><td><?php echo $invoice['gender']; ?></td></tr>
        <tr><th>Address</th><td><?php echo $invoice['address']; ?></td></tr>
        <tr><th>Product</th><td><?php echo $invoice['product']; ?></td></tr>
        <tr><th>Quantity</th><td><?php echo $invoice['quantity']; ?></td></tr>
        <tr><th>Price</th><td><?php echo $invoice['price']; ?></td></tr>
        <tr><th>Tax</th><td><?php echo $invoice['tax']; ?></td></tr>
        <tr><th>Total</th><td><?php echo $invoice['total']; ?></td></tr>
    </table>
</div>
</body>
</html>