<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Login extends CI_Controller {



	public function index()

	{

		if(isset($_POST['username'])){

			if(isset($_POST['username'])){

				$return = $this->users_model->do_login();

				if($return['success']){

					$_SESSION['success'] = "You are logged on as an ". ucfirst($_SESSION['role']);

					redirect(base_url().'dashboard');exit;

				}

				$_SESSION['error'] = $return['message'];

			}

		}

		$this->load->view('login');

	}



	public function logout(){

		unset($_SESSION['user_id']);

		unset($_SESSION['username']);

		unset($_SESSION['role']);

		unset($_SESSION['email']);

		unset($_SESSION['name']);

		unset($_SESSION['first_name']);

		redirect(base_url());

	}

}

