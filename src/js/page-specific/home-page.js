

// ScrollOut({
//   once: true,
//   threshold: 0.9,
//
// });

// AOS.init({
//   // Global settings:
//   disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
//   startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
//   initClassName: 'aos-init', // class applied after initialization
//   animatedClassName: 'aos-animate', // class applied on animation
//   useClassNames: true, // if true, will add content of `data-aos` as classes on scroll
//   disableMutationObserver: false, // disables automatic mutations' detections (advanced)
//   debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
//   throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)
//
//
//   // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
//   offset: 0, // offset (in px) from the original trigger point
//   delay: 0, // values from 0 to 3000, with step 50ms
//   duration: 400, // values from 0 to 3000, with step 50ms
//   easing: 'ease', // default easing for AOS animations
//   once: true, // whether animation should happen only once - while scrolling down
//   mirror: false, // whether elements should animate out while scrolling past them
//   anchorPlacement: 'bottom-bottom', // defines which position of the element regarding to window should trigger the animation
//
// });



document.addEventListener('alpine:init', () => {
      Alpine.store('dropdown', false);
        Alpine.store('clicked_test', false)

        Alpine.effect(() => {
          var dropdown = Alpine.store('dropdown')
            var test = Alpine.store('dropdown')
          if (dropdown === true) {
            console.log('dropdown true')
            document.body.classList.add("S-has--dropdown")
          }
          else {
                  console.log('dropdown false')

            document.body.classList.remove("S-has--dropdown")


          }
              console.log('dropdown')
         console.log(Alpine.store('dropdown'))
                     console.log('clicktest')
            console.log(Alpine.store('clicked_test'))

     })
  })


if (document.querySelector('.themes-list')) {

document.querySelector('.themes-list .basic-card__inner').addEventListener("click", show_more);
}

function show_more() {
document.querySelector('.themes-list').classList.add("show-all");

}




///////TEMPALTE WRAP STARTS//////////
if (document.body.classList.contains('page-template-etusivu')) {
console.log("home HELLO");
 }


