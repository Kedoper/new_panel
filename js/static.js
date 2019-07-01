switch (page) {
    case "home":
        document.querySelector('.nav-item[data-hlink="0"]').classList.add("active");
        break;
    case "create-report":
        document.querySelector('.nav-item[data-hlink="1"]').classList.add("active");
        break;
    case "reports":
        document.querySelector('.nav-item[data-hlink="2"]').classList.add("active");
        break;
    case "create-invoice":
        document.querySelector('.nav-item[data-hlink="3"]').classList.add("active");
        break;
    case "settings":
        document.querySelector('.nav-item[data-hlink="4"]').classList.add("active");
        break;
}

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
