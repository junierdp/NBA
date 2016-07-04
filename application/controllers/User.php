<?php
	class User extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('User_model');
		}

		function index(){
			$data = array();

			$data['users'] = $this->User_model->show();

			$this->load->view('user/index', $data);
		}

		function insert(){
			$this->load->view('user/insert');

			$user = new stdClass();
			if($_POST){
				$user->firstName = $_POST['firstName'];
				$user->lastName = $_POST['lastName'];
				$user->userName = $_POST['userName'];
				$user->email = $_POST['email'];
				$user->pass = md5($_POST['pass']);

				$image = $_FILES['imageUser']['name'];
				$route = $_FILES['imageUser']['tmp_name'];
				$destination = "images/".$image;

				copy($route, $destination);
				$user->imageUser = $destination;

				$this->User_model->insert($user);
			}
		}

		function update(){
			$data = array();
			$id = 0;
			if(isset($_GET['id'])){
				$id = $_GET['id'] + 0;
			}
			else{
				$id = 0;
			}

			$data['user'] = $this->User_model->getUser($id);

			$user = new stdClass();
			if($_POST){
				$user->userID = $_POST['userID'];
				$user->firstName = $_POST['firstName'];
				$user->lastName = $_POST['lastName'];
				$user->userName = $_POST['userName'];
				$user->email = $_POST['email'];
				$user->pass = md5($_POST['pass']);
				
				$image = $_FILES['imageUser']['name'];
				$route = $_FILES['imageUser']['tmp_name'];
				$destination = "images/".$image;

				copy($route, $destination);
				$user->imageUser = $destination;
				$this->User_model->update($user);
			}

			$this->load->view('user/update', $data);
		}

		function delete(){
			$id = 0;
			if(isset($_GET['id'])){
				$id = $_GET['id'] + 0;
			}
			else{
				$id = 0;
			}
			echo "<script languaje='javascript'>
		    confirm('Are you sure that you want to delete this user');
		   </script>";
			$this->User_model->delete($id);
			$this->index();
		}
	}
?>