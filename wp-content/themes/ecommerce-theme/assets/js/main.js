document.addEventListener("DOMContentLoaded", () => {

    const footerMobile = document.getElementById("footer-mobile");
    const btnShowFooterMobile = document.getElementById("btnShowFooterMenu");
    const headerOverlay = document.querySelector(".header-overlay");
    const btnShowCategories = document.getElementById("btnShowMenuCategories");
    const sectionCategories = document.getElementById("categories-mobile");

    if (btnShowFooterMobile && footerMobile && btnShowCategories && sectionCategories) {
        btnShowFooterMobile.addEventListener("click", () => {
            const isFooterVisible = footerMobile.style.display === "block";
            const isCategoriesVisible = sectionCategories.style.display === "block";

            if (isFooterVisible) {
                footerMobile.style.display = "none";
                document.documentElement.classList.remove("no-scroll");
            } else {
                footerMobile.style.display = "block";
                sectionCategories.style.display = "none";
                document.documentElement.classList.add("no-scroll");
            }
        });

        btnShowCategories.addEventListener("click", () => {
            const isCategoriesVisible = sectionCategories.style.display === "block";
            const isFooterVisible = footerMobile.style.display === "block";

            if (isCategoriesVisible) {
                sectionCategories.style.display = "none";
                document.documentElement.classList.remove("no-scroll");
            } else {
                sectionCategories.style.display = "block";
                footerMobile.style.display = "none";
                document.documentElement.classList.add("no-scroll");
            }
        });
    } else {
        console.error("Không tìm thấy phần tử #footer-mobile hoặc #btnShowFooterMobile hoặc #btnShowMenuCategories hoặc #categories-mobile");
    }

    document.querySelectorAll(".menu-item__mobile").forEach(item => {
        item.addEventListener("click", () => {
            const type = item.getAttribute("data-type");

            if (type === "page") {
                document.querySelectorAll(".menu-item__mobile").forEach(el => el.classList.remove("active"));
                item.classList.add("active");
                document.body.setAttribute("data-active-page", item.getAttribute("data-target"));
            } else if (type === "popup") {
                if (item.classList.contains("active")) {
                    item.classList.remove("active");
                    const activePage = document.body.getAttribute("data-active-page");
                    if (activePage) {
                        const activePageButton = document.querySelector(`[data-type="page"][data-target="${activePage}"]`);
                        if (activePageButton) {
                            activePageButton.classList.add("active");
                        }
                    }
                } else {
                    document.querySelectorAll(".menu-item__mobile").forEach(el => el.classList.remove("active"));
                    item.classList.add("active");
                }
            }
        });
    });


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

    const menuItems = document.querySelectorAll('.menu-mobile li');
    const contentItems = document.querySelectorAll('.content-item');

    menuItems.forEach(item => {
        item.addEventListener('click', () => {
            menuItems.forEach(i => i.classList.remove('active'));
            item.classList.add('active');

            contentItems.forEach(content => content.classList.remove('active'));
            const targetId = item.getAttribute('data-target');
            document.getElementById(targetId).classList.add('active');
        });
    });
});

function updateCategoryBoxPosition() {
    var btnPosition = document
        .getElementById("section-categories")

    var categoryBox = document.getElementById("section-categories-header");
    if (btnPosition) {
        categoryBox.style.left = btnPosition.getBoundingClientRect().left + "px";
        if (btnPosition.top > 0) {
            categoryBox.style.top = btnPosition.getBoundingClientRect().top + "px";
        } else {
            categoryBox.style.top = 142 + "px";
        }
    } else {
        categoryBox.style.left = 50 + "px";
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
