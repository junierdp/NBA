<?php
	class Player extends CI_Controller {
		public function __construct(){
			parent::__construct();

			$this->load->model('Player_model');
			$this->load->model('Team_model');
		}

		function index(){
			$data = array();

			$data['players'] = $this->Player_model->show();

			$this->load->view('player/index', $data);
		}

		function insert(){
			$data = array();
			$data['teams'] = $this->Team_model->show();
			$this->load->view('player/insert', $data);

			$player = new stdClass();
			if($_POST){
				$player->name = $_POST['name'];
				$player->nickname = $_POST['nickname'];
				$player->teamID = $_POST['teamID'];
				$player->position = $_POST['position'];
				$player->number = $_POST['number'];

				$image = $_FILES['imagePlayer']['name'];
				$route = $_FILES['imagePlayer']['tmp_name'];
				$destination = "images/".$image;

				copy($route, $destination);
				$player->imagePlayer = $destination;

				$this->Player_model->insert($player);
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

			$data['player'] = $this->Player_model->getPlayer($id);
			$data['teams'] = $this->Team_model->show();

			$player = new stdClass();
			if($_POST){
				$player->playerID = $_POST['playerID'];
				$player->name = $_POST['name'];
				$player->nickname = $_POST['nickname'];
				$player->teamID = $_POST['teamID'];
				$player->position = $_POST['position'];
				$player->number = $_POST['number'];

				$image = $_FILES['imagePlayer']['name'];
				$route = $_FILES['imagePlayer']['tmp_name'];
				$destination = "images/".$image;

				copy($route, $destination);
				$player->imagePlayer = $destination;
				$this->Player_model->update($player);
			}

			$this->load->view('player/update', $data);
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
		    confirm('Are you sure that you want to delete this player');
		   </script>";
			$this->Player_model->delete($id);
			$this->index();
		}
	}
?>