<?php
require("../../koneksi.php");

session_start();

// Check if user is logged in, if not redirect to login page or handle accordingly
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page or handle accordingly
    header("Location: ../../views/auth/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the required fields are set
    if (!isset($_POST['id_barang'], $_POST['rating'])) {
        echo "<p>Product ID or rating is missing.</p>";
        exit();
    }
    
    // Get product ID and rating from the form submission
    $product_id = mysqli_real_escape_string($koneksi, $_POST['id_barang']);
    $rating = intval($_POST['rating']); // Convert rating to integer
    
    // Get user ID from session
    $user_id = $_SESSION['user_id'];
    
    // Check if the review already exists for this product and user
    $check_query = "SELECT * FROM ulasan WHERE id_barang = '$product_id' AND id_user = '$user_id'";
    $check_result = mysqli_query($koneksi, $check_query);
    
    if (!$check_result) {
        echo "<p>Error checking review existence: " . mysqli_error($koneksi) . "</p>";
        exit();
    }
    
    if (mysqli_num_rows($check_result) > 0) {
        // Review already exists for this product and user
        echo "<p>You have already reviewed this product.</p>";
        exit();
    }
    
    // Insert the review into the database
    $query = "INSERT INTO ulasan (id_barang, id_user, rating) VALUES ('$product_id', '$user_id', '$rating')";
    
    if (mysqli_query($koneksi, $query)) {
        // Review successfully added
        header("Location: ../../views/pelanggan/pages/detail_barang.php?id=$product_id&success=1");
        exit();
    } else {
        // Error adding review
        echo "<p>Error adding review: " . mysqli_error($koneksi) . "</p>";
    }
} else {
    // If the form is not submitted via POST method, handle accordingly
    echo "<p>Invalid request method.</p>";
    exit();
}
?>
