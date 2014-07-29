<div class="wrapper row-offcanvas row-offcanvas-left">
	   
	<aside class="right-side">                
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
			   Add Users as <?php echo ucfirst($role_type); ?>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-home"></i> Home</a></li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">
			
			<div class="row-condensed">
                        <div class="col-md-12">

                          <div class="row">
                        <div class="col-md-12">
                            <!-- TO DO List -->
                            <div class="box box-primary">
                                <div class="box-header">
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
									<form method="post" action="<?php echo base_url(); ?>role/add_features"  class="login-form col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center" />
                                  
									<div id="example1_wrapper" class="dataTables_wrapper form-inline col-md-5" role="grid">
                                      
										<table id="example1" class="table table-bordered table-striped dataTable" aria-describedby="example1_info">

										<thead>
											<tr role="row">
											<th class="sorting_asc" role="columnheader" tabindex="0" 
											aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" 
											aria-label="Rendering engine: activate to sort column descending" 
											style="width:2em;"></th>
											
											<th class="sorting_asc" role="columnheader" tabindex="0" 
											aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" 
											aria-label="Rendering engine: activate to sort column descending" 
											style="width: 232px;">Features</th>
	
										</thead>

										<tbody role="alert" aria-live="polite" aria-relevant="all">
											
											<?php foreach($users_to_add as $u): ?>
												<tr>
												
												<td>
													<center><input type="checkbox" name="feature[]" value="<?php echo $u; ?>" />
													<br></center>
												</td>
												<td style="text-align:left"><?php echo $u; ?><br></td>
												</tr>
											<?php endforeach; ?>
											
										</tbody>
									</table>
									
									<br>
									<div class="row">                                      
										<div class="col-xs-12">
										<label><input type="submit" name="submit" value="Change roles to  <?php echo ucfirst($role_type); ?>" class="btn btn-primary"/></label>
										<input type="hidden" name="role_type" value="<?php echo $role_type; ?>"/>
										</div>
									</div>
									
									</form>
                                </div><!-- /.box-body -->
                               
                            </div><!-- /.box -->
                            <!-- End Announcement -->
                        </div>
                    </div>

		</section><!-- /.content -->
	</aside><!-- /.right-side -->
		
</div><!-- ./wrapper -->
