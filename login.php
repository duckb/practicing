<?php 

include_once "header.php"; 
include_once "includes/connect.php"; 
include_once 'includes/user.php';

//make database connection and select db
$connectObj = new Connect();
$db = $connectObj->dbConnect();

$message = null;
$error   = null;
$errorMessage = null;

if(count($_POST) >0  && $db) {
	//get the post data

	$username = $_POST['username'];
	$password = sha1($_POST['password']);
	
	// create the instance of a class program
	$userObj = new User();
	$userInfo = $userObj->authenticate($username,$password);
	if($userInfo) {
		$message = 'Successfully added the record';
		$data['userId'] = $userInfo[0]['id'];
		$data['ipaddress'] = $_SERVER['REMOTE_ADDR'];
		$_SESSION['userId'] = $userInfo[0]['id'];
		$userObj->logUserActivity($data);
		header("Location:loginInfo.php");
		
	} else {
		/* if theere is some error, then catch it and display it */
		$errorMessage = 'Invalid Username / password';
	}
}

?>
<form action="#" method="post" enctype="multipart/form-data">
<div id="content-header">Enter the login credential</div>
<div class="error-class"><?php echo $errorMessage;?></div>
<div class="success-class"><?php echo $message;?></div>
<div id="login-content" >
	
	<div id="row">
		<span class="mandatory-item">*</span>
		<span class="label">Username:</span>
		<span class="input-content">
		<input class="inputtext" type="text" name="username"  id="username" value="" />
		</span>
	</div>
	<div id="row">
		<span class="mandatory-item">*</span>
		<span class="label">Password:</span>
		<span class="input-content">
		<input class="inputtext" type="password" name="password"  id="password" value="" />
		</span>
	</div>
	<div id="row" style="text-align:center;">
		<span class="label"></span>
		<span class="input-content">
		<input type="submit"  name="button" onclick="return validateLogin();" class="button" value="Login" />
		</span>
	</div>
</div>

</form>
</div>
</body>
</html>