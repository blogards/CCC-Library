<?php 
class Settings_model extends CI_Model
{

    //library resources				
	public function save_email($data){

        $query = $this->db->insert('email_setting', $data);
        if($query)
            return true;  
	}

    public function all_email_contents(){

        $get = $this->db->select('*')
                        ->from('email_setting')
                        ->get();

        return $get->result();
    }

    public function update_email($id, $data){

        $query = $this->db->where('id', $id)
                        ->update('email_setting', $data);

        if($query)
            return true;
    }

    public function delete_email($id){
        $del = $this->db->where('id', $id)
                        ->delete('email_setting');
        if($del){
            return true;
        }
    }
    public function get_email_contents($code){

        $get = $this->db->select('*')
                        ->where('code', $code)
                        ->from('email_setting')
                        ->get();

        return $get->result();
    }


    

}
?>
