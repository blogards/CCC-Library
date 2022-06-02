<?php 
class Register_model extends CI_Model
{

    //library resources				
	public function insert_acc($email, $password, $status, $total, $user_type){

        $data=array(
            'id'        => $total,
            'email'     => $email,
            'password'  =>	$password,
            'user_type'     => $user_type,
            'status'    => $status,
        );

        $query = $this->db->insert('users', $data);
        if($query)
            return true;  
	}

    public function add_user($total, $first_name, $middle_name, $last_name){

        $data=array(
            'id'            => $total,
            'first_name'    => $first_name,
            'middle_name'   => $middle_name,
            'last_name'     => $last_name,
        );

        $query = $this->db->insert('borrowers', $data);
        if($query)
            return true; 
    }

    public function insert_guest($user){

        $query = $this->db->insert('users', $user);
        if($query)
            return true;  
	}

    public function add_guest($data){

        $query = $this->db->insert('borrowers', $data);
        if($query)
            return true; 
    }

}
?>
