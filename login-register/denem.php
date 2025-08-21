<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ürün Filtreleme</title>
</head>
<body>

<form method="POST" action="">
    <label for="category">Kategori:</label>
    <select name="category" id="category">
        <option value="elektronik">Elektronik</option>
        <option value="giyim">Giyim</option>
        <!-- Diğer kategori seçenekleri ekleyebilirsiniz -->
    </select>

    <label for="price">Fiyat Aralığı:</label>
    <input type="number" name="min_price" placeholder="Minimum Fiyat">
    <input type="number" name="max_price" placeholder="Maximum Fiyat">

    <input type="submit" value="Filtrele">
</form>

<?php
// Veritabanı bağlantısı
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zanda";

$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantı kontrolü
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

// Filtreleme formu gönderildiğinde
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST["category"];
    $min_price = $_POST["min_price"];
    $max_price = $_POST["max_price"];

    // SQL sorgusu oluşturma
    $sql = "SELECT * FROM products WHERE category = '$category'";

    if (!empty($min_price)) {
        $sql .= " AND price >= $min_price";
    }

    if (!empty($max_price)) {
        $sql .= " AND price <= $max_price";
    }

    // Sorguyu çalıştırma
    $result = $conn->query($sql);

    // Sonuçları ekrana yazdırma
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<p>Ürün Adı: " . $row["name"] . "</p>";
            echo "<p>Kategori: " . $row["category"] . "</p>";
            echo "<p>Fiyat: " . $row["price"] . "</p>";
            echo "</div>";
        }
    } else {
        echo "Filtreye uygun ürün bulunamadı.";
    }
}

// Veritabanı bağlantısını kapatma
$conn->close();
?>

</body>
</html>
