


    <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <div class="col-lg-10 col-md-19 col-sm-11 col-xs-12">
                                        <h1>Report Header and Footer Settings</h1>
                                    </div>
                                    <a class="Primary mg-b-10 btn btn-custon-rounded-two btn-success" href="#" data-toggle="modal" data-target="#PrimaryModalalert"><i class="fa fa-plus edu-plus-pro" aria-hidden="true"></i> Add</a>
                                    <!-- <a class="Primary mg-t-10 mg-b-10 btn btn-custon-rounded-two btn-success" href="#" data-toggle="modal" data-target="#PrimaryModalalert"><i class="fa fa-plus edu-plus-pro" aria-hidden="true"></i> Add New</a> -->
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                <?php flash_alert(); ?>

                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="false" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="false" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                                <th data-field="no">#</th>
                                                <th data-field="header">Header</th>
                                                <th data-field="title">Title</th>
                                                <th data-field="content_1">Footer</th>
                                                <!-- <th data-field="content_2">Content_2</th> -->
                                                <th data-field="footer">Status</th>
                                                <!-- <th data-field="qty">Quantity</th> -->
                                                
                                                <th data-field="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php $num = 1;
                                            foreach($emails as $email): ?>
                                            <tr>
                                                <td><?//=$num++?></td>
                                                <td><?//=$email->code?></td>
                                                <td><?//=$email->subject?></td>                                
                                                <td><?//=$email->content_1?> </td>  
                                                <td><?//=$email->footer?> </td>
                                
                                                <td>
                                                    <div style="display: flex;">
                                                        <a href="#" data-toggle="modal" data-target="#email-<?=$email->id?>" style="background: #00bbff">
                                                            <i class="fa fa-pencil-square-o" >
                                                            </i>
                                                        </a>
                                                        <a href="#" data-toggle="modal" data-target="#deletemodal-<?=$email->id?>" style="background: #ff0000">
                                                            <i class="fas fa-trash-alt" data-db_enail="<?=$email->id?>" data-db_title="<?=$email->id?>"> </i>
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

        <?php $this->load->view('admin/modal/settings/report/add_report_modal.php');?>
        <?php $this->load->view('admin/modal/settings/report/edit_report_modal.php');?>
        <?php $this->load->view('admin/modal/settings/report/delete_report_modal.php');?>

