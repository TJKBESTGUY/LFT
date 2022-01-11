


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



/////SCROLLL SHIIIT ->> MOVE TO GLOBAL LATER////


const target = document.querySelectorAll(".Anim-item--split");
 console.log(target);
 for (var i = 0, len = target.length; i < len; i++) {
	 var target_i = target[i];
	 var text = new SplitType(target_i, {
		 types: 'chars'
	 })

 }

// document.querySelector(".super-digits-mask").classList.add("animated")


ScrollOut({
		once: true,
		threshold: 0.9,
  onShown(el) {
    el.classList.add("animated");
		// var el_child = el.querySelectorAll("span");
		// console.log(el_child);
		var anim_type = el.getAttribute('data-type');
		console.log(anim_type);
		if (anim_type == "counter" ) {
			var value = el.getAttribute('data-value');
			var min_value = value - 10;
			animateValue(el, min_value, value, 900);

			const options = {
			  startVal: min_value,
			  duration: 2,
			};


		// var numAnim = new countUp.CountUp(el, value, options);
		// numAnim.start()

// let count = new CountUp( el, 42, options);
// if (!count.error) {
//   count.start();
// } else {
//   console.error(count.error);
// }

		}
		else {
			console.log("no counnt");
		}

		// el_child.forEach(function (elem) {
		// var value = elem.getAttribute('data-value');
		// var min = value - 2;
		//
		// console.log(value);
		// 	console.log(min);
		// 	animateValue(elem, min, value, 500);
		//
		//
		//
		// });

  }
});



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

// const obj = document.getElementById("value");
// animateValue(obj, 100, 0, 5000);
