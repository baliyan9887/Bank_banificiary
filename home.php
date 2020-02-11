<?php
	session_start();
	$connection = mysqli_connect('localhost', 'root', '', 'testbank');
	if (!$connection) {
		echo "Connection is not established !!".mysqli_error();
	}
	//if (!$_SESSION['account_no']) {
	//	header('location: index.php');
	//}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<style type="text/css">
		a{
			margin-top: 30px;

		}
		h1{
			font-size: 100px;
			margin-top: 50px;
		}
		h3{
			font-size: 30px;
			margin-top: 20px;
		}
	</style>
</head>
<body>
	<div class="col-lg-6 m-auto text-center">
		<h1>Congratulation !!</h1><br>
	<h3> Account no. <?php echo ($_SESSION['account_no']); ?> created successfully!!!</h3>
	  <a href="logout.php" class="btn btn-danger">Logout</a>
		
	</div>
</body>
</html>