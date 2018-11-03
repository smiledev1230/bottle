<?php 



class Image_model extends CI_Model{



    public function __construct(){



        parent::__construct();



    }







    public function processUpload(){





        if(!isset($_FILES['ImageFile']['name'])){



            return array('success'=>false,'message'=>'Please upload an image first.');



        }







        $config['upload_path']          = './uploads/';



        $config['allowed_types']        = 'gif|jpg|png';







        $this->load->library('upload', $config);







        if ( ! $this->upload->do_upload('ImageFile'))



        {



                $error = $this->upload->display_errors();



                return array('success'=>false,'message'=>$error);



        }



        else



        {



                $data = $this->upload->data();



                $file_name = $data['file_name'];



        }







        $image_data = array(



            'UserID' => @$_SESSION['user_id'],



            'ImageName' => $this->input->post('ImageName'),



            'ImageDescription' => $this->input->post('ImageDescription'),



            'FileName' => $file_name,



        );



        $this->db->insert('images',$image_data);



        return array('success'=>true,'message'=>'Successfully uploaded the image.');



    }







    public function getImages($status=NULL){



        if($status==NULL){



            $data = $this->db->query("SELECT * FROM images ");



        }



        else {



            $data = $this->db->query("SELECT * FROM images WHERE Status=? ",$status);



        }







        return $data->result();



    }

