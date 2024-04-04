<?php
session_start();
require "../../koneksi.php";

if (isset($_POST['delete_user'])) {
  $user_id = $_POST['user_id'];
  $sql_delete = "DELETE FROM users WHERE id=$user_id";
  if ($koneksi->query($sql_delete) === TRUE) {
    header("Location: ../../views/admin/pages/dashboard.php");
  } else {
    echo "Error deleting user: " . $koneksi->error;
  }
}
