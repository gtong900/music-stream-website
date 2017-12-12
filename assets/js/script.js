$(document).click(function(click) {
	var target = $(click.target);

	if(!target.hasClass("item") && !target.hasClass("optionsButton")) {
		hideOptionsMenu();
	}
});

$(window).scroll(function(){
	hideOptionsMenu();
});


$(document).on("click", ".t", function(click) {
	var target=$(click.target);
	var trackId=target.prevAll(".td").val();
	var userId=$(".userid").val();
	var currenTime=ShowUTCDate();
	console.log(trackId,userId,currenTime);
	$("iframe").attr('src', "https://open.spotify.com/embed?uri=spotify%3Atrack%3A"+trackId);
	$.post("includes/handlers/ajax/createPlayrecord.php",{trackId:trackId,userId:userId,currenTime:currenTime})
	.done(function(error){
		if (error!="") {
			alert(error);
			return;
		}
	});
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
	var newPlaylist=$(".newPlaylist").val();
	var userId=$(".userid").val();

	if ($(".makeitprivate").is(':checked')) {
		var public=0;	
	}
	else{
		var public=1;
	}

	if (newPlaylist.length != 0 && newPlaylist.length<22) {
			$.post("includes/handlers/ajax/createPlaylist.php",{newPlaylist:newPlaylist,userId:userId,currenTime:currenTime,public:public})
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

$(document).on("click", ".delete", function(click) {
	var target=$(click.target);
	var pId=target.prevAll("input").val();
	$.post("includes/handlers/ajax/deletePlaylist.php",{pId:pId})
	.done(function(error){
		if (error!="") {
			alert(error);
			return;
		}
		else{
			alert('Playlist deleted.');
			window.location.reload(false); 
		}
	});

});


$(document).on("click", ".dropsong", function(click) {
	var target=$(click.target);
	var trackId=target.prevAll(".trackId").val();
	var pId=$(".pid").val();
	$.post("includes/handlers/ajax/dropSong.php",{trackId:trackId,pId:pId})
	.done(function(error){
		if (error!="") {
			alert(error);
			return;
		}
		else{
			alert('Track droped.');
			window.location.reload(false); 
		}
	});

});

$(document).on("click", ".like, .likefromlist", function(click) {
	var target=$(click.target);
	var artistid=$(".artistid").val();
	var userId=$(".userid").val();
	var currenTime=ShowUTCDate();
	$.post("includes/handlers/ajax/likeArtist.php",{username:userId, artistid:artistid, liketime:currenTime})
	.done(function(error){
		if (error!="") {
			alert(error);
			return;
		}
		else{
			alert('Artist liked.');

		}
	});

	hideOptionsMenu();

});

$(document).on("click", ".follow", function(click) {
	var target=$(click.target);
	var username=target.prevAll("input").val();
	var userId=$(".userid").val();
	var currenTime=ShowUTCDate();
	$.post("includes/handlers/ajax/followUser.php",{username:username, follower:userId, followtime:currenTime})
	.done(function(error){
		if (error!="") {
			alert(error);
			return;
		}
		else{
			alert('User followed.');

		}
	});

});

$(document).on("click", ".unlike", function(click) {
	var target=$(click.target);
	var artistid=target.prev("input").val();
	var userId=$(".userid").val();
	$.post("includes/handlers/ajax/unlikeArtist.php",{username:userId, artistid:artistid})
	.done(function(error){
		if (error!="") {
			alert(error);
			return;
		}
		else{
			alert('Artist unliked.');
			window.location.reload(false); 
		}
	});

});



$(document).on("click", ".unfollow", function(click) {
	var target=$(click.target);
	var username=target.prevAll("input").val();
	var userId=$(".userid").val();
	$.post("includes/handlers/ajax/unfollowUser.php",{username:username, follower:userId})
	.done(function(error){
		if (error!="") {
			alert(error);
			return;
		}
		else{
			alert('User unfollowed.');
			window.location.reload(false); 
		}
	});

});



function showOptionMenu(button){
	var trackId=$(button).prevAll(".trackId").val();
	var artistid=$(button).prevAll(".ai").val();
	var menu=$(".optionsMenu");
	menu.find(".songId").val(trackId);
	menu.find(".artistid").val(artistid);

	var scrollTop=$(window).scrollTop();
	var elementOffset=$(button).offset().top;
	var top=elementOffset-scrollTop;

	var left=$(button).offset().left;
	var buttonWidth=$(".optionsButton").width()+100;

	menu.css({"top": top+"px","left": left-buttonWidth+"px", "display":"inline"});
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
	var utcdate= utc.getFullYear()+ '/' + (utc.getMonth()+1) + '/' + utc.getDate()  + ' ' + utc.getHours() + ':' + utc.getMinutes()+':'+utc.getSeconds();
    return utcdate;
}
