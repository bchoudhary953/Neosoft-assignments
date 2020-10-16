<?php
	include("Connection.php");
	$ID=$_GET['ID'];
	$sql="DELETE FROM category_list WHERE ID = '$ID';";
	$result = mysqli_query($conn,$sql);
	if($result)
	header("refresh:0; url=List-Category.php");
	else
	"error";
  ?>
