<!-- Add Modal Section Start -->
<div id="PrimaryModalalert" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-close-area modal-close-df">
                                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                    </div>
                                    <div class="modal-header header-color-modal bg-color-3">
                                        <h4 class="modal-title">Add New Book</h4>
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
                                    <form id="update_form" method="post" name="userform" enctype="multipart/form-data" action="<?=site_url('library_resources/add_books');?>">
                                      <div class="modal-body">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                          <div class="form-group">
                                                <label >Barcode</label>
                                                <input name="barcode" type="text" class="form-control" placeholder="Barcode" required>
                                              </div>
                                          </div>
                                        <div class="col-lg-6 col-md-6 col-sm6 col-xs-12">
                                            <div class="form-group">
                                              <label >Title</label>
                                              <input name="title" type="text" class="form-control" placeholder="Title" required>
                                            </div>
                                            <div class="form-group">
                                              <label >Edition</label>
                                              <input name="edition" type="text" class="form-control" placeholder="Edition">
                                            </div>
                                            <div class="form-group">
                                              <label >Volume</label>
                                              <input name="volume" type="text" class="form-control" placeholder="Volume">
                                            </div>
                                            
                                            <div class="form-group">
                                              <label >Publisher</label>
                                              <input name="publisher" type="text" class="form-control" placeholder="Publisher" >
                                            </div>
                                            <div class="form-group">
                                              <label >Class</label>
                                              <input name="class" type="text" class="form-control" placeholder="Class" >
                                            </div>
                                            
                                            <div class="form-group" id="date">
                                                <label>Date Received</label>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    <input type="date" name="date_received" class="form-control" value="" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                              <label >Year</label>
                                              <input name="year" type="text" class="form-control" placeholder="Year">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 cold-md-6 col-sm12 col-xs-12">
                                        <div class="form-group">
                                              <label >Type</label>
                                              <input name="type" type="text" class="form-control" placeholder="Type/Genre">
                                            </div>
                                            <div class="form-group">
                                              <label >Author</label>
                                              <input name="author" type="text" class="form-control" placeholder="Author">
                                            </div>
                                           <div class="form-group">
                                              <label >Pages</label>
                                              <input name="pages" type="number" class="form-control" placeholder="Pages" >
                                            </div>
                                            <div class="form-group">
                                              <label >Cash Price</label>
                                              <input name="cash_price" type="number" class="form-control" placeholder="Cash Price">
                                            </div>
                                            <div class="form-group">
                                              <label >Source of Fund</label>
                                              <input name="sof" type="text" class="form-control" placeholder="Source of Fund">
                                            </div>
                                            <div class="form-group">
                                              <label >Remarks</label>
                                              <input name="remarks" type="text" class="form-control" placeholder="Remarks">
                                            </div>

                                            

                                            <div class="form-group">
                                              <label>Soft Copy (PDF) </label>
                                              <input name="pdf" type="file" class="form-control" placeholder="PDF file">
                                            </div>


                                            <!-- <label style="float:center !important">Author's Info</label>
                                            <div class="form-group">
                                            <label >First Name</label>
                                              <input name="author_first_name" type="text" class="form-control" placeholder="Author's first name">
                                            </div>
                                            <div class="form-group">
                                            <label >Middle Name</label>
                                              <input name="author_middle_name" type="text" class="form-control" placeholder="Author's middle name">
                                            </div>
                                            <div class="form-group">
                                            <label >Last Name</label>
                                              <input name="author_last_name" type="text" class="form-control" placeholder="Author's last name">
                                            </div> -->

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