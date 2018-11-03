<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Upload extends CI_Controller {



	public function __construct(){

        parent::__construct();

        if(!isset($_SESSION['user_id'])){

			redirect(base_url());exit;

		}

        $this->load->model('image_model');

        $this->data = array();

        

    }

    

    public function index(){
		$this->load->view('drag-and-drop-upload');
    }



    public function process(){

        $return = $this->image_model->processUpload();
        if($return['success']){
            $_SESSION['success'] = $return['message'];
        }
        else{
            $_SESSION['error'] = $return['message'];
        }
        redirect(base_url('upload'));

    }

    public function process_upload(){
        $this->load->library('UploadHandler');
    }

    public function thumbnails(){
        $this->load->view('include/header',$this->data);
		$this->load->view('add-thumbnails');
		$this->load->view('include/footer');       
    }

    public function upload_thumb(){
        $id = $this->input->post('id');
        $image = $this->image_model->getImage($id);
        
        //$main_file_name = 
        if( $_FILES['thumbnail']['size'] > 0 ) {
            // file name to be used for the thumbnail
            $thumbnail_file_name = $_FILES['thumbnail']['name'];
            $destination ="./uploads/thumbs/".$thumbnail_file_name;
            move_uploaded_file($_FILES['thumbnail']['tmp_name'], $destination);

            //update this in the database too
            $this->image_model->updateImageDetails(array('ThumbName'=>$thumbnail_file_name),$id);
            echo json_encode(array('success'=>true,'destination'=>base_url()."uploads/thumbs/".$thumbnail_file_name));exit;
        }
        echo json_encode(array('success'=>false));exit;
    }
    public function save_image_details(){
        $data = array(
            'ImageName' => $this->input->post('name'),
            'ImageDescription' => $this->input->post('description'),
        );
        $id  =$this->input->post('id');
        $this->image_model->updateImageDetails($data,$id);
        echo json_encode(true);
    }

    public function clear_image_session(){
        unset($_SESSION['new_uploaded_file_name']);
        redirect(base_url('dashboard'));
    }

}