<?php
	include("connect.php");
	$no = $_POST['no'];
	$password = $_POST['password'];
	$query = mysqli_query($con,"select * from sharelink where id='$no'");
	while($result=mysqli_fetch_assoc($query))
	{
		$pass=$result['password'];
		if($pass==$password)
		{
			$id=$result['id'];
			$link=$result['link'];
			$tag=$result['tag'];
			echo "<span class=\"card-title\">".$tag."</span><div class=\"card-action \"><u><a class=\"displaylink2\" href=\"".$link."\" target=\"_blank\">".$link."</a></u></div>";
		}else
		{
			$id=$result['id'];
			$tag=$result['tag'];
			echo "<span class=\"card-title\">".$tag."<c style=\"color:red;font-size:20px;float:right;margin:10px;\">Wrong Password</c></span><div class=\"card-action \"><div class=\"row\"><div class=\"input-field col s12 \" id=\"passwordlink\"><input id=\"pass".$id."\"  type=\"password\" class=\"validate\" onkeypress=\"if(event.keyCode == 13)getlink(".$id.");\"><label for=\"password\">ENTER THE PASSWORD TO UNLOCK THE LINK</label><button onclick=\"getlink(".$id.");\">unlock</button></div></div></div>";
		}
		
	}
	
?>