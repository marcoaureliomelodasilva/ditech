<?php namespace model;

use lib\database\mysql\PDOMySQL;

class Scheduling
{
	private $db;

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

	public function selectSchedulingAll()
	{ 
		$query = "
			SELECT 
				r.res_no,
				r.date,
				r.hour,
				r.descript,
				u.full_name,
				m.room_name
			FROM reservations r
				LEFT JOIN meeting_rooms m
					ON r.mee_no = m.mee_no
				LEFT JOIN user u
					ON r.use_no = u.use_no
			ORDER BY date DESC
		";
		$query = $this->db->conn->prepare($query);
		$query->execute();
		$query = $query->fetchAll(FETCH_OBJ);
		return $query;
	}

	public function selectSchedulingToday()
	{ 
		$query = "
			SELECT 
				r.res_no,
				r.date,
				r.hour,
				r.descript,
				u.full_name,
				m.room_name
			FROM reservations r
				LEFT JOIN meeting_rooms m
					ON r.mee_no = m.mee_no
				LEFT JOIN user u
					ON r.use_no = u.use_no
			WHERE
				r.date=CURDATE()
			ORDER BY date DESC
		";
		$query = $this->db->conn->prepare($query);
		$query->execute();
		$query = $query->fetchAll(FETCH_OBJ);
		return $query;
	}


	public function selectSchedulingIdUser($idUser)
	{ 
		$query = "
			SELECT 
				r.res_no,
				r.date,
				r.hour,
				r.descript,
				u.full_name,
				m.room_name
			FROM reservations r
				LEFT JOIN meeting_rooms m
					ON r.mee_no = m.mee_no
				LEFT JOIN user u
					ON r.use_no = u.use_no
			WHERE 
				u.use_no = {$idUser}
			ORDER BY date DESC
		";
		$query = $this->db->conn->prepare($query);
		$query->execute();
		$query = $query->fetchAll(FETCH_OBJ);
		return $query;
	}

	public function selectSchedulingId($idSch)
	{
		if ($idSch == '') {
		 	$idSch = 0;
		 } 
		$query = "
			SELECT 
				r.res_no,
				r.date AS date_sch,
				r.hour,
				r.descript,
				m.mee_no

			FROM reservations r
				LEFT JOIN meeting_rooms m
					ON r.mee_no = m.mee_no
				LEFT JOIN user u
					ON r.use_no = u.use_no
			WHERE 
				res_no = {$idSch}
		";
		$query = $this->db->conn->prepare($query);
		$query->execute();
		$query = $query->fetchAll(FETCH_OBJ);
		return $query;
	}

	public function insertScheduling($dataSch)
	{ 
		$dataSch->descr = (isset($dataSch->descr))? $dataSch->descr :'';
		$query = "
			INSERT INTO reservations (
				mee_no,
				use_no,
				date,
				hour,
				descript
			) VALUES (
				'{$dataSch->room_sch}',
				'{$dataSch->use_no}',
				'{$dataSch->date_sch}',
				'{$dataSch->hour_sch}',
				'{$dataSch->descr}'
			)
		";
		$query = $this->db->conn->prepare($query);
		$query->execute();
	}


	public function updateScheduling ($idSch, $dataSch)
	{
		$dataSch->descr = (isset($dataSch->descr))? $dataSch->descr :'';
	 	$query = "
			UPDATE 
				reservations
			SET
				mee_no = '{$dataSch->room_sch}',
				date = '{$dataSch->date_sch}',
				hour = '{$dataSch->hour_sch}',
				descript = '{$dataSch->descr}'
			WHERE 
				res_no = {$idSch}
		";
		$query = $this->db->conn->prepare($query);
		$query->execute();
		$query = $query->fetchAll(FETCH_OBJ);
		return $query;
	}

	public function deleteScheduling($idSch)
	{ 
		$query = "
			DELETE FROM 
				reservations
			WHERE 
				res_no = {$idSch};
		";
		$query = $this->db->conn->prepare($query);
		$query->execute();
	}

	public function valididateScheduling($post)
	{ 
        $idUser=$post->use_no;
        $idRoom=$post->room_sch;
        $date=$post->date_sch;
        $time=$post->hour_sch;
		$query = "
			SELECT 
               	r.res_no
			FROM reservations r
				LEFT JOIN meeting_rooms m
					ON r.mee_no = m.mee_no
				LEFT JOIN user u
					ON r.use_no = u.use_no
			WHERE
				(m.mee_no = {$idRoom} AND (r.date ='{$date}' AND '{$time}' BETWEEN r.hour AND ADDTIME(SEC_TO_TIME(3600), r.hour))) OR
                (u.use_no = {$idUser} AND (r.date ='{$date}' AND '{$time}' BETWEEN r.hour AND ADDTIME(SEC_TO_TIME(3600), r.hour)))
            LIMIT 1;
		";
		$query = $this->db->conn->prepare($query);
		$query->execute();
		$row = $query->rowCount();
		$valid = ($row > 0)? 1 : 0 ;
		return $valid;
	}

}

?>