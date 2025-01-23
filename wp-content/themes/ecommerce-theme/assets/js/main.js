// document.addEventListener('DOMContentLoaded', function () {
//   const menuItems = document.querySelectorAll('.menu-item');
//   let currentPageButton = null;

//   const currentPath = window.location.pathname.replace('/', '');
//   menuItems.forEach(item => {
//       const target = item.dataset.target;

//       if (target === currentPath && item.dataset.type === 'page') {
//           item.classList.add('active');
//           currentPageButton = item;
//       }
//   });

//   menuItems.forEach(item => {
//       item.addEventListener('click', function () {
//           const actionType = this.dataset.type;
//           const target = this.dataset.target;

//           if (actionType === 'page') {
//               menuItems.forEach(el => el.classList.remove('active'));

//               this.classList.add('active');
//               currentPageButton = this;

//               console.log(`Đi tới trang: ${target}`);
//               window.location.href = `/${target}`;
//           } else if (actionType === 'popup') {
//               menuItems.forEach(el => el.classList.remove('active'));
//               this.classList.add('active');

//               console.log(`Hiển thị popup: ${target}`);
//               openPopup(target);
//           }
//       });
//   });

//   function openPopup(target) {
//       console.log(`Popup "${target}" đang được mở.`);
//       const popup = document.getElementById(target);
//       if (popup) {
//           popup.style.display = 'block';
//       }

//       popup.addEventListener('closePopup', function () {
//           console.log(`Popup "${target}" đã đóng.`);
//           menuItems.forEach(el => el.classList.remove('active'));
//           if (currentPageButton) currentPageButton.classList.add('active');
//       }, { once: true });
//   }

//   window.closePopup = function (popupId) {
//       const popup = document.getElementById(popupId);
//       if (popup) {
//           popup.style.display = 'none';
//           const event = new Event('closePopup');
//           popup.dispatchEvent(event);
//       }
//   };
// });

document.addEventListener("DOMContentLoaded", () => {
  const footerMobile = document.getElementById("footer-mobile");
  const btnShowFooterMobile = document.getElementById("btnShowFooterMenu");
  const headerOverlay = document.querySelector(".header-overlay");

  if (btnShowFooterMobile && footerMobile) {
    btnShowFooterMobile.addEventListener("click", () => {
      const isFooterVisible = footerMobile.style.display === "block";

      if (isFooterVisible) {
        footerMobile.style.display = "none";
        document.documentElement.classList.remove("no-scroll");
      } else {
        footerMobile.style.display = "block";
        document.documentElement.classList.add("no-scroll");
      }
    });
  } else {
    console.error(
      "Không tìm thấy phần tử #footer-mobile hoặc #btnShowFooterMobile"
    );
  }

  document
    .getElementById("menu-item-55238")
    .addEventListener("click", function (event) {
      event.preventDefault();
      updateCategoryBoxPosition();

      const section = document.getElementById("section-categories-header");

      if (section.style.display === "none" || section.style.display === "") {
        section.style.display = "block";
        headerOverlay.style.opacity = "1";
        headerOverlay.style.visibility = "visible";
      } else {
        section.style.display = "none";
        headerOverlay.style.opacity = "0";
        headerOverlay.style.visibility = "hidden";
      }
    });
});

function updateCategoryBoxPosition() {
  var btnPosition = document
    .getElementById("section-categories")
    .getBoundingClientRect();

  var categoryBox = document.getElementById("section-categories-header");
  categoryBox.style.left = btnPosition.left + "px";
  if (btnPosition.top > 0) {
    categoryBox.style.top = btnPosition.top + "px";
  } else {
    categoryBox.style.top = 142 + "px";
  }
}

function initTopCarousel() {
  jQuery("#slide-main").owlCarousel({
    items: 1,
    loop: true,
    autoplay: true,
    autoplayTimeout: 3000,
    nav: true,
    dots: false,
    onChanged: function (event) {
      var currentIndex = event.item.index - 3;
      if (currentIndex < 0) {
        currentIndex += event.item.count;
      }
      syncBottomItems(currentIndex);
    },
  });
}

function syncBottomItems(index) {
  jQuery(".bottom-items").find(".item").removeClass("active");

  jQuery(".bottom-items").find(".item").eq(index).addClass("active");
}
function initBottomItems() {
  jQuery(".bottom-items .item").on("click", function () {
    var index = jQuery(this).index();

    jQuery("#slide-main").trigger("to.owl.carousel", [index, 300]);

    syncBottomItems(index);
  });
}
jQuery(document).ready(function ($) {
  initTopCarousel();
  syncBottomItems(0);
  initBottomItems();
  $(".slide_product.owl-carousel.owl-theme").owlCarousel({
    loop: true,
    nav: true,
    // autoplay: true,
    // autoplayTimeout: 3000,
    responsive: {
      0: {
        items: 2,
      },
      576: {
        items: 3,
      },
      992: {
        items: 4,
      },
      1200: {
        items: 5,
      },
    },
  });
  $(".second-title").owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
    autoplay: true,
    autoplayTimeout: 3000,
    responsive: {
      0: {
        items: 1,
      },
      576: {
        items: 2,
      },
      768: {
        items: 3,
      },
      1200: {
        items: 3,
      },
    },
  });
  $(".section-partner").owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
    autoplay: true,
    autoplayTimeout: 3000,
    dót: false,
    responsive: {
      0: {
        items: 3,
      },
      576: {
        items: 5,
      },
      768: {
        items: 5,
      },
      1200: {
        items: 5,
      },
    },
  });
  $(".owl-carousel").owlCarousel({
    items: 4,
    margin: 10,
    loop: true,
    autoplay: true,
    autoplayTimeout: 3000,
    nav: true,
    dots: true,
  });
});
