$('#fa_form').on("submit",function () {
    $('#message_slider__header').html("Ожидание");
    $('#message_slider__text').html("Идет создание отчета, не закрывайте данную страницу");
    openMessageSlider();
    $.ajax({
        type: "POST",
        data: new FormData(document.getElementById('fa_form')),
        url: "/engine/handlers/actions/createReport_FA.php",
        contentType: false, // важно - убираем форматирование данных по умолчанию
        processData: false, // важно - убираем преобразование строк по умолчанию
        success: function (data) {
            data = JSON.parse(data);
            if (data.code !== 0) {
                $('#senderButtonVK').attr('hidden', 'hidden');
                $('#message_slider__header').html("Успех!");
                $('#message_slider__text').html(data.message + "\nПерезагрузка через 5 секунд");
                // setTimeout(function () {
                //     location.reload();
                // }, 5000);

            } else {
                $('#message_slider__header').html("Есть проблемы");
                $('#message_slider__text').html(data.message);
            }
        }
    })
});

window.onfocus = function () {
    focus = true;
};
window.onblur = function () {
    focus = false;
};
setInterval(function () {
    if (focus) {
        let course = parseInt($('#course').val()),
            client_amount =  parseInt($('#client_amount').val()),
            worker_pay = parseInt($("#worker_pay").val()),
            course_to_rub = client_amount * course,
            to_price = course_to_rub - worker_pay;

            $("#rub_amount").val(course_to_rub);
            $("#total_amount").val(to_price);
    }

}, 1000);