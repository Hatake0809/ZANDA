<?php
session_start();
if (isset($_SESSION["user"])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Formu</title>
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
        if (isset($_POST["login"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT * FROM hesaplar WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    $_SESSION["user"] = $email;
                    header("Location: index.php");
                    exit();
                } else {
                    echo "<div class='alert alert-danger'>Şifre Yanlış</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>E-posta Yanlış</div>";
            }
        }
        ?>
        <form action="login.php" method="post">
        <div class="form-group">
            
                <img class="zanda_logo" src="image/1.png" width="250">
            </div>
            <div class="form-group">
                <input type="email" placeholder="E-posta Girin" name="email" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" placeholder="Şifre Girin" name="password" class="form-control">
            </div>
            <div class="form-btn">
                <input type="submit" value="Giriş Yap" name="login" class="btn btn-primary">
            </div>
        </form>
        <div>
            <p>Hala kayıtlı değil misiniz? <a href="registration.php">Buradan Kayıt Olun</a></p>
        </div>
    </div>
</body>

</html>