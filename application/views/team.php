<?php 
    $page='team'; 
    $this->load->view('includes/header_start');
?>
   <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="row m-b-20">
                        	<div class="col-sm-12">
                                <div class="card-box tilebox-one">
                                    <strong>Bottle Tracker Administration Team</strong><br><br>
                                    <p>Welcome to the Bottle Tracker Administration Team. This group is responsible for the approval or disapproval of bottles displayed across different mediums. Administrators must contact customers, work with their team and/or simply specify if the bottles are approved for use in collateral marketing materials for internal or external presentations or events.<br><br>
                                        <a href="mailto:dbianco@plastipak.com">Diego Bianco</a>, Marketing and Communications
                                    </p>
                                </div>
                                <div class="card-box tilebox-one">
                                    <strong>The Marketing and Communications Department's role within this module:</strong><br><br>
                                    We upload bottles from existing presentations of any kind from Plastipak managers on a global level. We have an approval process in place: we send an image as an attachment by email to the proper contact and ask for permission regarding each bottle you see on this internal website. We continually ask for display approvals of these bottles for web, print or video materials. 
                                    <br>
                                    <br>
                                    The status of several bottles can be:
                                    </p>
                                        <div class="m-t-10">
                                            <i class="fa fa-check-square-o green icon-20"></i>  OKAY TO USE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-times-rectangle red icon-20"></i> DO NOT USE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-square-o text-muted icon-20"></i>  OPTION NOT CHOSEN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="fa fa-question-circle-o icon-20"></i>  PENDING FOR APPROVAL
                                        </div>
                                </div>
                                <p class="m-t-20">
                                    <div class="card-box tilebox-one">
                                        <strong>To Upload Bottles To This Site</strong><br><br>
                                        Administrators can upload an image temporarily to the site, fill out the information required and submit the bottle for approval to the team. This means the image will be just be a preview until the Marketing and Communications Department approves the image by quality and formatting. This way, all users will have the best quality of the image possible for their presentations.
                                </p>                                                   
                            </div>              
                         
                            <!-- team header -->
                            <div class="row m-b-20">
                                <div class="col-sm-12">
                                    <h3 align="center">Administration Team</h3>
                                </div>
                            </div>
                            <!-- eof team header -->

                             <!-- line -->
                         <div class="row">

                            <?php foreach($users as $user):?>
                            <!-- box -->
                            <div class="col-sm-3">
                                <div class="card-box tilebox-one box-profilephoto text-center">    
                                    <p><img src="<?php echo base_url();?>assets/img/profilephoto.jpg" class="profilephoto-img rounded-circle"></p>
                                    <p>
                                        <strong><?php echo $user->FirstName.' '.$user->LastName;?></strong><br />
                                        <?php echo $user->Department;;?><br />
                                        <a href="#"><?php echo $user->Email;?></a><br />
                                        <?php echo $user->Phone;?>
                                    </p>
                                    <?php if($_SESSION['role']=='super_admin'):?>
                                        <a href="<?php echo base_url('team/edit/'.$user->ID);?>" class="btn btn-primary">Edit</a>
                                    <?php endif;?>
                                </div>
                            </div>
                            <!-- eof box -->
                            <?php endforeach;?>

                        </div>
                         <!-- eof line -->

                            </div>
                           </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-12">
                         <p align="center"><a href="#mailadmin" class="btn btn-primary waves-effect waves-light m-r-5 m-b-10" data-animation="fadein" data-plugin="custommodal" data-overlayspeed="200" data-overlaycolor="#36404a">Contact</a></p>
                     </div>
                        </div>
                        <!-- end row -->
                        
                         <div id="mailadmin" class="modal-demo smalldemo">
                            <h4 class="custom-modal-title">Contact the Administrator Team</h4>
                            <div class="custom-modal-text">
                           <p><strong>Select recipients:</strong></p>
                           <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="select-all-admin">
                                <label class="custom-control-label admin" for="select-all-admin">All</label>
                            </div>
                            <div class="row">
                                <?php foreach($users as $user):?>
                                    <div class="col-sm-6"> 
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input admin-checkbox" id="<?php echo $user->ID;?>">
                                            <label class="custom-control-label admin" for="<?php echo $user->ID;?>"><?php echo $user->FirstName.' '.$user->LastName;?></label>
                                        </div>
                                    </div>
                                <?php endforeach;?>
                                
                            </div>
                            <br>
                            <fieldset class="form-group">
                                <label for="subject">Subject</label>
                                <input type="email" class="form-control" id="subject" value="">
                            </fieldset>
                            <fieldset class="form-group">
                                <label for="message">Message:</label>
                                <textarea class="form-control" id="message" rows="5"></textarea>
                            </fieldset>
                            <button type="button" class="btn btn-primary" id="send-message">Send</button>
                            <button type="button" class="btn btn-primary"  onclick="Custombox.close();">Cancel</button> </div>
                        </div>                         
                                      
                             
                                    
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
