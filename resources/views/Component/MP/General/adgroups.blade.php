<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link " href="/mp">Campaigns</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" href="#">AdGroups</a>
    </li>
</ul>
@if(!$adgroups->isEmpty())
<table class="table table-striped  table-hover">
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Campaign's Name</th>
{{--        <th>Period From</th>--}}
{{--        <th>Period To</th>--}}
{{--        <th>Period Budget</th>--}}
        <th>Flag</th>
    </tr>
    </thead>
    <tbody>
    @foreach($adgroups as $adgroup)
        <tr id="rowUser{{$adgroup->adgroup_id}}" ondblclick="getAdsByAdGroupId({{$adgroup->id}})">
            <td class="align-middle">{{$adgroup->id }}</td>
            <td class="align-middle">{{$adgroup->name }}</td>
            <td class="align-middle">{{$adgroup->campaign->name }}</td>
            <td class="align-middle">
                @if($adgroup->flag_id==1)
                    <i class="material-icons" style="color:green">check</i>
                @elseif($adgroup->flag_id==2)
                    <i class="material-icons" style="color:orangered">delete</i>
                @else
                    <i class="material-icons" style="color:red">block</i>
                @endif
            </td>
{{--            <td class="align-middle">{{$adgroup->period_from}}</td>--}}
{{--            <td class="align-middle">{{$adgroup->period_to}}</td>--}}
{{--            <td class="align-middle">{{$adgroup->period_budget}}</td>--}}
            <td class="align-middle">
                <div class="btn-group " >
                    <button type="button"  class="btn-lg bg-info  m-1 text-white"
                            onclick="editAdGroup('mp/adgroups/{{$adgroup->id}}/edit')">
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
<div class="row d-flex justify-content-center modalWrapper">
    <div class="modal fade addNewInputs" id="editAdGroup" tabindex="-1" role="dialog"
         aria-labelledby="editModal"
         aria-hidden="true">
    </div>
</div>
@else
    <h2>Empty!</h2>
@endif
