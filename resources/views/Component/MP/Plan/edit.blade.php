    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update plan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formUpdatePlan" method="post" action="plans/{{$plan->id}}">
                    @csrf
                    <div class="form-group row">
                        <label for="example-text-input"
                               class="col-2 col-form-label">Area Name</label>
                        <div class="col-8">
                            <input class="form-control"
                                   type="text"
                                   name="area_name"
                                   id="campaign-name-add"
                                   value="{{$plan->area_name}}">
                            <span class="text-danger">
                                <strong id="error-area-name"></strong>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        @php($pf = explode(' ',$plan->period_from))
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
                        @php($pt = explode(' ',$plan->period_to))
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
                        <span class="text-danger">
                            <strong id="error-period-to"></strong>
                        </span>
                    </div>
                    {{--                    <div class="form-group row">--}}
                    {{--                        <label for="example-text-input"--}}
                    {{--                               class="col-5 col-form-label">Campaign Period Budget</label>--}}
                    {{--                        <div class="col-4">--}}
                    {{--                            <div class="input-group mb-3">--}}
                    {{--                                <div class="input-group-prepend">--}}
                    {{--                                    <span class="input-group-text" id="basic-addon1">$</span>--}}
                    {{--                                </div>--}}
                    {{--                                <input type="number" class="form-control"--}}
                    {{--                                       aria-describedby="basic-addon1"--}}
                    {{--                                       name="period_budget"--}}
                    {{--                                       id="campaign-budget-add">--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    <div class="form-group row">
                        <label for="example-text-input"
                               class="col-2 col-form-label">Campaign</label>
                        <div class="col-4">
                            <select class="form-control"
                                    name="campaign_id"
                                    id="ag-media-add" onchange="getCampaignDetail(this)">
                                @foreach($campaigns as $campaign)
                                    <option value="{{$campaign->id}}" @if($campaign->id==$plan->campaign_id) selected @endif>{{$campaign->name}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">
                                <strong id="error-campaign"></strong>
                            </span>
                        </div>
                    </div>
                    {{--                    <div class="form-group">--}}
                    {{--                        <ul class="list-ads">--}}
                    {{--                            @foreach($ads as $ad)--}}
                    {{--                                <li  onclick="getAdDetail('ads/detail/{{$ad->ad_id}}')">--}}
                    {{--                                    {{$ad->ad_name}}--}}
                    {{--                                    <input type="checkbox" name="ads" value="{{$ad->ad_id}}">--}}
                    {{--                                </li>--}}
                    {{--                            @endforeach--}}
                    {{--                        </ul>--}}
                    {{--                    </div>--}}
                    <div class="form-group">
                        <div class="campaignDetail"></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="loading text-center"></div>
                <button type="button" class="btn btn-primary" onclick="updatePlan()">Update</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>