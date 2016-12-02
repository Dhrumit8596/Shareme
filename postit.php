<?php
	include("connect.php");
	$tag=$_POST['tag'];
	$link=$_POST['link'];
	$password=$_POST['password'];
	if(substr($link,0,3)!="http")
	{
		$link="http://".$link;
	}
	$query=mysqli_query($con,"INSERT INTO `shareme`.`sharelink` (`id`, `link`, `tag`, `password`) VALUES (NULL, '$link', '$tag', '$password');");
	echo date("Y-m-d H:i:s");
?>