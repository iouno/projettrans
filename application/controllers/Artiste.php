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
		$data['iduser'] = null;

		if ($this->session->all_userdata()['etat'] == 'connected')
		{
			$data['action']='deconnexion';
			$data['label']='Se déconnecter';
			$data['iduser'] = $this->session->all_userdata()['user']['idutilisateur'];
		}
		else
		{
			$data['action']='connexion';
			$data['label']='Se connecter';
		}

		$this->load->view('header', $data);
		$this->load->view('home', $data);
		$this->load->view('footer');
	}

	public function inscription()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Inscription';

		//$this->form_validation->set_rules('login', 'Identifiant', 'required');

		$data['msg_erreur'] = NULL;

		if($this->form_validation->run() !== FALSE)
		{
			if (!empty($this->artiste_model->artiste_get_user($this->input->post('login'))))
			{
				$data['msg_erreur'] = "L'utilisateur existe déja";
			}
			else
			{
				$this->session->set_userdata('etat', 'connected');
				$user = $this->todo_model->todo_add_user();
				$this->session->set_userdata('user', $user);
			}

		}

		if ($this->session->all_userdata()['etat'] == 'connected')
		{
			$this->acceuil();
		}
		else
		{
			$this->load->view('header', $data);
			//$this->load->view('menuDisconnected');
			$this->load->view('inscription', $data);
			$this->load->view('footer');
		}
	}

	public function connexion()
	{
		if ($this->session->all_userdata()['etat'] == 'connected')
		{
			$this->acceuil();
		}
		else
		{
			$this->load->helper('form');
			$this->load->library('form_validation');

			$data['title'] = 'Connexion';

			$this->form_validation->set_rules('login', 'Enoncé;', 'required');
			$this->form_validation->set_rules('pass', 'Enoncé;', 'required');

			$data['msg_erreur'] = NULL;

			if($this->form_validation->run() !== FALSE)
			{
				$user = $this->artiste_model->get_user($this->input->post('login'));

				if (isset($user[0]))
				{
					$user = $user[0];

					if ($user['pass'] == $this->input->post('pass'))
					{
						$this->session->set_userdata('etat', 'connected');
						$this->session->set_userdata('user', $user);
						$this->acceuil();
					}
					else
					{
						$data['msg_erreur'] = "Mot de passe incorrect";
					}
				}
				else
				{
					$data['msg_erreur'] = "Identifiant inconnu";
				}
			}

			if ($this->session->all_userdata()['etat'] !== 'connected')
			{
				$data['action']='connexion';
				$data['label']='Se connecter';
				$this->load->view('header', $data);
				$this->load->view('connexion', $data);
				$this->load->view('footer');
			}
		}
	}

	public function deconnexion()
	{
		$this->index();
	}

}
?>
