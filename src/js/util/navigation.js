
var nav_trigger = document.querySelector(".mobile-nav-trigger")
var nav_trigger_hide = document.querySelector(".site-container")
var doc_body = document.body
nav_trigger.addEventListener("click", mobile_nav);
nav_trigger_hide.addEventListener("click", mobile_nav_hide);
function mobile_nav (e) {

if (!document.body.classList.contains('S-active--mobile-nav')) {
	document.querySelector(".fixed-mobile-navigation").style.display = "block"
	setTimeout(() => {
  doc_body.classList.add("S-active--mobile-nav")
}, 50);

}
else {
	doc_body.classList.remove("S-active--mobile-nav")
}

}

function mobile_nav_hide (e) {

	doc_body.classList.remove("S-active--mobile-nav")
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



let scrollEvent = new Event('afterScroll', { bubbles: true }); //bubble allows for delegation on body

/**
 * runs when an anchor is clicked or the page loads with an anchor
 * the item we are scrolling to can have an offset
 * @param element
 */
function scrolltoHash (element) {
 if(element) {
    let offset = element.dataset.offset || 'start';

    //if the offset is a string 'start, center, or end'
    if (isNaN(parseInt(offset))) {
       element.scrollIntoView({ behavior: 'smooth', block: offset });
    } else {
       //from top scroll with offset
       let fromTop = window.pageYOffset + element.getBoundingClientRect().top + parseInt(offset);

       window.scroll({ behavior: 'smooth', top: fromTop });
    }

    //fire some more events
    setTimeout(function () {
       element.dispatchEvent(scrollEvent);
    }, 500);

 }

}

document.addEventListener('DOMContentLoaded', function () {

	if (location.hash) {
		scrolltoHash(document.querySelector(location.hash));
	}

	document.body.addEventListener('click', e => {
		let item = e.target.closest('a[href^="#"]');

		if (item) {
			let itemHash = item.getAttribute('href');

			if (itemHash !== '#' && itemHash !== '#0') {
				e.preventDefault();
				scrolltoHash(document.querySelector(itemHash));
			}
		}
	});

	document.addEventListener('afterScroll', function (e) {
		//run an event after scroll begins
	});

});


console.log("smoothscroll");
