
<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">                                              
                            
                        <div class="text-center m-b-md custom-login">
                          <img src="<?=base_url('tools/img/CCC-logo.png')?>"/>
                        </div>

                        <?php flash_alert(); ?>

                        <form action="<?=site_url('login/signin');?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label class="control-label" for="username">Email</label>
                                <input type="text" placeholder="example@gmail.com" title="Please enter you email" required="" value="" name="email" id="email" class="form-control">
                                
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control">
                            </div>
                            
                            <input class="btn btn-success btn-block loginbtn" type="submit" name="login_btn" value="Login">
                            
                            <!-- <br /> -->
                            
                            <!-- <br/> -->
                            <!-- <button class="btn btn-success btn-block" onclick="location.href='<?//=site_url('register');?>'">Register</button> -->
                            
                            <div class="d-flex" style="display:flex;">
                              <hr style="width:50%;"/><p style="margin:0 10px;">or</p><hr style="width:50%;"/>
                            </div>
                            <button class="btn btn-success btn-block loginbtn" onclick="location.href='<?=site_url('guest');?>'" type="button" name="guest_btn" style="background-color: #6d6d6d; border-style: none; border: 1px solid #6d6d6d">Login as a Guest</button>
                        </form>
                    </div>
                </div>
			</div>
			