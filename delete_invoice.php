<?php
include 'db_connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM invoices WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php?success=Record deleted successfully");
    } else {
        echo "Error: " . $conn->error;
    }
}