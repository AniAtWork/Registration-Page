<?php

defined('BASEPATH') OR exit('No direct script access allowed'); //in case someone tries to directly access the page

class UserController extends CI_Controller{

    public function index(){
        $this->load->view('template/header');

        $this->load->model('UserModel');
        $data['users']=$this->UserModel->getUsers();

        $this->load->view('frontend/users', $data); //users.php also
        $this->load->view('template/footer'); 
    }

    public function create(){
        $this->load->view('template/header');
        $this->load->view('frontend/create'); 
        $this->load->view('template/footer');
    }

    public function store(){
        
        $this->form_validation->set_rules('name','Username', 'required');
        $this->form_validation->set_rules('email','Email', 'trim|required|valid_email'); //|callback_check_email
        $this->form_validation->set_rules('password', 'Password','trim|required|min_length[8]');
        $this->form_validation->set_rules('mobile', 'Mobile Number', 'required|numeric|exact_length[10]|regex_match[/^[6789]\d{9}$/]');//|callback_check_mobile

        if($this->form_validation->run()){
            $data = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'mobile' => $this->input->post('mobile'),
                'gender' => $this->input->post('gender'),
                'hobbies' => implode(',', $this->input->post('hobbies'))
            ];

            $this->load->model('UserModel');
            $this->UserModel->insertUser($data);
            $this->session->set_flashdata('status', 'User Data Inserted Successfully!');
            redirect(base_url('users'));
        }
        else{
            $this->create();
        }
 
    }

    public function edit($id){
        $this->load->view('template/header');

        $this->load->model("UserModel");
        $data['users'] = $this->UserModel->editUser($id);
        
        $this->load->view('frontend/edit', $data); 
        $this->load->view('template/footer'); 

    }

    public function update($id){

        $this->form_validation->set_rules('name','Username', 'required');
        $this->form_validation->set_rules('email','Email', 'trim|required|valid_email'); //|callback_check_email_unique
        $this->form_validation->set_rules('mobile', 'Mobile Number', 'required|numeric|exact_length[10]|regex_match[/^[6789]\d{9}$/]');//callback_check_mobile_unique

        if($this->form_validation->run()):
            $data = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'mobile' => $this->input->post('mobile'),
                'gender' => $this->input->post('gender'),
                'hobbies' => implode(',', $this->input->post('hobbies'))
            ];

            $this->load->model('UserModel');
            $this->UserModel->updateUser($id,$data);
            $this->session->set_flashdata('status', 'User Data Updated Successfully!');
            redirect(base_url('users'));

        else:
            $this->edit($id);
        endif;    
    }

    public function delete($id){

        $this->load->model('UserModel');
        $this->UserModel->deleteUser($id);
        $this->session->set_flashdata('status', 'User Data Deleted Successfully!');
        redirect(base_url('users'));
    }

    public function check_email()
    {
        $email = $this->input->post('email');

        $this->load->model('UserModel');

            $email_exists = $this->UserModel->check_email($email);

            if ($email_exists) {

                $this->form_validation->set_message('check_email', 'This email address is already registered. Please try a different email.');

                return FALSE;
            } else {
                return TRUE;
            }    
    }

    public function check_email_unique($id) //put argument(new)
    {
        $email = $this->input->post('email');

        $mobile = $this->input->post('mobile'); //new line 

        $this->load->model("UserModel");

        $users = $this->UserModel->get_user_by_mobile($mobile); //new line

        if ($users->email== $email){
            return TRUE;
        
        }

        else 
        if ($users->email!= $email) { //new line

            $email_exists = $this->UserModel->check_email($email);

            if ($email_exists) {

                $this->form_validation->set_message('check_email_unique', 'This email address is already registered. Please try a different email.');

                return FALSE;
            } else {
                return TRUE;
            }
        }    
    }

    public function check_mobile()
    {
        $mobile = $this->input->post('mobile');

        $this->load->model('UserModel');

        $mobile_exists = $this->UserModel->check_mobile($mobile);

        if ($mobile_exists) {

            $this->form_validation->set_message('check_mobile', 'This Mobile Number is already registered. Please try a different one.');

            return FALSE;
        } else {
            return TRUE;
        }
    }

    //to make sure the edit form doesnt loop if there's no change in mobile no.
    public function check_mobile_unique()
    {
        $email = $this->input->post('email');

        $mobile = $this->input->post('mobile'); //new line 


        $this->load->model('UserModel');

        $users = $this->UserModel->get_user_by_email($email); //new line


        if ($users->mobile== $mobile){
            return TRUE;
        
        }

        else if ($users->mobile!= $mobile) { //new line

            $mobile_exists = $this->UserModel->check_mobile($mobile);

            if ($mobile_exists) {

                $this->form_validation->set_message('check_mobile_unique', 'This Mobile Number is already registered. Please try a different one.');

                return FALSE;
            } else {
                return TRUE;
            }
        }    
    }

    function check_email_avalibility()  
      {  
           if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))  
           {  
                echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Invalid Email</span></label>';  
           }  
           else  
           {  
                $this->load->model("UserModel");  
                if($this->UserModel->check_email($_POST["email"]))  
                {  
                     echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Email Already register</label>';  
                }  
                else  
                {  
                     echo '<label class="text-success"><span class="glyphicon glyphicon-ok"></span> Email Available</label>';  
                }  
           }  
      }
      
      function check_mobile_avalibility()  
      {  
             
                $this->load->model("UserModel");  
                if($this->UserModel->check_mobile($_POST["mobile"]))  
                {  
                     echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Mobile Number is already register</label>';  
                }  
                else  
                {  
                     echo '<label class="text-success"><span class="glyphicon glyphicon-ok"></span> Mobile Number is Available!</label>';  
                }  
             
      } 
    


}

?>

