<!-- menyimpak produk -->
<?php
// Include file koneksi database
include 'config.php';

// Proses form jika disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_produk = $_POST['nama_produk'];
    $jumlah = $_POST['jumlah'];
    $satuan = $_POST['satuan'];
    $harga = $_POST['harga'];

    // Query untuk memasukkan data ke tabel produk
    $sql = "INSERT INTO produk (nama_produk, jumlah,satuan, harga) VALUES ('$nama_produk', '$jumlah','$satuan', '$harga')";

    if ($conn->query($sql) === TRUE) {
        echo "Produk berhasil ditambahkan!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Mengambil data dari tabel produk untuk ditampilkan di tabel
$result = $conn->query("SELECT * FROM produk");

// Tutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="styles.css">
<h1>Stock Taking Produk</h1>

<!-- Form untuk input produk baru -->
<form method="POST" action="">
    <label for="nama_produk">Nama Produk:</label>
    <input type="text" name="nama_produk" required><br>

    <label for="jumlah">Jumlah:</label>
    <input type="number" name="jumlah" required>

    <label for="satuan">Satuan:</label>
    <select name="satuan" required>
        <option value="kg">Kg</option>
        <option value="pcs">Pcs</option>
        <option value="liter">Liter</option>
    </select><br>

    <label for="harga">Harga (Rp):</label>
    <input type="number" name="harga" required><br>

    <button type="submit">Tambah Produk</button>
</form>

<!-- Tabel untuk menampilkan stok produk -->
<table>
    <thead>
        <tr>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Satuan</th>
            <th>Harga (Rp)</th>
            <th>Total Nilai (Rp)</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Tampilkan data produk dari database
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $total_value = $row['jumlah'] * $row['harga'];
                echo "<tr>";
                echo "<td>" . $row['nama_produk'] . "</td>";
                echo "<td>" . $row['jumlah'] . "</td>";
                echo "<td>" . $row['satuan'] . "</td>";
                echo "<td>" . $row['harga'] . "</td>";
                echo "<td>" . $total_value . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Belum ada produk yang ditambahkan.</td></tr>";
        }
        ?>
    </tbody>
</table>

</body>

<footer>
    <div class="footer-content">
        <p>&copy; 2024 Stock Taking App. All Rights Reserved.</p>
        <p>Contact us: <a href="mailto:bawangabang142@gmail.com">bawangabang142@gmail.com</a></p>
        <p>Developer : <a href="instagram.com/wihartoko">Wihartoko</a>
    </div>
</footer>


</html>