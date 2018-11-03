<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->data = array();
	}

	public function index()
	{
		$this->data['users'] = $this->users_model->getAdminUsers();
		$this->load->view('team',$this->data);
	}

	public function add(){
		if(isset($_POST['FirstName'])){
			$return = $this->users_model->register();
			if($return['success']){
				$_SESSION['success'] = $return['message'];
				redirect($_SERVER['HTTP_REFERER']);exit;
			}
			else{
				$_SESSION['error'] = $return['message'];
			}

		}
		$this->load->view('admin/add-team-member',$this->data);
	}
	public function edit($id){
		if(isset($_POST['FirstName'])){
			$return = $this->users_model->update();
			if($return['success']){
				$_SESSION['success'] = $return['message'];
				redirect($_SERVER['HTTP_REFERER']);exit;
			}
			else{
				$_SESSION['error'] = $return['message'];
			}

		}
		$this->data['user'] = $this->users_model->getUserProfile($id);
		$this->load->view('admin/edit-team-member',$this->data);
	}
}
