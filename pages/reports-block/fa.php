<form action="javascript:void(0)" id="fa_form" enctype="multipart/form-data">
    <label for="place">Площадка</label>
    <select name="place" id="place">
        <option value="fa" selected>FA</option>
    </select>

    <label for="tariff">Тариф</label>
    <select name="tariff" id="tariff">
        <option value="paypal" selected>Only PayPal</option>
        <option value="reminder">Reminder +</option>
        <option value="all_inclusive">All inclusive</option>
    </select>

    <label for="our_email">Наш эмейл, куда пришла оплата(при 3м тарифе)</label>
    <input type="email" name="our_email" id="our_email" placeholder="chto-blyat@whiteprice.die">

    <label for="worker_url_vk">Оставьте ссылку на ВК пикчера (Домен или id)</label>
    <input type="text" name="worker_url_vk" id="worker_url_vk" placeholder="@domain или @id123" required pattern="@[A-Za-z0-9_]+$">

    <label for="worker_url_fa">Оставьте ссылку на FA пикчера</label>
    <input type="text" name="worker_url_fa" id="worker_url_fa" required >

    <label for="client_email">E-mail клиента PayPal</label>
    <input type="email" name="client_email" id="client_email" placeholder="chto-blyat@whiteprice.live">

    <label for="course">Введите курс $ к рублю с PayPal в данный момент</label>
    <input type="number" name="course" id="course" required placeholder="34">

    <label for="our_percents">Наши проценты</label>
    <input type="number" name="our_percents" id="our_percents" required placeholder="15">

    <label for="client_amount">Сумма клиента $</label>
    <input type="number" name="client_amount" id="client_amount" required placeholder="430">

    <label for="rub_amount">Итого в рублях</label>
    <input type="number" name="rub_amount" id="rub_amount" readonly>

    <label for="worker_pay">Заработок пикчеру</label>
    <input type="number" name="worker_pay" id="worker_pay" required placeholder="50">

    <label for="total_amount">Заработок проекта</label>
    <input type="text" name="total_amount" id="total_amount" readonly>

    <label for="refer_urls">Ссылки на референсы (через запятую)</label>
    <input type="text" name="refer_urls" id="refer_urls" required>

    <label for="operation_comment">Примечание к операции</label>
    <input type="text" id="operation_comment" name="operation_comment" placeholder="Nani???">

    <label for="photos">Скриншоты какие-нибудь</label>
    <input type="file" id="photos" name="photos[]" multiple required>

    <button type="submit" class="submit-btn" id="senderButtonFA">Отправить</button>

</form>
<script src="/js/create-report_fa.js?<?= rand(999999, null) ?>"></script>