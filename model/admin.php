<?php namespace model;

use lib\database\mysql\PDOMySQL;

class Admin
{

	private $ctrl;
	private $db;
	public $pagination;

	public function __construct()
	{	
		$this->db = new PDOMySQL();
	}

	public function selectUsersAll()
	{ 
		$query = "
			SELECT 
				use_no,
				full_name, 
				email, 
				status
			FROM 
				user 
		";
		$query = $this->db->conn->prepare($query);
		$query->execute();
		$query = $query->fetchAll(FETCH_OBJ);
		return $query;
	}

	public function selectUsersId($idUser)
	{
		if ($idUser == '') {
		 	$idUser = 0;
		 } 
		$query = "
			SELECT 
				full_name, 
				email, 
				status
			FROM 
				user 
			WHERE 
				use_no = {$idUser}
		";
		$query = $this->db->conn->prepare($query);
		$query->execute();
		$query = $query->fetchAll(FETCH_OBJ);
		return $query;
	}

	public function updateUser($idUser, $dataUser)
	{
		$dataUser->status = (isset($dataUser->status)=='on')? 1 : 0 ;
		$query = "
			UPDATE 
				user
			SET
				full_name = '{$dataUser->full_name}',
				email = '{$dataUser->email}',
				status = '{$dataUser->status}'
			WHERE 
				use_no = {$idUser}
		";
		$query = $this->db->conn->prepare($query);
		$query->execute();
		$query = $query->fetchAll(FETCH_OBJ);
		return $query;
	}

	public function deleteUser($idUser)
	{ 
		$query = "
			DELETE FROM 
				reservations
			WHERE 
				use_no = {$idUser};
		";
		$query = $this->db->conn->prepare($query);
		$query->execute();

		$query = "
			DELETE FROM 
				user
			WHERE 
				use_no = {$idUser};
		";
		$query = $this->db->conn->prepare($query);
		$query->execute();
	}


	public function insertUser($dataUser)
	{ 
		$dataUser->status = (isset($dataUser->status)=='on')? 1 : 0 ;

		$query = "
			INSERT INTO user (
				full_name,
				email,
				status
			) VALUES (
				'{$dataUser->full_name}',
				'{$dataUser->email}',
				{$dataUser->status}
			);
		";
		$query = $this->db->conn->prepare($query);
		$query->execute();
		$i = $query->fetchAll(FETCH_OBJ);

		$query = "
			SELECT 
				use_no
			FROM 
				user 
			WHERE 
				email = '{$dataUser->email}'
			LIMIT 1;
		";
		$query = $this->db->conn->prepare($query);
		$query->execute();
		$idUser = $query->fetchAll(FETCH_OBJ);
		$idUser = $idUser[0]->use_no;

		if (isset($dataUser->password) && $idUser) {
			$hash = strtoupper(MD5($idUser.$dataUser->password));
			$query = "
				UPDATE 
					user
				SET
					hash = '{$hash}'
				WHERE 
					use_no = {$idUser}
			";
			$query = $this->db->conn->prepare($query);
			$query->execute();
		}
	}

	public function updatePassword($idUser, $dataUser)
	{ 
		if (isset($dataUser->password) && $idUser) {
			$hash = strtoupper(MD5($idUser.$dataUser->password));
			$query = "
				UPDATE 
					user
				SET
					hash = '{$hash}'
				WHERE 
					use_no = {$idUser}
			";
			$query = $this->db->conn->prepare($query);
			$query->execute();
		}
	}


}

?>