

// var row_anim_items = document.querySelectorAll('.js--table-row-anim');
//
// row_anim_items.forEach(function (elem) {
// 	console.log(elem); // The element
//
// 	elem.classList.add("ANIM--move-up");
//
// 	setTimeout(function() {
//   console.log('Hello World!');
// }, 500);
//
// });


const table_body = document.querySelector(".laskentakohteet-app__body");


function trigger_table_anim () {
	setInterval(function () {
	table_body.classList.add("Anim--move-up");
	setTimeout(function() {
	table_body.classList.remove("Anim--move-up");

	var moving_item = document.querySelector(".Anim-item--list")
	moving_item.parentNode.appendChild(moving_item);


	}, 1000);

	}, 3000);
}

// trigger_table_anim();




console.log("home HELLO");
