var MiniMasonry=function(){"use strict";function t(t){return this._sizes=[],this._columns=[],this._container=null,this._count=null,this._width=0,this._removeListener=null,this._currentGutterX=null,this._currentGutterY=null,this._resizeTimeout=null,this.conf={baseWidth:255,gutterX:null,gutterY:null,gutter:10,container:null,minify:!0,ultimateGutter:5,surroundingGutter:!0,direction:"ltr",wedge:!1},this.init(t),this}return t.prototype.init=function(t){for(var i in this.conf)null!=t[i]&&(this.conf[i]=t[i]);if(null!=this.conf.gutterX&&null!=this.conf.gutterY||(this.conf.gutterX=this.conf.gutterY=this.conf.gutter),this._currentGutterX=this.conf.gutterX,this._currentGutterY=this.conf.gutterY,console.log(this._currentGutterX),this._container="object"==typeof this.conf.container&&this.conf.container.nodeName?this.conf.container:document.querySelector(this.conf.container),!this._container)throw new Error("Container not found or missing");var e=this.resizeThrottler.bind(this);window.addEventListener("resize",e),this._removeListener=function(){window.removeEventListener("resize",e)},this.layout()},t.prototype.reset=function(){this._sizes=[],this._columns=[],this._count=null,this._width=this._container.clientWidth;var t=this.conf.baseWidth;this._width<t&&(this._width=t,this._container.style.minWidth=t+"px"),1==this.getCount()?(this._currentGutterX=this.conf.ultimateGutter,this._count=1):this._width<this.conf.baseWidth+2*this._currentGutterX?this._currentGutterX=0:this._currentGutterX=this.conf.gutterX},t.prototype.getCount=function(){return this.conf.surroundingGutter?Math.floor((this._width-this._currentGutterX)/(this.conf.baseWidth+this._currentGutterX)):Math.floor((this._width+this._currentGutterX)/(this.conf.baseWidth+this._currentGutterX))},t.prototype.computeWidth=function(){var t=this.conf.surroundingGutter?(this._width-this._currentGutterX)/this._count-this._currentGutterX:(this._width+this._currentGutterX)/this._count-this._currentGutterX;return t=Number.parseFloat(t.toFixed(2))},t.prototype.layout=function(){if(this._container){this.reset(),null==this._count&&(this._count=this.getCount());for(var t=this.computeWidth(),i=0;i<this._count;i++)this._columns[i]=0;for(var e,n,r=this._container.children,s=0;s<r.length;s++)r[s].style.width=t+"px",this._sizes[s]=r[s].clientHeight;e="ltr"==this.conf.direction?this.conf.surroundingGutter?this._currentGutterX:0:this._width-(this.conf.surroundingGutter?this._currentGutterX:0),this._count>this._sizes.length&&(n=this._sizes.length*(t+this._currentGutterX)-this._currentGutterX,!1===this.conf.wedge?e="ltr"==this.conf.direction?(this._width-n)/2:this._width-(this._width-n)/2:"ltr"==this.conf.direction||(e=this._width-this._currentGutterX));for(var o=0;o<r.length;o++){var h=this.conf.minify?this.getShortest():this.getNextColumn(o),u=0;!this.conf.surroundingGutter&&h==this._columns.length||(u=this._currentGutterX);var c="ltr"==this.conf.direction?e+(t+u)*h:e-(t+u)*h-t,u=this._columns[h];r[o].style.transform="translate3d("+Math.round(c)+"px,"+Math.round(u)+"px,0)",this._columns[h]+=this._sizes[o]+(1<this._count?this.conf.gutterY:this.conf.ultimateGutter)}this._container.style.height=this._columns[this.getLongest()]-this._currentGutterY+"px"}else console.error("Container not found")},t.prototype.getNextColumn=function(t){return t%this._columns.length},t.prototype.getShortest=function(){for(var t=0,i=0;i<this._count;i++)this._columns[i]<this._columns[t]&&(t=i);return t},t.prototype.getLongest=function(){for(var t=0,i=0;i<this._count;i++)this._columns[i]>this._columns[t]&&(t=i);return t},t.prototype.resizeThrottler=function(){this._resizeTimeout||(this._resizeTimeout=setTimeout(function(){this._resizeTimeout=null,this._container.clientWidth!=this._width&&this.layout()}.bind(this),33))},t.prototype.destroy=function(){"function"==typeof this._removeListener&&this._removeListener();for(var t=this._container.children,i=0;i<t.length;i++)t[i].style.removeProperty("width"),t[i].style.removeProperty("transform");this._container.style.removeProperty("height"),this._container.style.removeProperty("min-width")},t}();



// ScrollOut({
//   once: true,
//   threshold: 0.9,
//
// });

AOS.init({
  // Global settings:
  disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
  startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
  initClassName: 'aos-init', // class applied after initialization
  animatedClassName: 'aos-animate', // class applied on animation
  useClassNames: true, // if true, will add content of `data-aos` as classes on scroll
  disableMutationObserver: false, // disables automatic mutations' detections (advanced)
  debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
  throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)


  // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
  offset: 0, // offset (in px) from the original trigger point
  delay: 0, // values from 0 to 3000, with step 50ms
  duration: 400, // values from 0 to 3000, with step 50ms
  easing: 'ease', // default easing for AOS animations
  once: false, // whether animation should happen only once - while scrolling down
  mirror: false, // whether elements should animate out while scrolling past them
  anchorPlacement: 'bottom-bottom', // defines which position of the element regarding to window should trigger the animation

});



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
     var the_url = event.currentTarget.href;
    console.log("modal run");
    event.currentTarget.classList.add("prevent-click");
       let targets_area = event.target.getAttribute('data-modal');
             var tax_elems = document.querySelectorAll('.modal-item');
      var root = document.getElementsByTagName("HTML")[0];
      root.classList.add("S-has--modal")
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
                 // document.querySelector(".site-container").classList.remove("-swap-layer");
                 // document.querySelector(".mobile-nav-trigger-box").classList.remove("S-hidden");
                 console.log("toggle form");
                 document.querySelector(".modal").scroll(0,0);

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
