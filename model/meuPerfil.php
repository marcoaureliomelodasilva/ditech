<?php namespace model;

use lib\database\mysql\PDOMySQL;

class meuPerfil
{
	private $db;

	public function __construct()
	{	
		$this->db = new PDOMySQL();
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