<?php 
class Library_resources_model extends CI_Model
{

    //  ********      Books     ********    //	

	public function books(){
       
        $query =$this->db->select('*')
                        ->from('library-resources l')
                        ->join('books b', 'b.barcode = l.barcode')
                        ->order_by('l.title')
                        ->get();
        
		return $query->result();
	}

    public function add_books($barcode, $edition, $volume, $author, $publisher, $class, $pages, $remarks, $date_received, $year, $cash_price, $sof, $type, $soft_copy){
        
        $data=array(
            'barcode'       =>  $barcode,
            'edition'       =>  $edition,
            'volume'        =>  $volume,
            'author'        =>  $author,
            'publisher'     =>  $publisher,
            'class'         =>  $class,
            'pages'         =>  $pages,
            'remarks'       =>  $remarks,
            'date_received' =>  $date_received,
            'year'          =>  $year,
            'cash_price'    =>  $cash_price,
            'sof'           =>  $sof,
            'type'          =>  $type,
            'soft_copy'      =>  $soft_copy,
        );
        $query = $this->db->insert('books', $data);
        if($query)
            return true;

    }

    public function import_books($barcode, $edition, $volume, $author, $publisher, $class, $pages, $remarks, $date_received, $year, $cash_price, $sof, $type, $soft_copy){
        
        $data=array(
            'barcode'       =>  $barcode,
            'edition'       =>  $edition,
            'volume'        =>  $volume,
            'author'        =>  $author,
            'publisher'     =>  $publisher,
            'class'         =>  $class,
            'pages'         =>  $pages,
            'remarks'       =>  $remarks,
            'date_received' =>  $date_received,
            'year'          =>  $year,
            'cash_price'    =>  $cash_price,
            'sof'           =>  $sof,
            'type'          =>  $type,
            'soft_copy'      =>  $soft_copy,
        );
        $query = $this->db->insert('books', $data);
        if($query)
            return true;

    }

    
    
    public function insertRecord($record){
            $data = array(
              
              "barcode"       =>  trim($record[0]),
              "edition"       =>  trim($record[2]),
              "volume"        =>  trim($record[3]),
              "author"        =>  trim($record[4]),
              "publisher"     =>  trim($record[5]),
              "class"         =>  trim($record[6]),
              "pages"         =>  trim($record[7]),
              "remarks"       =>  trim($record[8]),
              "date_received" =>  trim($record[9]),
              "year"          =>  trim($record[10]),
              "cash_price"    =>  trim($record[11]),
              "sof"           =>  trim($record[12]),
              "type"          =>  trim($record[13]),
            );
    
            $query = $this->db->insert('books', $data);
            if($query)
                return true;
    }

    public function update_books($barcode, $edition, $volume, $author, $publisher, $class, $pages, $remarks, $date_received, $year, $cash_price, $sof){
        
        $data=array(
            'barcode' => $barcode,
            'edition' =>$edition,
            'volume' =>$volume,
            'author' => $author,
            'publisher' =>$publisher,
            'class' =>$class,
            'pages' => $pages,
            'remarks' =>$remarks,
            'date_received' =>$date_received,
            'year' => $year,
            'cash_price' =>$cash_price,
            'sof' =>$sof,
        );
        $query = $this->db->where('barcode',$barcode)
                          ->update('books', $data);
        if($query)
            return true;

    }

    public function update_author($author_id, $barcode){

        $data=array(
            //'barcode'   => $barcode,
            'author'    => $author_id,
            
        );
        $query = $this->db->where('barcode', $barcode)
                        ->update('books', $data);
        if($query)
            return true;          
    }

    public function delete_books($barcode){
        $del = $this->db->where('barcode', $barcode)
                        ->delete('books');
        if($del){
            return true;
        }
    }

    public function status($barcode, $data){
        $query = $this->db->where('barcode',$barcode)
                        ->update('library-resources', $data);
        if($query){
            return true;
        }
            
    }

    //  ********      Resources     ********    //

    public function add_resources($barcode, $title, $category){
       
        $data=array(
            'barcode'   => $barcode,
            'title'     => $title,
            'category'  => $category,
        );
        $query = $this->db->insert('library-resources', $data);
        if($query)
            return true;          
    }

