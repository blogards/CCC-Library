<?php 
class Login_model extends CI_Model
{

    //  ********      Login     ********    //
	
	public function login($email, $pass){

        $query = $this->db->select('*')
						->from('users u')
						->join('borrowers b', 'b.id = u.id', 'left')
						->where('email', $email)
						->get();

		if($query->num_rows()>0){
			foreach($query->result() as $row){
				if($row->user_type == 'Admin' || $row->user_type == 'Library Staff'){
					$_pass = $this->encrypt->decode($row->password);
					if($pass == $_pass || $this->encrypt->encode($_pass) == $row->password){
						if($pass == 123456){
							$user = array(
								'id' => $row->id,
								'first_name' =>  $row->first_name,
								'last_name' =>  $row->last_name,
								'profile_img' =>  $row->profile_img,
								'user_type' => 'Admin'
							);
							$data= $this->session->set_userdata($user);
							return 'change_pass';
						}else{
							$user = array(
								'id' => $row->id,
								'first_name' =>  $row->first_name,
								'last_name' =>  $row->last_name,
								'profile_img' =>  $row->profile_img,
								'user_type' => 'Admin'
							);
							$data= $this->session->set_userdata($user);
							return 'admin';
						}

					}else{
						return 'Wrong Password';
					}
				}


                else if($row->user_type == 'Library Staff'){
					$_pass = $this->encrypt->decode($row->password);
					if($pass == $_pass || $this->encrypt->encode($_pass) == $row->password){
						if($pass == 123456){
							$user = array(
								'id' => $row->id,
								'first_name' =>  $row->first_name,
								'last_name' =>  $row->last_name,
								'profile_img' =>  $row->profile_img,
								'user_type' => 'Library Staff'
							);
							$data= $this->session->set_userdata($user);
							return 'change_pass';
						}else{
								$user = array(
									'id' => $row->id,
									'first_name' =>  $row->first_name,
									'last_name' =>  $row->last_name,
									'profile_img' =>  $row->profile_img,
									'user_type' => 'Library Staff'
								);
								$data= $this->session->set_userdata($user);
								return 'admin';
						}
						
					}else{
						return 'Wrong Password';
					}
				}
            

                else if($row->user_type == 'Teacher'){

					$_pass = $this->encrypt->decode($row->password);
					if($pass == $_pass || $this->encrypt->encode($_pass) == $row->password){
						if($pass == 123456){
							$user = array(
								'id' => $row->id,
								'first_name' =>  $row->first_name,
								'last_name' =>  $row->last_name,
								'profile_img' =>  $row->profile_img,
								'user_id' => $row->id,
								'user_type' => 'Teacher',
								'user_status' => $row->status,
							);
							$data= $this->session->set_userdata($user);
							return 'change_pass';
						}else{
							$user = array(
								'id' => $row->id,
								'first_name' =>  $row->first_name,
								'last_name' =>  $row->last_name,
								'profile_img' =>  $row->profile_img,
								'user_id' => $row->id,
								'user_type' => 'Teacher',
								'user_status' => $row->status,
							);
							$data= $this->session->set_userdata($user);
							return 'user';
						}
					}else{
						return 'Wrong Password';
					}
				}

                else if($row->user_type == 'Student' || $row->user_type == 'Teacher' || $row->user_type == 'Non-Teaching Staff'){

					$_pass = $this->encrypt->decode($row->password);
					if($pass == $_pass || $this->encrypt->encode($_pass) == $row->password){
						if($pass == 123456){
							$user = array(
								'id' => $row->id,
								'first_name' =>  $row->first_name,
								'last_name' =>  $row->last_name,
								'profile_img' =>  $row->profile_img,
								'user_id' => $row->id,
								'user_type' => 'Student',
								'user_status' => $row->status,
							);
							$data= $this->session->set_userdata($user);
							return 'change_pass';
						}else{
							$user = array(
								'id' => $row->id,
								'first_name' =>  $row->first_name,
								'last_name' =>  $row->last_name,
								'profile_img' =>  $row->profile_img,
								'user_id' => $row->id,
								'user_type' => 'Student',
								'user_status' => $row->status,
							);
							$data= $this->session->set_userdata($user);
							return 'user';
						}
					}else{
						return 'Wrong Password';
					}
				}

				else if($row->user_type == 'Non-Teaching Staff'){

					$_pass = $this->encrypt->decode($row->password);
					if($pass == $_pass || $this->encrypt->encode($_pass) == $row->password){
						if($pass == 123456){
							$user = array(
								'id' => $row->id,
								'first_name' =>  $row->first_name,
								'last_name' =>  $row->last_name,
								'profile_img' =>  $row->profile_img,
								'user_id' => $row->id,
								'user_type' => 'Non-Teaching Staff',
								'user_status' => $row->status,
							);
							$data= $this->session->set_userdata($user);
							return 'change_pass';
						}else{
							$user = array(
								'id' => $row->id,
								'first_name' =>  $row->first_name,
								'last_name' =>  $row->last_name,
								'profile_img' =>  $row->profile_img,
								'user_id' => $row->id,
								'user_type' => 'Non-Teaching Staff',
								'user_status' => $row->status,
							);
							$data= $this->session->set_userdata($user);
							return 'user';
						}
					}else{
						return 'Wrong Password';
					}
				}
			}
		}else{
			return ' ';
		}
	}

	public function check_account($user, $password){
		$query = $this->db->select('*')
						->select('u.id as id')
						->from('users u')
						->join('borrowers b', 'b.id = u.id', 'left')
						->where('u.id', $user)
						// ->or_where('b.id_no', $email)
						->get();

		if($query->num_rows()>0){
			// foreach($query->result() as $row){
			// 	$id = $row->id;
				$change = $this->db->set('password', $password)
									->where('id', $user)
									->update('users');
				if($change){
					return true;
				}
			// }
		}else{
			return 'not exist';
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
			'user_type' => ''
		);
		$this->session->unset_userdata($data);
		$this->session->sess_destroy();
		return true;
	}
	
	
	
}
?>
