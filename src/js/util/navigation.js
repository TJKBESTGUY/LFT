
var nav_trigger = document.querySelector(".mobile-nav-trigger")
var doc_body = document.body
nav_trigger.addEventListener("click", mobile_nav);

function mobile_nav (e) {

if (!document.body.classList.contains('S-active--mobile-nav')) {
doc_body.classList.add("S-active--mobile-nav")
}
else {
	doc_body.classList.remove("S-active--mobile-nav")
}

}
