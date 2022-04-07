/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

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

/***/ "./src/js/core/icons.js":
/*!******************************!*\
  !*** ./src/js/core/icons.js ***!
  \******************************/
/***/ (() => {

//turn icons into svg if using the icons that come with theme folder
document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('.svg-icon').forEach(function (icon) {
    icon.classList.remove('svg-icon'); //classlist.value does not wokr in ie11. use getAttrbiute

    var iconClass = icon.getAttribute('class'); //ie11 does not work well with nodes. needed to add as string. no createelementNS

    var iconString = "<svg class=\"icon ".concat(iconClass, "\" role=\"img\"><use href=\"#").concat(iconClass, "\" xlink:href=\"#").concat(iconClass, "\"></use></svg>");
    icon.insertAdjacentHTML('afterend', iconString);
    icon.remove();
  });
});

/***/ }),

/***/ "./src/js/core/navigation.js":
/*!***********************************!*\
  !*** ./src/js/core/navigation.js ***!
  \***********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _setup__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./setup */ "./src/js/core/setup.js");
/* harmony import */ var _navigation_callbacks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./navigation_callbacks */ "./src/js/core/navigation_callbacks.js");
/* harmony import */ var _theme_config__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../theme.config */ "./theme.config.json");


 //toggle logic functionality that calls the above functions
//use this one to run the opening and closing of a menu item. dont call above functions directly

function toggleMenuItem(menuItem) {
  var toggleState = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : true;
  var topLevel = isTopLevel(menuItem);
  var horizontalMenu = isHorizontalMenu(menuItem); //toplevel horizontal on tablet

  if (topLevel && horizontalMenu) {
    //also check if menu is offscreen and give it a class
    //checkOffScreenMenu(menuItem.querySelector('.sub-menu'))
    (0,_navigation_callbacks__WEBPACK_IMPORTED_MODULE_1__.toggleTopLevelHorizontalMenu)(menuItem, toggleState);
    return;
  } //toplevel vertical on tablet


  if (topLevel && !horizontalMenu) {
    (0,_navigation_callbacks__WEBPACK_IMPORTED_MODULE_1__.toggleTopLevelVerticalMenu)(menuItem, toggleState);
    return;
  }

  (0,_navigation_callbacks__WEBPACK_IMPORTED_MODULE_1__.toggleSubMenu)(menuItem, toggleState);
} //MAIN MENU EVENT. CAN BE CALLED ON ANY MENU ITEM WITH CHILDREN


var menuClickEvent = false; //make only one click event once a click is used

function createMenuListener(menuItem) {
  menuItem.addEventListener('pointerover', function (e) {
    e.stopPropagation();
    var toggleState = true; //always open unless touch event which changes this below
    //TOUCH CLICK EVENT

    if (e.pointerType !== 'mouse') {
      //clicking a real link opens it
      if (!e.target.closest("a[href^=\"#\"]") && !e.target.closest('.submenu-dropdown-toggle')) {
        return;
      }

      if (menuItem.classList.contains('toggled-on')) {
        toggleState = false;
      } //if were opening a top level on horizontal with a click, we need a way to close another that may be opened


      if (isTopLevel(menuItem) && !menuItem.classList.contains('toggled-on') && isHorizontalMenu(menuItem)) {
        closeAllTopMenus();
      }
    } //touch device
    //open close for hover and device touch


    toggleMenuItem(menuItem, toggleState);
  }); //pointerover

  menuItem.addEventListener('pointerleave', function (e) {
    e.stopPropagation(); //simply close for hover

    if (e.pointerType === 'mouse') {
      toggleMenuItem(menuItem, false);
    } //triggers when the lcick on is removed...too fast so we need to add another event for clicking off


    if (e.pointerType !== 'mouse') {
      //clicked up on touch now we want that fi they click elsewhere to close everything
      if (!menuClickEvent) {
        menuClickEvent = true;
        document.addEventListener('click', function (e) {
          //if were not clicking a menu, close any menus opened
          if (!e.target.closest('.menu')) {
            closeAllTopMenus();
          }
        });
      }
    }
  });
} //close all top level menus


function closeAllTopMenus() {
  var otherMenuItems = document.querySelectorAll('.top-level-item.toggled-on');

  if (otherMenuItems) {
    otherMenuItems.forEach(function (item) {
      toggleMenuItem(item, false);
    });
  }
}

