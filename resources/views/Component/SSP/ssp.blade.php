@extends('layouts.app')
@section('content')
    <div class="container d-flex">

        <div id="content" class=" col-10 flex-fill bg-white m-0 p-0">
            <div class="table-wrapper table-responsive">
                <div class="table-title flex-fill">
                    <div class="row p-0 m-0">
                        <div>
                            <h2>Domain <b>Management</b></h2>
                        </div>
                    </div>
                    <div class="clearfix">
                        <form action="{{route('SSP/ADD')}}" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" class="form-control @error('domain') is-invalid @enderror"
                                       placeholder="Type your domain..." name="domain"
                                       required
                                >
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-plus"
                                                                                     aria-hidden="true"></i><span>Add New Domain</span>
                                    </button>
                                </div>
                                @error('domain')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <div><span id="url"></span></div>
                            </div>
                        </form>
                    </div>
                </div>
                <table class="table table-striped  table-hover">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Domain</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($getListDomain as $key => $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td><a href="{{$data->domain}}">{{$data->domain}}</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="clearfix mx-auto">

                </div>
            </div>
            <div class="pagination-list-user justify-content-center d-flex">
                <div class="m-auto align-content-center align-items-center">{{$getListDomain->links()}}</div>
            </div>
        </div>
    </div>

@endsection