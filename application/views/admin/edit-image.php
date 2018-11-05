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

                                    <h4 class="page-title float-left">Bottle Administration</h4>





                                    <div class="clearfix"></div>

                                </div>

                            </div>

                        </div>



                        <div class="row">

                            <div class="col-12">

                                <div class="alert alert-info alert-dismissible fade show" role="alert">

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                                        <span aria-hidden="true">×</span>

                                    </button>

                                    <p>

                                        <b>NOTE 1:</b> As part of the administration team for bottle usage approval, intellectual property, and other visuals, in all media and mediums, please select the proper category for the displayed bottle. Add notes if required.<br>
<br>


                                       <b>NOTE 2:</b> Approved bottles are items that can be used in our videos, brochures, signage with/without the public, with/without customers/affiliations/non-profit/community, with/without restrictions, are considered stipulations for the approval of each category to publish our bottles. You, as part of the administration team, must specify on the notes, if any of the bottles have restrictions or need detail notes for publishing.

                                    </p>

                                </div>

                            </div>

                        </div>

                        <form action="<?php echo base_url().'image/update_image' ?>" method="post" enctype="multipart/form-data" id="image-edit-form">

                        <input type="hidden" id="id" name="id" value="<?php echo $image->ID;?>">

                        <!-- image upload section -->

                        <div class="row equal-cols">

                            <div class="col-sm-3">

                                <div class="card-box frame">

                                    <input type="file" class="dropify" name="image" id="id_service_image" data-height="300" />

                                </div>

                            </div>

                            <div class="col-sm-9">

                                <div class="card-box">

                                    <div class="form-group row">

                                        <label for="bottle_name" class="col-3 col-form-label">Bottle Name:</label> <div class="col-9">

                                            <input class="form-control" type="text" value="<?php echo $image->bottle_name;?>" id="bottle_name" name="bottle_name" >

                                        </div>

                                    </div>

                                    <div class="form-group row">

                                        <label for="bottle_specs" class="col-3 col-form-label">Bottle Specs:</label> <div class="col-9">

                                            <input class="form-control" type="text" value="<?php echo $image->bottle_specs;?>" id="bottle_specs" name="bottle_specs">

                                        </div>

                                    </div>

                                    <div class="form-group row">

                                        <label for="market_served" class="col-3 col-form-label">Market Served:</label> <div class="col-9">

                                            <select class="form-control" id="market_served" name="market_served">

                                                <option>Aerosol</option>

                                                <option>Carbonated Soft Drinks and Water</option>

                                                <option>Consumer Cleaning</option>

                                                <option>Juice, Food and Dairy</option>

                                                <option>Automotive, Industrial and Agricultural Products</option>

                                                <option>Personal Care</option>

                                                <option>Alcoholic Beverages</option>

                                            </select>

                                        </div>

                                    </div>

                                    <div class="form-group row">

                                        <label for="plastipak_manufacturing_site" class="col-3 col-form-label">Plastipak Manufacturing Site: <small class="text-muted">(optional)</small></label> <div class="col-9">

                                            <input class="form-control" type="text" value="<?php echo $image->plastipak_manufacturing_site;?>" id="plastipak_manufacturing_site" name="plastipak_manufacturing_site">

                                        </div>

                                    </div>

                                    <div class="form-group row">

                                        <label for="onsite_manufacturing_site" class="col-3 col-form-label">On-Site Manufacturing Site: <small class="text-muted">(optional)</small></label> 

                                        <div class="col-9">

                                            <input class="form-control" type="text" value="<?php echo $image->onsite_manufacturing_site;?>" id="onsite_manufacturing_site" name="onsite_manufacturing_site">     

                                        </div>

                                    </div>

                                    <div class="form-group row">

                                        <label for="image_customer" class="col-3 col-form-label">Customer: <small class="text-muted">(optional)</small></label> 

                                        <div class="col-9">

                                            <input class="form-control" type="text" value="<?php echo $image->image_customer;?>" id="image_customer" name="image_customer"> 

                                        </div>

                                    </div>

                                    <div class="form-group row">

                                        <label for="market_global_location" class="col-3 col-form-label">Market Global Location: <small class="text-muted">(optional)</small></label> <div class="col-9">

                                            <input class="form-control" type="text" value="<?php echo $image->market_global_location;?>" id="market_global_location" name="market_global_location">

                                        </div>

                                    </div>

                                    <div class="form-group row">

                                        <label for="additional_info" class="col-3 col-form-label">Additional Info: <small class="text-muted">(optional)</small></label> <div class="col-9">

                                           <textarea class="form-control" id="additional_info" rows="5" name="additional_info"><?php echo $image->additional_info;?></textarea>

                                        </div>

                                    </div>

                                    

                                </div>

                            </div>

                        </div>

                        <!-- image upload section -->



                        <!-- categories section -->

                        <div class="row equal-cols custom-categories">

                            <div class="col-sm-4">

                                <div class="card-box">

                                    <h4>AUTHORIZATION CATEGORIES</h4>
                                    <small class="text-muted">These are the authorization types for bottle usage. </small><br>
                                    <div class="radio  radio-custom">

                                        <input type="radio" name="authorization_category" id="authorization_category" value="authorized_by_customer" <?php if(@$authorization->status=='authorized_by_customer'){ echo 'checked';}?>>

                                        <label for="authorization_category" class="authorized-customer">

                                            Authorized by Customer (okay to use)

                                        </label>

                                    </div>

                                    <div class="radio radio-custom">

                                        <input type="radio" name="authorization_category" id="not_authorization_category" value="not_authorized_by_customer" <?php if(@$authorization->status=='not_authorized_by_customer'){ echo 'checked';}?>>

                                        <label for="not_authorization_category" class="authorized-customer">

                                            Not Authorized by Customer (do not use)

                                        </label>

                                    </div>

                                    <div class="radio  radio-custom">

                                        <input type="radio" name="authorization_category" id="in_process_okay_to_use" value="in_process_okay_to_use"  <?php if(@$authorization->status=='in_process_okay_to_use'){ echo 'checked';}?>>

                                        <label for="in_process_okay_to_use" class="in-progress-customer">

                                            In Process to be Authorized by Customer (okay to use)

                                        </label>

                                    </div>
                                    <div class="radio  radio-custom">

                                        <input type="radio" name="authorization_category" id="in_process_dont_use" value="in_process_dont_use"  <?php if(@$authorization->status=='in_process_dont_use'){ echo 'checked';}?>>

                                        <label for="in_process_dont_use" class="in-progress-customer">

                                            In Process to be Authorized by Customer (okay to use)

                                        </label>

                                    </div>

                                    <div class="checkbox checkbox-primary">

                                        <input id="authorized_by_marketing" type="checkbox" name="authorized_by_marketing" value='1' <?php if(@$image->authorized_by_marketing=='1'){ echo 'checked';}?>>

                                        <label for="authorized_by_marketing">

                                            Authorized by  Marketing

                                        </label>

                                    </div>

                                    <div class="checkbox checkbox-primary">

                                        <input id="authorized_by_legal" type="checkbox" name="authorized_by_legal" value="1" <?php if(@$image->authorized_by_legal=='1'){ echo 'checked';}?>>

                                        <label for="authorized_by_legal">

                                            Authorized by Legal 

                                        </label>

                                    </div>

                                    <?php if($_SESSION['role']=='super_admin'):?>
                                        <div class="checkbox checkbox-primary">

                                            <input id="provitionally_approved_by_super_admin" type="checkbox" name="provitionally_approved_by_super_admin" value="1"  <?php if(@$image->provitionally_approved_by_super_admin=='1'){ echo 'checked';}?>>

                                            <label for="provitionally_approved_by_super_admin">

                                                Provitionally approved by Diego

                                            </label>

                                        </div>
                                        <div class="checkbox checkbox-primary">

                                            <input id="not_provitionally_approved_by_super_admin" type="checkbox" name="not_provitionally_approved_by_super_admin" value="1" <?php if(@$image->not_provitionally_approved_by_super_admin=='1'){ echo 'checked';}?>>

                                            <label for="not_provitionally_approved_by_super_admin">

                                                Not Provitionally approved by Diego

                                            </label>

                                        </div>
                                    <?php endif;?>

                                    </div>

                                </div>

                                <div class="col-md-8">
                                    <div class="card-box">

                                        <div class="tablehead">APPROVALS FOR MEDIA USAGE</div>
                                        <small class="text-muted">Check all that apply. </small><br><br>
                                        
                                        <div class="radio  radio-custom">

                                            <input id="approve_all_confidential_category" name="approve_all_confidential_category" type="radio"  >

                                            <label for="approve_all_confidential_category" data-toggle="tooltip" data-placement="top" title="" data-original-title="Approve all (okay to use)">Approve all (okay to use)
                                            </label>

                                        </div>

                                        <div class="radio  radio-custom">

                                            <input id="custom_confidential_category" name="approve_all_confidential_category" type="radio"  >

                                            <label for="custom_confidential_category" data-toggle="tooltip" data-placement="top" title="" data-original-title="Confidential (do not use)">Confidential (do not use)
                                            </label>

                                        </div>
