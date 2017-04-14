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
		$this->load->model(['User', 'Location', 'Pictures', 'Type']);
	}

	//Displays this users dashboard
	public function index()
	{
		$locations = $this->User->get_user_locations($this->session->userdata('USER_ID'));
		$types_by_id = $this->Type->get_types_by_id();

		//Now that we have the locations, lets get each locations rating
		foreach($locations as $location)
			$location->ranking = $this->Location->get_location_ranking($location->id);

		//We will also want to know each locations the user has ranked
		$ranks_up = $this->User->get_user_ranked_up($this->session->userdata('USER_ID'));
		$ranks_down = $this->User->get_user_ranked_down($this->session->userdata('USER_ID'));

		$values = ['locations' => $locations, 'ranks_up' => $ranks_up, 'ranks_down' => $ranks_down, 'types' => $types_by_id];

		$this->load->view('header');
		$this->load->view('dashboard', $values);
		$this->load->view('footer');
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
		$users = $this->User->get_users();

		$this->load->view('header');
		$this->load->view('components/users_table', ['users' => $users]);
		$this->load->view('footer');
	}

	//This function is called by AJAX to change the ranking for a location
	//The location id to change is a get parameter
	public function increment_rank()
	{
		$location_id = $this->input->get('id');
		$user_id = $this->session->userdata('USER_ID');

		if(!isset($location_id) || !isset($user_id))
		{
			return ""; //Return empty result, as there were errors
		}
	}

	//This function is called by AJAX to change the ranking for a location
	//The location id to change is a get parameter
	public function decrement_rank()
	{

	}

	public function location()
	{
		$this->load->model('Location');
		$this->load->model('Pictures');
		$id = $this->input->get('id');

		$locations = $this->Location->get_location($id);
		$pictures = $this->Pictures->get_picture($id);

		if (!isset($locations[0])) {

			redirect(site_url('Dashboard/locations'));
		}

		$values = ['location' => $locations[0], 'pictures' => $pictures];

		$this->load->view("header");
		$this->load->view("location", $values);
		$this->load->view("footer");
	}
}
