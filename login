<?php
session_start(); //Enable the session for this page
$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
<head>
<title>My Gaming Products Site</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php include("includes/header.inc"); ?>


<div id="wrapper">


<?php include("includes/aside.inc"); ?>


	<section>
		<section>
	<h2>Log In</h2>
		<form id="form1" name="form1" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
		<p>Email Address:<br><input type="text" name="email"></p>
		<p>Password:<br><input type="password" name="password"></p>
		<p><input type="submit" value="Submit" name="submit_register"></p>
		</form><br><br>
		<?php
		if(isset($msg)){
		echo $msg;
		}
		?>
	</section>
	</section>

</div>

<?php include("includes/footer.inc"); ?>

</body>
</html>
