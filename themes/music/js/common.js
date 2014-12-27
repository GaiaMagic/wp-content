	function wrapTag(num)
	{
	    for(var id = 1;id<=3;id++)
		{
		  var Tag="fcwr_cont"+id;
		  var Css = "on" + id;
		  document.getElementById(Tag).style.display = id == num ? "block" : "none";
		  document.getElementById(Css).className = id == num ? "cur" : "";
		}
	}

	  function tabswt(num)
	  {
		  for(var id = 1;id<=2;id++)
		  {
			  var Tag="fcwr_conta"+id;
			  var Css = "ona" + id;
			  document.getElementById(Tag).style.display = id == num ? "block" : "none";
			  document.getElementById(Css).className = id == num ? "cur" : "";
		  }
	  }

$(function(){
	$(".list_1 li").each(function(){
		$(this).mouseover(function(){
					$(this).attr("className","cur");
				})
				.mouseout(function(){
					$(this).attr("className","");
				})
	})
});

$(function(){
$(window).scroll(function() {

$('#wp_obj').stop().animate({top:10+$(window).scrollTop()});
});
});

