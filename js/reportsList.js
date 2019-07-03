$(document).ready(function () {
    table = $('#reportsTable').DataTable({
        paging: false,
        searching: true,
        ordering: true,
        order: [1,'desc'],
        select: false,
        responsive: true,
        info: false,
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Russian.json"
        },
        "columns": [
            { "visible": true },
            { "visible": false },
            { "visible": true },
            { "visible": true },
            { "visible": true },
            { "visible": true },
            { "visible": true },
            { "visible": true },
        ]
    });
    loadReportList();
});

function loadReportList() {
    let JSONreq = new XMLHttpRequest();
    JSONreq.open("POST", "/engine/loaders/loadReportList", true);
    JSONreq.send();
    JSONreq.onreadystatechange = function () {
        if (JSONreq.readyState === 4 && JSONreq.status === 200) {
            renderTable(JSON.parse(JSONreq.responseText));
        }
    }
}

function renderTable(json) {
    for (let key in json) {
        table.row.add( [json[key].id,json[key].timestamp,json[key].social, json[key].creator, json[key].datetime, json[key].wp_amount, `<a href="/?report&${json[key].link}=${json[key].id}" target="_blank">Ссылка</a>`,`<ul><li><a href="/?edit&target=${json[key].link}-${json[key].id}">Изменить</a></li><li><a href="/?delete&target=${json[key].link}-${json[key].id}">Удалить</a></li></ul>`] ).draw();
    }
    // table
}