<?php namespace model;

use lib\database\mysql\PDOMySQL;

class AdminRoom
{
	private $ctrl;
	private $db;
	public $pagination;

	public function __construct()
	{	
		$this->db = new PDOMySQL();
	}

	public function selectRoomAll()
	{ 
		$query = "
			SELECT 
				mee_no,
				room_name, 
				status
			FROM 
				meeting_rooms 
		";
		$query = $this->db->conn->prepare($query);
		$query->execute();
		$query = $query->fetchAll(FETCH_OBJ);
		return $query;
	}

	public function selectRoomId($idRoom)
	{
		if ($idRoom == '') {
		 	$idRoom = 0;
		 } 
		$query = "
			SELECT 
				mee_no,
				room_name, 
				status
			FROM 
				meeting_rooms 
			WHERE 
				mee_no = {$idRoom}
		";
		$query = $this->db->conn->prepare($query);
		$query->execute();
		$query = $query->fetchAll(FETCH_OBJ);
		return $query;
	}

	public function updateRoom($idRoom, $dataRoom)
	{
		$dataRoom->status = (isset($dataRoom->status)=='on')? 1 : 0 ;
		$query = "
			UPDATE 
				meeting_rooms
			SET
				room_name = '{$dataRoom->room_name}',
				status = '{$dataRoom->status}'
			WHERE 
				mee_no = {$idRoom}
		";
		$query = $this->db->conn->prepare($query);
		$query->execute();
		$query = $query->fetchAll(FETCH_OBJ);
		return $query;
	}

	public function deleteRoom($idRoom)
	{ 
		$query = "
			DELETE FROM 
				reservations
			WHERE 
				mee_no = {$idRoom};
		";
		$query = $this->db->conn->prepare($query);
		$query->execute();

		$query = "
			DELETE FROM 
				meeting_rooms
			WHERE 
				mee_no = {$idRoom};
		";
		$query = $this->db->conn->prepare($query);
		$query->execute();
	}


	public function insertRoom($dataRoom)
	{ 
		$dataRoom->status = (isset($dataRoom->status)=='on')? 1 : 0 ;
		$query = "
			INSERT INTO meeting_rooms (
				room_name,
				status
			) VALUES (
				'{$dataRoom->room_name}',
				'{$dataRoom->status}'
			);
		";
		$query = $this->db->conn->prepare($query);
		$query->execute();
	}
}

?>