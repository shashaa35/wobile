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
	public function test()
	{
		echo "string";
	}
	public function index()
	{

		$this->load->view('index.php');
	}
	public function signup()
	{
		$message="";
		print_r($_POST['data']);
		$username=$this->input->post("username");
		$password=$this->input->post("password");
		$email=$this->input->post("email");
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
		$username=$this->input->post("username");
		$password=$this->input->post("password");
		$exist=$this->users_model->login($username,$password);
		if($exist)
		{
			$this->session->set_userdata('username',$username);
			$this->session->set_userdata('password',$password);
			echo json_encode("successful");
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
		$username=$this->session->userdata("username");
		$password=$this->session->userdata("password");
		$user_id=$this->users_model->get_user_id($username,$password);

		$name=$this->input->post("name");
		$fb_link=$this->input->post("fb_link");
		$email=$this->input->post("email");
		$phone=$this->input->post("phone");

		$this->users_model->insert_contact($user_id,$name,$fb_link,$email,$phone);
	}
	public function recent()
	{
		$username=$this->session->userdata("username");
		$password=$this->session->userdata("password");
		$user_id=$this->users_model->get_user_id($username,$password);

		$arr=$this->users_model->get_recents($user_id);
		echo json_encode($arr);
	}
	

}
