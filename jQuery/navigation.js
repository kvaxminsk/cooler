jQuery(function()
	{
	//this allows the content to be seen with javascript turned off
	jQuery('#main-container-background a[name]').removeAttr("name");
	jQuery('#main-container').css('overflow', 'hidden');
	jQuery('#side-nav').css('visibility', 'visible');
	
	//here we assign the click handler to each #side-nav a element to jump 
	//to a position in 	the #main-container-background
   jQuery('#side-nav a').live
	('click', function()
		{
		
		jQuery(this).parent().removeClass('remove-right-border');
		jQuery(this).parent().siblings().addClass('remove-right-border');
		
		
		//here is the text to display in the overlay
		var overlay = new Array("LivePipe: here is the overlay text",
					"Echo: here is the overlay text",
					"Ajax.org: here is the overlay text",
					"Spry: here is the overlay text",
					"QooxDoo: here is the overlay text",
					"jQuery Tools: here is the overlay text");
		//here are the background colors for the overlay			
		var color	= new Array("#ff0d4c",
					"#0d13ff",
					"#0dff18",
					"#fff10d",
					"#0dcfff",
					"#ff0deb");		
		var index = jQuery('#side-nav a').index(this);
		
		jQuery("#main-container-background").animate({ top: index * -307 }, 'slow');
		jQuery(".overlay").hide().css("background-color", color[index]).text(overlay[index]).fadeIn(1500);
		
		});
	});
	
