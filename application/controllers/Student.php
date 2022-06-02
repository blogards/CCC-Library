<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

    public function __construct()
	{
		parent ::__construct();
		$this->load->library('encrypt');
		$this->load->model(array('users_model','transaction_model', 'library_resources_model'));

        if($this->session->userdata('user_type') !='Student'){
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
        $data['users']= $this->users_model->all_users();
        $this->template('user/dashboard.php',$data);
    }

    //  ********      Load available resources per category     ********    //

    public function available_books(){
        $data['resources']= $this->transaction_model->available_books();
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

    //  ********      Add Reservation     ********    //

    public function reservations(){
        $user_id = $this->session->userdata('id');
        $data['resources']= $this->transaction_model->user_reservations($user_id);
        $this->template('user/transactions/reservations.php', $data);
    }

    public function reserve_book($id){
        $resource_id = $id;
        $user_id = $this->input->post('user_id');
        $date = $this->input->post('date-sched');

        // var_dump($date);
        $reserve = $this->transaction_model->add_reservation($id, $user_id, $date);
        if($reserve == true){
            $status = "Pending";
            $reserve_status = $this->library_resources_model->update_resource_status($id, $status);
            if($reserve_status == true){
                set_flash_alert('success', 'You have just reserve one of library resources. Please wait for the confirmation.');
                redirect('student/reservations');
            }else{
                set_flash_alert('danger', 'Something went wrong. Please try again later.');
                redirect('student/reservations');
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
                redirect('student/reservations');
            }else{
                set_flash_alert('danger', 'Something went wrong. Please try again later.');
                redirect('student/reservations');
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

    public function test(){
        $data['resources']= $this->transaction_model->test();
        var_dump($data);
    }

    
    
}


