/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./inc/core/_core.js":
/*!***************************!*\
  !*** ./inc/core/_core.js ***!
  \***************************/
/***/ (() => {



/***/ }),

/***/ "./inc/scrollmagic/_scrollmagic.js":
/*!*****************************************!*\
  !*** ./inc/scrollmagic/_scrollmagic.js ***!
  \*****************************************/
/***/ (() => {

var scrollMagicController = ''; //setup scroller function

/**
 * element can have these data attributes:
 * data-scrollanimation = a class to add to this element on scroll
 * data-scrolltrigger = the element that triggers the scene to start
 * data-scrollhook = onEnter, onLeave, default is center
 * data-scrolloffset = offset from scrollhook on trigger element
 * data-scrollduration = how long it should last. if not set, 0  is used and that means it doesnt reset until you scroll up.
 * data-scrollscrub = tweens between two classes as you scroll. tween expects a duration, else duration will be 100
 *
 */

function runScrollerAttributes(element) {
  //this function can be run on an alement even after load and they will be added to scrollMagicController
  //scrollmagic must be loaded
  if ('undefined' != typeof ScrollMagic && element.hasAttribute('data-scrollanimation')) {
    //scroll animation attributes
    var animationClass = element.dataset.scrollanimation,
        triggerHook = element.dataset.scrollhook || 'center',
        offset = element.dataset.offset || 0,
        triggerElement = element.dataset.scrolltrigger || element,
        duration = element.dataset.duration || 0,
        tween = element.dataset.scrollscrub,
        reverse = element.dataset.reverse || true;
    scene = ''; //if animation has word up or down, its probably an animation that moves it up or down,
    //so make sure trigger element

    if (-1 !== animationClass.toLowerCase().indexOf('up') || -1 !== animationClass.toLowerCase().indexOf('down')) {
      //get parent element and make that the trigger, but use an offset from current element
      if (triggerElement === element) {
        triggerElement = element.parentElement;
        offset = element.offsetTop - triggerElement.offsetTop + parseInt(offset);
      }

      triggerHook = 'onEnter';
    } //if fixed at top, wrap in div


    if (element.getAttribute('data-scrollanimation') === 'fixed-at-top') {
      var wrappedElement = wrap(element, document.createElement('div'));
      wrappedElement.classList.add('fixed-holder');
      triggerHook = 'onLeave';
      triggerElement = element.parentElement;
    } //if scrollscrub exists used tweenmax


    if (tween !== undefined) {
      if (!duration) {
        duration = 100;
      }

      tween = TweenMax.to(element, .65, {
        className: '+=' + animationClass
      }); //finally output the scene

      scene = new ScrollMagic.Scene({
        triggerElement: triggerElement,
        offset: offset,
        triggerHook: triggerHook,
        duration: duration,
        reverse: reverse
      }).setTween(tween).addTo(scrollMagicController) // .addIndicators()
      ;
    } else {
      scene = new ScrollMagic.Scene({
        triggerElement: triggerElement,
        offset: offset,
        triggerHook: triggerHook,
        duration: duration,
        reverse: reverse
      }).on('enter leave', function () {
        //instead of using toggle class we can use these events of on enter and leave and toggle class at both times
        element.classList.toggle(animationClass);
        element.classList.toggle('active'); //if fixed at top set height for spacer and width

        if (element.getAttribute('data-scrollanimation') === 'fixed-at-top') {
          //making fixed item have a set width matching parent
          element.style.width = element.parentElement.clientWidth + 'px';
          element.style.left = element.parentElement.offsetLeft + 'px';
        }
      }).addTo(scrollMagicController) //.setClassToggle(element, animationClass + ' active').addTo(scrollMagicController)
      // .addIndicators()
      ;
    } //good for knowing when its been loaded


    document.body.classList.add('scrollmagic-loaded');
  }
}

document.addEventListener('DOMContentLoaded', function () {
  /*------- Scroll Magic Events Init --------*/
  if ('undefined' != typeof ScrollMagic) {
    scrollMagicController = new ScrollMagic.Controller();
    document.querySelectorAll('[data-scrollanimation]').forEach(function (element) {
      runScrollerAttributes(element);
    });
  }
});

/***/ }),

/***/ "./src/js/core/events.js":
/*!*******************************!*\
  !*** ./src/js/core/events.js ***!
  \*******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _setup__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./setup */ "./src/js/core/setup.js");

/*--------------------------------------------------------------
# Adding some global events and functions users can use via data attributes
--------------------------------------------------------------*/

/**
 * resize menu buttons on load. also runs on resize.
 * menu button is not inside site-top for various reasons (we dont want x to be inside or when menu opens the ex is uinderneath.
 * so we use this function to match the site -top height and center it as if it was inside
 */

var menuButtons = '';

function placeMenuButtons() {
  var $siteTopHeight = document.querySelector('.site-top');

  if ($siteTopHeight != null) {
    $siteTopHeight = $siteTopHeight.clientHeight;
  } // let adminbar = document.querySelector('#wpadminbar');
  // let adminbarHeight = 0;
  //
  // if (adminbar !== null) {
  // 	adminbarHeight = adminbar.clientHeight;
  // }


  if (menuButtons.length) {
    menuButtons.forEach(function (button) {
      button.style.height = $siteTopHeight + 'px';
    });
  }
}
/*--------------------------------------------------------------
# IGN Events
--------------------------------------------------------------*/


document.addEventListener('DOMContentLoaded', function () {
  /*------- Add touch classes or not --------*/
  if (!("ontouchstart" in document.documentElement)) {
    document.documentElement.className += " no-touch-device";
  } else {
    document.documentElement.className += " touch-device";
  }
  /*------- menu buttons --------*/
  //if the menu button is outside site-top. get both buttons for centering both.


  if (!document.querySelector('.app-menu')) {
    menuButtons = document.querySelectorAll('.panel-left-toggle, .panel-right-toggle');
  } else {
    //otherwise the menu button does not need to be centered because its part of the app menu and moves. (moved in navigation.js)
    menuButtons = document.querySelectorAll('.panel-right-toggle');
  } //we run menu button function below in resize event

  /*------- Toggle Buttons --------*/
  //trigger optional afterToggle event
  //adding new custom event for after the element is toggled


  var toggleEvent = null;

  if (isIE11) {
    toggleEvent = document.createEvent('Event'); // Define that the event name is 'build'.

    toggleEvent.initEvent('afterToggle', true, true);
  } else {
    toggleEvent = new Event('afterToggle', {
      bubbles: true
    }); //bubble allows for delegation on body
  } //add aria to buttons currently on page


  var buttons = document.querySelectorAll('[data-toggle]');
  buttons.forEach(function (button) {
    button.setAttribute('role', 'switch');
    button.setAttribute('aria-checked', button.classList.contains('toggled-on') ? 'true' : 'false');
  }); //toggling the buttons with delegation click

  document.body.addEventListener('click', function (e) {
    var item = e.target.closest('[data-toggle]');

    if (item) {
      var $doDefault = item.getAttribute('data-default'); //normally we prevent default unless someone add data-default

      if (null === $doDefault) {
        e.preventDefault();
        e.stopPropagation();
      } //if data-radio is found, only one can be selected at a time.
      // untoggles any other item with same radio value
      //radio items cannot be untoggled until another item is clicked


      var radioSelector = item.getAttribute('data-radio');

      if (radioSelector !== null) {
        var radioSelectors = document.querySelectorAll("[data-radio=\"".concat(radioSelector, "\"]"));
        radioSelectors.forEach(function (radioItem) {
          if (radioItem !== item && radioItem.classList.contains('toggled-on')) {
            toggleItem(radioItem); //toggle all other radio items off when this one is being turned on
          }
        });
      } //if item has data-switch it can only be turned on or off but not both by this button based on value of data-switch (its either on or off)


      var switchItem = item.getAttribute('data-switch'); //finally toggle the clicked item. some types of items cannot be untoggled like radio or an on switch

      if (radioSelector !== null) {
        toggleItem(item, 'on'); //the item clicked on cannot be unclicked until another item is pressed
      } else if (switchItem !== null) {
        if (switchItem === 'on') {
          toggleItem(item, 'on');
        } else {
          toggleItem(item, 'off');
        }
      } else {
        toggleItem(item); //normal regular toggle can turn itself on or off
      }
    } //end if item found

  }); //actual toggle of an item and add class toggled-on and any other classes needed. Also do a slide if necessary

  function toggleItem(item) {
    var forcedState = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 'none';

    //toggle item
    if (forcedState === 'on') {
      item.classList.add('toggled-on'); //radio or data-switch of on will always toggle-on
    } else if (forcedState === 'off') {
      item.classList.remove('toggled-on'); //data-switch of off will always toggle off
    } else {
      item.classList.toggle('toggled-on'); //basic data toggle item
    } //is item toggled? used for the rest of this function to toggle another target if needed.


    var isToggled = item.classList.contains('toggled-on');
    item.setAttribute('aria-expanded', isToggled ? 'true' : 'false'); //get class to add to this item or another

    var $class = item.getAttribute('data-toggle'),
        $target = document.querySelectorAll(item.getAttribute('data-target'));

    if ($class === null || !$class) {
      $class = 'toggled-on'; //default class added is toggled-on
    } //special class added to another item


    if ($target.length) {
      $target.forEach(function (targetItem) {
        if (isToggled) {
          targetItem.classList.add($class);
        } else {
          targetItem.classList.remove($class);
        }

        targetItem.setAttribute('aria-expanded', isToggled ? 'true' : 'false'); //data slide open or closed

        if (targetItem.dataset.slide !== undefined) {
          var slideTime = targetItem.dataset.slide ? parseFloat(targetItem.dataset.slide) : .5;

          if (isToggled) {
            (0,_setup__WEBPACK_IMPORTED_MODULE_0__.ignSlideDown)(targetItem, slideTime);
          } else {
            ignSlideUp(targetItem, slideTime);
          }
        } //allow event to happen after click for the targeted item


        targetItem.dispatchEvent(toggleEvent);
      });
    } else {
      //applies class to the clicked item, there is no target
      if ($class !== 'toggled-on') {
        //add class to clicked item if its not set to be toggled-on
        if (isToggled) {
          item.classList.toggle($class);
        } else {
          item.classList.remove($class);
        }
      }
    } //trigger optional afterToggle event. continue the click event for customized stuff


    item.dispatchEvent(toggleEvent);
  }
  /*------- Moving items Event as well as all resizing --------*/
  //on Window resize we can move items to and from divs with data-moveto="the destination"
  //it will move there when the site reaches smaller than a size defaulted to 1030 or set that with data-moveat
  //the whole div, including the data att moveto moves back and forth


  var movedId = 0;
  var moveEvent = new Event('afterResize', {
    bubbles: true
  }); //bubble allows for delegation on body

  function moveItems() {
    var windowWidth = window.innerWidth;
    var $moveItems = document.querySelectorAll('[data-moveto]');
    $moveItems.forEach(function (item) {
      var moveAt = item.getAttribute('data-moveat'),
          destination = document.querySelector(item.getAttribute('data-moveto')),
          source = item.getAttribute('data-movefrom');
      moveAt = moveAt ? moveAt : 1030;

      if (moveAt.startsWith('--')) {
        if (isIE11) {
          moveAt = 1030;
        } else {
          var cssVars = getComputedStyle(document.body); //get css variables

          moveAt = parseInt(cssVars.getPropertyValue(moveAt), 10);
        }
      }

      if (!destination) {
        return;
      } //if no data movefrom is found add one to parent so we can move items back in. now they go back and forth


      if (!source) {
        var sourceElem = item.parentElement.id; //if parent has no id attr, add one with a number so its unique

        if (!sourceElem) {
          item.parentElement.setAttribute('id', 'move-' + movedId);
          movedId++;
          sourceElem = item.parentElement.id;
        }

        item.setAttribute('data-movefrom', '#' + sourceElem);
      }

      source = document.querySelector(item.getAttribute('data-movefrom')); //if the screen is smaller than moveAt (1030), move to destination

      if (windowWidth < moveAt || moveAt == 0) {
        //no need to move if its already there...
        if (!destination.contains(item)) {
          if (item.hasAttribute('data-moveto-pos')) {
            destination.insertBefore(item, destination.children[item.getAttribute('data-moveto-pos')]);
          } else {
            destination.appendChild(item);
          }
        }
      } else {
        if (!source.contains(item)) {
          if (item.hasAttribute('data-movefrom-pos')) {
            source.insertBefore(item, source.children[item.getAttribute('data-movefrom-pos')]);
          } else {
            source.appendChild(item);
          }
        }
      } //show it


      item.classList.add('visible');
    });
    placeMenuButtons(); //running the moving of menu buttons here. nothing to do with moving items.
    //fix height of fixed holder fixed at top items

    document.querySelectorAll('.fixed-holder').forEach(function (fixed) {
      fixed.style.height = fixed.firstElementChild.clientHeight + 'px';
    });
    document.dispatchEvent(moveEvent);
  }

  window.addEventListener('resize', (0,_setup__WEBPACK_IMPORTED_MODULE_0__.throttle)(moveItems, 400));
  moveItems();
  document.documentElement.classList.remove('dom-loading'); //add finished loading ignition events

  var EventFinished = null;

  if (isIE11) {
    EventFinished = document.createEvent('Event'); // Define that the event name is 'build'.

    EventFinished.initEvent('afterIgnEvents', true, true);
  } else {
    EventFinished = new Event('afterIgnEvents');
  }

  document.dispatchEvent(EventFinished);
});
/*------- Function for hi red background image swap --------*/
//check if device is retina

