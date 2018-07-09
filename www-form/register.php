<html>
<head>
<title>PHP User Registration Form</title>
<style>
body{
	width:610px;
	font-family:calibri;
}
.error-message {
	padding: 7px 10px;
	background: #fff1f2;
	border: #ffd5da 1px solid;
	color: #d6001c;
	border-radius: 4px;
}
.success-message {
	padding: 7px 10px;
	background: #cae0c4;
	border: #c3d0b5 1px solid;
	color: #027506;
	border-radius: 4px;
}
.demo-table {
	background: #d9eeff;
	width: 100%;
	border-spacing: initial;
	margin: 2px 0px;
	word-break: break-word;
	table-layout: auto;
	line-height: 1.8em;
	color: #333;
	border-radius: 4px;
	padding: 20px 40px;
}
.demo-table td {
	padding: 15px 0px;
}
.demoInputBox {
	padding: 10px 30px;
	border: #a9a9a9 1px solid;
	border-radius: 4px;
}
.btnRegister {
	padding: 10px 30px;
	background-color: #3367b2;
	border: 0;
	color: #FFF;
	cursor: pointer;
	border-radius: 4px;
	margin-left: 10px;
}
</style>
</head>
<?php 
if(!empty($_POST['register-user'])){
    
    // Form Required Field Validation
    foreach($_POST as $key=>$value) {
        if(empty($_POST[$key])) {
            $error_message = "All Fields are required";
            break;
        }
    }
    
    if (!preg_match("/^[a-zA-Z ]*$/",$_POST['userName'])) {
        $error_message = "Only letters and white space allowed";
    }
    
    // Password Matching Validation
    if($_POST['password'] != $_POST['confirm_password']){
        $error_message = 'Passwords should be same<br>';
    }
    
    // If exist variable $error_message
    if(!isset($error_message)){
        
        // Email Validation
        if(!filter_var($_POST["userEmail"], FILTER_VALIDATE_EMAIL)){
            $error_message = "Invalid Email Address";
        } else if(!isset($_POST["gender"])) {
            $error_message = "Check Gender";
        } else if(!isset($_POST["terms"])) {
            // Validation to check if Terms and Conditions are accepted
            $error_message = "Accept Terms and Conditions to Register";
        }
        
          
          if(empty($error_message)){
             $success_message = "You have registered successfully!";
             unset($_POST);
          }
    }
}
?>

<body>
<?php if(isset($error_message) && !empty($error_message)) {?>
	<div class="error-message"><?php echo $error_message; ?></div>
<?php }?>
<?php if(isset($success_message) && !empty($success_message)){?>
	<div class="success-message"> <?php echo $success_message. ' Continue <a href="http://localhost/register-login-logout/login.php">Log In</a>'; ?></div>	
<?php }?>

<form name="frmRegistration" method="post" action="">
	<table border="0" width="500" align="center" class="demo-table">
		<tr>
			<td>User Name</td>
			<td><input type="text" class="demoInputBox" name="userName" value="<?php if(isset($_POST['userName'])) echo $_POST['userName']; ?>"></td>
		</tr>
		<tr>
			<td>First Name</td>
			<td><input type="text" class="demoInputBox" name="firstName" value="<?php if(isset($_POST['firstName'])) echo $_POST['firstName']; ?>"></td>
		</tr>
		<tr>
			<td>Last Name</td>
			<td><input type="text" class="demoInputBox" name="lastName" value="<?php if(isset($_POST['lastName'])) echo $_POST['lastName']; ?>"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" class="demoInputBox" name="password" value=""></td>
		</tr>
		<tr>
			<td>Confirm Password</td>
			<td><input type="password" class="demoInputBox" name="confirm_password" value=""></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="text" class="demoInputBox" name="userEmail" value="<?php if(isset($_POST['userEmail'])) echo $_POST['userEmail']; ?>"></td>
		</tr>
		<tr>
			<td>Gender</td>
			<td><input type="radio" name="gender" value="Male" <?php if(isset($_POST['gender']) && $_POST['gender']=="Male") { ?>checked<?php  } ?>> Male
				<input type="radio" name="gender" value="Female" <?php if(isset($_POST['gender']) && $_POST['gender']=="Female") { ?>checked<?php  } ?>> Female
			</td>
		</tr>
		<tr>
			<td colspan=2>
				<input type="checkbox" name="terms"> I accept Terms and Conditions 
				<input type="submit" name="register-user" value="Register" class="btnRegister"></td>
		</tr>
	</table>
</form>
</body>
</html>
