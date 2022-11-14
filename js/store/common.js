// import {
//     initializeApp
// } from "https://www.gstatic.com/firebasejs/9.13.0/firebase-app.js";

// import { getAuth } from "https://www.gstatic.com/firebasejs/9.13.0/firebase-auth.js";
// // TODO: Add SDKs for Firebase products that you want to use
// // https://firebase.google.com/docs/web/setup#available-libraries

// // Your web app's Firebase configuration
// const firebaseConfig = {
//     apiKey: "AIzaSyA-x0OO0H8oSlzmAOBrvif1NS6f9ihObKc",
//     authDomain: "tn-store-45be0.firebaseapp.com",
//     projectId: "tn-store-45be0",
//     storageBucket: "tn-store-45be0.appspot.com",
//     messagingSenderId: "140748362487",
//     appId: "1:140748362487:web:b0bb0293e53b3d4530f9f2"
// };

// // Initialize Firebase
// const app = initializeApp(firebaseConfig);
// const auth = getAuth(app)


$(document).ready(function () {
    $("#sign-up").click(function (e) {
        e.preventDefault();
        email = $("#email").val()
        password = $("#password").val()
    })

    // active menu navbar
    const activePage = window.location.pathname;
    $(".menu_nav .nav-item .nav-link").each(function () {
        if (activePage.includes($(this).attr("href"))) {
            $(".menu_nav .nav-item.active").removeClass("active")
            $(this).parent().addClass("active")
        }
    })

    $(".navbar-right .nav-item a").each(function () {
        if (activePage.includes($(this).attr("href"))) {
            $(".menu_nav .nav-item.active").removeClass("active")
        }
    })

    $(".add-to-cart").click(function () {
        cartQty = parseInt($(".cart-qty").text())
        cartQty++;
        $(".cart-qty").text(cartQty)
    })

})