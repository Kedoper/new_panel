<?php
if (!empty($_SESSION['login_token'])) {
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item" data-hlink="0">
                    <a class="nav-link" href="/?home">Главная</a>
                </li>
                <li class="nav-item" data-hlink="1">
                    <a class="nav-link" href="/?create-report">Создать отчет</a>
                </li>
                <li class="nav-item" data-hlink="2">
                    <a class="nav-link disabled" href="/?create-invoice">Выставить счет</a>
                </li>
                <li class="nav-item" data-hlink="3">
                    <a class="nav-link " href="/?settings">Настройки</a>
                </li>
            </ul>
        </div>
    </nav>
    <?
} else {
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"></a>
        <ul class="navbar-nav">
            <li class="nav-item acton">
                <a class="nav-link active" href="#login" data-action="login">Вход</a>
            </li>
            <li class="nav-item acton">
                <a class="nav-link" href="#register" data-action="reg">Регистрация</a>
            </li>
        </ul>
    </nav>
    <?
}
?>
<script !src="">
    var page = `<?=$page[0]?>`;
    switch (page) {
        case "home":
            document.querySelector('.nav-item[data-hlink="0"]').classList.add("active");
            break;
        case "create-report":
            document.querySelector('.nav-item[data-hlink="1"]').classList.add("active");
            break;
        case "create-invoice":
            document.querySelector('.nav-item[data-hlink="2"]').classList.add("active");
            break;
        case "settings":
            document.querySelector('.nav-item[data-hlink="3"]').classList.add("active");
            break;
    }
</script>
