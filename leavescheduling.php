<!-- Page Heading -->  
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 
<div class="">

<?php $currentyear=date("Y"); ?>
    <div class="card-body"style="background-color:#fff">
        <div class="row">
    <!--<div class="col-md-2 m-4">
            <button class="btn btn btnleave" onclick=scheduedates() id="btnschedule">Schedule Dates</button>
    </div> !--> 
   <!-- <div class="col-md-3 m-4">
        <a href="<?php //echo base_url('') .'admin/a_emergeleave' ?>" class="btn btn btnleave" id="btnschedule">Emergency Leave</a>
          
    </div> 
    !-->
    <br>
    </div>

 <?php if($days==$totalscheduled){
   
 }else{
    
    ?>
        <form action="<?php echo base_url().'admin/scheduleddates' ?>" id="" method="post">
             <h1 class="h3 mb-0 text-gray-800" style="text-decoration: underline;">Leave Scheduling </h1>
          
            
             <?php// if($id==3){?>
               <!-- <div class='isa_warning'>Please Choose Dates for your leave schedule</div> !-->
             <?php //} ?>
             <div class="isa_info">
                <h5>Leave Entitlement(Total Entitlement for the year less 10 days for December leave):<?php echo $days_sum=$entitleddays-10; ?> days</h5>
                
                <?php $daystobescheduled=$days_sum +$balances;  ?> 
                <h5>You are required to Schedule all your <?php echo $daystobescheduled; ?> days before submitting for approval</h5>
             
             </div>
             <div class="isa-warning">
             <?php
        if(isset($_GET['pesan'])){
            if($_GET['pesan'] == "mor"){
                echo '<div class="alert alert-danger text-left" role="alert"><strong>You have scheduled more days than your entitled days!</strong><br></div>';
            } else if($_GET['pesan'] == "done"){
                echo '<div class="alert alert-success text-left" role="alert">You Have already scheduled all your days!</div>';
            } else if($_GET['pesan'] == "edmor"){
                echo '<div class="alert alert-success text-left" role="alert">You Have Rescheduled more days than expected!</div>';
            }
            else if($_GET['pesan'] == "edles"){
                echo '<div class="alert alert-success text-left" role="alert">You Have Rescheduled less days than expected!</div>';
            }
             else if($_GET['pesan'] == "les"){
              echo '<div class="alert alert-danger text-left" role="alert">You have scheduled less days than your entitled days!</div>';
          }
            /* else if($_GET['pesan'] == "belumlogin"){
                echo '<div class="alert alert-warning text-left" role="alert">Session Expired!Login Again</div>';
            }*/
        }
        ?>
             </div>
             <br>
        <div class="row">
            <div class="col-sm-5">

           
        <div class="row" style="display:block;border-right: solid 1px lightgrey;" >
      
                <div class="col-sm-12" id="attachdocument">
                    <div class="form-group">
                        <label class="form-label" id="labelattachdocument">Start Date</label> <span style="color: red;">*</span>
                        <div class=""><input type="date" class="form-control" id="start_date" name="start_date" onchange="getStartDate()"></div>
                    
                    </div>
                </div>
                <div class="col-sm-12" id="attachdocument">
                    <div class="form-group">
                        <label class="form-label" id="labelattachdocument">End Date</label> <span style="color: red;">*</span>
                        <div class="">
                            <input type="hidden" class="form-control" id="daystoschedule" value="<?php echo $daystobescheduled; ?>" name="days_toschedule">
                            <input type="date" class="form-control" id="end_date" name="end_date">
                            <input type="hidden" class="form-control" id="daysscheduled" value="" name="daysscheduled">

                            
                        </div>
                    
                    </div>
                </div>
                <div class="col-sm-12" id="" >
                  
                    <button type="button" id="btnschedule" class="btn btn-primary" onclick="addSelectedDates()">Add</button>
  
                </div>
        </div>
    </div>
    <div class="col-sm-5">
        <div class="row" style="display:block">
                
               
                <div class="col-sm-12" id="selecteddatesdiv" style="display:none;">
                
                    <div class="form-group">
                        <label class="form-label" id="">Selected Dates</label>
                        <div class="">
                            <select name="dates" cols="10" id="dates" class="selectval" style="max-width:90%;width:100%" size="5">
                            </select>
                            
                           
                        </div>
                    </div>
                    
                </div>
                <div class="col-sm-6" id="selectedremovediv" style="display:none;">
                    <input type="button" onclick="myFunction()" value="Remove"></button>
                </div>
        </div>  
        <div class="row">     
              
                <div class="col-sm-2" id="selecteddatesdiv" style="">
                        
                </div>
               
                <div class="col-sm-8">
                <input type="hidden" name="selected_dates" id="selected_dates" value="">
                </div>
                  
               
              
              
                    </div>
                </div>
               
     
        </div>
        <div class="row">
        <div class="col-sm-10 text-center">
                    <hr>
                    <button type="submit" style="display:none" id="btnsubmit" onclick="SubmitValues()" class="btn btn-primary pull-right">Submit For Approval</button>
                </div>
        </div>


         <div class="form-group">
               
            </div>
        </form>
    </div>
    <br>

</div>

<?php } ?>



<!-- Display Scheduled Dates !-->
<div class="card shadow mb-4">
<div class="d-sm-flex align-items-center justify-content-between m-4">
    <h3 class="h3 mb-0 text-gray-800"> My Leave Schedule </h3>
</div>
<?php
        if(isset($_GET['pesan'])){
             if($_GET['pesan'] == "edmor"){
                echo '<div class="alert alert-danger text-left" role="alert">You Have Rescheduled more days than expected!</div>';
            }
            else if($_GET['pesan'] == "edles"){
                echo '<div class="alert alert-danger text-left" role="alert">You Have Rescheduled less days than expected!</div>';
            }
            
            
        }
        ?>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th> 
                       
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Days</th>
                        <th>Status</th>
                        <th>Action</th>
                     
                    </tr>
                </thead>
                <tbody>
                
                <?php 
                $no=1;
               
               /* $to_day=date('Y-m-d');
                $startdates=getleaveSchedulesStartDate($session,$to_day);
               if($startdates !=''){
             
                //print_r($startdates);
                $startdatesarray=array();
                foreach($startdates as $k){
                     array_push($startdatesarray,$k->startdate);

                }
                $minimum_date=min($startdatesarray);
            
                //print_r($minimum_date);*/
               
           
                foreach($schedule as $k){
                
                    $grade=getGradeid($k->employee_id);
                    $e_days=$days-10;;

                   
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        
                        <td><?php if($k->startdate=='0000-00-00'){echo '';}else{echo  date('d M, Y', strtotime($k->startdate));} ?></td>
                        <td><?php if($k->enddate=='0000-00-00'){echo '';}else{echo date('d M, Y', strtotime($k->enddate));} ?></td>
                        <td><?php echo $k->days  ?></td>
                        <td><?php echo getScheduleStatusName($k->status) ;?></td>
                    
                        <td>
                         
                                    <div class="btn-group">
                                   
                                    <button type="button" class="btn btn btnfolder1">Action</button>
                                   
                                    <button type="button" class="btn btn btnfolder dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu">
                                        <div class="dropdown-divider"></div>
                                        <?php if($k->status==3 || $k->status==5 || $k->status==7){ ?>
                                        <a class="dropdown-item" data-toggle="modal" data-target="#rescheduleModal<?php echo $k->id ?>" id="#rescheduleModal"<?php echo  $k->id; ?> > <i class="fa fa-pencil"></i> Edit </a>   
                                          <div class="dropdown-divider"></div>
                                          <a class="dropdown-item" data-toggle="modal" data-target="#viewModal<?php echo $k->id ?>" id="#viewModal"<?php echo  $k->id; ?> > <i class="fa fa-eye"></i> View Details </a> 
                                          <!--<a class="dropdown-item" data-toggle="modal" data-target="#deleteModal<?php //echo $k->id ?>" id="#deleteModal"<?php //echo  $k->id; ?> > <i class="fa fa-trash"></i> Delete </a>  
                                          <div class="dropdown-divider"></div> !-->
                                          <?php }else{?>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" data-toggle="modal" data-target="#viewModal<?php echo $k->id ?>" id="#viewModal"<?php echo  $k->id; ?> > <i class="fa fa-eye"></i> View Details </a>  
                                          

                                          <?php } ?>
                                           <?php //if($minimum_date == $k->startdate){?>
                                         
                                       <!-- <a class="dropdown-item" data-toggle="modal" data-target="#moreModal<?php //echo $k->id ?>" id="#moreModal"<?php// echo  $k->id; ?> > <i class="fa fa-check"></i> Confirm leave</a>  !-->
                               

                                       <?php
                                       // }else if(date('d/m/Y',strtotime($k->startdate)) > $today){
                                         
                                            ?>
                                        
                                        <?php // } ?>
                                    

                                    </div>
                                
                                    </div>
                                
                        </td>
                
                    </tr>
                                    

<!--modal For Confirming Leave!-->
<div class="modal fade" id="moreModal<?php echo $k->id ?>" tabindex="-1" role="dialog" aria-labelledby="#document_modal_title" aria-hidden="true">

<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirm Leave Schedule</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-12">
                    <form action="<?php echo base_url('Admin/confirmleave/'.$k->id) ;?>" method="post" id="enqry_form"><?php ?>
                        <div class="row">
                            <div class="col-sm-6" style="border-right: solid 1px lightgrey">

                                <div class="form-group">
                                    <label for="leavetype">
                                    Leave Type:
                                    </label>
                                    <p><?php echo 'Annual';?></p>
                                </div>
                            </div>
                            <div class="col-sm-6" style="border-right: solid 1px lightgrey">
                                <input type="hidden" class="form-control" value="<?php echo $k->dates;?>" id="scheduleddates" name="scheduleddates">
                                <div class="form-group">
                                    <label>
                                        Start Date
                                    </label>
                                    <div class=""><input type="date" class="form-control" id="start_date" name="start_date" value="<?php echo  $k->startdate?>"></div>

                            
                                </div>
                            </div>
                            <div class="col-sm-6" style="border-right: solid 1px lightgrey">
                                <input type="hidden" class="form-control" value="<?php echo $k->dates;?>" id="scheduleddates" name="scheduleddates">
                                <div class="form-group">
                                    <label>
                                        Days
                                    </label>
                                    <p><?php echo  $k->days;?></p>
                                </div>
                            </div>
                            <div class="col-sm-6" style="border-right: solid 1px lightgrey">
                                <input type="hidden" class="form-control" value="<?php echo $k->dates;?>" id="scheduleddates" name="scheduleddates">
                                <div class="form-group">
                                    <label>
                                        End Date
                                    </label>
                                    <div class=""><input type="date" class="form-control" id="end_date" name="end_date" value="<?php echo  $k->enddate ?>"></div>

                                  
                                </div>
                            </div>
                          
                            <div class="col-sm-6" style="border-right: solid 1px lightgrey">
                            <div class="form-group ">
                            <label class="form-label">Reliever</label><span style="color: red;">*</span>
                                <div class="">
                                
                                    <select class="form-control" name="reliever" required>
                                    <option value="0">Select Reliever</option>
                                    <?php foreach($relievers as $reliever){?>
                                        <option value="<?php echo $reliever->id; ?>"><?php echo $reliever->first_name .' '. $reliever->last_name .' (' .$reliever->staff_number .')' ; ?></option>  <?php }?>
                                        
                                    </select>
                            
                                </div>
                            <?php echo form_error('holidayname'); ?>
                        </div>
                            </div>
                        
                            <div class="col-sm-6" style="border-right: solid 1px lightgrey">
                                <label>
                                    Reason
                                </label>
                                <div class="form-group">
                               
                                <div class="">
                                    <textarea class="form-control" name="reason" id="reason"></textarea>
                                </div>
                   

                                </div>
                              
                            </div>
                          
                          
                        </div>
                       
                        <div class="row">
                            <div class="col-sm-12">
                                <hr>
                                <div class="text-center">
                                    <div class="form-group">
                                        <div class="text-center pull-right">
                                           
                                            <button type="submit" class="btn btn-primary pull-right" type="submit">Submit</button>
                                         
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>

                        </div>
                      
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
 <!--!-->


<!--modal For Emergency!-->
<div class="modal fade" id="emergencyModal<?php echo $k->id ?>" tabindex="-1" role="dialog" aria-labelledby="#document_modal_title" aria-hidden="true">

<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Emergency Leave Schedule</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-12">
                    <form action="<?php echo base_url('Admin/emergencyleave/'.$k->id) ;?>" method="post" id="enqry_form"><?php ?>
                        <div class="row">
                            <div class="col-sm-6" style="border-right: solid 1px lightgrey">

                                <div class="form-group">
                                    <label for="leavetype">
                                    Leave Type:
                                    </label>
                                    <p><?php echo 'Annual';?></p>
                                </div>
                            </div>
                            <div class="col-sm-6" style="border-right: solid 1px lightgrey">
                    <div class="form-group">
                        <label class="form-label">Start Date </label> <span style="color: red;">*</span>
                        <div class=""><input type="date" class="form-control" id="startdate" required name="startdate"></div>
                        <?php echo form_error('date'); ?>
                    </div>
                </div>
                <div class="col-sm-6" style="border-right: solid 1px lightgrey">
                        <div class="form-group ">
                            <label class="form-label">No Of Days</label> <span style="color: red;">*</span>
                            <div class=""><input type="number" class="form-control" id="noofdays" name="days" step=".01" onkeyup=getExactEndDate(this.value)></div>
                            <?php //echo form_error('date'); ?>
                            <p id="limitvalue" style="color:red;display:none">The Value is higher than the remaining days</p>
                        </div>

                </div>
                <div class="col-sm-6" style="border-right: solid 1px lightgrey">
                        <div class="form-group ">
                            <label class="form-label">End Date </label>
                            <div class=""><input type="text" readonly class="form-control" id="enddate" name="enddate"></div>
                            <?php echo form_error('date'); ?>
                         </div>

                </div>
                            <div class="col-sm-6" style="border-right: solid 1px lightgrey">
                            <div class="form-group ">
                            <label class="form-label">Reliever</label><span style="color: red;">*</span>
                                <div class="">
                                
                                    <select class="form-control" name="reliever" required>
                                    <option value="0">Select Reliever</option>
                                    <?php foreach($relievers as $reliever){?>
                                        <option value="<?php echo $reliever->id; ?>"><?php echo $reliever->first_name .' '. $reliever->last_name .' (' .$reliever->staff_number .')' ; ?></option>  <?php }?>
                                        
                                    </select>
                            
                                </div>
                            <?php echo form_error('holidayname'); ?>
                        </div>
                            </div>
                        
                            <div class="col-sm-6" style="border-right: solid 1px lightgrey">
                                <label>
                                    Reason
                                </label>
                                <div class="form-group">
                               
                                <div class="">
                                    <textarea class="form-control" name="reason" id="reason"></textarea>
                                </div>
                   

                                </div>
                              
                            </div>
                          
                          
                        </div>
                      
                        
                           
                        <div class="row">
                            <div class="col-sm-12">
                                <hr>
                                <div class="text-center">
                                    <div class="form-group">
                                        <div class="text-center pull-right">
                                           
                                            <button type="submit" class="btn btn-primary pull-right" type="submit">Submit</button>
                                         
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>

                        </div>
                      
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
 <!--!-->


 <!--Modal For Rescheduling Leave Application !-->
 <div class="modal fade" id="rescheduleModal<?php echo $k->id ?>" tabindex="-1" role="dialog" aria-labelledby="#document_modal_title" aria-hidden="true">

<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Leave  Schedule</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-12">
                    <form action="<?php echo base_url('Admin/editleaveschedule/'.$k->id) ;?>" method="post" id="enqry_form"><?php ?>
                       
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="isa_info">
                                <h5>You are required to reschedule <?php echo $k->days ?> days</h5>
                            </div>
                        </div>
                    <div class="col-sm-6" id="attachdocument" style="border-right: solid 1px lightgrey;">
                    <div class="form-group">
                        <label class="form-label" id="">Start Date</label> <span style="color: red;">*</span>
                        <div class=""><input type="date" class="form-control" id="start_dates" name="start_date" value="<?php echo $k->startdate ?>"></div>
                        <input type="hidden" class="form-control" id="daysentitled" name="daysentitled" value="<?php echo $k->days ?>">
                    </div>
                </div>
                <div class="col-sm-6" id="attachdocument" style="border-right: solid 1px lightgrey;">
                    <div class="form-group">
                        <label class="form-label" id="">End Date</label> <span style="color: red;">*</span>
                        <div class=""><input type="date" class="form-control" id="end_dates" name="end_date" value="<?php echo $k->enddate ?>"></div>
                    
                    </div>
                </div>
             
                    </div>
                
                        <div class="row">
                            <div class="col-sm-12">
                                <hr>
                                <div class="text-center">
                                    <div class="form-group">
                                        <div class="text-center pull-right">
                                           
                                            <button type="submit" class="btn btn-primary pull-right" type="submit">Submit</button>
                                         
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>

                        </div>
                      
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

 <!-- !-->

 <!--modal For Deleting leave Schedule!-->
<div class="modal fade" id="deleteModal<?php echo $k->id ?>" tabindex="-1" role="dialog" aria-labelledby="#document_modal_title" aria-hidden="true">

<div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Leave Schedule</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-12">
                    <form action="<?php echo base_url('Admin/deleteleaveschedule/'.$k->id) ;?>" method="post" id="enqry_form"><?php ?>
                        <div class="row">
                            <div class="col-sm-12" >

                                <div class="form-group">
                                    <label for="leavetype">
                                  
                                    </label>
                                        <p>Are you sure you want to delete ?</p>
                                </div>
                            </div>
                           
                                </div>
                              
                            </div>
                          
                          
                        </div>
                        <hr>
                       
                       
                        <button type="submit"  class="btn btn btn-primary btndelete">Delete</button>
                        
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
 <!--!-->

                                  <!--modal For Viewing!-->
<div class="modal fade" id="viewModal<?php echo $k->id ?>" tabindex="-1" role="dialog" aria-labelledby="#document_modal_title" aria-hidden="true">

<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">View Leave Schedule</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-12">
                    <form action="<?php echo base_url('Admin/hr_rejectschedule/'.$k->id) ;?>" method="post" id="enqry_form"><?php ?>
                        <div class="row">
                           
                                <div class="col-sm-4" style="border-right: solid 1px lightgrey">

                                    <div class="form-group">
                                        <label for="leavetype">
                                        Start Date
                                        </label>
                                        <p><?php echo date('d F, Y', strtotime($k->startdate)); ?></p>
                                        <div class=""><input type="hidden" class="form-control" id="employeeid" name="employeeid" value="<?php echo  $k->employee_id ?>"></div>

                                    </div>
                                </div>
                                <div class="col-sm-4" style="border-right: solid 1px lightgrey">

                                    <div class="form-group">
                                        <label for="leavetype">
                                        Days
                                        </label>
                                        <p><?php echo $k->days.'/' .$e_days ?></p>
                                    </div>
                                </div>
                                <div class="col-sm-4" style="border-right: solid 1px lightgrey">
                                    <div class="form-group">
                                        <label for="leavetype">
                                        End Date
                                        </label>
                                        <p><?php echo date('d F, Y', strtotime($k->enddate)); ?></p>
                                    </div>
                                    <br>
                                </div>
                                <div class="col-sm-4" style="">
                                    <div class="form-group">
                                        <label for="leavetype">
                                        Status
                                        </label>
                                        <p><?php echo getScheduleStatusName($k->status); ?></p>
                                    </div>
                                    <br>
                                </div>
                                <?php if($k->line_remarks!=''){ ?>
                                <div class="col-sm-12" style="border-right: solid 1px lightgrey">
                                    <div class="form-group">
                                        <label for="leavetype">
                                        Line Manager Remarks
                                        </label>
                                        <p><?php echo $k->line_remarks; ?></p>
                                    </div>
                                </div>
                                <?php }else{}?>
                                <?php if($k->cd_remarks!=''){ ?>
                                <div class="col-sm-12" style="border-right: solid 1px lightgrey">
                                    <div class="form-group">
                                        <label for="leavetype">
                                        Campus Director Remarks
                                        </label>
                                        <p><?php echo $k->cd_remarks; ?></p>
                                    </div>
                                </div>
                                <?php }else{}?>
                                <?php if($k->hr_remarks!=''){ ?>
                                <div class="col-sm-12" style="border-right: solid 1px lightgrey">
                                    <div class="form-group">
                                        <label for="leavetype">
                                        HR Remarks
                                        </label>
                                        <p><?php echo $k->hr_remarks; ?></p>
                                    </div>
                                </div>
                                <?php }else{}?>
                               
                                    
                                    
                                  

                                </div>
                            </div>
                          
                         </div>
                           
                      
                      
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
 <!--!-->

                <?php } ?>
                <?php// }?>

                </tbody>
            </table>
        </div>
    </div>
</div>




<script>//$('#start_date').datepicker({ dateFormat: 'dd-mm-yy' }).val();</script>
<script>
     var today = new Date().toISOString().split('T')[0];
    document.getElementsByName("start_date")[0].setAttribute('min', today);
   // document.getElementsByName("end_dates")[0].setAttribute('min', today);
   // document.getElementsByName("start_dates")[0].setAttribute('min', today);
    //document.getElementsByName("end_dates")[0].setAttribute('min', today);
  

  
</script>
<script>
    function calculateBusinessDays(startDate, endDate){
// Validate input
if (endDate < startDate)
    return 0;

// Calculate days between dates
var millisecondsPerDay = 86400 * 1000; // Day in milliseconds
startDate.setHours(0,0,0,1);  // Start just after midnight
endDate.setHours(23,59,59,999);  // End just before midnight
var diff = endDate - startDate;  // Milliseconds between datetime objects    
var days = Math.ceil(diff / millisecondsPerDay);

// Subtract two weekend days for every week in between
var weeks = Math.floor(days / 7);
days = days - (weeks * 2);

// Handle special cases
var startDay = startDate.getDay();
var endDay = endDate.getDay();

// Remove weekend not previously removed.   
if (startDay - endDay > 1)         
    days = days - 2;      

// Remove start day if span starts on Sunday but ends before Saturday
if (startDay == 0 && endDay != 6) {
    days = days - 1;  
}

// Remove end day if span ends on Saturday but starts after Sunday
if (endDay == 6 && startDay != 0) {
    days = days - 1;
}

return days;
}
</script>

