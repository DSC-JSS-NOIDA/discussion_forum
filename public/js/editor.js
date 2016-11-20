$(".publishpopup").hide();
CKEDITOR.replace( 'editor1' );
$(document).ready(function(){
	$(".publish").hover(function(){
		$(".publishpopup").show();
	},function(){
		$(".publishpopup").hide();
	});
});