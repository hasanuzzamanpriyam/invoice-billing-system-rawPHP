<?php include 'db_connection.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Billing System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Invoice Billing System</h2>

    <?php if (isset($_GET['success'])): ?>
        <div class="alert alert-success"><?php echo $_GET['success']; ?></div>
    <?php endif; ?>

    <!-- Add Invoice Form -->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Add New Invoice</h5>
            <form action="add_invoice.php" method="POST">
                <div class="row">
                    <div class="col-md-4">
                        <label>Client ID</label>
                        <input type="text" name="client_id" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label>Client Name</label>
                        <input type="text" name="client_name" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label>Age</label>
                        <input type="number" name="age" class="form-control" required>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-4">
                        <label>Gender</label>
                        <select name="gender" class="form-control" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="col-md-8">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" required>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-4">
                        <label>Product</label>
                        <input type="text" name="product" class="form-control" required>
                    </div>
                    <div class="col-md-2">
                        <label>Quantity</label>
                        <input type="number" name="quantity" class="form-control" required>
                    </div>
                    <div class="col-md-2">
                        <label>Price</label>
                        <input type="number" step="0.01" name="price" class="form-control" required>
                    </div>
                    <div class="col-md-2">
                        <label>Tax</label>
                        <input type="number" step="0.01" name="tax" class="form-control" required>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary mt-4">Add Invoice</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Invoice List -->
    <h4 class="mt-4">Invoice Records</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Client ID</th>
                <th>Client Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Tax</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = $conn->query("SELECT * FROM invoices");
            while ($row = $result->fetch_assoc()):
            ?>
                <tr>
                    <td><?php echo $row['client_id']; ?></td>
                    <td><?php echo $row['client_name']; ?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['product']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['tax']; ?></td>
                    <td><?php echo $row['total']; ?></td>
                    <td>
                        <a href="delete_invoice.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                        <a href="print_invoice.php?id=<?php echo $row['id']; ?>" class="btn btn-secondary btn-sm" target="_blank">Print & Save</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

</body>
</html>