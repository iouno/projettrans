<?php
class Atm extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('artiste_model');
		$this->load->helper('url');
		$this->load->library('session');
	}

	public function traiter_reservation() {
		$data['title'] = 'Traiter une demander de réservation';
		$data['action'] = 'deconnexion';
		$data['label'] = 'Se déconnecter';
		$data['reservations'] = $this->artiste_model->get_reserv_attente();

		$this->load->view('header', $data);
		$this->load->view('nav_atm');
		$this->load->view('traiter_reservation', $data);
		$this->load->view('footer');
	}

	public function valide_reserv($id = 0) {
		$this->artiste_model->valide_reserv($id);
		$this->traiter_reservation();
	}

	public function annul_reserv($id = 0) {
		$this->artiste_model->annul_reserv($id);
		$this->traiter_reservation();
	}
}