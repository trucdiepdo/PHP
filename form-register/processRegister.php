<?php 




if(!empty($_POST['register-user'])){
/*	
// Test is set and empty	
	if(isset($a)){
		echo 'b1 Ton tai bien a<br>';
		
		
	}
	else{
		
		echo 'b2 K ton tai bien a<br>';
		
		
		
		$a = '';
		if(isset($a)){
			echo 'b3 tao da Ton tai gia tri a<br>';
			
			if(empty($a)){
				echo 'b4 tao ton tai roi nhung trong<br>';
				
				unset($a);
				
				if(isset($a)){
					echo 'b5 tao lai ton tai roi hehe<br>';
				}
				else{
					echo 'b6 tao k ton tai roi hehe unset<br>';
				}
				
			}
		}
		

	
	}
	
	*/
    /* Form Required Field Validation */
    foreach($_POST as $key=>$value) {
        if(empty($_POST[$key])) {
            $error_message = "All Fields are required";
            break;
        }
    }
	
	
	// If exist variable $error_message
	if(!isset($error_message)){
		
		 // Password Matching Validation 
		if($_POST['password'] != $_POST['confirm_password']){
			$error_message = 'Passwords should be same<br>';
		}
		
		 // Email Validation
		if(!filter_var($_POST["userEmail"], FILTER_VALIDATE_EMAIL)){
            $error_message = "Invalid Email Address";
        }
		
		// Validation to check if gender is selected
		if(!isset($_POST["gender"])) {
            $error_message = " All Fields are required";
        }
		
		// Validation to check if Terms and Conditions are accepted 
		
		if(!isset($_POST["terms"])) {
            $error_message = "Accept Terms and Conditions to Register";
        }
	
	
		 //$error_message = "";
         $success_message = "You have registered successfully!";
            
           
 				unset($_POST);
				
				
			//	echo '<div class="success-message">'.$success_message.'</div>';
				//header("Location: http://localhost/Mchien/form-register.php");
 				//include 'form-register.php';
        }
         else {
           
            if(!empty($error_message)) {
				//echo '<div class="error-message">'.$error_message.'</div>';
				//	header("Location: http://localhost/Mchien/form-register.php");
				//include 'form-register.php';
            } 
        }
	}
   
    
    
 
    
// }
?>