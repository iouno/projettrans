<?php
class Salle_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}

	public function get_salles()
	{
		$query = $this->db->query('SELECT * FROM transmusicales._salle');
		return $query->result_array();
	}

	public function get_salle_by_name($name)
	{
		$query = $this->db->query('SELECT * FROM transmusicales._salle WHERE nom = '."'".$name."'");
		return $query->result_array();
	}

}
?>
