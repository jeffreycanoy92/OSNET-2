
	<aside class="right-side">     
	
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>Leave List</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
			</ol>
		</section>
		
		
		<section class="content">
			<div class="row-condensed">
				<div class="col-md-12">
					<div class="box box-primary">
						<div class="box-body table-responsive">
						
						<form role="form">
							<div class="box-body">
								<div class="row form-group">
									<div class="col-md-4">
										<div class="input-group">
											<span class="input-group-addon">
													DEPARTMENT
											</span>
											<select name="leave_department"  id="leave_department" class="form-control">
												<option value="all">--All--</option>
												<?php foreach($departments as $department_arr): ?>
													<?php
														$department_val = strtr ($department_arr->department_name, array ('-' => '', ' ' => ''));
														$department_val = strtolower($department_val);
													?>
													<option value="<?php print $department_val; ?>" <?php echo set_select('leave_department', $department_val, ($selected_department == $department_val)); ?>><?php print $department_arr->department_name; ?></option>
												<?php endforeach ?>
											</select>
										</div>
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-4">
										<div class="input-group">
											<span class="input-group-addon">
													STATUS
											</span>
											<?php $statusval = array_map('strtolower', $status); ?>
											<select name="leave_status"  id="leave_status" class="form-control">
												<?php foreach($status as $status_arr):?>
													<?php
														$status_val = strtr ($status_arr, array ('-' => '', ' ' => ''));
														$status_val = strtolower($status_val);
													?>
													<option value="<?php print $status_val; ?>" <?php echo set_select('leave_status', $status_val, ($selected_status == $status_val)); ?>><?php print $status_arr; ?></option>
												<?php endforeach ?>
											</select>
										</div>
									</div>
								</div>
							</div>
						</form>
						
						
						<div class="dataTables_paginate paging_bootstrap pull-right">
							<ul class="pagination">
								<?php echo $pagination_helper->create_links(); ?>
							</ul>    
						</div>
									
					<script>
						var site_url = '<?php echo site_url();?>';
					</script>
						<table class="table table-bordered table-striped" id="leave_list_table">
							<thead>
								<tr role="row">
									<th>Name</th>
									<th>Date Start</th>
									<th>Date End</th>
									<th>Detail</th>
									<th>Status</th>
									<th style="width:60px;">Action</th>
								</tr>
							</thead>
							<?php foreach($leave_list as $data => $value) :?>
							<tr>
									<td>  <?php print $leave_list[$data]["full_name"];  ?></td> 
									<td>  <?php print $leave_list[$data]["duration_start"];  ?></td> 
									<td>  <?php print $leave_list[$data]["duration_end"]; ?></td> 
									<td width="300">
										<div> 
											<?php
															$words = explode(" ", $leave_list[$data]['reason']);
															$limit = implode(" ", array_splice($words,0,10));
															if(count($words) > 10)
																$limit .= '...';
														?>
														<?php print $limit;?>
										</div> 
									</td> 
									<td>  <?php print $leave_list[$data]['status']; ?></td> 
									<td> 
										<button class="btn btn-success btn-flat btn_view_leave" id="btn_view_leave<?php print $leave_list[$data]["leave_id"];?>" data-id="<?php print $leave_list[$data]["leave_id"];?>" data-original-title="View Application" data-toggle="modal" data-target="#leave-item-modal"> 
											<i class="fa fa-file"></i> 
										</button> 
									</td> 
							</tr>
							<?php endforeach ?>
						</table>
						</div>
					</div>
					</div>
				</div>
			</div>
			
		</section>
		
				
	</aside>
	
	
	<!-- VIEW LEAVE MODAL -->
        <div class="modal fade" id="leave-item-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><i class="fa fa-thumb-tack"></i> Leave Application</h4>
                    </div>
                    <form action="#" method="post">
                        <div class="modal-body">
                            <div class="form-group">
								<div class="row">
									<div class="col-md-3">
										<label>Employee :</label>
									</div>
									<div class="col-md-9">
										<label  id="leave_employee"></label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-md-3">
										<label>Date Range :</label>
									</div>
									<div class="col-md-9">
										<label id="leave_daterange"></label>
									</div>
								</div>
							</div>
							<div class="form-group" id="view_leave_div">
								<div class="row">
									<div class="col-md-3">
										<label>Status :</label>
									</div>
									<div class="col-md-9">
										<label id="leave_view_status"></label>
									</div>
								</div>
							</div>
							<div class="form-group" id="view_leave_div">
								<div class="row">
									<div class="col-md-3">
										<label>Details :</label>
									</div>
									<div class="col-md-9">
										<textarea  class="form-control" id="leave_details"placeholder="Reason..." name="leave_reason" style="height: 50px; width:100%; resize:none;" readonly></textarea>
									</div>
								</div>
							</div>
							<div class="form-group" id="view_leave_div">
								<div class="row">
									<div class="col-md-3">
										<label>Remarks :</label>
									</div>
									<div class="col-md-9">
										<textarea  class="form-control" placeholder="Remarks..." name="leave_reason" style="height: 50px; width:100%; resize:none;"></textarea>
									</div>
								</div>
                            </div>
							<div class="form-group" id="view_leave_div">
								<div class="row">
									<div class="col-md-3">
										
									</div>
									<div class="col-md-9">
										<input type="checkbox" name="markunpaid" value="fanta"/> <label><strong> Mark as unpaid<strong/></label>
									</div>
								</div>
                            </div>
                        </div>
					</form>
					<div class="modal-footer clearfix">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
						<!-- normal users can't see this -->
						<?php //if($usertype == "superadmin"): ?>
							<button type="submit" id="edit_announcement_btn" class="btn btn-primary pull-left" data-toggle="modal" data-id="" data-target="#edit-announcement-modal"><i class="fa fa-thumb-tack"></i>Approve</button>
							<button type="submit" id="delete_announcement_btn" class="btn btn-delete pull-left"><i class="fa fa-thumb-tack"></i>Deny</button>
						<?php //endif ?>
					</div>
                    
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->