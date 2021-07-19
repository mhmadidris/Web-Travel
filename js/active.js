var btnContainer = document.getElementById("desc-nav");

// Get all buttons with class="btn" inside the container
var btns = btnContainer.getElementsByClassName("tombol");

// Loop through the buttons and add the active class to the current/clicked button
for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function() {
        var current = document.getElementsByClassName("aktif");
        current[0].className = current[0].className.replace(" aktif", "");
        this.className += " aktif";
    });
};
var btnContainer = document.getElementById("tagihan-nav");

// Get all buttons with class="btn" inside the container
var btns = btnContainer.getElementsByClassName("tomboll");

// Loop through the buttons and add the active class to the current/clicked button
for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function() {
        var current = document.getElementsByClassName("aktiff");
        current[0].className = current[0].className.replace(" aktiff", "");
        this.className += " aktiff";
    });
};
var btnContainer = document.getElementById("pembayaran-navbar");

// Get all buttons with class="btn" inside the container
var btns = btnContainer.getElementsByClassName("tombol-nav");

// Loop through the buttons and add the active class to the current/clicked button
for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function() {
        var current = document.getElementsByClassName("aktifff");
        current[0].className = current[0].className.replace(" aktifff", "");
        this.className += " aktifff";
    });
};