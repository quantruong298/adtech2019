<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Edit user</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="form-edit-user" action="users/{{$user->id}}">
                @csrf
                <div class="row form-group ">
                    <span class="col-3 align-middle m-auto">
                        Name
                    </span>
                    <input type="text"
                           class="col-9 form-control form-control-user @error('name') is-invalid @enderror"
                           required name="name" value="{{$user->name}}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                    @enderror
                </div>
                <div class="row form-group">
                    <span class="col-3 align-middle m-auto">
                        Email
                    </span>
                    <input type="email"
                           class="col-9 form-control form-control-user @error('email') is-invalid @enderror"
                           required disabled
                           name="email" value="{{$user->email}}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                    @enderror
                </div>
                <div class="row w-100 form-group form-check-inline">
                    <span class="col-3 align-middle m-auto">
                        Gender
                    </span>
                    <div class="col-9">
                        <input type="radio" class="form-check-input" name="gender" value="1">Female
                        <input type="radio"
                               class="form-check-input @error('gender') is-invalid @enderror"
                               value="0" checked name="gender" required>Male
                        @error('gender')
                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                        @enderror
                    </div>

                </div>
                <div class="row form-group">
                    <span class="col-3 align-middle m-auto">
                        Birth Year
                    </span>
                    <select class="col-9 form-control @error('year_of_birth') is-invalid @enderror"
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
                    @error('year_of_birth')
                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                    @enderror
                </div>
                <div class="row w-100 form-group form-check-inline">
                     <span class="col-3 align-middle m-auto">
                        Status
                    </span>
                    <div class="col-9">
                        <input type="radio" class="form-check-input @error('gender') is-invalid @enderror"
                               name="status" value="0" @if($user->status==0) checked @endif>Unactive
                        <input type="radio"
                               class="form-check-input"
                               value="1" name="status" @if($user->status==1) checked @endif>Active
                        <input type="radio"
                               class="form-check-input "
                               value="2" name="status" @if($user->status==2) checked @endif>Block
                        @error('status')
                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                        @enderror</div>
                </div>

                <div class="row form-group">
                    <span class="col-3 align-middle m-auto">
                        Role
                    </span>
                    <select class="col-9 form-control @error('role') is-invalid @enderror"
                            name="role">


                        @foreach($roles as $role)
                            <option value="{{$role->id}}"
                                    @if($role->id == $user->roles[0]->id)
                                    selected
                                    @endif>
                                {{$role->name}}
                            </option>
                        @endforeach
                    </select>
                    @error('role')
                    <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                    @enderror
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="submitFormEditUser()">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>