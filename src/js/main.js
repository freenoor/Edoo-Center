function closeNavbar() {
  $(".navbar-toggler").attr("aria-expanded", "false");
  $(".navbar-collapse").removeClass("show");
  $(".menu-top").removeClass("menu-top-click");
  $(".menu-middle").removeClass("menu-middle-click");
  $(".menu-bottom").removeClass("menu-bottom-click");
}
$(".frontpage-header .navbar-collapse li a").on("click", function() {
  closeNavbar();
});
var Menu = {
  el: {
  ham: jQuery('.menu-m'),
  menuTop: jQuery('.menu-top'),
  menuMiddle: jQuery('.menu-middle'),
  menuBottom: jQuery('.menu-bottom')
  },
  init: function() {
  Menu.bindUIactions();
  },
  bindUIactions: function() {
  Menu.el.ham
  .on(
  'click',
  function(event) {
  Menu.activateMenu(event);
  event.preventDefault();
  }
  );
  },
  activateMenu: function() {
  Menu.el.menuTop.toggleClass('menu-top-click');
  Menu.el.menuMiddle.toggleClass('menu-middle-click');
  Menu.el.menuBottom.toggleClass('menu-bottom-click'); 
  }
  };
Menu.init();
$(document).ready(function() {
function updateClasses() {
  if ($(window).scrollTop() > 70) {
    $('.logo_header').addClass('scroll-imgchange');
    $('.navbar-nav').addClass('scroll-navchange');
    $('.headerbar').addClass('scroll-headerchange');
  } else {
    $('.logo_header').removeClass('scroll-imgchange');
    $('.navbar-nav').removeClass('scroll-navchange');
    $('.headerbar').removeClass('scroll-headerchange');
  }
}
updateClasses();
$(window).scroll(function() {
  updateClasses();
});
});
$(document).ready(function() {
 $('.navbar-toggler').click(function() {
   $('.menu-menu-1-container').toggleClass('act');
 });
});
var swiper = new Swiper(".mySwipereviews", {
slidesPerView: 1, 
loop: true,
autoplay: true,
navigation: {
  nextEl: ".swiper-button-next",
  prevEl: ".swiper-button-prev",
},
});
var swiper = new Swiper(".mySwiperinstructor", {
slidesPerView: 1.4,
spaceBetween: 20,
autoplay: {
  delay: 5000,
  },
loop: true,
pagination: {
  el: ".swiper-pagination",
  clickable: true,
},
breakpoints: {
  768: {
    slidesPerView: 2,
    spaceBetween: 30,
  },
  992: {
    slidesPerView: 3,
    spaceBetween: 30,
  },
  1200: {
    slidesPerView: 4,
    spaceBetween: 30,
  },
},
});
var swiper = new Swiper(".mySwipercat", {
slidesPerView: 1.4,
spaceBetween: 20,
autoplay: true,
loop: true,
pagination: {
  el: ".swiper-pagination",
  clickable: true,
},
breakpoints: {
  575.98: {
    slidesPerView: 2,
    spaceBetween: 30,
  },
  991.98: {
    slidesPerView: 3,
    spaceBetween: 20,
  },
  1200: {
    slidesPerView: 4,
    spaceBetween: 20,
    loop: true,
  },
},
});
var swiper = new Swiper(".mySwipercat2", {
slidesPerView: 1.4,
spaceBetween: 20,
autoplay: true,
loop: true,
pagination: {
  el: ".swiper-pagination",
  clickable: true,
},
breakpoints: {
  575.98: {
    slidesPerView: 2,
    spaceBetween: 30,
  },
  767.98: {
    slidesPerView: 3,
    spaceBetween: 20,
  },
  991.98: {
    slidesPerView: 3,
    spaceBetween: 20,
    loop: true,
  },
},
});
$(document).ready(function() {
const navbarToggler = $('.navbar-toggler');
const site = $('.site-home, .page-home, .page-all, .site-other');
const body = $('html');
navbarToggler.on('click', function() {
  body.toggleClass('no-scroll');
  site.toggleClass('filter-style');
});
});
AOS.init();