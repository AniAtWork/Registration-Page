<?php

class UserModel extends CI_Model{

    public function getUsers(){

        $this->db->from('user_details');
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        // print_r($this->db->last_query());   die;
        // echo "<pre>"; print_r($query); die; 
        return $query->result();
    }

    public function insertUser($data){
    //    echo "<pre>"; print_r($data); die;
        return $this->db->Insert('user_details', $data);

    }

    public function editUser($id){

        $query = $this->db->get_where('user_details', ['id' => $id]);

        return $query->row();

    }

    public function updateUser($id, $data){

        return $this->db->update('user_details', $data, ['id' => $id]);

    }

    public function deleteUser($id){
        
        return $this->db->delete('user_details', ['id' => $id]);
        
    }

    public function get_user_by_mobile($mobile)
    {
        $this->db->where('mobile', $mobile);
        $query = $this->db->get('user_details');
        return $query->row();
    }

    public function get_user_by_email($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('user_details');
        return $query->row();
    }

    //checks if Email Id has already been used.
    public function check_email($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('user_details');
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function check_mobile($mobile)
    {
        $this->db->where('mobile', $mobile);
        $query = $this->db->get('user_details');
        

        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}

?>