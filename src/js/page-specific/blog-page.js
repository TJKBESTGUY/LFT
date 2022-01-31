
///////TEMPALTE WRAP STARTS//////////
if (document.body.classList.contains('page-template-ajankohtaista')) {
console.log("INIT LASKENTAKOHTEET");




////FILTER BUTTONS ///////

var filter_buttons = document.querySelectorAll('.js--article-filter');
var table_elems = document.querySelectorAll('.article-feed__content li');




filter_buttons.forEach(function (elem) {
	console.log(elem); // The element
elem.addEventListener("click", filter_areas);
});

function filter_areas(e) {
console.log("btn working");


///HANDLE STICKY/////
if (document.body.classList.contains("S-on-sticky-scroll")) {
	console.log("on sitcky");
	document.querySelector(".module--article-feed").scrollIntoView({behavior: "auto", block: "start", inline: "nearest"});

}


  let targets_area = e.target.getAttribute('data-cat');

///ADD ANIMATION ON BODY

document.body.classList.add("S-animating--articles");

////CLEAR BUTTONS
	filter_buttons.forEach(function (elem) {
		elem.classList.remove("S-active__cat");
		elem.parentElement.classList.remove("S-active__cat");
		console.log(elem);
			console.log(elem.parentElement);
	});

	////SET ACTIVE BUTTON

	setTimeout(function(){
		e.target.classList.add("S-active__cat");
		e.target.parentElement.classList.add("S-active__cat");
	}, 0);



//////RESET ANIMATION AND RUN FILTERS///
	setTimeout(function(){
if (targets_area == "all") {
	console.log("all");
reset_tr();
}
else {
	filter_tr();
}


document.body.classList.remove("S-animating--articles");

}, 300);


function reset_tr() {
	table_elems.forEach(function (elem) {
			 elem.classList.remove("S-disabled__area-item");
	});
}


function filter_tr() {
	table_elems.forEach(function (elem) {
		// console.log(elem);
	   if (elem.dataset.cat.includes(targets_area)) {
			 elem.classList.remove("S-disabled__area-item");
			 }
			 else  {
				 elem.classList.add("S-disabled__area-item");
			 }
	});
}

}









//////STICKY//////


// get the sticky element
const stickyElm = document.querySelector('.article-feed__cat-nav');

// get the first parent element which is scrollable
const stickyElmScrollableParent = getScrollParent(stickyElm);

// save the original offsetTop. when this changes, it means stickiness has begun.
stickyElm._originalOffsetTop = stickyElm.offsetTop;


// compare previous scrollTop to current one
const detectStickiness = (elm, cb) => () => cb & cb(elm.offsetTop != elm._originalOffsetTop)

// Act if sticky or not
const onSticky = isSticky => {
   // console.clear()
   console.log(isSticky)

   stickyElm.classList.toggle('isSticky', isSticky)
	 document.body.classList.toggle('S-on-sticky-scroll', isSticky)
}

// bind a scroll event listener on the scrollable parent (whatever it is)
// in this exmaple I am throttling the "scroll" event for performance reasons.
// I also use functional composition to diffrentiate between the detection function and
// the function which acts uppon the detected information (stickiness)

const scrollCallback = throttle(detectStickiness(stickyElm, onSticky), 100)
stickyElmScrollableParent.addEventListener('scroll', scrollCallback)





// OPTIONAL CODE BELOW ///////////////////

// find-first-scrollable-parent
// Credit: https://stackoverflow.com/a/42543908/104380
function getScrollParent(element, includeHidden) {
    var style = getComputedStyle(element),
        excludeStaticParent = style.position === "absolute",
        overflowRegex = includeHidden ? /(auto|scroll|hidden)/ : /(auto|scroll)/;

    if (style.position !== "fixed")
      for (var parent = element; (parent = parent.parentElement); ){
          style = getComputedStyle(parent);
          if (excludeStaticParent && style.position === "static")
              continue;
          if (overflowRegex.test(style.overflow + style.overflowY + style.overflowX))
            return parent;
      }

    return window
}

// Throttle
// Credit: https://jsfiddle.net/jonathansampson/m7G64
function throttle (callback, limit) {
    var wait = false;                  // Initially, we're not waiting
    return function () {               // We return a throttled function
        if (!wait) {                   // If we're not waiting
            callback.call();           // Execute users function
            wait = true;               // Prevent future invocations
            setTimeout(function () {   // After a period of time
                wait = false;          // And allow future invocations
            }, limit);
        }
    }
}






///////TEMPALTE WRAP ENDS//////////
}
