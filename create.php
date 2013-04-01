<?php 
include_once "header.php"; 
include_once "includes/connect.php"; 
include_once 'includes/user.php';

//make database connection and select db
$connectObj = new Connect();
$db = $connectObj->dbConnect();

$message = null;
$error   = null;
if(count($_POST) >0  && $db) {
	//get the post data

	$postData['firstname'] = $_POST['fname'];
	$postData['lastname'] = $_POST['lname'];
	$postData['password'] = sha1($_POST['password']);
	$postData['email'] = $_POST['email'];
	$postData['address'] = $_POST['address'];
	$userObj = new User();
	if(!$userObj->isEmailExist($postData['email'])) {
		if($userObj->create($postData)) {
			echo  'Successfully added the record';die();
		} else {
			$error   = 'Server error, Please try again later';
		}
	} else {
		$error   = 'Email id already exist, Use other Email';
	}
}
?>

<form action="#" method="post" enctype="multipart/form-data">
<div id="content-header">Create your account </div>
<div id="signup-content" >
	<div class="error-class"><?php  echo $error;?></div>
	<div class="success-class"><?php  echo $message;?></div>
	<div id="row">
		<span class="mandatory-item">*</span>
		<span class="label">FirstName:</span>
		<span class="input-content">
		<input class="inputtext" type="text" name="fname"  id="fname" value="<?php echo (!empty($_POST['fname']))?$_POST['fname']:''; ?>" />
		</span>
	</div>
	<div id="row">
		<span class="mandatory-item">*</span>
		<span class="label">Lastname:</span>
		<span class="input-content">
		<input class="inputtext" type="text" name="lname"  id="lname" value="<?php echo(!empty($_POST['lname']))?$_POST['lname']:''; ?>" />
		</span>
	</div>
	<div id="row">
		<span class="mandatory-item">*</span>
		<span class="label">Password:</span>
		<span class="input-content">
		<input class="inputtext" type="password" name="password"  id="password" value="<?php echo (!empty($_POST['password']))?$_POST['password']:''; ?>" />
		</span>
	</div>
	<div id="row">
		<span class="mandatory-item">*</span>
		<span class="label">Re-Type Password:</span>
		<span class="input-content">
		<input class="inputtext" type="password" name="rpassword"  id="rpassword" value="<?php echo (!empty($_POST['rpassword']))?$_POST['rpassword']:''; ?>" />
		</span>
	</div>
	
	<div id="row">
		<span class="mandatory-item">*</span>
		<span class="label">Email:</span>
		<span class="input-content">
		<input class="inputtext" type="text" name="email"  id="email" value="<?php echo (!empty($_POST['email']))?$_POST['email']:''; ?>" />
		</span>
	</div>
	<div id="row" style="height:100px;">
		<span class="mandatory-item">*</span>
		<span class="label">Address:</span>
		<span class="input-content">
		<textarea name="address" id="address" cols="20" rows="4"><?php echo (!empty($_POST['address']))?$_POST['address']:''; ?></textarea>
		</span>
	</div>
	<div id="row">
		<span class="label"></span>
		<span class="input-content">
		<input type="submit" onclick="return validateAccount();" name="button" class="button" value="Sign up" />
		</span>
	</div>	
</div>
</form>
</div>
</div>
</body>
</html>