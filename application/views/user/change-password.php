
<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">                                              
                            
                        <div class="text-center m-b-md custom-login">
                          <img src="<?=base_url('tools/img/CCC-logo.png')?>"/>
                        </div>

                        <br>
                        <?php flash_alert(); ?>

                        <form action="<?=site_url('ccc_lms/new_pass');?>" method="post" enctype="multipart/form-data">
                            <!-- <div class="form-group">
                                <label class="control-label" for="username">Email or ID no.</label>
                                <input type="text" placeholder="example@gmail.com" title="Please enter you email" required="" value="<?php //echo $email; ?>" name="email" id="email" class="form-control">
                                
                            </div> -->
                            <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" name="password_1" class="form-control" placeholder="******" value="<?php echo set_value('password_1'); ?>" required>
                                    <?php echo form_error('password_1'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" name="password_2" class="form-control" placeholder="******" value="<?php echo set_value('password_2'); ?>" required>
                                    <?php echo form_error('password_2'); ?>
                                </div>
                            
                            <input class="btn btn-success btn-block" type="submit" name="change_pass_btn" value="Change Password">
                            
                            <!-- <br /> -->
                            
                            <!-- <br/> -->
                            
                        </form>
                    </div>
                </div>
			</div>
			