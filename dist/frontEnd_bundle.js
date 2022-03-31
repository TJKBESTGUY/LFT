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

/***/ "./src/js/core/objectfitFallback.js":
/*!******************************************!*\
  !*** ./src/js/core/objectfitFallback.js ***!
  \******************************************/
/***/ (() => {

jQuery(function ($) {
  'use strict'; // the css selector for the container that the image should be attached to as a background-image

  var imgContainer = '.background-image, .cover-image';

  function getCurrentSrc(element, cb) {
    var _getSrc;

    if (!window.HTMLPictureElement) {
      if (window.respimage) {
        respimage({
          elements: [element]
        });
      } else if (window.picturefill) {
        picturefill({
          elements: [element]
        });
      }

      cb(element.src);
      return;
    }

    _getSrc = function getSrc() {
      element.removeEventListener('load', _getSrc);
      element.removeEventListener('error', _getSrc);
      cb(element.currentSrc);
    };

    element.addEventListener('load', _getSrc);
    element.addEventListener('error', _getSrc);

    if (element.complete) {
      _getSrc();
    }
  }

  function setBgImage() {
    $(imgContainer).each(function () {
      var $this = $(this),
          img = $this.find('img').get(0);
      getCurrentSrc(img, function (elementSource) {
        $this.css('background-image', 'url(' + elementSource + ')');
      });
    });
  }

  if ('objectFit' in document.documentElement.style === false) {
    $('html').addClass('no-objectfit');
    $(window).resize(function () {
      setBgImage();
    });
    setBgImage();
  }
});

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

/***/ "./src/js/core/sidebar.js":
/*!********************************!*\
  !*** ./src/js/core/sidebar.js ***!
  \********************************/
/***/ (() => {

document.addEventListener('DOMContentLoaded', function () {
  //move the header above the article when header-above is found
  var headerAbove = document.querySelector('.header-above');

  if (headerAbove !== null) {
    document.querySelectorAll('.entry-header, .page-header').forEach(function (header) {
      headerAbove.parentElement.prepend(header);
      header.classList.add('header-moved'); //might be useful for someone
    });
  } //when a secondary is used, a sidebar is shown, on load we do a few things to smooth the transition of the header


  var sidebar = document.querySelector('#secondary');

  if (sidebar !== null) {
    sidebar.innerHTML = sidebar.innerHTML.trim(); //if moving stuff in and out its good to remove extra space so :empty works

    var sidebarTemplate = document.querySelector('.sidebar-template');
    sidebarTemplate.classList.add('active');
  }
});

/***/ }),

/***/ "./src/js/core/smooth-scroll.js":
/*!**************************************!*\
  !*** ./src/js/core/smooth-scroll.js ***!
  \**************************************/
/***/ (() => {

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
  // LOADED ONLY FOR PAGE NEEDED
  if (document.body.classList.contains('page-template-yhteys')) {
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
  } // LOADED ONLY FOR PAGE NEEDED -- END

});

/***/ }),

/***/ "./src/js/page-specific/blog-page.js":
/*!*******************************************!*\
  !*** ./src/js/page-specific/blog-page.js ***!
  \*******************************************/
/***/ (() => {

///////TEMPALTE WRAP STARTS//////////
if (document.body.classList.contains('page-template-ajankohtaista')) {
  var filter_areas = function filter_areas(e) {
    console.log("btn working"); ///HANDLE STICKY/////

    if (document.body.classList.contains("S-on-sticky-scroll")) {
      console.log("on sitcky");
      document.querySelector(".module--article-feed").scrollIntoView({
        behavior: "auto",
        block: "start",
        inline: "nearest"
      });
    }

    var targets_area = e.target.getAttribute('data-cat'); ///ADD ANIMATION ON BODY

    document.body.classList.add("S-animating--articles"); ////CLEAR BUTTONS

    filter_buttons.forEach(function (elem) {
      elem.classList.remove("S-active__cat");
      elem.parentElement.classList.remove("S-active__cat");
      console.log(elem);
      console.log(elem.parentElement);
    }); ////SET ACTIVE BUTTON

    setTimeout(function () {
      e.target.classList.add("S-active__cat");
      e.target.parentElement.classList.add("S-active__cat");
    }, 0); //////RESET ANIMATION AND RUN FILTERS///

    setTimeout(function () {
      if (targets_area == "all") {
        console.log("all");
        reset_tr();
      } else {
        filter_tr();
      }

      document.body.classList.remove("S-animating--articles");
    }, 300);

    function reset_tr() {
      table_elems.forEach(function (elem) {
        elem.classList.remove("S-disabled__area-item");
      });
    }

    function filter_tr() {
      table_elems.forEach(function (elem) {
        // console.log(elem);
        if (elem.dataset.cat.includes(targets_area)) {
          elem.classList.remove("S-disabled__area-item");
        } else {
          elem.classList.add("S-disabled__area-item");
        }
      });
    }
  }; //////STICKY//////
  // get the sticky element


  // OPTIONAL CODE BELOW ///////////////////
  // find-first-scrollable-parent
  // Credit: https://stackoverflow.com/a/42543908/104380
  var getScrollParent = function getScrollParent(element, includeHidden) {
    var style = getComputedStyle(element),
        excludeStaticParent = style.position === "absolute",
        overflowRegex = includeHidden ? /(auto|scroll|hidden)/ : /(auto|scroll)/;
    if (style.position !== "fixed") for (var parent = element; parent = parent.parentElement;) {
      style = getComputedStyle(parent);
      if (excludeStaticParent && style.position === "static") continue;
      if (overflowRegex.test(style.overflow + style.overflowY + style.overflowX)) return parent;
    }
    return window;
  }; // Throttle
  // Credit: https://jsfiddle.net/jonathansampson/m7G64


  var throttle = function throttle(callback, limit) {
    var wait = false; // Initially, we're not waiting

    return function () {
      // We return a throttled function
      if (!wait) {
        // If we're not waiting
        callback.call(); // Execute users function

        wait = true; // Prevent future invocations

        setTimeout(function () {
          // After a period of time
          wait = false; // And allow future invocations
        }, limit);
      }
    };
  }; ///////TEMPALTE WRAP ENDS//////////


  console.log("INIT LASKENTAKOHTEET"); ////FILTER BUTTONS ///////

  var filter_buttons = document.querySelectorAll('.js--article-filter');
  var table_elems = document.querySelectorAll('.article-feed__content li');
  filter_buttons.forEach(function (elem) {
    console.log(elem); // The element

    elem.addEventListener("click", filter_areas);
  });
  var stickyElm = document.querySelector('.article-feed__cat-nav'); // get the first parent element which is scrollable

  var stickyElmScrollableParent = getScrollParent(stickyElm); // save the original offsetTop. when this changes, it means stickiness has begun.

  stickyElm._originalOffsetTop = stickyElm.offsetTop; // compare previous scrollTop to current one

  var detectStickiness = function detectStickiness(elm, cb) {
    return function () {
      return cb & cb(elm.offsetTop != elm._originalOffsetTop);
    };
  }; // Act if sticky or not


  var onSticky = function onSticky(isSticky) {
    // console.clear()
    console.log(isSticky);
    stickyElm.classList.toggle('isSticky', isSticky);
    document.body.classList.toggle('S-on-sticky-scroll', isSticky);
  }; // bind a scroll event listener on the scrollable parent (whatever it is)
  // in this exmaple I am throttling the "scroll" event for performance reasons.
  // I also use functional composition to diffrentiate between the detection function and
  // the function which acts uppon the detected information (stickiness)


  var scrollCallback = throttle(detectStickiness(stickyElm, onSticky), 100);
  stickyElmScrollableParent.addEventListener('scroll', scrollCallback);
}

/***/ }),

/***/ "./src/js/page-specific/home-page.js":
/*!*******************************************!*\
  !*** ./src/js/page-specific/home-page.js ***!
  \*******************************************/
