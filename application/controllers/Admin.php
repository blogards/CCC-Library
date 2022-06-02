<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
	{
		parent ::__construct();
        
        $this->load->model(array('login_model','transaction_model', 'library_resources_model', 'register_model', 'users_model', 'settings_model'));
		
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

    public function index(){

		$data['available'] = $this->library_resources_model->count_available_resources();
		$data['not_available'] = $this->library_resources_model->count_not_available_resources();
		$data['damage'] = $this->library_resources_model->count_damage_resources();
		$data['archive'] = $this->library_resources_model->count_archive_resources();

		$data['users'] = $this->library_resources_model->count_all_users();
		$data['teachers'] = $this->library_resources_model->count_all_teachers();
		$data['staffs'] = $this->library_resources_model->count_all_staffs();
		$data['guests'] = $this->library_resources_model->count_all_guest();

		$data['avm'] = $this->library_resources_model->count_all_avm();
		$data['books'] = $this->library_resources_model->count_all_books();
		$data['gov_pub'] = $this->library_resources_model->count_all_gov_pub();
		$data['journal'] = $this->library_resources_model->count_all_journals();
		$data['manuscript'] = $this->library_resources_model->count_all_manuscripts();
		$data['thesis'] = $this->library_resources_model->count_all_disertation();



		$year = date('Y'); 
		$total=array();
		for ($month = 1; $month <= 12; $month ++){
			$query=$this->transaction_model->monthly_transaction($month, $year);
			$data['chart_data'] = json_encode( $query );
			foreach($query as $row){
				$total[]=$row['count'];		
			}
		}
		$data['tjan'] = $total[0];$data['tfeb'] = $total[1];$data['tmar'] = $total[2];$data['tapr'] = $total[3];
		$data['tmay'] = $total[4];$data['tjun'] = $total[5];$data['tjul'] = $total[6];$data['taug'] = $total[7];
		$data['tsep'] = $total[8];$data['toct'] = $total[9];$data['tnov'] = $total[10];$data['tdec'] = $total[11];


		$avl = $this->library_resources_model->count_available_resources();
		$not_avl = $this->library_resources_model->count_not_available_resources();
		$damage = $this->library_resources_model->count_damage_resources();
		$archive = $this->library_resources_model->count_archive_resources();
		$data['total'] = $avl + $not_avl + $damage + $archive; 

		$avm = $this->library_resources_model->count_all_avm();
		$books = $this->library_resources_model->count_all_books();
		$gov_pub = $this->library_resources_model->count_all_gov_pub();
		$journal = $this->library_resources_model->count_all_journals();
		$manuscript = $this->library_resources_model->count_all_manuscripts();
		$thesis = $this->library_resources_model->count_all_disertation();
		$data['resource_total'] = $avm + $books + $gov_pub + $journal + $manuscript + $thesis;


		$day = date('Y-m-d', strtotime ('today'));
		$yesterday = date('Y-m-d', strtotime ('last day'));
		$day_start = date('Y-m-d', strtotime ('last week'));	
		$data['past'] = $this->transaction_model->get_past_transaction($day_start, $day);		
		$data['today'] = $this->transaction_model->get_today_transaction($day);

       	$this->template('admin/dashboard.php', $data);
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

	public function test(){

		$day_start = date('Y-m-d', strtotime ('year'));

		$day = date('Y-m-d', strtotime ('month'));
		$year = date('Y'); 
		$total=array();
		for ($month = 1; $month <= 12; $month ++){
			// var_dump($year);
			// var_dump($month);
			$query=$this->transaction_model->monthly_transaction($month, $year);
			$array = array();

			foreach($query as $row){
				$total=$row['count'];
				// while($row = mysqli_fetch_assoc($row))
				// $query=$this->transaction_model->monthly_transaction($month, $year);
					$data['chart_data'] = json_encode($total);
					var_dump($data);
				}	
		}
		
	}
    
}


