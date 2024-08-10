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
                        <span role="button" data-bs-toggle="modal" data-bs-target="#profileEditModal" class="text-decoration-none text-el-blue">Edit <i class="bi bi-pencil-square"></i></span>
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

<!-- Modal -->
<div class="modal fade" id="profileEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profile</h1>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form>
                <div class="border-bottom p-1">
                    <div class="d-flex flex-wrap">
                        <div class="col-12 col-sm-6 mb-3 px-1">
                            <label for="f_name" class="form-label">First Name</label>
                            <input type="text" class="form-control shadow-none" id="f_name">
                        </div>
                        <div class="col-12 col-sm-6 mb-3 px-1">
                            <label for="l_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control shadow-none" id="l_name">
                        </div>
                    </div>
                    <div class="mb-3 px-1">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control shadow-none" id="email">
                    </div>
                    <div class="d-flex flex-wrap">
                        <div class="col-12 col-sm-6 mb-3 px-1">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="text" class="form-control shadow-none" id="phone_number">
                        </div>
                        <div class="col-12 col-sm-6 mb-3 px-1">
                            <label for="dob" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control shadow-none" id="dob">
                        </div>
                    </div>
                </div>
                <div class="p-1">
                    <div class="d-flex flex-wrap">
                        <div class="col-12 col-sm-6 mb-3 px-1">
                            <label for="batch" class="form-label">Batch</label>
                            <input type="text" class="form-control shadow-none" id="batch">
                        </div>
                        <div class="col-12 col-sm-6 mb-3 px-1">
                            <label for="year" class="form-label">Year</label>
                            <input type="text" class="form-control shadow-none" id="year">
                        </div>
                    </div>
                    <div class="mb-3 px-1">
                        <label for="education" class="form-label">Educational Qualification</label>
                        <input type="text" class="form-control shadow-none" id="education">
                    </div>
                    <div class="mb-3 px-1">
                        <label for="experienece" class="form-label">Professional Experience</label>
                        <input type="text" class="form-control shadow-none" id="experienece">
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn border rounded ">Submit</button>
        </div>
      </div>
    </div>
  </div>
    
@endsection