<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Restaurant Bill</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
<?php
if (isset($_GET['id'])) {
    $order_id = $_GET['id'];

    $sql = "SELECT * FROM orders WHERE id = $order_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $order = $result->fetch_assoc();
        ?>

        <div class="card p-4 shadow">
            <h2 class="text-center mb-4">Restaurant Bill</h2>

            <p><strong>Order ID:</strong> <?php echo $order['id']; ?></p>
            <p><strong>Customer Name:</strong> <?php echo $order['customer_name']; ?></p>
            <p><strong>Items:</strong> <?php echo $order['items']; ?></p>
            <p><strong>Total Amount:</strong> ₹<?php echo $order['total_amount']; ?></p>

            <a href="index.php" class="btn btn-success mt-3">Place New Order</a>
        </div>

        <?php
    } else {
        echo "<div class='alert alert-danger'>Order not found.</div>";
    }
} else {
    echo "<div class='alert alert-danger'>Invalid request.</div>";
}
?>
</div>

</body>
</html>
