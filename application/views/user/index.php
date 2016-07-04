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

	<?php
		$html = "<div class=\"container\">";

		foreach($users as $user){
			$linkUpdate = base_url("/user/update/?id={$user->userID}");
			$linkDelete = base_url("/user/delete/?id={$user->userID}");
			$html .= "<div style=\"height: 400px;\" class=\"col-md-3 well\">";
			$html .= "<img style=\"height: 190px; width: 100%;\" class=\"img-responsive img-thumbnail\" src=\"{$user->imageUser}\"/>";
			$html .= "<h4 class=\"text-primary\">First Name: {$user->firstName}</h4>";
			$html .= "<h4 class=\"text-primary\">Last Name: {$user->lastName}</h4>";
			$html .= "<h4 class=\"text-primary\">Username: {$user->userName}</h4>";
			$html .= "<h4 class=\"text-primary\">Email: {$user->email}</h4>";
			$html .= "<a href=\"{$linkUpdate}\"><span class=\"label label-default\">Modify</span></a>";
			$html .= " <a href=\"{$linkDelete}\"><span class=\"label label-danger\">Delete</span></a>";
			$html .= "</div>";
		}
		$html .= "</div>";
		echo $html;
	?>
</body>