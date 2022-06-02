<div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <div class="col-lg-11 col-md-10 col-sm-11 col-xs-12">
                                        <h1>Faculty</h1>
                                    </div>
                                    <a class="Primary mg-t-10 mg-b-10 btn btn-custon-rounded-two btn-success" target="_new" href="view_faculty_report" ><i class="fas fa-download" aria-hidden="true"></i> Download report</a>
                                    <!-- <a class="Primary mg-t-10 mg-b-10 btn btn-custon-rounded-two btn-success" href="#" data-toggle="modal" data-target="#PrimaryModalalert"><i class="fa fa-plus edu-plus-pro" aria-hidden="true"></i> Add New</a> -->
                                
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                <!-- <div class="d-flex justify-content-between align-items-end flex-wrap">
					<a  href="#" onclick="printPage()" class="btn btn-primary mt-2 mt-xl-0">  <i class="mdi mdi-download text-muted"></i> Download/ Print report</a>
               </div> -->
               <!-- <a href="<?=site_url('admin/product_data')?>" class="btn btn-primary mt-2 mt-xl-0" >   -->
                    

                    <table id="example" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="false" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        
                                            <thead>
                                            <tr>
                                                <th data-field="faculty">MONTH</th>
                                                <th data-field="jan">BSIS</th>
                                                <th data-field="feb">HRM</th>
                                                <th data-field="mar">TOM</th>
                                                <th data-field="apr">MATH</th>
                                                <th data-field="may">BSNED</th>
                                                <th data-field="jun">BLIS</th>
                                                <th data-field="jul">PHYSCI</th>
                                                <th data-field="ttl">TOTAL</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php $num =1;  
                                            foreach($teachers as $teach):?>
                                            
                                                <tr>

                                                <td><?=$num++?></td>
                                                <td><?=$teach->last_name?>, <?=$teach->first_name?> <?=$teach->middle_name?></td>
                                                <td>
                                                    <?php //if(empty($jan)){ echo 0;}else{
                                                        foreach($jan as $jn){
                                                            // if($jn->borrower_id != ''){
                                                                if($teach->id == $jn->borrower_id){
                                                                    echo $jn->total;               
                                                                }
                                                            // }
                                                            else{ echo 0; } 
                                                        // }
                                                    }?>
                                                </td>
                                                <td>
                                                    <?php //if(empty($feb)){ echo 0;}else{
                                                        foreach($feb as $fb){
                                                            if($fb->borrower_id != ''){
                                                                if($teach->id == $fb->borrower_id){
                                                                    echo $fb->total;               
                                                                }
                                                            }else{ echo 0; }
                                                        // }
                                                    }?>
                                                </td>
                                                <td>
                                                    <?php //if(empty($mar)){ echo 0;}else{
                                                        foreach($mar as $mr){
                                                            // if($mr->borrower_id != ''){
                                                                if($teach->id == $mr->borrower_id){
                                                                    echo $mr->total;               
                                                                }
                                                            // }
                                                            else{ echo 0; }
                                                       // }
                                                    }?>
                                                </td>
                                                <td>
                                                    <?php //if(empty($apr) || $apr == 0){ echo 0;}else{
                                                        foreach($apr as $ap){
                                                            // if($ap->borrower_id != ''){
                                                                if($teach->id == $ap->borrower_id){
                                                                    echo $ap->total;               
                                                                }
                                                            // }
                                                            else{ echo 0; }
                                                        // }
                                                    }?>
                                                </td>
                                                <td>
                                                    <?php if(empty($may)){ echo 0;}else{
                                                        foreach($may as $my){
                                                            if($my->borrower_id != ''){
                                                                if($teach->id == $my->borrower_id){
                                                                    echo $my->total;               
                                                                }
                                                            }else{ echo 0; }
                                                        }
                                                    }?>
                                                </td>
                                                <td>
                                                    <?php //if(empty($jun)){ echo 0;}else{
                                                        foreach($jun as $jn){
                                                            //if($jn->borrower_id != ''){
                                                                if($teach->id == $jn->borrower_id){
                                                                    echo $jn->total;               
                                                               // }
                                                            }else{ echo 0; }
                                                       // }
                                                    }?>
                                                </td>
                                                <td>
                                                    <?php if(empty($jul)){ echo 0;}else{
                                                        foreach($jul as $jl){
                                                            if($jl->borrower_id != ''){
                                                                if($teach->id == $jl->borrower_id){
                                                                    echo $jl->total;               
                                                                }
                                                            }else{ echo 0; }
                                                        }
                                                    }?>
                                                </td>
                                                
                                                <td>
                                                    <?php if(empty($aug)){ echo 0;}else{
                                                        foreach($aug as $ag){
                                                            if($ag->borrower_id != ''){
                                                                if($teach->id == $ag->borrower_id){
                                                                    echo $ag->total;               
                                                                }
                                                            }else{ echo 0; }
                                                        }
                                                    }?>
                                                </td>
                                                <td>
                                                    <?php if(empty($sep)){ echo 0;}else{
                                                        foreach($sep as $sp){
                                                            if($sp->borrower_id != ''){
                                                                if($teach->id == $sp->borrower_id){
                                                                    echo $sp->total;               
                                                                }
                                                            }else{ echo 0; }
                                                        }
                                                    }?>
                                                </td>
                                                <td>
                                                    <?php if(empty($oct)){ echo 0;}else{
                                                        foreach($oct as $oc){
                                                            if($oc->borrower_id != ''){
                                                                if($teach->id == $oc->borrower_id){
                                                                    echo $oc->total;               
                                                                }
                                                            }else{ echo 0; }
                                                        }
                                                    }?>
                                                    </td>
                                                <td>
                                                    <?php if(empty($nov)){ echo 0;}else{
                                                        foreach($nov as $nv){
                                                            if($nv->borrower_id != ''){
                                                                if($teach->id == $nv->borrower_id){
                                                                    echo $nv->total;               
                                                                }
                                                            }else{ echo 0; }
                                                        }
                                                    }?>
                                                </td>
                                                <td>
                                                    <?php if(empty($dec)){}else{
                                                        foreach($dec as $dc){
                                                            if($dc->borrower_id != ''){
                                                                if($teach->id == $dc->borrower_id){
                                                                    echo $dc->total;               
                                                                }
                                                            }else{ echo 0; }
                                                        }
                                                    }?>
                                                </td>
                                                <td>
                                                <?php if(empty($total)){}else{
                                                        foreach($total as $ttl){
                                                            if($teach->id == $ttl->borrower_id){
                                                                   echo round($ttl->total);               
                                                           }
                                                        }
                                                    }?>
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

        <script>
function printPage() {
    window.print();
}
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
} );
</script>
