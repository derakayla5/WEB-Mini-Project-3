<?php
require_once "../../koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
  $targetDir = "../../storage/carousel/";
  $targetFile = $targetDir . basename($_FILES["image"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

  // Periksa apakah file yang diunggah adalah gambar
  $check = getimagesize($_FILES["image"]["tmp_name"]);
  if ($check !== false) {
    header("Location: ../../views/admin/pages/dashboard.php");
    echo "File adalah gambar - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    header("Location: ../../views/admin/pages/dashboard.php");
    echo "File bukan gambar.";
    $uploadOk = 0;
  }

  // Periksa apakah file sudah ada
  if (file_exists($targetFile)) {
    header("Location: ../../views/admin/pages/dashboard.php");
    echo "Maaf, file sudah ada.";
    $uploadOk = 0;
  }

  // Periksa ukuran file
  if ($_FILES["image"]["size"] > 5000000) {
    header("Location: ../../views/admin/pages/dashboard.php");
    echo "Maaf, ukuran file terlalu besar.";
    $uploadOk = 0;
  }

  // Izinkan format file tertentu
  if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    header("Location: ../../views/admin/pages/dashboard.php");
    echo "Maaf, hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.";
    $uploadOk = 0;
  }

  // Periksa jika $uploadOk diatur menjadi 0 karena terjadi kesalahan
  if ($uploadOk == 0) {
    header("Location: ../../views/admin/pages/dashboard.php");
    echo "Maaf, file Anda tidak diunggah.";
  } else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
      // Masukkan ke dalam database
      $image_url = basename($_FILES["image"]["name"]);
      $sql = "INSERT INTO carousel_images (image_url) VALUES ('$image_url')";
      if ($koneksi->query($sql) === TRUE) {
        header("Location: ../../views/admin/pages/dashboard.php");
        echo "File " . htmlspecialchars(basename($_FILES["image"]["name"])) . " telah diunggah.";
      } else {
        header("Location: ../../views/admin/pages/dashboard.php");
        echo "Error: " . $sql . "<br>" . $koneksi->error;
      }
    } else {
      header("Location: ../../views/admin/pages/dashboard.php");
      echo "Maaf, terjadi kesalahan saat mengunggah file Anda.";
    }
  }
} else {
  header("Location: ../../views/admin/pages/dashboard.php");
  echo "Permintaan tidak valid!";
}
