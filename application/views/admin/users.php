
        <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                        <h1>Users</h1>
                                    </div>
                                    <a class="Primary mg-t-10 mg-b-10 btn btn-custon-rounded-two btn-success" href="#" data-toggle="modal" data-target="#PrimaryModalalertedit"><i class="fa fa-plus edu-plus-pro" aria-hidden="true"></i> Import</a>
                                    <a class="Primary mg-t-10 mg-b-10 btn btn-custon-rounded-two btn-success" href="#" data-toggle="modal" data-target="#PrimaryModalalert"><i class="fa fa-plus edu-plus-pro" aria-hidden="true"></i> Add New</a>
                                </div>
                                
                            </div>
                            
                            <?php flash_alert(); ?>
                            
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                    <div id="toolbar">
                                        <select class="form-control dt-tb">
                                          <option value="">Export Basic</option>
                                          <option value="all">Export All</option>
                                          <option value="selected">Export Selected</option>
                                        </select>
                                    </div>
                                    
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="state" data-checkbox="true"></th>
                                                <th data-field="id" style="width:50px">ID #</th>
                                                <th data-field="name">Name</th>
                                                <th data-field="email">Email</th>
                                                <th data-field="contact">Phone</th>
                                                <th data-field="complete">User Type</th>
                                                <th data-field="task">Address</th>
                                                <th data-field="date">Status</th>
                                                <th data-field="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                //$num = 1;
                                                foreach($users as $user): ?>
                                            <tr>
                                                <td></td>
                                                <td style="width:50px"><?=$user->id_no?></td>
                                                <td><?=$user->first_name?> <?=$user->middle_name?> <?=$user->last_name?></td>
                                                <td><?=$user->email?></td>
                                                <td><?=$user->contact?></td>
                                                <td><?=$user->user_type?></td>
                                                <td><?=$user->street?> <?=$user->barangay?> <br><?=$user->city?> <?=$user->province?><br><?=$user->postal_code?></td>
                                                <td>
                                                    <select class="form-control dt-tb user-status" id="<?=$user->id?>">
                                                            <option <?php if($user->status == 'Approved'){echo("selected");}?> value="Approved" >Approved</option>
                                                            <option <?php if($user->status == 'Pending'){echo("selected");}?> value="Pending" >Pending</option>
                                                    </select>
  
                                                </td>
                                                
                                                <td>
                                                  <div style="display: flex;">
                                                    <a class="media" href="" style="background: #1aff00"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                    <a href="<?=site_url('users/edit/'.$user->id)?>"  style="background: #00bbff">
                                                      <i class="fa fa-pencil-square-o updateUser" >
                                                      </i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#delete-user-<?=$user->id?>" style="background: #ff0000">
                                                      <i class="fa fa-trash-o deleteUser" data-user-id="<?=$user->id?>" data-user_title="<?=$user->first_name?>">
                                                      </i>
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
                </div>
            </div>
        </div>
        <!-- Static Table End -->

                <?php $this->load->view('admin/modal/users/add_modal.php'); ?>
                <!-- <?php //$this->load->view('admin/modal/users/edit_modal.php'); ?> -->
                <?php $this->load->view('admin/modal/users/import_modal.php'); ?>
                <?php $this->load->view('admin/modal/users/delete_modal.php'); ?>
        

                