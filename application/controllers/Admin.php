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
		$this->load->model(['Location', 'Pictures', 'Type', 'User']);

		//If user not logged in, redirect. Need to check for user role as well
		$user_id = $this->session->userdata('USER_ID');
		$user_role = $this->session->userdata('USER_ROLE');
		if(!isset($user_id) || $user_role == 1)
		{
			redirect(site_url() . 'users/login');
		}
  }

	//Displays this admins dashboard
	public function index()
	{
		$locations = $this->Location->get_locations();
		$types_by_id = $this->Type->get_types_by_id();

		//Now that we have the locations, lets get each locations rating
		foreach($locations as $location)
			$location->ranking = $this->Location->get_location_ranking($location->id);

		$values = ['locations' => $locations, 'types' => $types_by_id];

		$this->load->view('header');
		$this->load->view('admin_locations', $values);
		$this->load->view('footer');
	}

	//Displays list of all locations
	//If a specific location is specified, location can be edited
	public function add_location()
	{
		$types = $this->Type->get_types_by_id();

		$this->load->view('header');
		$this->load->view('components/add_location', ['types' => $types]);
		$this->load->view('footer');
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
		{
			$this->load->view('header');
			$this->load->view('components/add_location', ['errors' => ['There was an error creating this location.']]);
			$this->load->view('footer');
		}

		$error = $this->save_image($location->id);
		if($error != '') //Error if $error not empty string
		{
			$this->load->view('header'); //Should redirect to edit page
			$this->load->view('components/add_location', ['errors' => ['There was an error uploading the attached image: ' . $error]]);
			$this->load->view('footer');
		}
		else
			redirect(site_url('admin')); //Redirect to admin dashboard when made
	}

	//This function saves the image uploaded. Note that it returns the error on fail, and an
	//	empty string on success
	private function save_image($loc_id)
	{
		$config['upload_path'] = './uploaded_images/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size'] = 1000;
    $config['max_width'] = 1080000;
    $config['max_height'] = 10800000;

		$config['file_name'] = $loc_id . 'image'; //This may need to be changed for multiple images

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('image'))
    {
			return $this->upload->display_errors(); //Return error info
    }

		$info = $this->upload->data(); //Info about the uploaded file

		$picture = new Pictures();

		$picture->loc_id = $loc_id;
		$picture->pic_location = $info['file_name']; //File name may have been updated if multiple pics

		$this->Pictures->insert_picture($picture); //Upload picture
		return '';
	}

	//Maybe this page?
	//Displays list of all users
	//If a specific user (i.e. this user) is specified, the user can be edited by admin
	public function users()
	{
		$this->load->view('welcome_message');
	}
}
