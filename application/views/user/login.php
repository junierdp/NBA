<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>NBA - Login</title>
	<style type="text/css">
		body{
			background-image: url("images/BackgroundNBA.jpg");
			background-size: 100%;
		}

	</style>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
	<div class="col col-md-4"></div>
	<div class="col col-md-4 well">
		<div class="col col-md-4"></div>
		<div class="col col-md-2">
			<h3 class="text-success">Login </h3>
		</div>
		<div class="col col-md-4">
			<div class="col">
				<img class="img-responsive" src="https://www.orhuntoys.com/img/login.png" style="height: 50px; width: 50px ">
			</div>
		</div>
		
		<div class="col col-md-12">
			<form method="post" action="<?php echo base_url('login/login');?>">
				<div class="form-group input-group has-success">
					<span class="input-group-addon">Username:</span>
					<input type="text" name="username" class="form-control" autofocus required>
				</div>
				<div class="form-group input-group has-success">
					<span class="input-group-addon">Password:</span>
					<input type="password" name="pass" class="form-control" required>
				</div>
				<div class="form-group">
					<button class="btn btn-success btn-block" type="submit">Login</button>
				</div>
			</form>
		</div>
	</div>
	<div class="col col-md-4"></div>
</body>
</html>