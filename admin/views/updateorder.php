<?php
session_start();
include('../configs/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:index.php');
    exit();
}

$orderId = intval($_GET['oid']);

if (isset($_POST['submit'])) {
    $status = $_POST['status'];
    $remark = $_POST['remark'];
    mysqli_query($con, "UPDATE orders SET orderStatus='$status', remark='$remark' WHERE id='$orderId'");
    $_SESSION['msg'] = "Order updated successfully!";
    header("location: updateorder.php?oid=" . $orderId);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin | Update Order</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css1/theme.css">
    <link rel="stylesheet" href="../assets/images1/icons/css/font-awesome.css">
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
                            <h3>Update Order</h3>
                        </div>
                        <div class="module-body">

                            <?php if (isset($_SESSION['msg'])) { ?>
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <?php echo htmlentities($_SESSION['msg']); unset($_SESSION['msg']); ?>
                                </div>
                            <?php } ?>

                            <form class="form-horizontal row-fluid" method="post">
                                <div class="control-group">
                                    <label class="control-label" for="status">Order Status</label>
                                    <div class="controls">
                                        <select name="status" id="status" class="span8" required>
                                            <option value="">-- Select Status --</option>
                                            <option value="In Process">In Process</option>
                                            <option value="Delivered">Delivered</option>
                                            <option value="Cancelled">Cancelled</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="remark">Remark</label>
                                    <div class="controls">
<textarea name="remark" id="remark" class="span8" rows="5" placeholder="Enter remark (optional)"></textarea>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <div class="controls">
                                        <button type="submit" name="submit" class="btn btn-success">Update Order</button>
                                        <a href="pending-orders.php" class="btn btn-secondary">Back to Orders</a>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div><!-- /.module -->
                </div><!-- /.content -->
            </div><!-- /.span9 -->
        </div>
    </div><!-- /.container -->
</div><!-- /.wrapper -->

<?php include('../views/layout/footer.php'); ?>

<script src="../assets/scripts/jquery-1.9.1.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>