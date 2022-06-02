
    <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <div class="col-lg-10 col-md-19 col-sm-11 col-xs-12">
                                        <h1>Manuscripts / Narratives</h1>
                                    </div>
                                    <a class="Primary mg-t-10 mg-b-10 btn btn-custon-rounded-two btn-success" href="#" data-toggle="modal" data-target="#PrimaryModalalertedit"><i class="fa fa-plus edu-plus-pro" aria-hidden="true"></i> Import</a>
                                    <a class="Primary mg-t-10 mg-b-10 btn btn-custon-rounded-two btn-success" href="#" data-toggle="modal" data-target="#PrimaryModalalert"><i class="fa fa-plus edu-plus-pro" aria-hidden="true"></i> Add New</a>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                        <select class="form-control dt-tb">
                                          <option value="">Export Basic</option>
                                          <option value="all">Export All</option>
                                          <option value="selected">Export Selected</option>
                                        </select>
                                    </div>
                                    <?php flash_alert(); ?>
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="state" data-checkbox="true"></th>
                                                <th data-field="id">#</th>
                                                <th data-field="barcode">Barcode</th>
                                                <th data-field="title">Title</th>
                                                <th data-field="grade">Author</th>
                                                <th data-field="subject">Course</th>
                                                <th data-field="duration">Year</th>
                                                <th data-field="status" >Status</th>
                                                <th data-field="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $num = 1;
                                                foreach($manuscripts as $manuscript):
                                            ?>
                                            <tr>
                                                <td></td>
                                                <td><?=$num++; ?></td>
                                                <td><?=$manuscript->barcode?></td>
                                                <td><?=$manuscript->title?></td>
                                                <td><?=$manuscript->author?></td>
                                                <td><?=$manuscript->course?></td>
                                                <td><?=$manuscript->year?></td>
                                                <td>
                                                    <select class="form-control dt-tb resource-status" barcode="<?=$manuscript->barcode?>">
                                                        <option <?php if($manuscript->status == 'Available'){ echo 'selected'; }?> value="Available"  selected   >Available</option>
                                                        <option  <?php if($manuscript->status == 'Reserved' || $manuscript->status == 'Borrowed' || $manuscript->status == 'Not Available'){ echo 'selected'; }?> value="Not Available">Not Available</option> 
                                                        <option  <?php if($manuscript->status == 'Damage'){ echo 'selected'; }?> value="Damage"  >Damage</option>
                                                        <option  <?php if($manuscript->status == 'Archive'){ echo 'selected'; }?> value="Archive"  >Archive</option> 
                                                    </select>
                                                
                                                </td>

                                                <td>
                                                  <div style="display: flex;">
                                                  <!-- <a class="media" href="" style="background: #1aff00"><i class="fa fa-eye" aria-hidden="true"></i></a> -->
                                                  <a href="#" data-toggle="modal" data-target="#manuscript-<?=$manuscript->barcode?>" style="background: #00bbff">
                                                    <i class="fa fa-pencil-square-o update">
                                                    </i>
                                                  </a>
                                                  <a href="#" data-toggle="modal" data-target="#deletemodal<?=$manuscript->barcode?>" style="background: #ff0000">
                                                    <i class="fas fa-trash-alt deleteAudioVisual" data-da_barcode="<?=$manuscript->barcode?>" data-da_title="<?=$manuscript->title?>"></i>
                                                  </a>
                                                  </div>
                                                </td>
                                            </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                          </div>
                      </div>
                  </div>
                  <?php $this->load->view('admin/modal/manuscript/add_modal.php'); ?>
                  <?php $this->load->view('admin/modal/manuscript/edit_modal.php'); ?>
                  <?php $this->load->view('admin/modal/manuscript/import_modal.php'); ?>
                  <?php $this->load->view('admin/modal/manuscript/delete_modal.php'); ?>

                    

                    

                    
                </div>
            </div>
        </div>
        <!-- Static Table End -->
