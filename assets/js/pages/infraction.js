$(document).ready(function() {


  $(".infraction-date").inputmask("dd/mm/yyyy", {"placeholder": "dd-mm-yyyy"});
  
  $(".infraction-date-range").daterangepicker();
  
  $(".infraction-date-range").focus(function(){
   
    var res = '<tr><th>Infraction Type</th><th>Date</th></tr>';

    $('table.quarterly_infractions2').empty();
    $('table.quarterly_infractions2').append(res);
   
  });

  $("button.add-infraction").click(function(){
  
    $('#add-infraction-dialog input.infraction-user-id').val($(this).prop("id")); 
  
  });
  
  $('.applyBtn').click(function(){
    
    var user_id = $('input.user-id').val();
    var date_start = $(".daterangepicker_start_input input").val();
    var date_end = $(".daterangepicker_end_input input").val();
    
    $.ajax({
    
        type: "POST",
				url: site_url + 'index.php/ajax/infractions_ajax/getEmployeeInfractionCountCustomDateRange',
				data: {user_id:user_id, date_start:date_start, date_end:date_end}, 
				success:function(data) {

          var quarterly_infraction_count_custom = $.parseJSON(data);
          var res = '<tr><th>Infraction Type</th><th>Date</th></tr>';
          
          if(typeof quarterly_infraction_count_custom.firstname != 'undefined'){
          
            $(".total-infractions2").text(quarterly_infraction_count_custom.infractions_count);
            $(".total-unexcused-absences2").text(quarterly_infraction_count_custom.unexcused_absence_count);
            $(".total-excused-absences2").text(quarterly_infraction_count_custom.excused_absence_count);
            $(".total-ncns2").text(quarterly_infraction_count_custom.ncns_count);
            $(".total-no-notifications2").text(quarterly_infraction_count_custom.no_notification_count);
            $(".total-lates2").text(quarterly_infraction_count_custom.late_count);
            
            
          } else {
          
            $('table.quarterly_infractions2').empty();
            $('table.quarterly_infractions2').append(res);
            $(".total-infractions2").text("0");
            $(".total-unexcused-absences2").text("0");
            $(".total-excused-absences2").text("0");
            $(".total-ncns2").text("0");
            $(".total-no-notifications2").text("0");
            $(".total-lates2").text("0");
          
          }
          
        }
    
    });
    
    $.ajax({
    
        type: "POST",
				url: site_url + 'index.php/ajax/infractions_ajax/getEmployeeInfractionListCustomDateRange',
				data: {user_id:user_id, date_start:date_start, date_end:date_end}, 
				success:function(data) {

          var quarterly_infractions_list_custom = $.parseJSON(data);
          var res = '';
          
          if(typeof quarterly_infractions_list_custom != 'undefined'){
          

            for(var i = 0; i<quarterly_infractions_list_custom.length; i++){
            
              res = res + '<tr>' +
                            '<td>' + quarterly_infractions_list_custom[i].name +'</td>' +
                            '<td>' + quarterly_infractions_list_custom[i].date +'</td>' +
                          '</tr>';
            }
            
            $('table.quarterly_infractions2 tr').after(res);
            
            
          } else {
          
            
  
            $('table.quarterly_infractions2').empty();
            $('table.quarterly_infractions2').append(res);


          
          }
          
				
        }
    });
    
  
  });
  
  $("button.view-infraction").click(function(){
  
    var user_id=$(this).prop("id");
    
    $('input.user-id').val(user_id);
    
    //Get Individual Employee Infraction Count - Current Quarter
    $.ajax({
    
        type: "POST",
				url: site_url + 'index.php/ajax/infractions_ajax/getEmployeeInfractionCount',
				data: {user_id:user_id}, 
				success:function(data) {

          var quarterly_infractions = $.parseJSON(data);
          var res = '<tr><th>Infraction Type</th><th>Date</th></tr>';
          
          if(typeof quarterly_infractions.firstname != 'undefined'){
          
            $(".total-infractions").text(quarterly_infractions.infractions_count);
            $(".total-unexcused-absences").text(quarterly_infractions.unexcused_absence_count);
            $(".total-excused-absences").text(quarterly_infractions.excused_absence_count);
            $(".total-ncns").text(quarterly_infractions.ncns_count);
            $(".total-no-notifications").text(quarterly_infractions.no_notification_count);
            $(".total-lates").text(quarterly_infractions.late_count);
            $(".employee-firstname").text(quarterly_infractions.firstname);
            
            
          } else {
          
            
  
            $('table.quarterly_infractions').empty();
            $('table.quarterly_infractions').append(res);
            $(".total-infractions").text();
            $(".total-unexcused-absences").text();
            $(".total-excused-absences").text();
            $(".total-ncns").text();
            $(".total-no-notifications").text();
            $(".total-lates").text();
            $(".employee-firstname").text();
          
          }
          
				
        }
    
    });
    
    //Get Individual Employee Infraction List - Current Quarter
    $.ajax({
    
        type: "POST",
				url: site_url + 'index.php/ajax/infractions_ajax/getEmployeeInfractionList',
				data: {user_id:user_id}, 
				success:function(data) {

          var quarterly_infraction_list = $.parseJSON(data);
          
          var res = '';
          for(var i = 0; i<quarterly_infraction_list.length; i++){
          
            res = res + '<tr>' +
                          '<td>' + quarterly_infraction_list[i].name +'</td>' +
                          '<td>' + quarterly_infraction_list[i].date +'</td>' +
                        '</tr>';
          }
          
          $('table.quarterly_infractions tr').after(res);
        }
    
    });
    
  
  
  });
  
  $('.btn-danger').click(function(){
  
    var res = '<tr><th>Infraction Type</th><th>Date</th></tr>';
  
    $('table.quarterly_infractions').empty();
    $('table.quarterly_infractions').append(res);
    $('table.quarterly_infractions2').empty();
    $('table.quarterly_infractions2').append(res);
    
    $(".total-infractions").text();
    $(".total-unexcused-absences").text();
    $(".total-excused-absences").text();
    $(".total-ncns").text();
    $(".total-no-notifications").text();
    $(".total-lates").text();
    
    $(".total-infractions2").text();
    $(".total-unexcused-absences2").text();
    $(".total-excused-absences2").text();
    $(".total-ncns2").text();
    $(".total-no-notifications2").text();
    $(".total-lates2").text();
    
    $(".employee-firstname").text();
    
  });
  
  $('#add-infraction-dialog .btn-primary').click(function(){

		var user_id = $.trim( $('#add-infraction-dialog .infraction-user-id').val());
		var date = $.trim( $('.infraction-date').val());
		var infraction_type = $.trim( $('.infraction-type').val());
		var details = $.trim( $('.infraction-details').val());

		var err = "";
		if (!user_id) 			err += '<p>No User ID Error. Please contact OSNET developer! :)</p>';
		if (!date) 	err += '<p>There should be a Date</p>';
		if (infraction_type == 0) 	err += '<p>Select Infraction Type</p>';
		$("#add_infraction_errors").html(err);

		if(user_id && date && infraction_type){
			$.ajax({
				type: "POST",
				url: site_url + 'index.php/ajax/infractions_ajax/add',
				data: {user_id:user_id, date:date, infraction_type:infraction_type, details:details}, 
				success:function(data) {
					window.location.href= site_url + 'home/infraction_list';
				}
			});
		}

	});
  
  $('#view-infraction-dialog .btn-primary').click(function(){
  
    
  
  });
  
});