function isHighDensity() {
  return window.matchMedia && window.matchMedia('(-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi)').matches;
} //check if file exists on server before using


function fileExists(image_url) {
  var http = new XMLHttpRequest();
  http.open('HEAD', image_url, true);
  http.send();
  return http.status != 404;
} //Add inline retina image if found and on retina device. To use add data-high-res to an inline element with a background-image


if (isHighDensity()) {
  var retinaImage = document.querySelectorAll('[data-high-res]');
  retinaImage.forEach(function (item) {
    var image2x = ''; //if a high res is provided use that, else use background image but add 2x at end.

    if (item.dataset.highRes) {
      image2x = item.dataset.highRes;
    } else {
      //get url for original image
      var image = item.style.backgroundImage.slice(4, -1).replace(/"/g, ""); //add @2x to it if image exists.

      image2x = image.replace(/(\.[^.]+$)/, '@2x$1');
    }

    if (fileExists(image2x)) {
      item.style.backgroundImage = 'url("' + image2x + '")';
    }
  });
}

/***/ }),

/***/ "./src/js/core/responsive-iframe.js":
/*!******************************************!*\
  !*** ./src/js/core/responsive-iframe.js ***!
  \******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _setup__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./setup */ "./src/js/core/setup.js");
 //make iframe videos responsive

document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('iframe[src*="youtube.com"], iframe[data-src*="youtube.com"], iframe[src*="vimeo.com"], iframe[data-src*="vimeo.com"]').forEach(function (iframe) {
    if (!iframe.parentElement.classList.contains('videowrapper')) {
      (0,_setup__WEBPACK_IMPORTED_MODULE_0__.wrap)(iframe).classList.add('videowrapper');
    }
  });
});

/***/ }),

/***/ "./src/js/core/setup.js":
/*!******************************!*\
  !*** ./src/js/core/setup.js ***!
  \******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "wrap": () => (/* binding */ wrap),
/* harmony export */   "debounce": () => (/* binding */ debounce),
/* harmony export */   "throttle": () => (/* binding */ throttle),
/* harmony export */   "ignSlidePropertyReset": () => (/* binding */ ignSlidePropertyReset),
/* harmony export */   "ignSlideUp": () => (/* binding */ ignSlideUp),
/* harmony export */   "ignSlide": () => (/* binding */ ignSlide),
/* harmony export */   "ignSlideDown": () => (/* binding */ ignSlideDown),
/* harmony export */   "ignSlideToggle": () => (/* binding */ ignSlideToggle)
/* harmony export */ });
/*------- Core Functions --------*/
//wrap function. use in scrollmagic and more
function wrap(el, wrapper) {
  if (wrapper === undefined) {
    wrapper = document.createElement('div');
  }

  el.parentNode.insertBefore(wrapper, el);
  wrapper.appendChild(el);
  return wrapper;
} //debounce to slow down an event that users window size or the like
//debounce will wait till the window is resized and then run

function debounce(func, wait, immediate) {
  var timeout;
  return function () {
    var context = this,
        args = arguments;

    var later = function later() {
      timeout = null;
      if (!immediate) func.apply(context, args);
    };

    var callNow = immediate && !timeout;
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
    if (callNow) func.apply(context, args);
  };
} //throttle will run every few milliseconds as opposed to every millisecond

function throttle(fn, threshhold, scope) {
  threshhold || (threshhold = 250);
  var last, deferTimer;
  return function () {
    var context = scope || this;
    var now = +new Date(),
        args = arguments;

    if (last && now < last + threshhold) {
      // hold on to it
      clearTimeout(deferTimer);
      deferTimer = setTimeout(function () {
        last = now;
        fn.apply(context, args);
      }, threshhold);
    } else {
      last = now;
      fn.apply(context, args);
    }
  };
} ///slide elements

var ignSlideTimer = Array; //{} //turn into array nad ad a data-sliding wirth a number use that number as index to clear it
//remove inline styling if any found except display

function ignSlidePropertyReset(target, direction) {
  if (direction === 'up') {
    target.style.display = 'none';
  } //clear these properties


  target.style.removeProperty('transition-duration');
  target.style.removeProperty('transition-property');
  target.style.removeProperty('height');
  target.style.removeProperty('padding-top');
  target.style.removeProperty('padding-bottom');
  target.style.removeProperty('margin-top');
  target.style.removeProperty('margin-bottom');
  target.style.removeProperty('overflow');
  target.removeAttribute('slideTimer');
}
function ignSlideUp(target) {
  var duration = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : .5;
  return ignSlide('up', target, duration);
}
function ignSlide() {
  var direction = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 'up';
  var target = arguments.length > 1 ? arguments[1] : undefined;
  var duration = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : .5;
  return new Promise(function (resolve, reject) {
    // Exit function if no target it falsey, as we depend on the target to run this function
    if (!target) return;

    if (target.dataset.slideTimer) {
      clearTimeout(parseInt(target.dataset.slideTimer));
      target.removeAttribute('slide-timer');
    }

    var slideTimer = setTimeout(function () {
      ignSlidePropertyReset(target, direction);
      resolve();
    }, duration * 1000);
    target.dataset.slideTimer = slideTimer + ''; //set transitions and overflow

    target.style.transitionProperty = 'height, margin, padding';
    target.style.transitionDuration = duration + 's';

    if (direction === 'up') {
      target.style.overflow = 'hidden'; //no point sliding up if its been set to hidden via css

      if (window.getComputedStyle(target).display === 'none') {
        return;
      } //set height just in case there is none. cannot be nothing or auto


      target.style.height = "".concat(target.scrollHeight, "px"); //1 split second after: closing the height from wherever it is currently

      setTimeout(function () {
        target.style.height = 0; //closing item now

        target.style.paddingTop = 0;
        target.style.paddingBottom = 0;
        target.style.marginBottom = 0;
        target.style.marginTop = 0;
      }, 100);
    } else {
      //sliding down
      // save original margins, and padding, no the inline ones
      var height = window.getComputedStyle(target).height; //might be open... or have a set height

      var display = window.getComputedStyle(target).display;
      var paddingTop = window.getComputedStyle(target).paddingTop || 0;
      var paddingBottom = window.getComputedStyle(target).paddingBottom || 0;
      var marginBottom = window.getComputedStyle(target).marginBottom || 0;
      var marginTop = window.getComputedStyle(target).marginTop || 0;
      target.style.removeProperty('overflow'); //cant animate from auto

      if (height === 'auto') {
        target.style.height = 0;
      } //if its not showing now, we will show from 0 on everything


      if (display === 'none') {
        display = 'block'; //we will be setting this to show

        paddingBottom = paddingTop = marginBottom = marginTop = 0; //animating from 0

        target.style.height = 0;
      } //display must be set before transitioning below


      target.style.display = display; //actual transitions

      setTimeout(function () {
        //animate properties to open and normal
        target.style.height = "".concat(target.scrollHeight, "px"); //also animating the padding and margins

        target.style.paddingTop = paddingTop;
        target.style.paddingBottom = paddingBottom;
        target.style.marginTop = marginTop;
        target.style.marginBottom = marginBottom;
      }, 0);
    }
  });
}
/**
 *
 * @param target
 * @param duration
 *
 * Style element as it should show then set it to display none (or have it get display none from slide up or something else)
 */

function ignSlideDown(target) {
  var duration = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : .5;
  return ignSlide('down', target, duration);
}
function ignSlideToggle(target) {
  var duration = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : .5;

  if (window.getComputedStyle(target).display === 'none') {
    return ignSlideDown(target, duration);
  } else {
    return ignSlideUp(target, duration);
  }
}

/***/ }),

/***/ "./src/js/page-specific/home-page.js":
/*!*******************************************!*\
  !*** ./src/js/page-specific/home-page.js ***!
  \*******************************************/
/***/ (() => {

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
document.addEventListener('alpine:init', function () {
  Alpine.store('dropdown', false);
  Alpine.store('clicked_test', false);
  Alpine.effect(function () {
    var dropdown = Alpine.store('dropdown');
    var test = Alpine.store('dropdown');

    if (dropdown === true) {
      console.log('dropdown true');
      document.body.classList.add("S-has--dropdown");
    } else {
      console.log('dropdown false');
      document.body.classList.remove("S-has--dropdown");
    }

    console.log('dropdown');
    console.log(Alpine.store('dropdown'));
    console.log('clicktest');
    console.log(Alpine.store('clicked_test'));
  });
});

if (document.querySelector('.themes-list')) {
  document.querySelector('.themes-list .basic-card__inner').addEventListener("click", show_more);
}

function show_more() {
  document.querySelector('.themes-list').classList.add("show-all");
} ///////TEMPALTE WRAP STARTS//////////


if (document.body.classList.contains('page-template-etusivu')) {
  console.log("home HELLO");
}

window.swiper_css_mode = false;

if (window.innerWidth > 1101) {
  console.log("larger Screen");
} else {
  console.log("Small Screen"); // swiper_css_mode = true;
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
      prevEl: '.swiper-button-prev.-bike-swiper'
    },
    // And if we need scrollbar
    scrollbar: {
      el: '.swiper-scrollbar.-bike-swiper',
      draggable: true
    }
  });
} // const swiper_quotes = new Swiper('.swiper-quotes', {
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


window.runModal = function (event) {
  event.preventDefault();
  console.log("modal run");
  event.currentTarget.classList.add("prevent-click");
  var targets_area = event.target.getAttribute('data-modal');
  var tax_elems = document.querySelectorAll('.modal-item');
  var root = document.getElementsByTagName("HTML")[0];
  root.classList.add("S-has--modal");
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
    } else {
      elem.classList.add("S-disabled__item");
    }
  });
};

