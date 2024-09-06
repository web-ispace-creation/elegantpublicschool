// add alumni council members
$("#adminAddStudentTC form").submit(function(e){
    var routeUrl = $('#adminAddStudentTC form').attr('action');
    e.preventDefault(); 
    $.ajax({
        url: routeUrl,
        type: 'post',
        data:  new FormData(this),
        contentType: false,
        processData: false,
        success: function(response){
            console.log(response)
            if(response.status == 200){
                alert(response.msg);
                $('#adminAddStudentTC').modal('toggle')
            }else{
                alert(response.msg);
            }
        },
    });
  });

//   Datatable
$(function () {
    var routeUrl = $('.admin-tc .datatable').data('url');
    var table = $('.admin-tc .datatable').DataTable({
         order: [[0, 'desc']],
        processing: true,
        serverSide: true,
        type:'POST',
        ajax: routeUrl,
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'dob', name: 'dob'},
            {data: 'admission_no', name: 'admission_no'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
    });
 });
  // delete button on click
  $(document).on('click', '.admin-tc .delete-btn', function() {
    var routeUrl = $(this).data('url');
    if (showConfirmation()) {
        var id = $(this).data('id');
        $.ajax({
            url: routeUrl,
            type: 'GET',
            data: {
                id: id
            },
            success: function(response) {  
                if(response.status == 200){
                    $('.admin-tc .datatable').DataTable().ajax.reload();
                }
            }
        });
    }
});
function showConfirmation() {
    var result = confirm("Do you want to proceed?");
    if (result) {
        return true;
    } else {
        return false;
    }
}