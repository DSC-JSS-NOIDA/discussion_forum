$("#raters_details").hide();

$(document).ready(function(){
    $("#raters_details").hide();   	
    $(".rating_by_me").click(function(){
		var rate = $(this).attr("id");
		// console.log(category_name);
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
    			$("#my_rating").html(data.my_rating);
                $("#avg_rating").html(data.avg);
                $("#raters").html(data.raters);
    		}
		});
	});

    $(".raters_hover").hover(function(){
        $("#raters_details").show();        
    }, function(){
        $("#raters_details").hide();
    });

    $("#delete_article").click(function(){
        var article_id = $(this).attr('articleid');
        if(confirm("Are you sure, you want to delete this article"))
            window.location.href = '/delete/'+article_id;
    });
});