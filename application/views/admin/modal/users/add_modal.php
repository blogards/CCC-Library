<!-- Add Modal Section Start -->
<div id="PrimaryModalalert" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-close-area modal-close-df">
                                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                    </div>
                                    <div class="modal-header header-color-modal bg-color-3">
                                        <h4 class="modal-title">Add New User</h4>
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
                                    <form id="update_form" method="post" name="userform" enctype="multipart/form-data" action="<?=site_url('users/add_user');?>">
                                      <div class="modal-body">
                                        <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                          
                                          </div> -->
                                        <div class="col-lg-6 col-md-6 col-sm6 col-xs-12">
                                        <div class="form-group">
                                                <label >First Name</label>
                                                <input name="first_name" type="text" class="form-control" placeholder="First name" required>
                                            </div>
                                            <div class="form-group">
                                              <label >Middle Name</label>
                                              <input name="middle_name" type="text" class="form-control" placeholder="Middle name" required>
                                            </div>
                                            <div class="form-group">
                                              <label >Last Name</label>
                                              <input name="last_name" type="text" class="form-control" placeholder="Last name" required>
                                            </div>
                                            <div class="form-group">
                                                <label >Course</label>
                                                <select name="course" class="form-control" placeholder="Course" required>
                                                    <option></option>
                                                    <option value="BSIS">BSIS</option>
                                                    <option value="BSHRM">BSHRM</option>
                                                    <option value="BSTM">BSTM</option>
                                                    <option value="BEEd">BEEd</option>
                                                    <option value="BSEd (Math)">BSEd (Math)</option>
                                                    <option value="BSEd (Science)">BSEd (Science)</option>
                                                    <option value="BLIS">BLIS</option>
                                                    <option value="n/a" >Not Applicable</option>
                                                </select>
                                              </div>
                                            <div class="form-group">
                                              <label >Year Level</label>
                                              <select class="form-control" name="year_level" placeholder="Year level" required>
                                                  <option></option>
                                                  <option value="1st Year" >1st Year</option>
                                                  <option value="2nd Year" >2nd Year</option>
                                                  <option value="3rd Year" >3rd Year</option>
                                                  <option value="4th Year" >4th Year</option>
                                                  <option value="n/a" >Not Applicable</option>
                                              </select>
                                            </div>
                                            <div class="form-group">
                                              <label >Contact</label>
                                              <input name="contact" type="text" class="form-control" placeholder="Contact" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 cold-md-6 col-sm12 col-xs-12">
                                            <div class="form-group">
                                              <label >Street</label>
                                              <input name="street" type="text" class="form-control" placeholder="Street" >
                                            </div>
                                            <div class="form-group">
                                              <label >Barangay</label>
                                              <input name="barangay" type="text" class="form-control" placeholder="Barangay">
                                            </div>
                                            <div class="form-group">
                                              <label >City / Municipality</label>
                                              <input name="city" type="text" class="form-control" placeholder="City or Municipality">
                                            </div>
                                            <div class="form-group">
                                              <label >Province</label>
                                              <input name="province" type="text" class="form-control" placeholder="Province">
                                            </div>
                                            <div class="form-group">
                                              <label >Postal Code</label>
                                              <input name="postal_code" type="text" class="form-control" placeholder="Postal code">
                                            </div>
                                            <div class="form-group">
                                              <label >User Type</label>
                                              <select class="form-control" name="user_type" placeholder="User type" required>
                                              <option></option>
                                                  <option value="Library Staff" >Library Staff</option>
                                                  <option value="Teacher" >Teacher</option>
                                                  <option value="Student" >Student</option>
                                                  <option value="Guest" >Guest</option>
                                              </select>
                                              
                                            </div>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                          <button class="Primary btn btn-custon-rounded-two btn-danger" data-dismiss="modal" href="#">Cancel</button>
                                          <button class="Primary mg-b-10 btn btn-custon-rounded-two btn-success" type="submit" href="#" name="add_books_btn">Add Book</a>
                                      </div>
                                    </form>
                                </div>
                            </div>
                      </div>
                    <!-- Add Modal Section end -->