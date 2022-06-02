<?php 
if($this->session->userdata('user_status') == "Pending") {
  echo '
      <div class="alert alert-danger alert-dismissible show" role="alert">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          Your account is not yet verified. 
						Please make sure to complete your account/profile details for faster account verification. 
						Thank you!
      </div>';
}
?>