
    <td class="align-middle">{{$data->id }}</td>
    <td class="align-middle">{{$data->name }}</td>
    <td class="align-middle">{{$data->email }}</td>
    <td class="align-middle">
        <div class="btn-group " >
            <button type="button"  class="btn-lg bg-info  m-1 text-white"
                    onclick="getEditModal({{$data->id}})">
                <i class="fa fa-edit text-white"></i>
            </button>
            <button type="button" onclick="deleteUser({{$data->id}})" class="btn-lg bg-danger  m-1 text-white">
                <i class="fa fa-trash"></i>
            </button>
        </div>
    </td>