function isTopLevel(menuItem) {
  return menuItem.classList.contains('top-level-item');
} //if the item is inside a submenu inside another submenu


function isNestedSubMenu(menuItem) {
  return menuItem.classList.contains('nested-menu-item');
}

function isHorizontalMenu(menuItem) {
  return getComputedStyle(menuItem.closest('.menu')).flexDirection !== 'column';
} //fix and reset on resize


document.addEventListener('afterResize', function () {
  document.querySelectorAll('.top-level-item.menu-item-has-children').forEach(function (item) {
    toggleMenuItem(item, false);
    item.querySelector('.sub-menu').style.removeProperty('display');

    if (isHorizontalMenu(item)) {
      checkOffScreenMenu(item.querySelector('.sub-menu'));
    }
  });
});
document.addEventListener('DOMContentLoaded', function () {
  //adds menu events to all menus. more menus can be added later by passing it through createMenuListener
  var menus = document.querySelectorAll('.menu-item');
  menus.forEach(function (menuItem, index) {
    createMenuListener(menuItem);
  }); //on load if its a vertical menu, open the parent dropdown right away

  document.querySelectorAll('.menu .current-menu-item.menu-item-has-children, .menu .current-menu-parent').forEach(function (menu) {
    //if its a vertical menu. we can know by the flex direction of menu
    if (getComputedStyle(menu.closest('.menu')).flexDirection === 'column') {
      toggleMenuItem(menu);
    }
  });
}); // FOCUS EVENTS - only for keyboard

var menuMightBeOpen = false;
document.body.addEventListener('focusin', function (e) {
  var menuItem = e.target.closest('.menu-item');

  if (menuItem && menuItem.classList.contains('menu-item-has-children')) {
    window.addEventListener('keyup', function (e) {
      var code = e.keyCode ? e.keyCode : e.which;

      if (code === 9 || code === 16) {
        menuMightBeOpen = true; //close other top menus when this one is turned on

        if (isTopLevel(menuItem)) {
          closeAllTopMenus();
        }

        toggleMenuItem(menuItem, true);
      }
    }, {
      once: true
    });
  }

  if (menuMightBeOpen) {
    closeAllTopMenus();
    menuMightBeOpen = false;
  }
});
/*------- move submenus if too close to edge on desktop --------*/

function checkOffScreenMenu(submenu) {
  var display = window.getComputedStyle(submenu).display;

  if (display !== 'block') {
    submenu.style.display = 'block';
  } //make item visible so we can get left edge


  var rightEdge = submenu.getBoundingClientRect().right;
  var leftEdge = submenu.getBoundingClientRect().left; //set menu back

  if (display !== 'block') {
    submenu.style.removeProperty('display');
  }

  var viewport = document.documentElement.clientWidth; //if the submenu is off the page, pull it back somewhat

  if (rightEdge > viewport) {
    (0,_navigation_callbacks__WEBPACK_IMPORTED_MODULE_1__.fixOffScreenMenu)(submenu, 'right');
    return;
  }

  if (leftEdge < 0) {
    (0,_navigation_callbacks__WEBPACK_IMPORTED_MODULE_1__.fixOffScreenMenu)(submenu, 'left');
  } else {
    (0,_navigation_callbacks__WEBPACK_IMPORTED_MODULE_1__.fixOffScreenMenu)(submenu, 'none');
  }
}

jQuery(function ($) {
  //move logo in middle of menu on desktop if logo is middle position
  if ($('.logo-in-middle').length) {
    var navigationLi = $('.site-navigation__nav-holder .menu li');
    var middle = Math.floor($(navigationLi).length / 2) - 1; //add logo to the middle when page loads

    $('<li class="menu-item li-logo-holder"><div class="menu-item-link"></div></li>').insertAfter(navigationLi.filter(':eq(' + middle + ')'));
    $('.site-logo').clone().appendTo('.li-logo-holder');
  }
});

/***/ }),

/***/ "./src/js/core/navigation_callbacks.js":
/*!*********************************************!*\
  !*** ./src/js/core/navigation_callbacks.js ***!
  \*********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "toggleTopLevelHorizontalMenu": () => (/* binding */ toggleTopLevelHorizontalMenu),
