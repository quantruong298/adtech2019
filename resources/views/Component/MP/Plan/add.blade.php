    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add plan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formAddPlan" method="post" action="{{route('plans.store')}}">
                    @csrf
                    <div class="form-group row">
                        <label class="col-3 align-middle m-auto">Area Name</label>
                        <input type="text"
                               class="form-control col-9 form-control-user"
                               required name="area_name">
                        <span class="text-danger">
                            <strong id="error-name"></strong>
                        </span>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input"
                               class="col-3 col-form-label">Period from</label>
                            <input class="form-control col-4 form-control-user"
                                   type="date"
                                   name="period_from_date"
                                   id="campaign-start-day-add"
                                   value="2019-06-05">
                            <input class="form-control col-4 form-control-user"
                                   type="time"
                                   name="period_from_time"
                                   id="campaign-start-time-add"
                                   value="13:45:00">
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input"
                               class="col-3 col-form-label">Period to</label>
                        <input class="form-control col-4 form-control-user"
                               type="date"
                               name="period_to_date"
                               id="campaign-start-day-add"
                               value="2019-06-05">
                        <input class="form-control col-4 form-control-user"
                               type="time"
                               name="period_to_time"
                               id="campaign-start-time-add"
                               value="13:45:00">
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
                    <div class="row form-group">
                        <span class="col-3 align-middle m-auto">
                            Choose Campaign
                        </span>
                        <select class="col-9 form-control"
                                name="campaign_id" id="selectCampaign" onchange="getCampaignDetail(this)">
                            @foreach($campaigns as $campaign)
                                <option value="{{$campaign->campaign_id}}">
                                    {{$campaign->campaign_name}}
                                </option>
                            @endforeach
                        </select>
                        <span class="text-danger">
                            <strong id="error-campaign"></strong>
                        </span>
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
                        <div id="campaigndetail"></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="storePlan()">Create</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>