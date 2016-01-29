<?php
class Reservation extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('reservation_model');
		$this->load->helper('url');
		$this->load->library('session');
	}

	public function reserver() {
		
		$this->load->helper('form');		
		$this->load->library('form_validation');


		$data['title']='Réservation';
		
		$content = 'reservation';
		
		if (!empty($this->reservation_model->get_reservation_by_salle($this->input->post('nomSalle')))) && {
			if (!empty($this->reservation_model->get_reservation_by_creneau($this->input->post('creneau')))){
				$content = 'reservationNon';
			} else {
				$this->reservation_model->addReservation();
				$content = 'reservationOk';
			}
		} else {
			$this->reservation_model->addReservation();
			$content = 'reservationOk';
		}	
		
		$data['action']='deconnexion';
		$data['label']='Se déconnecter';
		$this->load->view('header', $data);
		$this->load->view('nav_artiste');
		$this->load->view($content,$data);
		$this->load->view('footer');

	}
}
?>