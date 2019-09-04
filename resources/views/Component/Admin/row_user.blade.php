
    <td class="align-middle">{{$data->id }}</td>
    <td class="align-middle">{{$data->name }}</td>
    <td class="align-middle">{{$data->email }}</td>
    @if($data->status == \App\Enums\Status::ACTIVE)
        <td class="align-middle"><span class="status text-success">•</span>Active</td>
    @elseif($data->status == \App\Enums\Status::NONE_ACTIVE)
        <td class="align-middle"><span class="status text-danger">•</span>Non active</td>
    @else
        <td class="align-middle"><span class="status text-dark">•</span>Blocked</td>
    @endif
    @if($data->gender == 0)
        <td class="align-middle">Male</td>
    @else
        <td class="align-middle">Female</td>
    @endif
    <td class="align-middle">{{date('Y')-$data->year_of_birth}}</td>
    <td class="align-middle">{{$data->role->name}}</td>
    <td class="align-middle">
        <div class="btn-group " >
            <button type="button"  class="btn-lg bg-info  m-1 text-white"
                    onclick="getEditModal({{$data->id}})">
                <i class="fa fa-edit text-white"></i>
            </button>
            <button type="button" onclick="deleteUser({{$data->id}})" class="btn-lg bg-danger  m-1 text-white">
                <i class="fa fa-trash"></i>
            </button>

            {{--                                @endif--}}
        </div>

    </td>

