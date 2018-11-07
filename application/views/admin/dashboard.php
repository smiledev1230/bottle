<?php 

    $d['page']='admin'; 

    $this->load->view('includes/header_start',$d);?>

<style>

    i.fa.fa-pencil-square{color:#E84B44}

    .btn-primary{background-color:#E84B44;border-color:#d8352e}

    .btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary.active, .btn-primary.focus, .btn-primary:active, .btn-primary:focus, .btn-primary:hover, .open > .dropdown-toggle.btn-primary {

        background-color: #bd1b13;

        border-color: #4e0d0d;

        color: #ffffff;

    }

</style>

<div class="content-page">

                <!-- Start content -->

                <div class="content admindashboard">

                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-xl-12">

                                <div class="page-title-box">

                                    <h4 class="page-title float-left">Administrator Dashboard | View and manage bottle images here.</h4>

                                    <div class="clearfix"></div>

                                </div>

                            </div>

                        </div>                        

                            <div class="tilebox-one">

                                <div class="row">

                                    <div class="col-sm-12">

                                        <p>Click on the bottle image to preview the bottle information. Click on the edit icon to edit. Click on the download button to download the image.</p>

                                        <?php if(isset($_SESSION['success'])):?>

                                            <div class="alert alert-success alert-dismissible fade show" role="alert">

                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                                                    <span aria-hidden="true">×</span>

                                                </button>

                                                <div>

                                                    <?php echo @$_SESSION['success'];unset($_SESSION['success']);?>

                                                </div>

                                            </div>

                                        <?php endif;?>

                                        <?php if(isset($_SESSION['error'])):?>

                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">

                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                                                    <span aria-hidden="true">×</span>

                                                </button>

                                                <div>

                                                    <?php echo @$_SESSION['error'];unset($_SESSION['error']);?>

                                                </div>

                                            </div>

                                        <?php endif;?>

                                    </div>

                            </div>

                            <div class="row">

                                <?php foreach($images as $row):?>

                                    <?php $filename = $row->filename;?>

                                    <div class="col-xs-6 col-md-3 col-xl-2 not-approved-image">

                                        <div class="card-box tilebox-one text-center">

                                            <?php $load_url = base_url()."ajax/modal?m=image-details&id=".$row->ID;;?>

                                            <a href="#preview-bottle-modal" class="waves-effect waves-light" onclick="load_preview_modal('<?php echo $load_url;?>')" data-animation="fadein" data-plugin="custommodal" data-overlayspeed="200" data-overlaycolor="#36404a"><img src="<?php echo base_url().'uploads/'.$filename;?>"  class="img-fluid"   data-toggle="tooltip" data-placement="top" title="" data-original-title="Click to view more info on the bottle usage"></a>

                                            <h6 class="text-muted text-uppercase m-t-20"><?php echo $row->bottle_name;?></h6>

                                            <?php if($_SESSION['role']=='super_admin'):?>

                                                <span class="editlink"><a href="<?php echo base_url();?>image/delete/<?php echo $row->ID;?>" onclick="return confirm('Are you sure you want to delete this?');"><i class="fa fa-trash text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i></a></span>

                                            <?php endif;?>

                                            <span class="editlink"><a href="<?php echo base_url();?>image/edit/<?php echo $row->ID;?>"><i class="fa fa-pencil-square" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i></a></span>
                                            <div class="download-button-block">
                                                <?php if($this->image_model->isApproved($row->ID)):?>
                                                    <span> <button href="#download" type="button" class="btn btn-primary waves-effect waves-light btn-sm download-btn"  data-animation="fadein" data-plugin="custommodal" data-overlayspeed="200" data-overlaycolor="#36404a" data-target=".bs-example-modal-sm"  data-id="<?php echo $row->ID;?>">DOWNLOAD</button></span>
                                                <?php endif;?>
                                            </div>

                                        </div>

                                    </div>

                                <?php endforeach;?>

                            </div>

                            <!-- end row -->



                                        

                        <div id="download" class="modal-demo smalldemo">

                            <input type="hidden" id="download_id" value="">

                            <h4 class="custom-modal-title">Want to download this bottle? Got it!</h4>

                            <div class="custom-modal-text">

                                <p>Before we authorize the download, please fill out the required information and tell us how you will use the bottle image.</p>

                                <strong>Name:</strong> <?php echo $user->FirstName;?> <?php echo $user->LastName;?><br>

                                <strong>Email:</strong> <?php echo $user->Email;?>

                                <fieldset class="form-group">

                                    <label for="used_for">How do you plan to use the picture of this bottle?</label>

                                    <textarea class="form-control" id="used_for" rows="3"></textarea>

                                </fieldset>

                                <input type="hidden" id="name" value="<?php echo $user->FirstName.' '.$user->LastName;?>">

                                <input type="hidden" id="email" value="<?php echo $user->Email;?>">

                                <button type="button" class="btn btn-primary submit-and-download">Submit</button>

                                <button type="button" class="btn btn-primary"  onclick="Custombox.close();">Cancel</button>

                            </div>

                        </div>                                

                                      

                             

                                    

                    </div> <!-- container -->



                </div> <!-- content -->







            </div>

            <!-- End content-page -->





    <!-- ============================================================== -->

    <!-- End Right content here -->

    <!-- ============================================================== -->



<?php $this->load->view('includes/footer_start');?>