Dashmix.helpersOnLoad(['jq-appear']);
Dashmix.helpersOnLoad(['jq-slick'])

$('.slider-team').slick({
  autoplay: true, // Set the autoplay option based on the data attribute
  dots: true, // Set the dots option based on the data attribute
  arrows: true, // Set the arrows option based on the data attribute
  slidesToShow: 4, // Set the slidesToShow option based on the data attribute
  responsive: [
    {
      breakpoint: 1024, // Add breakpoints for different screen sizes
      settings: {
        slidesToShow: 3 // Change the number of slides to show for this screen size
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1
      }
    }
  ]
});

const btnScrollTo = document.querySelector(".btn--scroll-to");
const section1 = document.getElementById("section--1");

btnScrollTo.addEventListener('click', function () {
  section1.scrollIntoView({ behavior: 'smooth' });
});
