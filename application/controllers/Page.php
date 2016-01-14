<?php
  class Pages extends CI_Controller {
    public function display($page = 'home'){
      if( !file_exists('application/views/'.$page.'.php')){
        //la page est inexistante, erreur 404
        show_404();
      }
      $data['title'] = ucfirst($page); //on met la première lettre en majuscule

      //et on charge la page
      $this->load->view('header', $data);
      $this->load->view($page, $data);
      $this->load->view('footer', $data);
    }
  }
?>
