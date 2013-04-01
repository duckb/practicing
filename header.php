<!doctype html>
<?php session_start(); ?>
<html>
<head>
<meta charset="utf-8">
<!-- TemplateBeginEditable name="doctitle" -->
<title>Sample-code</title>
<!-- TemplateEndEditable -->
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
<link href="style/style.css" rel="stylesheet" type="text/css" />

<script language="javascript" src="js/validate.js"></script>
</head>
<body>
<div id="container">
<div id="header" >

<div id="menu-box">
    <ul class="menu">
        <li><a href="create.php" <?php (!empty($_SESSION['userId']))?'onclick="confirmLogout();"':''; ?> >Create Account</a></li>
        <?php if(empty($_SESSION['userId'])) { ?>
		<li><a href="login.php" >Login</a></li>
		<?php } ?>
		<?php if(!empty($_SESSION['userId'])) { ?>
		<li><a href="logout.php" >Logout</a></li>
		<?php } ?>
	</ul>
</div>
</div>
<div id="main-content">

