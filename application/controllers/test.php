<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class test extends CI_Controller {

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
		$this->load->model(['User', 'Locations']);
	}

	//This just "redirects" to login
	public function index()
	{
		//$this->User->login(); //Call user functions like this
		//$this->Location->login(); //Call Location functions like this

		//print_r($var) //Print a variable to stdout, without a view

		//$this->load->view('view-to-test'); //Pass a view here to load it
		//$this->load->view('view-to-test', ['locations' => $locations]); //Passes the locations variable to the view, so it can be used in the view
	}
}
