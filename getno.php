<?php
	include("connect.php");
	$no=0;
	$query = mysqli_query($con,"select * from sharelink order by id DESC");
	while($result=mysqli_fetch_assoc($query))
	{
		$no++;
	}
	echo $no;
?>