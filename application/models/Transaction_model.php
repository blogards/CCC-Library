<?php 
class Transaction_model extends CI_Model
{

    //  ********      Library Resource Reservation     ********    //

	public function available_books(){

        $query =$this->db->select('*')
                        ->select('l.id as id')
                        ->select('count(l.title) as total')
                        ->from('library-resources l')
                        ->join('books b', 'b.barcode = l.barcode')
                        ->where('l.status', 'Available')
                        ->group_by('l.title', 'l.category', 'l.status')
                        ->order_by(3)
                        ->get();
		return $query->result();
	}

    public function available_audio_visual(){

        $query =$this->db->distinct('title')
                        ->select('*')
                        ->select('l.id as id')
                        ->select('count(l.title) as total')
                        ->from('library-resources l')
                        ->join('audio-visual a', 'a.barcode = l.barcode')
                        ->where('l.status', 'Available')
                        ->group_by('l.title', 'l.category', 'l.status')
                        ->order_by(3)
                        ->get();
        
		return $query->result();
	}

    public function available_manuscript(){

        $query =$this->db->select('*')
                        ->select('l.id as id')
                        ->select('count(l.title) as total')
                        ->from('library-resources l')
                        ->join('manuscript m', 'm.barcode = l.barcode')
                        ->where('l.status', 'Available')
                        ->group_by('l.title', 'l.category', 'l.status')
                        ->order_by(3)
                        ->get();
        
		return $query->result();
	}

    public function available_gov_pub(){

        $query =$this->db->select('*')
                        ->select('l.id as id')
                        ->select('count(l.title) as total')
                        ->from('library-resources l')
                        ->join('publications p', 'p.barcode = l.barcode')
                        ->where('l.status', 'Available')
                        ->group_by('l.title', 'l.category', 'l.status')
                        ->order_by(3)
                        ->get();
        
		return $query->result();
	}

    public function available_thesis(){

        $query =$this->db->select('*')
                        ->select('l.id as id')
                        ->select('count(l.title) as total')
                        ->from('library-resources l')
                        ->join('thesis t', 't.barcode = l.barcode')
                        ->where('l.status', 'Available')
                        ->group_by('l.title', 'l.category', 'l.status')
                        ->order_by(3)
                        ->get();
                  return $query->result();
	}

    public function available_journal(){

        $query =$this->db->select('*')
                        ->select('l.id as id')
                        ->select('count(l.title) as total')
                        ->from('library-resources l')
                        ->join('journals j', 'j.barcode = l.barcode')
                        ->where('l.status', 'Available')
                        ->group_by('l.title', 'l.category', 'l.status')
                        ->order_by(3)
                        ->get();
        
		return $query->result();
	}  

    //  ********         Reservation     ********    //

    public function all_reservations(){

        $query =$this->db->select('*')
                        ->select('l.id as lib_id')
                        ->from('transaction t')
                        ->join('library-resources l', 'l.id = t.resources_id')
                        ->join('borrowers b', 'b.id = t.borrower_id')
                        ->join('users u','u.id = b.id')
                        ->where('t.status', "Pending")
                        ->order_by('reservation_date asc')
                        ->get();
        
		return $query->result();
	}
    //user
    public function user_reservations($id){

        $query =$this->db->select('*')
                        ->select('l.id as lib_id')
                        ->from('transaction t')
                        ->join('library-resources l', 'l.id = t.resources_id')
                        ->join('borrowers b', 'b.id = t.borrower_id')
                        ->join('users u','u.id = b.id')
                        ->where('borrower_id', $id)
                        ->where('t.status', "Pending")
                        ->order_by('reservation_date asc')
                        ->get();
        
		return $query->result();
	}

    public function add_reservation($id, $user_id, $date){
        $data=array(
            'resources_id'        => $id,
            'borrower_id'     => $user_id,
            'reservation_date'  =>	$date,
        );

        $query = $this->db->insert('transaction', $data);
        if($query)
            return true;  
    }

    public function assign_resource($data){
        $query = $this->db->insert('transaction', $data);
        if($query)
            return true;  
    }

    public function cancel_reservation($id){
        $data=array(
            'status'  => "Cancelled",
        );
        $query = $this->db->where('resources_id',$id)
                        ->update('transaction',$data);
        if($query)
            return true;
    }

    public function update_transaction_status($id, $status){
        $data=array(
             'status' =>$status,
        );
        $query = $this->db->where('resources_id',$id)
                        ->update('transaction', $data);
        if($query)
            return true;
    }

