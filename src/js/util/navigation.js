
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


var news_trigger = document.querySelector(".js--nav-news-trigger");
var news_trigger_mobile = document.querySelector(".js--nav-news-trigger-mobile");

var site_container = document.querySelector(".site-container");

site_container.onclick = function(e) {
	document.body.classList.remove("S-active--news-feed");

}

news_trigger.onclick = function(e) {
	if (!document.body.classList.contains('S-active--news-feed')) {
	document.body.classList.add("S-active--news-feed");

	}
	else {
		document.body.classList.remove("S-active--news-feed");

	}
}

// news_trigger_mobile.onclick = function(e) {
// 	if (!document.body.classList.contains('S-active--news-feed-mobile')) {
// 	document.body.classList.add("S-active--news-feed-mobile");
// 	e.target.innerHTML = "Sulje";
// 	}
// 	else {
// 		document.body.classList.remove("S-active--news-feed-mobile");
// 			e.target.innerHTML = "Ajankohtaista";
// 	}
// }
