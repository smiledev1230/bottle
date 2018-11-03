<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Dashboard extends CI_Controller {



	public function __construct(){

		parent::__construct();

		$this->load->model('image_model');
		$this->data = array();

	}



	public function index()

	{

		

		$this->data['images'] = $this->image_model->getImages();

		$this->data['user'] = $this->users_model->getUserProfile($_SESSION['user_id']);

		$this->load->view('admin/dashboard',$this->data);

	}

	public function download_history(){
		$this->data['results'] = $this->image_model->getDownloadHistory();
		$this->load->view('admin/dowload-history',$this->data);
	}

}

