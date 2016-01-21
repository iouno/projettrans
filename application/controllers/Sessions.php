<?php
class Sessions extends CI_Controller
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
		$this->accueil();
	}

	public function accueil()
	{
		$data['title'] = 'Accueil';

		if ($this->session->all_userdata()['etat'] == 'connected')
		{
			$data['action']='deconnexion';
			$data['label']='Se déconnecter';

			if ($this->is_id_resp_atm($this->session->all_userdata()['user']['idutilisateur']))
			{	
				$data['redirect'] = 2;
			}
			else
			{
				$data['redirect'] = 1;
			}
			$home = 'connected';
		}
		else
		{
			$data['action']='connexion';
			$data['label']='Se connecter';
			$home = 'home';
		}

		$this->load->view('header', $data);
		$this->load->view($home);
		$this->load->view('footer');
	}

	public function inscription()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Inscription';

		$this->form_validation->set_rules('nom', 'Nom', 'required|is_unique[_artiste.nom]');
		$this->form_validation->set_rules('mail', 'Adresse e-mail', 'required');
		$this->form_validation->set_rules('pays', "Pays d'origine", 'required');
		$this->form_validation->set_rules('dateDeb', 'Date de début', 'required');
		$this->form_validation->set_rules('formation', 'Formation', 'required');
		$this->form_validation->set_rules('genre', 'Genre', 'required');
		$this->form_validation->set_rules('parentes', 'Parentés', 'required');
		$this->form_validation->set_rules('site', 'Site web', 'required');

		$data['msg_erreur'] = NULL;
		$data['msg_valid'] = NULL;

		if($this->form_validation->run() !== FALSE)
		{
			if (!empty($this->artiste_model->get_artiste_by_name($this->input->post('nom'))))
			{
				$data['msg_erreur'] = "Un autre groupe possède déja ce nom.";
			}
			else
			{
				// Envoyer les données en attente de validation par l'ATM.
				$data['msg_valid'] 	= "Un identifiant et un mot de passe vous serons envoyés par courriel lorsque votre inscription sera validée.";
			}

		}

		if ($this->session->all_userdata()['etat'] == 'connected')
		{
			$this->acceuil();
		}
		else
		{
			$data['action']='connexion';
			$data['label']='Se connecter';
			$this->load->view('header', $data);
			$this->load->view('register', $data);
			$this->load->view('footer');
		}
	}

	public function connexion()
	{
		if ($this->session->all_userdata()['etat'] == 'connected')
		{
			$this->accueil();
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
						$this->accueil();
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

			if ($this->session->all_userdata()['etat'] != 'connected')
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

	public function is_id_resp_atm($id)
	{
		$lesRespATM = $this->artiste_model->get_respatm();
		$exist = FALSE;
		foreach ($lesRespATM as $num => $unResp) {
			if ($unResp['idrespatm'] == $id) {
				$exist = TRUE;
			}
		}
		return $exist;
	}
}
?>
