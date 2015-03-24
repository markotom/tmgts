(function ($) {

  $(window).scroll(function() {
    var x = $(this).scrollTop(),
        d = parseInt(-x / 3, 10);

    if (d < 1) {
      $('#header').css('background-position', '0% ' + d + 'px');
    }

    if (x > 175) {
      $('.toup').fadeIn();
    } else {
      $('.toup').fadeOut();
    }
  });

  $(document).ready(function () {

    $('.post-loop').masonry({
      itemSelector: '.post'
    });

    $('.toup').click(function (e) {
      e.preventDefault();

      $('html, body').animate({ scrollTop : 0 });
    });

    $(window).scroll();

  });


})(jQuery);
