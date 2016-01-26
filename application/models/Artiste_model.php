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

	public function add_artiste()
	{
		$id = $this->db->query('select max(id) from transmusicales._id');
		$id = $id->result_array();
		$id = $id[0]['max']+1;
		$data = array('id'=>$id);
		$this->db->insert('_id', $data);

		$data = array (
			'idartiste'=>$id,
			'nom'=>$this->input->post('nom'),
			'mail'=>$this->input->post('mail'),
			'pays'=>$this->input->post('pays'),
			'datedebut'=>$this->input->post('dateDeb'),
			'formation'=>$this->input->post('formation'),
			'genre'=>$this->input->post('genre'),
			'parente'=>$this->input->post('parentes'),
			'site'=>$this->input->post('site'),
		);
		$this->db->insert('_artiste', $data);

		return $data;
	}

	public function get_journees()
	{
		$query = $this->db->query('SELECT * FROM transmusicales._journee');
		return $query->result_array();
	}

	public function recherche_salle()
	{

		switch ($this->input->post('capacite'))
		{
			case 1 : $gt = 0; $lt = 100;
			break;
			case 2 : $gt = 100; $lt = 200;
			break;
			case 3 : $gt = 200; $lt = 500;
			break;
			case 4 : $gt = 500; $lt = 1000;
			break;
			case 5 : $gt = 1000; $lt = 100000;
			break;
			default : $gt = 0; $lt = 100000;
		}

		$jour = '';
		$nbj = 0;
		/*foreach (get_journees() as $journee)
		{
			if($this->input->post($journee['jour']))
			{
				if ($nbj == 0) {
					//$jour = 'and (jour = '
				}
			}
		}
*/
		$hand = '';
		if ($this->input->post('accessibilite'))
		{
			$hand = 'and handicape = '."'TRUE'";
		}

		// Cas ou le nom est saisi
		if (''!==$this->input->post('nom'))
		{
			$queryCentre = 'and s.nom = '."'".$this->input->post('nom')."'";
		}
		else
		{
			$queryCentre = ' where capacite >= '.$gt.' and capacite <= '.$lt.$hand;
		}

		$queryDeb = 'select idsalle, resp, s.nom, r.nom as nomresp, tarif, s.adresse, prenom, tel, mail from transmusicales._salle s INNER JOIN transmusicales._respsalle r ON s.resp = r.idres ';
		$queryFin = ' FETCH FIRST 3 ROWS ONLY';
		$query = $this->db->query($queryDeb.$queryCentre.$queryFin);

		return $query->result_array();
	}

	function get_creneau($idsalle) {
		$query = $this->db->query('select idcreneau, jour, hdebut, hfin from transmusicales._salle s INNER JOIN transmusicales._creneau c ON s.idsalle = c.salle where idsalle = '.$idsalle);
		return $query->result_array();
	}

	function get_reserv_attente() {
		$query = $this->db->query('select * from transmusicales.reserv_attente');
		return $query->result_array();
	}

	function valide_reserv($id) {
		$this->db->query("UPDATE transmusicales._reservation SET statut = 'validee' WHERE idreserv = ".$id);
	}

	function annul_reserv($id) {
		$query = $this->db->query('select * from transmusicales._reservation where idreserv = '.$id);
		$query = $query->result_array();
		$query = $query[0];
		$data['idannul'] = $query['idreserv'];
		$data['datereserv'] = $query['datereserv'];
		$data['artiste'] = $query['artiste'];
		$data['creneau'] = $query['creneau'];
		$this->db->insert('_annulation', $data);
		$this->db->query("UPDATE transmusicales._reservation SET statut = 'annulee' WHERE idreserv = ".$id);
	}
}
?>
