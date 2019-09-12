<div id="content" class=" col-10 flex-fill bg-white m-0 p-0">
    <div class="table-wrapper table-responsive">
        <div class="table-title flex-fill">
            <div class="row p-0 m-0">
                <div >
                    <h2>AdGroup <b>Management</b></h2>
                </div>
                <div class=" p-0 m-0 ml-auto">
                    @if(\Request::is('mp/adgroups'))
                        <a class="mr-5" href="adgroups/deleted">Click to see deleted AdGroups</a>
                        <button onclick="addAdGroup()" class="btn btn-primary" ><i class="fa fa-plus" aria-hidden="true"></i><span> New AdGroup</span></button>
                    @else
                        <a class="mr-5" href="{{route('adgroups.index')}}">&#8592Back</a>
                    @endif
                </div>
            </div>
        </div>
        <table class="table table-striped  table-hover">
            <thead>
            <tr>
                <th class="text-lg-center">#</th>
                <th class="text-lg-center">Name</th>
                <th class="text-lg-center">Campaign's Name</th>
{{--                <th>Period From</th>--}}
{{--                <th>Period To</th>--}}
{{--                <th>Period Budget</th>--}}
                <th class="text-lg-center">Status</th>
                <th class="text-lg-center">Flag</th>
                <th class="text-lg-center">Action</th>
            </tr>
            </thead>
                <tbody>
                @foreach($adgroups as $adgroup)
                    <tr id="rowUser{{$adgroup->id}}">
                        <td class="align-middle text-lg-center">{{$adgroup->id }}</td>
                        <td class="align-middle text-lg-center">{{$adgroup->name }}</td>
                        <td class="align-middle text-lg-center">{{$adgroup->campaign->name}}</td>
{{--                        <td class="align-middle">{{$adgroup->period_to}}</td>--}}
{{--                        <td class="align-middle">{{$adgroup->period_budget}}</td>--}}
                        <td class="align-middle text-lg-center">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch1" @if($adgroup->adGroupDetail->status==1)checked @endif disabled>
                                <label class="custom-control-label" for="customSwitch1"></label>
                            </div>
                        </td>
                        <td class="align-middle text-lg-center">
                            @if($adgroup->flag_id==1)
                                <i class="material-icons" style="color:green">check</i>
                            @elseif($adgroup->flag_id==2)
                                <i class="material-icons" style="color:orangered">block</i>
                            @else
                                <i class="material-icons" style="color:red">delete</i>
                            @endif
                        </td>
                        @if(\Request::is('mp/adgroups'))
                        <td class="align-middle text-lg-center">
                            <div class="btn-group">
                                <button type="button"  class="btn-lg bg-info  m-1 text-white"
                                        onclick="editAdGroup('{{route("adgroups.edit",$adgroup->id)}}')">
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
                        @endif
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
        <div class="modal fade" id="editAdGroup" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
             aria-hidden="true">
        </div>
    </div>
    <div class="pagination-list-user justify-content-center d-flex">
        {{--                <div class="m-auto align-content-center align-items-center">{{$getListUser->links()}}</div>--}}
    </div>
</div>