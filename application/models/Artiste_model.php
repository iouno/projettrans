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

	public function add_artiste()
	{
		$data = array (
			'login'=>$this->input->post('login'),
			'username'=>$this->input->post('username'),
			'pass'=>$this->input->post('pass')
		);

		$this->db->insert('user', $data);

		return $data;
	}
}
?>
