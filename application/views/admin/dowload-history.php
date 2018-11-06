<?php 

    $page='home'; 

    $this->load->view('includes/header_start');

?>

<!-- form Uploads -->

    <link href="<?php echo base_url();?>assets/plugins/fileuploads/css/dropify.min.css" rel="stylesheet" type="text/css" />

   <!-- ============================================================== -->

            <!-- Start right Content here -->

            <!-- ============================================================== -->

            <div class="content-page">

                <!-- Start content -->

                <div class="content">

                    <div class="container-fluid">

                    	<div class="row">

                            <div class="col-xl-12">

                                <div class="page-title-box">

                                    <h4 class="page-title float-left">Download History</h4>


                                    <div class="clearfix"></div>

                                </div>

                            </div>

                        </div>
                        <?php if (sizeof($results) <= 0):?>
                            <div class="row">
                                <p>You have not downloaded any images yet.</p>
                            </div>
                        <?php else:?>
                            <div class="card-box">
                                <div class="row">
                                    <div class="col-md-12">
                                        
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Bottle Name</th>
                                                    <th>Used for</th>
                                                    <th>Download Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($results as $row):?>
                                                    <tr>
                                                        <td><?php echo $row->name;?></td>
                                                        <td><?php echo $row->email;?></td>
                                                        <td>
                                                            <?php $load_url = base_url()."ajax/modal?m=image-details&id=".$row->image_id;;?>
                                                            <a href="#preview-bottle-modal" class="waves-effect waves-light" onclick="load_preview_modal('<?php echo $load_url;?>')" data-animation="fadein" data-plugin="custommodal" data-overlayspeed="200" data-overlaycolor="#36404a">
                                                                <?php echo $row->bottle_name;?>
                                                            </a>
                                                            
                                                        </td>
                                                        <td><?php echo $row->used_for;?></td>
                                                        <td><?php echo date("Y-m-d",strtotime($row->created_at)) ;?></td>
                                                    </tr>
                                                <?php endforeach;?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php endif;?>
                    </div> <!-- container -->



                </div> <!-- content -->



            </div>

            <!-- End content-page -->

    <!-- ============================================================== -->

    <!-- End Right content here -->

    <!-- ============================================================== -->









<?php 

    $this->load->view('includes/footer_start');

?>

<!-- file uploads js -->

<script src="<?php echo base_url();?>assets/plugins/fileuploads/js/dropify.min.js"></script>



<script type="text/javascript">

    $('.dropify').dropify({

        messages: {

            'default': 'Drag and drop a image here or click',

            'replace': 'Drag and drop or click to replace',

            'remove': 'Remove',

            'error': 'Ooops, something wrong appended.'

        },

        error: {

            'fileSize': 'The file size is too big (1M max).'

        }

    });

</script>

<script>

    $("#approve_all_confidential_category").on("click",function(){

        var fields = $(".confidential_category");

        if($(this).is(":checked")){

            

            $.each(fields, function(key,val){

                $(val).prop('checked',true);

            });

        }

        else{

            $.each(fields, function(key,val){

                $(val).prop('checked',false);;

            });

        }

    });

    $("#approve_all_non_confidential_category").on("click",function(){

        var fields = $(".non_confidential_category");

        if($(this).is(":checked")){

            

            $.each(fields, function(key,val){

                $(val).prop('checked',true);

            });

        }

        else{

            $.each(fields, function(key,val){

                $(val).prop('checked',false);;

            });

        }

    });

</script>