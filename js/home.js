

function work_search(work) {
    if (works_array.hasOwnProperty(work)) {
        return works_array[work]
    }
}

subs = [];
reach = [];
week_stat = [];
male = [];
female = [];
price = [];
labels = [];

function preRenderReportCart(place, id, date, price) {
    let block = `<div class="report-card ${place}" data-repid="${id}">
                <div class="report-card__data">
                    <span>${date}</span>
                </div>
                <div class="report-card__price">
                    <span>${price} руб.</span>
                </div>
                <div class="report-card__buttons">
                    <button type="button" onclick="openFullReport('${place}',${id})">Подробнее</button>
                </div>
            </div>`;
    return block;
}

function preRenderNewsCard(id, time, title, text) {
    let block = `
    <div class="recent-news__item news-item">
                    <div class="news-item__header">
                        <div>
                            <span>${time}</span>
                        </div>
                        <div>
                            <span>${title}</span>
                        </div>
                    </div>
                    <div class="news-item__text">
                        <div class="text-wrapper">
                            <span>${text}</span>
                        </div>
                    </div>
                </div>`;
    return block;
}

function renderRecentReports(data) {
    data = JSON.parse(data);
    let vk_items = "";
    let fa_items = "";
    data.forEach(function (item) {
        if (item.place === "vk") {
            vk_items = vk_items + preRenderReportCart(item.place, item.report_id, item.report_datetime, item.report_price);
        } else {
            fa_items = fa_items + preRenderReportCart(item.place, item.report_id, item.report_datetime, item.report_price);
        }
    });
    $('.recent-reports-block.vk-block').html(vk_items);
    $('.recent-reports-block.fa-block').html(fa_items);
}

function renderRecentNews(data) {
    data = JSON.parse(data);
    let items = "";
    data.forEach(function (item) {
        items = items + preRenderNewsCard(item.id, item.time, item.title, item.text);
    });
    $('.recent-news').html(items);
}

$(document).ready(function () {
    $.ajax({
        type: "POST",
        url: "/engine/loaders/loadRecentReports.php",
        success: function (resp) {
            renderRecentReports(resp)
        },
        error: function () {
            $('.row.main-other').html(`
            <div class="warn-message">
                <div class="warn-message__icon">
                    <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="exclamation-triangle"
                         role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="warning-icon__big">
                        <path fill="currentColor"
                              d="M270.2 160h35.5c3.4 0 6.1 2.8 6 6.2l-7.5 196c-.1 3.2-2.8 5.8-6 5.8h-20.5c-3.2 0-5.9-2.5-6-5.8l-7.5-196c-.1-3.4 2.6-6.2 6-6.2zM288 388c-15.5 0-28 12.5-28 28s12.5 28 28 28 28-12.5 28-28-12.5-28-28-28zm281.5 52L329.6 24c-18.4-32-64.7-32-83.2 0L6.5 440c-18.4 31.9 4.6 72 41.6 72H528c36.8 0 60-40 41.5-72zM528 480H48c-12.3 0-20-13.3-13.9-24l240-416c6.1-10.6 21.6-10.7 27.7 0l240 416c6.2 10.6-1.5 24-13.8 24z"
                              class=""></path>
                    </svg>
                </div>
                <div class="warn-message__text">
                    <p>При загрузке возникли проблемы, попробуйте позже</p>
                </div>
            </div>`);
        }
    });
    $.ajax({
        type: "POST",
        url: "/engine/loaders/loadRecentNews.php",
        success: function (resp) {
            renderRecentNews(resp)
        },
        error: function () {
            $('.row.main-other').html(`
            <div class="warn-message">
                <div class="warn-message__icon">
                    <svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="exclamation-triangle"
                         role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="warning-icon__big">
                        <path fill="currentColor"
                              d="M270.2 160h35.5c3.4 0 6.1 2.8 6 6.2l-7.5 196c-.1 3.2-2.8 5.8-6 5.8h-20.5c-3.2 0-5.9-2.5-6-5.8l-7.5-196c-.1-3.4 2.6-6.2 6-6.2zM288 388c-15.5 0-28 12.5-28 28s12.5 28 28 28 28-12.5 28-28-12.5-28-28-28zm281.5 52L329.6 24c-18.4-32-64.7-32-83.2 0L6.5 440c-18.4 31.9 4.6 72 41.6 72H528c36.8 0 60-40 41.5-72zM528 480H48c-12.3 0-20-13.3-13.9-24l240-416c6.1-10.6 21.6-10.7 27.7 0l240 416c6.2 10.6-1.5 24-13.8 24z"
                              class=""></path>
                    </svg>
                </div>
                <div class="warn-message__text">
                    <p>При загрузке возникли проблемы, попробуйте позже</p>
                </div>
            </div>`);
        }
    });
});

function openFullReport(place, id) {
    if (place === "vk") {
        window.open(`?report&id=${id}`, '_blank')
    } else {
        window.open(`?report&fid=${id}`, '_blank')
    }
}

// $.ajax({
//     url: '/engine/tests/getStatsHistory.php',
//     method: 'POST',
//     success: function (data) {
//         var resp_data = JSON.parse(data);
//
//         for (var index in resp_data) {
//             labels.push(resp_data[index].date);
//             subs.push(resp_data[index].members);
//             reach.push(resp_data[index].reach);
//             week_stat.push(resp_data[index].week_stat);
//             male.push(resp_data[index].male);
//             female.push(resp_data[index].female);
//             price.push(resp_data[index].price);
//         }
//     },
//     error: function (e) {
//         console.error(e.message);
//     }
// });
//
// var ctx = document.getElementById('myChart').getContext('2d');
// var myLineChart = new Chart(ctx, {
//     type: 'line',
//     data: {
//         labels: labels,
//         datasets: [{
//             label: "Подписчики",
//             data: subs,
//             borderColor: [
//                 '#4fa36e',
//
//             ],
//             borderWidth: 3
//         }, {
//             label: "Охват поста",
//             data: reach,
//             borderColor: [
//                 '#b26054',
//
//
//             ],
//             borderWidth: 3
//         }, {
//             label: "Ср. прирост/7д.",
//             data: week_stat,
//             borderColor: [
//                 '#a27f5a',
//
//
//             ],
//             borderWidth: 3
//         }, {
//             label: "МЦА",
//             data: male,
//             borderColor: [
//                 '#53b3b3',
//             ],
//             borderWidth: 3
//         }, {
//             label: "ЖЦА",
//             data: female,
//             borderColor: [
//                 '#744968',
//
//
//             ],
//             borderWidth: 3
//         }, {
//             label: "Цена",
//             data: price,
//             borderColor: [
//                 'rgb(224,225,225)',
//             ],
//             borderWidth: 3
//         }]
//     },
//     options: {
//         responsive: true,
//     }
// });
