 <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">

                <div class="sidebar-inner slimscrollleft">

                

                    <!--- Sidemenu -->

                    <div id="sidebar-menu">

                        <ul>

                           <li>

                                <img src="<?php echo base_url()?>assets/img/bottletrackerlogo.jpg" style="max-width:100%"/>

                           </li>


                            <?php $segment = $this->uri->segment(1);?>
                             <li <?php if(empty($segment)){ echo 'class="active"';} ?> >

                                <a href="<?php echo base_url('home');?>" class="waves-effect <?php if(empty($segment)){ echo 'active';} ?>"><i class="zmdi zmdi-view-dashboard"></i><span> Home</span> </a>

                            </li>

                             

                            <?php if(isset($_SESSION['role']) && ($_SESSION['role']=='admin' || $_SESSION['role']=='super_admin')):?>

                                <li>

                                    <a href="<?php echo base_url('dashboard');?>" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i><span>Admin Dashboard</span> </a>

                                </li>

                                <li>

                                    <a href="<?php echo base_url('team');?>" class="waves-effect"><i class="fa fa-address-book"></i><span> Admin Team</span> </a>

                                </li>

                                

                                <li>

                                    <a href="<?php echo base_url('image/add');?>" class="waves-effect"><i class="zmdi zmdi-cloud-upload"></i><span>Upload Image</span> </a>

                                </li>

                            <?php endif;?>

                            <?php if(isset($_SESSION['role']) && $_SESSION['role']=='super_admin'):?>

                                <li>

                                    <a href="<?php echo base_url('team/add');?>" class="waves-effect"><i class="icon-user"></i><span>Add Admin</span> </a>

                                </li>
                                <li>

                                    <a href="<?php echo base_url('dashboard/download_history');?>" class="waves-effect"><i class="zmdi zmdi-cloud-download"></i><span>Download History</span> </a>

                                </li>

                            <?php endif;?>
                            <?php if(!isset($_SESSION['user_id'])):?>
                                <li>
                                    <a href="<?php echo base_url('login');?>" class="waves-effect"><i class="fa fa-sign-in"></i><span>Login</span> </a>
                                </li>
                            <?php endif;?>

                        </ul>

                        <div class="clearfix"></div>

                    </div>

                    <!-- Sidebar -->

                    <div class="clearfix"></div>



                </div>



            </div>

            <!-- Left Sidebar End -->