<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>NBA - Player</title>
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

		foreach($players as $player){
			$linkUpdate = base_url("/player/update/?id={$player->playerID}");
			$linkDelete = base_url("/player/delete/?id={$player->playerID}");
			$html .= "<div style=\"height: 400px;\" class=\"col-md-3 well\">";
			$html .= "<img style=\"height: 190px; width: 100%;\" class=\"img-responsive img-thumbnail\" src=\"{$player->imagePlayer}\"/>";
			$html .= "<h4 class=\"text-primary\">Name: {$player->name}</h4>";
			$html .= "<h4 class=\"text-primary\">Nickname: {$player->nickname}</h4>";
			$html .= "<h4 class=\"text-primary\">Team: {$player->teamName}</h4>";
			$html .= "<h4 class=\"text-primary\">Position: {$player->position}</h4>";
			$html .= "<h4 class=\"text-primary\">Number: {$player->number}</h4>";
			$html .= "<a href=\"{$linkUpdate}\"><span class=\"label label-default\">Modify</span></a>";
			$html .= " <a href=\"{$linkDelete}\"><span class=\"label label-danger\">Delete</span></a>";
			$html .= "</div>";
		}
		$html .= "</div>";
		echo $html;
	?>

</body>
</html>