<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
  
      public function register(){
        if($this->session->userdata('logged_in')){
            //redirect('home/index');
          $this->form_validation->set_rules('contactname','Contact Name','trim|required|xss_clean|callback_valid_name');
          $this->form_validation->set_rules('contactphone','Contact Number','trim|required|xss_clean|callback_valid_phone_number_or_empty');
          $this->form_validation->set_rules('address','Address','trim|required|xss_clean');
          $this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean');
          $this->form_validation->set_rules('dob','Date of Birth','trim|required|xss_clean');
          if(!empty($_POST['password']) && !empty($_POST['password2'])) :
          $this->form_validation->set_rules('password','Password','trim|required|min_length[4]|max_length[50]|xss_clean');
          $this->form_validation->set_rules('password2','Confirm Password','trim|required|matches[password]|xss_clean');
          endif;

            if($this->form_validation->run() == FALSE){
            //Load view and template
            $data['main_content'] = 'register';
            $this->load->view('templates/main_temp',$data);
           //Validation ran and passed    
            } else {
               $data = array(
                  'contact_name'         => $this->input->post('contactname'),
                  'contact_phone'        => $this->input->post('contactphone'),
                  'address'                  => $this->input->post('address'),
                  'email'                    => $this->input->post('email'),
                  'date_of_birth'            => $this->input->post('dob')
              );
               if(!empty($_POST['password']) && !empty($_POST['password2'])) :
                $data['password'] = md5($this->input->post('password'));
                endif;


               if($this->User_model->update_user($data)){
                    $this->session->set_flashdata('updated', 'Successfully updated');
                    //Redirect to index page with above error
                    redirect('main/index');
               }
            }

        }else{ 
        $this->form_validation->set_rules('contactname','Contact Name','trim|required|xss_clean|callback_valid_name');
        $this->form_validation->set_rules('contactphone','Contact Number','trim|required|xss_clean|callback_valid_phone_number_or_empty');
        $this->form_validation->set_rules('address','Address','trim|required|xss_clean');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('dob','Date of Birth','trim|required|xss_clean');
        $this->form_validation->set_rules('username','Username','trim|required|min_length[4]|xss_clean|callback_un_exists');      
        $this->form_validation->set_rules('password','Password','trim|required|min_length[4]|max_length[50]|xss_clean');
        $this->form_validation->set_rules('password2','Confirm Password','trim|required|matches[password]|xss_clean');


        if($this->form_validation->run() == FALSE){
            //Load view and template
            $data['main_content'] = 'register';
            $this->load->view('templates/main_temp',$data);
           //Validation ran and passed    
        } else {
           if($this->User_model->create_user()){
                $this->session->set_flashdata('registered', 'You are now registered, please log in');
                //Redirect to index page with above error
                redirect('main/index');
           }
        }
       }
    }

    public function valid_phone_number_or_empty($value)
    {
    
        if (preg_match('/^\(?[0-9]{3}\)?[-. ]?[0-9]{3}[-. ]?[0-9]{4}$/', $value))
        {
          return preg_replace('/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/', '($1) $2-$3', $value);
        }
        else
        {
          $this->form_validation->set_message('valid_phone_number_or_empty', 'Please enter a correct phone number');
          return FALSE;
        }
   
    }
    public function valid_name($value)
    {
    
        if (preg_match('/[^a-z\s.]/i', $value))
        {

          $this->form_validation->set_message('valid_name', 'Please enter a correct name');
          return FALSE;
        }
        else
        {
          return TRUE;
        }
   
    }

    function un_exists($key)
    {
        $this->form_validation->set_message('un_exists', 'Username Already exists');
        return $this->User_model->un_exists($key);
    }
        
    
    public function login(){
        $this->form_validation->set_rules('username','Username','trim|required|min_length[4]|xss_clean');      
        $this->form_validation->set_rules('password','Password','trim|required|min_length[4]|max_length[50]|xss_clean');        
        
        if($this->form_validation->run() == FALSE){
            //Set error
            $this->session->set_flashdata('login_failed', 'Sorry, Login info is invalid');
            redirect('main/index');
        } else {
           //Get data from post
           $username = $this->input->post('username');
           $password = $this->input->post('password');
               
           //Get user id from the model
           $user_id = $this->User_model->login_user($username,$password);
               
           //Validate the user
           if($user_id){
               //Create array of user data
               $user_data = array(
                       'user_id'   => $user_id,
                       'username'  => $username,
                       'logged_in' => true
                );
                //Set session userdata
               $this->session->set_userdata($user_data);
                                  
               redirect('main/index');
            } else {
                //Set error
                $this->session->set_flashdata('login_failed', 'Sorry, the login info that you entered is invalid');
                redirect('main/index');
            }
        }
    }

    
    
    public function logout(){
        //Unset user data
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        $this->session->sess_destroy();
        
         //Set message
        $this->session->set_flashdata('logged_out', 'You have been logged out');
        redirect('main/index');
    }


    public function update(){

   if(!$this->session->userdata('logged_in')){
       redirect('main/index');     
   }else{ 
       if($this->User_model->load_user()){
            $data['user'] = $this->User_model->load_user();
            $data['main_content'] = 'register';
            $this->load->view('templates/main_temp',$data);
          }
    } 
  }

}