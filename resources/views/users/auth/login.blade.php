@extends('users.layout')
@section('content')

<div class="bg-light">
    <div class="container user-page text-el-blue w-75 py-5">
        <div class="user-page-content d-flex flex-wrap">
            <div class="col-12 col-md-4 bg-el-blue d-flex align-items-center justify-content-center">
                <img src="/images/logo-white.png" class="w-75 p-3">
            </div>
            <div class="user-login col-12 col-md-8 bg-white">
                {{-- <p class="text-center">Login</p> --}}
                <div class="px-3 px-md-3 py-4">
                    <form action="{{route('user.authenticate')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                          <small for="userEmail" class="form-label">Email</small>
                          <input type="email" class="form-control shadow-none"  placeholder="Enter your email" name='email'>
                        </div>
                        {{-- {{$errors}} --}}
                        {{-- @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <span>555</span>
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                        <div class="mb-3">
                          <small for="userPassword" class="form-label">Password</small>
                          <input type="password" class="form-control shadow-none"  placeholder="Enter your password" name='password'>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <small class="" role="button" id='forgotPassword' data-bs-toggle="modal" data-bs-target="#forgotPwdModal">Forget password?</small>
                        <button type="submit" class="bg-el-blue border-0 rounded text-light w-100 py-2 mt-4">Login</button>
                    </form>
                </div>
                <div class="text-end"><a href="{{ route('user.register') }}" class="text-secondary small ">Create an account</a></div>
                
            </div>
        </div>
    </div>
</div>
    {{-- forgot password --}}
        
        <!-- Modal -->
        <div class="modal fade" id="forgotPwdModal" tabindex="-1"  aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Reset Password</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('user.password.forgot') }}">
                        @csrf
                        <div class="modal-body">
                            <input type="email" class="form-control shadow-none"  placeholder="Enter your email" name='email'>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn bg-el-blue text-light">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection