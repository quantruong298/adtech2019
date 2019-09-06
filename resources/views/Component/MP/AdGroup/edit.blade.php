<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold text-primary ml-5">Update AdGroup</h4>
            <button type="button" class="close text-primary" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body mx-3">
            <form method="POST" id="formUpdateAdGroup" enctype="multipart/form-data" action="adgroups/{{$adgroup->id}}">
                @csrf
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse"
                                   data-parent="#accordion" href="#collapseInformation" aria-expanded="false"
                                   aria-controls="collapseOne">
                                    Information
                                </a>
                            </h4>
                        </div>
                        <div id="collapseInformation" class="panel-collapse collapse" role="tabpanel"
                             aria-labelledby="headingOne">
                            <div class="panel-body">
                                <div class="panel-body-content">
                                    <div class="form-group row">
                                        <label for="example-text-input"
                                               class="col-2 col-form-label">Name</label>
                                        <div class="col-8">
                                            <input class="form-control"
                                                   type="text"
                                                   name="name"
                                                   value="{{$adgroup->name}}"
                                                   id="adgroup-name-add">
                                            <span class="text-danger">
                                                  <strong id="error-name"></strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input"
                                               class="col-2 col-form-label">Campaign</label>
                                        <div class="col-4">
                                            <select class="form-control"
                                                    name="campaign_id"
                                                    id="adgroup-media-add">
                                                @foreach($campaigns as $campaign)
                                                    <option value="{{$campaign->id}}" @if($campaign->id==$adgroup->campaign_id) selected @endif>{{$campaign->name}}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">
                                                  <strong id="error-campaign"></strong>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse"
                                   data-parent="#accordion" href="#collapseSchedule" aria-expanded="false"
                                   aria-controls="collapseThree">
                                    Period
                                </a>
                            </h4>
                        </div>
                        <div id="collapseSchedule" class="panel-collapse collapse" role="tabpanel"
                             aria-labelledby="headingThree">
                            <div class="panel-body">
                                <div class="panel-body-content">
                                    <div class="form-group row">
                                        <label for="example-text-input"
                                               class="col-2 col-form-label">Period from</label>
                                        <div class="col-4">
                                            <input class="form-control"
                                                   type="date"
                                                   name="period_from_date"
                                                   id="adgroup-start-day-add"
                                                   value="2019-06-05">
                                        </div>
                                        <div class="col-4">
                                            <input class="form-control"
                                                   type="time"
                                                   name="period_from_time"
                                                   id="adgroup-start-time-add"
                                                   value="13:45:00">
                                        </div>
                                        <span class="text-danger">
                                                  <strong id="error-period-from"></strong>
                                            </span>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input"
                                               class="col-2 col-form-label">Period to</label>
                                        <div class="col-4">
                                            <input class="form-control"
                                                   type="date"
                                                   name="period_to_date"
                                                   id="adgroup-end-day-add"
                                                   value="2019-06-17">
                                        </div>
                                        <div class="col-4">
                                            <input class="form-control"
                                                   type="time"
                                                   name="period_to_time"
                                                   id="adgroup-end-time-add"
                                                   value="13:45:00">
                                        </div>
                                        <span class="text-danger">
                                                  <strong id="error-period-to"></strong>
                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse"
                                   data-parent="#accordion" href="#collapseBudget" aria-expanded="false"
                                   aria-controls="collapseThree">
                                    Budget
                                </a>
                            </h4>
                        </div>
                        <div id="collapseBudget" class="panel-collapse collapse" role="tabpanel"
                             aria-labelledby="headingThree">
                            <div class="panel-body">
                                <div class="panel-body-content">
                                    <div class="form-group row">
                                        <label for="example-text-input"
                                               class="col-2 col-form-label">Period Budget</label>
                                        <div class="col-4">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addonl">$</span>
                                                </div>
                                                <input type="number" class="form-control"
                                                       aria-describedby="basic-addon1"
                                                       name="ag_period_budget"
                                                       value="{{$adgroup->adgroupDetail->ag_period_budget}}"
                                                       id="ag-period-budget-add">
                                                <span class="text-danger">
                                                  <strong id="error-period-budget"></strong>
                                            </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input"
                                               class="col-2 col-form-label">Period Budget From</label>
                                        <div class="col-4">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addonl">$</span>
                                                </div>
                                                <input type="number" class="form-control"
                                                       aria-describedby="basic-addon1"
                                                       name="ag_period_budget_from"
                                                       value="{{$adgroup->adgroupDetail->ag_period_budget_from}}"
                                                       id="ag-period-budget-add">
                                                <span class="text-danger">
                                                  <strong id="error-period-budget-from"></strong>
                                            </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input"
                                               class="col-2 col-form-label">Period Budget To</label>
                                        <div class="col-4">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addonl">$</span>
                                                </div>
                                                <input type="number" class="form-control"
                                                       aria-describedby="basic-addon1"
                                                       name="ag_period_budget_to"
                                                       value="{{$adgroup->adgroupDetail->ag_period_budget_to}}"
                                                       id="adgroup-period-budget-add">
                                                <span class="text-danger">
                                                  <strong id="error-period-budget-to"></strong>
                                            </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input"
                                               class="col-2 col-form-label">Daily Budget</label>
                                        <div class="col-4">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">$</span>
                                                </div>
                                                <input type="number" class="form-control"
                                                       aria-describedby="basic-addon1"
                                                       name="std_daily_budget"
                                                       value="{{$adgroup->adgroupDetail->std_daily_budget}}"
                                                       id="adgroup-daily-budget-add">
                                                <span class="text-danger">
                                                  <strong id="error-daily-budget"></strong>
                                            </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse"
                                   data-parent="#accordion" href="#collapseBidding" aria-expanded="false"
                                   aria-controls="collapseThree">
                                    Bidding
                                </a>
                            </h4>
                        </div>
                        <div id="collapseBidding" class="panel-collapse collapse" role="tabpanel"
                             aria-labelledby="headingThree">
                            <div class="panel-body">
                                <div class="panel-body-content">
                                    <div class="form-group row">
                                        <label for="example-text-input"
                                               class="col-2 col-form-label">Standard Bidding Amount</label>
                                        <div class="col-4">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">$</span>
                                                </div>
                                                <input type="number" class="form-control"
                                                       aria-describedby="basic-addon1"
                                                       name="std_bidding_amount"
                                                       value="{{$adgroup->adgroupDetail->std_bidding_amount}}"
                                                       id="adgroup-std-bidding-amount-add">
                                                <span class="text-danger">
                                                  <strong id="error-bidding-amount"></strong>
                                            </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--                            <div class="panel panel-default">--}}
                    {{--                                <div class="panel-heading" role="tab" id="headingThree">--}}
                    {{--                                    <h4 class="panel-title">--}}
                    {{--                                        <a class="collapsed" role="button" data-toggle="collapse"--}}
                    {{--                                           data-parent="#accordion" href="#collapseCreative" aria-expanded="false"--}}
                    {{--                                           aria-controls="collapseThree">--}}
                    {{--                                            Creative--}}
                    {{--                                        </a>--}}
                    {{--                                    </h4>--}}
                    {{--                                </div>--}}
                    {{--                                <div id="collapseCreative" class="panel-collapse collapse" role="tabpanel"--}}
                    {{--                                     aria-labelledby="headingThree">--}}
                    {{--                                    <div class="panel-body">--}}
                    {{--                                        <div class="panel-body-content">--}}
                    {{--                                            <div class="form-group row">--}}
                    {{--                                                <label for="example-text-input"--}}
                    {{--                                                       class="col-2 col-form-label">Title</label>--}}
                    {{--                                                <div class="col-8">--}}
                    {{--                                                    <input class="form-control"--}}
                    {{--                                                           type="text"--}}
                    {{--                                                           id="campaign-title-add"--}}
                    {{--                                                           name="title"--}}
                    {{--                                                    >--}}
                    {{--                                                </div>--}}
                    {{--                                            </div>--}}
                    {{--                                            <div class="form-group row">--}}
                    {{--                                                <label for="example-text-input"--}}
                    {{--                                                       class="col-2 col-form-label">Description</label>--}}
                    {{--                                                <div class="col-8">--}}
                    {{--                                                    <input class="form-control"--}}
                    {{--                                                           type="text"--}}
                    {{--                                                           value=""--}}
                    {{--                                                           id="campaign-description-add"--}}
                    {{--                                                           name="description">--}}
                    {{--                                                </div>--}}
                    {{--                                            </div>--}}
                    {{--                                            <div class="form-group row">--}}
                    {{--                                                <label for="example-text-input"--}}
                    {{--                                                       class="col-2 col-form-label">Creative Preview</label>--}}
                    {{--                                                <div class="col-4 file-upload">--}}
                    {{--                                                    <input type="file" id="campaign-file-add"--}}
                    {{--                                                           name="creativepreview"--}}
                    {{--                                                           onchange="readURL(this);">--}}
                    {{--                                                </div>--}}
                    {{--                                            </div>--}}
                    {{--                                            <div class="form-group row">--}}
                    {{--                                                <label for="example-text-input"--}}
                    {{--                                                       class="col-2 col-form-label"></label>--}}
                    {{--                                                <div class="col-4" id="preview-image-wrap" hidden>--}}
                    {{--                                                    <img id="preview-image" src="#" alt="preview image"--}}
                    {{--                                                    />--}}
                    {{--                                                </div>--}}
                    {{--                                            </div>--}}
                    {{--                                            <div class="form-group row">--}}
                    {{--                                                <label for="example-text-input"--}}
                    {{--                                                       class="col-2 col-form-label">Final URL</label>--}}
                    {{--                                                <div class="col-8">--}}
                    {{--                                                    <input class="form-control"--}}
                    {{--                                                           type="text"--}}
                    {{--                                                           name="finalurl"--}}
                    {{--                                                           id="campaign-final-url-add">--}}
                    {{--                                                </div>--}}
                    {{--                                            </div>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-primary btn-block"
                            id="submitFormAdd" onclick="updateAdGroup()">UPDATE
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

