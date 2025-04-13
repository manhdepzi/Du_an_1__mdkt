<?php
session_start();
include('../configs/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {
	if (isset($_POST['submit'])) {
		$category = $_POST['category'];
		$subcat = $_POST['subcategory'];
		$sql = mysqli_query($con, "insert into subcategory(categoryid,subcategory) values('$category','$subcat')");
		$_SESSION['msg'] = "SubCategory Created !!";
	}

	if (isset($_GET['del'])) {
		mysqli_query($con, "delete from subcategory where id = '" . $_GET['id'] . "'");
		$_SESSION['delmsg'] = "SubCategory deleted !!";
	}

?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Admin| SubCategory</title>
		<link type="text/css" href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link type="text/css" href="../assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
		<link type="text/css" href="../assets/css1/theme.css" rel="stylesheet">
		<link type="text/css" href="../assets/images1/icons/css/font-awesome.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
		<link type="text/css" href='../assets/http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
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
									<h3>Sub Category</h3>
								</div>
								<div class="module-body">

									<?php if (isset($_POST['submit'])) { ?>
										<div class="alert alert-success">
											<button type="button" class="close" data-dismiss="alert">×</button>
											<strong>Well done!</strong> <?php echo htmlentities($_SESSION['msg']); ?><?php echo htmlentities($_SESSION['msg'] = ""); ?>
										</div>
									<?php } ?>


									<?php if (isset($_GET['del'])) { ?>
										<div class="alert alert-error">
											<button type="button" class="close" data-dismiss="alert">×</button>
											<strong>Oh snap!</strong> <?php echo htmlentities($_SESSION['delmsg']); ?><?php echo htmlentities($_SESSION['delmsg'] = ""); ?>
										</div>
									<?php } ?>

									<br />

									<form class="form-horizontal row-fluid" name="subcategory" method="post">

										<div class="control-group">
											<label class="control-label" for="basicinput">Category</label>
											<div class="controls">
												<select name="category" class="span8 tip" required>
													<option value="">Select Category</option>
													<?php $query = mysqli_query($con, "select * from category");
													while ($row = mysqli_fetch_array($query)) { ?>

														<option value="<?php echo $row['id']; ?>"><?php echo $row['categoryName']; ?></option>
													<?php } ?>
												</select>
											</div>
										</div>


										<div class="control-group">
											<label class="control-label" for="basicinput">SubCategory Name</label>
											<div class="controls">
												<input type="text" placeholder="Enter SubCategory Name" name="subcategory" class="span8 tip" required>
											</div>
										</div>



										<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn">Create</button>
											</div>
										</div>
									</form>
								</div>
							</div>
                            <?php include('../views/layout/footer.php'); ?>

<script src="../assets/scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="../assets/scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/scripts/flot/jquery.flot.js" type="text/javascript"></script>
<script src="../assets/scripts/datatables/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('.datatable-1').dataTable();
        $('.dataTables_paginate').addClass("btn-group datatable-pagination");
        $('.dataTables_paginate > a').wrapInner('<span />');
        $('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
        $('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
    });
</script>
</body>
<?php } ?>