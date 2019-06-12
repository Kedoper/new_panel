works_array = {
    'manager': "Менеджер Вконтакте",
    'manager_fa': "Менеджер ФА",
};
function work_search(work) {
    if (works_array.hasOwnProperty(work)) {
        return works_array[work]
    }
}
