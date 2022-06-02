<?php 
class Reports_model extends CI_Model
{

    //  ********      Users     ********    //

    public function cur_year($month, $year, $id ){
		// $sql="select borrower_id, count(borrower_id) as count 
		// 			from transaction
		// 			where 
                    
        //             status !='Cancelled' and
        //             month(created_at)='$month' 
		// 			and year(created_at)='$year'";

		// return $this->db->query($sql)->result_array();

        $sql = $this->db->select('*')
                        ->select('count(t.borrower_id) as total')
                        ->from('borrowers b')
                        ->join('transaction t', 't.borrower_id = b.id')
                        ->where('t.status !=', "Cancelled")
                        ->where('month(t.created_at)', $month)
                        ->where('year(t.created_at)', $year)
                        ->where('borrower_id', $id)
                        ->get();
        return $sql->result();
	}

    public function total_year($year){
        $get = $this->db->select('*')
                        ->select('count(t.borrower_id) as total')
                        ->from('transaction t')
                        ->join('borrowers b', 't.borrower_id = b.id', 'left')
                        ->where('year(t.created_at)', $year)
                        // ->where('borrower_id', $id)
                        ->where('t.status !=', 'Cancelled')
                        ->group_by('borrower_id')
                        ->get();
        return $get->result();
    //     $sql = $this->db->select('*')
    //                     ->select('count(t.borrower_id) as total')
    //                     ->from('borrowers b')
    //                     ->join('transaction t', 't.borrower_id = b.id', 'left')
    //                     ->where('t.status !=', "Cancelled")
    //                     // ->where('month(t.created_at)', $month)
    //                     ->where('year(t.created_at)', $year)
    //                     // ->where('borrower_id', $id)
    //                     ->group_by('borrower_id')
    //                     ->get();
    // return $sql->result();
    }

    public function count_Fjan($id, $year){
        $get = $this->db->select('*')
                        ->select('count(borrower_id) as jan')
                       ->from('transaction')
                        ->where('month(created_at)', 1)
                        ->where('year(created_at)', $year)
                        ->where('borrower_id', $id)
                        ->where('status !=', 'Cancelled')
                        ->group_by('month(created_at)','asc')
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
                        ->where('month(created_at)', 3)
                        ->where('year(created_at)', $year)
                        ->where('borrower_id', $id)
                        ->where('status !=', 'Cancelled')
                        ->group_by('month(created_at)','asc')
                        ->get();
        return $get->result();
    }
    public function count_FApr($id, $year){
        // $sql="select *, count(borrower_id) as count 
		// 			from transaction
		// 			where month(updated_at)= 4 
		// 			and year(updated_at)='$year'";
		// return $this->db->query($sql)->result_array();


        $get = $this->db->select('*')
                        ->select('borrower_id as b_id')
                        ->select('count(borrower_id) as total')
                        ->from('transaction')
                        ->where('month(created_at)', 4)
                        ->where('year(created_at)', $year)
                        ->where('borrower_id', $id)
                        ->where('status !=', 'Cancelled')
                        ->group_by('year(created_at)')
                        ->get();
        return $get->result();
    }
    public function count_FMay($id, $year){
        $get = $this->db->select('*')
                        ->select('count(borrower_id) as total')
                        ->from('transaction')
                        ->where('month(created_at)', 5)
                        ->where('year(created_at)', $year)
                        ->where('borrower_id', $id)
                        ->where('status !=', 'Cancelled')
                        ->group_by('month(created_at)','asc')
                        ->get();
        return $get->result();
    }
    public function count_FJun($id, $year){
        $get = $this->db->select('*')
                        ->select('count(borrower_id) as total')
                        ->from('transaction')
                        ->where('month(created_at)', 6)
                        ->where('year(created_at)', $year)
                        ->where('borrower_id', $id)
                        ->where('status !=', 'Cancelled')
                        ->group_by('month(created_at)','asc')
                        ->get();
        return $get->result();
    }
    
    public function count_FJul($id, $year){
        $get = $this->db->select('*')
                        ->select('count(borrower_id) as total')
                        ->from('transaction')
                        ->where('month(updated_at)', 7)
                        ->where('year(created_at)', $year)
                        ->where('borrower_id', $id)
                        ->where('status !=', 'Cancelled')
                        ->group_by('month(created_at)','asc')
                        ->get();
        return $get->result();
    }
    public function count_FAug($id, $year){
        $get = $this->db->select('*')
                        ->select('count(borrower_id) as total')
                        ->from('transaction')
                        ->where('month(created_at)', 8)
                        ->where('year(created_at)', $year)
                        ->where('borrower_id', $id)
                        ->where('status !=', 'Cancelled')
                        ->group_by('month(created_at)','asc')
                        ->get();
        return $get->result();
    }
    public function count_FSep($id, $year){
        $get = $this->db->select('*')
                        ->select('count(borrower_id) as total')
       
                        ->from('transaction')
                        ->where('month(created_at)', 9)
                        ->where('year(created_at)', $year)
                        ->where('borrower_id', $id)
                        ->where('status !=', 'Cancelled')
                        ->group_by('month(created_at)','asc')
                        ->get();
        return $get->result();
    }
    public function count_FOct($id, $year){
        $get = $this->db->select('*')
                        ->select('count(borrower_id) as total')
                        ->from('transaction')
                        ->where('month(created_at)', 10)
                        ->where('year(created_at)', $year)
                        ->where('borrower_id', $id)
                        ->where('status !=', 'Cancelled')
                        ->group_by('month(created_at)','asc')
                        ->get();
        return $get->result();
    }
    public function count_Nov($id, $year){
        $get = $this->db->select('*')
                        ->select('count(borrower_id) as total')
                        ->from('transaction')
                        ->where('month(created_at)', 11)
                        ->where('year(created_at)', $year)
                        ->where('borrower_id', $id)
                        ->where('status !=', 'Cancelled')
                        ->group_by('month(created_at)','asc')
                        ->get();
        return $get->result();
    }
    public function count_FDec($id, $year){
        $get = $this->db->select('*')
                        ->select('count(borrower_id) as total')
                        ->from('transaction')
                        ->where('month(created_at)', 12)
                        ->where('year(created_at)', $year)
                        ->where('borrower_id', $id)
                        ->where('status !=', 'Cancelled')
                        ->group_by('month(created_at)','asc')
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
