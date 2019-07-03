$(document).ready(function () {
    loadUsers();
});

uTable = $('#usersTable').DataTable({
    paging: true,
    searching: true,
    ordering: true,
    responsive: true,
    info: false,
    "language": {
        "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Russian.json"
    },
});

function renderUserTable(json) {
    for (let k in json) {
        uTable.row.add([
            `${json[k].id}`,
            `${json[k].login}`,
            `${json[k].email}`,
            `${statuses_array[json[k].active]}`,
            `${works_array[json[k].level]}`,
            `
                <ul>
                    <li><a href="javascript:void(0)" onclick="editUser(${json[k].id})">Редактировать</a></li>
                    <li>?????</li>
                </ul>
            `,
        ]);
    }
    uTable.draw();
}

function loadUsers() {
    if (uTable.data().length > 1) {
        uTable.clear().draw();
    }
        let req = new XMLHttpRequest();
        req.open('POST', '/engine/loaders/loadUsers.php');
        req.send();
        req.onreadystatechange = function () {
            if (req.readyState === 4 && req.status === 200) {
                renderUserTable(JSON.parse(req.responseText));
            }
        }
}

function renderUserEdit(json) {
    $("#userID").html(json.id);
    $("#userLogin").html(json.login);
    $("#userID_").html(json.id);
    $("#userLogin_").html(json.login);
    $("#oldStatus").html(statuses_array[json.active]);
}

function closeEditWindow() {
    $('.editUserWindow').toggleClass('hide');
}

function editUser(id) {
    $('.editUserWindow').toggleClass('hide');

    let req = new XMLHttpRequest();
    req.open('POST', '/engine/loaders/loadUser.php');
    req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    req.send(`id=${id}`);
    req.onreadystatechange = function () {
        if (req.readyState === 4 && req.status === 200) {
            renderUserEdit(JSON.parse(req.responseText));
        }
    }
}

function saveEdit() {
    let req = new XMLHttpRequest();
    req.open('POST', '/engine/handlers/actions/saveUserChange.php');
    req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    req.send(`id=${$('#userID_').html()}&new_active=${$('#active').val()}`);
    req.onreadystatechange = function () {
        if (req.readyState === 4 && req.status === 200) {
            loadUsers();
            closeEditWindow();
        }
    }
}
