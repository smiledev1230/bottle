<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="description" content="Admin Login">

        <meta name="author" content="Bottle Tracker">



        <!-- App Favicon -->

        <link rel="shortcut icon" href="assets/images/favicon.ico">



        <!-- App title -->

        <title>Login</title>



        <!-- Bootstrap CSS -->

        <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />



        <!-- App CSS -->

        <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" type="text/css" />



        <!-- Modernizr js -->

        <script src="<?php echo base_url();?>assets/js/modernizr.min.js"></script>



    </head>





    <body>



        <div class="account-pages"></div>

        <div class="clearfix"></div>

        <div class="wrapper-page">



        	<div class="account-bg">

                <div class="card-box mb-0">

                    <div class="text-center m-t-20">

                    <img src="<?php echo base_url();?>assets/img/logo.png" />

                              <h3>Bottle Tracker</h3>

                     </div>

                    <div class="m-t-10 p-20">

                        <div class="row">

                            <div class="col-12 text-center">

                                <h6 class="text-muted text-uppercase m-b-0 m-t-0">ADMIN LOGIN</h6>

                            </div>

                        </div>

                        <form class="m-t-20"  name="login" action="" method="post">

                            <div class="form-group">

                                <div class="col-12">

                                    <?php if(isset($_SESSION['error'])):?>



                                        <div class="error-message padbottom">



                                            <?php echo $_SESSION['error'];unset($_SESSION['error']); ?>



                                        </div>



                                    <?php endif;?>



                                    <?php if(isset($_SESSION['success'])):?>



                                        <div class="success-message padbottom">



                                            <?php echo $_SESSION['success'];unset($_SESSION['success']); ?>



                                        </div>



                                    <?php endif;?>

                                </div>

                            </div>

                            <div class="form-group row">

                                <div class="col-12">

                                    <input class="form-control" type="text" required="" placeholder="Username" name="username">

                                </div>

                            </div>



                            <div class="form-group row">

                                <div class="col-12">

                                    <input class="form-control" type="password" required="" placeholder="Password" name="password">

                                </div>

                            </div>



                            <div class="form-group row">

                                <div class="col-12">

                                    <div class="checkbox checkbox-custom">

                                        <input id="checkbox-signup" type="checkbox">

                                        <label for="checkbox-signup">

                                            Remember me

                                        </label>

                                    </div>

                                </div>

                            </div>



                            <div class="form-group text-center row m-t-10">

                                <div class="col-12">

                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In</button>

                                </div>

                            </div>

                            

                        </form>



                    </div>



                    <div class="clearfix"></div>

                </div>

            </div>

            <!-- end card-box-->

        </div>

        <!-- end wrapper page -->





        <script>

            var resizefunc = [];

        </script>



        <!-- jQuery  -->

        <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>

        <script src="<?php echo base_url();?>assets/js/popper.min.js"></script><!-- Tether for Bootstrap -->

        <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

        <script src="<?php echo base_url();?>assets/js/detect.js"></script>

        <script src="<?php echo base_url();?>assets/js/fastclick.js"></script>

        <script src="<?php echo base_url();?>assets/js/jquery.blockUI.js"></script>

        <script src="<?php echo base_url();?>assets/js/waves.js"></script>

        <script src="<?php echo base_url();?>assets/js/jquery.nicescroll.js"></script>

        <script src="<?php echo base_url();?>assets/js/jquery.scrollTo.min.js"></script>

        <script src="<?php echo base_url();?>assets/js/jquery.slimscroll.js"></script>

        <script src="<?php echo base_url();?>assets/plugins/switchery/switchery.min.js"></script>



        <!-- App js -->

        <script src="<?php echo base_url();?>assets/js/jquery.core.js"></script>

        <script src="<?php echo base_url();?>assets/js/jquery.app.js"></script>



    </body>

</html>