    public function update_reservation_date($id, $date){
        $data=array(
            'reservation_date' =>$date,
        );
        $query = $this->db->where('resources_id',$id)
                        ->update('transaction', $data);
        if($query)
            return true;
    }


    //  ********        To released     ********    //

    public function to_release(){
        $get =$this->db->select('*')
                        ->select('l.id as lib_id')
                        ->select('t.created_at as created_at')
                        ->from('transaction t')
                        ->join('library-resources l', 'l.id = t.resources_id')
                        ->join('borrowers b', 'b.id = t.borrower_id')
                        ->join('users u','u.id = b.id')
                        ->where('t.status', "Reserved")
                        ->order_by('reservation_date asc')
                        ->get();

        return $get->result();
    }

    public function update_pickup_date($id, $date, $due){
        $data=array(
            'pickup_date' => $date,
            'due_date'    => $due,
        );
        $query = $this->db->where('resources_id',$id)
                        ->update('transaction', $data);
        if($query)
            return true;
    }
    //user
    public function user_to_release($id){

        $query =$this->db->select('*')
                        ->select('l.id as lib_id')
                        ->from('transaction t')
                        ->join('library-resources l', 'l.id = t.resources_id')
                        ->join('borrowers b', 'b.id = t.borrower_id')
                        ->join('users u','u.id = b.id')
                        ->where('borrower_id', $id)
                        ->where('t.status', "Reserved")
                        ->order_by('reservation_date asc')
                        ->get();
        
		return $query->result();
	}

    //  ********         Borrowed     ********    //

    public function borrowed(){
        $get =$this->db->select('*')
                        ->select('l.id as lib_id')
                        ->from('transaction t')
                        ->join('library-resources l', 'l.id = t.resources_id')
                        ->join('borrowers b', 'b.id = t.borrower_id')
                        ->join('users u','u.id = b.id')
                        ->where('t.status', "Borrowed")
                        ->order_by('due_date asc')
                        ->get();

        return $get->result();
    }

    public function update_returned_date($id, $return_date){
        $data=array(
            'returned_date' => $return_date,
        );
        $query = $this->db->where('resources_id',$id)
                        ->update('transaction', $data);
        if($query)
            return true;
    }

    //user
    public function user_borrowed($id){

        $query =$this->db->select('*')
                        ->select('l.id as lib_id')
                        ->from('transaction t')
                        ->join('library-resources l', 'l.id = t.resources_id')
                        ->join('borrowers b', 'b.id = t.borrower_id')
                        ->join('users u','u.id = b.id')
                        ->where('borrower_id', $id)
                        ->where('t.status', "Borrowed")
                        ->order_by('pickup_date asc')
                        ->get();
        
		return $query->result();
	}

    //  ********         Returned     ********    //

    public function returned(){
        $get =$this->db->select('*')
                        ->select('l.id as lib_id')
                        ->from('transaction t')
                        ->join('library-resources l', 'l.id = t.resources_id')
                        ->join('borrowers b', 'b.id = t.borrower_id')
                        ->join('users u','u.id = b.id')
                        ->where('t.status', "Returned")
                        ->order_by('returned_date asc')
                        ->get();

        return $get->result();
    }

    //user
    public function user_returned($id){

        $query =$this->db->select('*')
                        ->select('l.id as lib_id')
                        ->from('transaction t')
                        ->join('library-resources l', 'l.id = t.resources_id')
                        ->join('borrowers b', 'b.id = t.borrower_id')
                        ->join('users u','u.id = b.id')
                        ->where('borrower_id', $id)
                        ->where('t.status', "Returned")
                        ->order_by('pickup_date asc')
                        ->get();
        
		return $query->result();
	}
    
    //  ********     Assign     ********    //

    public function get_borrowers(){

        // $stats = array('Reserved', 'Borrowed');
        $get = $this->db
        // ->distinct('t.borrower_id')
                        ->select('*')
                        ->from('borrowers b')
                        ->join('users u', 'u.id = b.id')
                        ->where('u.trans_stat', 0)

                        // ->join('transaction t', 't.borrower_id = b.id')
                        // ->where('t.status !=', $stats)
                        // ->where('t.status', 'Borrowed')
                        ->get();
        return $get->result();
    }

    public function available_resources(){

        $query =$this->db->distinct('title')
                        ->select('*')
                        ->select('count(title) as total')
                        ->from('library-resources ')
                       ->where('status', 'Available')
                        ->group_by(array('title', 'category'))
                        ->get();
		return $query->result();
	}

