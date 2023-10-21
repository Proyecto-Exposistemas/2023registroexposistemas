
// Check if a new cache is available on page load.
qrImg = document.getElementById("qr_imagen");
window.addEventListener('load', function(e) {

  var url_string = window.location;
  var url = new URL(url_string);
  var key = url.searchParams.get("identificador");


  qrImg.src = `https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=${key}`;
  
  
  }, false);
