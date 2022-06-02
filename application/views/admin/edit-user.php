<?php foreach($users as $user): ?>

    <!-- Single pro tab review Start-->
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <!-- ROW Start -->
                            <div class="row">
                                <form id="update_form" method="post" name="userform" enctype="multipart/form-data" action="<?=site_url('users/edit_user/'.$user->id)?>">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    
                                                        <div class="cold-lg-5 col-md-5 col-sm-5">
                                                            <input type="hidden" id="id_u" name="id" class="form-control" value="<?=$user->id?>" required>
                                                            <label >Profile Image</label>
                                                            <div class="form-group card-image pic-holder">
                                                                <input type="hidden" name="oldpic" value="<?=$user->profile_img?>"/>
                                                                <!-- <img id="previewImg<?=$user->id?>" src="<?=base_url('tools/img/profile/'.$user->profile_img)?>"  > -->
                                                                <img id="profilePic" class="pic" src="<?=base_url('tools/img/profile/'.$user->profile_img)?>"/>
                                                                <label for="newProfilePhoto" id="uploadBtn" class="upload-file-block">
                                                                <div class="text-center">
                                                                    <i class="fa fa-camera fa-2x"></i> Update <br /> Profile Picture
                                                                </div>
                                                                </label>
                                                                <input class="ProfileInput" type="file" name="profileimg" id="newProfilePhoto" user_id="<?=$user->id?>" />
                                                                <!-- <input class="ProfileInput" type="file" name="profileimg" id="newProfilePhoto"/> -->
                                                            </div>
                                                        </div>

                                                        <div class="cold-lg-5 col-md-5 col-sm-5" style="margin-left:1.5rem;">
                                                            <div class="form-group">
                                                                <label>Email</label>
                                                                <input type="email" name="email" class="form-control" placeholder="Email" value="<?=$user->email?>" <?php if($this->session->userdata('user_type') != 'Admin'){echo("disabled");}?> >
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Password</label>
                                                                <input type="password" name="password_1" id="password_1" class="form-control" placeholder="*********" value="" <?php if($this->session->userdata('user_type') != 'Admin'){echo("disabled");}?> >
                                                            </div>
                                                            <div class="form-group">
                                                                <label>User Type</label>
                                                                <select name="user_type" style="color: #9b9b9b;" class="form-control">
                                                                    <option value="none" selected="" disabled="">Select User Type</option>
                                                                    <option <?php if($user->user_type == 'Admin'){echo("selected");}?> value="Admin">Admin</option>
                                                                    <option <?php if($user->user_type == 'Student'){echo("selected");}?> value="Student">Student</option>
                                                                    <option <?php if($user->user_type == 'Library Staff'){echo("selected");}?> value="Library Staff" > Library Staff</option>
                                                                    <option <?php if($user->user_type == 'Teacher'){echo("selected");}?> value="Teacher" > Teacher</option>
                                                                    <option <?php if($user->user_type == 'Non-teaching'){echo("selected");}?> value="Non-teaching" > Non - Teaching Staff</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <!-- <?php// echo display_error(); ?> -->
                                                        <div class="form-group">
                                                            <label >ID No.</label>
                                                            <input name="id_no" type="text" class="form-control" placeholder="ID No." value="<?=$user->id_no?>">
                                                        </div>

                                                        <div class="form-group">
                                                            <label >First Name</label>
                                                            <input name="firstname" type="text" class="form-control" placeholder="First Name" value="<?=$user->first_name?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Middle Name</label>
                                                            <input name="middlename" type="text" class="form-control" placeholder="Middle Name" value="<?=$user->middle_name?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Last Name</label>
                                                            <input name="lastname" type="text" class="form-control" placeholder="Last Name" value="<?=$user->last_name?>">
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label>Contact Number</label>
                                                            <input name="contact" type="text" class="form-control" placeholder="Mobile no." value="<?=$user->contact?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group" id='datetimepicker1'>
                                                        <label>Course</label>
                                                        <input name="course" id="course" type="text" class="form-control" placeholder="Course" value="<?=$user->course?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Year Level</label>   
                                                            <select name="year_level" style="color: #9b9b9b;" class="form-control">
                                                                <option value="none" selected="" disabled="">Select Year Level</option>
                                                                <option <?php if($user->year_level == '1st Year'){echo("selected");}?> value="1st Year">1st Year</option>
                                                                <option <?php if($user->year_level == '2nd Year'){echo("selected");}?> value="2nd Year">2nd Year</option>
                                                                <option <?php if($user->year_level == '3rd Year'){echo("selected");}?> value="3rd Year">3rd Year</option>
                                                                <option <?php if($user->year_level == '4th Year'){echo("selected");}?> value="4th Year">4th Year</option>
                                                            </select>
                                                    </div>
                                                    <div class="form-group" id='datetimepicker1'>
                                                        <label>Section</label>
                                                        <input name="section" id="section" type="text" class="form-control" placeholder="Section" value="<?=$user->section?>" <?php if($user->user_type != 'Student'){echo("disabled");}?>>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Street</label>
                                                        <input name="street" type="text" class="form-control" placeholder="Street" value="<?=$user->street?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Barangay</label>
                                                        <input name="barangay" type="text" class="form-control" placeholder="Barangay" value="<?=$user->barangay?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>City/Municipality</label>
                                                        <input name="city" type="text" class="form-control" placeholder="City" value="<?=$user->city?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Province</label>
                                                        <input name="province" type="text" class="form-control" placeholder="Province" value="<?=$user->province?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Postal Code</label>
                                                        <input name="postal_code" type="text" class="form-control" placeholder="Postal Code" value="<?=$user->postal_code?>">
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                        <!-- <button class="Primary btn btn-custon-rounded-two btn-danger" data-dismiss="modal" href="#">Cancel</button> -->
                                        <input class="Primary mg-b-10 btn btn-custon-rounded-two btn-success" type="submit" href="#" name="editProfile" value="Update" >
                                    </div>
                                    </div>
                                </form>
                            </div>
                            <!-- ROW end --> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php endforeach ?>