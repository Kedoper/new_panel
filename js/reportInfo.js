$(document).ready(function () {

    let table = $('#cartTable').DataTable({
        paging: false,
        scrollY: 200,
        searching: false,
        ordering: false,
        select: true,
        responsive:true,
        info:false,
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Russian.json"
        }
    });
    let parsetItems = JSON.parse(table_items);
    parsetItems.forEach(function (val) {
        table.row.add([val.num,val.title,val.thematic,val.price,val.post_count]).draw();
    });
});



function openImg(photo) {
    window.open(`${photo}`, "_blank");
}
