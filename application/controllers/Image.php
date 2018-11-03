<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('image_model');
    }

	public function add()
	{
        $this->data = array();
        $this->load->view('admin/add-image',$this->data);
    }
    public function add_image(){
        //upload the file first. If the user has not uploaded any image return with error
        if(isset($_FILES['image']) && !empty($_FILES['image']['size'])){
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';

                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('image'))
                {
                        $error = $this->upload->display_errors();
                        $_SESSION['error'] = $error;
                        redirect($_SERVER['HTTP_REFERER']);exit;
                }
                else
                {
                        $data =  $this->upload->data();
                        $file_name = $data['file_name'];

                        $_POST['file_name'] = $file_name;

                        $return = $this->image_model->uploadImage($_POST);
                        if($return['success']){
                            $_SESSION['success'] = $return['message'];
                        }
                        else{
                            $_SESSION['error'] = $return['message'];
                        }
                        
                        redirect($_SERVER['HTTP_REFERER']);exit;
                        
                }

        }
        else{

        }
    }
    public function update_image(){
        //upload the file first. If the user has not uploaded any image return with error
        if(isset($_FILES['image']) && !empty($_FILES['image']['size'])){
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';

                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('image'))
                {
                        $error = $this->upload->display_errors();
                        $_SESSION['error'] = $error;
                        redirect($_SERVER['HTTP_REFERER']);exit;
                }
                else
                {
                        $data =  $this->upload->data();
                        $file_name = $data['file_name'];

                        $_POST['file_name'] = $file_name;
                        
                }

        }
        $return = $this->image_model->updateImage($_POST);
        if($return['success']){
            $_SESSION['success'] = $return['message'];
        }
        else{
            $_SESSION['error'] = $return['message'];
        }
        
        redirect($_SERVER['HTTP_REFERER']);exit;

    }

    public function edit($id)
	{
        $this->data = array();
        $image = $this->image_model->getImage($id);
        $this->data['image'] = $image;
        $this->data['users'] = $this->users_model->getAdminUsers();
        $this->data['authorization'] = $this->image_model->getImageAuthorization($id);
        $this->data['confidential'] = $this->image_model->getImageConfidential($id);
        $this->data['non_confidential'] = $this->image_model->getImageNonConfidential($id);        
        $this->load->view('admin/edit-image',$this->data);
    }

    public function send_message_to_admin(){
         $image_id = $this->input->post('image_id');
         $subject = $this->input->post('subject');
         $message = $this->input->post('message');
         $users = $this->input->post('users');
         $sender = $this->users_model->getUserProfile($_SESSION['user_id']);

         $email_info = array(
                 'image_id' => $image_id,
                 'subject' => $subject,
                 'message' => $message,
                 'sender_email' => $sender->Email,
            );

         foreach($users as $user_id){
             $user = $this->users_model->getUserProfile($user_id);
             $this->email_model->sendMail($subject,$message,$user->Email,$sender->Email);

             $email_info['receiver_email'] = $user->Email;
             $this->image_model->logEmailInfo($email_info);
         }
         echo json_encode(true);
    }

    public function delete($id){
        $return = $this->image_model->deleteImage($id);
        $_SESSION['success'] = $return['message'];
                
        redirect($_SERVER['HTTP_REFERER']);exit;
    }
}
