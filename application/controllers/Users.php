<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct()
	{
		parent ::__construct();
		$this->load->library('encrypt');
		$this->load->model('users_model');

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
        $data['users']= $this->users_model->all_users();
        $this->template('admin/users.php',$data);
    }

    public function edit($id){
        $data['users'] = $this->users_model->get_user($id);
        $this->template('admin/edit-user.php',$data);
    }

    public function add_user(){
        $category = 'Books';
        $curtmtmp   = date('Y-m-d H:i:s');


        $first_name = $this->input->post('first_name');
        $middle_name = $this->input->post('middle_name');
        $last_name = $this->input->post('last_name');
        $course = $this->input->post('course');
        $year_level = $this->input->post('year_level');
        $contact = $this->input->post('contact');
        $street = $this->input->post('street');
        $barangay = $this->input->post('barangay');
        $city = $this->input->post('city');
        $province = $this->input->post('province');
        $postal_code = $this->input->post('postal_code');
        $user_type = $this->input->post('user_type'); 
        

        $result = $this->users_model->get_last_users_id();
        
        
        
        foreach($result as $id){
            $user_id = $id->id;
            $total = $user_id + 1;
        }
            
        $barcode = "GVP-" . $total;
            $insert_borrowers = $this->users_model
                                    ->add_borrower($total, $contact, $first_name, $last_name, $user_type);

            if($insert_borrowers == true){
                $insert_user = $this->users_model
                                    ->add_user($total, $first_name, $middle_name, $last_name,
                                                $course, $year_level, $contact, $street, $barangay,
                                                $city, $province, $postal_code);

                if($insert_user == true){
                    set_flash_alert('success', 'Successfully Added New User!');
                    redirect('users/index');
                }else{
                    set_flash_alert('danger', 'Something went wrong.');
                    redirect('users/index');
                }
            }
        
    }

    public function importUsers(){

        // Check form submit or not 
        if($this->input->post('import_users_btn') != NULL ){ 
            $data = array(); 
             if(!empty($_FILES['file']['name'])){ 
                 // Set preference 
                 $config['upload_path'] = 'tools/imports/users/'; 
                 $config['allowed_types'] = 'csv'; 
                 $config['max_size'] = '2048000'; // max_size in kb 
                 $config['overwrite']	= TRUE;
 
                 $config['file_name'] = $_FILES['file']['name'];
         
                 // Load upload library 
                 $this->load->library('upload',$config); 
         
                 // File upload
                 if($this->upload->do_upload('file')){ 
                     $uploadData = $this->upload->data(); 
                     $filename = $uploadData['file_name'];
         
                     $file = fopen("tools/imports/users/".$filename,"r");
                     
                     var_dump($file);
 
                     $i = 0;
                     $numberOfFields = 14; // Total number of fields
                     $importData_arr = array();
         
                     while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                         $num = count($filedata );
                         
                         if($numberOfFields == $num){
                             for ($c=0; $c < $num; $c++) {
                                 $importData_arr[$i][] = $filedata [$c];
                            }
                         }
                         $i++;
                     }
                     fclose($file);
         
                     $skip = 0;

                    

         
                     // insert import data
                     foreach($importData_arr as $userdata){
                       
                         // Skip first row
                         if($skip != 0){
                            $result = $this->users_model->get_last_users_id();       
                            foreach($result as $id){
                                $user_id = $id->id;
                                $total = $user_id + 1;
                            }

                             if($this->users_model->importUsers($userdata, $total)){
                                 $this->users_model->importBorrowers($userdata, $total);
                             }else{
                                 set_flash_alert('danger', 'Something went wrong. Try again later.');
                                 redirect('users/index');
                             }
                            
                         }
                         $skip ++;
                     }
                     set_flash_alert('success', 'Successfully imported Users data.');
                     redirect('users/index');
                }else{ 
                     set_flash_alert('danger', 'You can only import  CSV File. Try again later.');
                     redirect('users/index');
                 } 
             }else{ 
                 set_flash_alert('danger', 'Please choose a CVS file to upload.');
                 redirect('users/index');
             } 
             set_flash_alert('danger', 'Something went wrong. Try again later.');
             redirect('users/index');
         }else{
             set_flash_alert('danger', 'Sumbit error.');
             redirect('users/index');
         }
    
    }

    public function edit_user($id){

        

        $user_id     =  $this->input->post('id');
        $email       =  $this->input->post('email');
        $data['id_no']   =  $this->input->post('id_no');
        $data['section']   =  $this->input->post('section');
        $data['first_name']   =  $this->input->post('firstname'); 
        $data['middle_name']  =  $this->input->post('middlename');
        $data['last_name']    =  $this->input->post('lastname');
        $data['contact']     =  $this->input->post('contact');
        $data['street']      =  $this->input->post('street');
        $data['barangay']    =  $this->input->post('barangay');
        $data['city']		 =  $this->input->post('city'); 
        $data['province']    =  $this->input->post('province');
        $data['postal_code'] =  $this->input->post('postal_code');
        $user_type           =  $this->input->post('user_type');
        $data['course']      =  $this->input->post('course');
        $data['year_level']  =  $this->input->post('year_level');
        
        $config['upload_path']= APPPATH.'../tools/img/profile/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = 500000;
		$this->load->library('upload', $config);

				
			 if(!empty($_FILES['profileimg'])){
					if(!$this->upload->do_upload('profileimg')){
						$error=$this->upload->display_errors();
						echo $error;
                        $profile_img = $this->input->post('oldpic');
					}else{
						$upload_data = $this->upload->data();
						$profile_img = $upload_data['file_name'];
					}
			}else {
				$profile_img = $this->input->post('oldpic');	
			}
				
		
         if($this->input->post('password_1') != ""){
            $pass = $this->input->post('password_1');
            $password = $this->encrypt->encode($pass);
            $update_user = $this->users_model->update_user1($user_id, $user_type, $profile_img, $password);
        }else{
            $update_user = $this->users_model->update_user($user_id, $user_type, $profile_img);
        }
        if($update_user == true){
            $update_borrower = $this->users_model->update_borrower($data, $user_id);
            if($update_borrower == true){
                    set_flash_alert('success', 'Successfully Updated!');
                    redirect('users/index');
            }else{
                set_flash_alert('danger', config_item('SQLError'));
                redirect('users/index');
            }
        }
        else{
            set_flash_alert('danger', config_item('SQLError'));
            redirect('users/index');
        }
    }

    public function delete_user($id){
        $result1 = $this->users_model->delete_user($id);
                if($result1==true){
                    $result2 = $this->users_model->delete_borrower($id);
                    if($result2==true){
                        set_flash_alert('success', 'Successfully Deleted!');
                        redirect('users/index');
                    }else{
                        set_flash_alert('danger', config_item('SQLError'));
                        redirect('users/index');
                    }
                }
    }

    public function test(){
        echo $this->encrypt->decode('BTFXNVIwAWAHYlQy'); 
        
    }

    public function user_status(){
        $id = $_POST['id'];
        $status = $_POST['status'];
       
        if($status == "Approved"){
            $data['status'] = "Approved"; 
            $result = $this->users_model->status($id, $data);
        }else{
            $data['status'] = "Pending"; 
            $result = $this->users_model->status($id, $data);
        }
    }
    
}


