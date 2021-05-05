
$(document).ready(function() {
  $(function() {
      $("table").click(function(event) {

          event.stopPropagation();
          var $target = $(event.target);
          var id = $target.closest('#selecionaStatus').val();
          if ( id > 2) {
            $target.closest("tr").next().find("div").slideDown();
          } else {
            $target.closest("tr").next().find("div").slideUp();
          }

      });
  });
});
