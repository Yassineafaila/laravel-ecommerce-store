import "./bootstrap";

// resources/js/app.js

import Swiper from "swiper";

// Initialize Swiper
const swiper = new Swiper(".swiper-container", {
    // Optional parameters
    loop: true,
    slidesPerView: 1,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});
