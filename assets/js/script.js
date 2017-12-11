$(document).click(function(click) {
	var target = $(click.target);

	if(!target.hasClass("item") && !target.hasClass("optionsButton")) {
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
		else{
			hideOptionsMenu();
			alert('Track added.');

		}
	});

});

$(document).on("click", ".add", function(click) {
	var currenTime=ShowUTCDate();
	var target=$(click.target);
	var newPlaylist=target.prevAll("input").val();
	var userId=$(".userid").val();
	if (newPlaylist.length != 0 && newPlaylist.length<22) {
			$.post("includes/handlers/ajax/createPlaylist.php",{newPlaylist:newPlaylist,userId:userId,currenTime:currenTime})
			.done(function(error){
				if (error!="") {
					alert(error);
					return;
				}
				else{
					alert('Playlist created.');
					$("#newPlaylist").val("");
                    window.location.reload(false); 
				}
			});
	}
	else{
		alert('1<=title length=<21');
		$("#newPlaylist").val("");
	}
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

function ShowUTCDate()
{
	var dNow = new Date();
	var utc = new Date(dNow.getTime() + dNow.getTimezoneOffset() * 60000)
	var utcdate= utc.getFullYear()+ '/' + (utc.getMonth()+1) + '/' + utc.getDate()  + ' ' + utc.getHours() + ':' + utc.getMinutes();
    return utcdate;
}