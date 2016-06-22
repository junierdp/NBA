<?php
	class Player_model extends CI_Model{
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}

		function insert($player){
			$this->db->insert('player', $player);
			echo "<script languaje='javascript'>
		    alert('The player has been inserted');
		   </script>";
		}

		function show(){
			$query = $this->db->select('*');
			$query = $this->db->from('player');
			$query = $this->db->join('team', 'team.teamID = player.playerID');
			$query = $this->db->get();
			return $query->result();
		}

		function getPlayer($id){
			$player = new stdClass();
			$player->playerID = 0;
			$player->name = ""; 
			$player->nickname = "";
			$player->teamID = 0;
			$player->nickname = "";
			$player->position = "";
			$player->number = 0;

			$query = $this->db->where('playerID=', $id);
			$query = $this->db->get('player');

			$rs = $query->result();

			if(count($rs)>0){
				$player = $rs[0];
			}

			return $player;
		}

		function delete($id){
			$this->db->where('playerID=', $id);
			$this->db->delete('player');
			echo "<script languaje='javascript'>
		    alert('The player has been deleted');
		   </script>";
		}

		function update($player){
			$id = $player->playerID;
			if($id + 0 > 0){
				//update
				$this->db->where('playerID=', $id);
				unset($player->playerID);
				$this->db->update('player', $player);
			}
			var_dump($player);
		}
	}
?>