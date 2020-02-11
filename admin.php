<?php
	session_start();
	$connection = mysqli_connect('localhost', 'root', '', 'testbank');
	if (!$connection) {
		echo "Connection is not established !!".mysqli_error();
	}
	if (!$_SESSION['username']) {
		header('location: index.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<style type="text/css">
		a{
			margin-top: 10px;

		}
		h1{
			font-size: 60px;
			margin-top: 10px;
		}
		h3{
			font-size: 30px;
			margin-top: 10px;
		}
		h2{
			margin-top: 10px;
			font-size: 40px;
		}
	</style>
</head>
<body>
	<div class="col-lg-6 m-auto text-center">
		<h1>Welcome Back!!</h1><br>
	<h3> Mr. <?php echo ($_SESSION['username']); ?></h3>
	  <a href="logout.php" class="btn btn-danger">Logout</a>
	  <hr>
	  <form action="admin.php" method="post">
	  <input type="text" name="search" class="form-control" placeholder="Search..." required><br>
	  <button name="submit" value="submit" class="btn btn-primary">submit</button>
	  </form>
	  <h2 class="text-warning text-center">Benificiary Accounts</h2>
	  <table class="table table-striped table-hover table-bordered">
	  	<tr>
	  		<th>Account_no.</th>
	  		<th>Reference_no.</th>
	  		<th>Benificiary Accounts_no.</th>
	  	</tr>
	  	<?php
	  			$query = mysqli_query($connection, "SELECT * FROM benificiary");
	  			while ($row = mysqli_fetch_array($query)) {
	  	?>
	  	<tr>
	  		<td><?php echo $row['account_no']; ?></td>
	  		<td><?php echo $row['reference_no']; ?></td>
	  		<td><?php echo $row['benefit']; ?></td>
	  	</tr>
	  	<?php
	  }
	  	?>
	  </table>
		
	</div>
</body>
</html>

<?php
	if (!empty($_REQUEST['search'])) {

	$search = mysql_real_escape_string($_REQUEST['search']);     

	$sql = "SELECT * FROM banifi WHERE account_no LIKE '%".$search."%'"; 
	$r_query = mysql_query($sql); 

	while ($row = mysql_fetch_array($r_query)){  
	echo 'Primary key: ' .$row['PRIMARYKEY'];  
	echo '<br /> Code: ' .$row['Code'];  
	echo '<br /> Description: '.$row['Description'];  
	echo '<br /> Category: '.$row['Category'];  
	echo '<br /> Cut Size: '.$row['CutSize'];   
	}  

	}



?>