    public function importResources($record, $category){
        $data = array(
          
          "barcode"       =>  trim($record[0]),
          "title"       =>  trim($record[1]),
          'category'  => $category,
        );

        $query = $this->db->insert('library-resources', $data);
        if($query)
            return true;
    }
    

    public function update_resources($barcode, $title){
       
        $data=array(
            'barcode' => $barcode,
            'title' =>$title,
        );
        $query = $this->db->where('barcode',$barcode)
                        ->update('library-resources', $data);
        if($query)
            return true;       
    }

    public function update_resource_status($id, $stats){
        $data=array(
            'id' => $id,
            'status' =>$stats,
        );
        $query = $this->db->where('id',$id)
                        ->update('library-resources', $data);
        if($query)
            return true;
    }


    public function delete_resources($barcode){
        $del = $this->db->where('barcode', $barcode)
                        ->delete('library-resources');
        if($del){
            return true;
        }
    }

    public function get_last_resource_id(){
        $get = $this->db->select('id')
                        ->from('library-resources')
                        ->limit(1)
                        ->order_by('id desc')
                        ->get();

        return $get->result();

    }



    //  ********      Audio Visuals     ********    //

    public function audio_visuals(){
        $query =$this->db->select('*')
                        ->from('library-resources l')
                        ->join('audio-visual a', 'a.barcode = l.barcode')
                        ->order_by('l.barcode asc')
                        ->get();
		return $query->result(); 
    }

    public function count_all_audio_visual(){
        $query = $this->db->select('*')
                ->from('audio-visual')
                ->get();
        return  $query->num_rows();; 
    }

    public function add_audio_visual($barcode, $grade_level, $subject, $duration, $copyright, $date_received){
        $data=array(
            'barcode'       =>  $barcode,
            'grade_level'   =>  $grade_level,
            'subject'       =>  $subject,
            'duration'      =>  $duration,
            'copyright'     =>  $copyright,
            'date_received' =>  $date_received,
        );
        $query = $this->db->insert('audio-visual', $data);
        if($query)
            return true;          
    }

    public function update_audio_visual($barcode, $grade_level, $subject, $duration, $copyright, $date_received){

        $data=array(
            'barcode' => $barcode,
            'grade_level' =>$grade_level,
            'subject' =>$subject,
            'duration' =>$duration,
            'copyright' =>$copyright,
            'date_received' =>$date_received,
        );
        $query = $this->db->where('barcode',$barcode)
                            ->update('audio-visual', $data);
        if($query)
            return true;          
    }

    public function importAVM($record){
        $data = array(

            'barcode' => trim($record[0]),
            'grade_level'  => trim($record[2]),
            'subject'   => trim($record[3]),
            'duration'     => trim($record[4]),
            'copyright'     => trim($record[5]),
            'date_received'     => trim($record[6]),
        );

        $query = $this->db->insert('audio-visual', $data);
        if($query){
            return true;
        }
            
    }

    public function delete_audio_visual($barcode){
        $del = $this->db->where('barcode', $barcode)
                        ->delete('audio-visual');
        if($del){
            return true;
        }
    }


    //  ********      Manuscript     ********    //

    
    public function all_manuscript(){
        $query =$this->db->select('*')
                        ->from('library-resources l')
                        ->join('manuscript m', 'm.barcode = l.barcode')
                        ->order_by('l.barcode asc')
                        ->get();
		return $query->result(); 
    }

    public function count_all_manuscript(){
        $query = $this->db->select('*')
                ->from('manuscript')
                ->get();
        return  $query->num_rows();; 
    }

    public function add_manuscript($barcode, $author, $course, $year){
       
        $data=array(
            'barcode' => $barcode,
            'author'   => $author,
            'course'  => $course,
            'year'    => $year,
        );
        $query = $this->db->insert('manuscript', $data);
        if($query)
            return true;          
    }

    public function importManuscript($record){
        $data = array(

            'barcode'  => trim($record[0]),
            'author'   => trim($record[2]),
            'course'     => trim($record[3]),
            'year'     => trim($record[4]),
        );

        $query = $this->db->insert('manuscript', $data);
        if($query)
            return true;
    }

    public function update_manuscript($barcode, $author, $course, $year){

        $data=array(
            'barcode' => $barcode,
            'author'   => $author,
            'course'  => $course,
            'year'    => $year,
        );
        $query = $this->db->where('barcode',$barcode)
                            ->update('manuscript', $data);
        if($query)
            return true;          
    }

