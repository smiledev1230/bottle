                            <!-- content -->
                            <div class="custom-modal-text preview-bottle">
                             <!-- thumb / description starts here -->
                              <div class="row equal-cols">
                            <div class="col-md-2 col-sm-12 col-xs-12">
                                    <div class="card-box text-center">

                                            <img src="<?php echo $image->image;?>" class="img-fluid" data-toggle="tooltip" data-placement="top" title="" data-original-title="">

                                        </div>

                            </div>

                            <div class="col-md-4 col-sm-12 col-xs-12">

                                <div class="card-box">

                                    <p> 

                                        <strong>Bottle Name:</strong>  <?php echo $image->bottle_name;?><br>

                                        <strong>Specs:</strong> <?php echo $image->bottle_specs;?><br>

                                        <strong>Market Served:</strong> <?php echo $image->market_served;?><br>

                                        <strong>Plastipak Manufacturing Site:</strong> <?php echo $image->plastipak_manufacturing_site;?><br>

                                        <strong>On-Site Manufacturing Site:</strong> <?php echo $image->onsite_manufacturing_site;?><br>

                                        <strong>Customer:</strong> <?php echo $image->image_customer;?><br>

                                        <strong>Market Global Location:</strong> <?php echo $image->market_global_location;?><br>

                                        <?php if(!empty($image->additional_info)):?>

                                        <strong>Additional Info:</strong> <?php echo $image->additional_info;?>

                                        <?php endif;?>

                                    </p>

                                </div>

                            </div>

                            

                            <div class="col-md-6 col-sm-12 col-xs-12">

                                

                                <div id="contact-admin" class="card-box" style="display:none">

                                 <p><strong>Contact Administrator Team</strong></p>

                            

                           <div class="text-muted m-b-20"> Thank you for contacting John Lee, Diego Bianco, Jane Smith. <br>

                            Please use the box below to send your message.</div>

                               <fieldset class="form-group">

                                                    <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Enter message here"></textarea>

                                                </fieldset>

                                           <button class="btn btn-primary waves-effect waves-light btn-sm" id="submit-btn" role="button" >Submit</button>  

                                           <button class="btn btn-primary waves-effect waves-light btn-sm" id="cancel-btn" role="button" >Cancel</button>

								</div>    

                                <div id="admin-team" class="card-box">

                                <p class="text-center"><strong>Admin Team </strong><span class="text-muted">(select the checkboxes and click contact)</span></p>

                             <div class="row">   

                            <div class="col-md-6 col-sm-12 col-xs-12">

                                <table id="tech-companies-1" class="table table-striped table-bordered previewtable">

                                                

                                                <tbody>

                                                <tr>

                                                    <td data-org-colspan="1" data-columns="tech-companies-1-col-0"><div class="checkbox checkbox-primary">

                                                    <strong>Name</strong>

                                                    </div></td>

                                                    <td data-org-colspan="1" data-priority="1" data-columns="tech-companies-1-col-1" colspan="1"><strong>Department</strong></td>

                                                    <td data-org-colspan="1" data-priority="3" data-columns="tech-companies-1-col-2" colspan="1"><strong>Status</strong></td>

                                                </tr>

                                                <?php $total = count($users); $half = $total/2;?>

                                                <?php foreach($users as $key => $user): if($key==$half) break;?>

                                                <?php $status = $this->image_model->getAuthorizationStatus($image->ID,$user->ID);?>

                                                <tr>

                                                    <td data-org-colspan="1" data-columns="tech-companies-1-col-0"><div class="checkbox checkbox-primary">

                                                    <?php echo $user->FirstName.' '.$user->LastName;?>

                                                    </div></td>

                                                    <td data-org-colspan="1" data-priority="1" data-columns="tech-companies-1-col-1" colspan="1"><?php echo $user->Department;?></td>

                                                    <td data-org-colspan="1" data-priority="3" data-columns="tech-companies-1-col-2" colspan="1" class="<?php if($status=='Approved') {echo 'green';} else if($status=='Not Approved'){ echo 'red';}?>">

                                                        <?php echo $status;?>

                                                    </td>

                                                </tr>

                                                <?php endforeach;?>

                                                </tbody>

                                            </table>

                                            </div>

                                               

                            <div class="col-md-6 col-sm-12 col-xs-12">

                               

                               <table id="tech-companies-1" class="table table-striped table-bordered previewtable">

                                                

                                                <tbody>

                                                <tr>

                                                    <td data-org-colspan="1" data-columns="tech-companies-1-col-0"><div class="checkbox checkbox-primary">

                                                    <strong>Name</strong>

                                                    </div></td>

                                                    <td data-org-colspan="1" data-priority="1" data-columns="tech-companies-1-col-1" colspan="1"><strong>Department</strong></td>

                                                    <td data-org-colspan="1" data-priority="3" data-columns="tech-companies-1-col-2" colspan="1"><strong>Status</strong></td>

                                                </tr>

                                                <?php $total = count($users); $half = $total/2;?>

                                                <?php foreach($users as $key => $user): if($key<$half) continue;?>

                                                <?php $status = $this->image_model->getAuthorizationStatus($image->ID,$user->ID);?>

                                                <tr>

                                                    <td data-org-colspan="1" data-columns="tech-companies-1-col-0"><div class="checkbox checkbox-primary">

                                                    <?php echo $user->FirstName.' '.$user->LastName;?>

                                                    </div></td>

                                                    <td data-org-colspan="1" data-priority="1" data-columns="tech-companies-1-col-1" colspan="1"><?php echo $user->Department;?></td>

                                                    <td data-org-colspan="1" data-priority="3" data-columns="tech-companies-1-col-2" colspan="1" class="<?php if($status=='Approved') {echo 'green';} else if($status=='Not Approved'){ echo 'red';}?>">

                                                        <?php echo $status;?>

                                                    </td>

                                                </tr>

                                                <?php endforeach;?>

                                                

                                                </tbody>

                                            </table>

                                            </div>

                                           </div>

                                           <p class="text-center" style="margin-bottom:0px!important">

                                           </p>

                                </div>

                            </div>

                        </div>

                             <!-- thumb / description ends here -->



                             <!-- category -->

                             <div class="row equal-cols ">



                             <div class="col-md-4 col-sm-12 col-xs-12">

                                        

                                    <div class="card-box">

                                            <h4>AUTHORIZATION CATEGORIES</h4>

                                            <?php if($image->status=='authorized_by_customer'):?>

                                                <div class="radio radio-custom custom-tooltip">

                                                <a data-tooltip="This bottle has been Authorized to use">

                                                        <i class="fa fa-check-square-o green"></i> Authorized by Customer (okay to use)

                                                    </a>

                                                </div>

                                            <?php elseif($image->status=='not_authorized_by_customer'):?>

                                                <div class="radio radio-custom">

                                                    <i class="fa fa-times-rectangle red"></i> Not Authorized by Customer (do not use)

                                                </div>

                                            <?php else:?>

                                                <div class="checkbox checkbox-primary">

                                                    <i class="fa fa-square-o text-muted"></i> Authorization Pending

                                                </div>

                                            <?php endif;?>



                                            <?php if($image->authorized_by_marketing==1):?>

                                                <div class="checkbox checkbox-primary custom-tooltip">

                                                    <a data-tooltip="I’m the tooltip text part 3.">

                                                    <i class="fa fa-check-square-o green"></i> Authorized by Marketing 

                                                </a>

                                                </div>

                                            <?php else:?>

                                                <div class="checkbox checkbox-primary">

                                                    <i class="fa fa-square-o text-muted"></i> Authorized by Marketing 

                                                </div>

                                            <?php endif;?>

                                            <?php if($image->authorized_by_legal==1):?>

                                                <div class="checkbox checkbox-primary custom-tooltip">

                                                    <a data-tooltip="I’m the tooltip text part 3.">

                                                    <i class="fa fa-check-square-o green"></i> Authorized by Legal 

                                                </a>

                                                </div>

                                            <?php else:?>

                                                <div class="checkbox checkbox-primary">

                                                    <i class="fa fa-square-o text-muted"></i> Authorized by Legal 

                                                </div>

                                            <?php endif;?>

                                    </div>

                                </div>



                                <div class="col-md-4 col-sm-12 col-xs-12">

                                        <div class="card-box">

                                                <h4>CONFIDENTIAL CATEGORY</h4>

                                                <?php if($image->confidential_internal_event_presentations==1):?>

                                                    <div class="checkbox checkbox-primary">

                                                        <i class="fa fa-check-square-o green"></i> Internal Event Presentations

                                                    </div>

                                                <?php else:?>

                                                        <div class="checkbox checkbox-primary">

                                                            <i class="fa fa-square-o text-muted"></i> Internal Event Presentations

                                                        </div>

                                                <?php endif;?>



                                                <?php if($image->confidential_external_event_and_expo_presentations	==1):?>

                                                    <div class="checkbox checkbox-primary">

                                                        <i class="fa fa-check-square-o green"></i> External Event and Expo Presentations

                                                    </div>

                                                <?php else:?>

                                                        <div class="checkbox checkbox-primary">

                                                            <i class="fa fa-square-o text-muted"></i> External Event and Expo Presentations

                                                        </div>

                                                <?php endif;?>



                                                <?php if($image->confidential_capability_center_specific	==1):?>

                                                    <div class="checkbox checkbox-primary">

                                                        <i class="fa fa-check-square-o green"></i> Capability Center Specific

                                                    </div>

                                                <?php else:?>

                                                        <div class="checkbox checkbox-primary">

                                                            <i class="fa fa-square-o text-muted"></i> Capability Center Specific

                                                        </div>

                                                <?php endif;?>



                                                <?php if($image->confidential_dmm_section_specific	==1):?>

                                                    <div class="checkbox checkbox-primary">

                                                        <i class="fa fa-check-square-o green"></i> DMM Section Specific

                                                    </div>

                                                <?php else:?>

                                                        <div class="checkbox checkbox-primary">

                                                            <i class="fa fa-square-o text-muted"></i> DMM Section Specific

                                                        </div>

                                                <?php endif;?>



                                                <?php if($image->confidential_summer_meeting_specific	==1):?>

                                                    <div class="checkbox checkbox-primary">

                                                        <i class="fa fa-check-square-o green"></i> Summer Meeting Specific

                                                    </div>

                                                <?php else:?>

                                                        <div class="checkbox checkbox-primary">

                                                            <i class="fa fa-square-o text-muted"></i> Summer Meeting Specific

                                                        </div>

                                                <?php endif;?>



                                                <?php if($image->confidential_ctm_meeting_specific==1):?>

                                                    <div class="checkbox checkbox-primary">

                                                        <i class="fa fa-check-square-o green"></i> CTM Meeting Specific

                                                    </div>

                                                <?php else:?>

                                                        <div class="checkbox checkbox-primary">

                                                            <i class="fa fa-square-o text-muted"></i> CTM Meeting Specific

                                                        </div>

                                                <?php endif;?>



                                                <?php if($image->confidential_other_meetings==1):?>

                                                    <div class="checkbox checkbox-primary"><i class="fa fa-check-square-o green"></i>  Other Meetings: <?php echo $image->confidential_other_meetings_info;?></div>

                                                <?php endif;?>

                                                

                                        </div>

                                    </div>

                                <div class="col-md-4 col-sm-12 col-xs-12">

                                        

                                        <div class="card-box">

                                                <h4>NON CONFIDENTIAL CATEGORY</h4>

                                                

                                                <?php if($image->non_confidential_internal_event_presentations==1):?>

                                                    <div class="checkbox checkbox-primary">

                                                        <i class="fa fa-check-square-o green"></i> Internal Event Presentations

                                                    </div>

                                                <?php else:?>

                                                        <div class="checkbox checkbox-primary">

                                                            <i class="fa fa-square-o text-muted"></i> Internal Event Presentations

                                                        </div>

                                                <?php endif;?>



                                                <?php if($image->non_confidential_external_event_and_expo_presentations	==1):?>

                                                    <div class="checkbox checkbox-primary">

                                                        <i class="fa fa-check-square-o green"></i> External Event and Expo Presentations

                                                    </div>

                                                <?php else:?>

                                                        <div class="checkbox checkbox-primary">

                                                            <i class="fa fa-square-o text-muted"></i> External Event and Expo Presentations

                                                        </div>

                                                <?php endif;?>



                                                <?php if($image->non_confidential_capability_center_specific	==1):?>

                                                    <div class="checkbox checkbox-primary">

                                                        <i class="fa fa-check-square-o green"></i> Capability Center Specific

                                                    </div>

                                                <?php else:?>

                                                        <div class="checkbox checkbox-primary">

                                                            <i class="fa fa-square-o text-muted"></i> Capability Center Specific

                                                        </div>

                                                <?php endif;?>



                                                <?php if($image->non_confidential_dmm_section_specific	==1):?>

                                                    <div class="checkbox checkbox-primary">

                                                        <i class="fa fa-check-square-o green"></i> DMM Section Specific

                                                    </div>

                                                <?php else:?>

                                                        <div class="checkbox checkbox-primary">

                                                            <i class="fa fa-square-o text-muted"></i> DMM Section Specific

                                                        </div>

                                                <?php endif;?>



                                                <?php if($image->non_confidential_summer_meeting_specific	==1):?>

                                                    <div class="checkbox checkbox-primary">

                                                        <i class="fa fa-check-square-o green"></i> Summer Meeting Specific

                                                    </div>

                                                <?php else:?>

                                                        <div class="checkbox checkbox-primary">

                                                            <i class="fa fa-square-o text-muted"></i> Summer Meeting Specific

                                                        </div>

                                                <?php endif;?>



                                                <?php if($image->non_confidential_ctm_meeting_specific==1):?>

                                                    <div class="checkbox checkbox-primary">

                                                        <i class="fa fa-check-square-o green"></i> CTM Meeting Specific

                                                    </div>

                                                <?php else:?>

                                                        <div class="checkbox checkbox-primary">

                                                            <i class="fa fa-square-o text-muted"></i> CTM Meeting Specific

                                                        </div>

                                                <?php endif;?>



                                                <?php if($image->non_confidential_other_meetings==1):?>

                                                    <div class="checkbox checkbox-primary"><i class="fa fa-check-square-o green"></i>  Other Meetings: <?php echo $image->non_confidential_other_meetings_info;?></div>

                                                <?php endif;?>

                                        </div>

                                    </div>

                        </div>

                        <div class="row">

                        <div class="col-sm-12">

                        

                                        <div class="card-box" style="margin-bottom:0px">

                         <i class="fa fa-check-square-o green"></i>  OKAY TO USE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-times-rectangle red"></i> DO NOT USE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-square-o text-muted"></i>  OPTION NOT CHOSEN

                         </div>

                        </div>

                        </div>

                            



                <!-- Preview Bottle Modal Ends Here -->

                

              