<!-- Edit Modal Section Start -->
<?php foreach($books as $book): ?>

<div id="book<?=$book->barcode?>" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-close-area modal-close-df">
                                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                    </div>
                                    <div class="modal-header header-color-modal bg-color-3">
                                        <h4 class="modal-title">Update Book</h4>
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
                                    <form id="update_form" method="post" name="userform" enctype="multipart/form-data" action="<?=site_url('library_resources/edit_book/'.$book->barcode)?>">
                                      <div class="modal-body">
                                        <div class="col-lg-12 cold-md-12 col-sm-12 col-xs-12">
                                        <input type="hidden" id="id" name="id" class="form-control" required>
                                          
                                        </div>
                                        <div class="col-lg-6 cold-md-6 col-sm6 col-xs-12">
                                        <div class="form-group">
                                            <label >Barcode ID</label>
                                            <input name="barcode1" value ="<?=$book->barcode?>" type="text" class="form-control" disabled>
                                            
                                          </div>
                                            <div class="form-group">
                                              <label >Title</label>
                                              <input name="title1" type="text" class="form-control" placeholder="Title" value="<?=$book->title?>" required>
                                            </div>
                                            <div class="form-group">
                                              <label >Edition</label>
                                              <input name="edition1" type="text" class="form-control" placeholder="Edition" value="<?=$book->edition?>" required>
                                            </div>
                                            <div class="form-group">
                                              <label >Volume</label>
                                              <input name="volume1"  type="text" class="form-control" placeholder="Volume" value="<?=$book->volume?>" required>
                                            </div>
                                            <div class="form-group">
                                              <label >Author</label>
                                              <input name="author1"  type="text" class="form-control" placeholder="Author" value="<?=$book->author?>" required>
                                            </div>
                                            <div class="form-group">
                                              <label >Publisher</label>
                                              <input name="publisher1"  type="text" class="form-control" placeholder="Publisher" value="<?=$book->publisher?>" required>
                                            </div>
                                            <div class="form-group">
                                              <label >Class</label>
                                              <input name="class1"  type="text" class="form-control" placeholder="Class" value="<?=$book->class?>" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 cold-md-6 col-sm12 col-xs-12">
                                            <div class="form-group">
                                              <label >Pages</label>
                                              <input name="pages1" type="number" class="form-control" placeholder="Pages" value="<?=$book->pages?>" required>
                                            </div>
                                            <div class="form-group" id="data_3">
                                                <label>Date Received</label>
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    <input type="text" name="date_received1" class="form-control" value="<?=$book->date_received?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                              <label >Year</label> 
                                              <input name="year1" value="<?=$book->year?> "type="text" class="form-control" placeholder="Year" >
                                            </div>
                                            <div class="form-group">
                                              <label >Cash Price</label>
                                              <input name="cash_price1" type="number" class="form-control" value="<?=$book->cash_price?>" placeholder="Cash Price">
                                            </div>
                                            <div class="form-group">
                                              <label >Source of Fund</label>
                                              <input name="sof1" type="text" class="form-control" placeholder="Source of Fund" value="<?=$book->sof?>" >
                                            </div>
                                            <div class="form-group">
                                              <label >Remarks</label>
                                              <input name="remarks1"  type="text" class="form-control" placeholder="Remarks" value="<?=$book->remarks?>" >
                                            </div>
                                            <div class="form-group">
                                              <label>Soft Copy (PDF) </label>
                                              <input name="pdf" type="file" class="form-control" placeholder="PDF file" value="" >
                                              <input name="pdf1" type="hidden" class="form-control" placeholder="PDF file" value="<?base_url('tools/files/.'$book->soft_copy)?>" >
                                            </div>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                          <button class="Primary btn btn-custon-rounded-two btn-danger" data-dismiss="modal" href="#">Cancel</button>
                                          <input class="Primary mg-b-10 btn btn-custon-rounded-two btn-success" type="submit" name="edit_books_btn" value="Update" >
                                      </div>
                                    </form>
                                </div>
                            </div>
                      </div>
                    <!-- edit modal Section end -->

<?php endforeach ?>