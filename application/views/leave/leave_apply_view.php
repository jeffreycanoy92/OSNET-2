
	<aside class="right-side">     
	
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>Application for Leave</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
			</ol>
		</section>
		
		
		<section class="content">
			<div class="row">
				<!-- left column -->
				<div class="col-md-12">
					<!-- general form elements -->
					<div class="box box-primary">
						<div class="row">
							<div class="col-md-12">
								<!-- form start -->
								<?php echo form_open('', array('class' => 'leave')); ?>
									<div class="box-body">
										<!--ERRORS -->
										<?php if (validation_errors()):?>
											<div class="alert alert-danger alert-dismissable">
												 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
												<?php echo validation_errors();?>
											</div>
										<?php endif ?>
										
										<!-- SUCCESS -->
										<?php if(isset($_GET['alert'])) : ?>
											<?php $test = $_GET['alert']; ?>
											<?php if($test == 'success') : ?>
												<div class="alert alert-success alert-dismissable">
													 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
													 <b>Leave application successfully sent.</b>
												</div>
											<?php endif ?>
										<?php endif ?>
										
										<!-- WARNING -->
										<?php if($paid_leave == 0) : ?>
											<div class="alert alert-warning alert-dismissable">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
												<b>WARNING.</b> You dont have remaining paid leave.
											</div>
										<?php endif ?>
										
										
										<div class="form-group text-light-blue">
											<label>Note: Any changes or cancelation, please email HR.</label>
										</div>
										<div class="form-group text-light-blue">
											<label>Remaining paid leave(s): <?php print $paid_leave; ?></label>
										</div>
										<div class="row form-group">
											<div class="col-md-4">
												<label>EMPLOYEE NAME</label>
												<div class="input-group">
													<input type="text" name="leave_date_filed" class="form-control" value="<?php print($user_info['full_name']); ?>" readonly/>
												</div>
											</div>
											<div class="col-md-4">
												<div class="input-group">
													<label>ID #</label>
													<input type="text" name="leave_confirmation" class="form-control pull-right" value="ID" readonly/>
												</div>
											</div>
											<div class="col-md-4">
												<div class="input-group">
													<label>DATE FILED</label>
													<input type="text" name="leave_confirmation" class="form-control pull-right" value="<?php print(date('m/d/Y')); ?>" readonly/>
												</div>
											</div>
										</div>
										<div class="row form-group">
											<div class="col-md-4">
												<div class="input-group">
													<label>DEPARTMENT</label>
													<input type="text" name="leave_date_filed" class="form-control" value="<?php print($user_info['department']); ?>" readonly/>
												</div>
											</div>
											<div class="col-md-4">
												<div class="input-group">
													<label>POSITION</label>
													<input type="text" name="leave_confirmation" class="form-control pull-right" value="<?php print($user_info['position']); ?>" readonly/>
												</div>
											</div>
											<div class="col-md-4">
												<div class="input-group">
													<label>CONFIRMATION #</label>
													<input type="text" name="leave_confirmation" id="leave_confirmation" class="form-control pull-right" value="<?php if (isset($_POST['leave_confirmation'])) echo $_POST['leave_confirmation']; ?>"/>
												</div>
											</div>
										</div>
										<div class="row form-group">
											<div class="col-md-4 ">
												<div class="input-group">
													<label>NATURE</label>
													<select name="leave_nature" class="form-control">
														<option value="0">-- select --</option>
														<?php foreach($nature as $nature_arr): ?>
															<option value="<?php echo $nature_arr; ?>" <?php echo set_select('leave_nature', $nature_arr); ?>><?php echo $nature_arr; ?></option>
														<?php endforeach ?>
													</select>
												</div>
											</div>
											<div class="col-md-4">
												<div class="input-group">
													<label>DURATION</label>
													<input type="text" name="leave_duration" id="leave_duration" class="form-control pull-right" value="<?php if (isset($_POST['leave_duration'])) echo $_POST['leave_duration']; ?>"/>
												</div>
											</div>
											<div class="col-md-4 ">
												<div class="input-group">
													<label>TOTAL DAYS</label>
													<input type="text"  name="leave_total_days" id="leave_total_days" class="form-control" value="<?php if (isset($_POST['leave_total_days'])) echo $_POST['leave_total_days']; ?>" readonly/>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<label>REASON</label>	
												<textarea  class="form-control" placeholder="Reason..." name="leave_reason" style="height: 50px; width:100%; resize:none;"><?php if (isset($_POST['leave_reason'])) echo $_POST['leave_reason']; ?></textarea>
											</div>
										</div>
									</div><!-- /.box-body -->
									<div class="box-footer">
										<button type="submit" class="btn btn-primary">Submit Application</button>
									</div>
									
								<?php echo form_close(); ?>
								<!-- form end -->
								
							</div>
						</div>
						
					</div><!-- /.box -->
				</div>
			</div>
		</section>
		
				
	</aside>
