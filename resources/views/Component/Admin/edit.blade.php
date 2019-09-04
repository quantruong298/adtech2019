<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Edit user</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="form-edit-user" action="/admin/users/{{$user->id}}">
                @csrf
                <div class="row form-group ">
                    <span class="col-3 align-middle m-auto">
                        Name
                    </span>
                    <input type="text"
                           class="col-9 form-control form-control-user"
                           required name="name" value="{{$user->name}}">
                    <span class="text-danger">
                        <strong id="error-edit-name"></strong>
                    </span>
                </div>
                <div class="row form-group">
                    <span class="col-3 align-middle m-auto">
                        Email
                    </span>
                    <input type="email"
                           class="col-9 form-control form-control-user"
                           required disabled
                           name="email" value="{{$user->email}}">
                    <span class="text-danger">
                        <strong id="error-edit-email"></strong>
                    </span>
                </div>
                <div class="row w-100 form-group form-check-inline">
                    <span class="col-3 align-middle m-auto">
                        Gender
                    </span>
                    <div class="col-9">
                        <input type="radio" class="form-check-input" name="gender" value="1">
                        <span class="col-3 align-middle m-auto">
                                Female
                            </span>
                        <input type="radio"
                               class="form-check-input"
                               value="0" checked name="gender" required>
                        <span class="col-3 align-middle m-auto">
                                Male
                            </span>
                        <span class="text-danger">
                        <strong id="error-edit-gender"></strong>
                    </span>
                    </div>

                </div>

                <div class="row form-group">
                    <span class="col-3 align-middle m-auto">
                        Birth Year
                    </span>
                    <select class="col-9 form-control"
                            name="year_of_birth" id="sel1">

                        <?php
                        for($i = date('Y');$i > 1900;$i--){?>
                        <option value="{{$i}}"
                                @if($user->year_of_birth==$i)
                                selected
                                @endif>
                            {{$i}}
                        </option>
                        <?php }?>
                    </select>
                    <span class="text-danger">
                        <strong id="error-edit-year_of_birth"></strong>
                    </span>
                </div>
                <div class="row w-100 form-group form-check-inline">
                     <span class="col-3 align-middle m-auto">
                        Status
                    </span>
                    <div class="col-9">
                        <input type="radio"
                               class="form-check-input"
                               value="1" name="status_id" @if($user->status_id==1) checked @endif>Active
                        <input type="radio" class="form-check-input"
                               name="status_id" value="2" @if($user->status_id==2) checked @endif>Unactive
                        <input type="radio"
                               class="form-check-input "
                               value="3" name="status_id" @if($user->status_id==3) checked @endif>Block
                        <span class="text-danger">
                        <strong id="error-edit-status"></strong>
                    </span>
                    </div>
                </div>
                <div class="row form-group">
                    <span class="col-3 align-middle m-auto">
                        Role
                    </span>
                    <select class="col-9 form-control" name="role_id">


                        @foreach($roles as $role)
                            <option value="{{$role->id}}"
                                    @if($role->id == $user->role->id)
                                    selected
                                    @endif>
                                {{$role->name}}
                            </option>
                        @endforeach
                    </select>
                    <span class="text-danger">
                        <strong id="error-edit-role"></strong>
                    </span>
                </div>

            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="submitFormEditUser({{$user->id}})">Save changes
            </button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>