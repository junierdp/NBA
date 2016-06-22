<?php
	class Player extends CI_Controller {
		public function __construct(){
			parent::__construct();

			$this->load->helper('url');
			$this->load->model('player_model');
			$this->load->model('team_model');
		}

		function index(){
			$data = array();

			$data['players'] = $this->player_model->show();

			$this->load->view('player/index', $data);
		}

		function insert(){
			$data = array();
			$data['teams'] = $this->team_model->show();

			$this->load->view('player/insert', $data);
			if($_POST){
				$this->player_model->insert($_POST);
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

			$data['player'] = $this->player_model->getPlayer($id);
			$data['teams'] = $this->team_model->show();

			$player = new stdClass();
			if($_POST){
				$player->playerID = $_POST['teamID'];
				$player->name = $_POST['name'];
				$player->nickname = $_POST['nickname'];
				$player->teamID = $_POST['teamID'];
				$player->position = $_POST['position'];
				$player->number = $_POST['number'];

				/*
				$image = $_FILES['image']['name'];
				$route = $_FILES['image']['tmp_name'];
				$destination = "application/images/".$image;

				copy($route, $destination);
				$team->image = $destination;
				*/
				$this->player_model->update($player);
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
			$this->player_model->delete($id);
			$this->index();
		}
	}
?>