<script>
   function getSum(total, num) {
  return total + num;
}
</script>

<script>
    function sumArray(array) {
    const ourArray =array;
    let sum = 0;

    for (let i = 0; i < ourArray.length; i += 1) {
    sum += ourArray[i];
     }
  
     return sum;
}


</script>

<script>
    function getStartDate(){
        //document.getElementById("myDate").disabled = true;
        var startdate=document.getElementById("start_date").value;
        //console.log('Stratdateyy',startdate);
        document.getElementsByName("end_date")[0].setAttribute('min', startdate);
      //  return (date.getDay() === 0 || date.getDay() === 6);

    }
    
</script>
<script>
    
function myFunction() {
  var x = document.getElementById("dates");
  let selectedItem = $(this).children("option:selected").val();
  x.remove(x.selectedItem);
  //console.log(x.value);

  /*$("select.selectval").change(function() {
        let selectedItem = $(this).children("option:selected").val();
         alert("You have selected the name - " + selectedItem);
         //selectedItem.remove();
         //selectedItem.remove(selectedItem.selectedIndex); 
         select.selectval.removeChild(selectedItem); 
    });*/

}    
function toNumber(value) {
         return Number(value);
      }
      

</script>
<script>
    function SubmitValues(){
        const selectvalue=document.getElementById("dates").innerHTML;
      
        const selecttext=document.getElementById("dates").text;
       var dates_s=document.getElementById("selected_dates");
      
       
        var dates = [];

        for (let o of document.querySelectorAll("#dates option"))
        {
            dates.push(o.text);
           
             
        }
       // console.log('Dates',dates);
        
        let text="";
        let totalsum=0;
        let sum_array=[];
        
        for (let i = 0; i < dates.length; i++) {
                text += dates[i] + ",";
                dates[i].replace('to',",");
                const datesresult=text += dates[i];
             
                var arrayresult=new Array();
                arrayresult.push(datesresult);
             
                for(let j=0;j<arrayresult.length;j++){
                   
                    var arr = arrayresult[j].replace('to',"=").split("=");
              
                }
                var arr = dates[i].replace('to',",").split(":");
                console.log(arr);
                var fst = arr.splice(0,1).join(",");
                var rest = arr.join(",");
                
                var datestart = new Date(fst);//End date
                var dateend = new Date(rest);//Start Date
                const days=calculateBusinessDays(dateend,datestart);
                var str = rest;
                var lastIndex = str.lastIndexOf(" ");

                str = str.substring(0, lastIndex);
                
                sum_array.push(str);
               
             }
            
            var nums = sum_array.map(toNumber);
            console.log('And Now',sumArray(nums));
            var sumresulttotal=sumArray(nums);
            var daystoschedule=document.getElementById("daystoschedule").value;
            var daysscheduled=document.getElementById("daysscheduled");
            daysscheduled.value=sum_array;
            
            alert('Kimbia');
            console.log('Entitled Days',daystoschedule);
            console.log('Days schedules',sumresulttotal);
            alert('days',daystoschedule);
       
        if(dates.length===0){
            alert('Please choose dates before submitting');
        }else{
            if(sumresulttotal < daystoschedule){
                alert('You are required to schedule all your days before submitting !');
            }else if(sumresulttotal > daystoschedule ){
                //alert('You have selected more days than what you have been entitled to,',
                //'Entitled Days :' +daystoschedule 'Total days scheduled' +sumresulttotal );
                alert('You have selected more days than what you have been entitled to' );

                
            }else if(sumresulttotal==daystoschedule){
                dates_s.value=dates;
            }
       
          
        }
       

    }
 
