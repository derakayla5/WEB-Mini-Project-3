<?php
require("../../koneksi.php");

session_start();

// Check if user is logged in, if not redirect to login page or handle accordingly
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page or handle accordingly
    header("Location: ../../views/auth/login.php");
    exit();
}

if (isset($_POST['tambah_wishlist'])) {
    // Check if the 'id_barang' key is set in the $_POST array
    if (!isset($_POST['id_barang'])) {
        echo "<p>Product ID is missing.</p>";
        exit(); // Stop further execution
    }
    
    // Get product ID from the form submission
    $product_id = mysqli_real_escape_string($koneksi, $_POST['id_barang']);
    
    // Get user ID from session
    $user_id = $_SESSION['user_id'];
    
    // Check if the product already exists in the wishlist for this user
    $query = "SELECT * FROM wishlist WHERE id_user = $user_id AND id_barang = $product_id";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        echo "<p>Error querying database: " . mysqli_error($koneksi) . "</p>";
        exit(); // Stop further execution
    }

    if (mysqli_num_rows($result) > 0) {
        // Product already exists in the wishlist
        echo "<p>Product already exists in the wishlist.</p>";
    } else {
        // Fetch product details from the products table to be added to the wishlist
        $product_query = "SELECT * FROM barang WHERE id = $product_id";
        $product_result = mysqli_query($koneksi, $product_query);
        
        if (!$product_result) {
            echo "<p>Error querying database: " . mysqli_error($koneksi) . "</p>";
            exit(); // Stop further execution
        }
        
        if (mysqli_num_rows($product_result) > 0) {
            $product_row = mysqli_fetch_assoc($product_result);
            
            // Extract product details
            $nama_barang = mysqli_real_escape_string($koneksi, $product_row['nama']);
            $jenis_barang = mysqli_real_escape_string($koneksi, $product_row['jenis_barang']);
            $harga_barang = $product_row['harga'];
            $rating_barang = $product_row['rating_barang'];
            $stok_barang = $product_row['stok'];
            $deskripsi_barang = mysqli_real_escape_string($koneksi, $product_row['deskripsi']);
            $gambar_barang = mysqli_real_escape_string($koneksi, $product_row['gambar']);
            
            // Insert the product into the wishlist along with additional attributes
            $insert_query = "INSERT INTO wishlist (id_barang, nama, jenis_barang, deskripsi, gambar, harga, stok, rating_barang, id_user) 
                 VALUES ('$product_id', '$nama_barang', '$jenis_barang', '$deskripsi_barang', '$gambar_barang', '$harga_barang', '$stok_barang', '$rating_barang', '$user_id')";
            $insert_result = mysqli_query($koneksi, $insert_query);

            if ($insert_result) {
                // Item successfully added to the wishlist
                header("Location: ../../views/pelanggan/pages/semua_barang.php");
                exit();
            } else {
                // Error adding product to the wishlist
                echo "<p>Error adding product to the wishlist: " . mysqli_error($koneksi) . "</p>";
            }
        } else {
            // Product not found
            echo "<p>Product not found.</p>";
        }
    }
}
?>
