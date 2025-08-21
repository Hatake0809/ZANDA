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
include('database_connection.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zanda</title>

    <link rel="stylesheet" href="css/elektronik.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Jost:ital,wght@0,100;1,100&family=Lato:wght@100&family=Montserrat:wght@100&family=Open+Sans:wght@300&family=Poppins:wght@300;500&family=Roboto&family=Vina+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <link rel="shortcut icon" href="image/2.ico" />

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href = "css/jquery-ui.css" rel = "stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">

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

    <div class="container" style="height:700px ; margin-left:15% ; animation: slide 2s ease forwards;  animation-delay: calc(.2s * var(--i)); ">
            <h2 class="text-uppercase" style="color:white ; font-size:40px; margin-left:40%">
                Elektronik
            </h2>
            <hr>
        <div class="row">
            <div class="col-md-3">                				
				<div class="list-group">
					<h3>Fiyat</h3>
					<input type="hidden" id="hidden_minimum_price" value="0" />
                    <input type="hidden" id="hidden_maximum_price" value="65000" />
                    <p id="price_show">1000 - 65000</p>
                    <div id="price_range"></div>
                </div>				
                <div class="list-group">
					<h3>Marka</h3>
                    <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
					<?php

                    $query = "SELECT DISTINCT(elektronik_brand) FROM elektronik WHERE elektronik_status = '1' ORDER BY elektronik_id DESC";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector brand" value="<?php echo $row['elektronik_brand']; ?>"  > <?php echo $row['elektronik_brand']; ?></label>
                    </div>
                    <?php
                    }

                    ?>
                    </div>
                </div>

				<div class="list-group">
					<h3>Ram</h3>
                    <?php

                    $query = "
                    SELECT DISTINCT(elektronik_ram) FROM elektronik WHERE elektronik_status = '1' ORDER BY elektronik_ram DESC
                    ";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector ram" value="<?php echo $row['elektronik_ram']; ?>" > <?php echo $row['elektronik_ram']; ?> GB</label>
                    </div>
                    <?php    
                    }

                    ?>
                </div>
				
				<div class="list-group">
					<h3>Depolama</h3>
					<?php
                    $query = "
                    SELECT DISTINCT(elektronik_storage) FROM elektronik WHERE elektronik_status = '1' ORDER BY elektronik_storage DESC
                    ";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector storage" value="<?php echo $row['elektronik_storage']; ?>"  > <?php echo $row['elektronik_storage']; ?> GB</label>
                    </div>
                    <?php
                    }
                    ?>	
                </div>
            </div>

            <div class="col-md-9">
            	<br />
                <div class="row filter_data">

                </div>
            </div>
        </div>

    </div>
<style>
#loading
{
	text-align:center; 
	background: url('loader.gif') no-repeat center; 
	height: 150px;
}
</style>

<script>
$(document).ready(function(){

    filter_data();

    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
        var brand = get_filter('brand');
        var ram = get_filter('ram');
        var storage = get_filter('storage');
        $.ajax({
            url:"filitreleme_elektronik.php",
            method:"POST",
            data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, brand:brand, ram:ram, storage:storage},
            success:function(data){
                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });

    $('#price_range').slider({
        range:true,
        min:1000,
        max:65000,
        values:[1000, 65000],
        step:500,
        stop:function(event, ui)
        {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
        }
    });

});
</script>
    




</body>

</html>