<br>
                                        <h4>CUSTOM APPROVALS</h4>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="icon-20" style="padding-bottom:10px;font-weight:500" >INTERNAL</div>
                                                <div class="checkbox checkbox-primary">

                                                    <input id="confidential_internal_event_presentations" name="confidential_internal_event_presentations" type="checkbox" class="confidential_category" value="1" <?php if(@$confidential->internal_event_presentations=='1'){ echo 'checked';}?>>
                                                    <label for="confidential_internal_event_presentations">Internal Event Presentations / Communications
                                                    </label>

                                                </div>
                                                <div class="checkbox checkbox-primary">

                                                    <input id="confidential_capability_center_specific" name="confidential_capability_center_specific" type="checkbox" class="confidential_category" value="1" <?php if(@$confidential->capability_center_specific=='1'){ echo 'checked';}?>>
                                                    <label for="confidential_capability_center_specific">Capability Center Specific
                                                    </label>

                                                </div>
                                                <div class="checkbox checkbox-primary">

                                                    <input id="confidential_dmm_section_specific" name="confidential_dmm_section_specific" type="checkbox" class="confidential_category" value='1' <?php if(@$confidential->dmm_section_specific=='1'){ echo 'checked';}?>>
                                                    <label for="confidential_dmm_section_specific">DMM Specific
                                                    </label>

                                                </div>
                                                <div class="checkbox checkbox-primary">

                                                    <input id="confidential_summer_meeting_specific" name="confidential_summer_meeting_specific" type="checkbox" class="confidential_category" value='1' <?php if(@$confidential->summer_meeting_specific=='1'){ echo 'checked';}?>>
                                                    <label for="confidential_summer_meeting_specific">Summer Meeting Specific
                                                    </label>

                                                </div>
                                                <div class="checkbox checkbox-primary">

                                                    <input id="confidential_ctm_meeting_specific" name="confidential_ctm_meeting_specific" type="checkbox" class="confidential_category" value='1' <?php if(@$confidential->ctm_meeting_specific=='1'){ echo 'checked';}?>>
                                                    <label for="confidential_ctm_meeting_specific">CTM Meeting Specific
                                                    </label>

                                                </div>

                                                <div class="checkbox checkbox-primary">

                                                    <input id="print_media_brochures_posters" name="print_media_brochures_posters" type="checkbox" class="confidential_category" value='1' <?php if(@$confidential->print_media_brochures_posters=='1'){ echo 'checked';}?>>
                                                    <label for="print_media_brochures_posters">Print Media (brochures, posters) 
                                                    </label>

                                                </div>

                                                <div class="checkbox checkbox-primary">

                                                    <input id="confidential_other_meetings" name="confidential_other_meetings" type="checkbox" class="confidential_category" value='1' <?php if(@$confidential->other_meetings=='1'){ echo 'checked';}?>>
                                                    <label for="confidential_other_meetings">Other Meetings 
                                                    </label>

                                                </div>

                                                <div>

                                                    <input type="text" value="<?php echo @$confidential->other_meetings_info;?>" name="confidential_other_meetings_info" id="confidential_other_meetings_info" <?php if(@$confidential->other_meetings!='1'){ echo 'style="display:none;"';}?> placeholder="Other meetings info"  class="form-control">

                                                </div>

                                            </div>
                                            <div class="col-sm-6">
                                                <div class="icon-20" style="padding-bottom:10px;font-weight:500">EXTERNAL</div>
                                                <div class="checkbox checkbox-primary">

                                                    <input id="confidential_external_event_and_expo_presentations" name="confidential_external_event_and_expo_presentations" type="checkbox" class="confidential_category" value="1" <?php if(@$confidential->external_event_and_expo_presentations=='1'){ echo 'checked';}?>>
                                                    <label for="confidential_external_event_and_expo_presentations">
                                                        External Event and Expo Presentations / Communications
                                                    </label>

                                                </div>
                                                <div class="checkbox checkbox-primary">

                                                    <input id="external_meetings_with_customers" name="external_meetings_with_customers" type="checkbox" class="confidential_category" value="1" <?php if(@$confidential->external_meetings_with_customers=='1'){ echo 'checked';}?>>
                                                    <label for="external_meetings_with_customers">
                                                        External Meetings with Customers
                                                    </label>

                                                </div>
                                                <div class="checkbox checkbox-primary">

                                                    <input id="online_website_social_media" name="online_website_social_media" type="checkbox" class="confidential_category" value="1" <?php if(@$confidential->online_website_social_media=='1'){ echo 'checked';}?>>
                                                    <label for="online_website_social_media">
                                                        Online (website, social media)
                                                    </label>

                                                </div>
                                                <div class="checkbox checkbox-primary">

                                                    <input id="print_media_brochures_posters_ads" name="print_media_brochures_posters_ads" type="checkbox" class="confidential_category" value="1" <?php if(@$confidential->print_media_brochures_posters_ads=='1'){ echo 'checked';}?>>
                                                    <label for="print_media_brochures_posters_ads">
                                                        Print Media (brochures, posters, magazine ads)
                                                    </label>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                        </div>

                        <!-- categories section -->

                        <div class="row">

                            <div class="col-12">

                                
                                <a href="#preview-bottle-modal" onclick="preview_bottle()" class="waves-effect waves-light"  data-animation="fadein" data-plugin="custommodal" data-overlayspeed="200" data-overlaycolor="#36404a"><button type="button" class="btn btn-success waves-effect waves-light m-r-5 m-b-10" >Preview Bottle</button></a>
                                <button type="submit" class="btn btn-primary waves-effect waves-light m-r-5 m-b-10" >Update</button>  

                            </div>

                        </div>

                        </form>



                        <div class="card-box" style="margin-top:10px">

                                    <h4>Contact Administrator Team</h4>

                                    <small>Check the checkbox next to the Administrator name that you want to contact, then click the "Contact" button to contact them.</small>

                                        <table class="table table-striped m-t-20">

                                            <thead>

                                                <tr>

                                                    <td>

                                                        <div class="checkbox checkbox-primary">

                                                            <input id="select-all-admin" type="checkbox">

                                                            <label for="select-all-admin"><strong>Name</strong> <span class="text-muted"> (select all)</span></label>

                                                        </div>

                                                    </td>

                                                    <td><strong>Department</strong></td>

                                                    <td><strong>Email</strong></td>

                                                    <td><strong>Phone</strong></td>

                                                </tr>

                                            </thead>

                                            <tbody>

                                                <?php foreach($users as $user):?>

                                                    <tr>

                                                        <td>

                                                            <div class="checkbox checkbox-primary">

                                                            <input id='<?php echo $user->ID;?>' class="admin-checkbox" type="checkbox" data-name="<?php echo $user->FirstName.' '.$user->LastName;?>">

                                                                <label for='<?php echo $user->ID;?>'><?php echo $user->FirstName.' '.$user->LastName;?>

                                                            </label>

                                                            </div>

                                                        </td>

                                                        <td><?php echo $user->Department;?></td>

                                                        <td><?php echo $user->Email;?></td>

                                                        <td><?php echo $user->Phone;?></td>

                                                    

                                                    </tr>

                                                <?php endforeach;?>

                                            </tbody>

                                        </table>

                                        <a href="#custom-modal" onclick="populate_selected_users()" class="btn btn-primary waves-effect waves-light m-r-5 m-b-10" data-animation="fadein" data-plugin="custommodal" data-overlayspeed="200" data-overlaycolor="#36404a">Contact</a>

                                        </div>

                                    </div>

                            </div>



                    </div> <!-- container -->



                </div> <!-- content -->



            </div>

            <!-- End content-page -->

    <!-- ============================================================== -->

    <!-- End Right content here -->

    <!-- ============================================================== -->



    <div id="custom-modal" class="modal-demo" style="">

        <button type="button" class="close" onclick="Custombox.close();">

            <span>×</span><span class="sr-only">Close</span>

        </button>

        <h4 class="custom-modal-title">Contact Administrator Team</h4>

        <div class="custom-modal-text">
            <fieldset class="form-group">

                <label> To: </label> 
                <span id='selected-users-list'></span>

            </fieldset>

            <fieldset class="form-group">

                <label for="subject">Subject</label>

                <input type="email" class="form-control" id="subject" value="<?php echo $image->bottle_name;?>">

            </fieldset>

            <fieldset class="form-group">

                <label for="message">Message</label>

                <textarea class="form-control" id="message" rows="5"></textarea>

            </fieldset>

            <button type="button" class="btn btn-primary" id="send-message" title="Send Message">Send</button> 

        </div>

    </div>







