<?php
class Recherche extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('salle_model');
		$this->load->helper('url');
		$this->load->library('session');
	}

	public function form()
	{
		
	}

}
?>
