<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
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

$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
	foreach($_SESSION["shopping_cart"] as $key => $value) {
		if($_POST["id"] == $key){
		unset($_SESSION["shopping_cart"][$key]);
		$status = "<div class='box' style='color:red;'>
		Product is removed from your cart!</div>";
		}
		if(empty($_SESSION["shopping_cart"]))
		unset($_SESSION["shopping_cart"]);
			}		
		}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['id'] === $_POST["id"]){
        $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
    }
}
  	
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zanda</title>

    <link rel="stylesheet" href="css/sepet.css">
    

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Anton&family=Jost:ital,wght@0,100;1,100&family=Lato:wght@100&family=Montserrat:wght@100&family=Open+Sans:wght@300&family=Poppins:wght@300;500&family=Roboto&family=Vina+Sans&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
        integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <link rel="shortcut icon" href="image/2.ico" />

</head>

<body>

    <header>
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
            <a href="interface.php"><i class="fa-solid fa-user"></i> <?php echo " ". $ad ." ". $soyad  ?></a>

            <span class="kategori" class="btn btn-warning">
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
            <a href=""><i class="fa-solid fa-cart-shopping"></i> Sepetim</a>
        </nav>




    </header>

    <?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div class="cart_div">
<a href="cart.php">
<img src="cart-icon.png" /> Cart
<span><?php echo $cart_count; ?></span></a>
</div>
<?php
}
?>

<div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?>	
<table class="table">
<tbody>
<tr>
<td></td>
<td>ITEM NAME</td>
<td>QUANTITY</td>
<td>UNIT PRICE</td>
<td>ITEMS TOTAL</td>
</tr>	
<?php		
foreach ($_SESSION["shopping_cart"] as $product){
?>
<tr>
<td><img src='<?php echo $product["image"]; ?>' width="50" height="40" /></td>
<td><?php echo $product["name"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='id' value="<?php echo $product["id"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove'>Remove Item</button>
</form>
</td>
<td>
<form method='post' action=''>
<input type='hidden' name='id' value="<?php echo $product["id"]; ?>" />
<input type='hidden' name='action' value="change" />
<select name='quantity' class='quantity' onchange="this.form.submit()">
<option <?php if($product["quantity"]==1) echo "selected";?> value="1">1</option>
<option <?php if($product["quantity"]==2) echo "selected";?> value="2">2</option>
<option <?php if($product["quantity"]==3) echo "selected";?> value="3">3</option>
<option <?php if($product["quantity"]==4) echo "selected";?> value="4">4</option>
<option <?php if($product["quantity"]==5) echo "selected";?> value="5">5</option>
</select>
</form>
</td>
<td><?php echo "$".$product["price"]; ?></td>
<td><?php echo "$".$product["price"]*$product["quantity"]; ?></td>
</tr>
<?php
$total_price += ($product["price"]*$product["quantity"]);
}
?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "$".$total_price; ?></strong>
</td>
</tr>
</tbody>
</table>		
  <?php
}else{
	echo "<h3>Sepet Boş!</h3>";
	}
?>
</div>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>

</div>



</body>

</html>