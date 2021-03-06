<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold text-primary ml-5">Update Ad</h4>
            <button type="button" class="close text-primary" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body mx-3">
            <form method="POST" id="formUpdateAd" enctype="multipart/form-data" action="{{route('ads.update',$ad->id)}}">
                @method('PUT')
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
                                                   value="{{$ad->name}}"
                                                   id="ad-name-add">
                                            <span class="text-danger">
                                                  <strong id="error-name"></strong>
                                            </span>
                                        </div>
                                    </div>
{{--                                    <div class="form-group row">--}}
{{--                                        <label for="example-text-input"--}}
{{--                                               class="col-2 col-form-label">Campaign</label>--}}
{{--                                        <div class="col-4">--}}
{{--                                            <select class="form-control"--}}
{{--                                                    name="campaign_id"--}}
{{--                                                    id="ad-campaign-id-add">--}}
{{--                                                @foreach($campaigns as $campaign)--}}
{{--                                                    <option value="{{$campaign->id}}">{{$campaign->name}}</option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <div class="form-group row">
                                        <label for="example-text-input"
                                               class="col-2 col-form-label">AdGroup</label>
                                        <div class="col-4">
                                            <select class="form-control"
                                                    name="ad_group_id"
                                                    id="ad-adgroup-id-add" onchange="getAdGroupDetail(this)">
                                                @foreach($adgroups as $adgroup)
                                                    <option value="{{$adgroup->id}}" @if($adgroup->id==$ad->ad_group_id) selected @endif>{{$adgroup->name}}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">
                                                  <strong id="error-adgroup"></strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="adgroupDetail"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse"
                                   data-parent="#accordion" href="#collapseDetail" aria-expanded="false"
                                   aria-controls="collapseTwo">
                                    Detail
                                </a>
                            </h4>
                        </div>
                        <div id="collapseDetail" class="panel-collapse collapse" role="tabpanel"
                             aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <div class="panel-body-content">
                                    <div class="form-group row">
                                        <label for="creative-preview-add"
                                               class="col-2 col-form-label">Flag</label>
                                        <div class="form-check col-3">
                                            <input class="form-check-input" type="radio" name="flag_id" id="exampleRadios1" value="1" @if($ad->flag_id==1) checked @endif>
                                            <label class="form-check-label" for="exampleRadios1">
                                                Available <i class="material-icons" style="color:green">check</i>
                                            </label>
                                        </div>
                                        <div class="form-check col-3">
                                            <input class="form-check-input" type="radio" name="flag_id" id="exampleRadios1" value="2" @if($ad->flag_id==2) checked @endif>
                                            <label class="form-check-label" for="exampleRadios1">
                                                Suspended <i class="material-icons" style="color:orangered">block</i>
                                            </label>
                                        </div>
                                        <div class="form-check col-3">
                                            <input class="form-check-input" type="radio" name="flag_id" id="exampleRadios1" value="3" @if($ad->flag_id==3) checked @endif>
                                            <label class="form-check-label" for="exampleRadios1">
                                                Deleted <i class="material-icons" style="color:red">delete</i>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input"
                                               class="col-2 col-form-label">Creative Type</label>
                                        <div class="col-4">
                                            <select class="form-control"
                                                    name="creative_type_id"
                                                    id="ad-objective-add">
                                                @foreach($creativeTypes as $creativeType)
                                                    <option value="{{$creativeType->id}}" @if($creativeType->id==$ad->adDetail->creative_type_id) selected @endif>{{$creativeType->name}}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">
                                                  <strong id="error-creative-type"></strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="creative-preview-add"
                                               class="col-2 col-form-label">Creative Preview</label>
                                        <div class="col-8">
                                            <input class="form-control"
                                                   type="file"
                                                   name="creative_preview"
                                                   id="creative-preview-add" onchange="readURL(this);">
                                            <span class="text-danger">
                                                  <strong id="error-creative-preview"></strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input"
                                               class="col-2 col-form-label"></label>
                                        <div class="col-4" id="preview-image-wrap">
                                            <img class="preview-image" src="{{\JD\Cloudder\Facades\Cloudder::show($ad->adDetail->creative_preview)}}" alt="preview image"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input"
                                               class="col-2 col-form-label">URL</label>
                                        <div class="col-8">
                                            <input class="form-control"
                                                   type="text"
                                                   name="url"
                                                   id="ad-creative-preview-add"
                                                   value={{$ad->adDetail->url}}>
                                            <span class="text-danger">
                                                  <strong id="error-url"></strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input"
                                               class="col-2 col-form-label">Spent</label>
                                        <div class="col-8">
                                            <input class="form-control"
                                                   type="text"
                                                   name="spent"
                                                   id="ad-kpi-add" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input"
                                               class="col-2 col-form-label">Click Through Rate</label>
                                        <div class="col-8">
                                            <input class="form-control"
                                                   type="text"
                                                   name="click_through_rate"
                                                   id="ad-kpi-add" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-text-input"
                                               class="col-2 col-form-label">Cost Bidding</label>
                                        <div class="col-8">
                                            <input class="form-control"
                                                   type="text"
                                                   name="cost_bidding"
                                                   id="ad-kpi-add"
                                                    value="{{$ad->adDetail->cost_bidding}} ">
                                            <span class="text-danger">
                                                  <strong id="error-cost-bidding"></strong>
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
                                        @php($pf = explode(' ',$ad->adDetail->period_from))
                                        <label for="example-text-input"
                                               class="col-2 col-form-label">Period from</label>
                                        <div class="col-4">
                                            <input class="form-control"
                                                   type="date"
                                                   name="period_from_date"
                                                   id="ad-start-day-add"
                                                   value={{$pf[0]}}>
                                            <span class="text-danger">
                                                  <strong id="error-period-from-date"></strong>
                                            </span>
                                        </div>
                                        <div class="col-4">
                                            <input class="form-control"
                                                   type="time"
                                                   name="period_from_time"
                                                   id="ad-start-time-add"
                                                   value={{$pf[1]}}>
                                            <span class="text-danger">
                                                  <strong id="error-period-from-time"></strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        @php($pt = explode(' ',$ad->adDetail->period_to))
                                        <label for="example-text-input"
                                               class="col-2 col-form-label">Period to</label>
                                        <div class="col-4">
                                            <input class="form-control"
                                                   type="date"
                                                   name="period_to_date"
                                                   id="ad-end-day-add"
                                                   value={{$pt[0]}}>
                                            <span class="text-danger">
                                                  <strong id="error-period-to-date"></strong>
                                            </span>
                                        </div>
                                        <div class="col-4">
                                            <input class="form-control"
                                                   type="time"
                                                   name="period_to_time"
                                                   id="ad-end-time-add"
                                                   value={{$pt[1]}}>
                                            <span class="text-danger">
                                                  <strong id="error-period-to-time"></strong>
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
                                                       name="ads_period_budget"
                                                       value="{{$ad->adDetail->ads_period_budget}}"
                                                       id="ad-period-budget-add">
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
                                                       name="ads_period_budget_from"
                                                       value="{{$ad->adDetail->ads_period_budget_from}}"
                                                       id="ad-period-budget-add">
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
                                                       name="ads_period_budget_to"
                                                       value="{{$ad->adDetail->ads_period_budget_to}}"
                                                       id="ad-period-budget-add">
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
                                                       value="{{$ad->adDetail->std_daily_budget}}"
                                                       id="ad-daily-budget-add">
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
                                                       value="{{$ad->adDetail->std_bidding_amount}}"
                                                       id="ad-daily-budget-add">
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
                    <div class="loading text-center"></div>
                    <button type="button" class="btn btn-primary btn-block"
                            id="submitFormAdd" onclick="updateAd()">UPDATE
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

