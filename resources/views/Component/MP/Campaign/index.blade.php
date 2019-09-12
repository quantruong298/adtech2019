<div id="content" class=" col-10 flex-fill bg-white m-0 p-0">
    <div class="table-wrapper table-responsive">
        <div class="table-title flex-fill">
            <div class="row p-0 m-0">
                <div >
                    <h2>Campaign <b>Management</b></h2>
                </div>
                <div class=" p-0 m-0 ml-auto">
                    @if(\Request::is('mp/campaigns'))
                        <a class="mr-5" href="campaigns/deleted">Click to see deleted Campaigns</a>
                    @else
                        <a class="mr-5" href="{{route('campaigns.index')}}">&#8592Back</a>
                    @endif
                    <button onclick="addCampaign('campaigns/create')" class="btn btn-primary" ><i class="fa fa-plus" aria-hidden="true"></i><span> New Campaign</span></button>
                </div>
            </div>
        </div>
        <table class="table table-striped  table-hover">
            <thead>
            <tr>
                <th class="text-lg-center">#</th>
                <th class="text-lg-center">Name</th>
                <th class="text-lg-center">Advertiser</th>
                <th class="text-lg-center">Media</th>
                <th class="text-lg-center">KPI</th>
{{--                <th>Objective</th>--}}
                <th class="text-lg-center">Period From</th>
                <th class="text-lg-center">Period To</th>
{{--                <th>Budget Type</th>--}}
                <th class="text-lg-center">Period Budget</th>
{{--                <th>Daily Budget</th>--}}
{{--                <th>Standard Daily Budget</th>--}}
{{--                <th>Bidding Method</th>--}}
                <th class="text-lg-center">Status</th>
                <th class="text-lg-center">Flag</th>
                <th class="text-lg-center">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($campaigns as $campaign)
                <tr id="rowCampaign{{$campaign->id}}">
                    <td class="align-middle text-lg-center">{{$campaign->id}}</td>
                    <td class="align-middle text-lg-center">{{$campaign->name }}</td>
                    <td class="align-middle text-lg-center">{{$campaign->advertiser_email}}</td>
                    <td class="align-middle text-lg-center">{{$campaign->media->name}}</td>
                    <td class="align-middle text-lg-center">{{$campaign->campaignDetail->kpi }}</td>
                    <td class="align-middle text-lg-center">{{$campaign->campaignDetail->period_from}}</td>
                    <td class="align-middle text-lg-center">{{$campaign->campaignDetail->period_to}}</td>
                    <td class="align-middle text-lg-center">{{$campaign->campaignDetail->campaign_period_budget}}</td>
{{--                    <td class="align-middle">{{$campaign->standard_daily_budget}}</td>--}}
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
                                    onclick="editCampaign('campaigns/{{$campaign->id}}/edit')">
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
    </div>
    <div class="pagination-list-user justify-content-center d-flex">
        {{--                <div class="m-auto align-content-center align-items-center">{{$getListUser->links()}}</div>--}}
    </div>
    <div class="row d-flex justify-content-center modalWrapper">
        <div class="modal fade addNewInputs" id="addCampaign" tabindex="-1" role="dialog"
             aria-labelledby="addModal"
             aria-hidden="true">
        </div>
        <div class="modal fade addNewInputs" id="editCampaign" tabindex="-1" role="dialog"
             aria-labelledby="editModal"
             aria-hidden="true">
        </div>
    </div>
</div>