    public function delete_manuscript($barcode){
        $del = $this->db->where('barcode', $barcode)
                        ->delete('manuscript');
        if($del){
            return true;
        }
    }

    //  ********      Government Publication     ********    //

    public function all_publications(){
        $query =$this->db->select('*')
                        ->from('library-resources l')
                        ->join('publications p', 'p.barcode = l.barcode')
                        ->order_by('l.barcode asc')
                        ->get();
		return $query->result(); 
    }

    public function count_all_publication(){
        $query = $this->db->select('*')
                ->from('publications')
                ->get();
        return  $query->num_rows();; 
    }

    public function add_publication($barcode, $volume, $copy, $date_received, $issn, $subject){
        $data=array(
            'barcode'  => $barcode,
            'volume'   => $volume,
            'copy'     => $copy,
            'date'     => $date_received,
            'issn'     => $issn,
            'subject'  => $subject,
        );
        $query = $this->db->insert('publications', $data);
        if($query)
            return true;          
    }

    public function importPub($record){
        $data = array(

            'barcode'  => trim($record[0]),
            'volume'   => trim($record[2]),
            'copy'     => trim($record[3]),
            'date'     => trim($record[4]),
            'issn'     => trim($record[5]),
            'subject'  => trim($record[6]),
        );

        $query = $this->db->insert('publications', $data);
        if($query)
            return true;
    }

    public function update_publication($barcode, $volume, $copy, $date_received, $issn, $subject){

        $data=array(
            'barcode'  => $barcode,
            'volume'   => $volume,
            'copy'     => $copy,
            'date'     => $date_received,
            'issn'     => $issn,
            'subject'  => $subject,
        );
        $query = $this->db->where('barcode',$barcode)
                            ->update('publications', $data);
        if($query)
            return true;          
    }

    public function delete_publication($barcode){
        $del = $this->db->where('barcode', $barcode)
                        ->delete('publications');
        if($del){
            return true;
        }
    }


    //  ********      Thesis and Disertation     ********    //

    public function all_thesis(){

        $query =$this->db->select('*')
                        ->from('library-resources l')
                        ->join('thesis t', 't.barcode = l.barcode')
                        ->order_by('l.barcode asc')
                        ->get();
		return $query->result(); 
    }

    public function count_all_thesis(){
        $query = $this->db->select('*')
                ->from('thesis')
                ->get();
        return  $query->num_rows();; 
    }

    public function add_thesis($barcode, $author, $year){
        $data=array(
            'barcode'  => $barcode,
            'author'   => $author,
            'year'     => $year,
        );
        $query = $this->db->insert('thesis', $data);
        if($query)
            return true;          
    }

    public function importThesis($record){
        $data = array(

            'barcode'  => trim($record[0]),
            'author'   => trim($record[2]),
            'year'     => trim($record[3]),
        );

        $query = $this->db->insert('thesis', $data);
        if($query)
            return true;
    }

    public function update_thesis($barcode, $author, $year){

        $data=array(
            'barcode'  => $barcode,
            'author'   => $author,
            'year'     => $year,
        );
        $query = $this->db->where('barcode',$barcode)
                            ->update('thesis', $data);
        if($query)
            return true;          
    }

    public function delete_thesis($barcode){
        $del = $this->db->where('barcode', $barcode)
                        ->delete('thesis');
        if($del){
            return true;
        }
    }

    //  ********      Journals     ********    //

    public function all_journal(){

        $query =$this->db->select('*')
                        ->from('library-resources l')
                        ->join('journals j', 'j.barcode = l.barcode')
                        ->order_by('l.barcode asc')
                        ->get();
		return $query->result(); 
    }

    public function count_all_journal(){

        $query = $this->db->select('*')
                ->from('journals')
                ->get();
        return  $query->num_rows();; 
    }

    public function add_journal($barcode, $volume, $copy, $date_received, $issn, $subject){

        $data=array(
            'barcode'   => $barcode,
            'volume'    => $volume,
            'copy'      => $copy,
            'date'      => $date_received,
            'issn'      => $issn,
            'subject'   => $subject,
        );
        $query = $this->db->insert('journals', $data);
        if($query)
            return true;          
    }

