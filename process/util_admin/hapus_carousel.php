<?php
require_once "../../koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_carousel"])) {
  $carousel_id = $_POST["carousel_id"];

  // Pilih URL gambar
  $sql_select_image = "SELECT image_url FROM carousel_images WHERE id = $carousel_id";
  $result_select_image = $koneksi->query($sql_select_image);
  if ($result_select_image->num_rows > 0) {
    $row_select_image = $result_select_image->fetch_assoc();
    $image_url = $row_select_image["image_url"];

    // Hapus dari database
    $sql_delete = "DELETE FROM carousel_images WHERE id = $carousel_id";
    if ($koneksi->query($sql_delete) === TRUE) {
      // Hapus file gambar
      $targetDir = "../../storage/carousel/";
      $file_path = $targetDir . $image_url;
      if (unlink($file_path)) {
        header("Location: ../../views/admin/pages/dashboard.php");
        echo "Gambar carousel dan rekaman dihapus dengan berhasil.";
      } else {
        header("Location: ../../views/admin/pages/dashboard.php");
        echo "Error menghapus file gambar carousel.";
      }
    } else {
      header("Location: ../../views/admin/pages/dashboard.php");
      echo "Error menghapus rekaman carousel: " . $koneksi->error;
    }
  } else {
    header("Location: ../../views/admin/pages/dashboard.php");
    echo "Gambar carousel tidak ditemukan.";
  }
} else {
  header("Location: ../../views/admin/pages/dashboard.php");
  echo "Permintaan tidak valid!";
}
