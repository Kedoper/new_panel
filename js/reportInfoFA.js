$(document).ready(function () {

    let table = $('#cartTable').DataTable({
        paging: false,
        scrollY: 200,
        searching: false,
        ordering: false,
        responsive:true,
        info:false,
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Russian.json"
        }
    });
    let parsetItems = JSON.parse(table_items);
    parsetItems.forEach(function (val) {
        table.row.add([val.num,val.refer]).draw();
    });
});



function openImg(photo) {
    window.open(`${photo}`, "_blank");
}
