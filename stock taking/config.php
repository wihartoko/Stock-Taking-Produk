<!-- menghubungkan database -->
<?php
$servername = "localhost";
$username = "root"; // default username untuk MySQL di XAMPP
$password = ""; // password kosong untuk default XAMPP
$dbname = "stok_produk";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>