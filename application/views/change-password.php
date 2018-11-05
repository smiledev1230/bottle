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

                             <!-- line -->

                            <div class="row" style="display:block !important;width:100%;">

                                <div class="col-sm-12">

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

                                    <form action="" method="post">

                                    <div class="card-box">

                                        <div class="row">

                                            <div class="col-md-12">

                                                <h3> New Password</h3>

                                                <hr>

                                            </div>

                                        </div>

                                        <div class="form-group row">

                                            <label for="Password" class="col-3 col-form-label">Old Password: </label> <div class="col-9">

                                                <input class="form-control" type="password"  id="OldPassword" name="OldPassword" value="<?php echo @$_POST['OldPassword'];?>"   required>

                                            </div>

                                        </div>

                                        <div class="form-group row">

                                            <label for="Password" class="col-3 col-form-label">Password: </label> <div class="col-9">

                                                <input class="form-control" type="password"  id="Password" name="Password" value="<?php echo @$_POST['Password'];?>"   required>

                                            </div>

                                        </div>

                                        <div class="form-group row">

                                            <label for="ConfirmPassword" class="col-3 col-form-label">Confirm Password: </label> <div class="col-9">

                                                <input class="form-control" type="password"  id="ConfirmPassword" name="ConfirmPassword" value="<?php echo @$_POST['ConfirmPassword'];?>"   required>

                                            </div>

                                        </div>

                                        <div class="form-group row">

                                            <div class="col-12">

                                                <button class="btn btn-primary" type="submit">Submit</button>

                                            </div>

                                        </div>

                                    </div>

                                    </form>

                                </div>

                            </div>

                            <!-- eof line -->



                            </div>

                           </div>

                        </div>

                        </div>

                        <!-- end row -->

                                      

                             

                                    

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

