AOS.init();

// number
const $counters = document.querySelectorAll(".number");

$counters.forEach(($number) => {
  $number.innerText = "0";
  const updateCounter = () => {
    const target = Number($number.getAttribute("data-target"));
    const count = Number($number.innerText);
    const increment = target / 200;
    if (count < target) {
      $number.innerText = `${Math.ceil(count + increment)}`;
      setTimeout(updateCounter, 100);
    } else {
      $number.innerText = target;
    }
  };
  updateCounter();
});

// menu
$('.scroll-1').click(function() {
    $('html, body').animate({
        scrollTop: $($(this).attr('href')).offset().top - 100
    }, 1000);
    return false;
  });

  
$(document).ready(function () {
  $(".menu").on("click", function () {
    $(this).find(".hambergerIcon").toggleClass("open");
  });
});
// start-loading
setTimeout(() => {
  $(".loader").fadeOut(1000);
}, 2000);
// end-loading

// slider owlCarousel pages ======
// start-slider 1,2
$("#slider-1").owlCarousel({
  loop: true,
  margin: 0,
  nav: false,
  items: 1,
  autoplayTimeout: 6000,
  autoplayHoverPause: true,
  rtl: true,
  autoplay: false,
  dots: false,
  smartSpeed: 900,
  responsiveClass: true,
  responsive: {
    1400: {
      item: 1,
    },
  },
});
if ($(".slider-services").length) {
  $(".slider-services").owlCarousel({
    loop: true,
    margin: 0,
    nav: true,
    item: 3,
    autoplayTimeout: 3500,
    autoplayHoverPause: false,
    rtl: true,
    autoplay: false,
    autoplayHoverPause: true,
    dots: true,
    smartSpeed: 700,
    responsiveClass: true,
    responsive: {
      0: {
        items: 1,
        dots: true,
        nav: false,
      },
      600: {
        items: 2,
      },
      900: {
        items: 2,
        center: false,
      },
      1200: {
        items: 3,
      },
    },
  });
}

if ($("#slider-news").length) {
  $("#slider-news").owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    items: 3,
    autoplayTimeout: 4000,
    autoplayHoverPause: true,
    rtl: true,
    autoplay: false,
    dots: false,
    smartSpeed: 1000,
    responsiveClass: true,
    responsive: {
      0: {
        items: 1,
      },
      568: {
        items: 1,
      },

      1000: {
        items: 1,
      },
    },
  });
}

if ($("#slider-our-partners").length) {
  $("#slider-our-partners").owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
    items: 6,
    autoplayTimeout: 4000,
    autoplayHoverPause: true,
    rtl: true,
    autoplay: true,
    dots: false,
    smartSpeed: 1000,
    responsiveClass: true,
    responsive: {
      0: {
        items: 2,
      },
      568: {
        items: 2,
      },
      800: {
        items: 4,
      },
      1000: {
        items: 5,
      },
      1200: {
        items: 6,
      },
    },
  });
}

if ($("#slider-our-customer").length) {
  $("#slider-our-customer").owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
    items: 6,
    autoplayTimeout: 4000,
    autoplayHoverPause: true,
    rtl: true,
    autoplay: true,
    dots: false,
    smartSpeed: 1000,
    responsiveClass: true,
    responsive: {
      0: {
        items: 2,
      },
      568: {
        items: 2,
      },
      800: {
        items: 4,
      },
      1000: {
        items: 5,
      },
      1200: {
        items: 6,
      },
    },
  });
}

// show password =========
// ======
let btnShowPass = document.querySelectorAll(".show-password i");
btnShowPass.forEach((ele) => {
  ele.parentElement.nextElementSibling.setAttribute("type", "password");
  ele.addEventListener("click", function (e) {
    e.preventDefault();
    const type =
      e.target.parentElement.nextElementSibling.getAttribute("type") ===
      "password"
        ? "text"
        : "password";

    e.target.parentElement.nextElementSibling.setAttribute("type", type);

    if (e.target.classList.contains("bi-eye-slash")) {
      e.target.classList.add("bi-eye");
      e.target.classList.remove("bi-eye-slash");
    } else {
      e.target.classList.add("bi-eye-slash");
      e.target.classList.remove("bi-eye");
    }
  });
});

// start-header mune
document.addEventListener("DOMContentLoaded", function () {
  const myDiv = document.querySelector(".element");
  document.querySelector(".menu").addEventListener("click", function () {
    myDiv.classList.toggle("active");
    document.querySelector(".bg-div-mune").classList.toggle("active");
  });
  document.querySelector(".bg-div-mune").addEventListener("click", function () {
    myDiv.classList.remove("active");
    document.querySelector(".hambergerIcon").classList.remove("open");
    this.classList.remove("active");
  });
});
// end-header
