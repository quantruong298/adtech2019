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
function editAdGroup(url) {
    $.ajax(
        {
            url: url,
            type: "get",
            datatype: "html",
        }).done(function (data) {
        $("#editAdGroup").empty().html(data);
        $("#editAdGroup").modal('show');
    }).fail(function (jqXHR, ajaxOptions, thrownError) {
        alert('No response from server');
    });
}
function editAd(url) {
    $.ajax(
        {
            url: url,
            type: "get",
            datatype: "html",
        }).done(function (data) {
        $("#editAd").empty().html(data);
        $("#editAd").modal('show');
    }).fail(function (jqXHR, ajaxOptions, thrownError) {
        alert('No response from server');
    });
}
function editPlan(url) {
    $.ajax(
        {
            url: url,
            type: "get",
            datatype: "html",
        }).done(function (data) {
        $("#editPlan").empty().html(data);
        $("#editPlan").modal('show');
    }).fail(function (jqXHR, ajaxOptions, thrownError) {
        alert('No response from server');
    });
}
function updateCampaign() {
    $('.loading').html("<div class=\"lds-dual-ring\"></div>");
    var form = $("#formUpdateCampaign");
   var url = form.attr('action');
    $.ajax({
        url: url,
        data: form.serialize(),
        type: "put",
        success: function (data) {
            $('.loading').empty();
            Swal.fire({
                type: 'success',
                title: 'Update Campaign complete',
            });
            $("#editCampaign").modal('hide');
            location.reload();
        },
        error: function (XMLHttpRequest) {
            $('.loading').empty();
            errors = XMLHttpRequest.responseJSON.errors;
            console.log(errors);
            $('#error-name').empty().html(errors.name);
            $('#error-advertiser').empty().html(errors.advertiser_email);
            $('#error-media').empty().html(errors.media_id);
            $('#error-kpi').empty().html(errors.kpi);
            $('#error-objective').empty().html(errors.objective_id);
            $('#error-period-from-date').empty().html(errors.period_from_date);
            $('#error-period-from-time').empty().html(errors.period_from_time);
            $('#error-period-to-date').empty().html(errors.period_to_date);
            $('#error-period-to-time').empty().html(errors.period_to_time);
            $('#error-budget-type').empty().html(errors.budget_type_id);
            $('#error-period-budget').empty().html(errors.campaign_period_budget);
            $('#error-daily-budget').empty().html(errors.std_daily_budget);
            $('#error-bidding-method').empty().html(errors.std_bidding_method_id);
        }
    })
}
function updateAdGroup() {
    $('.loading').html("<div class=\"lds-dual-ring\"></div>");
    var form = $("#formUpdateAdGroup");
    var url = form.attr('action');
    $.ajax({
        url: url,
        data: form.serialize(),
        type: "put",
        success: function (data) {
            $('.loading').empty();
            Swal.fire({
                type: 'success',
                title: 'Update AdGroup complete',
            });
            $("#editCampaign").modal('hide');
            location.reload();
        },
        error: function (XMLHttpRequest) {
            $('.loading').empty();
            errors = XMLHttpRequest.responseJSON.errors;
            console.log(errors);
            $('#error-name').empty().html(errors.name);
            $('#error-campaign').empty().html(errors.campaign_id);
            $('#error-media').empty().html(errors.media_id);
            $('#error-period-from-date').empty().html(errors.period_from_date);
            $('#error-period-from-time').empty().html(errors.period_from_time);
            $('#error-period-to-date').empty().html(errors.period_to_date);
            $('#error-period-to-time').empty().html(errors.period_to_time);
            $('#error-period-budget').empty().html(errors.ag_period_budget);
            $('#error-period-budget-from').empty().html(errors.ag_period_budget_from);
            $('#error-period-budget-to').empty().html(errors.ag_period_budget_to);
            $('#error-daily-budget').empty().html(errors.std_daily_budget);
            $('#error-bidding-amount').empty().html(errors.std_bidding_amount);
        }
    })
}
function updateAd() {
    $('.loading').html("<div class=\"lds-dual-ring\"></div>");
    var form = $("#formUpdateAd");
    var url = form.attr('action');
    var formData = new FormData(form[0]);
    $.ajax({
        url: url,
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        type: "post",
        success: function (data) {
            $('.loading').empty();
            Swal.fire({
                type: 'success',
                title: 'Update Ad complete',
            });
            $("#editCampaign").modal('hide');
            location.reload();
        },
        error: function (XMLHttpRequest) {
            $('.loading').empty();
            errors = XMLHttpRequest.responseJSON.errors;
            console.log(errors);
            $('#error-name').empty().html(errors.name);
            $('#error-adgroup').empty().html(errors.ad_group_id);
            $('#error-creative-type').empty().html(errors.creative_type_id);
            $('#error-creative-preview').empty().html(errors.creative_preview);
            $('#error-url').empty().html(errors.url);
            $('#error-cost-bidding').empty().html(errors.cost_bidding);
            $('#error-period-from-date').empty().html(errors.period_from_date);
            $('#error-period-from-time').empty().html(errors.period_from_time);
            $('#error-period-to-date').empty().html(errors.period_to_date);
            $('#error-period-to-time').empty().html(errors.period_to_time);
            $('#error-period-budget').empty().html(errors.ads_period_budget);
            $('#error-period-budget-from').empty().html(errors.ads_period_budget_from);
            $('#error-period-budget-to').empty().html(errors.ads_period_budget_to);
            $('#error-daily-budget').empty().html(errors.std_daily_budget);
            $('#error-bidding-amount').empty().html(errors.std_bidding_amount);
        }
    })
}
function updatePlan() {
    $('.loading').html("<div class=\"lds-dual-ring\"></div>");
    var form = $("#formUpdatePlan");
    var url = form.attr('action');
    $.ajax({
        url: url,
        data: form.serialize(),
        type: "put",
        success: function (data) {
            $('.loading').empty();
            console.log(data);
            Swal.fire({
                type: 'success',
                title: 'Update Plan complete',
            });
            $("#addPlan").modal('hide');
            location.reload();
        },
        error: function (XMLHttpRequest) {
            $('.loading').empty();
            errors = XMLHttpRequest.responseJSON.errors;
            console.log(errors);
            $('#error-area-name').empty().html(errors.area_name);
            $('#error-campaign').empty().html(errors.campaign_id);
            $('#error-period-from-date').empty().html(errors.period_from_date);
            $('#error-period-from-time').empty().html(errors.period_from_time);
            $('#error-period-to-date').empty().html(errors.period_to_date);
            $('#error-period-to-time').empty().html(errors.period_to_time);
        }
    })
}
function storeCampaign(){
    $('.loading').html("<div class=\"lds-dual-ring\"></div>");
    var form = $("#formAddCampaign");
    var url = form.attr('action');
    $.ajax({
        url: url,
        type: "post",
        data: form.serialize(),
        success: function (data) {
            $('.loading').empty();
            Swal.fire({
                type: 'success',
                title: 'Add Campaign complete',
            });
            $("#addCampaign").modal('hide');
            location.reload();
        },
        error: function (XMLHttpRequest) {
            $('.loading').empty();
            errors = XMLHttpRequest.responseJSON.errors;
            console.log(errors);
            $('#error-name').empty().html(errors.name);
            $('#error-advertiser').empty().html(errors.advertiser_email);
            $('#error-media').empty().html(errors.media_id);
            $('#error-kpi').empty().html(errors.kpi);
            $('#error-objective').empty().html(errors.objective_id);
            $('#error-period-from-date').empty().html(errors.period_from_date);
            $('#error-period-from-time').empty().html(errors.period_from_time);
            $('#error-period-to-date').empty().html(errors.period_to_date);
            $('#error-period-to-time').empty().html(errors.period_to_time);
            $('#error-budget-type').empty().html(errors.budget_type_id);
            $('#error-period-budget').empty().html(errors.campaign_period_budget);
            $('#error-daily-budget').empty().html(errors.std_daily_budget);
            $('#error-bidding-method').empty().html(errors.std_bidding_method_id);
        }
    })
}
function storeAdGroup() {
    $('.loading').html("<div class=\"lds-dual-ring\"></div>");
    var form = $("#formAddAdGroup");
    var url = form.attr('action');
    $.ajax({
        url: url,
        data: form.serialize(),
        type: "post",
        success: function (data) {
            $('.loading').empty();
            console.log(data);
            Swal.fire({
                type: 'success',
                title: 'Add AdGroup complete',
            });
            $("#addAdGroup").modal('hide');
            location.reload();
        },
        error: function (XMLHttpRequest) {
            $('.loading').empty();
            errors = XMLHttpRequest.responseJSON.errors;
            console.log(errors);
            $('#error-name').empty().html(errors.name);
            $('#error-campaign').empty().html(errors.campaign_id);
            $('#error-media').empty().html(errors.media_id);
            $('#error-period-from-date').empty().html(errors.period_from_date);
            $('#error-period-from-time').empty().html(errors.period_from_time);
            $('#error-period-to-date').empty().html(errors.period_to_date);
            $('#error-period-to-time').empty().html(errors.period_to_time);
            $('#error-period-budget').empty().html(errors.ag_period_budget);
            $('#error-period-budget-from').empty().html(errors.ag_period_budget_from);
            $('#error-period-budget-to').empty().html(errors.ag_period_budget_to);
            $('#error-daily-budget').empty().html(errors.std_daily_budget);
            $('#error-bidding-amount').empty().html(errors.std_bidding_amount);
        }
    })
}
function storeAd() {
    $('.loading').html("<div class=\"lds-dual-ring\"></div>");
    var form = $("#formAddAd");
    var formData = new FormData(form[0]);
    var url = form.attr('action');
    $.ajax({
        url: url,
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        type: "post",
        success: function (data) {
            $('.loading').empty();
            console.log(data);
            Swal.fire({
                type: 'success',
                title: 'Add Ad complete',
            });
            $("#addAd").modal('hide');
            location.reload();
        },
        error: function (XMLHttpRequest) {
            $('.loading').empty();
            errors = XMLHttpRequest.responseJSON.errors;
            console.log(errors);
            $('#error-name').empty().html(errors.name);
            $('#error-adgroup').empty().html(errors.ad_group_id);
            $('#error-creative-type').empty().html(errors.creative_type_id);
            $('#error-creative-preview').empty().html(errors.creative_preview);
            $('#error-url').empty().html(errors.url);
            $('#error-cost-bidding').empty().html(errors.cost_bidding);
            $('#error-period-from-date').empty().html(errors.period_from_date);
            $('#error-period-from-time').empty().html(errors.period_from_time);
            $('#error-period-to-date').empty().html(errors.period_to_date);
            $('#error-period-to-time').empty().html(errors.period_to_time);
            $('#error-period-budget').empty().html(errors.ads_period_budget);
            $('#error-period-budget-from').empty().html(errors.ads_period_budget_from);
            $('#error-period-budget-to').empty().html(errors.ads_period_budget_to);
            $('#error-daily-budget').empty().html(errors.std_daily_budget);
            $('#error-bidding-amount').empty().html(errors.std_bidding_amount);
        }
    })
}
function storePlan() {
    $('.loading').html("<div class=\"lds-dual-ring\"></div>");
    var form = $("#formAddPlan");
    var url = form.attr('action');
    $.ajax({
        url: url,
        data: form.serialize(),
        type: "post",
        success: function (data) {
            $('.loading').empty();
            console.log(data);
            Swal.fire({
                type: 'success',
                title: 'Add Plan complete',
            });
            $("#addPlan").modal('hide');
            location.reload();
        },
        error: function (XMLHttpRequest) {
            $('.loading').empty();
            errors = XMLHttpRequest.responseJSON.errors;
            console.log(errors);
            $('#error-area-name').empty().html(errors.area_name);
            $('#error-campaign').empty().html(errors.campaign_id);
            $('#error-period-from-date').empty().html(errors.period_from_date);
            $('#error-period-from-time').empty().html(errors.period_from_time);
            $('#error-period-to-date').empty().html(errors.period_to_date);
            $('#error-period-to-time').empty().html(errors.period_to_time);
        }
    })
}

