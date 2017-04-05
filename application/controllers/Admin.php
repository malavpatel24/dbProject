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
		$this->load->model('Location');
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

	//Displays list of all locations
	//If a specific location is specified, location can be edited
	public function add_location()
	{
		$this->load->view('components/add_location');
	}

	//Performs the registration given in register()
	public function do_add_location()
	{
		$location = new Location();

		$location->name = $this->input->post('locationName');
		$location->description = $this->input->post('description');
		$location->type_id = $this->input->post('type');
		$location->cost = $this->input->post('cost');

		if(!$this->Location->create_location($location))
			$this->load->view('components/add_location', ['errors' => ['There was an error creating this location.']]);
		else
			redirect(base_url() . 'index.php/users/login'); //Redirect to admin dashboard when made
	}

	//Maybe this page?
	//Displays list of all users
	//If a specific user (i.e. this user) is specified, the user can be edited by admin
	public function users()
	{
		$this->load->view('welcome_message');
	}
}
