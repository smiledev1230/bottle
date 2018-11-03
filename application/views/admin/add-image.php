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

                                    <h4 class="page-title float-left">Upload Image</h4>

                                    <div class="clearfix"></div>

                                </div>

                            </div>

                        </div>


                        <form action="<?php echo base_url().'image/add_image' ?>" method="post" enctype="multipart/form-data">

                        <!-- image upload section -->

                        <div class="row equal-cols">

                            <div class="col-sm-3">

                                <div class="card-box frame">

                                    <input type="file" class="dropify" name="image" data-height="300" />

                                </div>

                            </div>

                            <div class="col-sm-9">

                                <div class="card-box">

                                    <div class="form-group row">

                                        <label for="bottle_name" class="col-3 col-form-label">Bottle Name:</label> <div class="col-9">

                                            <input class="form-control" type="text" value="" id="bottle_name" name="bottle_name">

                                        </div>

                                    </div>

                                    <div class="form-group row">

                                        <label for="bottle_specs" class="col-3 col-form-label">Bottle Specs:</label> <div class="col-9">

                                            <input class="form-control" type="text" value="" id="bottle_specs" name="bottle_specs">

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

                                            <input class="form-control" type="text" value="" id="plastipak_manufacturing_site" name="plastipak_manufacturing_site">

                                        </div>

                                    </div>

                                    <div class="form-group row">

                                        <label for="onsite_manufacturing_site" class="col-3 col-form-label">On-Site Manufacturing Site: <small class="text-muted">(optional)</small></label> 

                                        <div class="col-9">

                                            <input class="form-control" type="text" value="" id="onsite_manufacturing_site" name="onsite_manufacturing_site">                                        

                                        </div>

                                    </div>

                                    <div class="form-group row">

                                        <label for="image_customer" class="col-3 col-form-label">Customer: <small class="text-muted">(optional)</small></label> 

                                        <div class="col-9">

                                            <input class="form-control" type="text" value="" id="image_customer" name="image_customer">                                        
                                        </div>

                                    </div>

                                    <div class="form-group row">

                                        <label for="market_global_location" class="col-3 col-form-label">Market Global Location: <small class="text-muted">(optional)</small></label> <div class="col-9">

                                            <input class="form-control" type="text" value="" id="market_global_location" name="market_global_location">

                                        </div>

                                    </div>

                                    <div class="form-group row">

                                        <label for="additional_info" class="col-3 col-form-label">Additional Info: <small class="text-muted">(optional)</small></label> <div class="col-9">

                                           <textarea class="form-control" id="additional_info" rows="5" name="additional_info"></textarea>

                                        </div>

                                    </div>

                                    

                                </div>

                            </div>

                        </div>

                        <!-- image upload section -->


                        <div class="row">

                            <div class="col-12">

                                <div class="alert alert-info alert-dismissible fade show" role="alert" style="padding-top:20px">

                                    <p>

                                        <b>NOTE 1:</b> As part of the administrative team for bottle usage approval, intellectual property, and other visuals in all media and mediums, please select the applicable approvals for the displayed bottle.

                                    </p>

                                </div>

                            </div>

                        </div>

                        <!-- categories section -->

                        <div class="row equal-cols custom-categories">

                            <div class="col-sm-4">

                                <div class="card-box">

                                            <div class="tablehead">AUTHORIZATION CATEGORIES</div>
                                            <small class="text-muted c-font-14">These are the authorization types for bottle usage. </small><br>
