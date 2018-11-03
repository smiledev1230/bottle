<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->data = array();
	}

	public function index()
	{
        redirect(base_url('user/profile'));
	}

	public function profile(){
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
        $this->data['user'] = $this->users_model->getUserProfile($_SESSION['user_id']);
        $this->load->view('admin/edit-team-member',$this->data);
    }
    public function password(){
        if(isset($_POST['Password'])){
			$return = $this->users_model->updatePassword();
			if($return['success']){
				$_SESSION['success'] = $return['message'];
				redirect($_SERVER['HTTP_REFERER']);exit;
			}
			else{
				$_SESSION['error'] = $return['message'];
			}

		}
        $this->load->view('change-password',$this->data);
	}
}
