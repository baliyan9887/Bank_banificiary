<?php
	session_start();
	if (!isset($_SESSION['account_no'])) {
		header('location: index.php');
	}
	$connection = mysqli_connect('localhost', 'root', '', 'testbank');
	if (!$connection) {
		echo "Connection is not established !!".mysqli_error();
	}
	if (isset($_POST['submit'])) {
		$account_no = $_POST['account_no'];
		$reference_no = $_POST['reference_no'];

		if ($account_no == $reference_no) {
			echo "<script> alert('Account no. and Reference no. cant be same !!'); window.location = 'index.php'; </script>";
		}


		$exist = mysqli_query($connection, "SELECT * FROM users WHERE account_no = '$account_no'");
		if (mysqli_num_rows($exist) > 0) {
			echo "<script> alert('Account no. already exist !!'); window.location = 'index.php'; </script>";
		} else {
			$query = mysqli_query($connection, "INSERT INTO users (account_no, reference_no) VALUES ('$account_no','$reference_no')");
		
		$_SESSION['reference_no'] = $reference_no;
		
		if (mysqli_num_rows($query) == 0) {
			$_SESSION['account_no'] = $account_no;
			$insert = mysqli_query($connection, "INSERT INTO benificiary (account_no, reference_no, benefit) VALUES ('$account_no', '$reference_no', '$reference_no')");
			if (mysqli_num_rows($insert) == 0) {
				header('location: home.php');
			}
			
		} else {
			echo "account is not created !";
		}
		}

		//updating benefits

		$queryx = mysqli_query($connection, "SELECT * FROM benificiary WHERE reference_no = '$reference_no'");
		$ro = mysqli_fetch_array($queryx);
		$exist = $ro['reference_no'];
		if ($exist == $reference_no) {
			$exist = mysqli_query($connection, "SELECT reference_no FROM benificiary WHERE account_no = '$reference_no'");
			$row = mysqli_fetch_array($exist);
			$old = $row['reference_no'];
			
			$query = mysqli_query($connection, "SELECT * FROM benificiary WHERE account_no = '$old'");
			$r = mysqli_fetch_array($query);
			$result = $r['benefit'];
			//echo $result;

			$update = mysqli_query($connection, "UPDATE benificiary SET benefit = '$result' WHERE account_no = '$account_no'");
			echo "update";
		} else {
			$updat_new = mysqli_query($connection, "UPDATE benificiary SET benfit = '$reference_no' WHERE account_no = '$account_no'");
		}
	}
	

	//Admin login
	if (!isset($_SESSION['account_no'])) {
		header('location: index.php');
	}
	if (isset($_POST['login'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		$query = mysqli_query($connection, "SELECT * FROM admin WHERE username = '$username' AND password = '$password'" );
		if (mysqli_num_rows($query) > 0) {
			$_SESSION['username'] = $username;
			header('location: admin.php');
		}
		else {
			echo "<script> alert('username and password is not correct'); window.location = 'index.php'; </script>";
		}
	}
	

	
?>