window.runModalContact = function (event) {
  event.preventDefault();
  var the_url = event.currentTarget.href;
  console.log("modal run Contact");
  document.querySelector(".modal").scroll(0, 0);
  document.querySelector(".modal-contact-form").classList.remove("S-hidden");
  setTimeout(function () {
    document.querySelector(".modal-contact-form").style.opacity = 1;
    document.querySelector(".modal-contact-form").style.transform = "none";
  }, 10);
  event.currentTarget.classList.add("prevent-click");
  var tax_elems = document.querySelectorAll('.modal-item');
  var root = document.getElementsByTagName("HTML")[0];
  root.classList.add("S-has--modal");
  document.querySelector(".modal-smoke").classList.remove("S-hidden");
  document.querySelector(".modal").classList.remove("S-hidden");
  tax_elems.forEach(function (elem) {
    elem.classList.add("S-disabled__item");
  });
};

window.hideModal = function (e) {
  var root = document.getElementsByTagName("HTML")[0];
  root.classList.remove("S-has--modal");
  document.querySelector(".modal-contact-form").classList.add("S-hidden");
  document.querySelector(".modal-contact-form").removeAttribute("style");
  document.querySelector(".modal-smoke").classList.add("S-hidden");
  document.querySelector(".modal").classList.add("S-hidden");
  document.querySelector(".modal").scroll(0, 0);
  var the_url = page_url;
  var stateObj;
  var pjax_url = the_url;
  window.history.pushState(stateObj, "", the_url);
};

window.runTaxFilters = function (e) {
  console.log("tax run");
  var targets_area = e.target.getAttribute('data-tax');
  console.log(targets_area);
  var tax_elems = document.querySelectorAll('.workshop-group');
  document.body.classList.add("S-animating--filters");

  if (document.querySelector(".btn--basic.S-active")) {
    document.querySelector(".btn--basic.S-active").classList.remove("S-active");
  }

  setTimeout(function () {
    e.target.classList.add("S-active");
  }, 0);
  setTimeout(function () {
    tax_elems.forEach(function (elem) {
      // console.log(elem);
      if (elem.dataset.tax.includes(targets_area)) {
        elem.classList.remove("S-disabled__item");
      } else {
        elem.classList.add("S-disabled__item");
      }
    });
    document.body.classList.remove("S-animating--filters");
  }, 300);
};

window.resetTaxFilters = function (e) {
  var tax_elems = document.querySelectorAll('.workshop-group');
  document.body.classList.add("S-animating--filters");

  if (document.querySelector(".btn--basic.S-active")) {
    document.querySelector(".btn--basic.S-active").classList.remove("S-active");
  }

  setTimeout(function () {
    tax_elems.forEach(function (elem) {
      elem.classList.remove("S-disabled__item");
    });
    document.body.classList.remove("S-animating--filters");
  }, 300);
};

window.runTaxFilters_asiakastarinat = function (e) {
  console.log("tax run asiakas");
  var targets_area = e.target.getAttribute('data-tax');
  console.log(targets_area);
  var tax_elems = document.querySelectorAll('.article-card');
  document.body.classList.add("S-animating--filters");

  if (document.querySelector(".btn--basic.S-active")) {
    document.querySelector(".btn--basic.S-active").classList.remove("S-active");
  }

  setTimeout(function () {
    e.target.classList.add("S-active");
  }, 0);
  setTimeout(function () {
    tax_elems.forEach(function (elem) {
      console.log(elem);

      if (elem.dataset.tax.includes(targets_area)) {
        elem.classList.remove("S-disabled__item");
      } else {
        elem.classList.add("S-disabled__item");
      }
    });
    document.body.classList.remove("S-animating--filters");
  }, 300);
};

window.resetTaxFilters_asiakastarinat = function (e) {
  var tax_elems = document.querySelectorAll('.article-card');
  document.body.classList.add("S-animating--filters");

  if (document.querySelector(".btn--basic.S-active")) {
    document.querySelector(".btn--basic.S-active").classList.remove("S-active");
  }

  setTimeout(function () {
    tax_elems.forEach(function (elem) {
      elem.classList.remove("S-disabled__item");
    });
    document.body.classList.remove("S-animating--filters");
  }, 300);
}; ////Anim


var the_animation = document.querySelectorAll('.section--basic');
var observer_animation = new IntersectionObserver(function (entries) {
  entries.forEach(function (entry) {
    if (entry.isIntersecting) {
      entry.target.classList.add('scroll-animation');
      setTimeout(function () {
        entry.target.classList.add('scroll-animation--lets-click');
      }, 1000);
    } else {}
  });
}, {
  threshold: 0.3
}); //

for (var i = 0; i < the_animation.length; i++) {
  var elements = the_animation[i];
  observer_animation.observe(elements);
}

/***/ }),

/***/ "./src/js/util/headroom.js":
/*!*********************************!*\
  !*** ./src/js/util/headroom.js ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var headroom_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! headroom.js */ "./node_modules/headroom.js/dist/headroom.js");
/* harmony import */ var headroom_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(headroom_js__WEBPACK_IMPORTED_MODULE_0__);
 /////////

var doc_body = document.body; // construct an instance of Headroom, passing the element

var options = {
  // vertical offset in px before element is first unpinned
  offset: 10,
  // or you can specify offset individually for up/down scroll
  // scroll tolerance in px before state changes
  // tolerance : 0,
  // or you can specify tolerance individually for up/down scroll
  tolerance: {
    up: 10,
    down: 0
  },
  // css classes to apply
  classes: {
    // when element is initialised
    initial: "headroom",
    // when scrolling up
    pinned: "headroom--pinned",
    // when scrolling down
    unpinned: "headroom--unpinned",
    // when above offset
    top: "headroom--top",
    // when below offset
    notTop: "headroom--not-top",
    // when at bottom of scroll area
    bottom: "headroom--bottom",
    // when not at bottom of scroll area
    notBottom: "headroom--not-bottom",
    // when frozen method has been called
    frozen: "headroom--frozen" // multiple classes are also supported with a space-separated list
    // pinned: "headroom--pinned foo bar"

  },
  // callback when pinned, `this` is headroom object
  onPin: function onPin() {},
  // callback when unpinned, `this` is headroom object
  onUnpin: function onUnpin() {},
  // callback when above offset, `this` is headroom object
  onTop: function onTop() {},
  // callback when below offset, `this` is headroom object
  onNotTop: function onNotTop() {
    document.body.classList.remove("S-active--news-feed");
  },
  // callback when at bottom of page, `this` is headroom object
  onBottom: function onBottom() {},
  // callback when moving away from bottom of page, `this` is headroom object
  onNotBottom: function onNotBottom() {}
}; // pass options as the second argument to the constructor
// supplied options are merged with defaults

var headroom = new (headroom_js__WEBPACK_IMPORTED_MODULE_0___default())(doc_body, options); // initialise

headroom.init();

/***/ }),

/***/ "./src/js/util/lazyloading.js":
/*!************************************!*\
  !*** ./src/js/util/lazyloading.js ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var lazysizes_plugins_unveilhooks_ls_unveilhooks__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! lazysizes/plugins/unveilhooks/ls.unveilhooks */ "./node_modules/lazysizes/plugins/unveilhooks/ls.unveilhooks.js");
/* harmony import */ var lazysizes_plugins_unveilhooks_ls_unveilhooks__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(lazysizes_plugins_unveilhooks_ls_unveilhooks__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var lazysizes__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! lazysizes */ "./node_modules/lazysizes/lazysizes.js");
/* harmony import */ var lazysizes__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(lazysizes__WEBPACK_IMPORTED_MODULE_1__);


window.lazySizesConfig = window.lazySizesConfig || {};
lazySizesConfig.preloadAfterLoad = false;
document.addEventListener('lazyloaded', function (e) {
  console.log("lazyyy");
});
document.addEventListener('lazybeforeunveil', function (e) {
  var bg = e.target.getAttribute('data-bg');

  if (bg) {
    e.target.style.backgroundImage = 'url(' + bg + ')';
  }
});
console.log("lazyload active");

/***/ }),

/***/ "./src/js/util/navigation.js":
/*!***********************************!*\
  !*** ./src/js/util/navigation.js ***!
  \***********************************/
/***/ (() => {

var nav_trigger = document.querySelector(".mobile-nav-trigger");
var nav_trigger_hide = document.querySelector(".site-container");
var doc_body = document.body;
nav_trigger.addEventListener("click", mobile_nav);
nav_trigger_hide.addEventListener("click", mobile_nav_hide);

function mobile_nav(e) {
  if (!document.body.classList.contains('S-active--mobile-nav')) {
    doc_body.classList.add("S-active--mobile-nav");
  } else {
    doc_body.classList.remove("S-active--mobile-nav");
  }
}

function mobile_nav_hide(e) {
  doc_body.classList.remove("S-active--mobile-nav");
}

var nav_links = document.querySelectorAll(".-nav-link");
setTimeout(function () {
  nav_links.forEach(function (elem) {
    console.log(elem); // The element

    elem.addEventListener("mouseenter", nav_hover_in);
    elem.addEventListener("mouseleave", nav_hover_out);
  });
}, 500);

function nav_hover_in(e) {
  document.body.classList.add("S-active--nav-hover");
  e.target.classList.add("S-active--hover-element");
}

function nav_hover_out(e) {
  document.body.classList.remove("S-active--nav-hover");
  e.target.classList.remove("S-active--hover-element");
} // news_trigger_mobile.onclick = function(e) {
// 	if (!document.body.classList.contains('S-active--news-feed-mobile')) {
// 	document.body.classList.add("S-active--news-feed-mobile");
// 	e.target.innerHTML = "Sulje";
// 	}
// 	else {
// 		document.body.classList.remove("S-active--news-feed-mobile");
// 			e.target.innerHTML = "Ajankohtaista";
// 	}
// }


var scrollEvent = new Event('afterScroll', {
  bubbles: true
}); //bubble allows for delegation on body

/**
 * runs when an anchor is clicked or the page loads with an anchor
 * the item we are scrolling to can have an offset
 * @param element
 */

function scrolltoHash(element) {
  if (element) {
    var offset = element.dataset.offset || 'start'; //if the offset is a string 'start, center, or end'

    if (isNaN(parseInt(offset))) {
      element.scrollIntoView({
        behavior: 'smooth',
        block: offset
      });
    } else {
      //from top scroll with offset
      var fromTop = window.pageYOffset + element.getBoundingClientRect().top + parseInt(offset);
      window.scroll({
        behavior: 'smooth',
        top: fromTop
      });
    } //fire some more events


    setTimeout(function () {
      element.dispatchEvent(scrollEvent);
    }, 500);
  }
}

document.addEventListener('DOMContentLoaded', function () {
  if (location.hash) {
    scrolltoHash(document.querySelector(location.hash));
  }

  document.body.addEventListener('click', function (e) {
    var item = e.target.closest('a[href^="#"]');

    if (item) {
      var itemHash = item.getAttribute('href');

      if (itemHash !== '#' && itemHash !== '#0') {
        e.preventDefault();
        scrolltoHash(document.querySelector(itemHash));
      }
    }
  });
  document.addEventListener('afterScroll', function (e) {//run an event after scroll begins
  });
});
console.log("smoothscroll");

/***/ }),

/***/ "./src/js/util/plugins.js":
/*!********************************!*\
  !*** ./src/js/util/plugins.js ***!
  \********************************/
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_RESULT__;function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

