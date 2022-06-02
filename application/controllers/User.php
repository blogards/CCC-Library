<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
	{
		parent ::__construct();
		$this->load->library('encrypt');
		$this->load->model(array('users_model','transaction_model', 'library_resources_model','settings_model'));

        if($this->session->userdata('user_type') == 'Admin' || $this->session->userdata('user_type') == 'Library Staff'){
			redirect('admin');
		}else if($this->session->userdata('user_type') == ''){
            redirect('login');
        }
	}

    private function template($content = 'index', $data = NULL) {

        $this->load->view('admin/includes/layout/header.php'); // include the header,
        $this->load->view('user/includes/sidebar.php'); // include the sidebar
        $this->load->view('user/includes/topbar.php'); // include the topbar
        $this->load->view($content, $data);	// main content
        $this->load->view('admin/includes/layout/footer.php'); // include footer, or footbar

    }

    public function index(){
        $user_id = $this->session->userdata('id');
        $data['count_resources'] = $this->library_resources_model->count_available_resources();
        $data['count_reservation'] = $this->transaction_model->count_reservation($user_id);
        $data['count_returned'] = $this->transaction_model->count_returned($user_id);
        
        $data['has_reservation'] = $this->transaction_model->has_reservation($user_id);
        $data['has_returned'] = $this->transaction_model->user_returned($user_id);

        $data['available']= $this->transaction_model->available_resources();
        $data['on_process']= $this->transaction_model->user_reservation($user_id);
       
        // $data['users']= $this->users_model->all_users(); // user

        // var_dump($data);
        $this->template('user/dashboard.php',$data);
    }

    //  ********      Load available resources per category     ********    //

    public function available_books(){
        $data['resources']= $this->transaction_model->available_books();
        $user_id = $this->session->userdata('id');
        $data['has_reservation'] = $this->transaction_model->has_reservation($user_id);
        $this->template('user/transactions/available/books.php', $data);
    }

    public function available_audio_visual(){
        $data['resources'] = $this->transaction_model->available_audio_visual();
        $user_id = $this->session->userdata('id');
        $data['has_reservation'] = $this->transaction_model->has_reservation($user_id);
        $this->template('user/transactions/available/audio-visual.php', $data);
    }

    public function available_thesis(){
        $data['resources']= $this->transaction_model->available_thesis();
        $user_id = $this->session->userdata('id');
        $data['has_reservation'] = $this->transaction_model->has_reservation($user_id);
        $this->template('user/transactions/available/thesis.php', $data);    
    }

    public function available_gov_pubs(){
        $data['resources']= $this->transaction_model->available_gov_pub();
        $user_id = $this->session->userdata('id');
        $data['has_reservation'] = $this->transaction_model->has_reservation($user_id);
        $this->template('user/transactions/available/gov-pub.php', $data);
    }

    public function available_journals(){
        $data['resources']= $this->transaction_model->available_journal();
        $user_id = $this->session->userdata('id');
        $data['has_reservation'] = $this->transaction_model->has_reservation($user_id);
        $this->template('user/transactions/available/journal.php', $data);
    }

    public function available_manuscripts(){
        $data['resources']= $this->transaction_model->available_manuscript();
        $user_id = $this->session->userdata('id');
        $data['has_reservation'] = $this->transaction_model->has_reservation($user_id);
        $this->template('user/transactions/available/manuscript.php', $data);
    }

    //  ********      Add Reservation     ********    //

    public function reservations(){
        $user_id = $this->session->userdata('id');
        $data['resources']= $this->transaction_model->user_reservations($user_id);
        $this->template('user/transactions/reservations.php', $data);
    }

    public function reserve_book($id){

        if($this->input->post('user_add_reservation_btn')){
            $resource_id = $id;
            $user_id = $this->input->post('user_id');
            $date = $this->input->post('date-sched');
            $code = 'confirm_reservation';

            // var_dump($date);
            $reserve = $this->transaction_model->add_reservation($id, $user_id, $date);
            if($reserve == true){
                $status = "Reserved";
                $reserve_status = $this->library_resources_model->update_resource_status($id, $status);
                if($reserve_status == true){

                    $user = $this->users_model->get_user($user_id);
                    foreach($user as $usr){
                        $to_email =$usr->email;
                    }
                    $emails = $this->settings_model->get_email_contents($code);
                    foreach($emails as $email){
                        $subject = $email->subject;
                        $content_1 = $email->content_1;
                        $content_2 = $email->content_2;
                        $footer = $email->footer;
                    }
                    $reservation_date = date("M d, Y", strtotime($date));
                    $email = $this->send_mail($to_email, $subject, $content_1, $content_2, $footer, $category, $reservation_date);
                    set_flash_alert('success', 'You have just reserve one of library resources.');
                    redirect('user/');
                }else{
                    set_flash_alert('danger', 'Something went wrong. Please try again later.');
                    redirect('user/');
                }
            }
        }
        

    }

    public function cancel_reservation($id){
        $reserve = $this->transaction_model->cancel_reservation($id);
        if($reserve == true){
            $status = "Available";
            $reserve_status = $this->library_resources_model->update_resource_status($id, $status);
            if($reserve_status == true){
                set_flash_alert('success', 'You have just successfully cancelled your reservation.');
                redirect('user/');
            }else{
                set_flash_alert('danger', 'Something went wrong. Please try again later.');
                redirect('user/');
            }
        }
    }

    //  ********     To release     ********    //

    public function to_release(){
        $user_id = $this->session->userdata('id');
        $data['resources']= $this->transaction_model->user_to_release($user_id);
        $this->template('user/transactions/to-release.php', $data);
    }

    //  ********      Borrowed     ********    //

    public function borrowed(){
        $user_id = $this->session->userdata('id');
        $data['resources']= $this->transaction_model->user_borrowed($user_id);
        $this->template('user/transactions/borrowed.php', $data);
    }

    //  ********      Returned     ********    //

    public function returned(){
        $user_id = $this->session->userdata('id');
        $data['resources']= $this->transaction_model->user_returned($user_id);
        //var_dump($data);
        $this->template('user/transactions/returned.php', $data);
    }



    //  ********      Logout     ********    //

    public function logout(){
		//destroy session
		$data = array(
            'id' => '',
            'first_name' =>  '',
            'last_name' =>  '',
            'profile_img' =>  '',
            'user_id' => '',
            'user_type' => ''
        );

		$this->session->unset_userdata($data);
		$this->session->sess_destroy();
		redirect('login');
	}


    public function send_mail($to_email, $subject, $content_1, $content_2, $footer, $category, $reservation_date) { 
		$from_email = "ccc_library@mngmnt.com"; 
		$this->email->from($from_email, 'CCC_LMS'); 
		$this->email->to($to_email);
		$this->email->subject("$subject"); 
        $this->email->message("$content_1$reservation_date. \n\n $footer"); 
		
 
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
        $code = "confirm_reservation";
        $emails = $this->settings_model->get_email_contents($code);
        foreach($emails as $email){
            $subject = $email->subject;
            $content = $email->content;
        }
        var_dump($emails);
    }

    
    
}


