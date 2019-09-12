
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link " href="/mp">Campaigns</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="javascript:void (0)" onclick="getAdGroupsByCampaignId({{$campaignId}})">AdGroups</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="#">Ads</a>
    </li>
</ul>
@if(!$ads->isEmpty())
<table class="table table-striped  table-hover">
    <thead>
    <tr>
        <th class="text-lg-center">#</th>
        <th class="text-lg-center">Name</th>
        <th class="text-lg-center">AdGroup's Name</th>
        {{--                <th>Media</th>--}}
        {{--                <th>Account</th>--}}
        {{--                <th>KPI</th>--}}
        {{--                <th>Objective</th>--}}
{{--        <th>Period From</th>--}}
{{--        <th>Period To</th>--}}
        {{--                <th>Budget Type</th>--}}
{{--        <th>Period Budget</th>--}}
        {{--                <th>Daily Budget</th>--}}
        {{--                <th>Bidding Method</th>--}}
        <th class="text-lg-center">Flag</th>
        <th class="text-lg-center">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($ads as $ad)
        <tr id="rowUser{{$ad->id}}">
            <td class="align-middle text-lg-center">{{$ad->id }}</td>
            <td class="align-middle text-lg-center">{{$ad->name }}</td>
            <td class="align-middle text-lg-center">{{$ad->adGroup->name }}</td>
            <td class="align-middle text-lg-center">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="status{{$ad->id}}" @if($ad->adDetail->status==1)checked @endif onchange="changeStatus(this,{{$ad->id}})">
                    <label class="custom-control-label" for="status{{$ad->id}}"></label>
                    <div id="status-{{$ad->id}}">
                        {{--                                <div class="lds-dual-ring" style="width:5px;height: 5px;"></div>--}}
                    </div>
                </div>
            </td>
            <td class="align-middle text-lg-center">
                @if($ad->flag_id==1)
                    <i class="material-icons" style="color:green">check</i>
                @elseif($ad->flag_id==2)
                    <i class="material-icons" style="color:orangered">block</i>
                @else
                    <i class="material-icons" style="color:red">delete</i>
                @endif
            </td>
            <td class="align-middle text-lg-center">
                <div class="btn-group">
                    <button type="button"  class="btn-lg bg-info  m-1 text-white"
                            onclick="editAd('mp/ads/{{$ad->id}}/edit')">
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
{{--            <td class="align-middle">{{$ad->period_from }}</td>--}}
{{--            <td class="align-middle">{{$ad->period_to}}</td>--}}
{{--            <td class="align-middle">{{$ad->period_budget}}</td>--}}
        </tr>
    @endforeach
    </tbody>
</table>
<div class="clearfix mx-auto"></div>
<div class="pagination-list-user justify-content-center d-flex">
    <div class="m-auto align-content-center align-items-center">{{$ads->links()}}</div>
</div>
<div class="row d-flex justify-content-center modalWrapper">
    <div class="modal fade addNewInputs" id="editAd" tabindex="-1" role="dialog"
         aria-labelledby="editModal"
         aria-hidden="true">
    </div>
</div>
@else
    <h2>Empty!</h2>
@endif
