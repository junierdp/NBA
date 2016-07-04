<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>NBA - User</title>

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
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="<?php echo base_url('player/index');?>"><span class="">NBA</span></a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="<?php echo base_url('player/index');?>"><span>Players</span></a></li>
				<li><a href="<?php echo base_url('team/index');?>"><span>Teams</span></a></li>
				<li><a href="<?php echo base_url('user/index');?>"><span>Users</span></a></li>
				<li><a href="<?php echo base_url('player/insert');?>"><span>Insert a player</span></a></li>
				<li><a href="<?php echo base_url('team/insert');?>"><span>Insert a team</span></a></li>
				<li><a href="<?php echo base_url('user/insert');?>"><span>Insert a user</span></a></li>
			</ul>
			<?php
				if($_SESSION['user'] != null){
					$logout = base_url('login/logout');
					echo "<ul class=\"nav navbar-nav navbar-right\">
							<li><a href\"#\"><span class=\"glyphicon glyphicon-user\"></span> User: {$_SESSION['user']}</a></li>
							<li><a href=\"$logout\">Logout</a></li>
						</ul>";
				}
			?>
		</div>
	</nav>

	<div class="container">
		<div class="row col-md-offset-2">
			<form method="post" action="<?php echo base_url('user/insert');?>" enctype="multipart/form-data" autocomplete="off">
				<div class="col-md-9">
					<div class="form-group input-group has-success">
						<span class="input-group-addon">First Name:</span>
						<input type="text" name="firstName" class="form-control input-lg" required>
					</div>
					<div class="form-group input-group has-success">
						<span class="input-group-addon">Last Name:</span>
						<input type="text" name="lastName" class="form-control input-lg" required>
					</div>
					<div class="form-group input-group has-success">
						<span class="input-group-addon">Username:</span>
						<input type="text" name="userName" class="form-control input-lg" required>
					</div>
					<div class="form-group input-group has-success">
						<span class="input-group-addon">Email:</span>
						<input type="text" name="email" class="form-control input-lg" required>
					</div>
					<div class="form-group input-group has-success">
						<span class="input-group-addon">Password:</span>
						<input type="password" name="pass" class="form-control input-lg" required>
					</div>
					<div class="form-group has-success input-group">
						<span class="input-group-addon">Photo:</span>
						<input type="file" class="form-control input-lg" name="imageUser" id="imageUser" required>
					</div>
					<div class="form-group col-md-offset-8">
						<button class="btn btn-danger btn-lg" type="reset">Cancel</button>
						<button class="btn btn-success btn-lg" type="submit">Insert</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>