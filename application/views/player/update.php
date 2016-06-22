<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Player</title>
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
	<nav class="navbar container-fluid navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="<?php echo base_url('player/index');?>"><span class="">NBA</span></a>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="<?php echo base_url('player/index');?>"><span>Players</span></a></li>
				<li><a href="<?php echo base_url('team/index');?>"><span>Teams</span></a></li>
				<li><a href="<?php echo base_url('player/insert');?>"><span>Insert a player</span></a></li>
				<li><a href="<?php echo base_url('team/insert');?>"><span>Insert a team</span></a></li>
			</ul>
		</div>
	</nav>

	<div class="container">
		<div class="row">
			<form method="post" action="<?php echo base_url('player/update');?>">
				<div class="col-md-6">
					<div class="form-group input-group">
						<span class="input-group-addon">ID:</span>
						<input type="text" name="playerID" class="form-control" value="<?php echo $player->playerID?>" readonly>
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon">Name:</span>
						<input type="text" name="name" class="form-control" value="<?php echo $player->name?>">
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon">Nickname:</span>
						<input type="text" name="nickname" class="form-control" value="<?php echo $player->nickname?>">
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon">Team:</span>
						<select name="teamID" class="form-control">
							<option value="<?php echo $player->teamID?>"></option>
							<?php
								foreach($teams as $team){
									echo "<option value=\"{$team->teamID}\">{$team->name}</option>";
								}
							?>
						</select>
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon">Position:</span>
						<input type="text" name="position" class="form-control" value="<?php echo $player->position?>">
					</div>
					<div class="form-group input-group">
						<span class="input-group-addon">Number:</span>
						<input type="number" name="number" class="form-control" value="<?php echo $player->number?>">
					</div>
					<div class="form-group col-md-offset-9">
						<button class="btn btn-danger" type="reset">Cancel</button>
						<button class="btn btn-success" type="submit">Save</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>