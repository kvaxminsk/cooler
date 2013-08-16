jQuery.fn.vertSlider = function(options) {

jQuery('#main-container-background a[name]').removeAttr("name");
	jQuery('#main-container').css('overflow', 'hidden');
	jQuery('#side-nav').css('visibility', 'visible');
	

var overlay = {	//here is the text DEFAULT to display in the overlay
				text : new Array("",
					"",
					"",
					"",
					"",
					"")
			  };

var color = {   //here are the DEFAULT background colors for the overlay
				color : new Array(null,
					null,
					null,
					null,
					null,
					null)
			};

var button = {   //here are the DEFAULT button text for the overlay
				button : new Array(null,
					null,
					null,
					null,
					null,
					null)
			};
			
var image = {//here are the DEFAULT IMAGES
				image : new Array(null,
					null,
					null,
					null,
					null,
					null)
			
			};

var title = {//LINK TITLES GO HERE
									
				title : new Array(null,
					null,
					null,
					null,
					null,
					null)
			
			};

var link = {//OUTBOUND IMAGE LINKS GO HERE
									
				link : new Array(null,
					null,
					null,
					null,
					null,
					null)
			
			};
	
var options = jQuery.extend(overlay, color, button, image, title, link, options);
    return this.each(function() {
	
	jQuery("a#section-1 span").html(options.button[0]);
	jQuery("a#section-2 span").html(options.button[1]);
	jQuery("a#section-3 span").html(options.button[2]);
	jQuery("a#section-4 span").html(options.button[3]);
	jQuery("a#section-5 span").html(options.button[4]);
	jQuery("a#section-6 span").html(options.button[5]);
	
	
	
	jQuery('.s1').html('<a href="' + options.link[0] + '" title= "' + options.title[0] + '"><img src="' + options.image[0] + '" /></a>');
	jQuery('.s2').html('<a href="' + options.link[1] + '" title= "' + options.title[1] + '"><img src="' + options.image[1] + '" /></a>');
	jQuery('.s3').html('<a href="' + options.link[2] + '" title= "' + options.title[2] + '"><img src="' + options.image[2] + '" /></a>');
	jQuery('.s4').html('<a href="' + options.link[3] + '" title= "' + options.title[3] + '"><img src="' + options.image[3] + '" /></a>');
	jQuery('.s5').html('<a href="' + options.link[4] + '" title= "' + options.title[4] + '"><img src="' + options.image[4] + '" /></a>');
	jQuery('.s6').html('<a href="' + options.link[5] + '" title= "' + options.title[5] + '"><img src="' + options.image[5] + '" /></a>');
	
	   jQuery(this).click(function() {
	   var index = jQuery('#side-nav a').index(this);

	   jQuery(this).parent().removeClass('remuve-background-color').css("background-color", options.color[index]);
	   

		jQuery(this).parent().siblings().addClass('remuve-background-color');
		
		
		
		
		
		
		jQuery("#main-container-background").animate({ top: index * -260 }, 'slow');
	   
	   jQuery(".overlay").hide().css(options.color[index]).text(options.text[index]).fadeIn(1500);
	   
								});
								});
};	
	