    public function getApprovedImages(){

        $data = $this->db->query("  SELECT i.* FROM images i 

                                    INNER JOIN image_permissions ip ON i.ID=ip.ID 

                                    WHERE (ip.media_rights='1' OR ip.international_presentations='1' OR ip.external_presentations='1' OR ip.website='1' OR ip.social_media='1' OR 

                                            ip.print_materials='1' OR ip.videos='1' OR ip.digital_signage='1' OR ip.billboards='1' OR ip.publication_ads='1' OR 

                                            ip.pursuits='1' OR ip.recruiting_materials='1' ) AND ip.do_not_use_anywhere='0' ");

        return $data->result();

    }

    public function getNotApprovedImages(){

        $data = $this->db->query("  SELECT i.* FROM images i 

                                    LEFT JOIN image_permissions ip ON i.ID=ip.ID 

                                    WHERE (ip.media_rights='0' AND ip.international_presentations='0' AND ip.external_presentations='0' AND ip.website='0' AND ip.social_media='0' AND 

                                            ip.print_materials='0' AND ip.videos='0' AND ip.digital_signage='0' AND ip.billboards='0' AND ip.publication_ads='0' AND 

                                            ip.pursuits='0' AND ip.recruiting_materials='0' )  AND ip.do_not_use_anywhere='0' ");

        return $data->result();

    }

    public function getDoNotUseImages(){

        $data = $this->db->query("  SELECT i.* FROM images i 

                                    INNER JOIN image_permissions ip ON i.ID=ip.ID 

                                    WHERE ip.do_not_use_anywhere='1' ");

        return $data->result();

    }



    public function getImage($id){

        $data = $this->db->query("SELECT * FROM images WHERE ID=? ",$id);

        return $data->row();

    }

    public function getImagePermissions($id){

        $data = $this->db->query("SELECT * FROM image_permissions WHERE ID=? ",$id);

        return $data->row();

    }



    public function updateImageDetails($data,$id){

        $this->db->where('ID',$id);

        $this->db->update('images',$data);

    }

    public function updateImagePermission($data,$id){

        //check if we have record for this image or not

        $check = $this->db->query("SELECT ID FROM image_permissions WHERE ID=?",$id);

        if($check->num_rows()>0){

            $this->db->where('ID',$id);

            $this->db->update('image_permissions',$data);

        }

        else{

            $data['ID']=$id;

            $this->db->insert('image_permissions',$data);

        }

        foreach($data as $key => $value){

            $permission_type = $key;

        }

        if($permission_type!='notes'){

            $approval_activity = array(

                'UserID' => $_SESSION['user_id'],

                'ImageID' => $id,

                'PermissionType' => $permission_type,

                'Status' => $value,

            );

            $this->db->insert('approval_activity',$approval_activity);

        }

        

        

    }



    



    public function logDownloadActivity(){

        $id = $this->input->post('id');

        $name = $this->input->post('name');

        $email = $this->input->post('email');

        $used_for = $this->input->post('used_for');



        $activity_data = array(

            'image_id'=>$id,

            'name'=>$name,

            'email'=>$email,

            'used_for'=>$used_for

        );



        $this->db->insert('download_history',$activity_data);

    }



    public function uploadImage($data){

        $user_id = $_SESSION['user_id'];

        $image_data = array(

            'UserID' => $_SESSION['user_id'],

            'bottle_name' => $data['bottle_name'],

            'bottle_specs' => $data['bottle_specs'],

            'market_served' => $data['market_served'],

            'plastipak_manufacturing_site' => $data['plastipak_manufacturing_site'],

            'onsite_manufacturing_site' => $data['onsite_manufacturing_site'],

            'image_customer' => $data['image_customer'],

            'market_global_location' => $data['market_global_location'],

            'filename' => $data['file_name'],

            'authorized_by_marketing' => isset($data['authorized_by_marketing'])?1:0,

            'authorized_by_legal' => isset($data['authorized_by_legal'])?1:0,

            

        );

        if($_SESSION['role']=='super_admin'){
            $image_data['provitionally_approved_by_super_admin'] = isset($data['provitionally_approved_by_super_admin'])?1:0;
            $image_data['not_provitionally_approved_by_super_admin'] = isset($data['not_provitionally_approved_by_super_admin'])?1:0;
        }



        $this->db->insert('images',$image_data);



        $image_id = $this->db->insert_id();



        $authorization_data = array(

            'user_id'=>$user_id,

            'image_id'=>$image_id,

            'status' => $data['authorization_category']

        );

        $this->db->insert('image_authorization',$authorization_data);



        $confidential_data = array(

            'image_id'=>$image_id,

            'internal_event_presentations' => isset($data['confidential_internal_event_presentations'])?1:0,

            'external_event_and_expo_presentations' => isset($data['confidential_external_event_and_expo_presentations'])?1:0,

            'capability_center_specific' => isset($data['confidential_capability_center_specific'])?1:0,

            'dmm_section_specific' => isset($data['confidential_dmm_section_specific'])?1:0,

            'summer_meeting_specific' => isset($data['confidential_summer_meeting_specific'])?1:0,

            'ctm_meeting_specific' => isset($data['confidential_ctm_meeting_specific'])?1:0,

            'other_meetings' => isset($data['confidential_other_meetings'])?1:0,

        );



        if(isset($data['confidential_other_meetings'])){

            $confidential_data['other_meetings_info'] = $data['confidential_other_meetings_info'];

        }

        else{

            $confidential_data['other_meetings_info'] = '';

        }



        $this->db->insert('image_confidential',$confidential_data);





        $non_confidential_data = array(

            'image_id'=>$image_id,

            'internal_event_presentations' => isset($data['non_confidential_internal_event_presentations'])?1:0,

            'external_event_and_expo_presentations' => isset($data['non_confidential_external_event_and_expo_presentations'])?1:0,

            'capability_center_specific' => isset($data['non_confidential_capability_center_specific'])?1:0,

            'dmm_section_specific' => isset($data['non_confidential_dmm_section_specific'])?1:0,

            'summer_meeting_specific' => isset($data['non_confidential_summer_meeting_specific'])?1:0,

            'ctm_meeting_specific' => isset($data['non_confidential_ctm_meeting_specific'])?1:0,

            'other_meetings' => isset($data['non_confidential_other_meetings'])?1:0,

        );



        if(isset($data['non_confidential_other_meetings'])){

            $non_confidential_data['other_meetings_info'] = $data['non_confidential_other_meetings_info'];

        }

        else{

            $non_confidential_data['other_meetings_info'] = '';

        }



        $this->db->insert('image_non_confidential',$non_confidential_data);



        return array('success'=>true,'message'=>'Successfully added the image');



    }

    public function updateImage($data){

        $image_id = $data['id'];

        $user_id = $_SESSION['user_id'];

        $image_data = array(

            'bottle_name' => $data['bottle_name'],

            'bottle_specs' => $data['bottle_specs'],

            'market_served' => $data['market_served'],

            'plastipak_manufacturing_site' => $data['plastipak_manufacturing_site'],

            'onsite_manufacturing_site' => $data['onsite_manufacturing_site'],

            'image_customer' => $data['image_customer'],

            'market_global_location' => $data['market_global_location'],

            'authorized_by_marketing' => isset($data['authorized_by_marketing'])?1:0,

            'authorized_by_legal' => isset($data['authorized_by_legal'])?1:0,

        );

        if($_SESSION['role']=='super_admin'){
            $image_data['provitionally_approved_by_super_admin'] = isset($data['provitionally_approved_by_super_admin'])?1:0;
            $image_data['not_provitionally_approved_by_super_admin'] = isset($data['not_provitionally_approved_by_super_admin'])?1:0;
        }



        if(isset($data['file_name']) && !empty($data['file_name'])){

            $image_data['filename'] = $data['file_name'];

        }




        $this->db->where('id',$image_id);

        $this->db->update('images',$image_data);



        $authorization_data = array(

            'status' => $data['authorization_category']

        );


        //check if there is already record for this user for this image or not

        $check = $this->db->query("SELECT * FROM image_authorization WHERE user_id=? AND image_id=?",array($user_id,$image_id));

        if($check->num_rows()>0){

            $this->db->where('image_id',$image_id);

            $this->db->where('user_id',$user_id);

            $this->db->update('image_authorization',$authorization_data);

        }

        else{

            $authorization_data = array(

                'user_id'=>$user_id,

                'image_id'=>$image_id,

                'status' => $data['authorization_category']

            );

            $this->db->insert('image_authorization',$authorization_data);

        }



        



        $confidential_data = array(

            'image_id'=>$image_id,

            'internal_event_presentations' => isset($data['confidential_internal_event_presentations'])?1:0,

            'external_event_and_expo_presentations' => isset($data['confidential_external_event_and_expo_presentations'])?1:0,

            'capability_center_specific' => isset($data['confidential_capability_center_specific'])?1:0,

            'dmm_section_specific' => isset($data['confidential_dmm_section_specific'])?1:0,

            'summer_meeting_specific' => isset($data['confidential_summer_meeting_specific'])?1:0,

            'ctm_meeting_specific' => isset($data['confidential_ctm_meeting_specific'])?1:0,

            'other_meetings' => isset($data['confidential_other_meetings'])?1:0,

        );



        if(isset($data['confidential_other_meetings'])){

            $confidential_data['other_meetings_info'] = $data['confidential_other_meetings_info'];

        }

        else{

            $confidential_data['other_meetings_info'] = '';

        }



        $this->db->where('image_id',$image_id);

        $this->db->update('image_confidential',$confidential_data);





        $non_confidential_data = array(

            'image_id'=>$image_id,

            'internal_event_presentations' => isset($data['non_confidential_internal_event_presentations'])?1:0,

            'external_event_and_expo_presentations' => isset($data['non_confidential_external_event_and_expo_presentations'])?1:0,

            'capability_center_specific' => isset($data['non_confidential_capability_center_specific'])?1:0,

            'dmm_section_specific' => isset($data['non_confidential_dmm_section_specific'])?1:0,

            'summer_meeting_specific' => isset($data['non_confidential_summer_meeting_specific'])?1:0,

            'ctm_meeting_specific' => isset($data['non_confidential_ctm_meeting_specific'])?1:0,

            'other_meetings' => isset($data['non_confidential_other_meetings'])?1:0,

        );



        if(isset($data['non_confidential_other_meetings'])){

            $non_confidential_data['other_meetings_info'] = $data['non_confidential_other_meetings_info'];

        }

        else{

            $non_confidential_data['other_meetings_info'] = '';

        }



        $this->db->where('image_id',$image_id);

        $this->db->update('image_non_confidential',$non_confidential_data);



        return array('success'=>true,'message'=>'Successfully updated the image details');



    }



    public function getImageAuthorization($id){

        if(isset($_SESSION['user_id'])){
            return $this->db->query("SELECT * FROM image_authorization WHERE image_id=? AND user_id=? ",array($id,$_SESSION['user_id']))->row();
        }
        else{
            return $this->db->query("SELECT * FROM image_authorization WHERE image_id=?  ",array($id))->row();
        }
        

    }

    public function isImageAuthorizedByAdmin($image_id,$user_id){
        $row = $this->db->query("SELECT * FROM image_authorization WHERE image_id=? AND user_id=? ",array($image_id,$user_id))->row();
        if(!$row){
            return false;
        }
        else{
            if($row->status=='in_process_okay_to_use' || $row->status=='authorized_by_customer'){
                return true;
            }
            else{
                return false;
            }
        }
    }

    public function getImageConfidential($id){

        return $this->db->query("SELECT * FROM image_confidential WHERE image_id=?",$id)->row();

    }

    public function getImageNonConfidential($id){

        return $this->db->query("SELECT * FROM image_non_confidential WHERE image_id=?",$id)->row();

    }



    public function getAuthorizationStatus($image_id,$user_id){ 

        

        $row  = $this->db->query("SELECT * FROM image_authorization WHERE image_id=? AND user_id=?",array($image_id,$user_id))->row();

        if($row){

            if($row->status=='not_authorized_by_customer'){

                return 'Not Approved';

            }

            else if($row->status=='authorized_by_customer'){

                return 'Approved';

            }

            else {

                return 'Pending';

            }

        }

        else{

            return 'Pending';

        }



    }



    public function logEmailInfo($data){

        $this->db->insert('email_info',$data);

    }



    public function deleteImage($id){

        $image = $this->getImage($id);

        $file_location  = "./uploads/".$image->filename;



        $this->db->trans_start();

        

        $this->db->where('image_id',$id);

        $this->db->delete('image_authorization');



        $this->db->where('image_id',$id);

        $this->db->delete('image_confidential');



        $this->db->where('image_id',$id);

        $this->db->delete('image_non_confidential');



        $this->db->where('ID',$id);

        $this->db->delete('images');



        $this->db->trans_complete();



        @unlink($file_location);



        return array('success'=>true,'message'=>'Successfully deleted the image');

    }

    public function getDownloadHistory(){
        $data = $this->db->query("SELECT dh.*,i.bottle_name FROM download_history dh INNER JOIN images i ON i.ID=dh.image_id ORDER BY dh.id DESC");
        return $data->result();
    }

    public function isApproved($image_id){
        //first check if this is has been approved by the super admin
        $image = $this->getImage($image_id);
        if($image->provitionally_approved_by_super_admin==1){
            return true;
        }

        if($image->not_provitionally_approved_by_super_admin==1){
            return false;
        }

        //now check if each admin has approved this image or not
        $admins = $this->users_model->getAdminUsers();
        $approved = true;
        foreach($admins as $admin){
            $status = $this->isImageAuthorizedByAdmin($image_id,$admin->ID);
            if(!$status){
                $approved = false;
                break;
            }
        }

        return $approved;
    }



}