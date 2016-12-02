<?php
	include("connect.php");
	$no = $_POST['no'];
	//$no="9";
	$query = mysqli_query($con,"select * from sharelink order by id DESC");
	while($result=mysqli_fetch_assoc($query))
	{
		$link=$result['link'];
		$tag=$result['tag'];
		$password=$result['password'];
		$id=$result['id'];
		if($id<=$no)
		{
			break;
		}
		else if($password==NULL)
		{
			echo "<div id=\"".$id."\" class=\"card displaylink\"><span class=\"card-title\">".$tag."</span><div class=\"card-action \"><u><a class=\"displaylink2\" href=\"".$link."\" target=\"_blank\">".$link."</a></u></div></div>";
		}
		else
		{
			echo "<div id=\"".$id."\"  class=\"card displaylink\"><span class=\"card-title\">".$tag."</span><div class=\"card-action \"><div class=\"row\"><div class=\"input-field col s12 \" id=\"passwordlink\"><input id=\"pass".$id."\"  type=\"password\" class=\"validate\" onkeypress=\"if(event.keyCode == 13)getlink(".$id.");\"><label for=\"password\">ENTER THE PASSWORD TO UNLOCK THE LINK</label><button onclick=\"getlink(".$id.");\">unlock</button></div></div></div></div>";
		}
	}
	
	
	
	
	
?>