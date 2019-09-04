<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Edit user</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="form-edit-user" action="/publisher/social_accounts/{{$user->id}}">
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

            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="submitFormEditUser({{$user->id}})">Save changes
            </button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>