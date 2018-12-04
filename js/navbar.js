window.onload = function () {
    $(function () {
        $(document).scroll(function () {
          var $nav = $(".navbar");
          $nav.toggleClass('scrolled', $(this).scrollTop() > 300);
          $nav.toggleClass('non-scrolled', $(this).scrollTop() < 300);
        });
      });
}