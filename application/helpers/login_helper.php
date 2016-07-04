<?php
	session_start();
	
	if(!isset($_SESSION['user']) && ! defined('nologin')){
		redirect('login');
	}
?>