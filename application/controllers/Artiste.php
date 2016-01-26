<?php
class Artiste extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('artiste_model');
		$this->load->helper('url');
		$this->load->library('session');
	}

	public function recherche()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['journees'] = $this->artiste_model->get_journees();

		$data['title'] = 'Recherche de salle';
		
		if($this->form_validation->run() !== FALSE)
		{
			
		}

		$data['action']='deconnexion';
		$data['label']='Se déconnecter';
		$this->load->view('header', $data);
		$this->load->view('nav_artiste');
		$this->load->view('recherche');
		$this->load->view('footer');
	}

	public function resultat() {
		$data['action']='deconnexion';
		$data['label']='Se déconnecter';
		$this->load->view('header', $data);
		$this->load->view('nav_artiste');
		$this->load->view('resultat');
		$this->load->view('footer');
	}
}
?>