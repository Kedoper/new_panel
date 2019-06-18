<form action="javascript:void(0)">
    <label for="client_url">Домен или id клиента</label>
    <input type="text" name="client_url" id="client_url" placeholder="@domain или @id123" required
           pattern="@[A-Za-z0-9_]+$">

    <div class="pub-row" id="CopyRow" data-pub="0">
        <label for="pubs">Выберите сообщество</label>
        <select name="pubs" id="pubs">
            <option value="test">test</option>
            <option value="test">test</option>
            <option value="test">test</option>
            <option value="test">tetesttesttesttesttestst</option>
            <option value="test">tetesttesttesttesttesttesttesttestst</option>
            <option value="test">test</option>
            <option value="test">testtesttesttesttesttesttesttesttesttesttesttest</option>
            <option value="test">test</option>
            <option value="test">test</option>
            <option value="test">test</option>
        </select>
        <input type="number" name="pubs_count" id="pubs_count" placeholder="Постов" min="1">
    </div>
    <span id="addPubRow"></span>
    <div class="pub-row">
        <button type="button" id="pubRowAdd" onclick="add()">Добавить</button>
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
            <input type="number" id="pay_up" name="pay_up" required min="0" placeholder="<?= rand(1, 100) ?>">
        </div>
        <div class="pub-row pay_off" id="pay_off_row">
            <label for="pay_off">Скидка (Целое число)</label>
            <input type="number" id="pay_off" name="pay_off" required min="0" placeholder="<?= rand(1, 100) ?>">
        </div>

        <label for="client_pay">Сколько заплатил клиент (Целое число)</label>
        <input type="number" id="client_pay" name="client_pay" required min="0" placeholder="<?= rand(1, 100) ?>">

        <label for="admin_send">Отправлено Администраторам (Целое число)</label>
        <input type="number" id="admin_send" name="admin_send" required min="0" placeholder="<?= rand(1, 100) ?>">

        <label for="commission">Коммисия</label>
        <input type="number" id="commission" name="commission" required min="0" placeholder="15.34">

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

    <button type="submit">sdaf</button>
</form>

<script !src="">
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

    function AddPubRow() {

    }

    document.getElementById('isset_payup').addEventListener("change", togglePayUp_PayOff);
    document.getElementById('isset_payoff').addEventListener("change", togglePayUp_PayOff);
    document.getElementById('pubRowAdd').addEventListener("click", AddPubRow);

</script>