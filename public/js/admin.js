$("#users").slideUp();
$(document).ready(function(){
	$("#show_users").click(function(){
		$("#users").slideToggle();
	});
	$(".user_detail").click(function(){
		var user_id = $(this).attr('user_id');
		var answer = prompt("Are you sure(Yes or No): ");
		if(answer=="Yes")
		{
			$.ajax({
				type: 'POST',
				headers: {
       				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    			},
    			url: '/admin/spamuser',
    			data: {
    					'user_id':user_id,
    				},
    			success: function(data){
    				alert(data);
    				if(data=="User Spammed")
    					$("#"+user_id).html(0);
    				if(data=="User unspammed")
    					$("#"+user_id).html(1);
    			}
			});
		}
		else
		{
			alert("Did not Spam User");
		}
	});
})