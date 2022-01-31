

///////TEMPALTE WRAP STARTS//////////
if (document.body.classList.contains('page-template-laskentakohteet')) {
console.log("INIT LASKENTAKOHTEET");

/**
 * sortable 1.0
 *
 * Makes html tables sortable, ie9+
 *
 * Styling is done in css.
 *
 * Copyleft 2017 Jonas Earendel
 *
 * This is free and unencumbered software released into the public domain.
 *
 * Anyone is free to copy, modify, publish, use, compile, sell, or
 * distribute this software, either in source code form or as a compiled
 * binary, for any purpose, commercial or non-commercial, and by any
 * means.
 *
 * In jurisdictions that recognize copyright laws, the author or authors
 * of this software dedicate any and all copyright interest in the
 * software to the public domain. We make this dedication for the benefit
 * of the public at large and to the detriment of our heirs and
 * successors. We intend this dedication to be an overt act of
 * relinquishment in perpetuity of all present and future rights to this
 * software under copyright law.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
 * IN NO EVENT SHALL THE AUTHORS BE LIABLE FOR ANY CLAIM, DAMAGES OR
 * OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE,
 * ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
 * OTHER DEALINGS IN THE SOFTWARE.
 *
 * For more information, please refer to <http://unlicense.org>
 *
 */

// sort is super fast, even with huge tables, so that is probably not the issue
// Not solved with documentFragment, same issue... :(
// My guess is that it is simply too much to hold in memory, since
// it freezes even before sortable is called if the table is too big in index.html

document.addEventListener('click', function (e) {
  var down_class = ' dir-d '
  var up_class = ' dir-u '
  var regex_dir = / dir-(u|d) /
  var regex_table = /\bsortable\b/
  var element = e.target

  function reClassify(element, dir) {
    element.className = element.className.replace(regex_dir, '') + dir
  }

  function getValue(element) {
    // If you aren't using data-sort and want to make it just the tiniest bit smaller/faster
    // comment this line and uncomment the next one
    return element.getAttribute('data-sort') || element.innerText
    // return element.innerText
  }

  if (element.nodeName === 'TH') {
    try {
      var tr = element.parentNode
      // var table = element.offsetParent; // Fails with positioned table elements
      // this is the only way to make really, really sure. A few more bytes though... 😡
      var table = tr.parentNode.parentNode
      if (regex_table.test(table.className)) {
        var column_index
        var nodes = tr.cells

        // reset thead cells and get column index
        for (var i = 0; i < nodes.length; i++) {
          if (nodes[i] === element) {
            column_index = i
          } else {
            reClassify(nodes[i], '')
          }
        }

        var dir = down_class


        // check if we're sorting up or down, and update the css accordingly
        if (element.className.indexOf(down_class) !== -1) {
          dir = up_class
        }

        reClassify(element, dir)

        // extract all table rows, so the sorting can start.
        var org_tbody = table.tBodies[0]

        // get the array rows in an array, so we can sort them...
        var rows = [].slice.call(org_tbody.rows, 0)

        var reverse = dir === up_class

        // sort them using custom built in array sort.
        rows.sort(function (a, b) {
          var x = getValue((reverse ? a : b).cells[column_index])
          var y = getValue((reverse ? b : a).cells[column_index])
          // var y = (reverse ? b : a).cells[column_index].innerText
          // var x = (reverse ? a : b).cells[column_index].innerText
          return isNaN(x - y) ? x.localeCompare(y) : x - y
        })

        // Make a clone without content
        var clone_tbody = org_tbody.cloneNode()

        // Build a sorted table body and replace the old one.
        while (rows.length) {
          clone_tbody.appendChild(rows.splice(0, 1)[0])
        }

        // And finally insert the end result
        table.replaceChild(clone_tbody, org_tbody)
      }
    } catch (error) {
      // console.log(error)
    }

		if (document.body.classList.contains("S-on-sticky-scroll")) {
			console.log("on sitcky");
			document.querySelector(".laskentakohteet-navigation__filters").scrollIntoView({behavior: "smooth", block: "start", inline: "nearest"});

		}

  }
})



/////////// TIRGGER SORT ON LOAD //////

document.querySelector(".js--main-sort").click();

////FILTER BUTTONS ///////

var filter_buttons = document.querySelectorAll('.js--area-filter');
var table_elems = document.querySelectorAll('.laskentakohteet-app__body tr');
var contact_persons = document.querySelectorAll('.module--laskentakohteet-area-personel .contact-person');

console.log(table_elems);

filter_buttons.forEach(function (elem) {
	console.log(elem); // The element
elem.addEventListener("click", filter_areas);
});

function filter_areas(e) {
console.log("btn working");
  let targets_area = e.target.getAttribute('data-area');

///ADD ANIMATION ON BODY

document.body.classList.add("S-animating--table");

////CLEAR BUTTONS
	filter_buttons.forEach(function (elem) {
		elem.classList.remove("S-active__area");
		elem.parentElement.classList.remove("S-active__area");
		console.log(elem);
			console.log(elem.parentElement);
	});

	////SET ACTIVE BUTTON

	setTimeout(function(){
		e.target.classList.add("S-active__area");
		e.target.parentElement.classList.add("S-active__area");
	}, 0);


	//////INIT TRANSITION///
document.querySelector('.module--laskentakohteet-app').classList.add("S-animating");


if (targets_area == "all") {
	console.log("all");
document.querySelector('.module--laskentakohteet-area-personel').classList.add("S-disabled");

}
else {
  	setTimeout(function(){
  document.querySelector('.module--laskentakohteet-area-personel').classList.remove("S-disabled");
  }, 300);
}


//////RESET ANIMATION AND RUN FILTERS///
	setTimeout(function(){
document.querySelector('.module--laskentakohteet-app').classList.remove("S-animating");

if (targets_area == "all") {
	console.log("all");
reset_tr();
}
else {
	filter_tr();
}

////SET THE SORTING ON THE MAIN SORT////

var main_sort = document.querySelector(".js--main-sort");

if (main_sort.classList.contains("dir-d")) {
	console.log("keep active");
}
else {
		console.log("change");
		main_sort.click();
}
document.body.classList.remove("S-animating--table");

}, 300);


function reset_tr() {
	table_elems.forEach(function (elem) {
			 elem.classList.remove("S-disabled__area-item");
	});
  contact_persons.forEach(function (elem) {
       elem.classList.remove("S-active");
  });
}


function filter_tr() {
	table_elems.forEach(function (elem) {
		// console.log(elem);
	   if (elem.dataset.area.includes(targets_area)) {
			 elem.classList.remove("S-disabled__area-item");
			 }
			 else  {
				 elem.classList.add("S-disabled__area-item");
			 }
	});
  contact_persons.forEach(function (elem) {
    // console.log(elem);
     if (elem.dataset.area.includes(targets_area)) {
       elem.classList.add("S-active");
       }
       else  {
         elem.classList.remove("S-active");
       }
  });
}

}







// get the sticky element
const stickyElm = document.querySelector('.tr--kohde');

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








/////AREA CONTATCT MOUSE ACTIONS

var area_contact_persons = document.querySelector('.area-contact__persons');
var area_contact_map = document.querySelector('.area-contact__map');
var area_contact_cells = document.querySelectorAll('.js--area-hover-item');


// area_contact_map.addEventListener("mouseenter", activate_hover_area);
// area_contact_map.addEventListener("mouseleave", remove_hover_area);
//
// area_contact_persons.addEventListener("mouseenter", activate_hover_area);
// area_contact_persons.addEventListener("mouseleave", remove_hover_area);

area_contact_cells.forEach(function (elem) {
	console.log(elem); // The element
elem.addEventListener("mouseenter", area_cell_hover);
elem.addEventListener("mouseleave", area_cell_hover_out);
});

function activate_hover_area(e){
  document.querySelector('.-hover-parent').classList.add("S-active__hover");
}
function remove_hover_area(e){
  document.querySelector('.-hover-parent').classList.remove("S-active__hover");
}

function area_cell_hover(e){
console.log("hover");

var active_area = e.target.getAttribute('data-areacode');

var area_array = active_area.split("");
console.log(area_array);
area_contact_cells.forEach(function (elem) {
elem.classList.remove("S-active__area");
elem.classList.remove("S-disabled__area");
console.log(active_area);
if (elem.dataset.areacode.includes(area_array)) {
elem.classList.add("S-active__area");
}
else {
elem.classList.add("S-disabled__area");
}

if (e.target.classList.contains("-hc-filter__trigger")) {
    e.target.classList.remove("S-disabled__area");
  e.target.classList.add("S-active__area");
  document.querySelectorAll(".-hc-filter__target").forEach(function (elem) {
    elem.classList.add("S-active__area");
  });
}

});

}

function area_cell_hover_out(e){
console.log("hover out");



area_contact_cells.forEach(function (elem) {
elem.classList.remove("S-active__area");
elem.classList.remove("S-disabled__area");


});

}
///////TEMPALTE WRAP ENDS//////////
}
