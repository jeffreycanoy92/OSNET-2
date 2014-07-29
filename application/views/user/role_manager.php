
<div id="add-new-role-dialog" class="modal-dialog" title="New Role"> 
	<input class="form-control input-md" id="new-role-input" type="text" placeholder="Create Role"/><br />
</div>

<script type="text/javascript">
	var ajax = "<?php echo base_url(). 'ajax/role_ajax/'; ?>";

	$(document).ready(function() {

		function addNewRole() {
			
			$("#add-new-role-dialog").dialog({
				modal:true,
				width:300,
				buttons: {
					Add: function() {
						var new_role = $("#new-role-input").val();
						
						//alert(new_role);

						$.post(ajax + "add_role", {new_role: new_role}, function(response){
							location.reload();
						});

						$(this).dialog("close");
					},
					Cancel: function() {
						$(this).dialog("close");
					}
				}
			});

		}

		$(document).on("click", "#add-new-role", function() {
			addNewRole();
		});

		$(document).on("keydown keyup", "#search", function() {
			var search_key = $("#search").val();

			$.post(ajax + "search_department", {key: search_key}, function(response) {
				$("tbody").html("");
				$("tbody").append(response);
			});
		});

	});

</script>


<div class="wrapper row-offcanvas row-offcanvas-left">
	
	<aside class="right-side">                
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
			   Role Manager
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
							<?php
								echo $this->session->flashdata('message');
							?>
                            <div class="box box-primary">
                                <div class="box-body table-responsive">
                                    <div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                       
									   
										<div class="row">                                      
											<div class="col-xs-12">
												<div class="dataTables_filter" id="example1_filter">
											<label>
												<button class="btn btn-primary" id="add-new-role" data-toggle="modal" data-target="#department-modal">
												  <i class="fa fa-sitemap"></i> Add New Role
												</button>
											</label>

											<label class="pull-right">Search:  <input id="search" type="text" aria-controls="example1"></label>
											
												</div>
											</div>
										</div>

										<table id="example1" class="table table-bordered table-striped dataTable" aria-describedby="example1_info">


										<thead>
											<tr role="row">
											<th class="sorting_asc" role="columnheader" tabindex="0" 
											aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" 
											aria-label="Rendering engine: activate to sort column descending" 
											style="width: 232px;">Role Types</th>
											
											<th class="sorting" role="columnheader" 
											tabindex="0" aria-controls="example1" rowspan="1" colspan="1" 
											aria-label="Platform(s): activate to sort column ascending" 
											style="width: 2em;">Action</th>

											<th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" 
											rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" 
											style="width: 348px;">Visible Features</th>
											
											<th class="sorting" role="columnheader" 
											tabindex="0" aria-controls="example1" rowspan="1" colspan="1" 
											aria-label="Platform(s): activate to sort column ascending" 
											style="width: 2em;">Action</th>
											
											<th class="sorting" role="columnheader" 
											tabindex="0" aria-controls="example1" rowspan="1" colspan="1" 
											aria-label="Platform(s): activate to sort column ascending" 
											style="width: 301px;">Users</th>
											
											<th class="sorting" role="columnheader" 
											tabindex="0" aria-controls="example1" rowspan="1" colspan="1" 
											aria-label="Platform(s): activate to sort column ascending" 
											style="width: 2em;">Action</th>
											
										</thead>

										<tbody role="alert" aria-live="polite" aria-relevant="all">
											<?php $i = 0; ?>
											
											<?php foreach($role_type as $rt): ?>
											<tr>
												<td><?php echo $rt->role_type; ?> </td>
												<td>
													<a id="archieve" href="<?php echo base_url().'role/delete_role/'.$rt->role_id.'/role_type'; ?>"><center><img src="<?php echo site_url("assets/img/delete.gif/"); ?>"></center></a>
												</td>
												<td><?php
													foreach($features[$rt->role_type] as $f)
														echo $f->feature_name, "<br>";
													?>
												</td>
												<td style="text-align:left">
													<a id="edit" href="<?php echo base_url().'role/add_role/'.$rt->role_id; ?>/features"><img src="<?php echo site_url("assets/img/add.png"); ?>"></a>
													<a id="archieve" href="<?php echo base_url().'role/delete_role/'.$rt->role_id; ?>/features"><img src="<?php echo site_url("assets/img/delete.png/"); ?>"></a>
												</td>
												<td><?php
													foreach($users[$rt->role_type] as $u)
														echo $u->username, "<br>";
													?>
												</td>
												<td style="text-align:left">
													<a id="edit" href="<?php echo base_url().'role/add_role/'.$rt->role_id; ?>/users"><img src="<?php echo site_url("assets/img/add.png"); ?>"></a>
													<a id="archieve" href="<?php echo base_url().'role/delete_role/'.$rt->role_id; ?>/users"><img src="<?php echo site_url("assets/img/delete.png/"); ?>"></a>
												</td>
												<?php $i++; ?>
											</tr>
											<?php endforeach; ?>
										</tbody>
																			
									
									</table><!--<div class="row"><div class="col-xs-6"><div class="dataTables_info" id="example1_info">Showing 1 to 10 of 57 entries</div></div><div class="col-xs-6"><div class="dataTables_paginate paging_bootstrap"><ul class="pagination"><li class="prev disabled"><a href="#">← Previous</a></li><li class="active"><a href="#">1</a></li><li><a href="#">2</a></li><li><a href="#">3</a></li><li><a href="#">4</a></li><li><a href="#">5</a></li><li class="next"><a href="#">Next → </a></li></ul></div></div></div></div>-->
                                </div><!-- /.box-body -->
                               
                            </div><!-- /.box -->
                            <!-- End Announcement -->
                        </div>
                    </div>

		</section><!-- /.content -->
	</aside><!-- /.right-side -->
		
</div><!-- ./wrapper -->
