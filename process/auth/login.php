<?php
session_start();
require "../../koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($koneksi, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row['password'])) {
            $_SESSION['login'] = true;
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['role'] = $row['role'];
            $tipe = $row['role'];

            if ($tipe == 'admin') {
                header("Location: ../../views/admin/pages/dashboard.php");
            } elseif ($tipe == "pegawai_toko") {
                header("Location: ../../views/pegawai_toko/pages/semua_barang.php");
            } elseif ($tipe == "pelanggan") {
                header("Location: ../../views/pelanggan/pages/beranda.php");
            }
            exit();
        } else {
            echo "
                    <script>
                    alert('Invalid Password');
                    document.location.href = '../../views/auth/pages/login.php';
                    </script>
                ";
        }
    } else {
        echo "
                    <script>
                    alert('Invalid Username');
                    document.location.href = '../../views/auth/pages/login.php';
                    </script>
                ";
    }
}
