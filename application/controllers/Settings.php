<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

    public function __construct()
	{
		parent ::__construct();
		$this->load->model(array('settings_model'));

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

 //  ********      EMail     ********    //

	public function email(){
        $data['emails'] = $this->settings_model->all_email_contents();
		$this->template('admin/settings/email', $data);
	}

    public function save_email(){
        $data['code'] = $this->input->post('email_code');
        $data['subject'] = $this->input->post('email_subject');
        $data['content_1'] = $this->input->post('email_content_1');
        // $data['content_2'] = $this->input->post('email_content_2');
        $data['footer'] = $this->input->post('footer');

        $insert = $this->settings_model->save_email($data);
        if($insert == true){
            set_flash_alert('success', 'Added successfully.');
            redirect('settings/email');
        }else{
            set_flash_alert('danger', 'Something went wrong.');
            redirect('settings/email');
        }
    }

    public function update_email($id){
        // $data['code'] = $this->input->post('email_code');
        $data['subject'] = $this->input->post('email_subject');
        $data['content_1'] = $this->input->post('email_content_1');
        // $data['content_2'] = $this->input->post('email_content_2');
        $data['footer'] = $this->input->post('footer');

        $insert = $this->settings_model->update_email($id, $data);
        if($insert == true){
            set_flash_alert('success', 'Updated successfully.');
            redirect('settings/email');
        }else{
            set_flash_alert('danger', 'Something went wrong.');
            redirect('settings/email');
        }
    }

    public function delete_email($id){
        $delete = $this->settings_model->delete_email($id);
        if($delete == true){
            set_flash_alert('success', 'Deleted successfully.');
            redirect('settings/email');
        }else{
            set_flash_alert('danger', 'Something went wrong.');
            redirect('settings/email');
        }
    }


     //  ********      Reports     ********    //

    public function report(){
        $data['emails'] = $this->settings_model->all_email_contents();
		$this->template('admin/settings/report.php', $data);
	}
}
