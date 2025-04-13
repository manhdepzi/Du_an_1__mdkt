<?php
session_start();
include('../configs/config.php');

if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
    exit();
}

if (!isset($_GET['order_id'])) {
    echo "Order ID is missing.";
    exit();
}

$order_id = intval($_GET['order_id']);
$order_query = mysqli_query($con, "
    SELECT orders.*, users.name AS customerName, users.email AS customerEmail 
    FROM orders 
    JOIN users ON users.id = orders.userId 
    WHERE orders.id = '$order_id'
");

$order = mysqli_fetch_assoc($order_query);

if (!$order) {
    echo "Order not found.";
    exit();
}

// Lấy chi tiết sản phẩm
$product_query = mysqli_query($con, "
    SELECT products.productName 
    FROM order_details 
    JOIN products ON products.id = order_details.product_id 
    WHERE order_details.order_id = '$order_id'
");


$products = [];
while ($row = mysqli_fetch_assoc($product_query)) {
    $products[] = $row['productName'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Order Information</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css1/theme.css">
</head>

<body>
    <?php include('../views/layout/header.php'); ?>
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <?php include('../views/layout/sidebar.php'); ?>
                <div class="span9">
                    <div class="content">
                        <div class="module">
                            <div class="module-head">
                                <h3>Order Information</h3>
                            </div>
                            <div class="module-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Order ID</th>
                                        <td><?php echo htmlentities($order['id']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Customer Name</th>
                                        <td><?php echo htmlentities($order['customerName']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Customer Email</th>
                                        <td><?php echo htmlentities($order['customerEmail']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Order Date</th>
                                        <td><?php echo htmlentities($order['orderDate']); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td><strong><?php echo htmlentities($order['orderStatus'] ?: "Processing"); ?></strong></td>
</tr>
                                    <tr>
                                        <th>Products</th>
                                        <td>
                                            <ul>
                                                <?php foreach ($products as $product): ?>
                                                    <li><?php echo htmlentities($product); ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </td>
                                    </tr>
                                </table>
                                <a href="pending-orders.php" class="btn btn-primary">Back to Pending Orders</a>
                                
                            </div>
                        </div>
                    </div><!--/.content-->
                </div>
            </div>
        </div>
    </div>

    <?php include('../views/layout/footer.php'); ?>
</body>

</html>