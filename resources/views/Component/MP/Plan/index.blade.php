<div id="content" class=" col-10 flex-fill bg-white m-0 p-0">
    <div class="table-wrapper table-responsive">
        <div class="table-title flex-fill">
            <div class="row p-0 m-0">
                <div >
                    <h2>Plan <b>Management</b></h2>
                </div>
                <div class=" p-0 m-0 ml-auto">
                    <button onclick="addPlan()" class="btn btn-primary" ><i class="fa fa-plus" aria-hidden="true"></i><span> New Plan</span></button>
                </div>
            </div>
        </div>
        <table class="table table-striped  table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Media</th>
                <th>Campaign's Name</th>
{{--                <th>AdGroup's Name</th>--}}
                <th>Area Name</th>
                <th>Period From</th>
                <th>Period To</th>
                <th>Flag</th>
            </tr>
            </thead>
                <tbody>
                @foreach($plans as $plan)
                    <tr id="rowUser{{$plan->id}}">
                        <td class="align-middle">{{$plan->id }}</td>
                        <td class="align-middle">{{$plan->media->name}}</td>
                        <td class="align-middle">{{$plan->campaign->name }}</td>
{{--                        <td class="align-middle">{{$plan->adGroup->name }}</td>--}}
                        <td class="align-middle">{{$plan->area_name }}</td>
                        <td class="align-middle">{{$plan->period_from }}</td>
                        <td class="align-middle">{{$plan->period_to}}</td>
                        <td class="align-middle">
                            @if($plan->flag_id==1)
                                <i class="material-icons" style="color:green">check</i>
                            @elseif($plan->flag_id==2)
                                <i class="material-icons" style="color:orangered">delete</i>
                            @else
                                <i class="material-icons" style="color:red">block</i>
                            @endif
                        </td>
                        <td class="align-middle">
                            <div class="btn-group " >
                                <button type="button"  class="btn-lg bg-info  m-1 text-white"
                                        onclick="editPlan('plans/{{$plan->id}}/edit')">
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
            <div class="m-auto align-content-center align-items-center">{{$plans->links()}}</div>
        </div>
        <div class="modal fade" id="addPlan" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
             aria-hidden="true">
        </div>
        <div class="modal fade" id="editPlan" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
             aria-hidden="true">
        </div>
    </div>
    <div class="pagination-list-user justify-content-center d-flex">
        {{--                <div class="m-auto align-content-center align-items-center">{{$getListUser->links()}}</div>--}}
    </div>
</div>