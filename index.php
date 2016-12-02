<?php
				include("connect.php");
?>				
 
 <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
     <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
 
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	  <style>
		body{
			background-color:#e8eaf6;
		}
		.input-field #last_name{
			border-bottom:1px solid;
			height:50%;
			padding:0;
			margin-top:15px;
			transition-duration:0.5s
		}
		.input-field-search{
			width:0px;
			transition-duration:0.5s;
			float:right;
		}
		.brand-logo{
			margin-left:1%;
			transition-duration:1s;
		}
		.main{
			width:80%;
			height:20%;
			background-color:#FFF;
			margin-left:10%;
			margin-top:2%;
			padding-top:2%;
		}
		.tag{
			width:20%;
			margin-left:3%;
		}
		.link{
			width:25%;
			margin-left:3%;
			margin-right:3%;
		}
		.time{
			width:20%;
			margin-left:3%;
			margin-right:3%;
			color:#9e9e9e;
			
		}
		
		.password{
			width:7.5%;
			
		}
		.share{
			width:15%;
			margin-left:3%;
			margin-right:3%;
			padding-top:10px;
		}
		.main2{
		width: 80%;
		
		
		margin-left:10%;
		margin-top:2%;
		padding-top:2%
		}
		.displaylink{
		background-color: #FFF;
		width:90%;
		margin-left:5%;
		margin-right:5%;
		
		}
		.displaylink2{
		color: #000 !important;
		text-transform: initial !important;
		}
		.card-title{
		padding:1%;
		font-size:30px !important;
		color:#000;
		font-weight:800 !important;
		text-transform:capitalize;
		}
		.card-action{
		margin-bottom:2%;
		
		}
		.linkcontainer{
		margin-bottom:2%;
		padding-bottom:2%;
		overflow-wrap:break-word;
		}
		
		</style>
	  
	  
    </head>

    <body onload="javascript:callit">
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>	
    	<nav>
    <div class="nav-wrapper blue darken-3 hide-on-med-and-down">
      <a href="#!" class="brand-logo">ShareMe</a>
		
	 <ul class="right ">
        
		<li><div class="input-field input-field-search col s2" >
          <input id="last_name" placeholder="Search" type="text" class="validate" >
        </div></li>
		<li><a  onclick="popup();"><i class="material-icons">search</i></a></li>
		
	  </ul>
    </div><div class="nav-wrapper blue darken-3 hide-on-large-only">
      <a href="#!" class="brand-logo" style="left:20%">ShareMe</a>
      <ul class="right ">
        <li><div class="input-field search input-field-mob col s2" >
          <input id="last_name" placeholder="Search" type="text" class="validate">
        </div></li>
		<li><a  onclick="popupmob();"><i class="material-icons">search</i></a></li>
      </ul>
    </div>
  </nav>
  
  
   <div class="main">
   
  

 <div class="input-field tag col s2 left">
          <input type="text" id="autocomplete-input"  class="autocomplete validate"/>
          <label for="autocomplete-input" id="tag">Tag*</label>
  </div>   
  <div class="input-field link col s2 left">
         <input id="inp_link" type="text" class="validate" onkeypress="if(event.keyCode == 13)postit();"/>
          <label for="inp_link" >Link*</label>
  </div>
 <div class="input-field password col s2 left ">
		<input id="password" type="password" class="validate" onkeypress="if(event.keyCode == 13)postit();">
          <label for="password">Password</label>
  </div><!--
   <div class="input-field time col s2 left">
    <select>
      <option value="" disabled selected>Select Expire time for link</option>
      <option value="1">1hr</option>
      <option value="2">1 Day</option>
      <option value="3">1 week</option>
	  <option value="3">1 month</option>
    </select>
  </div>-->
   <div class="input-field share col s2 left">
		<button class="btn wave	s-effect  waves-light right" type="submit" name="action" id="sharebutton" onclick="postit();">Share
    <i class="material-icons right">share</i>
  </button>
  </div>
   </div>
  
  
  
  
  
 
 <div class="main2">
        <div class="col s12 m10 linkcontainer" id="linkcontainer" >
			<?php
				$query = mysqli_query($con,"select * from sharelink order by id DESC");
				while($result=mysqli_fetch_assoc($query))
				{
					$link=$result['link'];
					$tag=$result['tag'];
					$password=$result['password'];
					$id=$result['id'];
					if($password==NULL)
					{
						echo "<div id=\"".$id."\" class=\"card displaylink\"><span class=\"card-title\">".$tag."</span><div class=\"card-action \"><u><a class=\"displaylink2\" href=\"".$link."\" target=\"_blank\">".$link."</a></u></div></div>";
					}
					else
					{
						echo "<div id=\"".$id."\"  class=\"card displaylink\"><span class=\"card-title\">".$tag."</span><div class=\"card-action \"><div class=\"row\"><div class=\"input-field col s12 \" id=\"passwordlink\"><input id=\"pass".$id."\"  type=\"password\" class=\"validate\"  onkeypress=\"if(event.keyCode == 13)getlink(".$id.");\"><label for=\"password\">ENTER THE PASSWORD TO UNLOCK THE LINK</label><button onclick=\"getlink(".$id.");\">unlock</button></div></div></div></div>";
					}						
				}
			?>
			<!--<button class="btn wave	s-effect  waves-light right" type="submit" id="loadmore" onclick="();">Load more</button>-->
        </div>
      </div>
 
  
  
      <!--Import jQuery before materialize.js-->
	 
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
          <script>
		  var x=1;
		  var y=1;
		  var no=0;
		  <?php  
			$query = mysqli_query($con,"select * from sharelink order by id DESC");
			while($result=mysqli_fetch_assoc($query))
			{
				?>no++;<?php
			}
		  ?>
		  
		  function popup(){
			if(x==1){
			$(".input-field-search").css("width","200%");
			document.getElementById("last_name").focus();
			//$(".brand-logo-mob").hide();
			x=0;
			}
			else{
			$(".input-field-search").css("width","0%");
			//$(".brand-logo-mob").show();
			x=1;}
		  }
		  function popupmob(){
			if(y==1){
			$(".input-field-mob").css("width","70%");
			document.getElementById("last_name").focus();
			y=0;
		}
			else{
			$(".input-field-mob").css("width","0%");
			y=1;}
		  }
		 
	 $(document).ready(function() {
    $('select').material_select();
	
  });
  
        
		/* AJAX */
		window.onload = function(){
			
			callit();
		};
		function postit()
		{
			
			var tag = document.getElementById("autocomplete-input").value;
			var link = document.getElementById("inp_link").value;
			var password = document.getElementById("password").value;
			if(tag=="")
			{
				alert("Enter tag to post");
			}
			else if(link=="")
			{
				//alert("Enter link to post");
			}
			else{
			$.post("postit.php",{tag:tag,link:link,password:password},function(data){
				document.getElementById("autocomplete-input").value="";
				document.getElementById("inp_link").value="";
				document.getElementById("password").value="";
				
			});
			}
			
		}
		function callit()
		{
			
			setTimeout(function(){
				$.post("getno.php",{},function(data){
					
					if(no<data)
					{
						callink(no);
						no=data;
					}
				});
				callit();
			},1000);
		}
		function callink(no)
		{
			
			$.post("getlink.php",{no:no},function(data){
				
					$("#linkcontainer").prepend(data);
				
			});
			
		}
		function getlink(no){
		
			var password = document.getElementById("pass"+no).value;
			$.post("password.php",{no:no,password:password},function(data){
				$("#"+no).html(data);
			});
		}
	
		  </script>
    </body>
  </html>