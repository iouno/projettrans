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

	public function index()
	{
		$this->session->set_userdata('etat', 'disconnected');
		$this->session->unset_userdata('user');
		$this->acceuil();
	}

	public function acceuil()
	{
		$data['title'] = 'Accueil';
		$data['username'] = null;

		$this->load->view('header', $data);

		if ($this->session->all_userdata()['etat'] == 'connected')
		{
			$data['username'] = $this->session->all_userdata()['user']['username'];
		}
		else
		{

		}

		$this->load->view('home', $data);
		$this->load->view('footer');
	}

}
?>
