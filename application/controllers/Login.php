<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent ::__construct();
		$this->load->model('login_model');
		
		
	}

	//  ********      Login     ********    //
	
    public function index(){
		if($this->session->userdata('user_type')=='Admin'){
			redirect('admin');
		}else if($this->session->userdata('user_type')=='Student'){
			redirect('user');
		}else{
			$this->load->view('admin/includes/layout/header.php');
			$this->load->view('admin/login.php');
			$this->load->view('admin/includes/layout/login-footer.php');
		}
        
    }


    public function signin(){
        if($this->input->post('login_btn')){
			$this->form_validation->set_rules('email', 'Email', 'trim|required' );
			$this->form_validation->set_rules('password', 'Password', 'required');
			
			if($this->form_validation->run()){
				
				$email = $this->input->post('email');
				$pass = $this->input->post('password');
				
				$result=$this->login_model->login($email, $pass);
				
				if($result== 'Wrong Password'  || $result== 'Wrong Username'){
					set_flash_alert('danger', 'Wrong email/password combination.');
					redirect('login/index');

				}else if($result == 'user' ){
					if($this->session->userdata('user_status') == "Pending"){
						set_flash_alert('danger', 'Your account is not yet verified. 
						Please make sure to complete your account/profile details for faster account verification. 
						Thank you!');
						redirect('user');
					}else{
						redirect('user');
					}

				}else if($result == 'admin' ){
					redirect('admin');

				}else if($result == 'change_pass' ){
					redirect('ccc_lms/change_password');
				}else{
					set_flash_alert('danger', 'User does not exist.');
					redirect('login');

				}
			}else{
				set_flash_alert('danger', $error);
				redirect('login');

			}
		}else{
			set_flash_alert('danger', 'Wrong email/password combination');
			redirect('login');
		}
		
	}
}


