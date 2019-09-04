
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
        <th>#</th>
        <th>Name</th>
        <th>AdGroup's Name</th>
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
                        <th>Flag</th>
    </tr>
    </thead>
    <tbody>
    @foreach($ads as $ad)
        <tr id="rowUser{{$ad->id}}">
            <td class="align-middle">{{$ad->id }}</td>
            <td class="align-middle">{{$ad->name }}</td>
            <td class="align-middle">{{$ad->adGroup->name }}</td>
            <td class="align-middle">{{$ad->flag->flag_name }}</td>
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
@else
    <h2>Empty!</h2>
@endif
