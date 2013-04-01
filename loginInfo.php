<?php 
include_once "header.php"; 
include_once "includes/connect.php"; 
include_once 'includes/user.php';

/*make database connection and select db */
$connectObj = new Connect();
$db = $connectObj->dbConnect();

/* create the instance of a class user */
$userObj = new User();

$message = null;
$error = null;
$loginInfo = array();
if(empty($_SESSION['userId'])) {
	header('Location:create.php');
}
if(!empty($_SESSION['userId'])) {
/* logic to remove record from program table */
	$userId = $_SESSION['userId'];
	$loginInfo = $userObj->getLogindetails($userId);
}

?>

<form action="#" method="post" enctype="multipart/form-data">
	<div id="content-header">Login Info </div>
	<div class="success-class"><?php  echo $message;?></div>
	<div class="error-class"><?php  echo $error;?></div>
	
<table  cellpading="2" style="width:700px;" cellspacing="0" border="1">
<tr style="background:#eee">
	<th>Id</th>
	<th>IP Address</th>
	<th>Datetime</th>
</tr>
<?php if(count($loginInfo) > 1) { 
	foreach($loginInfo as $row) { ?>
<tr>
	<td><?php echo $row['id']; ?></td>
	<td><?php echo $row['ipaddress']; ?></td>
	<td><?php echo date('d-m-Y, g:i:t',strtotime($row['loginDateTime'])); ?></td>
</tr>
<?php } } else  { ?>
<tr><td colspan="7">This is your first login </td></tr>

<?php  } ?>
</table>

</form>

</div>
</body>
</html>