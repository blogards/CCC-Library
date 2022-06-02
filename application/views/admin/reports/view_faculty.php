<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>CCC Library Management System</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
        <link rel="stylesheet" href="<?=base_url('tools/css/bootstrap.min.css')?>">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url('tools/css/font-awesome.min.css')?>">
    <!-- owl.carousel CSS
		============================================ -->
		
  
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url('tools/css/form/all-type-forms.css')?>">
    <!-- x-editor CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url('tools/css/editor/select2.css')?>">
    <link rel="stylesheet" href="<?=base_url('tools/css/editor/datetimepicker.css')?>">
    <link rel="stylesheet" href="<?=base_url('tools/css/editor/bootstrap-editable.css')?>">
    <link rel="stylesheet" href="<?=base_url('tools/css/editor/x-editor-style.css')?>">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url('tools/css/data-table/bootstrap-table.css')?>">
    <link rel="stylesheet" href="<?=base_url('tools/css/data-table/bootstrap-editable.css')?>">
    <!-- dropzone CSS
		============================================ -->
    
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url('tools/css/style.css')?>">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="<?=base_url('tools/css/responsive.css')?>">
    <!-- modernizr JS
		============================================ -->
    <script src="<?=base_url('tools/js/vendor/modernizr-2.8.3.min.js')?>"></script>
    <!-- profile pic style CSS
		============================================ -->
    
    <!-- Scripts and style for select2
    ============================================ -->
    <link rel="stylesheet" href="<?=base_url('tools/css/custom.css')?>">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?=base_url('tools/css/select2.min.css')?>"/>
   <style>
@media print{
	.print {
		display:none;
	}
	.card {
		border:none;
	}
	.page-body-wrapper { 
	padding-top: 0px;
	}
	.content-wrapper {
		padding:0px;
	}
}
</style>
<script>
function printPage() {
    window.print();
}
</script>
</head>

<body>
<div class="d-flex justify-content-between align-items-end flex-wrap print">
	<a  href="#" onclick="printPage()" class="Primary mg-t-10 mg-b-10 btn btn-custon-rounded-two btn-success">  <i class="mdi mdi-download text-muted"></i> Download/ Print report</a>
