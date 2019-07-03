
$("#googleCode").on('keyup',function () {
    let length = $(this).val().length;
    if (length !== 6) {
        $("#submitButton").attr('disabled','disabled');
    } else {
        $("#submitButton").attr('disabled',null);
    }
});
$("#submitButton").on('click',function () {
    $("#message_slider__header").html('Подождите');
    $("#message_slider__text").html('Идет проверка кода, подождите');
    openMessageSlider();
    let req = new XMLHttpRequest(),
        code = $("#googleCode").val();

    req.open('POST','/engine/security/googleCheck.php',true);
    req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    req.send(`code=${code}&target=${target_id}&user=${user}`);
    req.onreadystatechange = function () {
        if (req.readyState === 4 && req.status === 200) {
            setTimeout(function () {
                responseHandler(JSON.parse(req.responseText));
            },500);

        }
    }
});
function responseHandler(json) {
    if (json.code === 0) {
        $("#message_slider__header").html('Успешно');
        $("#message_slider__text").html('Удаление прошло успешно, вы покините эту страницу через 5 секунд');
    } else {
        $("#message_slider__header").html('Ошибка');
        $("#message_slider__text").html(`При проверке возникла ошибка,<br> повторите позже`);
    }
}