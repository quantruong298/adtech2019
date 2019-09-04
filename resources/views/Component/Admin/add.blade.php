<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Add user</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="form-add-user" method="post" action="{{route('admin.users.store')}}">
                @csrf
                <div class="form-group row">
                    <label class="col-3 align-middle m-auto">Name</label>
                    <input type="text"
                           class="form-control col-9 form-control-user"
                           required name="name">
                    <span class="text-danger">
                        <strong id="error-name"></strong>
                    </span>
                </div>
                <div class="form-group row">
                    <label class="col-3 align-middle m-auto">Email</label>
                    <input type="email"
                           class="col-9 form-control form-control-user"
                           required
                           name="email">
                    <span class="text-danger">
                        <strong id="error-email"></strong>
                    </span>
                </div>
                <div class="form-group row">
                    <label class="col-3 align-middle m-auto">Password</label>
                    <input type="password"
                           class="col-9 form-control form-control-user"
                           required
                           name="password">
                    <span class="text-danger">
                        <strong id="error-password"></strong>
                    </span>
                </div>
                <div class="form-group row">
                    <label class="col-3 align-middle m-auto">Retype Password</label>
                    <input type="password"
                           class="col-9 form-control form-control-user"
                           required
                           name="password_confirmation">
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
                        <strong id="error-gender"></strong>
                    </span>
                    </div>

                </div>


                <div class="row form-group">
                    <span class="col-3 align-middle m-auto">
                        Role
                    </span>
                    <select class="col-9 form-control"
                            name="role_id">
                        @foreach($roles as $role)
                            <option value="{{$role->id}}">
                                {{$role->name}}
                            </option>
                        @endforeach
                    </select>
                    <span class="text-danger">
                        <strong id="error-role"></strong>
                    </span>

                </div>


                <div class="row form-group">
                    <label class="col-3 align-middle m-auto">Birth year</label>
                    <select class="col-9 form-control"
                            name="year_of_birth">
                        {{--                                                        <option>Your Year of birth</option>--}}
                        <?php
                        for($i = date('Y');$i > 1900;$i--){?>
                        <option value="{{$i}}">{{$i}}</option>
                        <?php }?>
                    </select>
                    <span class="text-danger">
                        <strong id="error-year_of_birth"></strong>
                    </span>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="submitFormAddUser()">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>