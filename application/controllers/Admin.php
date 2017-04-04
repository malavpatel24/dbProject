<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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

	public function __construct()
  {
		parent::__construct();
		//Check that the user is logged in and an admin here. If not, redirect to login
		$this->load->library('session'); //Will need session to do login
  }

	//Displays this admins dashboard
	public function index()
	{
		$this->load->view('welcome_message');
	}

	//Displays list of all locations
	//If a specific location is specified, location can be edited
	public function locations()
	{
		$this->load->view('welcome_message');
	}


	//Maybe this page?
	//Displays list of all users
	//If a specific user (i.e. this user) is specified, the user can be edited by admin
	public function users()
	{
		$this->load->view('welcome_message');
	}
}
