<?php
	class Login extends CI_Controller{
		public function __construct(){

			define('nologin', true);
			parent::__construct();
			$this->load->model('User_model');
		}

		function index(){
			$this->load->view('user/login');
		}

		function login(){
			$username = $_POST['username'];
			$pass = $_POST['pass'];
			$tmp = $this->User_model->login($username, $pass);

			if($tmp != ''){
				$_SESSION['user'] = $tmp;
				redirect('player');
			}
			else{
				echo "<script languaje='javascript'>
		    confirm('User name or password incorrect');
		   </script>";
		   		$this->load->view('user/login');
			}
		}

		function logout(){
			session_destroy();
			redirect('login');
		}
	}
?>