focus = false;

function togglePayUp_PayOff() {
    var active = this.dataset.active,
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


window.onfocus = function(){ focus = true; } //пользователь на вкладке сайте
window.onblur = function(){ focus = false; }
setInterval(function () {
    if (focus) {
        var pubs_post = $('input[name*="post_count"]'),
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

        var pre_total = (client_pay_now - (admin_send_now + commission_now)).toFixed(2);

        $("#total").val(pre_total);
        $("#total_posts").val(total_posts);
    }

}, 2000);


function add() {
    totalPubs = totalPubs + 1;
    var line = `
        <div class="pub-row" data-pub="${totalPubs}">
        <label for="pubs${totalPubs}">Выберите сообщество</label>
        <select name="pubs${totalPubs}" id="pubs${totalPubs}">
            <option value="test1">test1</option>
            <option value="test2">test2</option>
            <option value="test3">test3</option>
            <option value="test4">tetesttesttesttesttestst</option>
            <option value="test5">tetesttesttesttesttesttesttesttestst</option>
            <option value="test6">test4</option>
            <option value="test7">testtesttesttesttesttesttesttesttesttesttesttest</option>
            <option value="test8">test5</option>
            <option value="test9">test6</option>
            <option value="test10">test7</option>
        </select>
        <input type="number" name="post_count${totalPubs}" id="post_count${totalPubs}" placeholder="Постов" min="1">
    </div>
    `;

    $("#ttt").append(line);
}
// TODO Сделать загузку файлов на сервер
function sendReport() {

    var pubs = $('select[name*="pubs"]'),
        pubs_post = $('input[name*="post_count"]'),
        pre_pubs = [],
        pre_posts = [],
        pubs_values = [];

    pubs.each(function () {
        if ($(this).val() !== undefined) {
            pre_pubs.push($(this).val());
        }
    });
    pubs_post.each(function () {
        if ($(this).val() !== undefined) {
            pre_posts.push($(this).val());
        }
    });
    for (var key in pre_pubs) {
        pubs_values.push({'pub': pre_pubs[key], 'posts': pre_posts[key]});
    }
    console.log(pubs_values);


    var sendData = {
        cart: pubs_values,
        client: $("#client_url").val(),
        pay_up: $("#pay_up").val(),
        pay_off: $("#pay_off").val(),
        client_pay: $("#client_pay").val(),
        admin_send: $("#admin_send").val(),
        commission: $("#commission").val(),
        total: $("#total").val(),
        total_posts: $("#total_posts").val(),
        feedback_count: $("#feedback_count").val(),
        comment: $("#operation_comment").val(),
    };
    $.ajax({
        type: "POST",
        data: sendData,
        url: "/report-test.php",
        success: function () {
            console.warn("success");
        }
    })
}


document.getElementById('isset_payup').addEventListener("change", togglePayUp_PayOff);
document.getElementById('isset_payoff').addEventListener("change", togglePayUp_PayOff);