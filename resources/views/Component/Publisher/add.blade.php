<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Add user</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="form-add-user" method="post" action="{{route('publisher.social_accounts.store')}}">
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



            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="submitFormAddUser()">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>