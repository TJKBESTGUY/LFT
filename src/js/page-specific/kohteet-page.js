

///////TEMPALTE WRAP STARTS//////////
if (document.body.classList.contains('page-template-laskentakohteet')) {
console.log("INIT LASKENTAKOHTEET");


// let url = 'https://api.sheety.co/1f705ac98f68ad9b98a51addbc7605ce/laskentakohteet/sheet1';
// fetch(url)
// .then((response) => response.json())
// .then(json => {
//   // Do something with the data
//   console.log(json.sheet1S);
// });



// // Get all data
// axios.get('https://sheetdb.io/api/v1/58f61be4dda40')
// .then( response => {
//     console.log(response.data);
// });
//
// // Get 10 results starting from 20
// axios.get('https://sheetdb.io/api/v1/58f61be4dda40?limit=10&offset=20')
// .then( response => {
//     console.log(response.data);
// });
//
// // Get all data sorted by name in ascending order
// axios.get('https://sheetdb.io/api/v1/58f61be4dda40?sort_by=name&sort_order=asc')
// .then( response => {
//     console.log(response.data);
// });

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
var table_elems = document.querySelectorAll('.laskentakohteet-app__body tr');
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
     if (elem.classList.contains(targets_area)) {
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
if (elem.dataset.areacode.includes(active_area) ) {
elem.classList.add("S-active__area");
}
else {
elem.classList.add("S-disabled__area");
}

if (e.target.classList.contains("ita-ja-pohjois")) {
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



//////SCROLL TOP////

	document.querySelector(".js--scroll-top").onclick = function(){
	document.querySelector("body").scrollIntoView({behavior: "smooth", block: "start", inline: "nearest"});
	};



//init Form on laskenta
form_init();








// THE FORM



function form_init() {
var table_elems = document.querySelectorAll('.laskentakohteet-app__body tr');
table_elems.forEach(function (elem) {
elem.addEventListener("click", form_selection);
});



function form_selection(e) {
  console.log("click on tr");
    console.log(e.currentTarget);
  var target_ID = e.currentTarget.id
 const select_target = document.querySelector('#select-options');
var optionToSelect = document.querySelector("#option-" + target_ID + "")
console.log(optionToSelect);
console.log(optionToSelect.value);
select_target.value = optionToSelect.value;
}
document.querySelector(".js--from-show-more").onclick = function(e){
  document.querySelector(".form-laskenta__checkboxes").removeAttribute("style");
  e.currentTarget.classList.add("S-muted")
};

btn_show_form = document.querySelectorAll(".js--show-form-modal");
btn_show_form.forEach(function (elem) {
elem.addEventListener("click", show_form);
});

btn_hide_form = document.querySelectorAll(".js--hide-modal__btn");
btn_hide_form.forEach(function (elem) {
elem.addEventListener("click", hide_form);
});

function show_form(e) {
console.log("toggle form");
document.querySelector(".modal-smoke").classList.remove("S-hidden");
document.querySelector(".form-modal").classList.remove("S-hidden");
}

function hide_form(e) {

    document.querySelector(".modal-smoke").classList.add("S-hidden");
    document.querySelector(".form-modal").classList.add("S-hidden");

console.log("toggle form");
}

var modal_container = document.querySelector('.form-modal');
modal_container.addEventListener('click', event => {


  if(event.target.classList.contains("js--hide-modal")) {
      console.log("modal click");
      hide_form();

  }
});

}



///////TEMPALTE WRAP ENDS//////////


}




function animateValue(obj, start, end, duration) {
  let startTimestamp = null;
  const step = (timestamp) => {
    if (!startTimestamp) startTimestamp = timestamp;
    const progress = Math.min((timestamp - startTimestamp) / duration, 1);
    obj.innerHTML = Math.floor(progress * (end - start) + start);
    if (progress < 1) {
      window.requestAnimationFrame(step);
    }
  };
  window.requestAnimationFrame(step);
}


function handle_counters() {
    body = document.getElementsByTagName('body')[0];
    body.classList.add("S-app-ready")
    document.querySelector(".site-container").style.visibility = "visible";
  document.querySelector(".laskenta-nav-counter span").innerHTML = laskenta_counter_value;
  document.querySelector(".laskenta-nav-counter--mobile span").innerHTML = laskenta_counter_value;

  ///PAGE SPECIFIC///
  if (document.body.classList.contains('page-template-laskentakohteet')) {
  document.querySelector(".-counted-number").innerHTML = laskenta_counter_value;
  document.querySelector(".-overlay-number").dataset.value = laskenta_counter_value

  var el = document.querySelector(".-overlay-number")
  var value = document.querySelector(".-overlay-number").getAttribute('data-value');
  var min_value = value - 8;
  animateValue(el, min_value, value, 700);

  const options = {
    startVal: min_value,
    duration: 2,
  };
}
  if (document.body.classList.contains('page-template-etusivu')) {
    document.querySelector(".js--counted-number").innerHTML = laskenta_counter_value;
  }

}


var ajax_url = ajaxurl;
var server_url;
var kohde_area;
var laskenta_counter_value = 0;
var call_count = 0;
window.last_call;
// var server_url_etela = "https://www.areite.fi/xml/laskentakohteet_pohjois-suomi.xml"
function call_etela() {
  server_url = "https://www.areite.fi/xml/laskentakohteet_etela-suomi.xml"
  kohde_area = "Etelä-Suomi"
    data_area = "etela-suomi"
        last_call = false;

  get_kohteet();
}
function call_ita() {
  server_url = "https://www.areite.fi/xml/laskentakohteet_ita-suomi.xml"
  kohde_area = "Itä-Suomi"
    data_area = "ita-suomi"
        last_call = false;

  get_kohteet();
}
function call_paakaupunki() {
  server_url = "https://www.areite.fi/xml/laskentakohteet_paakaupunkiseutu.xml"
  kohde_area = "Pääkaupunkiseutu"
    data_area = "paakaupunkiseutu"
      last_call = false;

  get_kohteet();
}
function call_pohjois() {
  server_url = "https://www.areite.fi/xml/laskentakohteet_pohjois-suomi.xml"
  kohde_area = "Pohjois-Suomi"
  data_area = "pohjois-suomi"
  last_call = true;
  get_kohteet();
}

// call_etela();
// call_paakaupunki();
// call_ita();
// call_pohjois();


// handle_counters();

 if (document.body.classList.contains('page-template-laskentakohteet')) {
   call_etela();
   call_paakaupunki();
   call_ita();
   call_pohjois();
   console.log("ON LASKENTA GET KOHTEET");
 }
 else if (sessionStorage.getItem("counter_value")) {
  // Restore the contents of the text field
  laskenta_counter_value = sessionStorage.getItem("counter_value");
  handle_counters();
  console.log("GET COUNT FROM SESSION STORAGE");
}
else {
  call_etela();
  call_paakaupunki();
  call_ita();
  call_pohjois();
    console.log("INITIAL LOAD ON SESSION");

}


function get_kohteet() {

var server_url_local = server_url;
var kohde_area_local = kohde_area;
var data_area_local = data_area;
var last_call_local = last_call;

console.log(server_url_local);
let params = new FormData;
params.append('action', 'get_token');
params.append('server_url', server_url_local);
axios.post(ajax_url, params )
.then( function (response) {

console.log(response);
// var id = response.data.id;
// var no_data_on_trfi = response.data.message;

// JSON.parse(response.data)
// console.log(response.data);
// console.log(response.item);
var r_items = response.data.item
const result = r_items.filter(r_item => r_item.upcoming === "false");
// console.log("result");
// console.log(result);
  // console.log(Object.keys(result).length);
// console.log("result");



var r_count = Object.keys(result).length;

laskenta_counter_value = laskenta_counter_value + r_count

  call_count = call_count + 1;

console.log(r_count);
console.log("total");
console.log(laskenta_counter_value);
console.log("total");
console.log("last call");
console.log(last_call);
console.log(call_count);
console.log("last call");
if (call_count === 4) {
handle_counters();
sessionStorage.setItem('counter_value', laskenta_counter_value);
}

let output = '';

r_items.forEach((elem) => {
  if (elem.upcoming === "false") {

	// console.log(elem); // The element
  // console.log(elem.title);
  //   console.log(elem.type);
  //       console.log(elem.brarea);
  //           console.log(elem.capacity);
  //                 console.log(elem.offer);
  //                   console.log(elem.desc);

                    if (elem.desc.length > 0 ) {
                      var extra_info = `<span class="-location"><img src="http://areite.local/wp-content/themes/areite/svg/info.svg">${elem.desc}</span>`
                    }
                    else {
                        // var extra_info = `<span class="-location"><img src="http://areite.local/wp-content/themes/areite/svg/info.svg">NULL</span>`
                        var extra_info = `<span class="-location" style="display:none"><img src="http://areite.local/wp-content/themes/areite/svg/info.svg">NULL</span>`
                    }

                    if (elem.done === "true" ) {
                      var state = `<span class="td__name -yellow">Valmis</span>`

                    }
                    else {
                        var state = `<span class="td__name ">${elem.state}</span>`
                    }



                    output +=
                    `<tr id="65" class="Anim-item--list" data-area="${data_area_local}">

                        <td class="td--kohde">
                        <div class="flx-container">
                        <span class="td__label">
                        ${elem.title}
                        </span>

                        <span class="td__name">${elem.title}</span>
                        <span class="td__xtra-info">
                          <span class="-location"><img src="http://areite.local/wp-content/themes/areite/svg/location.svg">${kohde_area_local}</span>

                                            ${extra_info}
                                               </span>
                        </div>
                      </td>
                  	                                    <td class="td--basic-cell">
                    <div class="">
                      <div class="flx-container">
                        <span class="td__label">​</span>
                      <span class="td__name">Helsinki</span>
                      <span class="td__xtra-info">​</span>
                      </div>
                    </div>

                  </td>
                  <td class="td--basic-cell">
                    <div class="">
                      <div class="flx-container">
                        <span class="td__label td__label--basic">Tyyppi</span>
                      <span class="td__name">${elem.type}</span>
                      <span class="td__xtra-info">​</span>
                      </div>
                    </div>

                  </td>
                  <td class="td--basic-cell">
                    <div class="">
                      <div class="flx-container">
                        <span class="td__label td__label--basic">Bruttoala</span>
                      <span class="td__name">${elem.brarea}</span>
                      <span class="td__xtra-info">​</span>
                      </div>
                    </div>

                  </td>
                  <td class="td--basic-cell">
                    <div class="">
                      <div class="flx-container">
                        <span class="td__label td__label--basic">Tilavuus</span>
                      <span class="td__name">${elem.capacity}</span>
                      <span class="td__xtra-info">​</span>
                      </div>
                    </div>

                  </td>
                  <td class="td--basic-cell">
                    <div class="">
                      <div class="flx-container">
                        <span class="td__label td__label--basic">Tarjous</span>
                      <span class="td__name">${elem.offer}</span>
                      <span class="td__xtra-info">​</span>
                      </div>
                    </div>

                  </td>
                  <td class="td--basic-cell">
                    <div class="">
                      <div class="flx-container">
                        <span class="td__label td__label--basic">Valmistuu</span>

                    ${state}

                                          <span class="td__xtra-info">​</span>




                      </div>
                    </div>
    <div class="tr__hover-action-indicator js--show-form-modal">Pyydä tarjous</div>
                  </td>

                        </tr>`
}
    })


    // document.querySelector('.laskentakohteet-app__body').innerHTML = output
    if (document.body.classList.contains('page-template-laskentakohteet')) {
      document.querySelector('.laskentakohteet-app__body').insertAdjacentHTML( 'beforeend', output );
    }


})
.catch( function (error) {
  console.log(error);
});
}
