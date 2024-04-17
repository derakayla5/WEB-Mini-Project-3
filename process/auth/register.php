<?php
require '../../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $konfirmasi_password = $_POST["konfirmasi_password"];
    
    if($password <> $konfirmasi_password) {
        echo "
        <script>
        alert('Password tidak sesuai dengan konfirmasi password!');
        document.location.href = '../../views/auth/pages/register.php';
        </script>
        ";
        exit(); 
    }
    
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    if (strlen($password) < 8) {
        echo "
            <script>
            alert('Password harus memiliki minimal 8 karakter!');
            document.location.href = '../../views/auth/pages/register.php';
            </script>
        ";
        exit();
    }

    $check_query = "SELECT * FROM users WHERE username = ?";
    $check_stmt = mysqli_prepare($koneksi, $check_query);
    mysqli_stmt_bind_param($check_stmt, "s", $username);
    mysqli_stmt_execute($check_stmt);
    $result = mysqli_stmt_get_result($check_stmt);

    if (mysqli_num_rows($result) > 0) {
        echo "
            <script>
            alert('Username sudah digunakan!');
            document.location.href = '../../views/auth/pages/register.php';
            </script>
        ";
        exit();
    }

    $query = "INSERT INTO users (username, password, nama) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($koneksi, $query);

    mysqli_stmt_bind_param($stmt, "sss", $username, $hashed_password, $nama);

    if (mysqli_stmt_execute($stmt)) {
        echo "
            <script>
            alert('Akun Berhasil Ditambahkan!');
            document.location.href = '../../views/auth/pages/login.php';
            </script>
        ";
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }

    mysqli_stmt_close($stmt);
}
?>