    public function importJournal($record){
        $data = array(

            'barcode'  => trim($record[0]),
            'volume'   => trim($record[2]),
            'copy'     => trim($record[3]),
            'date'     => trim($record[4]),
            'issn'     => trim($record[5]),
            'subject'     => trim($record[6]),
        );

        $query = $this->db->insert('journals', $data);
        if($query){
            return true;
        }
    }

    public function update_journal($barcode, $volume, $copy, $date_received, $issn, $subject){

        $data=array(
            'barcode'   => $barcode,
            'volume'    => $volume,
            'copy'      => $copy,
            'date'      => $date_received,
            'issn'      => $issn,
            'subject'   => $subject,
        );
        $query = $this->db->where('barcode',$barcode)
                            ->update('journals', $data);
        if($query)
            return true;          
    }

    public function delete_journal($barcode){
        $del = $this->db->where('barcode', $barcode)
                        ->delete('journals');
        if($del){
            return true;
        }
    }

    //  ********      Author     ********    //

    public function add_author($resource_id, $author_first_name, $author_middle_name, $author_last_name){

        $data=array(
            'resources_id'   => $resource_id,
            'first_name'    => $author_first_name,
            'middle_name'      => $author_middle_name,
            'last_name'      => $author_last_name,
        );
        $query = $this->db->insert('author', $data);
        if($query)
            return true;          
    }

    public function get_last_author_id(){
        $get = $this->db->select('id')
                        ->from('author')
                        ->limit(1)
                        ->order_by('id desc')
                        ->get();

        return $get->result();

    }


    //  ********      Count Library Resources per Status     ********    //

    public function count_available_resources(){
        return $this->db->select('*')
                        ->from('library-resources')
                        ->or_where('status', 'Available')
                        ->count_all_results();
    }

    public function count_not_available_resources(){
        return $this->db->select('*')
                        ->from('library-resources')
                        ->where('status', 'Reserved')
                        ->or_where('status', 'Borrowed')
                        ->or_where('status', 'Not Available')
                        ->count_all_results();
    }

    public function count_damage_resources(){
        return $this->db->select('*')
                        ->from('library-resources')
                        ->or_where('status', 'Damage')
                        ->count_all_results();
    }

    public function count_archive_resources(){
        return $this->db->select('*')
                        ->from('library-resources')
                        ->or_where('status', 'Archive')
                        ->count_all_results();
    }

    //  ********      Count Library Resources per Type     ********    //

    public function count_all_avm(){
        return $this->db->select('*')
                        ->from('library-resources')
                        ->where('category', 'Audio Visual Material')
                        ->count_all_results();
    }

    public function count_all_books(){
        return $this->db->select('*')
                        ->from('library-resources')
                        ->where('category', 'Books')
                        ->count_all_results();
    }

    
    public function count_all_gov_pub(){
        return $this->db->select('*')
                        ->from('library-resources')
                        ->where('category', 'Government Publications')
                        ->count_all_results();
    }

    public function count_all_journals(){
        return $this->db->select('*')
                        ->from('library-resources')
                        ->where('category', 'Journals')
                        ->count_all_results();
    }

    public function count_all_manuscripts(){
        return $this->db->select('*')
                        ->from('library-resources')
                        ->where('category', 'Manuscript')
                        ->count_all_results();
    }

    public function count_all_disertation(){
        return $this->db->select('*')
                        ->from('library-resources')
                        ->where('category', 'Thesis/Dissertation')
                        ->count_all_results();
    }
    


    //  ********      Count Users per Type     ********    //

    public function count_all_users(){
        return $this->db->select('*')
                        ->from('users')
                        ->where('user_type', 'Student')
                        ->count_all_results();
    }

    public function count_all_staffs(){
        return $this->db->select('*')
                        ->from('users')
                        ->where('user_type', 'Library Staff')
                        ->count_all_results();
    }

    public function count_all_teachers(){
        return $this->db->select('*')
                        ->from('users')
                        ->where('user_type', 'Teacher')
                        ->count_all_results();
    }

    public function count_all_guest(){
        return $this->db->select('*')
                        ->from('users')
                        ->where('user_type', 'Guest')
                        ->count_all_results();
    }

    
}


?>
