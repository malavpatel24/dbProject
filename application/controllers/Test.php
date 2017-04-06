<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

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
		$this->load->library('session'); //Will need session to do login
		$this->load->model(['User', 'Location', 'Pictures']);
	}

	//This just "redirects" to login
	public function index()
	{
		//$this->User->login(); //Call user functions like this
		//$this->Location->login(); //Call Location functions like this

		$locations = $this->Location->get_locations();
		//print_r($locationList);

		$users = $this->User->get_users();
		$pics = $this->Pictures->get_all_pictures();

		if($this->session->has_userdata('USER_EMAIL'))
		{
			print_r('<div class="alert alert-success">');
			print_r("<p>Hey buddy, you are logged in as " . $this->session->userdata('USER_EMAIL') . "</p>");
			print_r("<br />");
			print_r("<p>Click below to logout... hopefully anyways...</p>");
			print_r("<br />");
			print_r("<a href='" . base_url() ."index.php/users/logout'>Logout! :)</a>");
			print_r("<br />");
			print_r('</div>');
		}

		//print_r($var) //Print a variable to stdout, without a view
		//print_r('Hey There');

		$this->load->view('templates/header');
		$this->load->view('components/users_table', ['users' => $users]);
		$this->load->view('components/add_type', ['users' => $users]);
		$this->load->view('components/add_location', ['users' => $users]);
		$this->load->view('components/picture_test', ['pictures' => $pics]);
		$this->load->view('components/locations_table', ['locations' => $locations]);
		$this->load->view('templates/footer');
		//$this->load->view('view-to-test', ['locations' => $locations]); //Passes the locations variable to the view, so it can be used in the view
	}
}
