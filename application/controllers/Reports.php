<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {

    public function __construct()
	{
		parent ::__construct();
        
        $this->load->model(array('login_model','transaction_model', 'reports_model', 'library_resources_model', 'register_model', 'users_model', 'settings_model'));
		
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

    public function faculty(){

        $data['teachers'] = $this->users_model->all_teachers();
        $teachers = $this->users_model->all_teachers();
        $year = date('Y', strtotime ('this year'));
        $count = count($teachers);

        foreach($teachers as $teach){
           $id = $teach->id;
           

            for ($month = 1; $month <= 12; $month ++){
                $query[]=$this->reports_model->cur_year($month, $year, $id);
                
            }
           
            // var_dump($id);
        
            $data['total'] = $this->reports_model->total_year($year);
            $data['jan'] = $query[0];$data['feb'] = $query[1];$data['mar'] = $query[2];$data['apr'] = $query[3];
            $data['may'] = $query[4];$data['jun'] = $query[5];$data['jul'] = $query[6];$data['aug'] = $query[7];
            $data['sep'] = $query[8];$data['oct'] = $query[9];$data['nov'] = $query[10];$data['dec'] = $query[11];
        }
       
        $this->template('admin/reports/faculty_reports.php', $data);
    }

    public function assign_borrower(){

		if($this->input->post('assign_btn')){

			$data['borrower_id'] = $this->input->post('borrower');
			$user_id = $this->input->post('borrower');
			$data['resources_id'] = $this->input->post('resources');
			$data['reservation_date'] = $this->input->post('date-assign');
			$date = $this->input->post('date-assign');
			// $data['due_date'] = $this->input->post('due_assign');
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



    public function view_faculty_report(){
        $data['teachers'] = $this->users_model->all_teachers();
        $teachers = $this->users_model->all_teachers();
        $year = date('Y', strtotime ('this year'));
        $count = count($teachers);

        foreach($teachers as $teach){
           $id = $teach->id;
           

            for ($month = 1; $month <= 12; $month ++){
                $query[]=$this->reports_model->cur_year($month, $year, $id);
                
            }
           
            // var_dump($id);
        
            $data['total'] = $this->reports_model->total_year($year);
            $data['jan'] = $query[0];$data['feb'] = $query[1];$data['mar'] = $query[2];$data['apr'] = $query[3];
            $data['may'] = $query[4];$data['jun'] = $query[5];$data['jul'] = $query[6];$data['aug'] = $query[7];
            $data['sep'] = $query[8];$data['oct'] = $query[9];$data['nov'] = $query[10];$data['dec'] = $query[11];
        }
        $this->load->view('admin/reports/view_faculty.php', $data);
    }

    public function student(){
        $data['teachers'] = $this->users_model->all_teachers();
        $teachers = $this->users_model->all_teachers();
        $year = date('Y', strtotime ('this year'));
        $count = count($teachers);

        foreach($teachers as $teach){
           $id = $teach->id;
           

            for ($month = 1; $month <= 12; $month ++){
                $query[]=$this->reports_model->cur_year($month, $year, $id);
                
            }
           
            
            $data['jan'] = $query[0];$data['feb'] = $query[1];$data['mar'] = $query[2];$data['apr'] = $query[3];
            $data['may'] = $query[4];$data['jun'] = $query[5];$data['jul'] = $query[6];$data['aug'] = $query[7];
            $data['sep'] = $query[8];$data['oct'] = $query[9];$data['nov'] = $query[10];$data['dec'] = $query[11];
    }
    // var_dump($data);
        // $data['total'] = $this->reports_model->total_year($year);
        $this->load->view('admin/reports/student.php', $data);
    }
    
}


