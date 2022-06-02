<!-- Import modal section start-->
<div id="PrimaryModalalertedit" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-close-area modal-close-df">
                              <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                          </div>
                          <div class="modal-header header-color-modal bg-color-3">
                              <h4 class="modal-title">Import data from CSV</h4>
                              <div class="modal-close-area modal-close-df">
                                  <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                              </div>
                          </div>
                          <form id="update_form" method="post" name="userform" enctype="multipart/form-data" action="<?=site_url('library_resources/importManuscript');?>">
                          <div class="modal-body">
                            <div class="col-lg-12 cold-md-12 col-sm12 col-xs-12">
                                <div class="form-group">
                                  <label >Select CSV File</label>
                                  <input name="file" type="file" class="form-control" required>
                                </div>
                            </div>   
                            <div class="modal-footer">
                                <button class="Primary btn btn-custon-rounded-two btn-danger" data-dismiss="modal" href="#">Cancel</button>
                                <input class="Primary mg-b-10 btn btn-custon-rounded-two btn-success" type="submit" href="#" name="import_publication_btn" value="Proceed" >
                              </div>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <!-- Import modal section start-->