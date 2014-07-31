$(document).ready(function() {
    
    //Initialize WYSIHTML5 - text editor
    $("#announcement_message").wysihtml5();
	
	$("#edit_announcement_message").wysihtml5();
    
    //Date range picker
    $('#leave_duration').daterangepicker();
	
	
	$('.applyBtn').blur(function() {
		var duration = $('#leave_duration').val();
		var duration_tok = duration.split(' ');
		var duration_from = duration_tok[0].split("/");
		var duration_to = duration_tok[2].split("/");
		
		duration_from =  new Date(duration_from[2], duration_from[0] - 1, duration_from[1]);
		duration_to =  new Date(duration_to[2], duration_to[0] - 1, duration_to[1]);
		
		var oneDay  = 24*60*60*1000;
		var diffDays = Math.abs((duration_from - duration_to) / oneDay) + 1;
		$('#leave_total_days').val(diffDays);
	});
	
	
	$('#leave_department').change(function() {
		var status_selected = $('#leave_status').val();
		var department_selected = $('#leave_department').val();
		var status_selected = status_selected.replace(/[^A-Z0-9]/ig, "");
		var department_selected = department_selected.replace(/[^A-Z0-9]/ig, "");
		window.location.href= site_url + 'leave/leave_list/' + department_selected + '/' + status_selected;
	});
	
	
	$('#leave_status').change(function() {
		var status_selected = $('#leave_status').val();
		var department_selected = $('#leave_department').val();
		var status_selected = status_selected.replace(/[^A-Z0-9]/ig, "");
		var department_selected = department_selected.replace(/[^A-Z0-9]/ig, "");
		window.location.href= site_url + 'leave/leave_list/' + department_selected + '/' + status_selected;
	});
	
	$('.btn_view_leave').click(function() {
		var id = $(this).attr('id');
		var leaveid = $('#' + id).data('id');
		$.ajax({
			type: "POST",
			url: site_url + 'ajax/leave_ajax/leave_view',
			data: {leaveid:leaveid}, 
			success:function(data){
				var parsedata = jQuery.parseJSON( data );
				$("#leave_employee") . text (parsedata.leave_employee);
				$("#leave_daterange") . text (parsedata.leave_daterange);
				$("#leave_view_status") . text (parsedata.leave_status);
				$("#leave_details") . val (parsedata.leave_details);
			}
		});
	});
		
});