<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){

		parent::__construct();

	
		$this->load->model('image_model');

		$this->data = array();

    }

	public function index()
	{
			$this->data['images'] = $this->image_model->getImages();
        	$this->load->view('home',$this->data);
	}

	public function download_request(){
		$this->image_model->logDownloadActivity();
		echo json_encode(true);
	}

	public function download_image($id){
		$image = $this->image_model->getImage($id);
		$file_url = "./uploads/".$image->filename;
		$this->load->helper('download');
		force_download($file_url, NULL);
	}
}
