@extends('users.layout')
@section('content')
    <div class="signup bg-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="bg-el-blue text-light py-5 px-4 rounded">
                        <h3>The Elegant Public School Alumni Members</h3>
                        <p class="fs-small fw-light">
                            Welcome back, esteemed alumni! Join a vibrant community of graduates who continue to uphold the
                             legacy of The Elegant Public School. By becoming a member, you'll reconnect with old friends,
                              network with fellow professionals, and contribute to the growth of our alma mater. Whether you
                               graduated last year or decades ago, your journey with us is lifelong. Sign up today and 
                               let’s keep the spirit of our school alive, together.
                        </p>
                    </div>
                </div>
                <div class="col-lg-8 d-none d-lg-block">
                    <div class="row row-cols-md-3">
                        <div class="ps-1">
                            <div class="bg-el-blue text-light text-center py-3  rounded">
                                <h6>3K</h6>
                                <h6>Registered Members</h6>
                            </div>
                        </div>
                        <div class="ps-1">
                            <div class="bg-el-blue text-light text-center py-3  rounded">
                                <h6>1K+</h6>
                                <h6>Connections</h6>
                            </div>
                        </div>
                        <div class="ps-1">
                            <div class="bg-el-blue text-light text-center py-3  rounded">
                                <h6>1K+</h6>
                                <h6>Opportunities</h6>
                            </div>
                        </div>
                    </div>
                    <div class="row row-cols-md-2 mt-3">
                        <img src="/images/IMAGE_001.png" alt="" srcset="">
                        <img src="/images/IMAGE_002.png" alt="" srcset="">
                    </div>
                </div>
            </div>
            <div class="bg-white rounded p-4 mt-3">
                <h3 class="text-el-blue mb-3">Signup</h3>
                <form enctype="multipart/form-data" id='addProfile'>
                    @csrf
                    <div class="row row-cols-1 row-cols-md-2">
                      <div class="col">
                        <label class="text-el-blue">Name</label>
                        <input type="text" class="form-control mb-3" placeholder="Enter full name" name="name">
                      </div>
                      <div class="col my-auto">
                        <label class="text-el-blue">Image</label>
                        <input class="form-control mb-3" type="file" name='image'>
                      </div>
                    </div>
                    <div class="row row-cols-1 row-cols-md-2">
                        <div class="col mb-3">
                            <label class="text-el-blue">Email</label>
                            <input type="email" class="form-control" placeholder="example@gmail.com" name="email">
                        </div>
                        <div class="col mb-3 ">
                            <label class="text-el-blue">Phone</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">+91</span>
                                </div>
                                <input type="text" class="form-control" placeholder="phone" name='phone'>
                            </div>
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-md-2">
                        <div class="col mb-3">
                            <label class="text-el-blue">DOB</label>
                            <input type="date" class="form-control" name="dob">
                        </div>
                        <div class="col mb-3 ">
                            <label class="text-el-blue">Batch</label>
                            <select class="form-select" name="batch">
                                <option selected value="2024">2024</option>
                                <option value="2023">2023</option>
                                <option value="2022">2022</option>
                                <option value="2021">2021</option>
                              </select>
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-md-2">
                        <div class="col mb-3">
                            <label class="text-el-blue">From</label>
                            <input type="date" class="form-control mb-3" name="from">
                        </div>
                        <div class="col mb-3">
                            <label class="text-el-blue">To</label>
                            <input type="date" class="form-control mb-3" name="to">
                        </div>
                    </div>
                    {{-- Education History --}}
                    <h6 class="text-el-blue">Education</h6>
                    <hr>
                    <div class="edu-row-container">
                        {{-- <div class="row row-cols-1 row-cols-md-4">
                            <div class="col mb-1">
                                <label class="text-el-blue">Course</label>
                                <input type="text" class="form-control" name="course[]">
                            </div>
                            <div class="col mb-1">
                                <label class="text-el-blue">Institution</label>
                                <input type="text" class="form-control" name="institution[]">
                            </div>
                            <div class="col mb-1">
                                <label class="text-el-blue">From</label>
                                <input type="date" class="form-control" name="in_fr[]">
                            </div>
                            <div class="col mb-1">
                                <label class="text-el-blue">To</label>
                                <input type="date" class="form-control" name="in_to[]">
                            </div>
                        </div> --}}
                    </div>
                    <p class="fs-small text-el-blue add-row edu" role="button"><i class="bi bi-plus-lg"></i> Add Row</p>
                    {{-- Professional Experience --}}
                    <h6 class="text-el-blue mt-4">Professional Experience</h6>
                    <hr>
                    <div class="job-row-container">
                        {{-- <div class="row row-cols-1 row-cols-md-4">
                            <div class="col mb-1">
                                <label class="text-el-blue">Designation</label>
                                <input type="text" class="form-control" name="designation[]">
                            </div>
                            <div class="col mb-1">
                                <label class="text-el-blue">Company</label>
                                <input type="text" class="form-control" name="company[]">
                            </div>
                            <div class="col mb-1">
                                <label class="text-el-blue">From</label>
                                <input type="date" class="form-control" name="comp_from[]">
                            </div>
                            <div class="col mb-1">
                                <label class="text-el-blue">To</label>
                                <input type="date" class="form-control" name="comp_to[]">
                            </div>
                        </div> --}}
                    </div>
                    <p class="fs-small text-el-blue add-row job" role="button"><i class="bi bi-plus-lg"></i> Add Row</p>
                    {{-- password --}}
                    <div class="row row-cols-1 row-cols-md-2">
                        <div class="col mb-3">
                            <label class="text-el-blue">Password</label>
                            <input type="password" class="form-control mb-3" name="password">
                        </div>
                        <div class="col mb-3">
                            <label class="text-el-blue">Confirm password</label>
                            <input type="password" class="form-control mb-3" name='password_confirmation'>
                        </div>
                    </div>
                    <div class="row text-center">
                        <small class="text-secondary">
                           By submitting this form, you agree Elegant's Privacy Policy and Terms & Conditions
                        </small>
                    </div>
                    <div class="text-center">
                        <input type="submit" value="Submit" class="btn bg-el-blue text-light mt-3">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection