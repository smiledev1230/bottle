<?php 

class Users_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function do_login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $password = md5($password);
        $data = $this->db->query("SELECT * FROM usr_ids WHERE Username=? AND Password=?",array($username,$password));
        if($data->num_rows()==0){
            return array('success'=>false,'message'=>'The Username/Password is wrong.');
        }
        $user = $data->row();
        $_SESSION['user_id'] = $user->ID;
        $_SESSION['username'] = $user->Username;
        $_SESSION['role'] = $user->Role;
        $user_profile = $this->getUserProfile($user->ID);
        $_SESSION['first_name'] = $user_profile->FirstName;
        $_SESSION['name'] = $user_profile->FirstName.' '.$user_profile->LastName;
        $_SESSION['email'] = $user_profile->Email;
        return array('success'=>true,'message'=>'Successfully logged in.');
    }







    public function register(){



        $data = $this->input->post();





        if($data['Password']!=$data['ConfirmPassword']){



            return array('success'=>false,'message'=>"Password and Confirm Password don't match.");



        }       



        //first check if this username is available or not



        $check = $this->db->query("SELECT * FROM usr_ids WHERE Username=?",$data['Username']);



        if($check->num_rows()>0){



            return array('success'=>false,'message'=>'This username is not available.');



        }       



        







        $this->db->trans_start();







        $status=1;





        $user_data = array(



            'Username' => $data['Username'],



            'Password' => md5($data['Password']),



            'Role' => 'admin',



        );



        $this->db->insert('usr_ids',$user_data);



        $usr_id = $this->db->insert_id();







        $profile_data = array(



            'ID' => $usr_id,

            'FirstName' => $data['FirstName'],

            'LastName' => $data['LastName'],

            'Email' => $data['Email'],

            'Phone' => $data['Phone'],

            'Department' => $data['Department'],

        );







        $this->db->insert('usr_profile',$profile_data);



        $this->db->trans_complete();





        return array('success'=>true,'message'=>'Successfully add the new team member.');



    }



    public function update(){



        $data = $this->input->post();



        $this->db->trans_start();



        $profile_data = array(

            'FirstName' => $data['FirstName'],

            'LastName' => $data['LastName'],

            'Email' => $data['Email'],

            'Phone' => $data['Phone'],

            'Department' => $data['Department'],

        );







        $this->db->where('ID',$data['user_id']);

        $this->db->update('usr_profile',$profile_data);



        $this->db->trans_complete();





        return array('success'=>true,'message'=>'Successfully updated the details.');



    }



    public function getUserProfile($user_id){

        $data = $this->db->query("SELECT * FROM usr_profile WHERE id=?",$user_id);

        return $data->row();

    }

    public function getAdminManagementUsers(){

        $data = $this->db->query("SELECT up.* FROM usr_ids ui INNER JOIN usr_profile up ON ui.ID=up.ID WHERE ui.Role=? || ui.Role=?",array('admin','management'));

        return $data->result();

    }

    public function getAdminUsers(){

        $data = $this->db->query("SELECT up.* FROM usr_ids ui INNER JOIN usr_profile up ON ui.ID=up.ID WHERE ui.Role=? ",array('admin'));

        return $data->result();

    }



    public function updatePassword(){

        $data = $this->input->post();

        //first check if the old password is correct or not

        $check = $this->db->query("SELECT * FROM usr_ids ui WHERE ui.ID=? AND ui.Password=?",array($_SESSION['user_id'],md5($data['OldPassword'])));

        if($check->num_rows()==0){

            return array('success'=>false,'message'=>'Old password is wrong.');           

        }



        if(strlen($data['Password'])<6){

            return array('success'=>false,'message'=>'Please use at least six characters for password.');           

        }



        if($data['Password'] != $data['ConfirmPassword']){

            return array('success'=>false,'message'=>'Password and Confirm Password do not match.');

        }



        $this->db->where('ID',$_SESSION['user_id']);

        $this->db->update('usr_ids',array('Password'=>md5($data['Password'])));



        return array('success'=>true,'message'=>'Successfully updated the password.');

    }



    



}