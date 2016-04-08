<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

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

	function __Construct() {
		parent::__Construct();
		$this->load->model('users_model');
		$this->load->library('session');
		$this->load->helper( 'url');
	}
	public function index()
	{

		$this->load->view('index.php');
	}
	public function signup()
	{
		$message="";
		$username=$_REQUEST("username");
		$password=$_REQUEST("password");
		$email=$_REQUEST('email');
		$status=$this->users_model->signup($username,$password,$email);
		if($status)
		{
			$message="sign up successful";
			echo json_encode($message);
		}
		else
		{
			$message="error";
			echo json_encode($message);
		}
	}
	public function login()
	{
		$message="";
		$username=$this->session->userdata('username');
		if(!empty($username))
		{//back button
			$message="sign up first";
			echo json_encode($message);
		}
		else
		{
		$username=$_REQUEST("username");
		$password=$_REQUEST("password");
		$exist=$this->users_model->login($username,$password);
		if($exist)
		{
			$this->session->set_userdata('username',$username);
			$this->session->set_userdata('password',$password);
			$this->load->view('welcome.php');
		}
		else
		{//back button
			$message="sign up first";
			echo json_encode($message);
		}
		}
	}
	public function create_contact()
	{
		
	}
	

}