!function (e, t) {
  "object" == ( false ? 0 : _typeof(exports)) && "undefined" != "object" ? module.exports = t() :  true ? !(__WEBPACK_AMD_DEFINE_FACTORY__ = (t),
		__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
		(__WEBPACK_AMD_DEFINE_FACTORY__.call(exports, __webpack_require__, exports, module)) :
		__WEBPACK_AMD_DEFINE_FACTORY__),
		__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__)) : 0;
}(this, function () {
  "use strict";

  var e = "undefined" != typeof window ? window : "undefined" != typeof __webpack_require__.g ? __webpack_require__.g : "undefined" != typeof self ? self : {},
      t = "Expected a function",
      n = NaN,
      o = "[object Symbol]",
      i = /^\s+|\s+$/g,
      a = /^[-+]0x[0-9a-f]+$/i,
      r = /^0b[01]+$/i,
      c = /^0o[0-7]+$/i,
      s = parseInt,
      u = "object" == _typeof(e) && e && e.Object === Object && e,
      d = "object" == (typeof self === "undefined" ? "undefined" : _typeof(self)) && self && self.Object === Object && self,
      l = u || d || Function("return this")(),
      f = Object.prototype.toString,
      m = Math.max,
      p = Math.min,
      b = function b() {
    return l.Date.now();
  };

  function v(e, n, o) {
    var i,
        a,
        r,
        c,
        s,
        u,
        d = 0,
        l = !1,
        f = !1,
        v = !0;
    if ("function" != typeof e) throw new TypeError(t);

    function y(t) {
      var n = i,
          o = a;
      return i = a = void 0, d = t, c = e.apply(o, n);
    }

    function h(e) {
      var t = e - u;
      return void 0 === u || t >= n || t < 0 || f && e - d >= r;
    }

    function k() {
      var e = b();
      if (h(e)) return x(e);
      s = setTimeout(k, function (e) {
        var t = n - (e - u);
        return f ? p(t, r - (e - d)) : t;
      }(e));
    }

    function x(e) {
      return s = void 0, v && i ? y(e) : (i = a = void 0, c);
    }

    function O() {
      var e = b(),
          t = h(e);

      if (i = arguments, a = this, u = e, t) {
        if (void 0 === s) return function (e) {
          return d = e, s = setTimeout(k, n), l ? y(e) : c;
        }(u);
        if (f) return s = setTimeout(k, n), y(u);
      }

      return void 0 === s && (s = setTimeout(k, n)), c;
    }

    return n = w(n) || 0, g(o) && (l = !!o.leading, r = (f = "maxWait" in o) ? m(w(o.maxWait) || 0, n) : r, v = "trailing" in o ? !!o.trailing : v), O.cancel = function () {
      void 0 !== s && clearTimeout(s), d = 0, i = u = a = s = void 0;
    }, O.flush = function () {
      return void 0 === s ? c : x(b());
    }, O;
  }

  function g(e) {
    var t = _typeof(e);

    return !!e && ("object" == t || "function" == t);
  }

  function w(e) {
    if ("number" == typeof e) return e;
    if (function (e) {
      return "symbol" == _typeof(e) || function (e) {
        return !!e && "object" == _typeof(e);
      }(e) && f.call(e) == o;
    }(e)) return n;

    if (g(e)) {
      var t = "function" == typeof e.valueOf ? e.valueOf() : e;
      e = g(t) ? t + "" : t;
    }

    if ("string" != typeof e) return 0 === e ? e : +e;
    e = e.replace(i, "");
    var u = r.test(e);
    return u || c.test(e) ? s(e.slice(2), u ? 2 : 8) : a.test(e) ? n : +e;
  }

  var y = function y(e, n, o) {
    var i = !0,
        a = !0;
    if ("function" != typeof e) throw new TypeError(t);
    return g(o) && (i = "leading" in o ? !!o.leading : i, a = "trailing" in o ? !!o.trailing : a), v(e, n, {
      leading: i,
      maxWait: n,
      trailing: a
    });
  },
      h = "Expected a function",
      k = NaN,
      x = "[object Symbol]",
      O = /^\s+|\s+$/g,
      j = /^[-+]0x[0-9a-f]+$/i,
      E = /^0b[01]+$/i,
      N = /^0o[0-7]+$/i,
      z = parseInt,
      C = "object" == _typeof(e) && e && e.Object === Object && e,
      A = "object" == (typeof self === "undefined" ? "undefined" : _typeof(self)) && self && self.Object === Object && self,
      q = C || A || Function("return this")(),
      L = Object.prototype.toString,
      T = Math.max,
      M = Math.min,
      S = function S() {
    return q.Date.now();
  };

  function D(e) {
    var t = _typeof(e);

    return !!e && ("object" == t || "function" == t);
  }

  function H(e) {
    if ("number" == typeof e) return e;
    if (function (e) {
      return "symbol" == _typeof(e) || function (e) {
        return !!e && "object" == _typeof(e);
      }(e) && L.call(e) == x;
    }(e)) return k;

    if (D(e)) {
      var t = "function" == typeof e.valueOf ? e.valueOf() : e;
      e = D(t) ? t + "" : t;
    }

    if ("string" != typeof e) return 0 === e ? e : +e;
    e = e.replace(O, "");
    var n = E.test(e);
    return n || N.test(e) ? z(e.slice(2), n ? 2 : 8) : j.test(e) ? k : +e;
  }

  var $ = function $(e, t, n) {
    var o,
        i,
        a,
        r,
        c,
        s,
        u = 0,
        d = !1,
        l = !1,
        f = !0;
    if ("function" != typeof e) throw new TypeError(h);

    function m(t) {
      var n = o,
          a = i;
      return o = i = void 0, u = t, r = e.apply(a, n);
    }

    function p(e) {
      var n = e - s;
      return void 0 === s || n >= t || n < 0 || l && e - u >= a;
    }

    function b() {
      var e = S();
      if (p(e)) return v(e);
      c = setTimeout(b, function (e) {
        var n = t - (e - s);
        return l ? M(n, a - (e - u)) : n;
      }(e));
    }

    function v(e) {
      return c = void 0, f && o ? m(e) : (o = i = void 0, r);
    }

    function g() {
      var e = S(),
          n = p(e);

      if (o = arguments, i = this, s = e, n) {
        if (void 0 === c) return function (e) {
          return u = e, c = setTimeout(b, t), d ? m(e) : r;
        }(s);
        if (l) return c = setTimeout(b, t), m(s);
      }

      return void 0 === c && (c = setTimeout(b, t)), r;
    }

    return t = H(t) || 0, D(n) && (d = !!n.leading, a = (l = "maxWait" in n) ? T(H(n.maxWait) || 0, t) : a, f = "trailing" in n ? !!n.trailing : f), g.cancel = function () {
      void 0 !== c && clearTimeout(c), u = 0, o = s = i = c = void 0;
    }, g.flush = function () {
      return void 0 === c ? r : v(S());
    }, g;
  },
      W = function W() {};

  function P(e) {
    e && e.forEach(function (e) {
      var t = Array.prototype.slice.call(e.addedNodes),
          n = Array.prototype.slice.call(e.removedNodes);
      if (function e(t) {
        var n = void 0,
            o = void 0;

        for (n = 0; n < t.length; n += 1) {
          if ((o = t[n]).dataset && o.dataset.aos) return !0;
          if (o.children && e(o.children)) return !0;
        }

        return !1;
      }(t.concat(n))) return W();
    });
  }

  function Y() {
    return window.MutationObserver || window.WebKitMutationObserver || window.MozMutationObserver;
  }

  var _ = {
    isSupported: function isSupported() {
      return !!Y();
    },
    ready: function ready(e, t) {
      var n = window.document,
          o = new (Y())(P);
      W = t, o.observe(n.documentElement, {
        childList: !0,
        subtree: !0,
        removedNodes: !0
      });
    }
  },
      B = function B(e, t) {
    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function");
  },
      F = function () {
    function e(e, t) {
      for (var n = 0; n < t.length; n++) {
        var o = t[n];
        o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o.writable = !0), Object.defineProperty(e, o.key, o);
      }
    }

    return function (t, n, o) {
      return n && e(t.prototype, n), o && e(t, o), t;
    };
  }(),
      I = Object.assign || function (e) {
    for (var t = 1; t < arguments.length; t++) {
      var n = arguments[t];

      for (var o in n) {
        Object.prototype.hasOwnProperty.call(n, o) && (e[o] = n[o]);
      }
    }

    return e;
  },
      K = /(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i,
      G = /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i,
      J = /(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i,
      Q = /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i;

  function R() {
    return navigator.userAgent || navigator.vendor || window.opera || "";
  }

  var U = new (function () {
    function e() {
      B(this, e);
    }

    return F(e, [{
      key: "phone",
      value: function value() {
        var e = R();
        return !(!K.test(e) && !G.test(e.substr(0, 4)));
      }
    }, {
      key: "mobile",
      value: function value() {
        var e = R();
        return !(!J.test(e) && !Q.test(e.substr(0, 4)));
      }
    }, {
      key: "tablet",
      value: function value() {
        return this.mobile() && !this.phone();
      }
    }, {
      key: "ie11",
      value: function value() {
        return "-ms-scroll-limit" in document.documentElement.style && "-ms-ime-align" in document.documentElement.style;
      }
    }]), e;
  }())(),
      V = function V(e, t) {
    var n = void 0;
    return U.ie11() ? (n = document.createEvent("CustomEvent")).initCustomEvent(e, !0, !0, {
      detail: t
    }) : n = new CustomEvent(e, {
      detail: t
    }), document.dispatchEvent(n);
  },
      X = function X(e) {
    return e.forEach(function (e, t) {
      return function (e, t) {
        var n = e.options,
            o = e.position,
            i = e.node,
            a = (e.data, function () {
          e.animated && (function (e, t) {
            t && t.forEach(function (t) {
              return e.classList.remove(t);
            });
          }(i, n.animatedClassNames), V("aos:out", i), e.options.id && V("aos:in:" + e.options.id, i), e.animated = !1);
        });
        n.mirror && t >= o.out && !n.once ? a() : t >= o["in"] ? e.animated || (function (e, t) {
          t && t.forEach(function (t) {
            return e.classList.add(t);
          });
        }(i, n.animatedClassNames), V("aos:in", i), e.options.id && V("aos:in:" + e.options.id, i), e.animated = !0) : e.animated && !n.once && a();
      }(e, window.pageYOffset);
    });
  },
      Z = function Z(e) {
    for (var t = 0, n = 0; e && !isNaN(e.offsetLeft) && !isNaN(e.offsetTop);) {
      t += e.offsetLeft - ("BODY" != e.tagName ? e.scrollLeft : 0), n += e.offsetTop - ("BODY" != e.tagName ? e.scrollTop : 0), e = e.offsetParent;
    }

    return {
      top: n,
      left: t
    };
  },
      ee = function ee(e, t, n) {
    var o = e.getAttribute("data-aos-" + t);

    if (void 0 !== o) {
      if ("true" === o) return !0;
      if ("false" === o) return !1;
    }

    return o || n;
  },
      te = function te(e, t) {
    return e.forEach(function (e, n) {
      var o = ee(e.node, "mirror", t.mirror),
          i = ee(e.node, "once", t.once),
          a = ee(e.node, "id"),
          r = t.useClassNames && e.node.getAttribute("data-aos"),
          c = [t.animatedClassName].concat(r ? r.split(" ") : []).filter(function (e) {
        return "string" == typeof e;
      });
      t.initClassName && e.node.classList.add(t.initClassName), e.position = {
        "in": function (e, t, n) {
          var o = window.innerHeight,
              i = ee(e, "anchor"),
              a = ee(e, "anchor-placement"),
              r = Number(ee(e, "offset", a ? 0 : t)),
              c = a || n,
              s = e;
          i && document.querySelectorAll(i) && (s = document.querySelectorAll(i)[0]);
          var u = Z(s).top - o;

          switch (c) {
            case "top-bottom":
              break;

            case "center-bottom":
              u += s.offsetHeight / 2;
              break;

            case "bottom-bottom":
              u += s.offsetHeight;
              break;

            case "top-center":
              u += o / 2;
              break;

            case "center-center":
              u += o / 2 + s.offsetHeight / 2;
              break;

            case "bottom-center":
              u += o / 2 + s.offsetHeight;
              break;

            case "top-top":
              u += o;
              break;

            case "bottom-top":
              u += o + s.offsetHeight;
              break;

            case "center-top":
              u += o + s.offsetHeight / 2;
          }

          return u + r;
        }(e.node, t.offset, t.anchorPlacement),
        out: o && function (e, t) {
          window.innerHeight;
          var n = ee(e, "anchor"),
              o = ee(e, "offset", t),
              i = e;
          return n && document.querySelectorAll(n) && (i = document.querySelectorAll(n)[0]), Z(i).top + i.offsetHeight - o;
        }(e.node, t.offset)
      }, e.options = {
        once: i,
        mirror: o,
        animatedClassNames: c,
        id: a
      };
    }), e;
  },
      ne = function ne() {
    var e = document.querySelectorAll("[data-aos]");
    return Array.prototype.map.call(e, function (e) {
      return {
        node: e
      };
    });
  },
      oe = [],
      ie = !1,
      ae = {
    offset: 120,
    delay: 0,
    easing: "ease",
    duration: 400,
    disable: !1,
    once: !1,
    mirror: !1,
    anchorPlacement: "top-bottom",
    startEvent: "DOMContentLoaded",
    animatedClassName: "aos-animate",
    initClassName: "aos-init",
    useClassNames: !1,
    disableMutationObserver: !1,
    throttleDelay: 99,
    debounceDelay: 50
  },
      re = function re() {
    return document.all && !window.atob;
  },
      ce = function ce() {
    arguments.length > 0 && void 0 !== arguments[0] && arguments[0] && (ie = !0), ie && (oe = te(oe, ae), X(oe), window.addEventListener("scroll", y(function () {
      X(oe, ae.once);
    }, ae.throttleDelay)));
  },
      se = function se() {
    if (oe = ne(), de(ae.disable) || re()) return ue();
    ce();
  },
      ue = function ue() {
    oe.forEach(function (e, t) {
      e.node.removeAttribute("data-aos"), e.node.removeAttribute("data-aos-easing"), e.node.removeAttribute("data-aos-duration"), e.node.removeAttribute("data-aos-delay"), ae.initClassName && e.node.classList.remove(ae.initClassName), ae.animatedClassName && e.node.classList.remove(ae.animatedClassName);
    });
  },
      de = function de(e) {
    return !0 === e || "mobile" === e && U.mobile() || "phone" === e && U.phone() || "tablet" === e && U.tablet() || "function" == typeof e && !0 === e();
  };

  return {
    init: function init(e) {
      return ae = I(ae, e), oe = ne(), ae.disableMutationObserver || _.isSupported() || (console.info('\n      aos: MutationObserver is not supported on this browser,\n      code mutations observing has been disabled.\n      You may have to call "refreshHard()" by yourself.\n    '), ae.disableMutationObserver = !0), ae.disableMutationObserver || _.ready("[data-aos]", se), de(ae.disable) || re() ? ue() : (document.querySelector("body").setAttribute("data-aos-easing", ae.easing), document.querySelector("body").setAttribute("data-aos-duration", ae.duration), document.querySelector("body").setAttribute("data-aos-delay", ae.delay), -1 === ["DOMContentLoaded", "load"].indexOf(ae.startEvent) ? document.addEventListener(ae.startEvent, function () {
        ce(!0);
      }) : window.addEventListener("load", function () {
        ce(!0);
      }), "DOMContentLoaded" === ae.startEvent && ["complete", "interactive"].indexOf(document.readyState) > -1 && ce(!0), window.addEventListener("resize", $(ce, ae.debounceDelay, !0)), window.addEventListener("orientationchange", $(ce, ae.debounceDelay, !0)), oe);
    },
    refresh: ce,
    refreshHard: se
  };
});

/***/ }),

