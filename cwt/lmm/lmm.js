// Sticky, Horizontal scrool menu show/hide on vertical scroll
window.onscroll = function() {lmmSticat()};
var prevScrollpos = window.pageYOffset;

function lmmSticat() {
    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
        document.getElementById("sticat").style.top = "0";
        document.getElementById("sticat").style.position = "fixed";
    } else {
        document.getElementById("sticat").style.top = "-4rem";
    }
    prevScrollpos = currentScrollPos;
}
