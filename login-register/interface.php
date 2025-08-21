<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
   
    <title>Kullanıcı Paneli</title>
    <link rel="shortcut icon" href="image/2.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Anton&family=Jost:ital,wght@0,100;1,100&family=Lato:wght@100&family=Montserrat:wght@100&family=Open+Sans:wght@300&family=Poppins:wght@300&family=Roboto&family=Vina+Sans&display=swap"
        rel="stylesheet">
</head>

<body>



    <div class="container">
    <div class="form-group">
                <img class="zanda_logo" src="image/1.png" width="250">
            </div>
        <h1>Kullanıcı Paneline Hoş Geldiniz</h1>
        <a href="logout.php" class="btn btn-warning">Çıkış Yap</a>
    </div>
</body>

</html>