/***/ "./src/js/util/resize.js":
/*!*******************************!*\
  !*** ./src/js/util/resize.js ***!
  \*******************************/
/***/ (() => {

var resizeTimer;
window.addEventListener("resize", function () {
  // window.hero_height = document.querySelector(".section__hero-section").offsetHeight;
  // console.log("update" + hero_height);
  // update hero height
  document.body.classList.add("resize-animation-stopper");
  clearTimeout(resizeTimer);
  resizeTimer = setTimeout(function () {
    document.body.classList.remove("resize-animation-stopper");
  }, 400);
});

/***/ }),

/***/ "./src/parts/global/_browser_update.js":
/*!*********************************************!*\
  !*** ./src/parts/global/_browser_update.js ***!
  \*********************************************/
/***/ (() => {

// var $buoop = {required:{e:-4,f:-3,o:-3,s:-1,c:-3},insecure:true,api:2020.04 };
// function $buo_f(){
//    var e = document.createElement("script");
//    e.src = "//browser-update.org/update.min.js";
//    document.body.appendChild(e);
// };
// try {document.addEventListener("DOMContentLoaded", $buo_f,false)}
// catch(e){window.attachEvent("onload", $buo_f)}

/***/ }),

/***/ "./node_modules/headroom.js/dist/headroom.js":
/*!***************************************************!*\
  !*** ./node_modules/headroom.js/dist/headroom.js ***!
  \***************************************************/
/***/ (function(module) {

/*!
 * headroom.js v0.12.0 - Give your page some headroom. Hide your header until you need it
 * Copyright (c) 2020 Nick Williams - http://wicky.nillia.ms/headroom.js
 * License: MIT
 */

(function (global, factory) {
   true ? module.exports = factory() :
  0;
}(this, function () { 'use strict';

  function isBrowser() {
    return typeof window !== "undefined";
  }

  /**
   * Used to detect browser support for adding an event listener with options
   * Credit: https://developer.mozilla.org/en-US/docs/Web/API/EventTarget/addEventListener
   */
  function passiveEventsSupported() {
    var supported = false;

    try {
      var options = {
        // eslint-disable-next-line getter-return
        get passive() {
          supported = true;
        }
      };
      window.addEventListener("test", options, options);
      window.removeEventListener("test", options, options);
    } catch (err) {
      supported = false;
    }

    return supported;
  }

  function isSupported() {
    return !!(
      isBrowser() &&
      function() {}.bind &&
      "classList" in document.documentElement &&
      Object.assign &&
      Object.keys &&
      requestAnimationFrame
    );
  }

  function isDocument(obj) {
    return obj.nodeType === 9; // Node.DOCUMENT_NODE === 9
  }

  function isWindow(obj) {
    // `obj === window` or `obj instanceof Window` is not sufficient,
    // as the obj may be the window of an iframe.
    return obj && obj.document && isDocument(obj.document);
  }

  function windowScroller(win) {
    var doc = win.document;
    var body = doc.body;
    var html = doc.documentElement;

    return {
      /**
       * @see http://james.padolsey.com/javascript/get-document-height-cross-browser/
       * @return {Number} the scroll height of the document in pixels
       */
      scrollHeight: function() {
        return Math.max(
          body.scrollHeight,
          html.scrollHeight,
          body.offsetHeight,
          html.offsetHeight,
          body.clientHeight,
          html.clientHeight
        );
      },

      /**
       * @see http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript
       * @return {Number} the height of the viewport in pixels
       */
      height: function() {
        return win.innerHeight || html.clientHeight || body.clientHeight;
      },

      /**
       * Gets the Y scroll position
       * @return {Number} pixels the page has scrolled along the Y-axis
       */
      scrollY: function() {
        if (win.pageYOffset !== undefined) {
          return win.pageYOffset;
        }

        return (html || body.parentNode || body).scrollTop;
      }
    };
  }

  function elementScroller(element) {
    return {
      /**
       * @return {Number} the scroll height of the element in pixels
       */
      scrollHeight: function() {
        return Math.max(
          element.scrollHeight,
          element.offsetHeight,
          element.clientHeight
        );
      },

      /**
       * @return {Number} the height of the element in pixels
       */
      height: function() {
        return Math.max(element.offsetHeight, element.clientHeight);
      },

      /**
       * Gets the Y scroll position
       * @return {Number} pixels the element has scrolled along the Y-axis
       */
      scrollY: function() {
        return element.scrollTop;
      }
    };
  }

  function createScroller(element) {
    return isWindow(element) ? windowScroller(element) : elementScroller(element);
  }

  /**
   * @param element EventTarget
   */
  function trackScroll(element, options, callback) {
    var isPassiveSupported = passiveEventsSupported();
    var rafId;
    var scrolled = false;
    var scroller = createScroller(element);
    var lastScrollY = scroller.scrollY();
    var details = {};

    function update() {
      var scrollY = Math.round(scroller.scrollY());
      var height = scroller.height();
      var scrollHeight = scroller.scrollHeight();

      // reuse object for less memory churn
      details.scrollY = scrollY;
      details.lastScrollY = lastScrollY;
      details.direction = scrollY > lastScrollY ? "down" : "up";
      details.distance = Math.abs(scrollY - lastScrollY);
      details.isOutOfBounds = scrollY < 0 || scrollY + height > scrollHeight;
      details.top = scrollY <= options.offset[details.direction];
      details.bottom = scrollY + height >= scrollHeight;
      details.toleranceExceeded =
        details.distance > options.tolerance[details.direction];

      callback(details);

      lastScrollY = scrollY;
      scrolled = false;
    }

    function handleScroll() {
      if (!scrolled) {
        scrolled = true;
        rafId = requestAnimationFrame(update);
      }
    }

    var eventOptions = isPassiveSupported
      ? { passive: true, capture: false }
      : false;

    element.addEventListener("scroll", handleScroll, eventOptions);
    update();

    return {
      destroy: function() {
        cancelAnimationFrame(rafId);
        element.removeEventListener("scroll", handleScroll, eventOptions);
      }
    };
  }

  function normalizeUpDown(t) {
    return t === Object(t) ? t : { down: t, up: t };
  }

  /**
   * UI enhancement for fixed headers.
   * Hides header when scrolling down
   * Shows header when scrolling up
   * @constructor
   * @param {DOMElement} elem the header element
   * @param {Object} options options for the widget
   */
  function Headroom(elem, options) {
    options = options || {};
    Object.assign(this, Headroom.options, options);
    this.classes = Object.assign({}, Headroom.options.classes, options.classes);

    this.elem = elem;
    this.tolerance = normalizeUpDown(this.tolerance);
    this.offset = normalizeUpDown(this.offset);
    this.initialised = false;
    this.frozen = false;
  }
  Headroom.prototype = {
    constructor: Headroom,

    /**
     * Start listening to scrolling
     * @public
     */
    init: function() {
      if (Headroom.cutsTheMustard && !this.initialised) {
        this.addClass("initial");
        this.initialised = true;

        // defer event registration to handle browser
        // potentially restoring previous scroll position
        setTimeout(
          function(self) {
            self.scrollTracker = trackScroll(
              self.scroller,
              { offset: self.offset, tolerance: self.tolerance },
              self.update.bind(self)
            );
          },
          100,
          this
        );
      }

      return this;
    },

    /**
     * Destroy the widget, clearing up after itself
     * @public
     */
    destroy: function() {
      this.initialised = false;
      Object.keys(this.classes).forEach(this.removeClass, this);
      this.scrollTracker.destroy();
    },

    /**
     * Unpin the element
     * @public
     */
    unpin: function() {
      if (this.hasClass("pinned") || !this.hasClass("unpinned")) {
        this.addClass("unpinned");
        this.removeClass("pinned");

        if (this.onUnpin) {
          this.onUnpin.call(this);
        }
      }
    },

    /**
     * Pin the element
     * @public
     */
    pin: function() {
      if (this.hasClass("unpinned")) {
        this.addClass("pinned");
        this.removeClass("unpinned");

        if (this.onPin) {
          this.onPin.call(this);
        }
      }
    },

    /**
     * Freezes the current state of the widget
     * @public
     */
    freeze: function() {
      this.frozen = true;
      this.addClass("frozen");
    },

    /**
     * Re-enables the default behaviour of the widget
     * @public
     */
    unfreeze: function() {
      this.frozen = false;
      this.removeClass("frozen");
    },

    top: function() {
      if (!this.hasClass("top")) {
        this.addClass("top");
        this.removeClass("notTop");

        if (this.onTop) {
          this.onTop.call(this);
        }
      }
    },

    notTop: function() {
      if (!this.hasClass("notTop")) {
        this.addClass("notTop");
        this.removeClass("top");

        if (this.onNotTop) {
          this.onNotTop.call(this);
        }
      }
    },

    bottom: function() {
      if (!this.hasClass("bottom")) {
        this.addClass("bottom");
        this.removeClass("notBottom");

        if (this.onBottom) {
          this.onBottom.call(this);
        }
      }
    },

    notBottom: function() {
      if (!this.hasClass("notBottom")) {
        this.addClass("notBottom");
        this.removeClass("bottom");

        if (this.onNotBottom) {
          this.onNotBottom.call(this);
        }
      }
    },

    shouldUnpin: function(details) {
      var scrollingDown = details.direction === "down";

      return scrollingDown && !details.top && details.toleranceExceeded;
    },

    shouldPin: function(details) {
      var scrollingUp = details.direction === "up";

      return (scrollingUp && details.toleranceExceeded) || details.top;
    },

    addClass: function(className) {
      this.elem.classList.add.apply(
        this.elem.classList,
        this.classes[className].split(" ")
      );
    },

    removeClass: function(className) {
      this.elem.classList.remove.apply(
        this.elem.classList,
        this.classes[className].split(" ")
      );
    },

    hasClass: function(className) {
      return this.classes[className].split(" ").every(function(cls) {
        return this.classList.contains(cls);
      }, this.elem);
    },

    update: function(details) {
      if (details.isOutOfBounds) {
        // Ignore bouncy scrolling in OSX
        return;
      }

      if (this.frozen === true) {
        return;
      }

      if (details.top) {
        this.top();
      } else {
        this.notTop();
      }

      if (details.bottom) {
        this.bottom();
      } else {
        this.notBottom();
      }

      if (this.shouldUnpin(details)) {
        this.unpin();
      } else if (this.shouldPin(details)) {
        this.pin();
      }
    }
  };

  /**
   * Default options
   * @type {Object}
   */
  Headroom.options = {
    tolerance: {
      up: 0,
      down: 0
    },
    offset: 0,
    scroller: isBrowser() ? window : null,
    classes: {
      frozen: "headroom--frozen",
      pinned: "headroom--pinned",
      unpinned: "headroom--unpinned",
      top: "headroom--top",
      notTop: "headroom--not-top",
      bottom: "headroom--bottom",
      notBottom: "headroom--not-bottom",
      initial: "headroom"
    }
  };

  Headroom.cutsTheMustard = isSupported();

  return Headroom;

}));


/***/ }),

