<?php
include('database_connection.php');
session_start();
$status="";
if (isset($_POST['id']) && $_POST['id']!=""){
$id = $_POST['id'];
$result = mysqli_query($con,"SELECT * FROM `products` WHERE `id`='$id'");
$row = mysqli_fetch_assoc($result);
$name = $row["elektronik_name"];
$id = $row["elektronik_id"];
$price = $row["elektronik_price"];
$image = $row["elektronik_image"];

$cartArray = array(
	$id=>array(
	'name'=>$row["elektronik_name"],
	'id'=>$row["elektronik_id"],
	'price'=>$row["elektronik_price"],
	'quantity'=>1,
	'image'=>$row["elektronik_image"])
);

if(empty($_SESSION["shopping_cart"])) {
	$_SESSION["shopping_cart"] = $cartArray;
	$status = "<div class='box'>Product is added to your cart!</div>";
}else{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($id,$array_keys)) {
		$status = "<div class='box' style='color:red;'>
		Product is already added to your cart!</div>";	
	} else {
	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	$status = "<div class='box'>Product is added to your cart!</div>";
	}

	}
}


if(isset($_POST["action"]))
{
	$query = "
		SELECT * FROM elektronik WHERE elektronik_status = '1'
	";
	if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
	{
		$query .= "
		 AND elektronik_price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
		";
	}
	if(isset($_POST["brand"]))
	{
		$brand_filter = implode("','", $_POST["brand"]);
		$query .= "
		 AND elektronik_brand IN('".$brand_filter."')
		";
	}
	if(isset($_POST["ram"]))
	{
		$ram_filter = implode("','", $_POST["ram"]);
		$query .= "
		 AND elektronik_ram IN('".$ram_filter."')
		";
	}
	if(isset($_POST["storage"]))
	{
		$storage_filter = implode("','", $_POST["storage"]);
		$query .= "
		 AND elektronik_storage IN('".$storage_filter."')
		";
	}

	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();
	$output = '';
	if($total_row > 0)
	{
		foreach($result as $row)
		{
			
			$output .= '
			<div class="col-sm-4 col-lg-3 col-md-3">
				<form method="post" action="">
				<div class="renk" style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;">
					
					<img src="images/'. $row['elektronik_image'] .'" alt="" class="img-responsive" >
					<p align="center"><strong><a href="#"> '. $row['elektronik_name'] .'</a></strong></p>
					<h4 style="text-align:center;" class="text-danger" >'. $row['elektronik_price'] .'</h4>
					<p>Camera : '. $row['elektronik_camera'].' MP<br />
					Marka : '. $row['elektronik_brand'] .' <br />
					Ram : '. $row['elektronik_ram'] .' GB<br />
					Depolama : '. $row['elektronik_storage'] .' GB </p>
					<button type="submit" class="buy" style="margin-right:15px">Buy Now</button>
					
				</div>
				</form>
			</div>
			';
		}
	}
	else
	{
		$output = '<h3>No Data Found</h3>';
	}
	echo $output;
}

?>