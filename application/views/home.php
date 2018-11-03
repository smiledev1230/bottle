<?php 

    $page='home'; 

    $this->load->view('includes/header_start');

?>

   <!-- ============================================================== -->

            <!-- Start right Content here -->

            <!-- ============================================================== -->

            <div class="content-page">

                <!-- Start content -->

                <div class="content">

                    <div class="container-fluid">

                        <div class="row  equal-cols">

                            <?php foreach($images as $row):?>

                                <?php $filename = $row->filename;?>

                                <div class="col-xs-6 col-md-3 col-xl-2 not-approved-image">

                                    <div class="card-box tilebox-one text-center">

                                        <?php $load_url = base_url()."ajax/modal?m=image-details&id=".$row->ID;;?>

                                        <a href="#preview-bottle-modal" class="waves-effect waves-light" onclick="load_preview_modal('<?php echo $load_url;?>')" data-animation="fadein" data-plugin="custommodal" data-overlayspeed="200" data-overlaycolor="#36404a"><img src="<?php echo base_url().'uploads/'.$filename;?>"  class="img-fluid"   data-toggle="tooltip" data-placement="top" title="" data-original-title="Click to view more info on the bottle usage"></a>

                                        <h6 class="text-muted text-uppercase m-t-20"><?php echo $row->bottle_name;?></h6>
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



                       

                        <div id="learn-more" class="modal-demo" style="">

                            <button type="button" class="close" onclick="Custombox.close();">

                                <span>×</span><span class="sr-only">Close</span>

                            </button>

                            <h4 class="custom-modal-title">About Bottle Tracker</h4>

                            <div class="custom-modal-text">

                           <p>Bottle Tracker is a bottle management system.  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc varius justo non eros aliquet pretium. Aliquam luctus libero odio, at luctus quam commodo vitae. Fusce venenatis dui eros, sed scelerisque metus consequat quis. In turpis quam, dictum quis rutrum vitae, fermentum et diam. Quisque augue lectus, porta facilisis vulputate molestie, dapibus nec urna. Ut ac enim placerat, commodo ante ac, ultricies nunc. Nam nec justo sagittis, aliquam augue ac, tristique lectus. Nunc sed efficitur nisi, sed fringilla mauris. In eget tristique ante, vel elementum est. Pellentesque consectetur hendrerit varius. Fusce id arcu odio.

                            </div>

                        </div>   

                        

                        <!-- download popup -->

                        <div id="download" class="modal-demo smalldemo">

                            <input type="hidden" id="download_id" value="">

                            <h4 class="custom-modal-title">Want to download this bottle? Got it!</h4>

                                <div class="custom-modal-text">

                                    <p>Before we authorize the download, please fill in the information required and tell us how will you use the bottle.</p>

                                    <form action="">

                                        <fieldset class="form-group">

                                            <label for="name">Your Name:</label>

                                            <input type="text" class="form-control" name="name" id="name">

                                        </fieldset>

                                        <fieldset class="form-group">

                                            <label for="email">Your Email:</label>

                                            <input type="email" class="form-control" name="email" id="email">

                                        </fieldset>

                                        <fieldset class="form-group">

                                            <label for="used_for">How do you plan to use the picture of this bottle?</label>

                                            <textarea class="form-control" id="used_for" rows="3"></textarea>

                                        </fieldset>

                                        <button type="button" class="btn btn-primary submit-and-download">Submit & Download</button>

                                        <button type="button" class="btn btn-primary"  onclick="Custombox.close();">Cancel</button>

                                    </form>

                            </div>

                        </div>     

                        <!-- download popup -->





                         <div id="mailadmin" class="modal-demo smalldemo">

                            <h4 class="custom-modal-title">Contact the Admin Team</h4>

                            <div class="custom-modal-text">

                           <p>Use the form below to contact the Admin Team regarding the Generic Bottle.</p>

                          

                                               

                             <fieldset class="form-group">

                                                    <label for="exampleTextarea">Message</label>

                                                    <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>

                                                </fieldset>

                                                <button type="submit" class="btn btn-primary">Submit</button>

                                                <button type="submit" class="btn btn-primary"  onclick="Custombox.close();">Cancel</button> </div>

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