/***/ "./node_modules/lazysizes/lazysizes.js":
/*!*********************************************!*\
  !*** ./node_modules/lazysizes/lazysizes.js ***!
  \*********************************************/
/***/ ((module) => {

(function(window, factory) {
	var lazySizes = factory(window, window.document, Date);
	window.lazySizes = lazySizes;
	if( true && module.exports){
		module.exports = lazySizes;
	}
}(typeof window != 'undefined' ?
      window : {}, 
/**
 * import("./types/global")
 * @typedef { import("./types/lazysizes-config").LazySizesConfigPartial } LazySizesConfigPartial
 */
function l(window, document, Date) { // Pass in the window Date function also for SSR because the Date class can be lost
	'use strict';
	/*jshint eqnull:true */

	var lazysizes,
		/**
		 * @type { LazySizesConfigPartial }
		 */
		lazySizesCfg;

	(function(){
		var prop;

		var lazySizesDefaults = {
			lazyClass: 'lazyload',
			loadedClass: 'lazyloaded',
			loadingClass: 'lazyloading',
			preloadClass: 'lazypreload',
			errorClass: 'lazyerror',
			//strictClass: 'lazystrict',
			autosizesClass: 'lazyautosizes',
			fastLoadedClass: 'ls-is-cached',
			iframeLoadMode: 0,
			srcAttr: 'data-src',
			srcsetAttr: 'data-srcset',
			sizesAttr: 'data-sizes',
			//preloadAfterLoad: false,
			minSize: 40,
			customMedia: {},
			init: true,
			expFactor: 1.5,
			hFac: 0.8,
			loadMode: 2,
			loadHidden: true,
			ricTimeout: 0,
			throttleDelay: 125,
		};

		lazySizesCfg = window.lazySizesConfig || window.lazysizesConfig || {};

		for(prop in lazySizesDefaults){
			if(!(prop in lazySizesCfg)){
				lazySizesCfg[prop] = lazySizesDefaults[prop];
			}
		}
	})();

	if (!document || !document.getElementsByClassName) {
		return {
			init: function () {},
			/**
			 * @type { LazySizesConfigPartial }
			 */
			cfg: lazySizesCfg,
			/**
			 * @type { true }
			 */
			noSupport: true,
		};
	}

	var docElem = document.documentElement;

	var supportPicture = window.HTMLPictureElement;

	var _addEventListener = 'addEventListener';

	var _getAttribute = 'getAttribute';

	/**
	 * Update to bind to window because 'this' becomes null during SSR
	 * builds.
	 */
	var addEventListener = window[_addEventListener].bind(window);

	var setTimeout = window.setTimeout;

	var requestAnimationFrame = window.requestAnimationFrame || setTimeout;

	var requestIdleCallback = window.requestIdleCallback;

	var regPicture = /^picture$/i;

	var loadEvents = ['load', 'error', 'lazyincluded', '_lazyloaded'];

	var regClassCache = {};

	var forEach = Array.prototype.forEach;

	/**
	 * @param ele {Element}
	 * @param cls {string}
	 */
	var hasClass = function(ele, cls) {
		if(!regClassCache[cls]){
			regClassCache[cls] = new RegExp('(\\s|^)'+cls+'(\\s|$)');
		}
		return regClassCache[cls].test(ele[_getAttribute]('class') || '') && regClassCache[cls];
	};

	/**
	 * @param ele {Element}
	 * @param cls {string}
	 */
	var addClass = function(ele, cls) {
		if (!hasClass(ele, cls)){
			ele.setAttribute('class', (ele[_getAttribute]('class') || '').trim() + ' ' + cls);
		}
	};

	/**
	 * @param ele {Element}
	 * @param cls {string}
	 */
	var removeClass = function(ele, cls) {
		var reg;
		if ((reg = hasClass(ele,cls))) {
			ele.setAttribute('class', (ele[_getAttribute]('class') || '').replace(reg, ' '));
		}
	};

	var addRemoveLoadEvents = function(dom, fn, add){
		var action = add ? _addEventListener : 'removeEventListener';
		if(add){
			addRemoveLoadEvents(dom, fn);
		}
		loadEvents.forEach(function(evt){
			dom[action](evt, fn);
		});
	};

	/**
	 * @param elem { Element }
	 * @param name { string }
	 * @param detail { any }
	 * @param noBubbles { boolean }
	 * @param noCancelable { boolean }
	 * @returns { CustomEvent }
	 */
	var triggerEvent = function(elem, name, detail, noBubbles, noCancelable){
		var event = document.createEvent('Event');

		if(!detail){
			detail = {};
		}

		detail.instance = lazysizes;

		event.initEvent(name, !noBubbles, !noCancelable);

		event.detail = detail;

		elem.dispatchEvent(event);
		return event;
	};

	var updatePolyfill = function (el, full){
		var polyfill;
		if( !supportPicture && ( polyfill = (window.picturefill || lazySizesCfg.pf) ) ){
			if(full && full.src && !el[_getAttribute]('srcset')){
				el.setAttribute('srcset', full.src);
			}
			polyfill({reevaluate: true, elements: [el]});
		} else if(full && full.src){
			el.src = full.src;
		}
	};

	var getCSS = function (elem, style){
		return (getComputedStyle(elem, null) || {})[style];
	};

	/**
	 *
	 * @param elem { Element }
	 * @param parent { Element }
	 * @param [width] {number}
	 * @returns {number}
	 */
	var getWidth = function(elem, parent, width){
		width = width || elem.offsetWidth;

		while(width < lazySizesCfg.minSize && parent && !elem._lazysizesWidth){
			width =  parent.offsetWidth;
			parent = parent.parentNode;
		}

		return width;
	};

	var rAF = (function(){
		var running, waiting;
		var firstFns = [];
		var secondFns = [];
		var fns = firstFns;

		var run = function(){
			var runFns = fns;

			fns = firstFns.length ? secondFns : firstFns;

			running = true;
			waiting = false;

			while(runFns.length){
				runFns.shift()();
			}

			running = false;
		};

		var rafBatch = function(fn, queue){
			if(running && !queue){
				fn.apply(this, arguments);
			} else {
				fns.push(fn);

				if(!waiting){
					waiting = true;
					(document.hidden ? setTimeout : requestAnimationFrame)(run);
				}
			}
		};

		rafBatch._lsFlush = run;

		return rafBatch;
	})();

	var rAFIt = function(fn, simple){
		return simple ?
			function() {
				rAF(fn);
			} :
			function(){
				var that = this;
				var args = arguments;
				rAF(function(){
					fn.apply(that, args);
				});
			}
		;
	};

	var throttle = function(fn){
		var running;
		var lastTime = 0;
		var gDelay = lazySizesCfg.throttleDelay;
		var rICTimeout = lazySizesCfg.ricTimeout;
		var run = function(){
			running = false;
			lastTime = Date.now();
			fn();
		};
		var idleCallback = requestIdleCallback && rICTimeout > 49 ?
			function(){
				requestIdleCallback(run, {timeout: rICTimeout});

				if(rICTimeout !== lazySizesCfg.ricTimeout){
					rICTimeout = lazySizesCfg.ricTimeout;
				}
			} :
			rAFIt(function(){
				setTimeout(run);
			}, true)
		;

		return function(isPriority){
			var delay;

			if((isPriority = isPriority === true)){
				rICTimeout = 33;
			}

			if(running){
				return;
			}

			running =  true;

			delay = gDelay - (Date.now() - lastTime);

			if(delay < 0){
				delay = 0;
			}

			if(isPriority || delay < 9){
				idleCallback();
			} else {
				setTimeout(idleCallback, delay);
			}
		};
	};

	//based on http://modernjavascript.blogspot.de/2013/08/building-better-debounce.html
	var debounce = function(func) {
		var timeout, timestamp;
		var wait = 99;
		var run = function(){
			timeout = null;
			func();
		};
		var later = function() {
			var last = Date.now() - timestamp;

			if (last < wait) {
				setTimeout(later, wait - last);
			} else {
				(requestIdleCallback || run)(run);
			}
		};

		return function() {
			timestamp = Date.now();

			if (!timeout) {
				timeout = setTimeout(later, wait);
			}
		};
	};

	var loader = (function(){
		var preloadElems, isCompleted, resetPreloadingTimer, loadMode, started;

		var eLvW, elvH, eLtop, eLleft, eLright, eLbottom, isBodyHidden;

		var regImg = /^img$/i;
		var regIframe = /^iframe$/i;

		var supportScroll = ('onscroll' in window) && !(/(gle|ing)bot/.test(navigator.userAgent));

		var shrinkExpand = 0;
		var currentExpand = 0;

		var isLoading = 0;
		var lowRuns = -1;

		var resetPreloading = function(e){
			isLoading--;
			if(!e || isLoading < 0 || !e.target){
				isLoading = 0;
			}
		};

		var isVisible = function (elem) {
			if (isBodyHidden == null) {
				isBodyHidden = getCSS(document.body, 'visibility') == 'hidden';
			}

			return isBodyHidden || !(getCSS(elem.parentNode, 'visibility') == 'hidden' && getCSS(elem, 'visibility') == 'hidden');
		};

		var isNestedVisible = function(elem, elemExpand){
			var outerRect;
			var parent = elem;
			var visible = isVisible(elem);

			eLtop -= elemExpand;
			eLbottom += elemExpand;
			eLleft -= elemExpand;
			eLright += elemExpand;

			while(visible && (parent = parent.offsetParent) && parent != document.body && parent != docElem){
				visible = ((getCSS(parent, 'opacity') || 1) > 0);

				if(visible && getCSS(parent, 'overflow') != 'visible'){
					outerRect = parent.getBoundingClientRect();
					visible = eLright > outerRect.left &&
						eLleft < outerRect.right &&
						eLbottom > outerRect.top - 1 &&
						eLtop < outerRect.bottom + 1
					;
				}
			}

			return visible;
		};

		var checkElements = function() {
			var eLlen, i, rect, autoLoadElem, loadedSomething, elemExpand, elemNegativeExpand, elemExpandVal,
				beforeExpandVal, defaultExpand, preloadExpand, hFac;
			var lazyloadElems = lazysizes.elements;

			if((loadMode = lazySizesCfg.loadMode) && isLoading < 8 && (eLlen = lazyloadElems.length)){

				i = 0;

				lowRuns++;

				for(; i < eLlen; i++){

					if(!lazyloadElems[i] || lazyloadElems[i]._lazyRace){continue;}

					if(!supportScroll || (lazysizes.prematureUnveil && lazysizes.prematureUnveil(lazyloadElems[i]))){unveilElement(lazyloadElems[i]);continue;}

					if(!(elemExpandVal = lazyloadElems[i][_getAttribute]('data-expand')) || !(elemExpand = elemExpandVal * 1)){
						elemExpand = currentExpand;
					}

					if (!defaultExpand) {
						defaultExpand = (!lazySizesCfg.expand || lazySizesCfg.expand < 1) ?
							docElem.clientHeight > 500 && docElem.clientWidth > 500 ? 500 : 370 :
							lazySizesCfg.expand;

						lazysizes._defEx = defaultExpand;

						preloadExpand = defaultExpand * lazySizesCfg.expFactor;
						hFac = lazySizesCfg.hFac;
						isBodyHidden = null;

						if(currentExpand < preloadExpand && isLoading < 1 && lowRuns > 2 && loadMode > 2 && !document.hidden){
							currentExpand = preloadExpand;
							lowRuns = 0;
						} else if(loadMode > 1 && lowRuns > 1 && isLoading < 6){
							currentExpand = defaultExpand;
						} else {
							currentExpand = shrinkExpand;
						}
					}

					if(beforeExpandVal !== elemExpand){
						eLvW = innerWidth + (elemExpand * hFac);
						elvH = innerHeight + elemExpand;
						elemNegativeExpand = elemExpand * -1;
						beforeExpandVal = elemExpand;
					}

					rect = lazyloadElems[i].getBoundingClientRect();

					if ((eLbottom = rect.bottom) >= elemNegativeExpand &&
						(eLtop = rect.top) <= elvH &&
						(eLright = rect.right) >= elemNegativeExpand * hFac &&
						(eLleft = rect.left) <= eLvW &&
						(eLbottom || eLright || eLleft || eLtop) &&
						(lazySizesCfg.loadHidden || isVisible(lazyloadElems[i])) &&
						((isCompleted && isLoading < 3 && !elemExpandVal && (loadMode < 3 || lowRuns < 4)) || isNestedVisible(lazyloadElems[i], elemExpand))){
						unveilElement(lazyloadElems[i]);
						loadedSomething = true;
						if(isLoading > 9){break;}
					} else if(!loadedSomething && isCompleted && !autoLoadElem &&
						isLoading < 4 && lowRuns < 4 && loadMode > 2 &&
						(preloadElems[0] || lazySizesCfg.preloadAfterLoad) &&
						(preloadElems[0] || (!elemExpandVal && ((eLbottom || eLright || eLleft || eLtop) || lazyloadElems[i][_getAttribute](lazySizesCfg.sizesAttr) != 'auto')))){
						autoLoadElem = preloadElems[0] || lazyloadElems[i];
					}
				}

				if(autoLoadElem && !loadedSomething){
					unveilElement(autoLoadElem);
				}
			}
		};

		var throttledCheckElements = throttle(checkElements);

		var switchLoadingClass = function(e){
			var elem = e.target;

			if (elem._lazyCache) {
				delete elem._lazyCache;
				return;
			}

			resetPreloading(e);
			addClass(elem, lazySizesCfg.loadedClass);
			removeClass(elem, lazySizesCfg.loadingClass);
			addRemoveLoadEvents(elem, rafSwitchLoadingClass);
			triggerEvent(elem, 'lazyloaded');
		};
		var rafedSwitchLoadingClass = rAFIt(switchLoadingClass);
		var rafSwitchLoadingClass = function(e){
			rafedSwitchLoadingClass({target: e.target});
		};

		var changeIframeSrc = function(elem, src){
			var loadMode = elem.getAttribute('data-load-mode') || lazySizesCfg.iframeLoadMode;

			// loadMode can be also a string!
			if (loadMode == 0) {
				elem.contentWindow.location.replace(src);
			} else if (loadMode == 1) {
				elem.src = src;
			}
		};

		var handleSources = function(source){
			var customMedia;

			var sourceSrcset = source[_getAttribute](lazySizesCfg.srcsetAttr);

			if( (customMedia = lazySizesCfg.customMedia[source[_getAttribute]('data-media') || source[_getAttribute]('media')]) ){
				source.setAttribute('media', customMedia);
			}

			if(sourceSrcset){
				source.setAttribute('srcset', sourceSrcset);
			}
		};

		var lazyUnveil = rAFIt(function (elem, detail, isAuto, sizes, isImg){
			var src, srcset, parent, isPicture, event, firesLoad;

			if(!(event = triggerEvent(elem, 'lazybeforeunveil', detail)).defaultPrevented){

				if(sizes){
					if(isAuto){
						addClass(elem, lazySizesCfg.autosizesClass);
					} else {
						elem.setAttribute('sizes', sizes);
					}
				}

				srcset = elem[_getAttribute](lazySizesCfg.srcsetAttr);
				src = elem[_getAttribute](lazySizesCfg.srcAttr);

				if(isImg) {
					parent = elem.parentNode;
					isPicture = parent && regPicture.test(parent.nodeName || '');
				}

				firesLoad = detail.firesLoad || (('src' in elem) && (srcset || src || isPicture));

				event = {target: elem};

				addClass(elem, lazySizesCfg.loadingClass);

				if(firesLoad){
					clearTimeout(resetPreloadingTimer);
					resetPreloadingTimer = setTimeout(resetPreloading, 2500);
					addRemoveLoadEvents(elem, rafSwitchLoadingClass, true);
				}

				if(isPicture){
					forEach.call(parent.getElementsByTagName('source'), handleSources);
				}

				if(srcset){
					elem.setAttribute('srcset', srcset);
				} else if(src && !isPicture){
					if(regIframe.test(elem.nodeName)){
						changeIframeSrc(elem, src);
					} else {
						elem.src = src;
					}
				}

				if(isImg && (srcset || isPicture)){
					updatePolyfill(elem, {src: src});
				}
			}

			if(elem._lazyRace){
				delete elem._lazyRace;
			}
			removeClass(elem, lazySizesCfg.lazyClass);

			rAF(function(){
				// Part of this can be removed as soon as this fix is older: https://bugs.chromium.org/p/chromium/issues/detail?id=7731 (2015)
				var isLoaded = elem.complete && elem.naturalWidth > 1;

				if( !firesLoad || isLoaded){
					if (isLoaded) {
						addClass(elem, lazySizesCfg.fastLoadedClass);
					}
					switchLoadingClass(event);
					elem._lazyCache = true;
					setTimeout(function(){
						if ('_lazyCache' in elem) {
							delete elem._lazyCache;
						}
					}, 9);
				}
				if (elem.loading == 'lazy') {
					isLoading--;
				}
			}, true);
		});

		/**
		 *
		 * @param elem { Element }
		 */
		var unveilElement = function (elem){
			if (elem._lazyRace) {return;}
			var detail;

			var isImg = regImg.test(elem.nodeName);

			//allow using sizes="auto", but don't use. it's invalid. Use data-sizes="auto" or a valid value for sizes instead (i.e.: sizes="80vw")
			var sizes = isImg && (elem[_getAttribute](lazySizesCfg.sizesAttr) || elem[_getAttribute]('sizes'));
			var isAuto = sizes == 'auto';

			if( (isAuto || !isCompleted) && isImg && (elem[_getAttribute]('src') || elem.srcset) && !elem.complete && !hasClass(elem, lazySizesCfg.errorClass) && hasClass(elem, lazySizesCfg.lazyClass)){return;}

			detail = triggerEvent(elem, 'lazyunveilread').detail;

			if(isAuto){
				 autoSizer.updateElem(elem, true, elem.offsetWidth);
			}

			elem._lazyRace = true;
			isLoading++;

			lazyUnveil(elem, detail, isAuto, sizes, isImg);
		};

		var afterScroll = debounce(function(){
			lazySizesCfg.loadMode = 3;
			throttledCheckElements();
		});

		var altLoadmodeScrollListner = function(){
			if(lazySizesCfg.loadMode == 3){
				lazySizesCfg.loadMode = 2;
			}
			afterScroll();
		};

		var onload = function(){
			if(isCompleted){return;}
			if(Date.now() - started < 999){
				setTimeout(onload, 999);
				return;
			}


			isCompleted = true;

			lazySizesCfg.loadMode = 3;

			throttledCheckElements();

			addEventListener('scroll', altLoadmodeScrollListner, true);
		};

		return {
			_: function(){
				started = Date.now();

				lazysizes.elements = document.getElementsByClassName(lazySizesCfg.lazyClass);
				preloadElems = document.getElementsByClassName(lazySizesCfg.lazyClass + ' ' + lazySizesCfg.preloadClass);

				addEventListener('scroll', throttledCheckElements, true);

				addEventListener('resize', throttledCheckElements, true);

				addEventListener('pageshow', function (e) {
					if (e.persisted) {
						var loadingElements = document.querySelectorAll('.' + lazySizesCfg.loadingClass);

						if (loadingElements.length && loadingElements.forEach) {
							requestAnimationFrame(function () {
								loadingElements.forEach( function (img) {
									if (img.complete) {
										unveilElement(img);
									}
								});
							});
						}
					}
				});

				if(window.MutationObserver){
					new MutationObserver( throttledCheckElements ).observe( docElem, {childList: true, subtree: true, attributes: true} );
				} else {
					docElem[_addEventListener]('DOMNodeInserted', throttledCheckElements, true);
					docElem[_addEventListener]('DOMAttrModified', throttledCheckElements, true);
					setInterval(throttledCheckElements, 999);
				}

				addEventListener('hashchange', throttledCheckElements, true);

				//, 'fullscreenchange'
				['focus', 'mouseover', 'click', 'load', 'transitionend', 'animationend'].forEach(function(name){
					document[_addEventListener](name, throttledCheckElements, true);
				});

				if((/d$|^c/.test(document.readyState))){
					onload();
				} else {
					addEventListener('load', onload);
					document[_addEventListener]('DOMContentLoaded', throttledCheckElements);
					setTimeout(onload, 20000);
				}

				if(lazysizes.elements.length){
					checkElements();
					rAF._lsFlush();
				} else {
					throttledCheckElements();
				}
			},
			checkElems: throttledCheckElements,
			unveil: unveilElement,
			_aLSL: altLoadmodeScrollListner,
		};
	})();


	var autoSizer = (function(){
		var autosizesElems;

		var sizeElement = rAFIt(function(elem, parent, event, width){
			var sources, i, len;
			elem._lazysizesWidth = width;
			width += 'px';

			elem.setAttribute('sizes', width);

			if(regPicture.test(parent.nodeName || '')){
				sources = parent.getElementsByTagName('source');
				for(i = 0, len = sources.length; i < len; i++){
					sources[i].setAttribute('sizes', width);
				}
			}

			if(!event.detail.dataAttr){
				updatePolyfill(elem, event.detail);
			}
		});
		/**
		 *
		 * @param elem {Element}
		 * @param dataAttr
		 * @param [width] { number }
		 */
		var getSizeElement = function (elem, dataAttr, width){
			var event;
			var parent = elem.parentNode;

			if(parent){
				width = getWidth(elem, parent, width);
				event = triggerEvent(elem, 'lazybeforesizes', {width: width, dataAttr: !!dataAttr});

				if(!event.defaultPrevented){
					width = event.detail.width;

					if(width && width !== elem._lazysizesWidth){
						sizeElement(elem, parent, event, width);
					}
				}
			}
		};

		var updateElementsSizes = function(){
			var i;
			var len = autosizesElems.length;
			if(len){
				i = 0;

				for(; i < len; i++){
					getSizeElement(autosizesElems[i]);
				}
			}
		};

		var debouncedUpdateElementsSizes = debounce(updateElementsSizes);

		return {
			_: function(){
				autosizesElems = document.getElementsByClassName(lazySizesCfg.autosizesClass);
				addEventListener('resize', debouncedUpdateElementsSizes);
			},
			checkElems: debouncedUpdateElementsSizes,
			updateElem: getSizeElement
		};
	})();

	var init = function(){
		if(!init.i && document.getElementsByClassName){
			init.i = true;
			autoSizer._();
			loader._();
		}
	};

	setTimeout(function(){
		if(lazySizesCfg.init){
			init();
		}
	});

	lazysizes = {
		/**
		 * @type { LazySizesConfigPartial }
		 */
		cfg: lazySizesCfg,
		autoSizer: autoSizer,
		loader: loader,
		init: init,
		uP: updatePolyfill,
		aC: addClass,
		rC: removeClass,
		hC: hasClass,
		fire: triggerEvent,
		gW: getWidth,
		rAF: rAF,
	};

	return lazysizes;
}
));


/***/ }),

