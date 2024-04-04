<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "../../koneksi.php";

    $nama = $_POST["nama"];
    $jenis_barang = $_POST["jenis_barang"];
    $harga = $_POST["harga"];
    $stok = $_POST["stok"]; // Mengambil nilai stok dari formulir
    $deskripsi = $_POST["deskripsi"];
    
    $gambar = $_FILES["gambar"]["name"];
    $gambar_tmp = $_FILES["gambar"]["tmp_name"];
    $gambar_path = "../../storage/img_barang/" . $gambar;

    // Validasi bahwa stok tidak boleh 0
    if ($stok == 0) {
        echo "Stock cannot be 0. Please input a valid stock quantity.";
        exit();
    }

    // Memastikan nama file unik untuk mencegah penimpaan
    $unique_filename = uniqid() . '_' . $gambar;
    $gambar_path = "../../storage/img_barang/" . $unique_filename;
    move_uploaded_file($gambar_tmp, $gambar_path);

    // Query untuk memasukkan data ke dalam database
    $sql = "INSERT INTO barang (nama, jenis_barang, harga, stok, deskripsi, gambar) 
            VALUES (?, ?, ?, ?, ?, ?)";
    
    // Persiapkan statement
    $stmt = mysqli_prepare($koneksi, $sql);
    
    // Bind parameter ke statement
    mysqli_stmt_bind_param($stmt, "ssdiss", $nama, $jenis_barang, $harga, $stok, $deskripsi, $unique_filename);
    
    // Eksekusi statement
    if (mysqli_stmt_execute($stmt)) {
        echo "Barang berhasil ditambahkan.";
        header("Location: ../../views/pegawai_toko/pages/tambah_barang.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }

    // Tutup statement
    mysqli_stmt_close($stmt);
    mysqli_close($koneksi);
} else {
    header("Location: ../../views/pegawai_toko/pages/tambah_barang.php");
    exit();
}
?>