<br>

                                            <div class="radio  radio-custom">

                                                <input type="radio" name="authorization_category" id="authorization_category" value="authorized_by_customer">

                                                <label for="authorization_category">

                                                    Authorized by Customer (okay to use)

                                                </label>

                                            </div>

                                            

                                            <div class="radio radio-custom">

                                                <input type="radio" name="authorization_category" id="not_authorization_category" value="not_authorized_by_customer">

                                                <label for="not_authorization_category">

                                                    Not Authorized by Customer (do not use)

                                                </label>

                                            </div>

                                            <div class="radio  radio-custom">

                                                <input type="radio" name="authorization_category" id="in_process_okay_to_use" value="in_process_okay_to_use" checked>

                                                <label for="in_process_okay_to_use">

                                                    In Process to be Authorized by Customer (okay to use)

                                                </label>

                                            </div>
                                            <div class="radio  radio-custom">

                                                <input type="radio" name="authorization_category" id="in_process_dont_use" value="in_process_dont_use" checked>

                                                <label for="in_process_dont_use">

                                                    In Process to be Authorized by Customer (okay to use)

                                                </label>

                                            </div>

                                            <div class="checkbox checkbox-primary">

                                                <input id="pending_authorization_requested" type="checkbox" name="pending_authorization_requested" value='1'>

                                                <label for="pending_authorization_requested">Pending Authorization Requested

                                                </label>

                                            </div>

                                            <div class="checkbox checkbox-primary">

                                                <input id="authorized_by_marketing" type="checkbox" name="authorized_by_marketing" value='1'>

                                                <label for="authorized_by_marketing">

                                                    Authorized by  Marketing

                                                </label>

                                            </div>

                                            <div class="checkbox checkbox-primary">

                                                <input id="authorized_by_legal" type="checkbox" name="authorized_by_legal" value="1">

                                                <label for="authorized_by_legal">

                                                    Authorized by Legal 

                                                </label>

                                            </div>
                                            <?php if($_SESSION['role']=='super_admin'):?>
                                                <div class="checkbox checkbox-primary">

                                                    <input id="provitionally_approved_by_super_admin" type="checkbox" name="provitionally_approved_by_super_admin" value="1">

                                                    <label for="provitionally_approved_by_super_admin">

                                                        Provitionally approved by Diego

                                                    </label>

                                                </div>
                                                <div class="checkbox checkbox-primary">

                                                    <input id="not_provitionally_approved_by_super_admin" type="checkbox" name="not_provitionally_approved_by_super_admin" value="1">

                                                    <label for="not_provitionally_approved_by_super_admin">

                                                        Not Provitionally approved by Diego

                                                    </label>

                                                </div>
                                            <?php endif;?>

                                    </div>

                                </div>

                                

                                <div class="col-sm-4">

                                        <div class="card-box">

                                                <h4>CONFIDENTIAL CATEGORY</h4>

                                                <div class="checkbox checkbox-primary">

                                                    <input id="approve_all_confidential_category" type="checkbox"  >

                                                    <label for="approve_all_confidential_category" data-toggle="tooltip" data-placement="top" title="" data-original-title="Approve all categories  (it will check all the boxes)">APPROVE ALL

                                                    </label>

                                                </div>

                                                <div class="checkbox checkbox-primary">

                                                    <input id="confidential_internal_event_presentations" name="confidential_internal_event_presentations" type="checkbox" class="confidential_category" value="1">

                                                    <label for="confidential_internal_event_presentations">Internal Event Presentations

                                                    </label>

                                                </div>

                                                <div class="checkbox checkbox-primary">

                                                    <input id="confidential_external_event_and_expo_presentations" name="confidential_external_event_and_expo_presentations" type="checkbox" class="confidential_category" value="1">

                                                    <label for="confidential_external_event_and_expo_presentations">

                                                        External Event and Expo Presentations

                                                    </label>

                                                </div>

                                                <div class="checkbox checkbox-primary">

                                                    <input id="confidential_capability_center_specific" name="confidential_capability_center_specific" type="checkbox" class="confidential_category" value="1">

                                                    <label for="confidential_capability_center_specific">

                                                        Capability Center Specific

                                                    </label>

                                                </div>

                                                <div class="checkbox checkbox-primary">

                                                    <input id="confidential_dmm_section_specific" name="confidential_dmm_section_specific" type="checkbox" class="confidential_category" value='1'>

                                                    <label for="confidential_dmm_section_specific">

                                                        DMM Section Specific

                                                    </label>

                                                </div>

                                                <div class="checkbox checkbox-primary">

                                                    <input id="confidential_summer_meeting_specific" name="confidential_summer_meeting_specific" type="checkbox" class="confidential_category" value='1'>

                                                    <label for="confidential_summer_meeting_specific">

                                                        Summer Meeting Specific

                                                    </label>

                                                </div>

                                                <div class="checkbox checkbox-primary">

                                                    <input id="confidential_ctm_meeting_specific" name="confidential_ctm_meeting_specific" type="checkbox" class="confidential_category" value='1'>

                                                    <label for="confidential_ctm_meeting_specific">

                                                        CTM Meeting Specific

                                                    </label>

                                                </div>

                                                <div class="checkbox checkbox-primary">

                                                    <input id="confidential_other_meetings" name="confidential_other_meetings" type="checkbox" class="" value='1'>

                                                    <label for="confidential_other_meetings">

                                                            Other Meetings 

                                                    </label>

                                                </div>

                                                <div>

                                                    <input type="text" name="confidential_other_meetings_info" id="confidential_other_meetings_info" style="display:none;" placeholder="Other meetings info" class="form-control">

                                                </div>

                                        </div>

                                    </div>

                                    

                                <div class="col-sm-4">

                                        

                                        <div class="card-box">

                                                <h4>NON CONFIDENTIAL CATEGORY</h4>

                                                <div class="checkbox checkbox-primary">

                                                    <input id="approve_all_non_confidential_category" type="checkbox"  >

                                                    <label for="approve_all_non_confidential_category" data-toggle="tooltip" data-placement="top" title="" data-original-title="Approve all categories  (it will check all the boxes)">APPROVE ALL

                                                    </label>

                                                </div>

                                                <div class="checkbox checkbox-primary">

                                                    <input id="non_confidential_internal_event_presentations" name="non_confidential_internal_event_presentations" type="checkbox" class="non_confidential_category" value="1">

                                                    <label for="non_confidential_internal_event_presentations">Internal Event Presentations / Communications

                                                    </label>

                                                </div>

                                                <div class="checkbox checkbox-primary">

                                                    <input id="non_confidential_external_event_and_expo_presentations" name="non_confidential_external_event_and_expo_presentations" type="checkbox" class="non_confidential_category" value="1">

                                                    <label for="non_confidential_external_event_and_expo_presentations">

                                                        External Event and Expo Presentations / Communications

                                                    </label>

                                                </div>

                                                <div class="checkbox checkbox-primary">

                                                    <input id="non_confidential_capability_center_specific" name="non_confidential_capability_center_specific" type="checkbox" class="non_confidential_category" value="1">

                                                    <label for="non_confidential_capability_center_specific">

                                                        Capability Center Specific

                                                    </label>

                                                </div>

                                                <div class="checkbox checkbox-primary">

                                                    <input id="non_confidential_dmm_section_specific" name="non_confidential_dmm_section_specific" type="checkbox" class="non_confidential_category" value='1'>

                                                    <label for="non_confidential_dmm_section_specific">

                                                        DMM Section Specific

                                                    </label>

                                                </div>

                                                <div class="checkbox checkbox-primary">

                                                    <input id="non_confidential_summer_meeting_specific" name="non_confidential_summer_meeting_specific" type="checkbox" class="non_confidential_category" value='1'>

                                                    <label for="non_confidential_summer_meeting_specific">

                                                        Summer Meeting Specific

                                                    </label>

                                                </div>

                                                <div class="checkbox checkbox-primary">

                                                    <input id="non_confidential_ctm_meeting_specific" name="non_confidential_ctm_meeting_specific" type="checkbox" class="non_confidential_category" value='1'>

                                                    <label for="non_confidential_ctm_meeting_specific">

                                                        CTM Meeting Specific

                                                    </label>

                                                </div>

                                                <div class="checkbox checkbox-primary">

                                                    <input id="non_confidential_other_meetings" name="non_confidential_other_meetings" type="checkbox" class="" value='1'>

                                                    <label for="non_confidential_other_meetings">

                                                            Other Meetings 

                                                    </label>

                                                </div>

                                                <div>

                                                    <input type="text" name="non_confidential_other_meetings_info" id="non_confidential_other_meetings_info" style="display:none;" placeholder="Other meeting info" class="form-control">

                                                </div>

                                        </div>

                                    </div>

                                    

                        </div>

                        <!-- categories section -->

                        <div class="row">

                            <div class="col-12">

                                <button type="submit" class="btn btn-primary waves-effect waves-light m-r-5 m-b-10" >Save</button>  

                            </div>

                        </div>

                        </form>


                        <div class="row" style="padding-top:10px">

                            <div class="col-12">

                                <div class="alert alert-info alert-dismissible fade show" role="alert" style="padding-top:20px">

                                    <p>

                                       <b>NOTE 2:</b> Approved bottles are items that can be used in our videos, brochures, and signage with/without the public, with/without customers/affiliations/non-profit/community, and with/without restrictions which are considered stipulations for the approval of each category. You, as part of the administrative team, must specify in the notes if any of the bottles have restrictions or need detailed notes for publishing.

                                    </p>

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









<?php 

    $this->load->view('includes/footer_start');

?>

<!-- file uploads js -->

<script src="<?php echo base_url();?>assets/plugins/fileuploads/js/dropify.min.js"></script>



<script type="text/javascript">

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