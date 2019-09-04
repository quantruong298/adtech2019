<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@extends('layouts.app')

@section('content')
    <div class="container-fluid d-flex" >
        <div id="menu" class="col-2 mr-auto flex-fill p-0 ">
            <div id="menu_admin" class="">
                <div id="sidebar" class="">
                    <h2>DashBoard</h2>
                    <hr class="p-o m-0">
                    <ul id="menu_admin_users" class="nav nav-pills nav-fill">
                        <li class="nav-item m-0 p-0">
                            <a class="nav-link text-left" href="#">
                                <i class="fa fa-users"></i> User Management</a>
                        </li>
                    </ul>
                    <ul id="menu_admin_catalogs" class="nav nav-pills nav-fill">
                        <li class="nav-item m-0 p-0">
                            <a class="nav-link text-left" href="#">
                                <i class="fa fa-list"></i> Catalog Management</a>
                        </li>
                    </ul>
                    <ul id="menu_admin_products" class="nav nav-pills nav-fill">
                        <li class="nav-item m-0 p-0">
                            <a class="nav-link text-left" href="#">
                                <i class="fa fa-product-hunt"></i> Product Management</a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
        <div id="content" class=" col-10 flex-fill bg-white m-0 p-0">
            <div class="table-wrapper table-responsive">
                <div class="table-title flex-fill">
                    <div class="row p-0 m-0">
                        <div >
                            <h2>User <b>Management</b></h2>
                        </div>
                        <div class=" p-0 m-0 ml-auto">
                            <button onclick="getAddModal()" class="btn btn-primary" ><i class="fa fa-plus" aria-hidden="true"></i><span>Add New User</span></button>
                        </div>
                    </div>
                </div>
                <table class="table table-striped  table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Gender</th>
                        <th>Age</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($getListUser as $key => $data)
                    <tr id="rowUser{{$data->id}}">
                        <td class="align-middle">{{$data->id }}</td>
                        <td class="align-middle">{{$data->name }}</td>
                        <td class="align-middle">{{$data->email }}</td>
                        @if($data->status_id == \App\Enums\Status::ACTIVE)
                            <td class="align-middle"><span class="status text-success">•</span>Active</td>
                            @elseif($data->status_id == \App\Enums\Status::NONE_ACTIVE)
                            <td class="align-middle"><span class="status text-danger">•</span>Non active</td>
                            @else
                            <td class="align-middle"><span class="status text-dark">•</span>Blocked</td>
                            @endif
                        @if($data->gender == 0)
                            <td class="align-middle">Female</td>
                        @else
                            <td class="align-middle">Male</td>
                        @endif
                        <td class="align-middle">{{date('Y')-$data->year_of_birth}}</td>
                        <td class="align-middle">{{$data->role->name}}</td>
                        <td class="align-middle">
                            <div class="btn-group " >
                                <button type="button"  class="btn-lg bg-info  m-1 text-white"
                                    onclick="getEditModal({{$data->id}})">
                                    <i class="fa fa-edit text-white"></i>
                                </button>
{{--                                @if(($data->role_id) != (\App\Enums\UserEnums::ADMIN))--}}
                                    <button type="button" class="btn-lg bg-danger  m-1 text-white"
                                            onclick="deleteUser({{$data->id}})">
                                        <i class="fa fa-trash"></i>
                                    </button>

{{--                                @endif--}}
                            </div>

                        </td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="clearfix mx-auto">

                </div>
            </div>
            <div class="pagination-list-user justify-content-center d-flex">
                <div class="m-auto align-content-center align-items-center">{{$getListUser->links()}}</div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
         aria-hidden="true">
    </div>
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
         aria-hidden="true">
    </div>
{{--    @component('Component.Admin.add')--}}
{{--    @endcomponent--}}

@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('js/user.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
@endsection