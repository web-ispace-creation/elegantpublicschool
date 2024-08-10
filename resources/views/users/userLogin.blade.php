@extends('users.layout')
@section('content')

<div class="bg-light">
    <div class="container user-page text-el-blue w-75">
        <div class="user-page-content d-flex flex-wrap">
            <div class="col-12 col-md-4 bg-el-blue d-flex align-items-center justify-content-center">
                <img src="/images/logo-white.png" class="w-75 p-3">
            </div>
            <div class="user-login col-12 col-md-8 bg-white">
                <p class="text-center">Login</p>
                <div class="px-3 px-md-3">
                    <form>
                        <div class="mb-3">
                          <small for="userEmail" class="form-label">Email</small>
                          <input type="email" class="form-control shadow-none" id="userEmail" placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                          <small for="userPassword" class="form-label">Password</small>
                          <input type="password" class="form-control shadow-none" id="userPassword" placeholder="Enter your password">
                        </div>
                        <small class="">Forget password?</small>
                        <button type="submit" class="bg-el-blue border-0 rounded text-light w-100 py-2 mt-5">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection