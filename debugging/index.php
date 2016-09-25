<?php
	//require("registrationform.php");				//importing file registrationform.php
	$last_id=12;
	$last_id=12;
	$treasure1=6;
	$treasure2=6;
	$pass1=7;
	$pass2=0;
	$original_debug_ans1="m<n";
	$original_debug_ans2="n>m";
	$_COOKIE[$cookie_name]='div1_11';
	$debug_ans="";
	$ratio1 = $last1_id/4;							/*	dividing into four groups w.r.t treasures i.e 											6,5,4 or 3 	*/
	$ratio2 = $last2_id/4;

        $debug_ans = edit_input($_REQUEST["q"]);	//editing input	
		
		  if (empty($debug_ans)) {				//check if the answer submitted is empty
 			   echo "Answer is required?";		//display error
		  } else {

			 
			   if($debug_ans==$original_debug_ans1 || $debug_ans==$original_debug_ans2){			//checking whether the answer is correct or not

				$servername = "localhost";
				$username = "root";
				$password = "      ";
				$dbname = "return_treasure";
				
				try {
    					$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
				        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					
					
					$check_div1 = $conn->prepare("SELECT id FROM div1teams WHERE cookie='$_COOKIE[$cookie_name]'");
					$check_div1->execute();
					$check_div2 = $conn->prepare("SELECT id FROM div2teams WHERE cookie='$_COOKIE[$cookie_name]'");
					$check_div2->execute();
					if($r=$check_div1->fetchObject())
					{

						if($pass1>$ratio1 && $pass1<= 2*$ratio1)	/*  allocating total no. of treasures 												            one should get.	*/
						$treasure1--;
						elseif($pass1>2*$ratio1 && $pass1<= 3*$ratio1)
						$treasure--;
						elseif($pass1>3*$ratio1)
						$treasure1--;					//end of allocation of no. of treasures	
			   			$pass1++;						//increment the pass1 variable
	    					$sql = "UPDATE div1points SET pass_id=$pass1,treasure=$treasure1 WHERE cookie='$_COOKIE[$cookie_name]'";
						$stmt = $conn->prepare($sql);
						$stmt->execute();

						
					}
					else if($r=$check_div2->fetchObject()){

						if($pass2>$ratio2 && $pass2<= 2*$ratio2)	/*  allocating total no. of treasures 												            one should get.	*/
						$treasure2--;
						elseif($pass2>2*$ratio2 && $pass2<= 3*$ratio2)
						$treasure2--;
						elseif($pass2>3*$ratio2)
						$treasure2--;					//end of allocation of no. of treasures	

			   			$pass2++;						//increment the pass1 variable
	    					$sql = "UPDATE div2points SET pass_id=$pass2,treasure=$treasure2 WHERE cookie='$_COOKIE[$cookie_name]'";
						$stmt = $conn->prepare($sql);
						$stmt->execute();	
		
			
					}


				/*.............show the treasures allocated through backend...............*/
					echo "Success";
    				}
				catch(PDOException $e)
    				{
					echo $sql . "<br>" . $e->getMessage();
    				}

				$conn = null;
				

			   }
		           else{
				echo "Sorry, wrong answer.Better luck next time!";	//displaying message for wrong answer
			   }

		  }
	
	
	
	function edit_input($data) {					//function for editing the input
 		$data = trim($data);					//trim
		$data = str_replace(' ', '', $data);			//remove spaces
		$data = preg_replace('/\s+/', '', $data);		//remove whitespaces
  		//$data = htmlspecialchars($data);			//securing from cross scripting
  		return $data;						//return the edited answer
	}
	
?>
