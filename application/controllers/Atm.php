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

		$this->load->view('header', $data);
		$this->load->view('nav_atm');
		$this->load->view('traiter_reservation');
		$this->load->view('footer');
	}
}