        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold text-primary ml-5">Edit Campaign</h4>
                    <button type="button" class="close text-primary" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <form method="POST" id="formUpdateCampaign" enctype="multipart/form-data" action="{{route('campaigns.update',$campaign->id)}}">
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
                                                           value="{{$campaign->name}}"
                                                           id="campaign-name-add">
                                                    <span class="text-danger">
                                                        <strong id="error-name"></strong>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input"
                                                       class="col-2 col-form-label">Media</label>
                                                <div class="col-4">
                                                    <select class="form-control"
                                                            name="media_id"
                                                            id="campaign-media-add">
                                                        @foreach($medias as $media)
                                                            <option value="{{$media->id}}" @if($media->id==$campaign->media_id)  selected @endif>
                                                                {{$media->name}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger">
                                                        <strong id="error-media"></strong>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input"
                                                       class="col-2 col-form-label">Advertiser</label>
                                                <div class="col-4">
                                                    <select class="form-control"
                                                            name="advertiser_email"
                                                            id="campaign-advertiser-add">
                                                        @foreach($advertisers as $advertiser)
                                                            <option value="{{$advertiser->email}}" @if($advertiser->email==$campaign->advertiser_email)  selected @endif>
                                                                {{$advertiser->email}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger">
                                                        <strong id="error-advertiser"></strong>
                                                    </span>
                                                </div>
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
                                                <label for="example-text-input"
                                                       class="col-2 col-form-label">KPI</label>
                                                <div class="col-8">
                                                    <input class="form-control"
                                                           type="text"
                                                           name="kpi"
                                                           value="{{$campaign->campaignDetail->kpi}}"
                                                           id="campaign-kpi-add">
                                                    <span class="text-danger">
                                                        <strong id="error-kpi"></strong>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input"
                                                       class="col-2 col-form-label">Objective</label>
                                                <div class="col-4">
                                                    <select class="form-control"
                                                            name="objective_id"
                                                            id="campaign-objective-add">
                                                        @foreach($objectives as $objective)
                                                            <option value="{{$objective->id}}" @if($objective->id==$campaign->campaignDetail->objective_id)  selected @endif>
                                                                {{$objective->name}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger">
                                                        <strong id="error-objective"></strong>
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
                                                @php($pf = explode(' ',$campaign->campaignDetail->period_from))
                                                <label for="example-text-input"
                                                       class="col-2 col-form-label">Period from</label>
                                                <div class="col-4">
                                                    <input class="form-control"
                                                           type="date"
                                                           name="period_from_date"
                                                           id="campaign-start-day-add"
                                                           value={{$pf[0]}}>
                                                    <span class="text-danger">
                                                        <strong id="error-period-from-date"></strong>
                                                    </span>
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control"
                                                           type="time"
                                                           name="period_from_time"
                                                           id="campaign-start-time-add"
                                                           value={{$pf[1]}}>
                                                    <span class="text-danger">
                                                        <strong id="error-period-from-time"></strong>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                @php($pt = explode(' ',$campaign->campaignDetail->period_to))
                                                <label for="example-text-input"
                                                       class="col-2 col-form-label">Period to</label>
                                                <div class="col-4">
                                                    <input class="form-control"
                                                           type="date"
                                                           name="period_to_date"
                                                           id="campaign-end-day-add"
                                                           value={{$pt[0]}}>
                                                    <span class="text-danger">
                                                        <strong id="error-period-to-date"></strong>
                                                    </span>
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control"
                                                           type="time"
                                                           name="period_to_time"
                                                           id="campaign-end-time-add"
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
                                                       class="col-2 col-form-label">Budget Type</label>
                                                <div class="col-4">
                                                    <select class="form-control"
                                                            name="budget_type_id"
                                                            id="campaign-budget-type-add">
                                                        @foreach($budgetTypes as $budgetType)
                                                            <option value="{{$budgetType->id}}" @if($budgetType->id==$campaign->campaignDetail->budget_type_id)  selected @endif>
                                                                {{$budgetType->name}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger">
                                                        <strong id="error-budget-type"></strong>
                                                    </span>
                                                </div>
                                            </div>
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
                                                               name="campaign_period_budget"
                                                               value="{{$campaign->campaignDetail->campaign_period_budget}}"
                                                               id="campaign-period-budget-add">
                                                        <span class="text-danger">
                                                           <strong id="error-period-budget"></strong>
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
                                                               value="{{$campaign->campaignDetail->std_daily_budget}}"
                                                               id="campaign-daily-budget-add">
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
                                                       class="col-2 col-form-label">Bidding Method</label>
                                                <div class="col-4">
                                                    <select class="form-control"
                                                            name="std_bidding_method_id"
                                                            id="campaign-bidding-method-add">
                                                        @foreach($biddingMethods as $biddingMethod)
                                                            <option value="{{$biddingMethod->id}}" @if($biddingMethod->id==$campaign->campaignDetail->std_bidding_method_id)  selected @endif>
                                                                {{$biddingMethod->name}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger">
                                                           <strong id="error-bidding-method"></strong>
                                                    </span>
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
                                    id="submitFormAdd" onclick="updateCampaign()">UPDATE
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

