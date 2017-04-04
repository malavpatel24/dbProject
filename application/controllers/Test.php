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
		$this->load->model(['User', 'Location']);
	}

	//This just "redirects" to login
	public function index()
	{
		//$this->User->login(); //Call user functions like this
		//$this->Location->login(); //Call Location functions like this
		$get_locations = $this->Location->get_locations();
		$get_location = $this->Location->get_location('name');
		$swag = $this->input->get('id');
		if( isset($swag))
			$get_location = $this->Location->get_location($swag);
		//$get_location_ranking = $this->Location->get_location_ranking(1);


		print_r($get_locations);
		print_r("<br />");
		print_r("<br />");
		print_r($get_location);


		//print_r($var) //Print a variable to stdout, without a view
		print_r('Hey There');

		//$this->load->view('view-to-test'); //Pass a view here to load it
		//$this->load->view('view-to-test', ['locations' => $locations]); //Passes the locations variable to the view, so it can be used in the view
	}
}
