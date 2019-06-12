var hash = document.location.hash;
if (hash === "#login") {
    $("#error_msg").addClass("error-message__hide");
    $("#form_reg")[0].reset();
    $('[data-action=reg]').removeClass("active");
    $('[data-action=login]').addClass('active');
    $('.toLogin').removeClass("hide");
    $('.toRegister').addClass("hide");
} else if (hash === "#register") {
    $('[data-action=login]').removeClass("active");
    $('[data-action=reg]').addClass('active');
    $('.toLogin').addClass("hide");
    $('.toRegister').removeClass("hide");
}
$(".acton").on("click", function () {
    var sender = $(this).children()[0];
    if ($(sender).data('action') === "reg") {
        $("#error_msg").addClass("error-message__hide");
        $('[data-action=login]').removeClass("active");
        $('[data-action=reg]').addClass('active');
        $('.toLogin').addClass("hide");
        $('.toRegister').removeClass("hide");
    } else {
        $("#error_msg").addClass("error-message__hide");
        $("#form_reg")[0].reset();
        $('[data-action=reg]').removeClass("active");
        $('[data-action=login]').addClass('active');
        $('.toLogin').removeClass("hide");
        $('.toRegister').addClass("hide");
    }
});

function convert(UNIX) {

    // Unixtimestamp
    var unixtimestamp = UNIX;

    // Months array
    var months_arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];

    // Convert timestamp to milliseconds
    var date = new Date(unixtimestamp * 1000);

    // Year
    var year = date.getFullYear();

    // Month
    var month = months_arr[date.getMonth()];

    // Day
    var day = date.getDate();

    // Hours
    var hours = date.getHours();

    // Minutes
    var minutes = "0" + date.getMinutes();

    // Seconds
    var seconds = "0" + date.getSeconds();

    // Display date time in MM-dd-yyyy h:m:s format
    var convdataTime = month + '-' + day + '-' + year + ' ' + hours + ':' + minutes.substr(-2) + ':' + seconds.substr(-2);

    return convdataTime;

}

$("#new-pass,#re-pass").on("keyup", function () {

    var pass1 = $("#new-pass").val(),
        pass2 = $("#re-pass").val();
    if (pass1 !== pass2) {
        $('.error-message__text').html("Пароли не совпадают");
        $("#error_msg").removeClass("error-message__hide");
    } else {
        $("#error_msg").addClass("error-message__hide");
        setTimeout(function () {
            $('.error-message__text').html("");
        }, 500);
    }
});
$("#form_reg").on("submit", function () {
    var registeredLogin = $("#new-login").val(),
        registeredPassord = $("#new-pass").val(),
        registeredRePassord = $("#re-pass").val(),
        new_email = $("#new-email").val(),
        new_phone = $("#new-telephone").val(),
        level = $("#level").val();
    $.ajax({
        url: "/engine/handlers/actions/register.php",
        type: "POST",
        data: {
            "reg_login": registeredLogin,
            "reg_password": registeredPassord,
            "reg_email": new_email,
            "reg_telephone": new_phone,
            "reg_level": level
        },
        success: function (data) {
            var data = JSON.parse(data);
            alert(data.message);
        }
    });
});
$("#form_login").on("submit", function () {
    var login = $("#u-login").val(),
        pass = $("#u-pass").val();
    $.ajax({
        url: "/engine/handlers/actions/login.php",
        type: "POST",
        data: {
            u_login: login,
            u_password: pass
        },
        success: function (data) {
            var data = JSON.parse(data);
            if (data.code === 2) {
                $(".error-message__text").html(`${data.message}, вход будет доступен с <br><b>` + convert(data.time) + `</b>`);
                $("#error_msg").removeClass("error-message__hide");

            } else if (data.code === 0) {
                window.location.href = "/?home";
            } else {
                $(".error-message__text").html(``);
                $(".error-message__text").html(`${data.message}`);
                $("#error_msg").removeClass("error-message__hide");
            }
        }
    });
});