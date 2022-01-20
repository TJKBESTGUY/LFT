let resizeTimer;
window.addEventListener("resize", () => {


  // window.hero_height = document.querySelector(".section__hero-section").offsetHeight;
  // console.log("update" + hero_height);
    // update hero height
  document.body.classList.add("resize-animation-stopper");
  clearTimeout(resizeTimer);
  resizeTimer = setTimeout(() => {
    document.body.classList.remove("resize-animation-stopper");
  }, 400);

});
