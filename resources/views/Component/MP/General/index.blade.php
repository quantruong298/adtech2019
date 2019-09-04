    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="/mp">Campaigns</a>
        </li>
    </ul>
    <table class="table table-striped  table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Advertiser</th>
            <th>Media</th>
            {{--                <th>KPI</th>--}}
            {{--                <th>Objective</th>--}}
{{--            <th>Period From</th>--}}
{{--            <th>Period To</th>--}}
            {{--                <th>Budget Type</th>--}}
            {{--                <th>Period Budget</th>--}}
{{--            <th>Daily Budget</th>--}}
{{--            <th>Standard Daily Budget</th>--}}
            {{--                <th>Bidding Method</th>--}}
             <th>Flag</th>
        </tr>
        </thead>
        <tbody>
        @foreach($campaigns as $campaign)
            <tr id="rowCampaign{{$campaign->id}}" ondblclick="getAdGroupsByCampaignId({{$campaign->id}})">
                <td class="align-middle">{{$campaign->id}}</td>
                <td class="align-middle">{{$campaign->name}}</td>
                <td class="align-middle">{{$campaign->advertiser_email}}</td>
                <td class="align-middle">{{$campaign->media->name}}</td>
{{--                <td class="align-middle">{{$campaign->campaign_name }}</td>--}}
{{--                <td class="align-middle">{{$campaign->period_from}}</td>--}}
{{--                <td class="align-middle">{{$campaign->period_to}}</td>--}}
{{--                <td class="align-middle">{{$campaign->period_budget}}</td>--}}
{{--                <td class="align-middle">{{$campaign->standard_daily_budget}}</td>--}}
                <td class="align-middle">{{$campaign->flag->flag_name}}</td>
                <td class="align-middle">
                    <div class="btn-group " >
                        <button type="button"  class="btn-lg bg-info  m-1 text-white"
                                onclick="getEditModal({{$campaign->id}})">
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
