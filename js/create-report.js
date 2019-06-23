totalPubs = 0;
pubs = {};

function pageLoader(page) {
    $.ajax({
        url: `/pages/reports-block/${page}`,
        success: function (data) {
            $("#report_content").html(data)
        },
        error: function () {
            $("#report_content").html(`
                <div class="warn-message">
                <div class="warn-message__icon">
                    <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="exclamation-triangle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="warning-icon__big"><path fill="currentColor" d="M270.2 160h35.5c3.4 0 6.1 2.8 6 6.2l-7.5 196c-.1 3.2-2.8 5.8-6 5.8h-20.5c-3.2 0-5.9-2.5-6-5.8l-7.5-196c-.1-3.4 2.6-6.2 6-6.2zM288 388c-15.5 0-28 12.5-28 28s12.5 28 28 28 28-12.5 28-28-12.5-28-28-28zm281.5 52L329.6 24c-18.4-32-64.7-32-83.2 0L6.5 440c-18.4 31.9 4.6 72 41.6 72H528c36.8 0 60-40 41.5-72zM528 480H48c-12.3 0-20-13.3-13.9-24l240-416c6.1-10.6 21.6-10.7 27.7 0l240 416c6.2 10.6-1.5 24-13.8 24z" class=""></path></svg>
                </div>
                <div class="warn-message__text">
                    <p>При загрузке возникли проблемы, попробуйте позже</p>
                </div>
            </div>
            `)
        }
    });
}

function pubsLoader() {
    $.ajax({
        url: `/engine/handlers/loaders/loadPubsList.php`,
        success: function (data) {
           data = JSON.parse(data);
           data.forEach(function (item) {
               pubs[item.id] = item.title;
           });
        },
        error: function () {
            $('#message_slider__header').html("Ошибка");
            $('#message_slider__text').html("Возникла ошибка при загрузке данных с сервера, потворите попытку позже");
            openMessageSlider();
        }
    });
}

$(document).ready(function () {
    pageLoader('vk');
    pubsLoader();
});