<?php 

    $this->load->view('includes/footer_start');

?>

<!-- file uploads js -->

<script src="<?php echo base_url();?>assets/plugins/fileuploads/js/dropify.min.js"></script>



<script type="text/javascript">



        $("#id_service_image").attr("data-default-file", "<?php echo base_url();?>/uploads/<?php echo $image->filename;?>");

        $('.dropify').dropify({

            messages: {

                'default': 'Drag and drop an image here or click',

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

     $("#confidential_internal_event_presentations, #confidential_capability_center_specific, #confidential_dmm_section_specific, #confidential_summer_meeting_specific, #confidential_ctm_meeting_specific, #confidential_other_meetings, #print_media_brochures_posters, #confidential_external_event_and_expo_presentations, #external_meetings_with_customers, #online_website_social_media, #print_media_brochures_posters_ads").on("click",function(){
        $( "#approve_all_confidential_category" ).prop( "checked", false );
        $( "#custom_confidential_category" ).prop( "checked", false );
    });
    
    $("#approve_all_confidential_category").on("click",function(){
        var fields = $(".confidential_category");
        if($(this).is(":checked")){
            $.each(fields, function(key,val){
                $(val).prop('checked',true);
            });
            $("#confidential_other_meetings_info").show();
        } else{
            $.each(fields, function(key,val){
                $(val).prop('checked',false);;
            });
            $("#confidential_other_meetings_info").hide();
        }
    });
    
    $("#custom_confidential_category").on("click",function(){
        var fields = $(".confidential_category");
        if($(this).is(":checked")){
            $.each(fields, function(key,val){
                $(val).prop('checked',false);
            });
            $("#confidential_other_meetings_info").hide();
        } else{
            $.each(fields, function(key,val){
                $(val).prop('checked',true);;
            });
            $("#confidential_other_meetings_info").show();
        }
    });

    $("#approve_all_non_confidential_category").on("click",function(){
        var fields = $(".non_confidential_category");
        if($(this).is(":checked")){
            $.each(fields, function(key,val){
                $(val).prop('checked',true);
            });
        } else{
            $.each(fields, function(key,val){
                $(val).prop('checked',false);;
            });
        }
    });

    function populate_selected_users(){
        var fields = $(".admin-checkbox");

        var users = new Array();

        $.each(fields, function (key, field) {

            if ($(field).is(":checked")) {

                var name = $(field).data('name');

                users.push(name);
            }

        });
        $("#selected-users-list").html(users.join(", "));

    }

    function preview_bottle(){
        //get the values of all the inputs
        var bottle_name = $("#bottle_name").val();
        var bottle_specs = $("#bottle_specs").val();
        var plastipak_manufacturing_site = $("#plastipak_manufacturing_site").val();
        var onsite_manufacturing_site = $("#onsite_manufacturing_site").val();
        var image_customer = $("#image_customer").val();
        var market_global_location = $("#market_global_location").val();
        var additional_info = $("#additional_info").val();
        var market_served = $("#market_served").val();
        var id = $("#id").val();

        var image = $(".dropify-render").find('img').attr('src');
        
        var authorization_category = $("input[name=authorization_category]:checked").val();

        if($("#authorized_by_marketing").is(":checked")){
            var authorized_by_marketing = 1;
        }
        else{
            var authorized_by_marketing = 0;
        }

        if($("#authorized_by_legal").is(":checked")){
            var authorized_by_legal = 1;
        }
        else{
            var authorized_by_legal = 0;
        }

        if($("#confidential_internal_event_presentations").is(":checked")){
            var confidential_internal_event_presentations = 1;
        }
        else{
            var confidential_internal_event_presentations = 0;
        }

        if($("#confidential_external_event_and_expo_presentations").is(":checked")){
            var confidential_external_event_and_expo_presentations = 1;
        }
        else{
            var confidential_external_event_and_expo_presentations = 0;
        }

        if($("#confidential_capability_center_specific").is(":checked")){
            var confidential_capability_center_specific = 1;
        }
        else{
            var confidential_capability_center_specific = 0;
        }
        if($("#confidential_dmm_section_specific").is(":checked")){
            var confidential_dmm_section_specific = 1;
        }
        else{
            var confidential_dmm_section_specific = 0;
        }
        if($("#confidential_summer_meeting_specific").is(":checked")){
            var confidential_summer_meeting_specific = 1;
        }
        else{
            var confidential_summer_meeting_specific = 0;
        }
        if($("#confidential_ctm_meeting_specific").is(":checked")){
            var confidential_ctm_meeting_specific = 1;
        }
        else{
            var confidential_ctm_meeting_specific = 0;
        }
        if($("#confidential_other_meetings").is(":checked")){
            var confidential_other_meetings = 1;
        }
        else{
            var confidential_other_meetings = 0;
        }

        var confidential_other_meetings_info = $("#confidential_other_meetings_info").val();





        
        if($("#non_confidential_internal_event_presentations").is(":checked")){
            var non_confidential_internal_event_presentations = 1;
        }
        else{
            var non_confidential_internal_event_presentations = 0;
        }

        if($("#non_confidential_external_event_and_expo_presentations").is(":checked")){
            var non_confidential_external_event_and_expo_presentations = 1;
        }
        else{
            var non_confidential_external_event_and_expo_presentations = 0;
        }

        if($("#non_confidential_capability_center_specific").is(":checked")){
            var non_confidential_capability_center_specific = 1;
        }
        else{
            var non_confidential_capability_center_specific = 0;
        }
        if($("#non_confidential_dmm_section_specific").is(":checked")){
            var non_confidential_dmm_section_specific = 1;
        }
        else{
            var non_confidential_dmm_section_specific = 0;
        }
        if($("#non_confidential_summer_meeting_specific").is(":checked")){
            var non_confidential_summer_meeting_specific = 1;
        }
        else{
            var non_confidential_summer_meeting_specific = 0;
        }
        if($("#non_confidential_ctm_meeting_specific").is(":checked")){
            var non_confidential_ctm_meeting_specific = 1;
        }
        else{
            var non_confidential_ctm_meeting_specific = 0;
        }
        if($("#non_confidential_other_meetings").is(":checked")){
            var non_confidential_other_meetings = 1;
        }
        else{
            var non_confidential_other_meetings = 0;
        }

        var non_confidential_other_meetings_info = $("#non_confidential_other_meetings_info").val();

        var data = {
            bottle_name:bottle_name,
            bottle_specs:bottle_specs,
            plastipak_manufacturing_site : plastipak_manufacturing_site,
            onsite_manufacturing_site : onsite_manufacturing_site,
            image_customer : image_customer,
            market_global_location : market_global_location,
            additional_info : additional_info,
            market_served:market_served,
            image:image,
            status:authorization_category,
            authorized_by_marketing:authorized_by_marketing,
            authorized_by_legal:authorized_by_legal,
            confidential_internal_event_presentations:confidential_internal_event_presentations,
            confidential_external_event_and_expo_presentations:confidential_external_event_and_expo_presentations,
            confidential_capability_center_specific:confidential_capability_center_specific,
            confidential_dmm_section_specific:confidential_dmm_section_specific,
            confidential_summer_meeting_specific:confidential_summer_meeting_specific,
            confidential_ctm_meeting_specific:confidential_ctm_meeting_specific,
            confidential_other_meetings:confidential_other_meetings,
            confidential_other_meetings_info:confidential_other_meetings_info,
            non_confidential_internal_event_presentations:non_confidential_internal_event_presentations,
            non_confidential_external_event_and_expo_presentations:non_confidential_external_event_and_expo_presentations,
            non_confidential_capability_center_specific:non_confidential_capability_center_specific,
            non_confidential_dmm_section_specific:non_confidential_dmm_section_specific,
            non_confidential_summer_meeting_specific:non_confidential_summer_meeting_specific,
            non_confidential_ctm_meeting_specific:non_confidential_ctm_meeting_specific,
            non_confidential_other_meetings:non_confidential_other_meetings,
            non_confidential_other_meetings_info:non_confidential_other_meetings_info,
            ID:id
        };
        
        $.ajax({
            url:base_url+'ajax/modal?m=preview-bottle',
            data:data,
            method:'post',
            dataType:'html',
            success:function(data){
                $(".preview-bottle").html(data);
            }
        })
    }



    

</script>