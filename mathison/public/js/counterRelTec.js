$(document).ready(function () {
  $('.valueC').each(function () {
    $(this).prop('Counter', 0).animate({
      Counter: $(this).text()
    },
    {
      duration: 2000,
      easing: 'swing',
      step: function (now) {
          $(this).text(Math.ceil(now));
      }
    });
  });
 });
