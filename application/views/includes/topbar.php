<!-- Top Bar Start -->

            <?php $page = $this->router->fetch_class();?>
            <div class="topbar">



                <!-- LOGO -->

                <div class="topbar-left">

                    <a href="userdashboard.php" class="logo">

                        <span><img src="<?php echo base_url()?>assets/img/logo.png" /></span></a>

                </div>


                <nav class="navbar-custom <?php if(@$page=='admin') echo 'admintheme'; ?>">
                <?php if ($page === 'home'):?>
                    <p class="topbar-label">Welcome to Bottle Tracker, where you can browse approved and unapproved product images.</p>
                <?php else:?>
                    <div class="topbar-label"><span>You are logged in as an administrator on Bottle Tracker.</span></div>
                <?php endif;?>
                <button class="button-menu-mobile open-left waves-light waves-effect d-block d-md-none">
                                <i class="zmdi zmdi-menu"></i>
                            </button>
                    <?php if(isset($_SESSION['user_id'])):?>

                        <ul class="list-inline float-right mb-0">

                            <li class="list-inline-item dropdown notification-list">

                                <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"

                                aria-haspopup="false" aria-expanded="false">

                                    <img src="<?php echo base_url()?>assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle">

                                </a>

                                <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">

                                    <!-- item-->

                                    <div class="dropdown-item noti-title">

                                        <h5 class="text-overflow"><small>Welcome, <?php echo $_SESSION['first_name'];?>!</small> </h5>

                                    </div>



                                    <!-- item-->

                                    <a href="<?php echo base_url('user/profile');?>" class="dropdown-item notify-item">

                                        <i class="zmdi zmdi-account-circle"></i> <span>Profile</span>

                                    </a>



                                    <a href="<?php echo base_url('user/password');?>" class="dropdown-item notify-item">

                                        <i class="fa fa-asterisk"></i> <span>Change Password</span>

                                    </a>





                                    <!-- item-->

                                    <a href="<?php echo base_url('login/logout');?>" class="dropdown-item notify-item">

                                        <i class="zmdi zmdi-power"></i> <span>Logout</span>

                                    </a>



                                </div>

                            </li>

                        </ul>

                    <?php endif;?>



                </nav>



            </div>

            <!-- Top Bar End -->