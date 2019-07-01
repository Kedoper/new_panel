<form action="javascript:void(0)" id="vk_form" enctype="multipart/form-data">
    <input type="number" name="pubCounter" id="pubCounter" value="1" hidden="hidden">
    <label for="client_url">Ссылка на клиента (Любого вида)</label>
    <input type="text" name="client_url" id="client_url" placeholder="@domain или @id123" required>

    <div class="pub-row" id="CopyRow" data-pub="0">
        <label for="pubs0">Выберите сообщество</label>
        <select name="pubs0" id="pubs0" required></select>
        <input type="number" name="post_count0" id="post_count0" placeholder="Постов" min="1">
    </div>
    <span id="addPubRow"></span>
    <div class="pub-row">
        <button type="button" class="add-pub-row-btn" id="pubRowAdd" onclick="add()">Добавить</button>
    </div>
    <div class="test" id="ttt"></div>

    <div class="p_wrap">
        <div class="pub-row checkboxes">
            <label>Дополнительно</label>

            <input type="checkbox" id="isset_payup" name="isset_payup" data-active="false" data-target="pay_up">
            <label for="isset_payup">Была наценка</label>

            <input type="checkbox" id="isset_payoff" name="isset_payoff" data-active="false" data-target="pay_off">
            <label for="isset_payoff">Была скидка</label>
        </div>

        <div class="pub-row pay_up" id="pay_up_row">
            <label for="pay_up">Наценка (Целое число)</label>
            <input type="number" id="pay_up" name="pay_up" min="0" value="0" placeholder="<?= rand(1, 100) ?>">
        </div>
        <div class="pub-row pay_off" id="pay_off_row">
            <label for="pay_off">Скидка (Целое число)</label>
            <input type="number" id="pay_off" name="pay_off" min="0" value="0" placeholder="<?= rand(1, 100) ?>">
        </div>

        <label for="client_pay">Сколько заплатил клиент (Целое число)</label>
        <input type="number" id="client_pay" name="client_pay" required min="0" placeholder="<?= rand(1, 100) ?>">

        <label for="admin_send">Отправлено Администраторам</label>
        <input type="number" id="admin_send" name="admin_send" required min="0" step="any" placeholder="<?= rand(1, 100) ?>">

        <label for="commission">Коммисия</label>
        <input type="number" id="commission" name="commission" required min="0" step="any" placeholder="15.34">

        <label for="total">Заработок проекта</label>
        <input type="text" id="total" name="total" readonly>

        <label for="total_posts">Всего постов</label>
        <input type="number" id="total_posts" name="total_posts" readonly>

        <label for="feedback_count">Обозначь кол-во положительных на твоё имя отзывов за сегодня (если будет ещё отзыв,
            то
            впиши его уже не считая предыдущие)</label>
        <input type="number" id="feedback_count" name="feedback_count" min="0" placeholder="1">

        <label for="operation_comment">Примечание к заказу</label>
        <input type="text" id="operation_comment" name="operation_comment" placeholder="Замена поста">

        <label for="photos">Cкриншот(ы) оплаты администратору(ам)</label>
        <input type="file" id="photos" name="photos[]" multiple required>
    </div>

    <button type="submit" class="submit-btn" id="senderButtonVK">Отправить</button>
</form>
<script src="/js/create-report_vk.js?<?= rand(999999, null) ?>"></script>
