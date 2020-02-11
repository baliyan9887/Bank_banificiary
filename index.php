<!--

		//  It is compatible with safari 12.0.1 // 

		Please Use Admin Username = admin@cretc.com
						 Password = admin123

-->
<!DOCTYPE html>
<html>
<head>
	<title>Bank</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<style type="text/css">
	label{
		margin-left: 10px;
		margin-top: 5px;
	}
	.text-secondary{
		
		font-size: 30px;

	}
	.one{
		margin-top: 40px;
		
		background-color: #f5f5f5;

		
	}
	.button{
		padding: 20px 10px;
		font-size: 20px;
		
	}
	
</style>
<body>
	<div class="containter">
		<div class="row">
			<div class="col-lg-6 m-auto">		
				<form action="update.php" method="post"><br><br>
				 <div class="card">
				 	<div class="card-header bg-dark">
				 	<h1 class="text-white text-center">Create a new Bank Account </h1>
				 </div>
				 	<label>Account no.</label>
				 	<input type="text" name="account_no" class="form-control" placeholder="Enter your Account no. " required pattern="^[0-9]{12}"><br>
				 	<label>Reference no.</label>
				 	<input type="text" name="reference_no" class="form-control" placeholder="Enter your Reference no." pattern="^[0-9]{12}"><br><br>
				 	<button name="submit" value="submit" class="btn btn-success">submit</button>
				 	<!--input type="submit" name="submit" value="submit"-->
				 	
				 </div>
			</form>
			<form action="update.php" method="post"><br><br>
				 <div class="card">
				 	<div class="card-header bg-dark">
				 	<h1 class="text-white text-center">Admin Login </h1>
				 </div>
				 	<label>Username</label>
				 	<input type="text" name="username" class="form-control" placeholder="Enter your Username " required ><br>
				 	<label>Password</label>
				 	<input type="password" name="password" class="form-control" placeholder="Enter your Password" required><br><br>
				 	<button name="login" value="submit" class="btn btn-success">Login</button>
				 	<!--input type="submit" name="submit" value="submit"-->
				 	
				 </div>
			</form>
		</div>
	</div>	
</div> 

<script src="bootstrap.min.js"></script>
</body>
</html>
