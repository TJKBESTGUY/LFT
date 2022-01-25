
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


var nav_links = document.querySelectorAll(".-nav-link");


	setTimeout(function(){
nav_links.forEach(function (elem) {
	console.log(elem); // The element
elem.addEventListener("mouseenter", nav_hover_in);
elem.addEventListener("mouseleave", nav_hover_out);
});
}, 500);

function nav_hover_in(e){
	document.body.classList.add("S-active--nav-hover");
	e.target.classList.add("S-active--hover-element");

}

function nav_hover_out(e){
	document.body.classList.remove("S-active--nav-hover");
		e.target.classList.remove("S-active--hover-element");
}
