<?php
class Artiste_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}

	public function get_user($login)
	{
		$query = $this->db->query('SELECT * FROM transmusicales._utilisateur WHERE login = '."'".$login."'");
		return $query->result_array();
	}

	public function get_artiste_by_name($name)
	{
		$query = $this->db->query('SELECT * FROM transmusicales._artiste WHERE nom = '."'".$name."'");
		return $query->result_array();
	}

	public function get_respatm()
	{
		$query = $this->db->query('SELECT * FROM transmusicales._respATM');
		return $query->result_array();
	}

	public function get_reserv_attente()
	{
		$query = $this->db->query('SELECT * FROM transmusicales._reservation WHERE statut = '."'attente'");
		return $query->result_array();
		// Join
	}

	public function add_artiste()
	{
		$data = array (
			'nom'=>$this->input->post('nom'),
			'mail'=>$this->input->post('mail'),
			'pays'=>$this->input->post('pays'),
			'dateDeb'=>$this->input->post('dateDeb'),
			'formation'=>$this->input->post('formation'),
			'genre'=>$this->input->post('genre'),
			'parentes'=>$this->input->post('parentes'),
			'site'=>$this->input->post('site'),
		);

		$this->db->insert('user', $data);

		return $data;
	}

	public function get_journees()
	{
		$query = $this->db->query('SELECT * FROM transmusicales._journee');
		return $query->result_array();
	}
}
?>
