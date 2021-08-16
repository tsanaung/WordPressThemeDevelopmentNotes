/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
//function openMbmenu() {
    //document.getElementById("openMbmenu").innerHTML="hello world";
    //document.documentElement.style.setProperty('--mbmenu', 'flex');
//}
//function closeMbmenu() {
    //document.documentElement.style.setProperty('--mbmenu', 'none');
//}

var openMbmenu = document.getElementById("openMbmenu");
openMbmenu.addEventListener("click", function openMbmenu() {
	document.documentElement.style.setProperty('--mbmenu', 'block');
}, false);
var closeMbmenu = document.getElementById("closeMbmenu");
closeMbmenu.addEventListener("click", function closeMbmenu() {
	document.documentElement.style.setProperty('--mbmenu', 'none');
}, false);