</script>

<script>
    function addSelectedDates(){
        const sel = document.querySelector("select");
        const d = document.querySelector("#start_date").value;
        const e_date=document.querySelector("#end_date").value;
        const daterange=d.concat(" to ", e_date);
        //const daterange=e_date.concat(" to ", d);
        const selecteddatesdiv=document.getElementById("selecteddatesdiv");
        const selectedremovediv=document.getElementById("selectedremovediv");
        const btnSubmit=document.getElementById("btnsubmit");
       
       
  
  if (d=== null  || d  === undefined || d==="" ||e_date==="")
  {
    //console.log(122);
    alert("Select Both Start date and End Date.");
    selecteddatesdiv.style.display = 'none'; 
    selectedremovediv.style.display='none';
    btnSubmit.style.display='none';
  }
  else
  {
    selecteddatesdiv.style.display = 'block';
    selectedremovediv.style.display='block'; 
    btnSubmit.style.display='block';
    var date1 = new Date(d);
    var date2 = new Date(e_date);
    var Difference_In_Time = date2.getTime() - date1.getTime();
    var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);
        //console.log("New Functions days  <br>" +calculateBusinessDays(date1,date2));
    var days_difference=calculateBusinessDays(date1,date2);

    sel.innerHTML += `<option value="${daterange}">${daterange} : ${days_difference} Days </option>`;
     var optionValues =[];
        $('#dates option').each(function(){
        if($.inArray(this.value, optionValues) >-1){
            $(this).remove()
        }else{
            optionValues.push(this.value);
           // console.log('Option Values',optionValues);
        }
        });
    
    document.getElementById("start_date").value='';
    document.getElementById("end_date").value='';
  
  }
  var dates = [];
  
  for (let o of document.querySelectorAll("#dates option"))
  {
    dates.push(o.value);
    
  }
  //console.log('Dates',dates);
  var dates_s=document.getElementById("selected_dates");
  //dates_s.value=dates;
  //sel.innerHTML
  //console.log('Select date',sel.innerHTML);

 
 


 // const selecteddates=document.getElementById("selecteddates").value=dates;


