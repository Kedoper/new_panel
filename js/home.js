works_array = {
    'manager': "Менеджер Вконтакте",
    'manager_fa': "Менеджер ФА",
};

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
// $.ajax({
//     url: '/engine/scripts/getStatsHistory.php',
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
