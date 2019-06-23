function openMessageSlider() {
    $('#message_slider').toggleClass('show');
    $('.container-fluid, .container, .navbar').toggleClass('click-to-hide');
    document.addEventListener("click", closeMessageSlider);
}

function closeMessageSlider(e) {
    const targetClass = e.target.classList,
        needleClass = "ms-item";

    if (!targetClass.contains(needleClass)) {
        openMessageSlider();
        document.removeEventListener('click',closeMessageSlider);
    }
}