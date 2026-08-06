jQuery(document).ready(function ($) {
  $(document).on("scroll", onScroll);

  Fancybox.bind("[data-fancybox]", {
    // Your custom options
  });

  var $header = $(".site_header");
  var $navToggle = $("#nav_toggle");
  var $navBackdrop = $("#nav_backdrop");

  // ── Mobile nav panel ──────────────────────────────────────
  function setNav(open) {
    $header.toggleClass("nav_open", open);
    $navToggle
      .attr("aria-expanded", open ? "true" : "false")
      .attr("aria-label", open ? "Close menu" : "Open menu");
    $("body").toggleClass("nav_locked", open);
  }

  function navIsOpen() {
    return $header.hasClass("nav_open");
  }

  $navToggle.on("click", function (e) {
    e.preventDefault();
    setNav(!navIsOpen());
  });

  $navBackdrop.on("click", function () {
    setNav(false);
  });

  // close on link tap so in-page anchors don't leave the panel covering them
  $(".main_nav_list a").on("click", function () {
    setNav(false);
  });

  $(document).on("keydown", function (e) {
    if (e.key === "Escape" && navIsOpen()) {
      setNav(false);
      $navToggle.trigger("focus");
    }
  });

  // the panel only exists below 1200px — drop it if we grow past that
  var navMq = window.matchMedia("(min-width: 1200px)");
  var onNavMq = function (e) {
    if (e.matches) setNav(false);
  };
  if (navMq.addEventListener) {
    navMq.addEventListener("change", onNavMq);
  } else {
    navMq.addListener(onNavMq);
  }

  // ── Hide header on scroll down, reveal on scroll up ───────
  var didScroll;
  var lastScrollTop = 0;
  var delta = 5;
  var navbarHeight = $header.outerHeight();

  $(window).scroll(function (event) {
    didScroll = true;
  });

  setInterval(function () {
    if (didScroll) {
      hasScrolled();
      didScroll = false;
    }
  }, 250);

  function hasScrolled() {
    var st = $(window).scrollTop();

    // Make sure they scroll more than delta
    if (Math.abs(lastScrollTop - st) <= delta) return;

    // Never slide the header out from under an open menu panel
    if (navIsOpen()) {
      lastScrollTop = st;
      return;
    }

    if (st > lastScrollTop && st > navbarHeight) {
      // Scroll Down
      $header.removeClass("header_down").addClass("header_up");
    } else {
      // Scroll Up
      if (st + $(window).height() < $(document).height()) {
        $header.removeClass("header_up").addClass("header_down");
      }
    }

    if (st === 0) {
      $header.removeClass("header_down");
    }

    lastScrollTop = st;
  }

  // blank click function for ios
  $("a, .btn_outline, .btn_fill").click(function () {});

  if ($(".scroll_sec").length) {
    var fixmeTop = $(".scroll_sec").offset().top;
    $(window).scroll(function () {
      var currentScroll = $(window).scrollTop();
      if (currentScroll >= fixmeTop) {
        $(".scroll_sec").addClass("scroll_fixed");

        if ($("header").hasClass("header_down")) {
          // console.log('log scroll');
          $(".scroll_sec").addClass("move_down");
        } else {
          $(".scroll_sec").removeClass("move_down");
        }
      } else {
        $(".scroll_sec").removeClass("scroll_fixed");
        $(".scroll_sec").removeClass("move_down");
      }
    });
  }

  // footer accordion
  if ($(window).width() < 575) {
    $(document).on("click", ".footer_single > h5", function () {
      $(this).toggleClass("active");
      $(this).next().slideToggle();
    });

    var $linkDown = $(".scroll_menu_btn i");
    var $linksDropDown = $(".product_scroll_links ul");

    // guarded: these only exist on product pages
    if ($linksDropDown.length) {
      $linkDown.click(function (e) {
        e.preventDefault();
        $linksDropDown.slideToggle();
      });

      $(window).click(function (e) {
        if (
          !$linksDropDown.get(0).contains(e.target) &&
          e.target !== $linkDown.get(0)
        )
          $linksDropDown.slideUp();
      });

      $(".product_scroll_links li").on("click", function () {
        $(this).parent().slideUp();
      });
    }
  }

  if ($(".more_specs_btn").length) {
    $(".more_specs_btn").on("click", function (e) {
      e.preventDefault();

      $(this).parent().prev().slideToggle();

      $(".more_specs_btn span").text(
        $(".more_specs_btn span").text() == "View Less"
          ? "View More"
          : "View Less"
      );
    });
  }

  if ($(".close_widget").length) {
    $(".close_widget").on("click", function (e) {
      e.preventDefault();

      $(this).next().slideToggle();
      $(this).toggleClass("active");
    });
  }

  AOS.init({
    duration: 1200,
    offset: 300,
    once: true,
  });
});

// viewport function
function viewport() {
  var e = window,
    a = "inner";

  if (!("innerWidth" in window)) {
    a = "client";
    e = document.documentElement || document.body;
  }

  return { width: e[a + "Width"], height: e[a + "Height"] };
}

function onScroll(event) {
  var scrollPos = $(document).scrollTop();
  $(".product_scroll_links a").each(function () {
    var currLink = $(this);
    var refElement = $(currLink.attr("href"));
    if (
      refElement.position().top <= scrollPos &&
      refElement.position().top + refElement.height() > scrollPos
    ) {
      $(".product_scroll_links ul li").removeClass("current");
      currLink.parent().addClass("current");
      $(".product_scroll_links .intro_prd").text(currLink.text()); //set text
    } else {
      currLink.parent().removeClass("current");
      // currLink.removeClass("current");
    }
  });
}
