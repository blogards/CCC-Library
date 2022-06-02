<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        <div class="text-center m-b-md custom-login">
                          <img src="<?=base_url('tools/img/CCC-logo.png')?>" height="150" width="150"/>
                        </div><br/>
                        <div class="text-center custom-login">
                          <h3>Create Library Account</h3>
                        </div><br/>

                        <?php flash_alert(); ?>
                        
                        <form method="post" action="<?=site_url('register/signup')?>">

                          
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label>I am a: </label>
                                    <select class="form-control" name="user_type" value="<?php echo set_value('user_type'); ?>" required >
                                        <option value="" disabled selected>---  ---</option>
                                        <option value="Student" > Student</option>
                                        <option value="Library Staff" > Library Staff</option>
                                        <option value="Teacher" > Teacher</option>
                                        <option value="Non-teaching" > Non - Teaching Staff</option>
                                    </select>  
                                                             
                                </div>
                                <div class="form-group col-lg-12">
                                    <hr />
                                 </div>
                                <div class="form-group col-lg-6">
                                    <label>First Name</label>
                                    <?=form_error('firstname'); ?>
                                    <input class="form-control" type="text" name="firstname" id="firstname" value="<?php echo set_value('firstname'); ?>" required/>
                                    
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Middle Name</label>
                                    <input class="form-control" type="text" name="middlename" id="middlename" value="<?php echo set_value('middlename'); ?>" >
                                    <?php echo form_error('middlename'); ?>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Last Name</label>
                                    <input class="form-control" type="text" name="lastname" id="lastname" value="<?php echo set_value('lastname'); ?>" required/>
                                    <?php echo form_error('lastname'); ?>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Email Address</label>
                                    <input type="email" name="email" id="email" class="form-control" value="<?php echo set_value('email'); ?>" required/>
                                    <?php echo form_error('email'); ?>
                                </div>
                                <div class="form-group col-lg-12">
                                    <label>Contact Number</label>
                                    <input class="form-control" type="text" name="contact" id="contact" value="<?php echo set_value('contact'); ?>" >
                                    <?php echo form_error('contact'); ?>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Password</label>
                                    <input type="password" name="password_1" class="form-control" value="<?php echo set_value('password_1'); ?>" required>
                                    <?php echo form_error('password_1'); ?>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Confirm Password</label>
                                    <input type="password" name="password_2" class="form-control" value="<?php echo set_value('password_2'); ?>" required>
                                    <?php echo form_error('password_2'); ?>
                                </div>
                            </div>
                            <div class="text-center">
                                <input class="btn btn-success btn-block" type="submit" name="register_btn" value="Register">
                                <div class="d-flex" style="display:flex;">
                                    <hr style="width:50%;"/><p style="margin:0 10px;">or</p><hr style="width:50%;"/>
                                </div>
                                <button class="btn btn-success btn-block loginbtn" onclick="location.href='<?=site_url('login')?>'">Login</button>
                            </div>
                            

                        </form>
                    </div>
                </div>
			</div>
			

    