    public function count($title, $category){

        return $this->db->select('*')
                        ->select('count(title) as total')
                        ->from('library-resources ')
                        ->where('title', $title)
                        ->where('category', $category)
                        ->where('status', 'Available')
                        ->group_by('category')
                        ->order_by('barcode')
                        ->count_all_results();

                        
           
            
	}

    

    //user dashboard
    public function has_reservation($user_id){
        $get = $this->db->select('*')
                        ->from('transaction')
                        ->where('borrower_id', $user_id)
                        ->where('status', 'Reserved')
                        ->or_where('status', 'Borrowed')
                        ->or_where('status', 'Pending')
                        ->get();

        if($get->num_rows()>0){
            return true;
        }

    }

    public function user_reservation($user_id){
        $get = $this->db->select('*')
                        ->select('l.id as lib_id')
                        ->select('t.status as status')
                        ->from('transaction t')
                        ->join('library-resources l', 'l.id = t.resources_id')
                        ->where('t.borrower_id', $user_id)
                        ->where('t.status', 'Reserved')
                        ->or_where('t.status', 'Borrowed')
                        ->or_where('t.status', 'Pending')
                        ->get();

        return $get->result();

    }


    public function count_reservation($user_id){
        return $this->db->select('*')
                        ->from('transaction')
                        ->where('borrower_id', $user_id)
                        ->where('status', 'Reserved')
                        ->or_where('status', 'Borrowed')
                        ->or_where('status', 'Pending')
                        ->count_all_results();

    }

    public function count_returned($user_id){
        return $this->db->select('*')
                        ->from('transaction')
                        ->where('borrower_id', $user_id)
                        ->where('status', 'Returned')
                        ->count_all_results();

    }


    //  ********     Admin Dashboard     ********    //


    public function get_today_transaction($day){
        $get = $this->db->select('*')
                        ->select('t.status as status')
                        ->from('transaction t')
                        ->join('library-resources l', 'l.id = t.resources_id')
                        ->join('borrowers b', 'b.id = t.borrower_id')
                        ->like('t.created_at', $day)
                        ->or_like('t.reservation_date', $day)
                        ->or_like('t.pickup_date', $day)
                        ->or_like('t.due_date', $day)
                        ->or_like('t.returned_date', $day)
                        ->order_by('t.updated_at', 'asc')
                        ->get();

                       return $get->result();

    }

    public function get_past_transaction($day_start, $day){
        $get = $this->db->select('*')
                        ->select('t.status as status')
                        ->from('transaction t')
                        ->join('library-resources l', 'l.id = t.resources_id')
                        ->join('borrowers b', 'b.id = t.borrower_id')

                        ->or_where('t.reservation_date <', $day)
                        ->where('t.reservation_date >=', $day_start)

                        ->or_where('t.pickup_date <', $day)
                        ->where('t.pickup_date >=', $day_start)

                        ->or_where('t.due_date <', $day)
                        ->where('t.due_date >=', $day_start)

                        ->or_where('t.returned_date <', $day)
                        ->where('t.returned_date >=', $day_start)

                        ->where('t.reservation_date', 'returned_date', 'asc')

                        ->not_like('t.status', "Cancelled" )
                        ->order_by('t.updated_at', 'asc')
                        ->get();

                       return $get->result();

    }

    
    public function monthly_transaction($month, $year){
        // return $this->db->select('month(created_at)')
        //                 ->from('transaction')
        //                 ->group_by('created_at')
        //                 ->count_all_results();

        $sql="select *, count(created_at) as count
                        from transaction
                        where month(created_at)='$month' and
                        status !='Cancelled'
                        and year(created_at)='$year'";
            return $this->db->query($sql)->result_array();
    }



      
    public function user_with_transaction(){
        $get = $this->db->distinct('borrower_id')
                        ->select('borrower_id')
                        ->from('transaction t')
                        ->join('users u', 'u.id = t.borrower_id')
                        ->where('t.status', 'Reserved')
                        ->or_where('t.status', 'Borrowed')
                        ->where('u.status', "Student")
                        ->get();
        return $get->result();

        // foreach ($get->result_array() as $row)
        // {
        //         return $row['borrower_id'];
        //         // echo $row['name'];
        //         // echo $row['body'];
        // }
    }

    public function update_trans_stat($id){
        $update = $this->db->set('trans_stat', 1)
        ->where('id', $id)

                        ->update('users');
                        
       if($update) {
           return true;
       }           
    }


    public function test(){
        return $this->db->select('month(created_at)')
                        ->from('transaction')
                        ->group_by('month(created_at)')
                        ->count_all_results();
    }



















	}
?>
