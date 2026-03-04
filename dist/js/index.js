const toggleButton = document.getElementById("navbarToggle");
const mobileNavbar = document.getElementById("mobileNavbar");

toggleButton.addEventListener("click", () => {
  console.log("clicou");
  mobileNavbar.classList.toggle("hidden");
  mobileNavbar.classList.toggle("scale-y-0");
  mobileNavbar.classList.toggle("scale-y-100");
});

$(document).ready(function () {
  var owl = $(".owl-carousel");

  owl.owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    dots: false,
    autoplay: true,
    responsive:{
      0:{
          items:1
      },
      600:{
          items:3
      },
      1000:{
          items:4,
      }
    }
  });
});