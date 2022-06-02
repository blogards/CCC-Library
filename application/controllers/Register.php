<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
	{
		parent ::__construct();
		$this->load->library('encrypt');
		$this->load->helper(array('form', 'url'));
		$this->load->model(array('register_model', 'users_model'));
	}

    public function index(){

        $this->load->view('admin/includes/layout/header.php');
        $this->load->view('admin/register.php');
        $this->load->view('admin/includes/layout/login-footer.php');

	}

    public function signup(){

        if($this->input->post('register_btn')){

            $this->form_validation->set_rules('firstname', 'First name', 'trim|required|min_length[5]|max_length[12]');
			$this->form_validation->set_rules('middlename', 'Middle name', 'trim|required|min_length[5]|max_length[12]');
			$this->form_validation->set_rules('lastname', 'Last name', 'trim|required|min_length[5]|max_length[12]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]', 
													array('is_unique'     => 'This %s already exists.'));
			$this->form_validation->set_rules('contact', 'Contact', 'trim|required|min_length[11]|max_length[13]|numeric|is_unique[borrowers.contact]',
												array('is_unique' => 'This %s is already registered.'));
			$this->form_validation->set_rules('password_1', 'Password', 'trim|required|alpha_numeric|min_length[8]');
			$this->form_validation->set_rules('password_2', 'Confirmation Password', 'trim|required|matches[password_1]');
			
			if($this->form_validation->run()==true){

				$user_type = $this->input->post('user_type');
                $first_name = $this->input->post('firstname');
                $middle_name = $this->input->post('middlename');
                $last_name = $this->input->post('lastname');
                $email = $this->input->post('email');
                $contact = $this->input->post('contact');
                $pass = $this->input->post('password_1');
                $password = $this->encrypt->encode($pass);
                $status      =  "Pending";

                $result = $this->users_model->get_last_users_id();
        
                $ttl = $result[0];
                $total =  $ttl->id + 1;
                
                $insert_acc = $this->register_model->insert_acc($email, $password, $status, $total, $user_type);
                
                if($insert_acc == true){
                    $insert_user = $this->register_model->add_user($total, $first_name, $middle_name, $last_name);

                    if($insert_user == true){
                        set_flash_alert('success', 'Successfully registered an account. You can now login.');
                        redirect('login');
                    }
                }else{
                    set_flash_alert('danger', 'Something went wrong. Try again later.');
                    redirect('register');
                }
            }else{
                set_flash_alert('danger', validation_errors());
				
				redirect('register/index', $data);
            }


	       // $profilepic  =  "default.jpg";
        }
	}
    
    public function test(){
        $result = $this->users_model->get_last_users_id();
        var_dump($result[0]);
        $total = $result[0];
        echo $total->id + 1;
    }
}


