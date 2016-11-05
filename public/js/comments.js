$(document).ready(function(){
    $(".confirm_edit_comment").hide();
	
    $(".edit_comment").click(function(){
        var id = $(this).attr("id").substring(4);
        $("#content"+id).hide();
        $("#input"+id).show();
        $(this).hide();
        $("#confirm"+id).show();
    })

    $(".confirm_edit_comment").click(function(){
        var id = $(this).attr("id").substring(7);
        var comment = $("#input"+id).val();
       
       $.ajax({
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/edit_comment',
            data: {
                'user_id':user_id,
                'comment_id':id,
                'comment':comment
            },
            success: function(data){
                console.log(data);
                 
                 $("#content"+id).html("<p id='content"+id+"'>"+comment+"</p>");
                 $("#content"+id).show();
                 
                 $("#input"+id).hide();
                 
                 $(".confirm_edit_comment").hide();
                 
                 $("#edit"+id).show();
               
            }
        }); 
        
    });

    $("#new_comment_btn").click(function(){
        var comment = $("#new_comment_text").val();
        if(!comment)
            alert("Seems an Empty Comment");
        else
        {
            $("#new_comment_text").val('');
            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/add_comment',
                data: {
                    'user_id':user_id,
                    'article_id':article_id,
                    'comment':comment                    
                },
                success: function(data){
                    if(data==success)
                    {
                        //update the comment
                    }
                }
           });
        }
    });
});