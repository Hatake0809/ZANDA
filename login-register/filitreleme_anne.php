<?php
include('database_connection.php');

if(isset($_POST["action"]))
{
	$query = "
		SELECT * FROM anne WHERE anne_status = '1'
	";
	if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
	{
		$query .= "
		 AND anne_price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
		";
	}
	if(isset($_POST["brand"]))
	{
		$brand_filter = implode("','", $_POST["brand"]);
		$query .= "
		 AND anne_brand IN('".$brand_filter."')
		";
	}
	if(isset($_POST["size"]))
	{
		$size_filter = implode("','", $_POST["size"]);
		$query .= "
		 AND anne_size IN('".$size_filter."')
		";
	}
	if(isset($_POST["color"]))
	{
		$color_filter = implode("','", $_POST["color"]);
		$query .= "
		 AND anne_color IN('".$color_filter."')
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
				<div class="renk" style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;">
					<img src="images/'. $row['anne_image'] .'" alt="" class="img-responsive" >
					<p align="center"><strong><a href="#">'. $row['anne_name'] .'</a></strong></p>
					<h4 style="text-align:center;" class="text-danger" >'. $row['anne_price'] .'</h4>
					<p>
					Marka : '. $row['anne_brand'] .' <br />
					Beden : '. $row['anne_size'] .'<br />
					Renk : '. $row['anne_color'] .'</p>
				</div>

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