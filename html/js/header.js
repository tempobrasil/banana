function StartLogo(){

  var logo_h = $('#logo').outerHeight(true);
  var logo_w = $('#logo').outerWidth(true);

  $('#logo').css({
      top: '-' + logo_h + 'px',
      marginLeft: '-' + (logo_w /2) + 'px',
      display: 'block'
  });

  setTimeout(function(){

      $('#logo').animate({
          top: 0
      }, 200);

  }, 1000, 'easeOutBack');


};