/***/ (() => {

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
///////TEMPALTE WRAP STARTS//////////
if (document.body.classList.contains('page-template-etusivu')) {
  var trigger_table_anim = function trigger_table_anim() {
    setInterval(function () {
      table_body.classList.add("Anim--move-up");
      setTimeout(function () {
        table_body.classList.remove("Anim--move-up");
        var moving_item = document.querySelector(".Anim-item--list");
        moving_item.parentNode.appendChild(moving_item);
      }, 1000);
    }, 3000);
  };

  console.log("INIT LASKENTAKOHTEET preview");
  var table_body = document.querySelector(".laskentakohteet-app__body");
  trigger_table_anim();
}

console.log("home HELLO"); /////SCROLLL SHIIIT ->> MOVE TO GLOBAL LATER////

var target = document.querySelectorAll(".Anim-item--split");
console.log(target);

for (var i = 0, len = target.length; i < len; i++) {
  var target_i = target[i];
  var text = new SplitType(target_i, {
    types: 'chars'
  });
} // document.querySelector(".super-digits-mask").classList.add("animated")


ScrollOut({
  once: true,
  threshold: 0.9,
  onShown: function onShown(el) {
    el.classList.add("animated"); // var el_child = el.querySelectorAll("span");
    // console.log(el_child);

    var anim_type = el.getAttribute('data-type');
    console.log(anim_type);

    if (anim_type == "counter") {// var value = el.getAttribute('data-value');
      // var min_value = value - 10;
      // animateValue(el, min_value, value, 900);
      //
      // const options = {
      //   startVal: min_value,
      //   duration: 2,
      // };
      // var numAnim = new countUp.CountUp(el, value, options);
      // numAnim.start()
      // let count = new CountUp( el, 42, options);
      // if (!count.error) {
      //   count.start();
      // } else {
      //   console.error(count.error);
      // }
    } else {
      console.log("no counnt");
    } // el_child.forEach(function (elem) {
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
  var startTimestamp = null;

  var step = function step(timestamp) {
    if (!startTimestamp) startTimestamp = timestamp;
    var progress = Math.min((timestamp - startTimestamp) / duration, 1);
    obj.innerHTML = Math.floor(progress * (end - start) + start);

    if (progress < 1) {
      window.requestAnimationFrame(step);
    }
  };

  window.requestAnimationFrame(step);
} // const obj = document.getElementById("value");
// animateValue(obj, 100, 0, 5000);
/////HOVER FOR CONTACT AREAS


if (document.body.classList.contains('page-template-yhteys')) {
  var hover_elems = document.querySelectorAll(".js--show-area-pop");
  hover_elems.forEach(function (elem) {
    console.log(elem); // The element

    elem.addEventListener("mouseenter", function (e) {
      e.target.classList.add("S-hover-active");
    });
    elem.addEventListener("mouseleave", function (e) {
      e.target.classList.remove("S-hover-active");
    });
  });
}

/***/ }),

/***/ "./src/js/page-specific/kohteet-page.js":
/*!**********************************************!*\
  !*** ./src/js/page-specific/kohteet-page.js ***!
  \**********************************************/
/***/ (() => {

///////TEMPALTE WRAP STARTS//////////
if (document.body.classList.contains('page-template-laskentakohteet')) {
  var filter_areas = function filter_areas(e) {
    console.log("btn working");
    var targets_area = e.target.getAttribute('data-area');
    var table_elems = document.querySelectorAll('.laskentakohteet-app__body tr'); ///ADD ANIMATION ON BODY

    document.body.classList.add("S-animating--table"); ////CLEAR BUTTONS

    filter_buttons.forEach(function (elem) {
      elem.classList.remove("S-active__area");
      elem.parentElement.classList.remove("S-active__area");
      console.log(elem);
      console.log(elem.parentElement);
    }); ////SET ACTIVE BUTTON

    setTimeout(function () {
      e.target.classList.add("S-active__area");
      e.target.parentElement.classList.add("S-active__area");
    }, 0); //////INIT TRANSITION///

    document.querySelector('.module--laskentakohteet-app').classList.add("S-animating");

    if (targets_area == "all") {
      console.log("all");
      document.querySelector('.module--laskentakohteet-area-personel').classList.add("S-disabled");
    } else {
      setTimeout(function () {
        document.querySelector('.module--laskentakohteet-area-personel').classList.remove("S-disabled");
      }, 300);
    } //////RESET ANIMATION AND RUN FILTERS///


    setTimeout(function () {
      document.querySelector('.module--laskentakohteet-app').classList.remove("S-animating");

      if (targets_area == "all") {
        console.log("all");
        reset_tr();
      } else {
        filter_tr();
      } ////SET THE SORTING ON THE MAIN SORT////


      var main_sort = document.querySelector(".js--main-sort");

      if (main_sort.classList.contains("dir-d")) {
        console.log("keep active");
      } else {
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
        } else {
          elem.classList.add("S-disabled__area-item");
        }
      });
      contact_persons.forEach(function (elem) {
        // console.log(elem);
        if (elem.classList.contains(targets_area)) {
          elem.classList.add("S-active");
        } else {
          elem.classList.remove("S-active");
        }
      });
    }
  }; // get the sticky element


  // OPTIONAL CODE BELOW ///////////////////
  // find-first-scrollable-parent
  // Credit: https://stackoverflow.com/a/42543908/104380
  var getScrollParent = function getScrollParent(element, includeHidden) {
    var style = getComputedStyle(element),
        excludeStaticParent = style.position === "absolute",
        overflowRegex = includeHidden ? /(auto|scroll|hidden)/ : /(auto|scroll)/;
    if (style.position !== "fixed") for (var parent = element; parent = parent.parentElement;) {
      style = getComputedStyle(parent);
      if (excludeStaticParent && style.position === "static") continue;
      if (overflowRegex.test(style.overflow + style.overflowY + style.overflowX)) return parent;
    }
    return window;
  }; // Throttle
  // Credit: https://jsfiddle.net/jonathansampson/m7G64


  var throttle = function throttle(callback, limit) {
    var wait = false; // Initially, we're not waiting

    return function () {
      // We return a throttled function
      if (!wait) {
        // If we're not waiting
        callback.call(); // Execute users function

        wait = true; // Prevent future invocations

        setTimeout(function () {
          // After a period of time
          wait = false; // And allow future invocations
        }, limit);
      }
    };
  }; /////AREA CONTATCT MOUSE ACTIONS


  var activate_hover_area = function activate_hover_area(e) {
    document.querySelector('.-hover-parent').classList.add("S-active__hover");
  };

  var remove_hover_area = function remove_hover_area(e) {
    document.querySelector('.-hover-parent').classList.remove("S-active__hover");
  };

  var area_cell_hover = function area_cell_hover(e) {
    console.log("hover");
    var active_area = e.target.getAttribute('data-areacode');
    var area_array = active_area.split("");
    console.log(area_array);
    area_contact_cells.forEach(function (elem) {
      elem.classList.remove("S-active__area");
      elem.classList.remove("S-disabled__area");
      console.log(active_area);

      if (elem.dataset.areacode.includes(active_area)) {
        elem.classList.add("S-active__area");
      } else {
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
  };

  var area_cell_hover_out = function area_cell_hover_out(e) {
    console.log("hover out");
    area_contact_cells.forEach(function (elem) {
      elem.classList.remove("S-active__area");
      elem.classList.remove("S-disabled__area");
    });
  }; //////SCROLL TOP////


  // THE FORM
  var form_init = function form_init() {
    var table_elems = document.querySelectorAll('.laskentakohteet-app__body tr');
    table_elems.forEach(function (elem) {
      elem.addEventListener("click", form_selection);
    });

    function form_selection(e) {
      console.log("click on tr");
      console.log(e.currentTarget);
      var target_ID = e.currentTarget.id;
      var select_target = document.querySelector('#select-options');
      var optionToSelect = document.querySelector("#option-" + target_ID + "");
      console.log(optionToSelect);
      console.log(optionToSelect.value);
      select_target.value = optionToSelect.value;
    }

    document.querySelector(".js--from-show-more").onclick = function (e) {
      document.querySelector(".form-laskenta__checkboxes").removeAttribute("style");
      e.currentTarget.classList.add("S-muted");
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
    modal_container.addEventListener('click', function (event) {
      if (event.target.classList.contains("js--hide-modal")) {
        console.log("modal click");
        hide_form();
      }
    });
  }; ///////TEMPALTE WRAP ENDS//////////


  console.log("INIT LASKENTAKOHTEET");
  axios.get('https://sheetdb.io/api/v1/a58wtyooepdtq') // axios.get('https://sheetdb.io/api/v1/a58wtyooepdtq?sheet=Pohjois-Suomi')
  .then(function (response) {
    console.log("SHEETS");
    console.log(response.data);
    console.log(response.data.length);
    var kohteet = response.data;
    console.log(kohteet);
    kohteet.forEach(function (elem) {
      console.log(elem);
    });
  }); // // Get all data
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
    var down_class = ' dir-d ';
    var up_class = ' dir-u ';
    var regex_dir = / dir-(u|d) /;
    var regex_table = /\bsortable\b/;
    var element = e.target;

    function reClassify(element, dir) {
      element.className = element.className.replace(regex_dir, '') + dir;
    }

    function getValue(element) {
      // If you aren't using data-sort and want to make it just the tiniest bit smaller/faster
      // comment this line and uncomment the next one
      return element.getAttribute('data-sort') || element.innerText; // return element.innerText
    }

    if (element.nodeName === 'TH') {
      try {
        var tr = element.parentNode; // var table = element.offsetParent; // Fails with positioned table elements
        // this is the only way to make really, really sure. A few more bytes though... 😡

        var table = tr.parentNode.parentNode;

        if (regex_table.test(table.className)) {
          var column_index;
          var nodes = tr.cells; // reset thead cells and get column index

          for (var i = 0; i < nodes.length; i++) {
            if (nodes[i] === element) {
              column_index = i;
            } else {
              reClassify(nodes[i], '');
            }
          }

          var dir = down_class; // check if we're sorting up or down, and update the css accordingly

          if (element.className.indexOf(down_class) !== -1) {
            dir = up_class;
          }

          reClassify(element, dir); // extract all table rows, so the sorting can start.

          var org_tbody = table.tBodies[0]; // get the array rows in an array, so we can sort them...

          var rows = [].slice.call(org_tbody.rows, 0);
          var reverse = dir === up_class; // sort them using custom built in array sort.

          rows.sort(function (a, b) {
            var x = getValue((reverse ? a : b).cells[column_index]);
            var y = getValue((reverse ? b : a).cells[column_index]); // var y = (reverse ? b : a).cells[column_index].innerText
            // var x = (reverse ? a : b).cells[column_index].innerText

            return isNaN(x - y) ? x.localeCompare(y) : x - y;
          }); // Make a clone without content

          var clone_tbody = org_tbody.cloneNode(); // Build a sorted table body and replace the old one.

          while (rows.length) {
            clone_tbody.appendChild(rows.splice(0, 1)[0]);
          } // And finally insert the end result


          table.replaceChild(clone_tbody, org_tbody);
        }
      } catch (error) {// console.log(error)
      }

      if (document.body.classList.contains("S-on-sticky-scroll")) {
        console.log("on sitcky");
        document.querySelector(".laskentakohteet-navigation__filters").scrollIntoView({
          behavior: "smooth",
          block: "start",
          inline: "nearest"
        });
      }
    }
  }); /////////// TIRGGER SORT ON LOAD //////

  document.querySelector(".js--main-sort").click(); ////FILTER BUTTONS ///////

  var filter_buttons = document.querySelectorAll('.js--area-filter');
  var table_elems = document.querySelectorAll('.laskentakohteet-app__body tr');
  var contact_persons = document.querySelectorAll('.module--laskentakohteet-area-personel .contact-person');
  console.log(table_elems);
  filter_buttons.forEach(function (elem) {
    console.log(elem); // The element

    elem.addEventListener("click", filter_areas);
  });
  var stickyElm = document.querySelector('.tr--kohde'); // get the first parent element which is scrollable

  var stickyElmScrollableParent = getScrollParent(stickyElm); // save the original offsetTop. when this changes, it means stickiness has begun.

  stickyElm._originalOffsetTop = stickyElm.offsetTop; // compare previous scrollTop to current one

  var detectStickiness = function detectStickiness(elm, cb) {
    return function () {
      return cb & cb(elm.offsetTop != elm._originalOffsetTop);
    };
  }; // Act if sticky or not


  var onSticky = function onSticky(isSticky) {
    // console.clear()
    console.log(isSticky);
    stickyElm.classList.toggle('isSticky', isSticky);
    document.body.classList.toggle('S-on-sticky-scroll', isSticky);
  }; // bind a scroll event listener on the scrollable parent (whatever it is)
  // in this exmaple I am throttling the "scroll" event for performance reasons.
  // I also use functional composition to diffrentiate between the detection function and
  // the function which acts uppon the detected information (stickiness)


  var scrollCallback = throttle(detectStickiness(stickyElm, onSticky), 100);
  stickyElmScrollableParent.addEventListener('scroll', scrollCallback);
  var area_contact_persons = document.querySelector('.area-contact__persons');
  var area_contact_map = document.querySelector('.area-contact__map');
  var area_contact_cells = document.querySelectorAll('.js--area-hover-item'); // area_contact_map.addEventListener("mouseenter", activate_hover_area);
  // area_contact_map.addEventListener("mouseleave", remove_hover_area);
  //
  // area_contact_persons.addEventListener("mouseenter", activate_hover_area);
  // area_contact_persons.addEventListener("mouseleave", remove_hover_area);

  area_contact_cells.forEach(function (elem) {
    console.log(elem); // The element

    elem.addEventListener("mouseenter", area_cell_hover);
    elem.addEventListener("mouseleave", area_cell_hover_out);
  });

  document.querySelector(".js--scroll-top").onclick = function () {
    document.querySelector("body").scrollIntoView({
      behavior: "smooth",
      block: "start",
      inline: "nearest"
    });
  }; //init Form on laskenta


  form_init();
}

function animateValue(obj, start, end, duration) {
  var startTimestamp = null;

  var step = function step(timestamp) {
    if (!startTimestamp) startTimestamp = timestamp;
    var progress = Math.min((timestamp - startTimestamp) / duration, 1);
    obj.innerHTML = Math.floor(progress * (end - start) + start);

    if (progress < 1) {
      window.requestAnimationFrame(step);
    }
  };

  window.requestAnimationFrame(step);
}

function handle_counters() {
  body = document.getElementsByTagName('body')[0];
  body.classList.add("S-app-ready");
  document.querySelector(".site-container").style.visibility = "visible";
  document.querySelector(".laskenta-nav-counter span").innerHTML = laskenta_counter_value;
  document.querySelector(".laskenta-nav-counter--mobile span").innerHTML = laskenta_counter_value; ///PAGE SPECIFIC///

  if (document.body.classList.contains('page-template-laskentakohteet')) {
    document.querySelector(".-counted-number").innerHTML = laskenta_counter_value;
    document.querySelector(".-overlay-number").dataset.value = laskenta_counter_value;
    var el = document.querySelector(".-overlay-number");
    var value = document.querySelector(".-overlay-number").getAttribute('data-value');
    var min_value = value - 8;
    animateValue(el, min_value, value, 700);
    var options = {
      startVal: min_value,
      duration: 2
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
window.last_call; // var server_url_etela = "https://www.areite.fi/xml/laskentakohteet_pohjois-suomi.xml"

function call_etela() {
  server_url = "https://www.areite.fi/xml/laskentakohteet_etela-suomi.xml";
  kohde_area = "Etelä-Suomi";
  data_area = "etela-suomi";
  last_call = false;
  get_kohteet();
}

function call_ita() {
  server_url = "https://www.areite.fi/xml/laskentakohteet_ita-suomi.xml";
  kohde_area = "Itä-Suomi";
  data_area = "ita-suomi";
  last_call = false;
  get_kohteet();
}

function call_paakaupunki() {
  server_url = "https://www.areite.fi/xml/laskentakohteet_paakaupunkiseutu.xml";
  kohde_area = "Pääkaupunkiseutu";
  data_area = "paakaupunkiseutu";
  last_call = false;
  get_kohteet();
}

function call_pohjois() {
  server_url = "https://www.areite.fi/xml/laskentakohteet_pohjois-suomi.xml";
  kohde_area = "Pohjois-Suomi";
  data_area = "pohjois-suomi";
  last_call = true;
  get_kohteet();
} // call_etela();
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
} else if (sessionStorage.getItem("counter_value")) {
  // Restore the contents of the text field
  laskenta_counter_value = sessionStorage.getItem("counter_value");
  handle_counters();
  console.log("GET COUNT FROM SESSION STORAGE");
} else {
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
  var params = new FormData();
  params.append('action', 'get_token');
  params.append('server_url', server_url_local);
  axios.post(ajax_url, params).then(function (response) {
    console.log(response); // var id = response.data.id;
    // var no_data_on_trfi = response.data.message;
    // JSON.parse(response.data)
    // console.log(response.data);
    // console.log(response.item);

    var r_items = response.data.item;
    var result = r_items.filter(function (r_item) {
      return r_item.upcoming === "false";
    }); // console.log("result");
    // console.log(result);
    // console.log(Object.keys(result).length);
    // console.log("result");

    var r_count = Object.keys(result).length;
    laskenta_counter_value = laskenta_counter_value + r_count;
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

    var output = '';
    r_items.forEach(function (elem) {
      if (elem.upcoming === "false") {
        // console.log(elem); // The element
        // console.log(elem.title);
        //   console.log(elem.type);
        //       console.log(elem.brarea);
        //           console.log(elem.capacity);
        //                 console.log(elem.offer);
        //                   console.log(elem.desc);
        if (elem.desc.length > 0) {
          var extra_info = "<span class=\"-location\"><img src=\"http://areite.local/wp-content/themes/areite/svg/info.svg\">".concat(elem.desc, "</span>");
        } else {
          // var extra_info = `<span class="-location"><img src="http://areite.local/wp-content/themes/areite/svg/info.svg">NULL</span>`
          var extra_info = "<span class=\"-location\" style=\"display:none\"><img src=\"http://areite.local/wp-content/themes/areite/svg/info.svg\">NULL</span>";
        }

        if (elem.done === "true") {
          var state = "<span class=\"td__name -yellow\">Valmis</span>";
        } else {
          var state = "<span class=\"td__name \">".concat(elem.state, "</span>");
        }

        output += "<tr id=\"65\" class=\"Anim-item--list\" data-area=\"".concat(data_area_local, "\">\n\n                        <td class=\"td--kohde\">\n                        <div class=\"flx-container\">\n                        <span class=\"td__label\">\n                        ").concat(elem.title, "\n                        </span>\n\n                        <span class=\"td__name\">").concat(elem.title, "</span>\n                        <span class=\"td__xtra-info\">\n                          <span class=\"-location\"><img src=\"http://areite.local/wp-content/themes/areite/svg/location.svg\">").concat(kohde_area_local, "</span>\n\n                                            ").concat(extra_info, "\n                                               </span>\n                        </div>\n                      </td>\n                  \t                                    <td class=\"td--basic-cell\">\n                    <div class=\"\">\n                      <div class=\"flx-container\">\n                        <span class=\"td__label\">\u200B</span>\n                      <span class=\"td__name\">Helsinki</span>\n                      <span class=\"td__xtra-info\">\u200B</span>\n                      </div>\n                    </div>\n\n                  </td>\n                  <td class=\"td--basic-cell\">\n                    <div class=\"\">\n                      <div class=\"flx-container\">\n                        <span class=\"td__label td__label--basic\">Tyyppi</span>\n                      <span class=\"td__name\">").concat(elem.type, "</span>\n                      <span class=\"td__xtra-info\">\u200B</span>\n                      </div>\n                    </div>\n\n                  </td>\n                  <td class=\"td--basic-cell\">\n                    <div class=\"\">\n                      <div class=\"flx-container\">\n                        <span class=\"td__label td__label--basic\">Bruttoala</span>\n                      <span class=\"td__name\">").concat(elem.brarea, "</span>\n                      <span class=\"td__xtra-info\">\u200B</span>\n                      </div>\n                    </div>\n\n                  </td>\n                  <td class=\"td--basic-cell\">\n                    <div class=\"\">\n                      <div class=\"flx-container\">\n                        <span class=\"td__label td__label--basic\">Tilavuus</span>\n                      <span class=\"td__name\">").concat(elem.capacity, "</span>\n                      <span class=\"td__xtra-info\">\u200B</span>\n                      </div>\n                    </div>\n\n                  </td>\n                  <td class=\"td--basic-cell\">\n                    <div class=\"\">\n                      <div class=\"flx-container\">\n                        <span class=\"td__label td__label--basic\">Tarjous</span>\n                      <span class=\"td__name\">").concat(elem.offer, "</span>\n                      <span class=\"td__xtra-info\">\u200B</span>\n                      </div>\n                    </div>\n\n                  </td>\n                  <td class=\"td--basic-cell\">\n                    <div class=\"\">\n                      <div class=\"flx-container\">\n                        <span class=\"td__label td__label--basic\">Valmistuu</span>\n\n                    ").concat(state, "\n\n                                          <span class=\"td__xtra-info\">\u200B</span>\n\n\n\n\n                      </div>\n                    </div>\n    <div class=\"tr__hover-action-indicator js--show-form-modal\">Pyyd\xE4 tarjous</div>\n                  </td>\n\n                        </tr>");
      }
    }); // document.querySelector('.laskentakohteet-app__body').innerHTML = output

    if (document.body.classList.contains('page-template-laskentakohteet')) {
      document.querySelector('.laskentakohteet-app__body').insertAdjacentHTML('beforeend', output);
    }
  })["catch"](function (error) {
    console.log(error);
  });
}

/***/ }),

/***/ "./src/js/page-specific/refe-page.js":
/*!*******************************************!*\
  !*** ./src/js/page-specific/refe-page.js ***!
  \*******************************************/
/***/ (() => {

var refe_button = document.querySelectorAll('.js--refe-content-extend');
refe_button.forEach(function (elem) {
  console.log(elem); // The element

  elem.addEventListener("click", show_refe_info);
});

function show_refe_info(e) {
  console.log("button working");
  var target = e.currentTarget; // let person_ID = event.target.getAttribute('data-person');

  var parent = event.target.closest(".wrap__refe-extended-content");
  var target_height = parent.clientHeight;
  var target_h_px = -target_height + "px"; // console.log(parent_height);

  parent.classList.add("S-refe-activate");
  setTimeout(function () {
    parent.querySelector(".refe-extended-content").style.webkitTransform = "translateY(" + target_h_px + ")";
    parent.querySelector(".refe-extended-content").style.opacity = 1;
  }, 400);
}

console.log("REFE HELLO");

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
  offset: 450,
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
lazySizesConfig.preloadAfterLoad = true;
lazySizesConfig.expand = 1000;
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
var doc_body = document.body;
nav_trigger.addEventListener("click", mobile_nav);

function mobile_nav(e) {
  if (!document.body.classList.contains('S-active--mobile-nav')) {
    doc_body.classList.add("S-active--mobile-nav");
  } else {
    doc_body.classList.remove("S-active--mobile-nav");
  }
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
}

var news_trigger = document.querySelector(".js--nav-news-trigger");
var news_trigger_mobile = document.querySelector(".js--nav-news-trigger-mobile");
var site_container = document.querySelector(".site-container");

site_container.onclick = function (e) {
  document.body.classList.remove("S-active--news-feed");
};

news_trigger.onclick = function (e) {
  if (!document.body.classList.contains('S-active--news-feed')) {
    document.body.classList.add("S-active--news-feed");
  } else {
    document.body.classList.remove("S-active--news-feed");
  }
}; // news_trigger_mobile.onclick = function(e) {
// 	if (!document.body.classList.contains('S-active--news-feed-mobile')) {
// 	document.body.classList.add("S-active--news-feed-mobile");
// 	e.target.innerHTML = "Sulje";
// 	}
// 	else {
// 		document.body.classList.remove("S-active--news-feed-mobile");
// 			e.target.innerHTML = "Ajankohtaista";
// 	}
// }

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

/***/ "./src/js/util/stickymate.js":
/*!***********************************!*\
  !*** ./src/js/util/stickymate.js ***!
  \***********************************/
/***/ (() => {

function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && Symbol.iterator in Object(iter)) return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

/*

	stickymate v1.3.7
	Licensed under the MIT License
	Copyright 2021 Michael Rafailyk
	rafailyk@icloud.com
	https://github.com/rafailyk/stickymate
	https://www.npmjs.com/package/stickymate

*/
{
  // sticky section
  var sticky = {
    attribute: 'data-sticky',
    elements: false,
    container: 'sticky-container',
    property: 'position: -webkit-sticky; position: sticky;',
    // check if browser support position: sticky
    supported: function supported() {
      var element = document.createElement('div');
      element.style.cssText = sticky.property;
      return element.style.position.match('sticky') ? true : false;
    },
    wrap: function wrap() {
      if (sticky.supported()) {
        if (!sticky.elements && document.querySelectorAll('[' + sticky.attribute + ']').length) {
          sticky.elements = document.querySelectorAll('[' + sticky.attribute + ']');

          for (var i = 0; i < sticky.elements.length; i++) {
            // make sure that we wrap sticky only once
            if (!sticky.elements[i].parentNode.classList.contains(sticky.container)) {
              // wrap sticky only if its doesn't have a parent
              if (sticky.elements[i].parentNode.tagName.toLowerCase() == 'body') {
                var container = document.createElement('div');
                container.classList.add(sticky.container);
                container.style.position = 'relative';
                sticky.elements[i].parentNode.insertBefore(container, sticky.elements[i]);
                container.appendChild(sticky.elements[i]);
              } else {
                sticky.elements[i].parentNode.classList.add(sticky.container); // change static position to relative to properly get the offsetTop in animation.get

                var parentPosition = window.getComputedStyle(sticky.elements[i].parentNode).getPropertyValue('position');

                if (parentPosition == 'static') {
                  sticky.elements[i].parentNode.style.position = 'relative';
                }
              }
            }
          }
        }
      }
    },
    get: function get() {
      if (sticky.supported()) {
        element: for (var i = 0; i < sticky.elements.length; i++) {
          // get params about from/duration of sticky position
          var params = sticky.elements[i].getAttribute(sticky.attribute); // create correct json string

          params = validation.tojson(params);

          try {
            params = JSON.parse(params);
          } catch (e) {
            continue element;
          }

          if (!params['from'] || !params['duration']) continue element; // break the params string to separate the numbers inside

          params['from'] = params['from'].split(/(-?\d*\.?\d+)/).filter(function (e) {
            return e === 0 || e;
          });
          params['duration'] = params['duration'].split(/(-?\d*\.?\d+)/).filter(function (e) {
            return e === 0 || e;
          });
          if (!params['from'][0].match(/\d|top|center|bottom/)) continue element;
          if (!params['duration'][0].match(/\d/)) continue element;

          if (params['from'] == 'top') {
            params['from'][0] = 0;
          } else if (params['from'] == 'center') {
            var vh = -document.documentElement.clientHeight / 2;
            var eh = -sticky.elements[i].offsetHeight / 2;
            params['from'][0] = vh - eh;
          } else if (params['from'] == 'bottom') {
            var _vh = -document.documentElement.clientHeight;

            var _eh = -sticky.elements[i].offsetHeight;

            params['from'][0] = _vh - _eh;
          } // convert any type of keys to the pixels


          var start_numbers = -params['from'][0] + 0;
          var start_units = params['from'][1];
          var start = convert.unitsToPixels(start_numbers, start_units);
          var end = convert.unitsToPixels(+params['duration'][0], params['duration'][1]); // compose the min-height for the parent container
          // but get correct offset until the element is not a sticky

          var originalPosition = sticky.elements[i].style.position;
          sticky.elements[i].style.position = 'static';
          end += sticky.elements[i].offsetTop;
          end += sticky.elements[i].offsetHeight;
          sticky.elements[i].style.position = originalPosition; // apply params back to an elements

          sticky.set(sticky.elements[i], sticky.elements[i].parentElement, start, end);
        }
      }
    },
    set: function set(element, container, start, end) {
      if (!element.style.position.match('sticky')) {
        // actually make the element sticky
        element.style.cssText = (element.getAttribute('style') || '') + sticky.property;
      }

      element.style.top = start + 'px';
      container.style.minHeight = end + 'px';
    }
  }; // animation section

  var _animation = {
    attribute: 'data-animation',
    elements: false,
    list: [],
    status: {
      before: 'before',
      active: 'active',
      after: 'after'
    },
    get: function get() {
      if (!_animation.elements && document.querySelectorAll('[' + _animation.attribute + ']').length) {
        _animation.elements = document.querySelectorAll('[' + _animation.attribute + ']');
      }

      _animation.list = [];

      element: for (var i = 0; i < _animation.elements.length; i++) {
        // get correct top position
        // if animated element is inside the sticky, its top position moves along scroll
        var top = correctTop(_animation.elements[i]); // get params about position keys and animated values

        var params = _animation.elements[i].getAttribute(_animation.attribute); // create correct json string


        params = validation.tojson(params);

        try {
          params = JSON.parse(params);
        } catch (e) {
          continue element;
        } // create an array and fill it with verified params


        var paramsVerified = [];

        for (var property_name in params) {
          if (typeof _animation.elements[i].style[property_name] === 'undefined') continue element;
          if (Object.keys(params[property_name]).length < 2) continue element;
          var property_value = {};
          var list = {};
          list[property_name] = {
            'position': [],
            'values': [],
            'status': null,
            'locked': false
          }; // convert keys to pixels and get sorted keys

          keys: for (var key in params[property_name]) {
            var position = key.split(/(-?\d*\.?\d+)/).filter(function (e) {
              return e === 0 || e;
            });
            if (!position[0].match(/\d/)) continue keys;
            var numbers = +position[0] + 0;
            var units = position[1];
            position = convert.unitsToPixels(numbers, units) + top;
            position = Math.round(position);
            property_value[position] = params[property_name][key];
          } // save keys and values saparately, verify and prepare them


          save: for (var _key in property_value) {
            for (var k = 0; k < list[property_name]['position'].length; k++) {
              if (+_key === list[property_name]['position'][k][0]) continue save;
            }

            list[property_name]['position'].push(+_key);
            list[property_name]['values'].push(property_value[_key]);
          } // aligning the order of multiple transform values, like scale(...), translate(...) etc


          if (property_name == 'transform') {
            (function () {
              var _ref;

              // separate subvalues
              for (var j = 0; j < list[property_name]['values'].length; j++) {
                list[property_name]['values'][j] = list[property_name]['values'][j].split(/\s(?=[^()]*\()/);
              } // make the same order of subvalues inside each value


              var subvalues = new Map((_ref = []).concat.apply(_ref, _toConsumableArray(list[property_name]['values'])).map(function (item) {
                return [item.replace(/\(.*\)/, ''), item];
              }));
              var valuesOrdered = list[property_name]['values'].map(function (row) {
                return _toConsumableArray(row.reduce(function (map, item) {
                  return map.set(item.replace(/\(.*\)/, ''), item);
                }, new Map(subvalues)).values());
              }); // join subvalues back to string

              for (var _k = 0; _k < list[property_name]['values'].length; _k++) {
                list[property_name]['values'][_k] = valuesOrdered[_k].join(' ');
              }
            })();
          } // separate the numbers inside values


          for (var l = 0; l < list[property_name]['values'].length; l++) {
            list[property_name]['values'][l] = list[property_name]['values'][l].split(/(-?\d*\.?\d+)/).filter(function (e) {
              return e === 0 || e;
            });
          } // verify values for missing units types


          validation.autocomplete(list[property_name]['values']);
          paramsVerified.push(list);
        } // make a global list of animated elements with them positions, values and statuses


        _animation.list.push({
          'element': _animation.elements[i],
          'params': paramsVerified
        });
      }
    },
    detect: function detect(i, scroll) {
      scroll = scroll || window.pageYOffset;
      var properties = _animation.list[i]['params'];

      for (var j = 0; j < properties.length; j++) {
        var percent = void 0;
        var property = void 0;
        var params = void 0;

        for (var key in properties[j]) {
          property = key;
        }

        params = properties[j][property];
        var position = params['position'];
        var first = 0;
        var last = position.length - 1; // the element is before the first position key of its animation, apply changes only once

        if (scroll < position[first] && params['status'] != _animation.status.before) {
          params['status'] = _animation.status.before;
          percent = 0;

          _animation.set(_animation.list[i], percent, first, first, j, property);
        } // the element is after the last position key of its animation, apply changes only once
        else if (scroll >= position[last] && params['status'] != _animation.status.after) {
            params['status'] = _animation.status.after;
            percent = 100;

            _animation.set(_animation.list[i], percent, last, last, j, property);
          } // the element is between the first and last position keys of its animation
          else if (scroll >= position[first] && scroll < position[last]) {
              if (params['status'] != _animation.status.active) {
                params['status'] = _animation.status.active;
              } // animation has only two position keys (without intermediate)


              if (position.length == 2) {
                percent = convert.pixelsToPercent(position[first], position[last], scroll);

                _animation.set(_animation.list[i], percent, first, last, j, property);
              } // animation has intermediate position keys
              else {
                  for (var k = 0; k < position.length; k++) {
                    // looking for keys between which we are now
                    if (position[k + 1] && scroll >= position[k] && scroll < position[k + 1]) {
                      // at the first entry in any case, apply the changes
                      // next time animate only if the values between keys are not identical
                      if (!params['locked']) {
                        percent = convert.pixelsToPercent(position[k], position[k + 1], scroll);

                        _animation.set(_animation.list[i], percent, k, k + 1, j, property);
                      } // compare values between keys, if they are the same - lock


                      var start = '';
                      var end = '';

                      for (var l = 0; l < params['values'][k].length; l++) {
                        start += params['values'][k][l];
                        end += params['values'][k + 1][l];
                      }

                      if (start == end && !params['locked']) {
                        params['locked'] = true;
                      } else if (start != end && params['locked']) {
                        params['locked'] = false;
                      }
                    }
                  }
                }
            }
      }
    },
    set: function set(element, percent, start, end, id, property) {
      start = element['params'][id][property]['values'][start];
      end = element['params'][id][property]['values'][end]; // collect the value back to string

      var value = '';

      for (var i = 0; i < start.length; i++) {
        if (percent == 0) {
          value += start[i];
        } else if (percent == 100) {
          value += end[i];
        } else {
          if (validation.numbers(start[i])) {
            value += convert.percentToValue(start[i], end[i], percent);
          } else {
            value += start[i];
          }
        }
      } // apply changes to an element


      window.requestAnimationFrame(function () {
        if (property != 'opacity') {
          element['element'].style['-webkit-' + property] = value;
        }

        element['element'].style[property] = value;
      });
    }
  }; // classes section

  var _classes = {
    attribute: 'data-classes',
    elements: false,
    list: [],
    get: function get() {
      if (!_classes.elements) {
        _classes.elements = document.querySelectorAll('[' + _classes.attribute + ']');
      }

      _classes.list = [];

      element: for (var i = 0; i < _classes.elements.length; i++) {
        // get correct top position
        // if element is inside the sticky, its top position moves along scroll
        var top = correctTop(_classes.elements[i]); // get params about position keys and classes in values

        var params = _classes.elements[i].getAttribute(_classes.attribute); // create correct json string


        params = validation.tojson(params);

        try {
          params = JSON.parse(params);
        } catch (e) {
          continue element;
        } // list of keys and final classes for current element


        var list = {
          'element': _classes.elements[i],
          'params': []
        }; // save original classlist and write first key

        if (!_classes.elements[i].hasAttribute('data-classlist-original')) {
          _classes.elements[i].setAttribute('data-classlist-original', _classes.elements[i].className);
        }

        list['params'].push({
          'position': 0,
          'status': false,
          'classes': _classes.elements[i].getAttribute('data-classlist-original')
        }); // convert keys to pixels and get sorted keys

        var params_sorted = {};

        keys: for (var key in params) {
          var position = key.split(/(-?\d*\.?\d+)/).filter(function (e) {
            return e === 0 || e;
          });
          if (!position[0].match(/\d/)) continue keys;
          var numbers = +position[0] + 0;
          var units = position[1];
          position = convert.unitsToPixels(numbers, units) + top;
          position = Math.round(position);
          params_sorted[position] = params[key];
        } // compare classlist of current key with classlist of previous key and rewrite updated current classlist


        var counter = 0;

        for (var _key2 in params_sorted) {
          // compose current key
          var sublist = {
            'position': +_key2,
            'status': false,
            'classes': list['params'][counter]['classes']
          }; // add the class only if it was not in the previous key

          if (params_sorted[_key2]['add']) {
            var addList = params_sorted[_key2]['add'].split(/\,?\s+|\,|\s+/g);

            for (var j = 0; j < addList.length; j++) {
              if (!sublist['classes'].match(addList[j])) {
                sublist['classes'] += ' ' + addList[j];
              }
            }
          } // remove the class only if it was in the previous key


          if (params_sorted[_key2]['remove']) {
            var removeList = params_sorted[_key2]['remove'].split(/\,?\s+|\,|\s+/g);

            for (var _j = 0; _j < removeList.length; _j++) {
              if (sublist['classes'].match(removeList[_j])) {
                sublist['classes'] = sublist['classes'].replace(removeList[_j], '');
              }
            } // remove extra spaces


            sublist['classes'] = sublist['classes'].replace(/^\s+|\s+$/, '').replace(/\s{2,}/, ' ');
          }

          list['params'].push(sublist);
          counter++;
        } // add the element, status and keys/classes to the global list


        _classes.list.push(list);
      }
    },
    detect: function detect(i, scroll) {
      scroll = scroll || window.pageYOffset;
      var element = _classes.list[i]['element'];
      var params = _classes.list[i]['params'];

      for (var j = 0; j < params.length; j++) {
        var current = params[j]['position'];
        var prev = void 0;
        var next = void 0;
        if (params[j - 1]) prev = params[j - 1]['position'];
        if (params[j + 1]) next = params[j + 1]['position'];
        var last = params[params.length - 1]['position']; // find the matching key

        var ifNotLast = next && scroll >= current && scroll < next && !params[j]['status'];
        var ifLast = scroll >= current && current == last && !params[j]['status'];

        if (ifNotLast || ifLast) {
          params[j]['status'] = true; // if there is a need to apply classes only once, need to remove the following two conditions

          if (params[j - 1]) {
            params[j - 1]['status'] = false;
          }

          if (params[j + 1]) {
            params[j + 1]['status'] = false;
          } // apply classes to an element


          _classes.set(element, params[j]['classes']);
        }
      }
    },
    set: function set(element, list) {
      window.requestAnimationFrame(function () {
        element.className = list;
      });
    }
  }; // utilities

  var validation = {
    numbers: function numbers(data) {
      if (typeof data == 'number') return true;else if (data.match(/\d/)) return true;else return false;
    },
    tojson: function tojson(data) {
      // wrap in brackets
      if (data.substring(0, 1) !== '{') data = '{' + data + '}';
      data = data // protect commas inside round brackets
      .replace(/,(?=[^()]*\))/g, '__') // remove spaces around base separators
      .replace(/([\s\r\n]+)?([:\,\{\}])([\s\r\n]+)?/g, '$2') // wrap key and values in double quotes
      .replace(/(['"])?([a-zA-Z0-9\.\%\-_\(\)\s]+)(['"])?/g, '"$2"') // return commas inside round brackets
      .replace(/__/g, ',');
      return data;
    },
    autocomplete: function autocomplete(data) {
      // get the longest string
      var completed = data[0].slice();

      for (var i = 0; i < data.length; i++) {
        if (data[i].length > completed.length) {
          completed = data[i].slice();
        }
      } // get the longest substrings except numbers


      for (var _i = 0; _i < data.length; _i++) {
        for (var j = 0; j < completed.length; j++) {
          if (data[_i][j] && !validation.numbers(data[_i][j])) {
            if (data[_i][j].length > completed[j].length) {
              completed[j] = data[_i][j];
            }
          }
        }
      } // correct the wrong substrings except numbers, in each string


      for (var _i2 = 0; _i2 < completed.length; _i2++) {
        for (var _j2 = 0; _j2 < data.length; _j2++) {
          if (data[_j2][_i2]) {
            if (validation.numbers(data[_j2][_i2])) {
              data[_j2][_i2] = +data[_j2][_i2];
            } else if (!validation.numbers(data[_j2][_i2]) && data[_j2][_i2] != completed[_i2]) {
              data[_j2][_i2] = completed[_i2];
            }
          } else {
            if (validation.numbers(completed[_i2])) {
              data[_j2][_i2] = +completed[_i2];
            } else {
              data[_j2][_i2] = completed[_i2];
            }
          }
        }
      }

      return data;
    }
  };
  var convert = {
    unitsToPixels: function unitsToPixels(numbers, units) {
      units = units || 'px';

      if (units.match('px')) {
        return numbers;
      } else if (units.match('vh')) {
        return numbers / 100 * document.documentElement.clientHeight;
      } else if (units.match('vw')) {
        return numbers / 100 * document.documentElement.clientWidth;
      }
    },
    pixelsToPercent: function pixelsToPercent(a, b, pixels) {
      return (pixels - a) * 100 / (b - a);
    },
    percentToValue: function percentToValue(a, b, percent) {
      return percent * (b - a) / 100 + a;
    }
  };

  var correctTop = function correctTop(element) {
    var top = 0;

    while (element && !isNaN(element.offsetTop)) {
      if (!element.style.position.match('sticky')) {
        top += element.offsetTop - element.scrollTop;
      } else {
        var originalPosition = element.style.position;
        element.style.position = 'relative';
        top += element.offsetTop - element.scrollTop;
        element.style.position = originalPosition;
      }

      element = element.offsetParent;
    }

    return top;
  };

  var resizeEnd = function resizeEnd(params) {
    var startWidth = document.documentElement.clientWidth;
    var startHeight = document.documentElement.clientHeight;
    setTimeout(function () {
      var endWidth = document.documentElement.clientWidth;
      var endHeight = document.documentElement.clientHeight;

      if (startWidth == endWidth && startHeight == endHeight) {
        // end of resize event
        params();
      }
    }, 50);
  };

  var observation = function observation() {
    // decide whether to use IntersectionObserver or window scroll event for detecting elements
    if ('IntersectionObserver' in window) {
      // observe the visibility of elements in modern browsers
      var detector = {
        animation: function animation(i) {
          _animation.detect(i);
        },
        classes: function classes(i) {
          _classes.detect(i);
        },
        list: {
          animation: {},
          classes: {}
        }
      };
      var observer = new IntersectionObserver(function (entries, observer) {
        entries.forEach(function (entry) {
          // get index and action type (animation/classes) of element to find it in animation/classes list
          var index = entry.target.animation_index;
          var action = entry.target.scroll_action; // prepare a personal function wrapper for detecting element in a window scroll event

          if (!detector.list[action][index]) {
            detector.list[action][index] = function () {
              detector[action](index);
            };
          } // link or unlink this function to scroll event only when the element intersect a viewport


          if (entry.isIntersecting) {
            window.addEventListener('scroll', detector.list[action][index], {
              passive: true
            });
          } else {
            window.removeEventListener('scroll', detector.list[action][index], {
              passive: true
            });
          }
        });
      });

      if (_animation && _animation.elements) {
        _animation.elements.forEach(function (elem, index) {
          // check if either parent has an overflow hidden
          var parent = elem.parentElement;

          while (parent) {
            var styles = window.getComputedStyle(parent);

            if (styles.getPropertyValue('overflow') == 'hidden' || styles.getPropertyValue('overflow-x') == 'hidden') {
              // be sure that parent's position is not static
              var parentPosition = window.getComputedStyle(elem.parentElement).getPropertyValue('position');

              if (parentPosition == 'static') {
                elem.parentElement.style.position = 'relative';
              } // add the new element before original element for observing instead of him


              var observed = document.createElement('div');
              observed.style.position = 'absolute';
              observed.style.pointerEvents = 'none';
              observed.style.left = '0px';
              observed.style.top = '0px';
              observed.style.width = '100%';
              observed.style.height = '100%';
              elem.before(observed); // now IntersectionObserver will observe this new element instead of original

              elem = observed;
              break;
            }

            parent = parent.parentElement;
          } // link index from animation/classes list and action type (animation/classes) to observed element


          elem.animation_index = index;
          elem.scroll_action = 'animation';
          observer.observe(elem);
        });
      }

      if (_classes && _classes.elements) {
        _classes.elements.forEach(function (elem, index) {
          elem.animation_index = index;
          elem.scroll_action = 'classes';
          observer.observe(elem);
        });
      }
    } else {
      // listen scroll event in older browsers
      window.addEventListener('scroll', function () {
        var scroll = window.pageYOffset;

        for (var i = 0; i < _animation.list.length; i++) {
          _animation.detect(i, scroll);
        }

        for (var _i3 = 0; _i3 < _classes.list.length; _i3++) {
          _classes.detect(_i3, scroll);
        }
      }, {
        passive: true
      });
    }
  }; // initialization
  // get data and set keys and params


  var initialization = function initialization() {
    sticky.wrap();
    sticky.get();

    _animation.get();

    _classes.get();

    for (var i = 0; i < _animation.list.length; i++) {
      _animation.detect(i);
    }

    for (var _i4 = 0; _i4 < _classes.list.length; _i4++) {
      _classes.detect(_i4);
    }
  }; // checking DOM state


  if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', function () {
      initialization();
      observation();
    });
    window.onload = initialization;
  } else if (document.readyState == 'interactive') {
    initialization();
    observation();
    window.onload = initialization;
  } else if (document.readyState == 'complete') {
    initialization();
    observation();
  } // update lists of element's position after resize


  window.addEventListener('resize', function () {
    resizeEnd(initialization);
  }, {
    passive: true
  });
}

/***/ }),

/***/ "./src/parts/global/_browser_update.js":
/*!*********************************************!*\
  !*** ./src/parts/global/_browser_update.js ***!
  \*********************************************/
/***/ (() => {

var $buoop = {
  required: {
    e: -4,
    f: -3,
    o: -3,
    s: -1,
    c: -3
  },
  insecure: true,
  api: 2020.04
};

function $buo_f() {
  var e = document.createElement("script");
  e.src = "//browser-update.org/update.min.js";
  document.body.appendChild(e);
}

;

try {
  document.addEventListener("DOMContentLoaded", $buo_f, false);
} catch (e) {
  window.attachEvent("onload", $buo_f);
}

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


/***/ }),

/***/ "./theme.config.json":
/*!***************************!*\
  !*** ./theme.config.json ***!
  \***************************/
/***/ ((module) => {

"use strict";
module.exports = JSON.parse('{"name":"Areite","slug":"areite","server":"areite.local","ssl":true,"google_fonts":["Roboto:400,400i,700,700i","Roboto Slab:400,700"],"menu_icon":"","sidebar_icon":"","submenu_arrow_icon":"","comment_icon":"","search_menu_item":false,"dev_admin_bar_color":"#156288","admin_access_capability":"manage_options","load_custom_icons":false,"mobile_menu_type":"app-menu","logo_position":"logo-left","site_top_container":"container","default_acf_header_block":["post","page"]}');

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
/* harmony import */ var _js_core_objectfitFallback__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./js/core/objectfitFallback */ "./src/js/core/objectfitFallback.js");
/* harmony import */ var _js_core_objectfitFallback__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_js_core_objectfitFallback__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _js_core_sidebar__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./js/core/sidebar */ "./src/js/core/sidebar.js");
/* harmony import */ var _js_core_sidebar__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_js_core_sidebar__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _js_core_navigation__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./js/core/navigation */ "./src/js/core/navigation.js");
/* harmony import */ var _js_core_smooth_scroll__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./js/core/smooth-scroll */ "./src/js/core/smooth-scroll.js");
/* harmony import */ var _js_core_smooth_scroll__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_js_core_smooth_scroll__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _js_core_icons__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./js/core/icons */ "./src/js/core/icons.js");
/* harmony import */ var _js_core_icons__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(_js_core_icons__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var _js_core_responsive_iframe__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./js/core/responsive-iframe */ "./src/js/core/responsive-iframe.js");
/* harmony import */ var _js_util_stickymate_js__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./js/util/stickymate.js */ "./src/js/util/stickymate.js");
/* harmony import */ var _js_util_stickymate_js__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(_js_util_stickymate_js__WEBPACK_IMPORTED_MODULE_9__);
/* harmony import */ var _js_util_lazyloading_js__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./js/util/lazyloading.js */ "./src/js/util/lazyloading.js");
/* harmony import */ var _js_util_headroom_js__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ./js/util/headroom.js */ "./src/js/util/headroom.js");
/* harmony import */ var _js_util_resize_js__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! ./js/util/resize.js */ "./src/js/util/resize.js");
/* harmony import */ var _js_util_resize_js__WEBPACK_IMPORTED_MODULE_12___default = /*#__PURE__*/__webpack_require__.n(_js_util_resize_js__WEBPACK_IMPORTED_MODULE_12__);
/* harmony import */ var _js_util_navigation_js__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! ./js/util/navigation.js */ "./src/js/util/navigation.js");
/* harmony import */ var _js_util_navigation_js__WEBPACK_IMPORTED_MODULE_13___default = /*#__PURE__*/__webpack_require__.n(_js_util_navigation_js__WEBPACK_IMPORTED_MODULE_13__);
/* harmony import */ var _js_page_specific_refe_page_js__WEBPACK_IMPORTED_MODULE_14__ = __webpack_require__(/*! ./js/page-specific/refe-page.js */ "./src/js/page-specific/refe-page.js");
/* harmony import */ var _js_page_specific_refe_page_js__WEBPACK_IMPORTED_MODULE_14___default = /*#__PURE__*/__webpack_require__.n(_js_page_specific_refe_page_js__WEBPACK_IMPORTED_MODULE_14__);
/* harmony import */ var _js_page_specific_home_page_js__WEBPACK_IMPORTED_MODULE_15__ = __webpack_require__(/*! ./js/page-specific/home-page.js */ "./src/js/page-specific/home-page.js");
/* harmony import */ var _js_page_specific_home_page_js__WEBPACK_IMPORTED_MODULE_15___default = /*#__PURE__*/__webpack_require__.n(_js_page_specific_home_page_js__WEBPACK_IMPORTED_MODULE_15__);
/* harmony import */ var _js_page_specific_kohteet_page_js__WEBPACK_IMPORTED_MODULE_16__ = __webpack_require__(/*! ./js/page-specific/kohteet-page.js */ "./src/js/page-specific/kohteet-page.js");
/* harmony import */ var _js_page_specific_kohteet_page_js__WEBPACK_IMPORTED_MODULE_16___default = /*#__PURE__*/__webpack_require__.n(_js_page_specific_kohteet_page_js__WEBPACK_IMPORTED_MODULE_16__);
/* harmony import */ var _js_page_specific_blog_page_js__WEBPACK_IMPORTED_MODULE_17__ = __webpack_require__(/*! ./js/page-specific/blog-page.js */ "./src/js/page-specific/blog-page.js");
/* harmony import */ var _js_page_specific_blog_page_js__WEBPACK_IMPORTED_MODULE_17___default = /*#__PURE__*/__webpack_require__.n(_js_page_specific_blog_page_js__WEBPACK_IMPORTED_MODULE_17__);
/* harmony import */ var _inc_core_core_js__WEBPACK_IMPORTED_MODULE_18__ = __webpack_require__(/*! ../inc/core/_core.js */ "./inc/core/_core.js");
/* harmony import */ var _inc_core_core_js__WEBPACK_IMPORTED_MODULE_18___default = /*#__PURE__*/__webpack_require__.n(_inc_core_core_js__WEBPACK_IMPORTED_MODULE_18__);
/* harmony import */ var _inc_scrollmagic_scrollmagic_js__WEBPACK_IMPORTED_MODULE_19__ = __webpack_require__(/*! ../inc/scrollmagic/_scrollmagic.js */ "./inc/scrollmagic/_scrollmagic.js");
/* harmony import */ var _inc_scrollmagic_scrollmagic_js__WEBPACK_IMPORTED_MODULE_19___default = /*#__PURE__*/__webpack_require__.n(_inc_scrollmagic_scrollmagic_js__WEBPACK_IMPORTED_MODULE_19__);
/* harmony import */ var _parts_global_browser_update_js__WEBPACK_IMPORTED_MODULE_20__ = __webpack_require__(/*! ./parts/global/_browser_update.js */ "./src/parts/global/_browser_update.js");
/* harmony import */ var _parts_global_browser_update_js__WEBPACK_IMPORTED_MODULE_20___default = /*#__PURE__*/__webpack_require__.n(_parts_global_browser_update_js__WEBPACK_IMPORTED_MODULE_20__);
 //ADDING SASS
//add your sass files easilt by starting them with an underscore inside the inc or parts folders
// You can also manually add a regular file to the front end bundle so you have access to all scss variables and classes
//adding a separate scss here will work, but you wont have access to scss variables or @use, or @extend

 //js from src




 // import "./js/core/panel-left"
///////SMOOTH SCROLL IS WRAPPER TO ONLY LOAD ON SPECIFIC PAGE



 //////UTILITY




 //navigation

 ////PAGE SPECIFIC




 //add all underscored js files from inc and parts




})();

/******/ })()
;
//# sourceMappingURL=frontEnd_bundle.js.map