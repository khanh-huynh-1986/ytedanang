/**
* Scroll Up
*/
/* nut cuon len */
jQuery(document).ready(function(){
jQuery("#scroll-up").hide();
jQuery(function () {
jQuery(window).scroll(function () {
if (jQuery(this).scrollTop() > 800) {
jQuery('#scroll-up').fadeIn();
} else {
jQuery('#scroll-up').fadeOut();
}
});
jQuery('a#scroll-up').click(function () {
jQuery('body,html').animate({
scrollTop: 0
}, 600);
return false;
});
});
});
/* nut cuon len */