// Later on, post the option values from the select list to your backend:

/*document.querySelector("#finish").addEventListener("click", function() {
  var dates = [];
  for (let o of document.querySelectorAll("#dates option"))
  {
    dates.push(o.value);
  }
});*/









       /* console.log('Test');
        const startdate=document.getElementById("start_date").value;
        console.log(startdate);
        const enddate=document.getElementById("end_date").value;
        const daterange=enddate.concat(" to ", startdate);
         
        console.log(daterange);
        var dates = [];
        var selecteddates=[];

        dates.push(daterange);
        
        selecteddates.push(...dates);
        var newArray = selecteddates.concat(dates);
        console.log(newArray);
        const sel = document.getElementById("dates");
        for (let o of document.querySelectorAll("#dates option"))
    {
        dates.push(o.value);
        console.log(dates);
      
        console.log(document.getElementById("selecteddates").value=dates);
        const selecteddates=document.getElementById("selecteddates").value=dates;
       
    }*/
     

    }
</script>

<script>
   
   
function convertDate(inputFormat) {
    function pad(s) { return (s < 10) ? '0' + s : s; }
    var d = new Date(inputFormat)
    return [pad(d.getDate()), pad(d.getMonth()+1), d.getFullYear()].join('/')
    }
    theFirstday=convertDate(theFirst); //First day of the previous year
    theLastday=convertDate(theLast)//the last day of the previous year
    //console.log(theLastday);

    var today = new Date().toISOString().split('T')[0];
    document.getElementsByName("start_date")[0].setAttribute('min', today);
    const currentYear = new Date().getFullYear(); // 2023

    const previousYear =  currentYear-1;
    var currentDate = new Date();
    var theFirst = new Date(currentYear, 0, 1);
    var theLast = new Date(previousYear, 11, 31);
    var thelastday=new Date(currentYear ,11,32);

    //console.log('The last',theLast);//Start Date
    //console.log('The First',theFirst);//End Date

    var sday=theLast.toISOString().split('T')[0];
    var eday=theFirst.toISOString().split('T')[0];
    var lastdayyear=thelastday.toISOString().split('T')[0];

    console.log('The last',sday);
    console.log('The First',eday);
    console.log('newd',lastdayyear);

   // console.log(today);
    
    document.getElementsByName("start_date")[0].setAttribute('min', eday);
    document.getElementsByName("start_date")[0].setAttribute('min', today);
    document.getElementsByName("end_date")[0].setAttribute('min', today);
    document.getElementsByName("end_date")[0].setAttribute('max', lastdayyear);

    /*document.getElementsByName("end_date")[0].setAttribute('min', eday);
    document.getElementsByName("start_date")[0].setAttribute('max', sday);

   */

