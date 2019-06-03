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
                <li class="nav-item active">
                    <a class="nav-link" href="#">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Создать отчет</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Выставить счет</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Настройки</a>
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