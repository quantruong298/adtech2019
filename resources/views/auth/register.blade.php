@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-xl-8 col-lg-10 col-md-10">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-10 mx-auto">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                    </div>
                                    <form method="post" action="{{route('register')}}">
                                        @csrf
                                        <div class="form-group ">
                                            <input type="text"
                                                   class="form-control form-control-user @error('name') is-invalid @enderror"
                                                   required name="name"
                                                   id="exampleFirstName" placeholder="Full name">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="email"
                                                   class="form-control form-control-user @error('email') is-invalid @enderror"
                                                   required
                                                   name="email" placeholder="Email address">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="password"
                                                       class="form-control form-control-user @error('password') is-invalid @enderror"
                                                       required
                                                       name="password" placeholder="Password">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control form-control-user"
                                                       required
                                                       name="password_confirmation" placeholder="Retype password">
                                            </div>
                                        </div>
                                        <div class="form-group form-check-inline radio-inline">

                                            <input type="radio" class="form-check-input" name="gender" value="1"><span class="mr-5">Female  </span>
                                            <input type="radio"
                                                   class="form-check-input @error('gender') is-invalid @enderror"
                                                   value="0" checked name="gender" required>Male
                                            @error('gender')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror</div>
                                        <div class="form-group">
                                            <select class="form-control @error('year_of_birth') is-invalid @enderror"
                                                    name="year_of_birth" id="sel1">
                                                <option>Your Year of birth</option>
                                                <?php
                                                for($i = date('Y');$i > 1900;$i--){?>
                                                <option value="{{$i}}">{{$i}}</option>
                                                <?php }?>
                                            </select>
                                            @error('year_of_birth')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            {{ __('Register') }}
                                        </button>

                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="" href="{{route('login')}}">Already have an account? Login!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
