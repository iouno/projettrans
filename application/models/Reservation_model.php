<?php

class Reservation_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
	
	public function get_reservation_by_salle($salle)
	{
		$query = $this->db->query('SELECT * FROM transmusicales._reservation r INNER JOIN SELECT * FROM transmusicales._creneau c ON r.creneau = c.idCreneau WHERE c.salle = '.$salle);
		return $query->result_array();
	}
	
	public function get_reservation_by_creneau($creneau)
	{
		$query = $this->db->query('SELECT * FROM transmusicales._reservation WHERE creneau = '.$creneau);
		return $query->result_array();
	}
	
	public function get_reservation_by_artist($artist)
	{
		$query = $this->db->query('SELECT * FROM transmusicales._reservation WHERE artiste = '.$artist);
		return $query->result_array();
	}
	
	public function add_reservation()
	{
		$today = date("d - m - Y");
		if (!$this.get_reservation()){
			$data = array (
				'dateReserv'=>$today,
				'statut'=>'attente',
				'artiste'=>$this->db->query('SELECT nom FROM transmusicales._artistte WHERE nom = '.$artist);
				'creneau'=>$this->input->post('creneau')
			)
		}
		
	}
?>
