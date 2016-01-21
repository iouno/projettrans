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

	public function accueil() {

	}
}