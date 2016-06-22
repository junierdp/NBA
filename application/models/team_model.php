<?php
	class Team_model extends CI_Model{
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}

		function insert($team){
			$this->db->insert('team', $team);
			echo "<script languaje='javascript'>
		    alert('The team has been inserted');
		   </script>";
		}

		function show(){
			$query = $this->db->get('team');
			return $query->result();
		}

		function getTeam($id){
			$team = new stdClass();
			$team->teamID = 0;
			$team->teamName = ""; 
			$team->city = "";

			$query = $this->db->where('teamID=', $id);
			$query = $this->db->get('team');

			$rs = $query->result();

			if(count($rs)>0){
				$team = $rs[0];
			}

			return $team;
		}

		function update($team){
			$id = $team->teamID;
			if($id + 0 > 0){
				//update
				$this->db->where('teamID=', $id);
				unset($team->teamID);
				$this->db->update('team', $team);
			}
		}

		function delete($id){
			$this->db->where('teamID=', $id);
			$this->db->delete('team');
			echo "<script languaje='javascript'>
		    alert('The team has been deleted');
		   </script>";
		}
	}
?>