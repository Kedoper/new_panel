<?php
$roles = [
    'admin',
    'server',
];
if (!empty($_SESSION['login_token'])) {
    $update_session = R::load('users', $_SESSION['logged_user']['id']);
    $_SESSION['logged_user'] = $update_session;
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
                <?
                if (in_array($_SESSION['logged_user']['level'], $roles)) {
                    ?>
                    <li class="nav-item" data-hlink="2">
                        <a class="nav-link" href="/?reports">Отчеты</a>
                    </li>
                    <li class="nav-item" data-hlink="3">
                        <a class="nav-link" href="/?users">Пользователи</a>
                    </li>
                    <?
                }
                ?>
                <li class="nav-item" data-hlink="4">
                    <a class="nav-link disabled" href="/?create-invoice">Выставить счет</a>
                </li>
                <li class="nav-item" data-hlink="5">
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
</script>
<script src="/js/static.js?<?=rand()?>"></script>
