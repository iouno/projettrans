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
		$this->load->view('recherche', $data);
		$this->load->view('footer');
	}
}
?>