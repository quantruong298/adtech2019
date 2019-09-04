function addCampaign(url) {
    $.ajax(
        {
            url: url,
            type: "get",
            datatype: "html",
        }).done(function (data) {
            $("#addCampaign").empty().html(data);
            $("#addCampaign").modal('show');
        }).fail(function (jqXHR, ajaxOptions, thrownError) {
        alert('No response from server');
    });
}
function addAdGroup() {
    $.ajax(
        {
            url: 'adgroups/create',
            type: "get",
            datatype: "html",
        }).done(function (data) {
        $("#addAdGroup").empty().html(data);
        $("#addAdGroup").modal('show');
    }).fail(function (jqXHR, ajaxOptions, thrownError) {
        alert('No response from server');
    });
}
function addAd() {
    $.ajax(
        {
            url: 'ads/create',
            type: "get",
            datatype: "html",
        }).done(function (data) {
        $("#addAd").empty().html(data);
        $("#addAd").modal('show');
    }).fail(function (jqXHR, ajaxOptions, thrownError) {
        alert('No response from server');
    });
}
function addPlan() {
    $.ajax(
        {
            url: 'plans/create',
            type: "get",
            datatype: "html",
        }).done(function (data) {
        $("#addPlan").empty().html(data);
        $("#addPlan").modal('show');
    }).fail(function (jqXHR, ajaxOptions, thrownError) {
        alert('No response from server');
    });
}
function editCampaign(url) {
    $.ajax(
        {
            url: url,
            type: "get",
            datatype: "html",
        }).done(function (data) {
            $("#editCampaign").empty().html(data);
            $("#editCampaign").modal('show');
    }).fail(function (jqXHR, ajaxOptions, thrownError) {
        alert('No response from server');
    });
}
function storeCampaign(){
    var form = $("#formAddCampaign");
    var url = form.attr('action');
        $.ajax({
            url: url,
            type: "post",
            data: form.serialize(),
            success: function (data) {
                Swal.fire({
                    type: 'success',
                    title: 'Add Campaign complete',
                });
                $("#addCampaign").modal('hide');
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
function updateCampaign() {
    var form = $("#formUpdateCampaign");
   var url = form.attr('action');
    $.ajax({
        url: url,
        data: form.serialize(),
        type: "put",
        success: function (data) {
            Swal.fire({
                type: 'success',
                title: 'Update Campaign complete',
            });
            $("#editCampaign").modal('hide');
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
function storeAdGroup() {
    var form = $("#formAddAdGroup");
    var url = form.attr('action');
    $.ajax({
        url: url,
        data: form.serialize(),
        type: "post",
        success: function (data) {
            console.log(data);
            Swal.fire({
                type: 'success',
                title: 'Add AdGroup complete',
            });
            $("#addAdGroup").modal('hide');
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
function storePlan() {
    var form = $("#formAddPlan");
    var url = form.attr('action');
    $.ajax({
        url: url,
        data: form.serialize(),
        type: "post",
        success: function (data) {
            console.log(data);
            Swal.fire({
                type: 'success',
                title: 'Add Plan complete',
            });
            $("#addPlan").modal('hide');
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

function getCampaignDetail(e) {
    $.ajax(
        {
            url: 'adgroups/camp/'+e.value,
            type: "get",
            datatype: "html",
        }).done(function (data) {
            $("#campaigndetail").html(data);
        }).fail(function (jqXHR, ajaxOptions, thrownError) {
            alert('No response from server');
    });
}
function getAdGroupsByCampaignId(id){
    $.ajax(
        {
            url: '/mp/c/'+id,
            type: "get",
            datatype: "html",
        }).done(function (data) {
        $("#content").empty().html(data);
    }).fail(function (jqXHR, ajaxOptions, thrownError) {
        alert('No response from server');
    });
}
function getAdsByAdGroupId(id){
    $.ajax(
        {
            url: '/mp/a/'+id,
            type: "get",
            datatype: "html",
        }).done(function (data) {
        $("#content").empty().html(data);
    }).fail(function (jqXHR, ajaxOptions, thrownError) {
        alert('No response from server');
    });
}