</script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />



<script>
    function getExactEndDate(str){
          //Check the Limit
      /*  var noofdays=document.getElementById("remain").innerHTML;  
        console.log(noofdays);
        if(str > noofdays){
            console.log('The Value is higher');
            limitvalue.style.display = 'block'; 
        }else{
            limitvalue.style.display = 'none'; 
        }*/


        var datefrom = document.getElementById("startdate").value.toString();
        var today = new Date(datefrom);//Start Date
       // console.log(today);
       
        var tomorrow = new Date(today);
       
        
        tomorrow.setDate(today.getDate() + parseFloat(str) );
        tomorrow.toLocaleDateString();
        var dd = new Date(tomorrow); // or any date and time you care about
        var dateArray = dd.toISOString().split('T')[0].split('-').concat(dd.toISOString().split('T')[1].split(':'))
      
        tomorrow = dateArray[0] + "-" + dateArray[1] + "-" + dateArray[2]
        console.log("End Date", tomorrow)
        document.getElementById("enddate").value=tomorrow

      
        

    }
</script>
<script>
$(function() {
  $('input[name="daterange"]').daterangepicker({
    opens: 'left'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    const sel = document.getElementById("dates");
    //console.log(sel);
   // sel.innerHTML=sel.innerHTML += `<option value="${start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD')}">${start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD')}</option>`;
    sel.innerHTML=sel.innerHTML += `<option value="${start.format('DD-MM-YYYY') + ' to ' + end.format('DD-MM-YYYY')}">${start.format('DD-MM-YYYY') + ' to ' + end.format('DD-MM-YYYY')}</option>`;

    //const val=start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD');
    const val=start.format('DD-MM-YYYY') + ' to ' + end.format('DD-MM-YYYY');
    

   var dates = [];
    for (let o of document.querySelectorAll("#dates option"))
    {
        dates.push(o.value);
        //console.log(dates);
      
       // console.log(document.getElementById("selecteddates").value=dates);
       
    }
  
   
});
});
</script>


<script>
    //Reschedule Script
$(function() {
  $('input[name="daterange"]').daterangepicker({
    opens: 'left'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    const sel = document.getElementById("dates");
    //console.log(sel);
    sel.innerHTML=sel.innerHTML += `<option value="${start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD')}">${start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD')}</option>`;
   const val=start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD');
   var dates = [];
    for (let o of document.querySelectorAll("#dates option"))
    {
        dates.push(o.value);
        //console.log(dates);
      
        //console.log(document.getElementById("selecteddates").value=dates);
       
    }
  
   
});
});
</script>


<script>
    /*function scheduedates(){
        var createleave=document.getElementById("frmscheduleddays")
        if(createleave.style.display=='none'){
            createleave.style.display = 'block'; 
        }else{
            createleave.style.display = 'none'; 
        }
    }*/
</script>







