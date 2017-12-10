function showOptionMenu(button){
	var menu=$(".optionsMenu");

	var scrollTop=$(window).scrollTop();
	var elementOffset=$(button).offset().top;
	var top=elementOffset-scrollTop;

	var left=$(button).offset().left;
	var buttonWidth=$(".optionsButton").width()+5;

	menu.css({"top": top+"px","left": left+buttonWidth+"px", "display":"inline"});
	$(".optionsMenu").show();
}

