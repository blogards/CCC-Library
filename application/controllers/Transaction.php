<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

    public function __construct()
	{
		parent ::__construct();
		$this->load->model(array('transaction_model', 'library_resources_model'));

        if($this->session->userdata('user_type') == "Student" || $this->session->userdata('user_type') == "Teacher" || $this->session->userdata('user_type') == "Non-Teaching Staff"){
			redirect('user');
		}else if($this->session->userdata('user_type')==''){
			redirect('login');
		}
	}

    private function template($content = 'index', $data = NULL) {

        $this->load->view('admin/includes/layout/header.php'); // include the header,
        $this->load->view('admin/includes/layout/sidebar.php'); // include the sidebar
        $this->load->view('admin/includes/layout/topbar.php'); // include the topbar
        $this->load->view($content, $data);	// main content
        $this->load->view('admin/includes/layout/footer.php'); // include footer, or footbar

    }

    //  ********      Available Resources     ********    //

    public function available_resources(){
        // $data['resources']= $this->transaction_model->available_books();
        

        $trans = $this->transaction_model->user_with_transaction();
        // var_dump($trans);
        foreach($trans as $tr){
            $id =  $tr->borrower_id;
            $borrowers = $this->transaction_model->update_trans_stat($id);
        }

        $data['borrowers']= $this->transaction_model->get_borrowers();
        // $trans = $this->transaction_model->user_with_transaction();

        // foreach($trans as $tran){
        //     $id = $tran->borrower_id;
            
        //     $data['borrowers'] = $this->transaction_model->free_borrower($id);
        //      var_dump($data);
        // }
        $data['available']= $this->transaction_model->available_resources();
        $this->template('admin/transaction/available-books.php', $data);
    }
    
    public function books(){
        $data['resources']= $this->transaction_model->available_books();
        $this->template('admin/transaction/available/books.php', $data);
    }

    public function audio_visual(){
        $data['resources']= $this->transaction_model->available_audio_visual();
        $this->template('admin/transaction/available/books.php', $data);
        
    }

    public function dissertation(){
        $data['resources']= $this->transaction_model->available_thesis();
        $this->template('admin/transaction/available/books.php', $data);
        
    }

    public function gov_pub(){
        $data['resources']= $this->transaction_model->available_gov_pub();
        $this->template('admin/transaction/available/books.php', $data);
    }

    public function manuscript(){
        $data['resources']= $this->transaction_model->available_books();
        $this->template('admin/transaction/available/books.php', $data);
    }

    public function Journal(){
        $data['resources']= $this->transaction_model->available_journal();
        $this->template('admin/transaction/available/books.php', $data);
    }


    //  ********      Load available resources per category     ********    //

    public function available_books(){
        $data['resources']= $this->transaction_model->available_books();
        // $user_id = $this->session->userdata('id');
        // $data['has_reservation'] = $this->transaction_model->has_reservation($user_id);
        $this->template('user/transactions/available/books.php', $data);
    }

    public function available_audio_visual(){
        $data['resources'] = $this->transaction_model->available_audio_visual();
        $this->template('user/transactions/available/audio-visual.php', $data);
    }

    public function available_thesis(){
        $data['resources']= $this->transaction_model->available_thesis();
        $this->template('user/transactions/available/thesis.php', $data);    
    }

    public function available_gov_pubs(){
        $data['resources']= $this->transaction_model->available_gov_pub();
        $this->template('user/transactions/available/gov-pub.php', $data);
    }

    public function available_journals(){
        $data['resources']= $this->transaction_model->available_journal();
        $this->template('user/transactions/available/journal.php', $data);
    }

    public function available_manuscripts(){
        $data['resources']= $this->transaction_model->available_manuscript();
        $this->template('user/transactions/available/manuscript.php', $data);
    }
    

    //  ********     Reservations     ********    //

    public function reservations(){
        $data['resources']= $this->transaction_model->all_reservations();
        $this->template('admin/transaction/reservation.php', $data);
    }

    public function confirm_reservation($id){
        $status = "Reserved";
        if($this->input->post('pickup_date') == ""){
            $date = $this->input->post('pick_up_date'); 
        }else{
            $date = $this->input->post('pickup_date'); 
        }
        $lib_status = $this->library_resources_model->update_resource_status($id, $status);
        if($lib_status == true){
            $trans_status = $this->transaction_model->update_transaction_status($id, $status);
            if($trans_status == true){
                $update_date = $this->transaction_model->update_reservation_date($id, $date);
                if($update_date == true){
                    set_flash_alert('success', 'Reservation Successfully Confirmed.');
                    redirect('transaction/reservations');
                }
                
            } 
        }else{
            set_flash_alert('danger', 'Something went wrong. Try again later.');
            redirect('transaction/reservations');
        }
    }

    //  ********      To Release     ********    //

    public function to_release(){
        $data['resources']= $this->transaction_model->to_release();
        // var_dump($data);
        $this->template('admin/transaction/to-release.php', $data);
    }

    public function release_transaction($id){

        $status = "Borrowed";
        // if($this->input->post('pickup_date') == ""){
        //     $date = $this->input->post('pick_up_date'); 
        // }else{
            $date = $this->input->post('pickup_date'); 
        // }
        $due = $this->input->post('due_date');
        $lib_status = $this->library_resources_model->update_resource_status($id, $status);
        if($lib_status == true){
            $trans_status = $this->transaction_model->update_transaction_status($id, $status);
            if($trans_status == true){
                $update_date = $this->transaction_model->update_pickup_date($id, $date, $due);
                if($update_date == true){
                    set_flash_alert('success', 'Reservation Successfully Released.');
                    redirect('transaction/to_release');
                }         
            } 
        }else{
            set_flash_alert('danger', 'Something went wrong. Try again later.');
            redirect('transaction/to_release');
        }
    }

    //  ********      Borrowed     ********    //

    public function borrowed(){
        $data['resources']= $this->transaction_model->borrowed();
        $this->template('admin/transaction/borrowed.php', $data);
    }

    public function receive_transaction($id){

        $status = "Returned";
        $stats = "Available"; 
        
        $return_date = $this->input->post('return_date');

        $lib_status = $this->library_resources_model->update_resource_status($id, $stats);
        if($lib_status == true){
            $trans_status = $this->transaction_model->update_transaction_status($id, $status);
            if($trans_status == true){
                $update_date = $this->transaction_model->update_returned_date($id, $return_date);
                if($update_date == true){
                    set_flash_alert('success', 'Successfully Returned.');
                    redirect('transaction/borrowed');
                }         
            } 
        }else{
            set_flash_alert('danger', 'Something went wrong. Try again later.');
            redirect('transaction/borrowed');
        }
    }

    //  ********      To Returned     ********    //

    public function returned(){
        $data['resources']= $this->transaction_model->returned();
        // var_dump($data);
        $this->template('admin/transaction/returned.php', $data);
    }

    //  ********     Assign     ********    //

    public function assign_borrower(){

        $data['borrower_id'] = $this->input->post('borrower');
        $data['resources_id'] = $this->input->post('resources');
        $data['reservation_date'] = $this->input->post('date-assign');
        $data['due_date'] = $this->input->post('due-assign');
        $data['status'] = "Reserved";

        $id = $this->input->post('resources');
        $status = "Reserved";

        $inserted = $this->transaction_model->assign_resource($data);
        if($inserted == true){
            $update = $this->library_resources_model->update_resource_status($id, $status);
            if($update == true){
                set_flash_alert('success', 'Successfully save reservation.');
                redirect('transaction/available_resources');
            }
            
        }

    }

    public function send_mail() { 
		$from_email = "ccc_lms@gmail.com"; 
		$to_email = "ramirezrocel09@gmail.com";//$this->input->post('email'); 
  
		//Load email library 
		$this->load->library('email'); 
  
		$this->email->from($from_email, 'CCC_LMS'); 
		$this->email->to($to_email);
		$this->email->subject('Email Test'); 
		$this->email->message('Testing the email class.'); 
  echo 'hi';
		//Send mail 
		if($this->email->send()) 
		echo 'success';
		// $this->session->set_flashdata("email_sent","Email sent successfully."); 
		else
		echo 'error'; 
		// $this->session->set_flashdata("email_sent","Error in sending Email."); 
		// $this->load->view('email_form'); 
	 }



    public function test(){
        $borrowers= $this->transaction_model->get_borrowers();
        
        
        $trans = $this->transaction_model->user_with_transaction();
        var_dump($trans);
        // foreach($trans as $tr){
        //     $id =  $tr->borrower_id;
        //     $borrowers = $this->transaction_model->update_trans_stat($id);
        // }
        
        
        
    }



    
}


