<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ccc_lms extends CI_Controller {

	public function __construct()
	{
		parent ::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library(array('session', 'form_validation', 'encrypt', 'pagination'));
		$this->load->database();
		$this->load->model(array('login_model','transaction_model', 'library_resources_model', 'register_model', 'users_model', 'settings_model'));
		
	}
	
	public function index(){

		if($this->session->userdata('user_type') == "Student" || $this->session->userdata('user_type') == "Teacher" || $this->session->userdata('user_type') == "Non-Teaching Staff"){
			redirect('user');
		}else if($this->session->userdata('user_type')=='Admin' || $this->session->userdata('user_type')=='Library Staff'){
			redirect('admin');
		}else{
			redirect('login');
		}
	}

	/******				ADMIN 			********/

	public function assign_borrower(){

		if($this->input->post('assign_btn')){

			$data['borrower_id'] = $this->input->post('borrower');
			$user_id = $this->input->post('borrower');
			$data['resources_id'] = $this->input->post('resources');
			$data['reservation_date'] = $this->input->post('date-assign');
			$date = $this->input->post('date-assign');
			$data['due_date'] = $this->input->post('due_assign');
			$data['status'] = "Reserved";
			$id = $this->input->post('resources');
			$status = "Reserved";
			$code = 'confirm_reservation';

			$inserted = $this->transaction_model->assign_resource($data);
			if($inserted == true){
				$update = $this->library_resources_model->update_resource_status($id, $status);
				if($update == true){

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
                    
					set_flash_alert('success', 'Successfully save reservation.');
					redirect('transaction/available_resources');
				}
				
			}
		}

        

    }


	/******				GUEST 			********/
	
	public function reserve_book($id){

		if($this->input->post('guest_add_reservation_btn')){
			$data['first_name'] = $this->input->post('first_name');
			$data['middle_name'] = $this->input->post('middle_name');
			$data['last_name'] = $this->input->post('last_name');
			$data['street'] = $this->input->post('street');
			$data['barangay'] = $this->input->post('barangay');
			$data['city'] = $this->input->post('city');
			$data['province'] = $this->input->post('province');
			$data['postal_code'] = $this->input->post('postal');
			$data['contact'] = $this->input->post('contact');
			// $data['due_date'] = $this->input->post('due_assign');
			
			$user['email'] = $this->input->post('email');
			$to_email = $this->input->post('email');
			$user['user_type'] = "Guest";
			$user['status'] = "";

			$result = $this->users_model->get_last_users_id();
			
			$ttl = $result[0];
			$data['id'] =  $ttl->id + 1;
			$user['id'] =  $ttl->id + 1;
			$transaction['id'] =  $ttl->id + 1;

			$transaction['borrower_id'] = $id;
			// $data['resources_id'] = $this->input->post('resources');
			$transaction['resources_id'] = $id;
			$user_id = $this->input->post('user_id');
			$transaction['reservation_date'] = $this->input->post('date-sched');
			$transaction['due_date'] = $this->input->post('due_assign');
			$transaction['status'] = "Reserved";
			$status = "Reserved";

			$add_guest = $this->register_model->add_guest($data);
			if($add_guest == true){

				$insert_guest = $this->register_model->insert_guest($user);
				if($insert_guest == true){
					$inserted = $this->transaction_model->assign_resource($transaction);
					if($inserted == true){
						$update = $this->library_resources_model->update_resource_status($id, $status);
						if($update == true){

							// $user = $this->users_model->get_user($user_id);
							// foreach($user as $usr){
							// 	$to_email =$usr->email;
							// }
							$emails = $this->settings_model->get_email_contents($code);
							foreach($emails as $email){
								$subject = $email->subject;
								$content_1 = $email->content_1;
								$content_2 = $email->content_2;
								$footer = $email->footer;
							}
							$reservation_date = date("M d, Y", strtotime($date));
							$email = $this->send_mail($to_email, $subject, $content_1, $content_2, $footer, $category, $reservation_date);
                
							set_flash_alert('success', 'Successfully save reservation.');
							redirect('guest');
						}
						
					}				
				}
				
			}
		}

      	
    }


	public function reserve_book1(){

		if($this->input->post('guest_add_reservation_btn')){
			$data['first_name'] = $this->input->post('first_name');
			$data['middle_name'] = $this->input->post('middle_name');
			$data['last_name'] = $this->input->post('last_name');
			$data['street'] = $this->input->post('street');
			$data['barangay'] = $this->input->post('barangay');
			$data['city'] = $this->input->post('city');
			$data['province'] = $this->input->post('province');
			$data['postal_code'] = $this->input->post('postal');
			$data['contact'] = $this->input->post('contact');
			// $data['due_date'] = $this->input->post('due_assign');
			
			$user['email'] = $this->input->post('email');
			$to_email = $this->input->post('email');
			$user['user_type'] = "Guest";
			$user['status'] = "";

			$result = $this->users_model->get_last_users_id();
			
			$ttl = $result[0];
			$data['id'] =  $ttl->id + 1;
			$user['id'] =  $ttl->id + 1;
			$transaction['id'] =  $ttl->id + 1;

			$transaction['borrower_id'] = $ttl->id + 1;
			// $data['resources_id'] = $this->input->post('resources');
			$transaction['resources_id'] = $this->input->post('title');
			$user_id = $this->input->post('user_id');
			$transaction['reservation_date'] = $this->input->post('date-sched');
			$transaction['due_date'] = $this->input->post('due_assign');
			$transaction['status'] = "Reserved";
			$status = "Reserved";

			$add_guest = $this->register_model->add_guest($data);
			if($add_guest == true){

				$insert_guest = $this->register_model->insert_guest($user);
				if($insert_guest == true){
					$inserted = $this->transaction_model->assign_resource($transaction);
					if($inserted == true){
						$update = $this->library_resources_model->update_resource_status($id, $status);
						if($update == true){

							// $user = $this->users_model->get_user($user_id);
							// foreach($user as $usr){
							// 	$to_email =$usr->email;
							// }
							$emails = $this->settings_model->get_email_contents($code);
							foreach($emails as $email){
								$subject = $email->subject;
								$content_1 = $email->content_1;
								$content_2 = $email->content_2;
								$footer = $email->footer;
							}
							$reservation_date = date("M d, Y", strtotime($date));
							$email = $this->send_mail($to_email, $subject, $content_1, $content_2, $footer, $category, $reservation_date);
                
							
							set_flash_alert('success', 'Successfully save reservation.');
							redirect('guest');
						}
						
					}				
				}
				
			}
		}
    }
	public function pass_change(){
		$this->load->view('admin/includes/layout/header.php');
		$this->load->view('user/change-password.php');
		$this->load->view('admin/includes/layout/login-footer.php');
	}

	public function change_password(){

		set_flash_alert('danger', 'Please change your password from deafult.');
		redirect('ccc_lms/pass_change');
	}


	public function new_pass(){
		if($this->input->post('change_pass_btn')){

            // $this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('password_1', 'Password', 'trim|required|alpha_numeric|min_length[8]');
			$this->form_validation->set_rules('password_2', 'Confirmation Password', 'trim|required|matches[password_1]');
			
			if($this->form_validation->run()==true){

				// $email = $this->input->post('email');
				$user = $this->session->userdata('id');
                $pass = $this->input->post('password_1');
                $password = $this->encrypt->encode($pass);
                
				$check = $this->login_model->check_account($user, $password);
				// var_dump($check);
				if($check == true){
					set_flash_alert('success', 'You may now login using your new password.');
					redirect('ccc_lms/index');

				}else if($check == 'not exist'){
					set_flash_alert('danger', 'Account does not exist.');
					redirect('ccc_lms/pass_change');

				}

            }else{
                set_flash_alert('danger', validation_errors());			
				redirect('ccc_lms/pass_change');

			 }


	       // $profilepic  =  "default.jpg";
        }
	}


	

	public function test(){
		echo 'hello';
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
	
}
?>