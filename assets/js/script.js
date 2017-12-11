$(document).click(function(click) {
	var target = $(click.target);

	if(!target.hasClass("item") && !target.hasClass("optionsButton") && !target.hasClass("dropdown-item")) {
		hideOptionsMenu();
	}
});

$(window).scroll(function(){
	hideOptionsMenu();
});


$(document).on("click", ".dropdown-item", function(click) {
	var target=$(click.target);
	var playlistId=target.prevAll(".playlistId").val();
	var songId=$(".songId").val();
	$.post("includes/handlers/ajax/addToPlaylist.php",{playlistId:playlistId,songId:songId})
	.done(function(error){
		if (error!="") {
			alert(error);
			return;
		}
	});

});






function showOptionMenu(button){
	var trackId=$(button).prevAll(".trackId").val();
	var menu=$(".optionsMenu");
	menu.find(".songId").val(trackId);

	var scrollTop=$(window).scrollTop();
	var elementOffset=$(button).offset().top;
	var top=elementOffset-scrollTop;

	var left=$(button).offset().left;
	var buttonWidth=$(".optionsButton").width()+5;

	menu.css({"top": top+"px","left": left+buttonWidth+"px", "display":"inline"});
	$(".optionsMenu").show();
}

function hideOptionsMenu(){
	var menu=$(".optionsMenu");
	if (menu.css("displ")!="none") {
		menu.css("display","none");
	}
}

