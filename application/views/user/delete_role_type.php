<div class="wrapper row-offcanvas row-offcanvas-left">
	   
	<aside class="right-side">                
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
			   Add Visible Features
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
									<form method="post" action="<?php echo base_url(); ?>role/delete_role_type"  class="login-form col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center" />
                                  
										<p> You are about to delete the role type <span style="color:red"><?php echo ucfirst($role_type); ?></span>. This cannot be undone. Continue? </p>
									
									<br>
									<div class="row">                                      
										<div class="col-xs-12">
											<label><input type="submit" name="submit" value="Delete Features from <?php echo ucfirst($role_type); ?>" class="btn btn-primary"/></label>
											
											<label><input type="submit" name="cancel" value="Cancel" class="btn btn-primary"/></label>
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
