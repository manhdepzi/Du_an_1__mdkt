<?php
// show-product.php

include '../configs/config.php'; // file này chứa thông tin kết nối DB

$sql = "SELECT p.*, c.categoryName AS category_name, s.subcategory AS subcategory_name 
        FROM products p
        LEFT JOIN category c ON p.category = c.id
        LEFT JOIN subcategory s ON p.subCategory = s.id";

$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html>

<head>
	<title>Danh sách sản phẩm</title>
	<style>
		table {
			width: 100%;
			border-collapse: collapse;
		}

		th,
		td {
			padding: 12px;
			border: 1px solid #ccc;
		}

		img {
			width: 100px;
		}
	</style>
</head>

<body>
	<h2>Danh sách sản phẩm</h2>
	<table>
		<tr>
			<th>ID</th>
			<th>Tên sản phẩm</th>
			<th>Hình ảnh</th>
			<th>Giá</th>
			<th>Danh mục</th>
			<th>Danh mục phụ</th>
		</tr>
		<?php foreach ($result as $row): ?>
			<tr>
				<td><?= $row['id'] ?></td>
				<td><?= $row['productName'] ?></td>
				<td>
					<?php if (!empty($row['productImage1'])): ?>
						<img src="<?= htmlspecialchars($row['productImage1']) ?>" alt="<?= $row['name'] ?? '' ?>">
					<?php else: ?>
						Không có ảnh
					<?php endif; ?>
				</td>
				<td><?= number_format($row['productPrice'], 0, ',', '.') ?> VNĐ</td>
				<td><?= $row['category_name'] ?></td>
				<td><?= $row['subcategory_name'] ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</body>

</html>