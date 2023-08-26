$(document).ready(function() {
    $('#data_table').DataTable({
        pageLength: 10,
        filter: true,
        scrollY: 570,
        scrollCollapse: true,
        deferRender: true,
        scroller: true,
        "searching": true,
    });

});

$('.editbtn').on('click', function() {

    $('#editmodal').modal('show');

    $tr = $(this).closest('tr');

    var data = $tr.children("td").map(function() {
        return $(this).text();
    }).get();

    console.log(data);

    $('#update_id').val(data[0]);
    $('#data_name').val(data[1]);
    $('#data_add').val(data[2]);
    $('#data_contact').val(data[3]);
    $('#data_email').val(data[4]);
    $('#data_status').val(data[5]);
    //console.log("status information ", data[0]);
});

$('.deletebtn').on('click', function() {

    $('#deletemodal').modal('show');

    $tr = $(this).closest('tr');

    var data = $tr.children("td").map(function() {
        return $(this).text();
    }).get();

    $('#supp_delete_id').val(data[0]);
    //console.log("status information for delete ", data[0]);
});