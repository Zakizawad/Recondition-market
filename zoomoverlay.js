var zoomOverlay = document.querySelector('.zoom-overlay');
var productImage = document.querySelector('.single-pro-image');

productImage.addEventListener('mousemove', function(event) {
  var imageWidth = productImage.offsetWidth;
  var imageHeight = productImage.offsetHeight;
  var x = event.offsetX / imageWidth * 100;
  var y = event.offsetY / imageHeight * 100;
  zoomOverlay.style.backgroundPosition = x + '% ' + y + '%';
  productImage.style.backgroundPosition = -x + 25+ '% ' + -y + 25 + '%';
});

productImage.addEventListener('mouseenter', function() {
    productImage.style.backgroundImage = 'url(' + productImage.querySelector('img').src + ')';
  });

productImage.addEventListener('mouseleave', function() {
  zoomOverlay.style.opacity = 0;
});
