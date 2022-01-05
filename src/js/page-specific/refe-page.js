

var refe_button = document.querySelectorAll('.js--refe-content-extend');

refe_button.forEach(function (elem) {
	console.log(elem); // The element
elem.addEventListener("click", show_refe_info);
});

function show_refe_info(e) {
console.log("button working");
var target = e.currentTarget;
// let person_ID = event.target.getAttribute('data-person');
var parent = event.target.closest(".wrap__refe-extended-content");
var target_height = parent.clientHeight;
var target_h_px = -target_height + "px";
// console.log(parent_height);
parent.classList.add("S-refe-activate");

setTimeout(function(){
  parent.querySelector(".refe-extended-content").style.webkitTransform = "translateY(" + target_h_px + ")";
  parent.querySelector(".refe-extended-content").style.opacity = 1;
}, 400);

}

console.log("REFE HELLO");
