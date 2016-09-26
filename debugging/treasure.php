<!doctype html>
<html>
<head>

<title>CODE DEBUGGING</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/font-awesome.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="js/jquery.1.8.3.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery-scrolltofixed.js"></script>
</head>
<body>

   <!--main nav-bar-->
   
<nav class="main-nav-outer">
	<div class="container">
	<div class="col-sm-5">
	</div>
	<div class="col-sm-7">
        <ul class="main-nav">
            <li class="navlist"><i class="fa fa-user"></i>Team Name<span></span></li>
            <li class="navlist">Points-<span></span></li>
            <li><a class="logout" href="#"><b>Logout</b></a></li>
        </ul>
      
    </div>
	</div>
</nav>
<!--Treasures-->	
<h2>Select the treasure you want to opt for</h2>											
<?php
	$servername = "localhost";
	$username = "root";
	$password = "      ";
	$dbname = "return_treasure";
	$_COOKIE[$cookie_name]='div1_11';		//to be removed after merging
	try{
    	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);			
					
		$s1 = $conn->prepare("SELECT * FROM div1points WHERE cookie='$_COOKIE[$cookie_name]'");	
		$s1->execute();
		$s2 = $conn->prepare("SELECT * FROM div2points WHERE cookie='$_COOKIE[$cookie_name]'");	
		$s2->execute();

		if($r=$s1->fetchObject())
		{
			$i=$r->treasure;		//no.of treasures allocated on merit-basis
		}
		else if($r=$s2->fetchObject())
		{
			$i=$r->treasure;		
		}		

		$j=$i/3;	//no.of groups of 3
		$c=0;		//counter
		$points=600;	//points allocated for each treasure
		while($j>=0)
		{
			
			echo "<div class='row' id='treasure' style='width:90%; margin-left:75px;'>";
			if($j>=1)
				$p=3;
			else
				$p=$i%3;
			while($p)
			{
				$c++;
				echo "<div class='col-md-4' style='padding:11.75px;'><img src='./img/treasure.jpg'><h3 style='color:#79161f'>Treasure-$c &emsp;&nbsp; Points:$points</h3></div>";
				$p--;
				if($c%2==0)
					$points+=300;
			}
			echo "</div><br>";
			$j--;
		}			


		$conn = null;

				/*.............show the treasures allocated through backend...............*/
				
    }
	catch(PDOException $e)
    {
		echo $e;
   	}
	

?>


<!--footer-->
<section id="contact" class="section footer">
		<div class="container">
<div class="col-sm-6"></div>
<div class="col-sm-6 about"> 
<p>A treasure hunt is one of many different types of games with one or more players who try to find hidden objects or places by 
following a series of clues. Treasure hunt games may be an indoor or outdoor activity. Outdoors they can be played in a garden or the 
treasure could be located anywhere around the world.</p>
</div>
</div>
</section>

<script>
function reply() {
	var str=document.getElementById("answerbox").value;
    if (str.length == 0) { 
        document.getElementById("ans_status").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		if(xmlhttp.responseText!="Success")
                document.getElementById("ans_status").innerHTML = xmlhttp.responseText;
		else
		window.location="http://localhost/return-TREASURE/debugging/treasure.php";
            }
        };
        xmlhttp.open("GET", "index.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>

<script type="text/javascript">
    $(document).ready(function(e) {
        $('#test').scrollToFixed(); 
        $('.res-nav_click').click(function(){
            $('.main-nav').slideToggle();
            return false    
            
        });
        
    });
    $(document).ready(function() {
        $('#treasure img').hover(function(){
        		$(this).css("opacity","0.5");
            	$(this).css("cursor","pointer");
        	},function(){
        		$(this).css("opacity","1");
        		$(this).css("cursor","normal");

        	});
    });
</script>
</body>
</html>
