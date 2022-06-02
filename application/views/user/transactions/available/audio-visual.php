
    <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <div class="col-lg-11 col-md-10 col-sm-11 col-xs-12">
                                        <h1>Available Library Resources / Audio-visual Materials</h1>
                                    </div>
                                   
                                </div>
                            </div>

                            
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright" style="padding-top: 4.5rem">
                                    <div id="toolbar">
                                        <select class="form-control library-resource-selector" value="">
                                          <option value="" disabled >Select Library Resources Category</option>
                                          <option value="Audio Visual Material" selected>Audio Visual</option>
                                          <option value="Books">Books</option>
                                          <option value="Thesis/Dissertation">Dissertation</option>
                                          <option value="Government Publications">Government Publications</option>
                                          <option value="Journals">Journals</option>
                                          <option value="Manuscript">Manuscript</option>
                                        </select>
                                        
                                        
                                    </div>

                                    <?php flash_alert(); ?>
                                    <?php $this->load->view('user/includes/status.php'); ?>
                                    
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="false" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="false" data-click-to-select="true" data-toolbar="#toolbar">
                                        <div id="show" >
                                        <thead>
                                            <tr>
                                                <th data-field="class">Barcode</th>
                                                <th data-field="title">Title</th>
                                                <th data-field="qty">Grade Level</th>
                                                <th data-field="author">Subject</th>
                                                <th data-field="type">Duration</th>
                                                <th data-field="edition">CopyRight</th>
                                                <th data-field="edition">Copy</th>
                                                <th data-field="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php foreach($resources as $resource): ?>
                                            <tr>
                                                <td><?=$resource->barcode?></td>
                                                <td><?=$resource->title?> </td>
                                                <td><?=$resource->grade_level?> </td>
                                                <td><?=$resource->subject?></td>
                                                <td><?=$resource->duration?></td>
                                                <td><?=$resource->copyright?></td>
                                                <td><?=$resource->total?></td>
                                                
                                                <td>
                                                  <div style="display: flex;">
                                                  <?php  if($this->session->userdata('user_type') == 'Admin' || $this->session->userdata('user_type') == 'Library Staff'){?>
                                                  
                                                  
                                                    <?php }else{?>
                                                  <button class="btn " data-toggle="modal" 
                                                  
                                                  data-target="
                                                    <?php if($this->session->userdata('id') == ""){ echo '#resource1'.$resource->id ;  } else{ echo '#resource'.$resource->id; }?>"
                                                    style="background: #1aff00"

                                                    <?php  if($this->session->userdata('user_type')=='Student'){if($has_reservation == true){echo 'disabled';}} ?>

                                                   >Reserve</button>
                                                   <?php } ?>
                                                  </div>
                                                </td>
                                            </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                            </div>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>                   
                </div>
            </div>
        </div>
        <?php $this->load->view('user/modal/reservation_modal.php');?>
        <!-- Static Table End --> 