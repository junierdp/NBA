<?php
	class Team extends CI_Controller {
		public function __Construct(){
			parent::__Construct();

			$this->load->model('Team_model');
		}

		function index(){
			$data = array();

			$data['teams'] = $this->Team_model->show();

			$this->load->view('team/index', $data);
		}

		function insert(){
			$this->load->view('team/insert');
			$team = new stdClass();
			if($_POST){
				$team->teamName = $_POST['teamName'];
				$team->city = $_POST['city'];

				$image = $_FILES['image']['name'];
				$route = $_FILES['image']['tmp_name'];
				$destination = "images/".$image;

				copy($route, $destination);
				$team->image = $destination;

				$this->Team_model->insert($team);
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

			$data['team'] = $this->Team_model->getTeam($id);

			$team = new stdClass();
			if($_POST){
				$team->teamID = $_POST['teamID'];
				$team->name = $_POST['teamName'];
				$team->city = $_POST['city'];

				$image = $_FILES['image']['name'];
				$route = $_FILES['image']['tmp_name'];
				$destination = "images/".$image;

				copy($route, $destination);
				$team->image = $destination;

				$this->Team_model->update($team);
			}

			$this->load->view('team/update', $data);
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
		    confirm('Are you sure that you want to delete this team');
		   </script>";
			$this->Team_model->delete($id);
			$this->index();
		}
	}
?>