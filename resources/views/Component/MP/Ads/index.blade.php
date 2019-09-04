<div id="content" class=" col-10 flex-fill bg-white m-0 p-0">
    <div class="table-wrapper table-responsive">
        <div class="table-title flex-fill">
            <div class="row p-0 m-0">
                <div >
                    <h2>Ads <b>Management</b></h2>
                </div>
                <div class=" p-0 m-0 ml-auto">
                    <button onclick="addAd()" class="btn btn-primary" ><i class="fa fa-plus" aria-hidden="true"></i><span> New Add</span></button>
                </div>
            </div>
        </div>
        <table class="table table-striped  table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Campaign's Name</th>
                <th>AdGroup's Name</th>
{{--                <th>Media</th>--}}
{{--                <th>Account</th>--}}
{{--                <th>KPI</th>--}}
{{--                <th>Objective</th>--}}
{{--                <th>Period From</th>--}}
{{--                <th>Period To</th>--}}
{{--                <th>Budget Type</th>--}}
{{--                <th>Period Budget</th>--}}
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
                    <td class="align-middle">{{$ad->campaign->name }}</td>
                    <td class="align-middle">{{$ad->adGroup->name }}</td>
{{--                    <td class="align-middle">{{$ad->period_from }}</td>--}}
{{--                    <td class="align-middle">{{$ad->period_to}}</td>--}}
{{--                    <td class="align-middle">{{$ad->period_budget}}</td>--}}
                    <td class="align-middle">{{$ad->flag->flag_name }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="clearfix mx-auto"></div>
        <div class="pagination-list-user justify-content-center d-flex">
            <div class="m-auto align-content-center align-items-center">{{$ads->links()}}</div>
        </div>
        <div class="modal fade" id="addAd" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
             aria-hidden="true">
        </div>
    </div>
    <div class="pagination-list-user justify-content-center d-flex">
        {{--                <div class="m-auto align-content-center align-items-center">{{$getListUser->links()}}</div>--}}
    </div>
</div>
