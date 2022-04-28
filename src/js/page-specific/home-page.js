

///////TEMPALTE WRAP STARTS//////////
if (document.body.classList.contains('page-template-etusivu')) {
console.log("home HELLO");
 }


var swiper_css_mode = false;

 if (window.innerWidth > 1101) {
     console.log("larger Screen");
 }
 else {
      console.log("Small Screen");
      swiper_css_mode = true;
 }


 const swiper = new Swiper('.swiper-bikes', {
   // Optional parameters

	 slidesPerView: "auto",
	        spaceBetween: 0,
					grabCursor: true,
            cssMode: swiper_css_mode,


   // Navigation arrows
   navigation: {
     nextEl: '.swiper-button-next.-bike-swiper',
     prevEl: '.swiper-button-prev.-bike-swiper',
   },

   // And if we need scrollbar
   scrollbar: {
     el: '.swiper-scrollbar.-bike-swiper',
		 draggable: true,
   },
 });

 const swiper_quotes = new Swiper('.swiper-quotes', {
	 // Optional parameters

	slidesPerView: "auto",
				 spaceBetween: 0,
				 			grabCursor: true,
              cssMode: swiper_css_mode,



	 // Navigation arrows
	 navigation: {
		 nextEl: '.swiper-button-next.-quote-swiper',
		 prevEl: '.swiper-button-prev.-quote-swiper',
	 },

	 // And if we need scrollbar
	 scrollbar: {
		 el: '.swiper-scrollbar.-quote-swiper',
		draggable: true,
	 },
 });
