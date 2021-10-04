//require('./bootstrap');

let nav_expanded = false;
const nav_button = document.getElementById("nav_button");
const nav_items = document.getElementById("nav_items");
const nav_sort_button = document.getElementById("sort_button");
if (nav_sort_button != null) {
    nav_sort_button.addEventListener("change", (e) => {
        const link_a =
            window.location.origin +
            (window.location.pathname == "/" ? "" : window.location.pathname);
        const link_b = link_a.replace("/starts", "").replace("/title", "");
        let link = `${link_b}/${e.target.value}`;
        console.log(link);
        window.open(link, "_self");
    });
}
if (nav_button != null) {
    nav_button.addEventListener("click", () => {
        switch_classes(nav_items, "max-h-0", "max-h-30");
    });
}

const event_cards = document.getElementsByClassName("evento");
console.log(event_cards.length);
for (let index = 0; index < event_cards.length; index++) {
    const event = event_cards[index];
    event.addEventListener("mouseenter", event_card_handler);
    event.addEventListener("mouseleave", event_card_handler);
}

function event_card_handler(e) {
    const top_elm = e.target.children[0];
    const bot_elm = e.target.children[1];
    if ((top_elm != null) & (bot_elm != null)) {
        switch_classes(top_elm, "opacity-0", "opacity-100");

        switch_classes(bot_elm, "blur", "blur-0");
        console.log("IN");
    }
}

function switch_classes(elm, class_one, class_two) {
    if (elm.classList.contains(class_one)) {
        elm.classList.remove(class_one);
        elm.classList.add(class_two);
    } else {
        elm.classList.remove(class_two);
        elm.classList.add(class_one);
    }
}
