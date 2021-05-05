(function() {
$(document).ready(function() {
  var counter = 0;

  // Start the changing images
  setInterval(function() {
    if(counter == 9) {
      counter = 0;
    }

    changeImage(counter);
    counter++;
  }, 1580);

  // Set the percentage off
  loading();
});

function changeImage(counter) {
  var images = [
    '<i class="fa fa-thermometer-full" aria-hidden="true"></i>',
    '<i class="fa fa-tint" aria-hidden="true"></i>',
    '<i class="fa fa-camera-retro" aria-hidden="true"></i>',
    '<i class="fa fa-pie-chart" aria-hidden="true"></i>',
    '<i class="fa fa-line-chart" aria-hidden="true"></i>',
    '<i class="fa fa-thermometer-full" aria-hidden="true"></i>',
    '<i class="fa fa-tint" aria-hidden="true"></i>',
    '<i class="fa fa-camera-retro" aria-hidden="true"></i>',
    '<i class="fa fa-pie-chart" aria-hidden="true"></i>',
    '<i class="fa fa-line-chart" aria-hidden="true"></i>'
  ];

  $(".loader .image").html(""+ images[counter] +"");
}

function loading(){
  var num = 0;

  for(i=0; i<=100; i++) {
    setTimeout(function() {
      $('.loader span').html(num+'%');

      if(num == 100) {
        loading();
      }
      num++;
    },i*90);
  };

}
})();
