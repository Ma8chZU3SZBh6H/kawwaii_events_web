//require('./bootstrap');

let nav_expanded = false;
const nav_button = document.getElementById("nav_button");
const nav_items = document.getElementById("nav_items");
//max-h-0
nav_button.addEventListener("click", () => {
    if (nav_expanded) {
        nav_items.classList.remove("max-h-0");
        nav_items.classList.add("max-h-20");
        nav_expanded = false;
    } else {
        nav_items.classList.remove("max-h-20");
        nav_items.classList.add("max-h-0");

        nav_expanded = true;
    }
});
