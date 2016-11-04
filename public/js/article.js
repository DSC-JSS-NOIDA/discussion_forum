$(document).ready(function(){
	$(".rating_by_me").click(function(){
		var rate = $(this).attr("id");
		//console.log(category_name);
		$.ajax({
			type: 'POST',
			headers: {
       			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    		},
    		url: '/rate_by_user',
    		data: {
    			'user_id':user_id,
    			'rate':rate,
                'article_id':article_id
    		},
    		success: function(data){
    			console.log(data);

               
    		}
		});
	});
});