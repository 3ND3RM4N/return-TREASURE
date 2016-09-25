<?php
	//require(registrationform.php);				//importing file registrationform.php
	$last_id=12;									//should be initialized in proper place
	$treasure1=6;									//should be initialized in proper place
	$treasure2=6;									//should be initialized in proper place
	$pass1=1;										//should be initialized in proper place
	$pass2=1;										//should be initialized in proper place
	/*	dividing into four groups w.r.t treasures i.e 	6,5,4 or 3 	*/
	$ratio1 = $last1_id/4;							//should be initialized in proper place
	$ratio2 = $last2_id/4;							//should be initialized in proper place
	if($_SERVER["REQUEST_METHOD"]=="POST")					//check for post method
	{	
		  if (empty($_POST["debug_ans"])) {				//check if the answer submitted is empty
 			   $debug_ansErr = "Answer is required";		//display error
		  } else {
    		           $debug_ans = edit_input($_POST["debug_ans"]);	//editing input
			   if($debug_ans==$original_debug_ans){			//checking whether the answer is correct or not

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
	    					$sql = "UPDATE div1teams SET pass_id=$pass1 WHERE cookie='$_COOKIE[$cookie_name]'";

						if($pass1>$ratio1 && $pass1<= 2*$ratio1)	/*  allocating total no. of treasures 												            one should get.	*/
						$treasure1--;
						elseif($pass1>2*$ratio1 && $pass1<= 3*$ratio1)
						$treasure1--;
						elseif($pass1>3*$ratio1)
						$treasure1--;					//end of allocation of no. of treasures	

			   			$pass1++;						//increment the pass1 variable
						
					}
					else if($r=$check_div2->fetchObject()){
	    					$sql = "UPDATE div2teams SET pass_id=$pass2 WHERE cookie='$_COOKIE[$cookie_name]'";	

						if($pass2>$ratio2 && $pass2<= 2*$ratio2)	/*  allocating total no. of treasures 												            one should get.	*/
						$treasure2--;
						elseif($pass2>2*$ratio2 && $pass2<= 3*$ratio2)
						$treasure2--;
						elseif($pass2>3*$ratio2)
						$treasure2--;					//end of allocation of no. of treasures	

			   			$pass2++;						//increment the pass1 variable
		
			
					}
					
    					$stmt = $conn->prepare($sql);
    					$stmt->execute();


						$conn = null;
				/*.............show the treasures allocated through backend...............*/
					header("Location: treasures.php");
    				}
				catch(PDOException $e)
    				{
					echo $sql . "<br>" . $e->getMessage();
    				}
				
	
			   }
		           else{
				$debug_ansErr = "Sorry, wrong answer.Better luck next time!";	//displaying message for wrong answer
			   }

		  }
	}
	
	
	function edit_input($data) {					//function for editing the input
 		$data = trim($data);					//trim
		$data = str_replace(' ', '', $data);			//remove spaces
		$data = preg_replace('/\s+/', '', $data);		//remove whitespaces
  		$data = htmlspecialchars($data);			//securing from cross scripting
  		return $data;						//return the edited answer
	}
	
?>