/***/ "./node_modules/lazysizes/plugins/unveilhooks/ls.unveilhooks.js":
/*!**********************************************************************!*\
  !*** ./node_modules/lazysizes/plugins/unveilhooks/ls.unveilhooks.js ***!
  \**********************************************************************/
/***/ ((module, exports, __webpack_require__) => {

var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;/*
This plugin extends lazySizes to lazyLoad:
background images, videos/posters and scripts

Background-Image:
For background images, use data-bg attribute:
<div class="lazyload" data-bg="bg-img.jpg"></div>

 Video:
 For video/audio use data-poster and preload="none":
 <video class="lazyload" preload="none" data-poster="poster.jpg" src="src.mp4">
 <!-- sources -->
 </video>

 For video that plays automatically if in view:
 <video
	class="lazyload"
	preload="none"
	muted=""
	data-autoplay=""
	data-poster="poster.jpg"
	src="src.mp4">
</video>

 Scripts:
 For scripts use data-script:
 <div class="lazyload" data-script="module-name.js"></div>


 Script modules using require:
 For modules using require use data-require:
 <div class="lazyload" data-require="module-name"></div>
*/

(function(window, factory) {
	var globalInstall = function(){
		factory(window.lazySizes);
		window.removeEventListener('lazyunveilread', globalInstall, true);
	};

	factory = factory.bind(null, window, window.document);

	if( true && module.exports){
		factory(__webpack_require__(/*! lazysizes */ "./node_modules/lazysizes/lazysizes.js"));
	} else if (true) {
		!(__WEBPACK_AMD_DEFINE_ARRAY__ = [__webpack_require__(/*! lazysizes */ "./node_modules/lazysizes/lazysizes.js")], __WEBPACK_AMD_DEFINE_FACTORY__ = (factory),
		__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
		(__WEBPACK_AMD_DEFINE_FACTORY__.apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__)) : __WEBPACK_AMD_DEFINE_FACTORY__),
		__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));
	} else {}
}(window, function(window, document, lazySizes) {
	/*jshint eqnull:true */
	'use strict';
	var bgLoad, regBgUrlEscape;
	var uniqueUrls = {};

	if(document.addEventListener){
		regBgUrlEscape = /\(|\)|\s|'/;

		bgLoad = function (url, cb){
			var img = document.createElement('img');
			img.onload = function(){
				img.onload = null;
				img.onerror = null;
				img = null;
				cb();
			};
			img.onerror = img.onload;

			img.src = url;

			if(img && img.complete && img.onload){
				img.onload();
			}
		};

		addEventListener('lazybeforeunveil', function(e){
			if(e.detail.instance != lazySizes){return;}

			var tmp, load, bg, poster;
			if(!e.defaultPrevented) {

				var target = e.target;

				if(target.preload == 'none'){
					target.preload = target.getAttribute('data-preload') || 'auto';
				}

				if (target.getAttribute('data-autoplay') != null) {
					if (target.getAttribute('data-expand') && !target.autoplay) {
						try {
							target.play();
						} catch (er) {}
					} else {
						requestAnimationFrame(function () {
							target.setAttribute('data-expand', '-10');
							lazySizes.aC(target, lazySizes.cfg.lazyClass);
						});
					}
				}

				tmp = target.getAttribute('data-link');
				if(tmp){
					addStyleScript(tmp, true);
				}

				// handle data-script
				tmp = target.getAttribute('data-script');
				if(tmp){
					e.detail.firesLoad = true;
					load = function(){
						e.detail.firesLoad = false;
						lazySizes.fire(target, '_lazyloaded', {}, true, true);
					};
					addStyleScript(tmp, null, load);
				}

				// handle data-require
				tmp = target.getAttribute('data-require');
				if(tmp){
					if(lazySizes.cfg.requireJs){
						lazySizes.cfg.requireJs([tmp]);
					} else {
						addStyleScript(tmp);
					}
				}

				// handle data-bg
				bg = target.getAttribute('data-bg');
				if (bg) {
					e.detail.firesLoad = true;
					load = function(){
						target.style.backgroundImage = 'url(' + (regBgUrlEscape.test(bg) ? JSON.stringify(bg) : bg ) + ')';
						e.detail.firesLoad = false;
						lazySizes.fire(target, '_lazyloaded', {}, true, true);
					};

					bgLoad(bg, load);
				}

				// handle data-poster
				poster = target.getAttribute('data-poster');
				if(poster){
					e.detail.firesLoad = true;
					load = function(){
						target.poster = poster;
						e.detail.firesLoad = false;
						lazySizes.fire(target, '_lazyloaded', {}, true, true);
					};

					bgLoad(poster, load);

				}
			}
		}, false);

	}

	function addStyleScript(src, style, cb){
		if(uniqueUrls[src]){
			return;
		}
		var elem = document.createElement(style ? 'link' : 'script');
		var insertElem = document.getElementsByTagName('script')[0];

		if(style){
			elem.rel = 'stylesheet';
			elem.href = src;
		} else {
			elem.onload = function(){
				elem.onerror = null;
				elem.onload = null;
				cb();
			};
			elem.onerror = elem.onload;

			elem.src = src;
		}
		uniqueUrls[src] = true;
		uniqueUrls[elem.src || elem.href] = true;
		insertElem.parentNode.insertBefore(elem, insertElem);
	}
}));