function getCampaignDetail(e) {
    $.ajax(
        {
            url: 'plans/camp/'+e.value,
            type: "get",
            datatype: "html",
        }).done(function (data) {
            $(".campaignDetail").html(data);
        }).fail(function (jqXHR, ajaxOptions, thrownError) {
            alert('No response from server');
    });
}
function getAdGroupDetail(e) {
    $.ajax(
        {
            url: 'ads/ag/'+e.value,
            type: "get",
            datatype: "html",
        }).done(function (data) {
        $(".adgroupDetail").html(data);
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

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('.preview-image').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
function changeStatus(e,id){
    $("#status-"+id).html("<div class=\"lds-dual-ring\" style=\"width:5px;height:5px;\"></div>");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax(
        {
            url: '/mp/ads/'+id+'/'+e.checked,
            type: "put",
            datatype: "html",
        }).done(function (data) {
        $('#status-'+id).empty();
        alert('success');
    }).fail(function (jqXHR, ajaxOptions, thrownError) {
        $('#status-'+id).empty();
        alert('No response from server');
    });
}
function recoverAd(url){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax(
        {
            url: url,
            type: "put",
            datatype: "html",
        }).done(function (data) {
        alert('success');
        location.reload();
    }).fail(function (jqXHR, ajaxOptions, thrownError) {
        alert('No response from server');
    });
}