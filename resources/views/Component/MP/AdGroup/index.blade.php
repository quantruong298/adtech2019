<div id="content" class=" col-10 flex-fill bg-white m-0 p-0">
    <div class="table-wrapper table-responsive">
        <div class="table-title flex-fill">
            <div class="row p-0 m-0">
                <div >
                    <h2>AdGroup <b>Management</b></h2>
                </div>
                <div class=" p-0 m-0 ml-auto">
                    <button onclick="addAdGroup()" class="btn btn-primary" ><i class="fa fa-plus" aria-hidden="true"></i><span> New AdGroup</span></button>
                </div>
            </div>
        </div>
        <table class="table table-striped  table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Campaign's Name</th>
{{--                <th>Period From</th>--}}
{{--                <th>Period To</th>--}}
{{--                <th>Period Budget</th>--}}
                <th>Flag</th>
            </tr>
            </thead>
                <tbody>
                @foreach($adgroups as $adgroup)
                    <tr id="rowUser{{$adgroup->id}}">
                        <td class="align-middle">{{$adgroup->id }}</td>
                        <td class="align-middle">{{$adgroup->name }}</td>
                        <td class="align-middle">{{$adgroup->campaign->name}}</td>
{{--                        <td class="align-middle">{{$adgroup->period_to}}</td>--}}
{{--                        <td class="align-middle">{{$adgroup->period_budget}}</td>--}}
                        <td class="align-middle">{{$adgroup->flag->flag_name}}</td>
                        <td class="align-middle">
                            <div class="btn-group " >
                                <button type="button"  class="btn-lg bg-info  m-1 text-white"
                                        onclick="">
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
            <div class="m-auto align-content-center align-items-center">{{$adgroups->links()}}</div>
        </div>
        <div class="modal fade" id="addAdGroup" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
             aria-hidden="true">
        </div>
        <div class="modal fade" id="addAdGroup" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
             aria-hidden="true">
        </div>
    </div>
    <div class="pagination-list-user justify-content-center d-flex">
        {{--                <div class="m-auto align-content-center align-items-center">{{$getListUser->links()}}</div>--}}
    </div>
</div>