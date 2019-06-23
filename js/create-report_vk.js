document.getElementById('isset_payup').addEventListener("change", togglePayUp_PayOff);
document.getElementById('isset_payoff').addEventListener("change", togglePayUp_PayOff);

focus = false;

function togglePayUp_PayOff() {
    let active = this.dataset.active,
        target = this.dataset.target;

    if (active !== 'true') {
        this.dataset.active = 'true';
        document.getElementById(`${target}_row`).style.display = 'block';
    } else {
        this.dataset.active = 'false';
        document.getElementById(`${target}_row`).style.display = 'none';
    }
}

$('.custom-list__item').on('click', function () {
    $('.custom-list__item.select').removeClass("select");
    pageLoader($(this).data('place'));
    $(this).addClass('select');
});
$('#vk_form').on('submit', sendReport);

window.onfocus = function () {
    focus = true;
} //пользователь на вкладке сайте
window.onblur = function () {
    focus = false;
}
setInterval(function () {
    if (focus) {
        let pubs_post = $('input[name*="post_count"]'),
            total_posts = 0,

            // Значения полей
            client_pay_now = parseInt($('#client_pay').val()),
            admin_send_now = parseInt($('#admin_send').val()),
            commission_now = parseFloat($('#commission').val());

        pubs_post.each(function () {
            if ($(this).val() !== undefined) {
                total_posts += parseInt($(this).val());
            }

            $("#total_posts").val(total_posts);
        });

        let pre_total = (client_pay_now - (admin_send_now + commission_now)).toFixed(2);

        $("#total").val(pre_total);
        $("#total_posts").val(total_posts);
    }

}, 1000);


function addOptions(id) {
    for (let key in pubs) {
        $(`#${id}`).append($('<option></option>').attr('value', key).text(pubs[key]))
    }
}

function add() {
    totalPubs = totalPubs + 1;
    $("#pubCounter").val(parseInt($("#pubCounter").val()) + 1);
    let line = `
        <div class="pub-row" data-pub="${totalPubs}">
        <label for="pubs${totalPubs}">Выберите сообщество</label>
        <select name="pubs${totalPubs}" id="pubs${totalPubs}"></select>
        <input type="number" name="post_count${totalPubs}" id="post_count${totalPubs}" placeholder="Постов" min="1">
    </div>
    `;
    $("#ttt").append(line);
    let added = $(line).children()[1];
    let added_id = $(added).attr('id');
    addOptions(added_id);

}

function sendReport() {
    $('#message_slider__header').html("Ожидание");
    $('#message_slider__text').html("Идет создание отчета, не закрывайте данную страницу");
    openMessageSlider();
    $.ajax({
        type: "POST",
        data: new FormData(document.getElementById('vk_form')),
        url: "/engine/handlers/actions/createReport_VK.php",
        contentType: false, // важно - убираем форматирование данных по умолчанию
        processData: false, // важно - убираем преобразование строк по умолчанию
        success: function (data) {
            data = JSON.parse(data);
            if (data.code !== 0) {
                $('#senderButtonVK').attr('hidden', 'hidden');
                $('#message_slider__header').html("Успех!");
                $('#message_slider__text').html(data.message + "\nПерезагрузка через 5 секунд");
                setTimeout(function () {
                    location.reload();
                }, 5000);

            } else {
                $('#message_slider__header').html("Есть проблемы");
                $('#message_slider__text').html(data.message);
            }
        }
    })
}

$(document).ready(function () {
    setTimeout(function () {
        addOptions('pubs0')
    }, 500);
});
