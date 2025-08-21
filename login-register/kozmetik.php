<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}

$email = $_SESSION["user"];
// SQL sorgusu
require_once "database.php";
$sql = "SELECT ad, soyad FROM hesaplar WHERE email = '$email'";
$result = $conn->query($sql);
// Veritabanından veri çekme
if ($result->num_rows > 0) {
    // İlk satırı al, çünkü e-posta adresi benzersiz olmalıdır
    $row = $result->fetch_assoc();
    $ad = $row["ad"];
    $soyad = $row["soyad"];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zanda</title>

    <link rel="stylesheet" href="css/kozmetik.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Jost:ital,wght@0,100;1,100&family=Lato:wght@100&family=Montserrat:wght@100&family=Open+Sans:wght@300&family=Poppins:wght@300;500&family=Roboto&family=Vina+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <link rel="shortcut icon" href="image/2.ico" />

</head>

<body>

    
    <div class="head">

        <a href="index.php">
            <img class="logo" src="image/ZANDA/1.png" alt="" width="200px">
        </a>


        <form class="search-form">
            <div class="search-box">
                <input type="text" id="search" placeholder="Ara...">
                <button type="submit"><i class="fas fa-search"></i></button>
            </div>
        </form>

        <nav class="navbar">
            <a href='interface.php'> <i class="fa-solid fa-user"></i> <?php echo " " . $ad . " " . $soyad  ?> </a>
            <span class="kategori">
                <i class="fa-solid fa-layer-group"></i> Kategori
                <ul class="alt-menu">
                    <li><a  href="elektronik.php">Elektronik</a></li>
                    <li><a  href="moda.php">Moda</a></li>
                    <li><a  href="oto.php">Oto, Bahçe, Yapı Market</a></li>
                    <li><a  href="anne.php">Anne, Bebek, Oyuncak</a></li>
                    <li><a  href="spor.php">Spor, Outdoor</a></li>
                    <li><a  href="kozmetik.php">Kozmatik, Kişisel Bakım</a></li>
                    <li><a  href="market.php">Süpermarket, Pet Shop</a></li>
                    <li><a  href="kitap.php">Kitap, Müzik, Film, Hobi</a></li>
                </ul>
            </span>
            <a href="sepet.php"><i class="fa-solid fa-cart-shopping"></i> Sepetim</a>
        </nav>

    </div>

</body>

</html>