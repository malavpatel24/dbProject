<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		//Check that the user is logged in here. If not, redirect to login
		$this->load->library('session'); //Will need session to do login
		$this->load->model(['User', 'Location', 'Pictures']);
	}

	//Displays this users dashboard
	public function index()
	{
		$this->load->view('welcome_message');
	}

	//Displays list of all locations
	//If a specific location is specified, show info about that location
	public function locations()
	{
		$locations = $this->Location->get_locations();

		$this->load->view('header');
		$this->load->view('components/locations_table', ['locations' => $locations]);
		$this->load->view('footer');
	}

	//Displays list of all users
	//If a specific user (i.e. this user) is specified, show info about that user
	public function users()
	{
		$this->load->model('User');
		$users = $this->User->get_users();

		$this->load->view('header');
		$this->load->view('components/users_table', ['users' => $users]);
		$this->load->view('footer');
	}
}
