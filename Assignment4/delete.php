<?php
	include("Connection.php");
	$id=$_GET['id'];
	$sql="DELETE FROM product_list WHERE id = '$id';";
	$result = mysqli_query($conn,$sql);
	if($result)
	header("refresh:0; url=List-Product.php");
	else
	"error";
  ?>
