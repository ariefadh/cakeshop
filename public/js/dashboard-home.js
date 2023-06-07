$(document).ready(function () {
    $("#tabelStaff").DataTable({
        scrollY: 200,
        scrollX: true,
        lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, 'All'],
        ],
        columnDefs: [{ orderable: false, targets: 4 }],
    });
});

$(document).ready(function () {
    $("#tabelCustomer").DataTable({
        scrollY: 200,
        scrollX: true,
        lengthMenu: [
        [10, 25, 50, -1],
        [10, 25, 50, 'All'],
        ],
        columnDefs: [{ orderable: false, targets: 2 }],
    });
});