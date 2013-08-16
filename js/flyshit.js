flyshit = {
  init: function(){
    jQuery('.add-btn').click(function(){
      jQuery('.product-img-box .general_image').css({'position':'relative'});

      jQuery('.product-img-box .general_image img').clone()
        .css({'position' : 'absolute', 'z-index' : '100', 'top': '0', 'left': '0'})
        .appendTo('.product-img-box  .general_image')
        .animate({
          opacity: 0.5,
          marginTop: -100,
          marginLeft: 747,
          width: 50,
          height: 50
}, 1200, function() {
          $(this).remove();
});

    })
  }
}