window.swiper_css_mode = false;

 if (window.innerWidth > 1101) {
     console.log("larger Screen");
 }
 else {
      console.log("Small Screen");
      // swiper_css_mode = true;
 }




 function initSwiper() {

console.log("init swiper");

     this.mySwiper = new Swiper(".swiper-container", {

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


}

 // const swiper_quotes = new Swiper('.swiper-quotes', {
	//  // Optional parameters
 //
	// slidesPerView: "auto",
	// 			 spaceBetween: 0,
	// 			 			grabCursor: true,
 //              cssMode: swiper_css_mode,
 //
 //
 //
	//  // Navigation arrows
	//  navigation: {
	// 	 nextEl: '.swiper-button-next.-quote-swiper',
	// 	 prevEl: '.swiper-button-prev.-quote-swiper',
	//  },
 //
	//  // And if we need scrollbar
	//  scrollbar: {
	// 	 el: '.swiper-scrollbar.-quote-swiper',
	// 	draggable: true,
	//  },
 // });









 /////////////// MODAL /////////////

 window.runModal = function(event) {
         event.preventDefault();

    console.log("modal run");
    event.currentTarget.classList.add("prevent-click");
       let targets_area = event.target.getAttribute('data-modal');
             var tax_elems = document.querySelectorAll('.modal-item');
      var root = document.getElementsByTagName("HTML")[0];

      root.classList.add("S-has--modal")

      var the_url = targets_area;
                             var stateObj;
                             var pjax_url = the_url;
                             window.history.pushState(stateObj, "", the_url);

      document.querySelector(".modal-smoke").classList.remove("S-hidden");
      document.querySelector(".modal").classList.remove("S-hidden");
      tax_elems.forEach(function (elem) {
        // console.log(elem);
         if (elem.dataset.modal.includes(targets_area)) {
           elem.classList.remove("S-disabled__item");
           }
           else  {
             elem.classList.add("S-disabled__item");
           }
      });

   }

   window.runModalContact = function(event) {
           event.preventDefault();
       var the_url = event.currentTarget.href;
      console.log("modal run Contact");
         document.querySelector(".modal").scroll(0,0);
          document.querySelector(".modal-contact-form").classList.remove("S-hidden");
            setTimeout(function(){
                document.querySelector(".modal-contact-form").style.opacity = 1;
                  document.querySelector(".modal-contact-form").style.transform = "none";
              }, 10);

      event.currentTarget.classList.add("prevent-click");

               var tax_elems = document.querySelectorAll('.modal-item');
        var root = document.getElementsByTagName("HTML")[0];
        root.classList.add("S-has--modal")
        document.querySelector(".modal-smoke").classList.remove("S-hidden");
        document.querySelector(".modal").classList.remove("S-hidden");
        tax_elems.forEach(function (elem) {

               elem.classList.add("S-disabled__item");

        });

     }


 window.hideModal = function(e) {
     var root = document.getElementsByTagName("HTML")[0];
     root.classList.remove("S-has--modal")
           document.querySelector(".modal-contact-form").classList.add("S-hidden");
             document.querySelector(".modal-contact-form").removeAttribute("style");
                 document.querySelector(".modal-smoke").classList.add("S-hidden");
                 document.querySelector(".modal").classList.add("S-hidden");

                 document.querySelector(".modal").scroll(0,0);

                 var the_url = page_url;
                                        var stateObj;
                                        var pjax_url = the_url;
                                        window.history.replaceState(stateObj, "", the_url);

             }




window.runTaxFilters = function(e) {
                console.log("tax run");
                 let targets_area = e.target.getAttribute('data-tax');
                 console.log(targets_area);
                    var tax_elems = document.querySelectorAll('.workshop-group');
                    document.body.classList.add("S-animating--filters");
                    if (document.querySelector(".btn--basic.S-active")) {
                       document.querySelector(".btn--basic.S-active").classList.remove("S-active");
                    }

                    setTimeout(function(){
                      e.target.classList.add("S-active");

                    }, 0);
                     	setTimeout(function(){
                    tax_elems.forEach(function (elem) {
                      // console.log(elem);
                       if (elem.dataset.tax.includes(targets_area)) {
                         elem.classList.remove("S-disabled__item");
                         }
                         else  {
                           elem.classList.add("S-disabled__item");
                         }
                    });
                             document.body.classList.remove("S-animating--filters");
                         }, 300);



               }


               window.resetTaxFilters = function(e) {


                                   var tax_elems = document.querySelectorAll('.workshop-group');
                                   document.body.classList.add("S-animating--filters");
                                   if (document.querySelector(".btn--basic.S-active")) {
                                      document.querySelector(".btn--basic.S-active").classList.remove("S-active");
                                   }

                                     setTimeout(function(){
                                   tax_elems.forEach(function (elem) {
                                           elem.classList.remove("S-disabled__item");
                                   });
                                            document.body.classList.remove("S-animating--filters");
                                        }, 300);
                              }






                              window.runTaxFilters_asiakastarinat = function(e) {
                                              console.log("tax run asiakas");
                                               let targets_area = e.target.getAttribute('data-tax');
                                               console.log(targets_area);
                                                  var tax_elems = document.querySelectorAll('.article-card');
                                                  document.body.classList.add("S-animating--filters");
                                                  if (document.querySelector(".btn--basic.S-active")) {
                                                     document.querySelector(".btn--basic.S-active").classList.remove("S-active");
                                                  }

                                                  setTimeout(function(){
                                                    e.target.classList.add("S-active");

                                                  }, 0);
                                                   	setTimeout(function(){
                                                  tax_elems.forEach(function (elem) {
                                                    console.log(elem);
                                                     if (elem.dataset.tax.includes(targets_area)) {
                                                       elem.classList.remove("S-disabled__item");
                                                       }
                                                       else  {
                                                         elem.classList.add("S-disabled__item");
                                                       }
                                                  });
                                                           document.body.classList.remove("S-animating--filters");
                                                       }, 300);



                                             }


                                             window.resetTaxFilters_asiakastarinat = function(e) {


                                                                 var tax_elems = document.querySelectorAll('.article-card');
                                                                 document.body.classList.add("S-animating--filters");
                                                                 if (document.querySelector(".btn--basic.S-active")) {
                                                                    document.querySelector(".btn--basic.S-active").classList.remove("S-active");
                                                                 }

                                                                   setTimeout(function(){
                                                                 tax_elems.forEach(function (elem) {
                                                                         elem.classList.remove("S-disabled__item");
                                                                 });
                                                                          document.body.classList.remove("S-animating--filters");
                                                                      }, 300);
                                                            }






////Anim
const the_animation = document.querySelectorAll('.section--basic')

const observer_animation = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.classList.add('scroll-animation');
            setTimeout(function() {
            entry.target.classList.add('scroll-animation--lets-click');
          }, 1000);

        }
            else {

            }

    })
},
   { threshold: 0.3
   });
//
  for (let i = 0; i < the_animation.length; i++) {
   const elements = the_animation[i];

    observer_animation.observe(elements);
  }
