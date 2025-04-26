<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Restaurant Order Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="text-center mb-4">Restaurant Order Booking</h2>

    <div class="card p-4 shadow">
        <form action="order.php" method="POST">
            <div class="mb-3">
                <label class="form-label">Customer Name</label>
                <input type="text" name="customer_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Select Items</label><br>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="items[]" value="Burger-100">
                    <label class="form-check-label">Burger (₹100)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="items[]" value="Pizza-250">
                    <label class="form-check-label">Pizza (₹250)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="items[]" value="Pasta-180">
                    <label class="form-check-label">Pasta (₹180)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="items[]" value="Coke-50">
                    <label class="form-check-label">Coke (₹50)</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100">Book Order</button>
        </form>
    </div>
</div>

</body>
</html>
