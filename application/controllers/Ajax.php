<?php



defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function __construct(){

		parent::__construct();

		

		$this->load->model(array('image_model'));

		$this->data = array();



    }



    public function modal()

    {



        $m       = $this->input->get('m', true);

        $data    = array();



        

        if ($m == 'image-details') {

            //do something related to this action

            $id = $this->input->get('id');

            $image = $this->image_model->getImage($id);

            $data['image'] = $image;

            $data['users'] = $this->users_model->getAdminUsers();

            $data['authorization'] = $this->image_model->getImageAuthorization($id);

            $data['confidential'] = $this->image_model->getImageConfidential($id);

            $data['non_confidential'] = $this->image_model->getImageNonConfidential($id);

        }

        else if ($m == 'edit-image-details-by-admin') {

            //do something related to this action

            $id = $this->input->get('id');

            $image = $this->image_model->getImage($id);

            $data['image'] = $image;

        }
        else if ($m == 'preview-bottle') {

            //do something related to this action

            $data['users'] = $this->users_model->getAdminUsers();

            $data['image'] = (object) $this->input->post();

        }



        $this->load->view("_ajax/modals/" . $m, $data);

    }



    public function send_approval_request(){

        $message = $this->input->post('message');

        $image_id = $this->input->post('id');

        $image = $this->image_model->getImage($image_id);



        //store this in the database

        $request_data = array(

            'sender_id' => $_SESSION['user_id'],

            'message'=> $message,

            'image_id'=>$image_id

        );

        $this->image_model->addUserRequestForApproval($request_data);



        $message .= " <p> Image Name : ".$image->ImageName."</p>";

        $link = base_url().'dashboard/requests';

        $message .= " Please click <a href='".$link."'>HERE</a> to go to the approval page. ";



        $user = $this->users_model->getUserProfile($_SESSION['user_id']);

        $sender_id = $user->ID;

        //get all the admin and management users list

        $admins = $this->users_model->getAdminManagementUsers();

        foreach($admins as $admin){

            $reciever_email = $admin->Email;

            $receiver_id = $admin->ID;

            //send email to this admin/management

            $this->email_model->sendMail("Request for Approval",$message,$reciever_email,$user->Email);

            //send this as message to admin/management

            $this->message_model->sendMessage($message,$sender_id,$receiver_id);



        }

        

        echo json_encode(array('success'=>true,'message'=>'Successfully sent the request.'));

    }



    public function delete_approval_request($request_id){

        $this->image_model->deleteApprovalRequest($request_id);

        echo json_encode(array('success'=>true,'message'=>'Successfully deleted the request.'));

    }

}

