/* Open when someone clicks on the span element */
function openNav() {
    // document.getElementById("myNav").style.width = "100%";
    // document.getElementById("FX").style.filter= "blur(5px)";
    document.getElementById("myNav").style.transform = "translateX(0)";
}

/* Close when someone clicks on the "x" symbol inside the overlay */
function closeNav() {
    // document.getElementById("myNav").style.width = "0%";
    // document.getElementById("Overlay-Text").style.opacity = "0";
    // document.getElementById("FX").style.filter= "blur()";
    document.getElementById("myNav").style.transform = "translateX(-100%)";

}

$('a.Menu-Link, a.btn-Contactanos').click(function(e){
	e.preventDefault();
	$('html, body').stop().animate({scrollTop: $($(this).attr('href')).offset().top}, 1000);
});

/* When the user scrolls down, hide the navbar. When the user scrolls up, show the navbar */

var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
  var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.getElementById("Header_id").style.top = "0";
  } else {
    document.getElementById("Header_id").style.top = "-500px";
  }
  prevScrollpos = currentScrollPos;
}
