<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guest extends CI_Controller {

	public function __construct()
	{
		parent ::__construct();
	    $this->load->model(array('login_model','transaction_model', 'library_resources_model'));

        if($this->session->userdata('user_type') == "Student" || $this->session->userdata('user_type') == "Teacher" || $this->session->userdata('user_type') == "Non-Teaching Staff"){
			redirect('user');
		}else if($this->session->userdata('user_type')=='Admin' || $this->session->userdata('user_type')=='Library Staff'){
			redirect('admin');
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
        $this->template('guest/dashboard.php',$data);

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

	
}
?>