</div>

    <div style="margin:1in;">

                   
                                <div style="margin-bottom: 15px; text-align:center;">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <h4 style="margin-bottom: 25px; font-size:15px">Faculty</h4>
                                    </div>
                                 </div>
                        

            <table id="example"  data-toggle="table"   >
                                        
                                            <thead style="background-color:#a1e1ed; color:red" >
                                            <tr>
                                                <th style="text-align:center;" data-field="no"></th>    
                                                <th data-field="faculty">FACULTY</th>
                                                <th data-field="jan">JAN</th>
                                                <th data-field="feb">FEB</th>
                                                <th data-field="mar">MAR</th>
                                                <th data-field="apr">APR</th>
                                                <th data-field="may">MAY</th>
                                                <th data-field="jun">JUN</th>
                                                <th data-field="jul">JUL</th>
                                                <th data-field="aug">AUG</th>
                                                <th data-field="sep">SEP</th>
                                                <th data-field="oct">OCT</th>
                                                <th data-field="nov">NOV</th>
                                                <th data-field="dec">DEC</th>
                                                <th data-field="ttl">TOTAL</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php $num =1;  
                                            foreach($teachers as $teach):?>
                                            
                                                <tr style="border:black; border-top:10px !important">
                                                <td style="text-align:center;" ><?=$num++?></td>
                                                <td style="text-align:left;" ><?=$teach->last_name?>, <?=$teach->first_name?> <?=$teach->middle_name?></td>
                                                <td tyle="text-align:center !important;">
                                                    <?php if(empty($jan)){ echo 0;}else{
                                                        foreach($jan as $jn){
                                                            if($teach->id == $jn->borrower_id){
                                                                   echo $jn->total;               
                                                           }else{ echo 0; }
                                                        }
                                                    }?>
                                                </td>
                                                <td tyle="text-align:center;">
                                                    <?php if(empty($feb)){ echo 0;}else{
                                                        foreach($feb as $fb){
                                                            if($teach->id == $fb->borrower_id){
                                                                   echo $fb->total;               
                                                           }else{ echo 0; }
                                                        }
                                                    }?>
                                                </td >
                                                <td tyle="text-align:center;">
                                                    <?php if(empty($mar)){ echo 0;}else{
                                                        foreach($mar as $mr){
                                                            if($teach->id == $mr->borrower_id){
                                                                   echo $mr->total;               
                                                           }else{ echo 0; }
                                                        }
                                                    }?>
                                                </td>
                                                <td tyle="text-align:center;">
                                                    <?php if(empty($apr)){ echo 0;}else{
                                                        foreach($apr as $ap){
                                                            if($teach->id == $ap->borrower_id){
                                                                   echo $ap->total;               
                                                           }else{ echo 0; }
                                                        }
                                                    }?>
                                                </td>
                                                <td tyle="text-align:center;">
                                                    <?php if(empty($may)){ echo 0;}else{
                                                        foreach($may as $my){
                                                            if($teach->id == $my->borrower_id){
                                                                   echo $my->total;               
                                                           }else{ echo 0; }
                                                        }
                                                    }?>
                                                </td>
                                                <td tyle="text-align:center;">
                                                    <?php if(empty($jun)){ echo 0;}else{
                                                        foreach($jun as $jn){
                                                            if($teach->id == $jn->borrower_id){
                                                                   echo $jn->total;               
                                                           }else{ echo 0; }
                                                        }
                                                    }?>
                                                </td>
                                                <td tyle="text-align:center;">
                                                    <?php if(empty($jul)){ echo 0;}else{
                                                        foreach($jul as $jl){
                                                            if($teach->id == $jl->borrower_id){
                                                                   echo $jl->total;               
                                                           }else{ echo 0; }
                                                        }
                                                    }?>
                                                </td>
                                                
                                                <td tyle="text-align:center;">
                                                    <?php if(empty($aug)){ echo 0;}else{
                                                        foreach($aug as $ag){
                                                            if($teach->id == $ag->borrower_id){
                                                                   echo $ag->total;               
                                                           }else{ echo 0; }
                                                        }
                                                    }?>
                                                </td>
                                                <td tyle="text-align:center;">
                                                    <?php if(empty($sep)){ echo 0;}else{
                                                        foreach($sep as $sp){
                                                            if($teach->id == $sp->borrower_id){
                                                                   echo $sp->total;               
                                                           }else{ echo 0; }
                                                        }
                                                    }?>
                                                </td>
                                                <td tyle="text-align:center;">
                                                    <?php if(empty($oct)){ echo 0;}else{
                                                        foreach($oct as $oc){
                                                            if($teach->id == $oc->borrower_id){
                                                                   echo $oc->total;               
                                                           }else{ echo 0; }
                                                        }
                                                    }?>
                                                    </td>
                                                <td tyle="text-align:center;">
                                                    <?php if(empty($nov)){ echo 0;}else{
                                                        foreach($nov as $nv){
                                                            if($teach->id == $nv->borrower_id){
                                                                   echo $nv->total;               
                                                           }else{ echo 0; }
                                                        }
                                                    }?>
                                                </td>
                                                <td tyle="text-align:center;">
                                                    <?php if(empty($dec)){ echo 0;}else{
                                                        foreach($dec as $dc){
                                                            if($teach->id == $dc->borrower_id){
                                                                   echo $dc->total;               
                                                           }else{ echo 0; }
                                                        }
                                                    }?>
                                                </td>
                                                <td tyle="text-align:center;">
                                                <?php if(empty($total)){ echo 0;}else{
                                                        foreach($total as $ttl){
                                                            if($teach->id == $ttl->borrower_id){
                                                                   echo $ttl->total;               
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
                <?php //$this->load->view('admin/includes/layout/footer.php'); // include footer, or footbar ?>
                                                </div>
            </body>
 <!-- jquery
		============================================ -->
        <!-- <script src="<?=base_url('tools/js/vendor/jquery-1.12.4.min.js')?>"></script> -->
    <!-- bootstrap JS
		============================================ -->
    <!-- <script src="<?=base_url('tools/js/bootstrap.min.js')?>"></script> -->
    <!-- wow JS
	
    <! data table JS 
		============================================ -->
    <script src="<?=base_url('tools/js/data-table/bootstrap-table.js')?>"></script>
    <!-- <script src="<?=base_url('tools/js/data-table/tableExport.js')?>"></script>
    <script src="<?=base_url('tools/js/data-table/data-table-active.')?>"></script>
    <script src="<?=base_url('tools/js/data-table/bootstrap-table-editable.js')?>"></script>
    <script src="<?=base_url('tools/js/data-table/bootstrap-editable.')?>"></script>
    <script src="<?=base_url('tools/js/data-table/bootstrap-table-resizable.js')?>"></script>
    <script src="<?=base_url('tools/js/data-table/colResizable-1.5.source.js')?>"></script>
    <script src="<?=base_url('tools/js/data-table/bootstrap-table-export.')?>"></script> -->
   
    <!-- main JS
		============================================ -->
    <script src="<?=base_url('tools/js/main.js')?>"></script>
    <!-- datapicker JS
		============================================ -->
    <script src="<?=base_url('tools/js/datapicker/bootstrap-datepicker.js')?>"></script>
    <script src="<?=base_url('tools/js/datapicker/datepicker-active.js')?>"></script>
    <script src="<?=base_url('tools/js/datapicker/datepickerwithlimit.js')?>"></script>
    <!-- ajax JS
		============================================ -->
    <script src="<?=base_url('tools/js/ajax.js')?>"></script>
    <!-- pdf JS
	

    <script src="<?=base_url('tools/js/custom.js')?>"></script>
</html>
