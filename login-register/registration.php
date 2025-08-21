<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Formu</title>
    <link rel="stylesheet" href="css/login.css">

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
        <?php
        if (isset($_POST["submit"])) {
            $ad = $_POST["ad"];
            $soyad = $_POST["soyad"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $passwordRepeat = $_POST["repeat_password"];

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            $errors = array();

            if (empty($ad) or empty($soyad) or empty($email) or empty($password) or empty($passwordRepeat)) {
                array_push($errors, "Tüm alanları doldurunuz");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, "Geçerli bir email adresi giriniz");
            }
            if (strlen($password) < 8) {
                array_push($errors, "Şifre en az 8 karakterden oluşmalıdır");
            }
            if ($password !== $passwordRepeat) {
                array_push($errors, "Şifreler uyuşmuyor");
            }
            require_once "database.php";
            $sql = "SELECT * FROM hesaplar WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $rowCount = mysqli_num_rows($result);
            if ($rowCount > 0) {
                array_push($errors, "Bu email zaten kullanılıyor!");
            }
            if (count($errors) > 0) {
                foreach ($errors as $error) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            } else {

                $sql = "INSERT INTO hesaplar (ad,soyad, email, password) VALUES ( ?, ?, ?, ? )";
                $stmt = mysqli_stmt_init($conn);
                $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                if ($prepareStmt) {
                    mysqli_stmt_bind_param($stmt, "ssss", $ad , $soyad , $email, $passwordHash);
                    mysqli_stmt_execute($stmt);
                    echo "<div class='alert alert-success'>Başarıyla kaydoldunuz.</div>";
                } else {
                    die("Bir şeyler yanlış gitti");
                }
            }


        }
        ?>
        <form action="registration.php" method="post">
            <div class="form-group">
                <img class="zanda_logo" src="image/1.png" width="250">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" name="ad" placeholder="Ad">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="soyad" placeholder="Soyad">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Şifre">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="repeat_password" placeholder="Şifreyi Tekrar Girin">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Kayıt Ol" name="submit">
            </div>
        </form>
        <div>
            <div>
                <p>Zaten Kayıtlı mı? <a href="login.php">Buradan Giriş Yapın</a></p>
            </div>
        </div>
    </div>
</body>