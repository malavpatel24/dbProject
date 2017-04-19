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

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session'); //Will need session to do login
		$this->load->model('User');
	}

	//This just "redirects" to login
	public function index()
	{
		$this->login();
	}

	//Route to register a user
	public function register()
	{
		//If logged in, redirect to dashboard
		if($this->session->has_userdata('USER_ID'))
			redirect(site_url() . 'test');//Redirect to dasboard

		$this->load->view('header');
		$this->load->view('register');
		$this->load->view('footer');
	}

	//Performs the registration given in register()
	public function do_register()
	{
		//If logged in, redirect to dashboard
		if($this->session->has_userdata('USER_ID'))
			redirect(site_url() . 'test');//Redirect to dasboard

		$user = new User();

		$user->name = $this->input->post('name');
		$user->email = $this->input->post('email');
		$user->password = $this->input->post('password');

		if($user->password != $this->input->post('password2'))
		{
			$this->load->view('header');
			$user->password = ''; //Clear password on error
			$this->load->view('register', ['errors' => ['Please confirm that the passwords enter match.'], 'user' => $user]);
			$this->load->view('footer');
		}
		else if(!$this->User->create_user($user))
		{
			$this->load->view('header');
			$user->password = ''; //Clear password on error
			$this->load->view('register', ['errors' => ['This email is already in use.'], 'user' => $user]);
			$this->load->view('footer');
		}
		else
			redirect(site_url() . 'users/login');
	}

	//Route for user to login
	public function login()
	{
		//If logged in, redirect to dashboard
		if($this->session->has_userdata('USER_ID'))
			redirect(site_url() . '');//Redirect to dasboard

		if(isset($_POST['username']) && isset($_POST['password']))
		{
			if(!$this->User->login($_POST['username'], $_POST['password']))
			{
				//Login unsuccessful. Send back to login with error
				$this->load->view('header');
				$this->load->view('login', ['errors' => ['Username/Password incorrect.']]);
				$this->load->view('footer');
			}
			else
			{
				//Redirect to dasboard, user session is established
				redirect(site_url() . '');
			}
		}
		else
		{
			$this->load->view('header');
			$this->load->view('login');
			$this->load->view('footer');
		}
	}

	//Route for user to logout
	public function logout()
	{
		$this->session->sess_destroy(); //Remove user session and return to homepage
		redirect(site_url());
	}

	//Maybe this page? Not sure if we want to implement this
	public function forgot_password()
	{
		$this->load->view('welcome_message');
	}
}
