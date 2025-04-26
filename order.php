<?php
ob_start(); // Add this at very top
include 'db.php';

if (isset($_POST['customer_name']) && isset($_POST['items'])) {
    $customer_name = $_POST['customer_name'];
    $items = $_POST['items'];
    $total = 0;
    $items_list = [];

    foreach ($items as $item) {
        list($item_name, $item_price) = explode("-", $item);
        $total += (int)$item_price;
        $items_list[] = $item_name;
    }

    $items_string = implode(", ", $items_list);

    $sql = "INSERT INTO orders (customer_name, items, total_amount) VALUES ('$customer_name', '$items_string', '$total')";

    if ($conn->query($sql) === TRUE) {
        $order_id = $conn->insert_id;
        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Processing Order</title>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Important -->
        </head>
        <body>

        <script>
            Swal.fire({
                icon: 'success',
                title: 'Order Placed Successfully!',
                text: 'Redirecting to Bill...',
                timer: 2000,
                showConfirmButton: false
            }).then(function() {
                window.location.href = "bill.php?id=<?php echo $order_id; ?>";
            });
        </script>

        </body>
        </html>

        <?php
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Invalid Order.";
}
?>
