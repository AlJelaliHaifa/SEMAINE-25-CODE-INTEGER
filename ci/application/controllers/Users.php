<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function connexion()
	{
        // Chargement du modèle 'UsersModel'
        $this->load->model('UsersModel');

    /* On appelle la méthode connexion() du modèle,
    * qui retourne le tableau de résultat ici affecté dans la variable $aListe (un tableau)     
    */
        $this->UsersModel->connexion();
	}


    public function inscription()
    {
        // Chargement du modèle 'UsersModel'
        $this->load->model('UsersModel');

        $this->UsersModel->inscription();
    }


	public function deconnexion()
	{
        // Chargement du modèle 'UsersModel'
        $this->load->model('UsersModel');

       $this->UsersModel->deconnexion();
	}


	public function inscriptionvalide()
	{
        // Chargement du modèle 'UsersModel'
        $this->load->model('UsersModel');

       $this->UsersModel->inscriptionvalide();
	}


    public function validationemail()
    {
        // Chargement du modèle 'UsersModel'
        $this->load->model('UsersModel');

        $this->UsersModel->validationemail($this->uri->segment(3));
    }


    public function resetpassword()
    {
        // Chargement du modèle 'produitsModel'
        $this->load->model('UsersModel');
    
        $this->UsersModel->resetpassword($this->uri->segment(3));
    }


    public function lostpassword()
    {
        // Chargement du modèle 'produitsModel'
        $this->load->model('UsersModel');

        $this->UsersModel->lostpassword();
    }


    public function resendemail()
    {
        // Chargement du modèle 'produitsModel'
        $this->load->model('UsersModel');

        $this->UsersModel->resendemail();
    }
}