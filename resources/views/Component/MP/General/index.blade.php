    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="/mp">Campaigns</a>
        </li>
    </ul>
    <table class="table table-striped  table-hover">
        <thead>
        <tr>
            <th class="text-lg-center">#</th>
            <th class="text-lg-center">Name</th>
            <th class="text-lg-center">Advertiser</th>
            <th class="text-lg-center">Media</th>
            {{--                <th>KPI</th>--}}
            {{--                <th>Objective</th>--}}
{{--            <th>Period From</th>--}}
{{--            <th>Period To</th>--}}
            {{--                <th>Budget Type</th>--}}
            {{--                <th>Period Budget</th>--}}
{{--            <th>Daily Budget</th>--}}
{{--            <th>Standard Daily Budget</th>--}}
            {{--                <th>Bidding Method</th>--}}
            <th class="text-lg-center">Status</th>
             <th class="text-lg-center">Flag</th>
             <th class="text-lg-center">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($campaigns as $campaign)
            <tr id="rowCampaign{{$campaign->id}}" ondblclick="getAdGroupsByCampaignId({{$campaign->id}})">
                <td class="align-middle text-lg-center">{{$campaign->id}}</td>
                <td class="align-middle text-lg-center">{{$campaign->name}}</td>
                <td class="align-middle text-lg-center">{{$campaign->advertiser_email}}</td>
                <td class="align-middle text-lg-center">{{$campaign->media->name}}</td>
{{--                <td class="align-middle">{{$campaign->campaign_name }}</td>--}}
{{--                <td class="align-middle">{{$campaign->period_from}}</td>--}}
{{--                <td class="align-middle">{{$campaign->period_to}}</td>--}}
{{--                <td class="align-middle">{{$campaign->period_budget}}</td>--}}
{{--                <td class="align-middle">{{$campaign->standard_daily_budget}}</td>--}}
                <td class="align-middle text-lg-center">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="customSwitch1" @if($campaign->campaignDetail->status==1)checked @endif disabled>
                        <label class="custom-control-label" for="customSwitch1"></label>
                    </div>
                </td>
                <td class="align-middle text-lg-center">
                    @if($campaign->flag_id==1)
                        <i class="material-icons" style="color:green">check</i>
                    @elseif($campaign->flag_id==2)
                        <i class="material-icons" style="color:orangered">block</i>
                    @else
                        <i class="material-icons" style="color:red">delete</i>
                    @endif
                </td>
                <td class="align-middle text-lg-center">
                    <div class="btn-group">
                        <button type="button"  class="btn-lg bg-info  m-1 text-white"
                                onclick="editCampaign('mp/campaigns/{{$campaign->id}}/edit')">
                            <i class="fa fa-edit text-white"></i>
                        </button>
                        {{--                                                            @if(($campaign->role_id) != (\App\Enums\UserEnums::ADMIN))--}}
                        {{--                            <button type="button" class="btn-lg bg-danger  m-1 text-white"--}}
                        {{--                                    onclick="deleteUser({{$campaign->id}})">--}}
                        {{--                                <i class="fa fa-trash"></i>--}}
                        {{--                            </button>--}}

                        {{--                                                            @endif--}}
                    </div>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="clearfix mx-auto"></div>
    <div class="pagination-list-user justify-content-center d-flex">
        <div class="m-auto align-content-center align-items-center">{{$campaigns->links()}}</div>
    </div>
    <div class="row d-flex justify-content-center modalWrapper">
        <div class="modal fade addNewInputs" id="editCampaign" tabindex="-1" role="dialog"
             aria-labelledby="editModal"
             aria-hidden="true">
        </div>
    </div>
