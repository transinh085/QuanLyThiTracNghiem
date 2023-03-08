"use strict";

const btnScrollTo = document.querySelector(".btn--scroll-to");
const section1 = document.querySelector("#section--1");

///////////////////////////////////////
// Slider
const slider = function () {
  const slides = document.querySelectorAll(".slide");
  const btnLeft = document.querySelector(".slider__btn--left");
  const btnRight = document.querySelector(".slider__btn--right");
  const dotContainer = document.querySelector(".dots");

  let curSlide = 0;
  const maxSlide = slides.length;

  // Functions
  const createDots = function () {
    slides.forEach((_, i) => {
      dotContainer.insertAdjacentHTML(
        "beforeend",
        `<button class="dots__dot" data-slide="${i}"></button>`
      );
    });
  };

  const activateDot = function (slide) {
    document
      .querySelectorAll(".dots__dot")
      .forEach((dot) => dot.classList.remove("dots__dot--active"));

    document
      .querySelector(`.dots__dot[data-slide="${slide}"]`)
      .classList.add("dots__dot--active");
  };

  const gotoSlide = function (slide) {
    slides.forEach(function (s, i) {
      s.style.transform = `translateX(${100 * (i - slide)}%)`;
    });
  };
  // 0    1     2     3     4
  // 0%, 100%, 200%, 300%, 400%
  // -100%, 0%, 100%, 200%, 300%
  // -200%, -100%, 0%, 100%, 200%

  const nextSlide = function () {
    if (curSlide === maxSlide - 1) {
      curSlide = 0;
    } else {
      curSlide++;
    }

    gotoSlide(curSlide);
    activateDot(curSlide);
  };

  const prevSlide = function () {
    if (curSlide === 0) {
      curSlide = maxSlide - 1;
    } else {
      curSlide--;
    }

    gotoSlide(curSlide);
    activateDot(curSlide);
  };

  const init = function () {
    createDots();
    gotoSlide(0);
    activateDot(0);
  };

  init();

  // Event handlers
  btnRight.addEventListener("click", nextSlide);
  btnLeft.addEventListener("click", prevSlide);

  document.addEventListener("keydown", function (e) {
    if (e.key === "ArrowLeft") prevSlide();
    e.key === "ArrowRight" && nextSlide();
  });

  dotContainer.addEventListener("click", function (e) {
    if (e.target.classList.contains("dots__dot")) {
      const { slide } = e.target.dataset;
      gotoSlide(slide);
      activateDot(slide);
    }
  });
};
slider();

///////////////////////////////////
// Scroll
btnScrollTo.addEventListener("click", function () {
  section1.scrollIntoView({ behavior: "smooth" });
});