/***/ }),

/***/ "./node_modules/normalize.css/normalize.css":
/*!**************************************************!*\
  !*** ./node_modules/normalize.css/normalize.css ***!
  \**************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/sass/front-end-bunde.scss":
/*!***************************************!*\
  !*** ./src/sass/front-end-bunde.scss ***!
  \***************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/global */
/******/ 	(() => {
/******/ 		__webpack_require__.g = (function() {
/******/ 			if (typeof globalThis === 'object') return globalThis;
/******/ 			try {
/******/ 				return this || new Function('return this')();
/******/ 			} catch (e) {
/******/ 				if (typeof window === 'object') return window;
/******/ 			}
/******/ 		})();
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be in strict mode.
(() => {
"use strict";
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var normalize_css__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! normalize.css */ "./node_modules/normalize.css/normalize.css");
/* harmony import */ var _sass_front_end_bunde_scss__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./sass/front-end-bunde.scss */ "./src/sass/front-end-bunde.scss");
/* harmony import */ var _js_core_events__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./js/core/events */ "./src/js/core/events.js");
/* harmony import */ var _js_core_responsive_iframe__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./js/core/responsive-iframe */ "./src/js/core/responsive-iframe.js");
/* harmony import */ var _js_util_plugins_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./js/util/plugins.js */ "./src/js/util/plugins.js");
/* harmony import */ var _js_util_plugins_js__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_js_util_plugins_js__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _js_util_lazyloading_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./js/util/lazyloading.js */ "./src/js/util/lazyloading.js");
/* harmony import */ var _js_util_headroom_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./js/util/headroom.js */ "./src/js/util/headroom.js");
/* harmony import */ var _js_util_resize_js__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./js/util/resize.js */ "./src/js/util/resize.js");
/* harmony import */ var _js_util_resize_js__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(_js_util_resize_js__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var _js_util_navigation_js__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./js/util/navigation.js */ "./src/js/util/navigation.js");
/* harmony import */ var _js_util_navigation_js__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(_js_util_navigation_js__WEBPACK_IMPORTED_MODULE_8__);
/* harmony import */ var _js_page_specific_home_page_js__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./js/page-specific/home-page.js */ "./src/js/page-specific/home-page.js");
/* harmony import */ var _js_page_specific_home_page_js__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(_js_page_specific_home_page_js__WEBPACK_IMPORTED_MODULE_9__);
/* harmony import */ var _inc_core_core_js__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ../inc/core/_core.js */ "./inc/core/_core.js");
/* harmony import */ var _inc_core_core_js__WEBPACK_IMPORTED_MODULE_10___default = /*#__PURE__*/__webpack_require__.n(_inc_core_core_js__WEBPACK_IMPORTED_MODULE_10__);
/* harmony import */ var _inc_scrollmagic_scrollmagic_js__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ../inc/scrollmagic/_scrollmagic.js */ "./inc/scrollmagic/_scrollmagic.js");
/* harmony import */ var _inc_scrollmagic_scrollmagic_js__WEBPACK_IMPORTED_MODULE_11___default = /*#__PURE__*/__webpack_require__.n(_inc_scrollmagic_scrollmagic_js__WEBPACK_IMPORTED_MODULE_11__);
/* harmony import */ var _parts_global_browser_update_js__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! ./parts/global/_browser_update.js */ "./src/parts/global/_browser_update.js");
/* harmony import */ var _parts_global_browser_update_js__WEBPACK_IMPORTED_MODULE_12___default = /*#__PURE__*/__webpack_require__.n(_parts_global_browser_update_js__WEBPACK_IMPORTED_MODULE_12__);
 //ADDING SASS
//add your sass files easilt by starting them with an underscore inside the inc or parts folders
// You can also manually add a regular file to the front end bundle so you have access to all scss variables and classes
//adding a separate scss here will work, but you wont have access to scss variables or @use, or @extend

 //js from src

 // import "./js/core/objectfitFallback"
// import "./js/core/sidebar"
// import "./js/core/navigation"
// import "./js/core/panel-left"
///////SMOOTH SCROLL IS WRAPPER TO ONLY LOAD ON SPECIFIC PAGE ---- SMOOTH SCROLL ADDED TO navigation.js
// import "./js/core/smooth-scroll"
// import "./js/core/icons"

 //////UTILITY




 // import './js/util/swiper.js';
//navigation

 ////PAGE SPECIFIC

 //add all underscored js files from inc and parts




})();

/******/ })()
;
//# sourceMappingURL=frontEnd_bundle.js.map