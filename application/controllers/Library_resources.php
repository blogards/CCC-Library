<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Library_resources extends CI_Controller {

    public function __construct()
	{
		parent ::__construct();
		$this->load->library('encrypt');
		$this->load->model('library_resources_model');

        if($this->session->userdata('user_type') == "Student" || $this->session->userdata('user_type') == "Teacher" || $this->session->userdata('user_type') == "Non-Teaching Staff"){
			redirect('user');
		}else if($this->session->userdata('user_type')=='') {
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

    //  ********      Resource Status     ********    //

     public function resource_status(){
        $barcode = $_POST['barcode'];
        $status = $_POST['status'];
       
        if($status == "Available"){
            $data['status'] = "Available"; 
            $result = $this->library_resources_model->status($barcode, $data);
        }else if($status == "Not Available"){
            $data['status'] = "Not Available"; 
            $result = $this->library_resources_model->status($barcode, $data);
        }else if($status == "Damage"){
            $data['status'] = "Damage"; 
            $result = $this->library_resources_model->status($barcode, $data);
        }else if($status == "Archive"){
            $data['status'] = "Archive"; 
            $result = $this->library_resources_model->status($barcode, $data);
        }
        // else{
        //     $data['status'] = "Not Available"; 
        //     $result = $this->library_resources_model->status($barcode, $data);
        // }
    }

    //  ********      Books     ********    //

    public function books(){
        $data['books']= $this->library_resources_model->books();
        $this->template('admin/library_resources/books.php',$data);
       
    }

    public function add_books(){
        $category = 'Books';
        $curtmtmp   = date('Y-m-d H:i:s');

        $title = $this->input->post('title'); 
        $barcode = $this->input->post('barcode');
        $edition = $this->input->post('edition');
        $volume = $this->input->post('volume');
        $author = $this->input->post('author');
        $publisher = $this->input->post('publisher');
        $class = $this->input->post('class');
        $pages = $this->input->post('pages');
        $date_received = $this->input->post('date_received');
        $year = $this->input->post('year');
        $cash_price = $this->input->post('cash_price');
        $sof = $this->input->post('sof');
        $remarks = $this->input->post('remarks');
        $type = $this->input->post('type');

        $author = $this->input->post('author');
        // $author_first_name = $this->input->post('author_first_name');
        // $author_middle_name = $this->input->post('author_middle_name');
        // $author_last_name = $this->input->post('author_last_name');

        // set path to store uploaded files
		$config['upload_path'] = './tools/files';
		// set allowed file types
        $config['allowed_types'] = 'pdf|csv';
		// set upload limit, set 0 for no limit
		$config['max_size']	= "2048000"; // Can be set to particular file size , here it is 2 MB(2048 Kb)
        $config['overwrite']	= TRUE;

        // load upload library with custom config settings
        $this->load->library('upload', $config);

        $this->upload->initialize($config);
 
        if($this->upload->do_upload('pdf')){
            $data = array('upload_data' => $this->upload->data());
            $soft_copy = $data['upload_data']['file_name'];
        }else{
            $error = array('error' => $this->upload->display_errors());
            set_flash_alert('danger', 'File exceeds the requirement');
            redirect('library_resources/books');
            //$this->load->view('custom_view', $error);
        }



        $result1 = $this->library_resources_model->add_resources($barcode, $title, $category);
        
        if($result1==true){
            $result2 = $this->library_resources_model->add_books($barcode, $edition, $volume, $author, $publisher, $class, $pages, $remarks, $date_received, $year, $cash_price, $sof, $type, $soft_copy);
            if($result2==true){
                // $get_id =  $this->library_resources_model->get_last_resource_id();
                // foreach($get_id as $row){
                //     $resource_id = $row->id;
                // }
                // $insert_author = $this->library_resources_model->add_author($resource_id, $author_first_name, $author_middle_name, $author_last_name);
                // if($insert_author == true){
                //     $author_id = $this->library_resources_model->get_last_author_id();
                //     foreach($author_id as $row){
                //         $author_id = $row->id
                //     }
                //     $update_author = $this->library_resources_model->update_author($author_id, $barcode);
                //     if($update_author == true){
                        set_flash_alert('success', 'Successfully Added Book!');
                        redirect('library_resources/books');
                    }else{
                        set_flash_alert('danger', 'Something went wrong. Try again later!');
                        redirect('library_resources/books');
                    }
                    
                // }
            // }
        }
        // var_dump($data);
    }

    

    public function edit_book($id){

        if($this->input->post('edit_books_btn')){
            $title = $this->input->post('title1'); 
            $barcode = $id;
            $edition = $this->input->post('edition1');
            $volume = $this->input->post('volume1');
            $author = $this->input->post('author1');
            $publisher = $this->input->post('publisher1');
            $class = $this->input->post('class1');
            $pages = $this->input->post('pages1');
            $date_received = $this->input->post('date_received1');
            $year = $this->input->post('year1');
            $cash_price = $this->input->post('cash_price1');
            $sof = $this->input->post('sof1');
            $remarks = $this->input->post('remarks1');

            if($this->input->post('pdf') != ''){
                // set path to store uploaded files
                $config['upload_path'] = './tools/files';
                // set allowed file types
                $config['allowed_types'] = 'pdf|csv';
                // set upload limit, set 0 for no limit
                $config['max_size']	= "2048000"; // Can be set to particular file size , here it is 2 MB(2048 Kb)
                $config['overwrite']	= TRUE;

                // load upload library with custom config settings
                $this->load->library('upload', $config);

                $this->upload->initialize($config);
        
                if($this->upload->do_upload('pdf')){
                    $data = array('upload_data' => $this->upload->data());
                    $soft_copy = $data['upload_data']['file_name'];
                }else{
                    $error = array('error' => $this->upload->display_errors());
                    set_flash_alert('danger', 'File exceeds the requirement');
                    redirect('library_resources/books');
                    //$this->load->view('custom_view', $error);
                }
            }else{
                $soft_copy = $this->input->post('pdf1');
            }
            


        
            $result1 = $this->library_resources_model->update_resources($barcode, $title);
            if($result1==true){
                $result2 = $this->library_resources_model->update_books($barcode, $edition, $volume, $author, $publisher, $class, $pages, $remarks, $date_received, $year, $cash_price, $sof);
                if($result2==true){
                    set_flash_alert('success', 'Updated Successfully');
                    redirect('library_resources/books');
                }else{
                    set_flash_alert('danger', 'Something went wrong. Try again later!');
                    redirect('library_resources/books');
                }
            }
        }   
    }

    public function delete_book($barcode){
        $result1 = $this->library_resources_model->delete_resources($barcode);
                if($result1==true){
                    $result2 = $this->library_resources_model->delete_books($barcode);
                    if($result2==true){
                        set_flash_alert('success', 'Updated Successfully');
                        redirect('library_resources/books');
                    }else{
                        set_flash_alert('danger', 'Deleted Successfully!');
                        redirect('library_resources/books');
                    }
                }
    }

    public function importBook(){

        // Check form submit or not 
        if($this->input->post('import_books_btn') != NULL ){ 
           $data = array(); 
            if(!empty($_FILES['file']['name'])){ 
                // Set preference 
                $config['upload_path'] = 'tools/imports/'; 
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
        
                    $file = fopen("tools/imports/".$filename,"r");
                    
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
                        $category = "Books"; 
                        if($skip != 0){
                            $this->library_resources_model->insertRecord($userdata);
                            $this->library_resources_model->importResources($userdata, $category);
                        }
                        $skip ++;
                    }
                    set_flash_alert('success', 'Successfully imported Books data.');
                    redirect('library_resources/books');
               }else{ 
                    set_flash_alert('danger', 'You can only import  CSV File. Try again later.');
                    redirect('library_resources/books');
                } 
            }else{ 
                set_flash_alert('danger', 'Please choose a CVS file to upload.');
                redirect('library_resources/books'); 
            } 
            redirect('library_resources/books'); 
        }else{
            redirect('library_resources/books'); 
        }
    
    }
    


    //  ********      Audio Visuals     ********    //

    public function audio_visual(){
        $data['audio_visuals']= $this->library_resources_model->audio_visuals();
        $this->template('admin/library_resources/audio-visual.php',$data);
    }

    public function add_audio_visual(){
        $category = 'Audio Visual Material';
        date_default_timezone_set('Asia/Manila');
        $curtmtmp   = date('Y-m-d H:i:s');

        $title          =  $this->input->post('title'); 
        $grade_level    =  $this->input->post('grade_level'); 
        $subject        =  $this->input->post('subject'); 
        $duration       =  $this->input->post('duration'); 
        $copyright      =  $this->input->post('copyright'); 
        $date_received  =  $this->input->post('date_received');

        $result = $this->library_resources_model->count_all_audio_visual();
        
        $total = $result + 1;
        $barcode = "AVM-" . $total;

            $insert_resources = $this->library_resources_model
                                    ->add_resources($barcode, $title, $category);
            if($insert_resources == true){
                $insert_audio_visual = $this->library_resources_model
                                    ->add_audio_visual($barcode, $grade_level, $subject, $duration, $copyright, $date_received);
                if($insert_audio_visual == true){
                    set_flash_alert('success', 'Successfully Added Audio Visual Material!');
                    redirect('library_resources/audio_visual');
                }else{
                    set_flash_alert('danger', 'Something went wrong. Try again later!');
                    redirect('library_resources/audio_visual');
                }
            }
    }

    public function importAVM(){

        // Check form submit or not 
        if($this->input->post('import_avm_btn') != NULL ){ 
            $data = array(); 
             if(!empty($_FILES['file']['name'])){ 
                 // Set preference 
                 $config['upload_path'] = 'tools/imports/'; 
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
         
                     $file = fopen("tools/imports/".$filename,"r");
                     
                     var_dump($file);
 
                     $i = 0;
                     $numberOfFields = 7; // Total number of fields
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
                        $category = 'Audio Visual Material';
                        
 
                         // Skip first row
                         if($skip != 0){
                             if($this->library_resources_model->importAVM($userdata)){
                                 $this->library_resources_model->importResources($userdata, $category);
                             }else{
                                 set_flash_alert('danger', 'Something went wrong. Try again later.');
                                 redirect('library_resources/audio_visual');
                             }
                            
                         }
                         $skip ++;
                     }
                     set_flash_alert('success', 'Successfully imported Audio Visual Materials data.');
                     redirect('library_resources/audio_visual');
                }else{ 
                     set_flash_alert('danger', 'You can only import  CSV File. Try again later.');
                     redirect('library_resources/audio_visual');
                 } 
             }else{ 
                 set_flash_alert('danger', 'Please choose a CVS file to upload.');
                 redirect('library_resources/audio_visual');
             } 
             set_flash_alert('danger', 'Something went wrong. Try again later.');
             redirect('library_resources/audio_visual');
         }else{
             set_flash_alert('danger', 'Sumbit error.');
             redirect('library_resources/audio_visual');
         }
    
    }


    public function edit_audio_visual($id){

        if($this->input->post('editAudioVisualBtn')){

            $barcode        =  $id; 
            $title          =  $this->input->post('title'); 
            $grade_level    =  $this->input->post('grade_level'); 
            $subject        =  $this->input->post('subject'); 
            $duration       =  $this->input->post('duration'); 
            $copyright      =  $this->input->post('copyright'); 
            $date_received  =  $this->input->post('date_received');
        
            $result1 = $this->library_resources_model->update_resources($barcode, $title);
            if($result1==true){
                $result2 = $this->library_resources_model->update_audio_visual($barcode, $grade_level, $subject, $duration, $copyright, $date_received);
                if($result2==true){
                set_flash_alert('success', 'Updated Successfully!');
                   redirect('library_resources/audio_visual');
                }else{
                    set_flash_alert('danger', 'Something went wrong. Try again later!');
                    redirect('library_resources/audio_visual');
                }
            }
        } 
    }

    public function delete_audio_visual($barcode){
        $result1 = $this->library_resources_model->delete_resources($barcode);
                if($result1==true){
                    $result2 = $this->library_resources_model->delete_audio_visual($barcode);
                    if($result2==true){
                        set_flash_alert('success', 'Updated Successfully!');
                        redirect('library_resources/audio_visual');
                    }else{
                         set_flash_alert('danger', 'Something went wrong. Try again later!');
                         redirect('library_resources/audio_visual');
                    }
                }
    }

    //  ********      Manuscript     ********    //

    public function manuscript(){
        $data['manuscripts']= $this->library_resources_model->all_manuscript();
        $this->template('admin/library_resources/manuscript.php',$data);
    }

    public function add_manuscript(){
        $category = 'Manuscript';
        date_default_timezone_set('Asia/Manila');
        $curtmtmp   = date('Y-m-d H:i:s');

        $title          =  $this->input->post('title'); 
        $author    =  $this->input->post('author'); 
        $course        =  $this->input->post('course'); 
        $year       =  $this->input->post('year'); 


        $result=0;
        $result = $this->library_resources_model->count_all_manuscript();
        
        $total = $result + 1;
        $barcode = "MNS-" . $total;

            $insert_resources = $this->library_resources_model
                                    ->add_resources($barcode, $title, $category);

            if($insert_resources == true){
                $add_manuscript = $this->library_resources_model
                                    ->add_manuscript($barcode, $author, $course, $year);

                if($add_manuscript == true){
                    set_flash_alert('success', 'Successfully Added Manuscript / Narrative  !');
                    redirect('library_resources/manuscript');
                }else{
                    set_flash_alert('danger', 'Something went wrong. Try again later!');
                    redirect('library_resources/manuscript');
                }
            }
    }

    public function importManuscript(){

        // Check form submit or not 
        if($this->input->post('import_publication_btn') != NULL ){ 
           $data = array(); 
            if(!empty($_FILES['file']['name'])){ 
                // Set preference 
                $config['upload_path'] = 'tools/imports/'; 
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
        
                    $file = fopen("tools/imports/".$filename,"r");
                    
                    var_dump($file);

                    $i = 0;
                    $numberOfFields = 5; // Total number of fields
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
                        $category = 'Manuscript';
                        // Skip first row
                        if($skip != 0){
                            if($this->library_resources_model->importManuscript($userdata)){
                                $this->library_resources_model->importResources($userdata, $category);
                            }else{
                                set_flash_alert('danger', 'Something went wrong. Try again later.');
                                redirect('library_resources/manuscript');
                            }
                           
                        }
                        $skip ++;
                    }
                    set_flash_alert('success', 'Successfully imported Manuscript / Narrative data.');
                    redirect('library_resources/manuscript');
               }else{ 
                    set_flash_alert('danger', 'You can only import  CSV File. Try again later.');
                    redirect('library_resources/manuscript');
                } 
            }else{ 
                set_flash_alert('danger', 'Please choose a CVS file to upload.');
                redirect('library_resources/manuscript');
            } 
            set_flash_alert('danger', 'Something went wrong. Try again later.');
            redirect('library_resources/manuscript');
        }else{
            set_flash_alert('danger', 'Sumbit error.');
            redirect('library_resources/manuscript');
        }
    
    }

    public function edit_manuscript($id){

        if($this->input->post('edit_manuscript_btn')){

            $barcode        =  $id; 
            $title          =  $this->input->post('title'); 
            $author         =  $this->input->post('author'); 
            $course         =  $this->input->post('course'); 
            $year           =  $this->input->post('year'); 
        
            $result1 = $this->library_resources_model->update_resources($barcode, $title);
            if($result1==true){
                $result2 = $this->library_resources_model->update_manuscript($barcode, $author, $course, $year);
                if($result2==true){
                    set_flash_alert('success', 'Updated Successfully!');
                    redirect('library_resources/manuscript');
                }else{
                    set_flash_alert('danger', 'Something went wrong. Try again later!');
                    redirect('library_resources/manuscript');
                }
            }
        } 
    }

    public function delete_manuscript($barcode){
        $result1 = $this->library_resources_model->delete_resources($barcode);
                if($result1==true){
                    $result2 = $this->library_resources_model->delete_manuscript($barcode);
                    if($result2==true){
                        set_flash_alert('success', 'Deleted Successfully!');
                        redirect('library_resources/manuscript');
                    }else{
                        set_flash_alert('danger', 'Something went wrong. Try again later!');
                        redirect('library_resources/manuscript');
                    }
                }
    }

    //  ********      Government Publication     ********    //

    public function gov_publication(){
        $data['publications']= $this->library_resources_model->all_publications();
        $this->template('admin/library_resources/gov-publication.php',$data);
    }

    public function add_publication(){
        
        $category = 'Government Publications';
        $title          =  $this->input->post('title'); 
        $volume         =  $this->input->post('volume');
        $copy           =  $this->input->post('copy');
        $date_received  =  $this->input->post('date_received');
        $issn           =  $this->input->post('issn');
        $subject        =  $this->input->post('subject');

        $result = $this->library_resources_model->count_all_publication();
        
        $total = $result + 1;
        $barcode = "GVP-" . $total;
            $insert_resources = $this->library_resources_model
                                    ->add_resources($barcode, $title, $category);

            if($insert_resources == true){
                $add_publication = $this->library_resources_model
                                    ->add_publication($barcode, $volume, $copy, $date_received, $issn, $subject);

                if($add_publication == true){
                    set_flash_alert('success', 'Successfully Added Government Publication!');
                    redirect('library_resources/gov_publication');
                }else{
                    set_flash_alert('danger', 'Something went wrong. Try again later!');
                    redirect('library_resources/gov_publication');
                }
            }
    }

    public function importPub(){

        // Check form submit or not 
        if($this->input->post('import_publication_btn') != NULL ){ 
           $data = array(); 
            if(!empty($_FILES['file']['name'])){ 
                // Set preference 
                $config['upload_path'] = 'tools/imports/'; 
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
        
                    $file = fopen("tools/imports/".$filename,"r");
                    
                    var_dump($file);

                    $i = 0;
                    $numberOfFields = 7; // Total number of fields
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
                        $category = 'Government Publications'; 
                        // Skip first row
                        if($skip != 0){
                            if($this->library_resources_model->importPub($userdata)){
                                $this->library_resources_model->importResources($userdata, $category);
                            }else{
                                set_flash_alert('danger', 'Something went wrong. Try again later.');
                                redirect('library_resources/gov_publication');
                            }
                           
                        }
                        $skip ++;
                    }
                    set_flash_alert('success', 'Successfully imported Government Publications data.');
                    redirect('library_resources/gov_publication');
               }else{ 
                    set_flash_alert('danger', 'You can only import  CSV File. Try again later.');
                    redirect('library_resources/gov_publication');
                } 
            }else{ 
                set_flash_alert('danger', 'Please choose a CVS file to upload.');
                redirect('library_resources/gov_publication');
            } 
            redirect('library_resources/gov_publication');
        }else{
            set_flash_alert('danger', 'Sumbit error.');
            redirect('library_resources/gov_publication'); 
        }
    
    }

    public function edit_publication($id){

        if($this->input->post('editPublicationBtn')){
        $barcode        =  $id; 
        $title          =  $this->input->post('title'); 
        $volume         =  $this->input->post('volume');
        $copy           =  $this->input->post('copy');
        $date_received  =  $this->input->post('date_received');
        $issn           =  $this->input->post('issn');
        $subject        =  $this->input->post('subject');
        
            $result1 = $this->library_resources_model->update_resources($barcode, $title);
            if($result1==true){
                $result2 = $this->library_resources_model->update_publication($barcode, $volume, $copy, $date_received, $issn, $subject);
                if($result2==true){
                    set_flash_alert('success', 'Updated Successfully!');
                    redirect('library_resources/gov_publication');
                }else{
                    set_flash_alert('danger', 'Something went wrong. Try again later!');
                    redirect('library_resources/gov_publication');
                }
            }
        } 
    }

    public function delete_publication($barcode){
        $result1 = $this->library_resources_model->delete_resources($barcode);
                if($result1==true){
                    $result2 = $this->library_resources_model->delete_publication($barcode);
                    if($result2==true){
                        set_flash_alert('success', 'Deleted Successfully!');
                        redirect('library_resources/gov_publication');
                    }else{
                        set_flash_alert('danger', 'Something went wrong. Try again later!');
                        redirect('library_resources/gov_publication');
                    }
                }
    }


    //  ********      Thesis and Disertation     ********    //

    public function thesis_and_dissertation(){
        $data['all_thesis']= $this->library_resources_model->all_thesis();
        $this->template('admin/library_resources/thesis.php',$data);
    }
    
    public function add_thesis(){
        
        $category = 'Thesis/Dissertation';
        $title          =  $this->input->post('title'); 
        $author         =  $this->input->post('author');
        $copy           =  $this->input->post('copy');
        $year            =  $this->input->post('year');

        $result = $this->library_resources_model->count_all_thesis();
        
        $total = $result + 1;
        $barcode = "THS-" . $total;
            $insert_resources = $this->library_resources_model
                                    ->add_resources($barcode, $title, $category);

            if($insert_resources == true){
                $add_thesis = $this->library_resources_model
                                    ->add_thesis($barcode, $author, $year);

                if($add_thesis == true){
                    set_flash_alert('success', 'Successfully Thesis / Dissertation!');
                    redirect('library_resources/thesis_and_dissertation');
                }else{
                    set_flash_alert('danger', 'Something went wrong. Try again later!');
                    redirect('library_resources/thesis_and_dissertation');
                }
            }
    }

    public function importThesis(){

        // Check form submit or not 
        if($this->input->post('import_thesis_btn') != NULL ){ 
           $data = array(); 
            if(!empty($_FILES['file']['name'])){ 
                // Set preference 
                $config['upload_path'] = 'tools/imports/'; 
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
        
                    $file = fopen("tools/imports/".$filename,"r");
                    
                    var_dump($file);

                    $i = 0;
                    $numberOfFields = 4; // Total number of fields
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
                        $category = 'Thesis/Dissertation'; 
                        // Skip first row
                        if($skip != 0){
                            $this->library_resources_model->importThesis($userdata);
                            $this->library_resources_model->importResources($userdata, $category);
                            
                           
                        }
                        $skip ++;
                    }
                    set_flash_alert('success', 'Successfully imported Thesis data.');
                    redirect('library_resources/thesis_and_dissertation');
               }else{ 
                    set_flash_alert('danger', 'You can only import  CSV File. Try again later.');
                    redirect('library_resources/thesis_and_dissertation');
                } 
            }else{ 
                set_flash_alert('danger', 'Please choose a CVS file to upload.');
                redirect('library_resources/thesis_and_dissertation');
            } 
            set_flash_alert('danger', 'Something went wrong. Try again later.');
            redirect('library_resources/thesis_and_dissertation');
        }else{
            set_flash_alert('danger', 'Sumbit error.');
            redirect('library_resources/thesis_and_dissertation');
        }
    
    }

    public function edit_thesis($id){

        if($this->input->post('editThesisBtn')){
            $barcode        =  $id;
            $title          =  $this->input->post('title'); 
            $author         =  $this->input->post('author');
            $copy           =  $this->input->post('copy');
            $year            =  $this->input->post('year');
        
            $result1 = $this->library_resources_model->update_resources($barcode, $title);
            if($result1==true){
                $result2 = $this->library_resources_model->update_thesis($barcode, $author, $year);
                if($result2==true){
                    set_flash_alert('success', 'Updated Successfully!');
                    redirect('library_resources/thesis_and_dissertation');
                }else{
                    set_flash_alert('danger', 'Something went wrong. Try again later!');
                    redirect('library_resources/thesis_and_dissertation');
                }
            }
        } 
    }

    public function delete_thesis($barcode){
        $result1 = $this->library_resources_model->delete_resources($barcode);
                if($result1==true){
                    $result2 = $this->library_resources_model->delete_thesis($barcode);
                    if($result2==true){
                        set_flash_alert('success', 'Deleted Successfully!');
                        redirect('library_resources/thesis_and_dissertation');
                    }else{
                        set_flash_alert('danger', 'Something went wrong. Try again later!');
                        redirect('library_resources/thesis_and_dissertation');
                    }
                }
    }

    //  ********      Journals     ********    //

    public function journals(){
        $data['journals']= $this->library_resources_model->all_journal();
        $this->template('admin/library_resources/journal.php',$data);
    }
    
    public function add_journal(){
        
        $category       = 'Journals';
        $title          =  $this->input->post('title');
	    $volume         =  $this->input->post('volume');
	    $copy           =  $this->input->post('copy');
        $date_received  =  $this->input->post('date_received');
        $issn           =  $this->input->post('issn');
        $subject        =  $this->input->post('subject');

        $result = $this->library_resources_model->count_all_journal();
        
        $total = $result + 1;
        $barcode = "JRNL-" . $total;
            $insert_resources = $this->library_resources_model
                                    ->add_resources($barcode, $title, $category);

            if($insert_resources == true){               
                $add_journal = $this->library_resources_model
                                    ->add_journal($barcode, $volume, $copy, $date_received, $issn, $subject);

                if($add_journal == true){
                    set_flash_alert('success', 'Successfully Added Journal!');
                    redirect('library_resources/journals');
                }else{
                    set_flash_alert('danger', 'Something went wrong. Try again later!');
                    redirect('library_resources/journals');
                }
            }
    }

    public function importJournal(){

        // Check form submit or not 
        if($this->input->post('import_journal_btn') != NULL ){ 
           $data = array(); 
            if(!empty($_FILES['file']['name'])){ 
                // Set preference 
                $config['upload_path'] = 'tools/imports/'; 
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
        
                    $file = fopen("tools/imports/".$filename,"r");
                    
                    var_dump($file);

                    $i = 0;
                    $numberOfFields = 7; // Total number of fields
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
                        $category       = 'Journals';

                        // Skip first row
                        if($skip != 0){
                            if($this->library_resources_model->importJournal($userdata)){
                                $this->library_resources_model->importResources($userdata, $category);
                            }else{
                                set_flash_alert('danger', 'Something went wrong. Try again later.');
                                redirect('library_resources/journals');
                            }
                           
                        }
                        $skip ++;
                    }
                    set_flash_alert('success', 'Successfully imported Journals data.');
                    redirect('library_resources/journals');
               }else{ 
                    set_flash_alert('danger', 'You can only import  CSV File. Try again later.');
                    redirect('library_resources/journals');
                } 
            }else{ 
                set_flash_alert('danger', 'Please choose a CVS file to upload.');
                redirect('library_resources/journals');
            } 
            set_flash_alert('danger', 'Something went wrong. Try again later.');
            redirect('library_resources/journals');
        }else{
            set_flash_alert('danger', 'Sumbit error.');
            redirect('library_resources/journals');
        }
    
    }


    public function edit_journal($id){

        if($this->input->post('editJournalBtn')){
            $barcode        =  $id;
            $title          =  $this->input->post('title');
            $volume         =  $this->input->post('volume');
            $copy           =  $this->input->post('copy');
            $date_received  =  $this->input->post('date_received');
            $issn           =  $this->input->post('issn');
            $subject        =  $this->input->post('subject');
        
            $result1 = $this->library_resources_model->update_resources($barcode, $title);
            if($result1==true){
                $result2 = $this->library_resources_model->update_journal($barcode, $volume, $copy, $date_received, $issn, $subject);
                if($result2==true){
                    set_flash_alert('success', 'Updated Successfully!');
                    redirect('library_resources/journals');
                }else{
                    set_flash_alert('danger', 'Something went wrong. Try again later!');
                    redirect('library_resources/journals');
                }
            }
        } 
    }

    public function delete_journal($barcode){
        $result1 = $this->library_resources_model->delete_resources($barcode);
                if($result1==true){
                    $result2 = $this->library_resources_model->delete_thesis($barcode);
                    if($result2==true){
                        set_flash_alert('success', 'Deleted Successfully!');
                        redirect('library_resources/journals');
                    }else{
                        set_flash_alert('danger', 'Something went wrong. Try again later!');
                        redirect('library_resources/journals');
                    }
                }
    }

    public function test(){
        $result = $this->library_resources_model->get_last_resource_id();
        var_dump($result[0]);
    }
}


