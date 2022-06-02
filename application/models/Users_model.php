<?php 
class Users_model extends CI_Model
{

    //  ********      Users     ********    //

    public function add_borrower($total, $contact, $first_name, $last_name, $user_type){

        $pass = strtolower($first_name.$last_name);

        $data=array(
            'id'        => $total,
            'email'     => $contact,
            'password' =>	$this->encrypt->encode($pass),
            'user_type' => $user_type,
        );
        $query = $this->db->insert('users', $data);
        if($query)
            return true;          
    }

    public function importUsers($record, $total){
        $pass = 123456;
        $data = array(
            'id'        => $total,
            'email'     => trim($record[5]),
            'password' =>	$this->encrypt->encode($pass),
            'user_type' => trim($record[4]),
        );

        $query = $this->db->insert('users', $data);
        if($query){
            return true;
        }
            
    }

    public function update_borrower($data, $user_id){
        
        $query = $this->db->where('id',$user_id)
                            ->update('borrowers', $data);
        if($query)
            return true;          
    }

    public function delete_user($id){
        $del = $this->db->where('id', $id)
                        ->delete('users');
        if($del){
            return true;
     
        }
    }

     //  ********      Borrower     ********    //

    public function all_users(){

        $query =$this->db->distinct()
                        ->select('*')
                        ->from('users u')
                        ->join('borrowers b', 'b.id = u.id')
                        ->where('b.id = u.id')
                        //->where('u.status', 'Approved')
                        ->order_by('u.id')
                        ->get();
		return $query->result(); 
    }

    public function get_user($id){

        $query =$this->db->distinct()
                        ->select('*')
                        ->from('users u')
                        ->join('borrowers b', 'b.id = u.id')
                        ->where('u.id', $id)
                        //->where('u.status', 'Approved')
                        ->order_by('u.id')
                        ->get();
		return $query->result(); 
    }

    public function count_all_users(){

        $query = $this->db->select('*')
                ->from('borrowers')
                ->get();
        return  $query->num_rows();; 
    }

    public function add_user($total, $first_name, $middle_name, $last_name,
                            $course, $year_level, $contact, $street, $barangay,
                            $city, $province, $postal_code){

        $data = array(
                'id'            => $total,
                'first_name'    => $first_name,
                'middle_name'   => $middle_name,
                'last_name'     => $last_name,
                'course'        => $course,
                'year_level'    => $year_level,
                'contact'       => $contact,
                'street'        => $street,
                'barangay'      => $barangay,
                'city'          => $city,
                'province'      => $province,
                'postal_code'   => $postal_code,
            );
            
        $query = $this->db->insert('borrowers', $data);
        if($query)
            return true;          
    }

    public function importBorrowers($record, $total){
        
        $data=array(
            'id'            => $total,
            'id_no'         => trim($record[0]),
            'first_name'    => trim($record[1]),
            'middle_name'   => trim($record[2]),
            'last_name'     => trim($record[3]),
            'contact'       => trim($record[6]),
            'year_level'    => trim($record[7]),
            'course'        => trim($record[8]),
            'street'        => trim($record[9]),
            'barangay'      => trim($record[10]),
            'city'          => trim($record[11]),
            'province'      => trim($record[12]),
            'postal_code'   => trim($record[13]),
        );

        $query = $this->db->insert('borrowers', $data);
        if($query){
            return true;
        }
            
    }

    public function update_user($user_id, $user_type, $profile_img){

        $query = $this->db->where('id',$user_id)
                            ->set('user_type',$user_type)
                            ->set('profile_img', $profile_img)
                            ->update('users');
        if($query)
            return true;          
    }

    public function update_user1($user_id, $user_type, $profile_img, $password){
       // $pass1 = $this->encrypt->encode($pass);
        $query = $this->db->where('id',$user_id)
                            ->set('user_type',$user_type)
                            ->set('password', $password)
                            ->set('profile_img', $profile_img)
                            ->update('users');
        if($query)
            return true;          
    }

    public function delete_borrower($id){
        $del = $this->db->where('id', $id)
                        ->delete('borrowers');
        if($del){
            return true;
        }
    }

    public function status($id, $data){
        $query = $this->db->where('id',$id)
                        ->update('users', $data);
        if($query){
            return true;
        }
            
    }

    public function get_last_users_id(){
        $get = $this->db->select('id')
                        ->from('users')
                        ->order_by('id desc')
                        ->limit(1)
                        ->get();

        return $get->result();

    }

    public function all_teachers(){
        $get = $this->db->select('*')
                        ->from('borrowers b')
                        ->join('users u', 'u.id = b.id')
                        
                        ->where('u.user_type' , "Teacher")
                        ->get();
        return $get->result();

    }

    public function count_Fjan($id, $year){
        $get = $this->db->select('*')
                        ->select('count(borrower_id) as jan')
                       ->from('transaction')
                        ->where('month(updated_at)', 4)
                        ->where('year(updated_at)', $year)
                        ->where('borrower_id', $id)
                        ->where('status !=', 'Cancelled')
                        ->group_by('month(updated_at)','asc')
                        ->get();
        return $get->result();
    }
    public function count_Ffeb($id, $year){
        $get = $this->db->select('*')
                        ->select('count(borrower_id) as total')
                        ->from('transaction')
                        ->where('month(updated_at)', 2)
                        ->where('year(updated_at)', $year)
                        ->where('borrower_id', $id)
                        ->where('status !=', 'Cancelled')
                        ->group_by('month(updated_at)','asc')
                        ->get();
        return $get->result();
    }
    public function count_FMarch($id, $year){
        $get = $this->db->select('*')
                        ->select('count(borrower_id) as total')
                        ->from('transaction')
                        ->where('month(updated_at)', 3)
                        ->where('year(updated_at)', $year)
                        ->where('borrower_id', $id)
                        ->where('status !=', 'Cancelled')
                        ->group_by('month(updated_at)','asc')
                        ->get();
        return $get->result();
    }
    public function count_FApr($id, $year){
        $get = $this->db->select('*')
                        ->select('count(borrower_id) as total')
                        ->from('transaction')
                        ->where('month(updated_at)', 4)
                        ->where('year(updated_at)', $year)
                        ->where('borrower_id', $id)
                        ->where('status !=', 'Cancelled')
                        ->group_by('month(updated_at)','asc')
                        ->get();
        return $get->result();
    }
// public function jan(){

//     $query = "SELECT coach_name,
//     Count(*) AS activities
//      FROM   sessions
//      WHERE  Month(updated_at) = 1 //for specfic month 
//      GROUP  BY coach_name, Month(date)" // for all months
// // }
    



	}
?>
