jQuery(document).ready(function($){

  // scroll functionality js start

  function checkElementsInView() {
    $('.custom-filter-data-wrapper').each(function () {
      const elementTop = $(this).offset().top;
      const windowBottom = $(window).scrollTop() + $(window).height();

      if (windowBottom > elementTop + 50) {
        $(this).css('opacity', 1);
      }
    });
  }

  // Run on scroll
  $(window).on('scroll', checkElementsInView);

  // Run on page load
  checkElementsInView();

  // scroll functionality js end
  
});
 