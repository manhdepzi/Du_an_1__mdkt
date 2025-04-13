<?php
session_start();
include('../configs/config.php');
if(strlen($_SESSION['alogin'])==0) {	
    header('location:index.php');
} else {
    date_default_timezone_set('Asia/Kolkata');
    $currentTime = date('d-m-Y h:i:s A', time());
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin | Pending Orders</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css1/theme.css">
    <link rel="stylesheet" href="../assets/images1/icons/css/font-awesome.css">
    <style>
        .order-table th, .order-table td {
            vertical-align: middle !important;
        }
        .order-table img {
            width: 60px;
            height: auto;
            object-fit: cover;
            border-radius: 5px;
        }
    </style>
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
                            <h3>Pending Orders</h3>
                        </div>
                        <div class="module-body table">
                            <?php if(isset($_GET['del'])) { ?>
                                <div class="alert alert-error">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>Oh snap!</strong> <?php echo htmlentities($_SESSION['delmsg']); ?>
                                    <?php echo htmlentities($_SESSION['delmsg']=""); ?>
                                </div>
                            <?php } ?>
                            <br>
                            <table class="table table-bordered table-striped order-table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email / Contact</th>
                                        <th>Shipping Address</th>
                                        <th>Product</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th>Order Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $status='Delivered';
                                $query = mysqli_query($con,"SELECT 
                                    users.name AS username,
                                    users.email AS useremail,
users.contactno AS usercontact,
                                    users.shippingAddress AS shippingaddress,
                                    users.shippingCity AS shippingcity,
                                    users.shippingState AS shippingstate,
                                    users.shippingPincode AS shippingpincode,
                                    products.productName AS productname,
                                    products.productImage1 AS productimage,
                                    orders.quantity AS quantity,
                                    orders.orderDate AS orderdate,
                                    products.productPrice AS productprice,
                                    orders.id AS id
                                FROM orders 
                                JOIN users ON orders.userId = users.id 
                                JOIN products ON products.id = orders.productId 
                                WHERE orders.orderStatus != '$status' OR orders.orderStatus IS NULL");

                                $cnt = 1;
                                while($row = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?php echo htmlentities($cnt); ?></td>
                                        <td><?php echo htmlentities($row['username']); ?></td>
                                        <td><?php echo htmlentities($row['useremail']) . "<br>" . htmlentities($row['usercontact']); ?></td>
                                        <td>
                                            <?php 
                                                echo htmlentities($row['shippingaddress']) . "<br>" . 
                                                     htmlentities($row['shippingcity']) . ", " . 
                                                     htmlentities($row['shippingstate']) . " - " . 
                                                     htmlentities($row['shippingpincode']);
                                            ?>
                                        </td>
                                        <td>
                                            <strong><?php echo htmlentities($row['productname']); ?></strong><br>
                                            <?php if(!empty($row['productimage'])): ?>
                                                <img src="../productimages/<?php echo htmlentities($row['productimage']); ?>" alt="">
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo htmlentities($row['quantity']); ?></td>
                                        <td>$<?php echo htmlentities($row['productprice']); ?></td>
                                        <td><?php echo htmlentities($row['orderdate']); ?></td>
                                        <td>
										<a href="order-information.php?order_id=<?php echo $row['id']; ?>" class="btn btn-info btn-sm">View</a>
										<a href="updateorder.php?oid=<?php echo htmlentities($row['id']); ?>" class="btn btn-sm btn-primary">Update</a>
                                        </td>
                                    </tr>
                                <?php $cnt++; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!--/.content-->
            </div><!--/.span9-->
        </div>
    </div><!--/.container-->
</div><!--/.wrapper-->

<?php include('../views/layout/footer.php'); ?>
<script src="../assets/scripts/jquery-1.9.1.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
<?php } ?>