/* harmony export */   "toggleTopLevelVerticalMenu": () => (/* binding */ toggleTopLevelVerticalMenu),
/* harmony export */   "toggleSubMenu": () => (/* binding */ toggleSubMenu),
/* harmony export */   "fixOffScreenMenu": () => (/* binding */ fixOffScreenMenu)
/* harmony export */ });
/* harmony import */ var src_js_core_setup__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! src/js/core/setup */ "./src/js/core/setup.js");
 //CHANGE THE FUNCTIONS BELOW TO CHANGE HOW YOUR MENUS OPEN AND CLOSE
//menuItem is an li that has a .sub-menu, you can decide however you want to open this
//css for this can be found in menus.scss and menu_layout.scss
//its better to override the layout file in menu.scss rather than touch that
//opens a top level item when the menu is horizontal

function toggleTopLevelHorizontalMenu(menuItem) {
  var open = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : true;

  if (open) {
    //change to whatever you want ie: ignSlideDown...
    menuItem.classList.add('toggled-on');
  } else {
    menuItem.classList.remove('toggled-on');
  }
} //runs when a toplevel vertical menu item is hovered or clicked

function toggleTopLevelVerticalMenu(menuItem) {
  var open = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : true;
  var subMenu = menuItem.querySelector('.sub-menu');

  if (open) {
    //change to whatever you want ie: ignSlideDown...
    menuItem.classList.add('toggled-on');
    return (0,src_js_core_setup__WEBPACK_IMPORTED_MODULE_0__.ignSlideDown)(subMenu);
  } else {
    menuItem.classList.remove('toggled-on');
    return (0,src_js_core_setup__WEBPACK_IMPORTED_MODULE_0__.ignSlideUp)(subMenu);
  }
} //non on all top level submenus for click and hover

function toggleSubMenu(menuItem) {
  var open = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : true;
  var subMenu = menuItem.querySelector('.sub-menu'); // Exit function if no subMenu is found.

  if (!subMenu) return;

  if (open) {
    //change to whatever you want ie: ignSlideDown...
    menuItem.classList.add('toggled-on');
    return (0,src_js_core_setup__WEBPACK_IMPORTED_MODULE_0__.ignSlideDown)(subMenu);
  } else {
    menuItem.classList.remove('toggled-on');
    return (0,src_js_core_setup__WEBPACK_IMPORTED_MODULE_0__.ignSlideUp)(subMenu);
  }
} //when a top level horizontal

function fixOffScreenMenu(submenu) {
  var side = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 'right';

  if (side === 'right') {
    submenu.closest('.menu-item').classList.add('offscreen-right');
  }

  if (side === 'left') {
    submenu.closest('.menu-item').classList.add('offscreen-left');
  }

  if (side === 'none') {
    submenu.closest('.menu-item').classList.remove('offscreen-left', 'offscreen-right');
  }
}

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

/***/ "./src/sass/back-end-bunde.scss":
/*!**************************************!*\
  !*** ./src/sass/back-end-bunde.scss ***!
  \**************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./theme.config.json":
/*!***************************!*\
  !*** ./theme.config.json ***!
  \***************************/
/***/ ((module) => {

"use strict";
module.exports = JSON.parse('{"name":"ebikerental","slug":"ebikerental","server":"ebikerentalfi.local","ssl":false,"google_fonts":["Roboto:400,400i,700,700i","Roboto Slab:400,700"],"menu_icon":"","sidebar_icon":"","submenu_arrow_icon":"","comment_icon":"","search_menu_item":false,"dev_admin_bar_color":"#156288","admin_access_capability":"manage_options","load_custom_icons":false,"mobile_menu_type":"app-menu","logo_position":"logo-left","site_top_container":"container","default_acf_header_block":["post","page"]}');

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
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
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
/*!****************************!*\
  !*** ./src/admin-index.js ***!
  \****************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _sass_back_end_bunde_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./sass/back-end-bunde.scss */ "./src/sass/back-end-bunde.scss");
/* harmony import */ var _js_core_setup__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./js/core/setup */ "./src/js/core/setup.js");
/* harmony import */ var _js_core_events__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./js/core/events */ "./src/js/core/events.js");
/* harmony import */ var _js_core_navigation__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./js/core/navigation */ "./src/js/core/navigation.js");
/* harmony import */ var _js_core_icons__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./js/core/icons */ "./src/js/core/icons.js");
/* harmony import */ var _js_core_icons__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_js_core_icons__WEBPACK_IMPORTED_MODULE_4__);





})();

/******/ })()
;
//# sourceMappingURL=backEnd_bundle.js.map