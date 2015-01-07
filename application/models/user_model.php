<?php
class User_model extends CI_Model{
     
    public function create_user(){
        $new_member_insert = array(
            'contact_name'         => $this->input->post('contactname'),
            'contact_phone'        => $this->input->post('contactphone'),
            'address'                  => $this->input->post('address'),
            'email'                    => $this->input->post('email'),
            'date_of_birth'            => $this->input->post('dob'),
            'username'                 => $this->input->post('username'),                    
            'password'                 => md5($this->input->post('password'))
        );
        
        $insert = $this->db->insert('users', $new_member_insert);
        return $insert;
    }
    
    
    public function login_user($username,$passowrd){
        //Secure password
        $enc_password = md5($passowrd);
        
        //Validate
        $this->db->where('username',$username);
        $this->db->where('password',$enc_password);
        
        $result = $this->db->get('users');
        if($result->num_rows() == 1){
            return $result->row(0)->id;
        } else {
            return false;
        }
    }

    public function load_user(){

        if($this->session->userdata('logged_in')) :
                $this->db->select('*');
                $this->db->from('users');
                $this->db->where('id',$this->session->userdata('user_id'));
                $query = $this->db->get();
                 if($query->num_rows() != 1){
                    return FALSE;
                }
                return $query->row();
        endif;    
    }

    public function update_user($data){

        if($this->session->userdata('logged_in')) : 
        $this->db->where('id', $this->session->userdata('user_id'));
        $update = $this->db->update('users', $data); 

        return $update;

        endif;    
    }

    public function un_exists($key){

 
                $this->db->select('*');
                $this->db->from('users');
                $this->db->where('username',$key);
                $query = $this->db->get();
                 if($query->num_rows() > 0){
                    return FALSE;
                }
     
   
    }
    
}
