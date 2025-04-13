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
								<br>
								<div class="module-head">
									<h3>Sub Category</h3>
								</div>
								<div>
								<a href="add-subCategory.php"><i class="btn btn-primary">Thêm loại sản phẩm</i></a>
								</div>
								<div class="module-body table">
									<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
										<thead>
											<tr>
												<th>#</th>
												<th>Category</th>
												<th>Description</th>
												<th>Creation date</th>
												<th>Last Updated</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>

											<?php $query = mysqli_query($con, "select subcategory.id,category.categoryName,subcategory.subcategory,subcategory.creationDate,subcategory.updationDate from subcategory join category on category.id=subcategory.categoryid");
											$cnt = 1;
											while ($row = mysqli_fetch_array($query)) {
											?>
												<tr>
													<td><?php echo htmlentities($cnt); ?></td>
													<td><?php echo htmlentities($row['categoryName']); ?></td>
													<td><?php echo htmlentities($row['subcategory']); ?></td>
													<td> <?php echo htmlentities($row['creationDate']); ?></td>
													<td><?php echo htmlentities($row['updationDate']); ?></td>
													<td>

														<a href="edit-subcategory.php?id=<?php echo $row['id'] ?>"><i class="icon-edit"></i></a>
														<a href="subcategory.php?id=<?php echo $row['id'] ?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="icon-remove-sign"></i></a>
													</td>
												</tr>
											<?php $cnt = $cnt + 1;
											} ?>

									</table>
								</div>
							</div>



						</div><!--/.content-->
					</div><!--/.span9-->
				</div>
			</div><!--/.container-->
		</div><!--/.wrapper-->

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