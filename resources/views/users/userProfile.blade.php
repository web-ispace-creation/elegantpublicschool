@extends('users.layout')
@section('content')

<div class="bg-light">
    <div class="container user-page text-dark w-75">
        <div class="user-profile-content bg-white">
            <div class="d-flex flex-wrap align-items-center border-bottom py-3">
                <div class="col-12 col-md-2 profile-pic text-center py-2">
                    <img src="/images/profile.jpg" class="w-100 border circle">
                </div>
                <div class="col-12 col-md-10 p-md-4 d-flex flex-wrap justify-content-between align-items-center">
                    <div class="">
                        <span>Anusha Singh</span><br>
                        <small>anushasingh@gmail.com</small>
                    </div>
                    <div class="py-2">
                        <a class="text-decoration-none text-el-blue">Edit <i class="bi bi-pencil-square"></i></a>
                    </div>
                </div>
            </div>
            <div class="section border-bottom py-4">
                <h6 class="text-secondary">Personal Information</h6>
                <div class="d-flex flex-wrap mt-4">
                    <div class="col-12 col-md-6">
                        <p class="text-secondary label">First Name</p>
                        <p>Anusha Singh</p>
                    </div>
                    <div class="col-12 col-md-6">
                        <p class="text-secondary label">Last Name</p>
                        <p>Anusha Singh</p>
                    </div>
                </div>
                <div class="d-flex flex-wrap mt-2">
                    <div class="col-12 col-md-6">
                        <p class="text-secondary label">Email Address</p>
                        <p>anushasingh@gmail.com</p>
                    </div>
                    <div class="col-12 col-md-6">
                        <p class="text-secondary label">Phone Number</p>
                        <p>+91 2563 456 745</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 mt-2">
                    <p class="text-secondary label">Date of Birth</p>
                    <p>02-07-2006</p>
                </div>
            </div>
            <div class="section py-4">
                <div class="d-flex flex-wrap">
                    <div class="col-12 col-md-6">
                        <p class="text-secondary label">Batch</p>
                        <p>Commerce</p>
                    </div>
                    <div class="col-12 col-md-6">
                        <p class="text-secondary label">Year</p>
                        <p>2016 - 2018</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 mt-2">
                    <p class="text-secondary label">Educational Qualification</p>
                    <p>MCA, IGNOU University, 2018-2021</p>
                </div>
                <div class="col-12 col-md-6 mt-2">
                    <p class="text-secondary label">Professional Experience</p>
                    <p>General Manager, Microsoft</p>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection