<?php foreach($users as $user): ?>
<!-- Edit Modal Section Start -->
<div id="user<?=$user->id?>" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-close-area modal-close-df">
                                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                </div>
                                <div class="modal-header header-color-modal bg-color-3">
                                    <h4 class="modal-title">Update User</h4>
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                </div>
                                <form id="update_form" method="post" name="userform" enctype="multipart/form-data" action="<?=site_url('users/edit_user/'.$user->id)?>">
                                    <div class="modal-body">
                                        <div class="col-lg-12 cold-md-12 col-sm-12 col-xs-12">


                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    
                                                        <div class="cold-lg-5 col-md-5 col-sm-5">
                                                            <input type="hidden" id="id_u" name="id" class="form-control" value="<?=$user->id?>" required>
                                                            <label >Profile Image</label>
                                                            <div class="form-group card-image pic-holder">
                                                                <input type="hidden" name="oldpic" value="<?=$user->profile_img?>"/>
                                                                <img id="previewImg<?=$user->id?>" src="<?=base_url('tools/img/profile/'.$user->profile_img)?>"  >
                                                                <!-- <img id="profilePic" class="pic" src="<?//=base_url('tools/img/profile/'.$user->profile_img)?>"/> -->
                                                                <label for="newProfilePhoto" id="uploadBtn" class="upload-file-block">
                                                                <div class="text-center">
                                                                    <i class="fa fa-camera fa-2x"></i> Update <br /> Profile Picture
                                                                </div>
                                                                </label>
                                                                <input class="ProfileInput" type="file" name="profileimg" id="newProfilePhoto" user_id="<?=$user->id?>" onchange="previewFile(this);" />
                                                                <!-- <input class="ProfileInput" type="file" name="profileimg" id="newProfilePhoto"/> -->
                                                            </div>
                                                        </div>
                                                        
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <!-- <?php// echo display_error(); ?> -->
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
                                                            <label>Email</label>
                                                            <input type="email" name="email" class="form-control" placeholder="Email" value="<?=$user->email?>" disabled>
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
                                                    <div class="form-group">
                                                        <label>User Type</label>
                                                        <select name="user_type" style="color: #9b9b9b;" class="form-control">
                                                            <option value="none" selected="" disabled="">Select User Type</option>
                                                            <option <?php if($user->user_type == 'Admin'){echo("selected");}?> value="Admin">Admin</option>
                                                            <option <?php if($user->user_type == 'User'){echo("selected");}?> value="User">User</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="Primary btn btn-custon-rounded-two btn-danger" data-dismiss="modal" href="#">Cancel</button>
                                        <input class="Primary mg-b-10 btn btn-custon-rounded-two btn-success" type="submit" href="#" name="editProfile" value="Update" >
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                    <!-- edit modal Section end -->

                    <script>
                        function previewFile(input){
                            var file = $("input[type=file]").get(0).files[0];
                            var id = $("input[type=file]").attr('user_id');
                            alert(id);
                            if(file){
                                var reader = new FileReader();
                                reader.onload = function(){
                                    $("#previewImg").attr("src", reader.result);
                                }
                                reader.readAsDataURL(file);
                            }
                        }
                    </script>
<?php endforeach ?>