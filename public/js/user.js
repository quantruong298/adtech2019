function getEditModal(id) {
    $.ajax(
        {
            url: 'users/'+id+'/edit',
            type: "get",
            datatype: "html",
        }).done(function (data) {
        $("#editModal").empty().html(data);
        $("#editModal").modal('show');

    }).fail(function (jqXHR, ajaxOptions, thrownError) {
        alert('No response from server');
    });
}
function submitFormEditUser(id) {
    var form = $("#form-edit-user");
    var url = form.attr('action');
    $.ajax({
        url: url,
        data:form.serialize(),
        type: "put",
        success: function (data) {
            console.log(data);
            Swal.fire({
                type: 'success',
                title: 'Update complete',
            })
            var a = '#rowUser' + id;
            $(a).empty().html(data);
            $("#editModal").modal('hide');
        },
        error: function (XMLHttpRequest) {
            errors = XMLHttpRequest.responseJSON.errors;
            console.log(errors);
            $('#error-edit-name').empty().html(errors.name);
            $('#error-edit-password').empty().html(errors.password);
            $('#error-edit-email').empty().html(errors.email);
            $('#error-edit-role').empty().html(errors.role_id);
            $('#error-edit-gender').empty().html(errors.gender);
            $('#error-edit-year_of_birth').empty().html(errors.year_of_birth);
        }
    })
}

function getAddModal() {
    $.ajax(
        {
            url: 'users/create',
            type: "get",
            datatype: "html",
        }).done(function (data) {
        $("#addModal").empty().html(data);
        $("#addModal").modal('show');

    }).fail(function (jqXHR, ajaxOptions, thrownError) {
        alert('No response from server');
    });
}
function submitFormAddUser() {
    var form = $("#form-add-user");
    var url = form.attr('action');
    $.ajax({
        url: url,
        data:form.serialize(),
        type: "post",
        success: function (data) {
            console.log(data);
            Swal.fire({
                type: 'success',
                title: 'Add user complete',
            });
            $("#editModal").modal('hide');
            location.reload();
        },
        error: function (XMLHttpRequest) {
            errors = XMLHttpRequest.responseJSON.errors;
            console.log(errors);
            $('#error-name').empty().html(errors.name);
            $('#error-password').empty().html(errors.password);
            $('#error-email').empty().html(errors.email);
            $('#error-role').empty().html(errors.role_id);
            $('#error-gender').empty().html(errors.gender);
            $('#error-year_of_birth').empty().html(errors.year_of_birth);
        }
    })
}


function deleteUser(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var url ='users/'+id;
            $.ajax({
                url: url,
                type: "delete",
                success: function (data) {
                    console.log(data);
                    var a = '#rowUser' + id;
                    $(a).empty().html(data);
                    $("#editModal").modal('hide');
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })

        }
    })

}