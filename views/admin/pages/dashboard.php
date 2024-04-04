<?php
require "../../../koneksi.php";

session_start();

if (!($_SESSION['role'] == "admin")) {
	header('Location: ../../../views/auth/pages/login.php');
	exit;
}

// Fetch users from the database
$sql_select = "SELECT * FROM users";
$result = $koneksi->query($sql_select);

?>

<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User List - Admin Panel | Tamusic</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="../../../assets/css/main.css">
</head>

<body class="">
	<!-- Navbar -->
	<?php require "../partials/navbar.php"; ?>
	<div class="container mt-4">
		<h1 class="fw-bold mb-4">User List</h1>
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>ID</th>
								<th>Nama</th>
								<th>Username</th>
								<th>Role</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if ($result->num_rows > 0) :
								while ($row = $result->fetch_assoc()) :
							?>
									<tr>
										<td><?= $row["id"] ?></td>
										<td><?= $row["Nama"] ?></td>
										<td><?= $row["username"] ?></td>
										<td><?= $row["role"] ?></td>
										<td class="d-flex">
											<form method='post' action="../../../process/auth/hapus.php">
												<input type='hidden' name='user_id' value='<?= $row["id"] ?>'>
												<button type='submit' class='btn btn-danger btn-sm me-2' name='delete_user'>Delete</button>
											</form>

											<a href='edit_akun.php' class='btn btn-info btn-sm' name='edit_user'>Edit</a>
										</td>
									</tr>
								<?php
								endwhile;
							else :
								?>
								<tr>
									<td colspan='5'>0 results</td>
								</tr>
							<?php endif; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<!-- Form Tambah Carousel -->
	<div class="container mt-4">
		<h1 class="fw-bold mb-4">Carousel</h1>
		<div class="card">
			<div class="card-body">
				<form action="../../../process/util_admin/tambah_carousel.php" method="post" enctype="multipart/form-data">
					<div class="mb-3">
						<label for="image" class="form-label">Choose Image</label>
						<input type="file" class="form-control" id="image" name="image" accept="image/*" required>
					</div>
					<button type="submit" class="btn btn-primary" name="submit">Tambah</button>
				</form>
			</div>
		</div>
	</div>

	<!-- Table Carousel -->
	<div class="container mt-4">
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>ID</th>
								<th>Image</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							// Fetch carousel images from the database
							$sql_select_carousel = "SELECT * FROM carousel_images";
							$result_carousel = $koneksi->query($sql_select_carousel);

							if ($result_carousel->num_rows > 0) :
								while ($row_carousel = $result_carousel->fetch_assoc()) :
							?>
									<tr>
										<td><?= $row_carousel["id"] ?></td>
										<td><img src="../../../storage/carousel/<?= $row_carousel["image_url"] ?>" alt="Carousel Image" style="max-width: 150px;"></td>
										<td>
											<form action="../../../process/util_admin/hapus_carousel.php" method="post" class="d-inline">
												<input type="hidden" name="carousel_id" value="<?= $row_carousel["id"] ?>">
												<button type="submit" class="btn btn-danger btn-sm" name="delete_carousel">Delete</button>
											</form>
										</td>
									</tr>
								<?php
								endwhile;
							else :
								?>
								<tr>
									<td colspan='3'>No carousel images found</td>
								</tr>
							<?php endif; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<!-- Footbar -->
	<?php require "../partials/footbar.php"; ?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>