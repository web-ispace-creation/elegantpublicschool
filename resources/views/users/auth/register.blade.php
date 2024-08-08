@extends('users.layout')
@section('content')
    <div class="signup bg-light py-5">
        <div class="container">
            <div class="bg-white rounded p-4">
                <h3 class="text-el-blue mb-3">Signup</h3>
                <form>
                    <div class="row row-cols-1 row-cols-md-2">
                      <div class="col mb-3">
                        <input type="text" class="form-control mb-3" placeholder="First name">
                        <input type="text" class="form-control" placeholder="Last name">
                      </div>
                      <div class="col my-auto">
                        <input class="form-control mb-3" type="file" id="formFile">
                      </div>
                    </div>
                    <div class="row row-cols-1 row-cols-md-2">
                        <div class="col mb-3">
                            <label class="text-el-blue">Email</label>
                            <input type="email" class="form-control" placeholder="example@gmail.com">
                        </div>
                        <div class="col mb-3 ">
                            <label class="text-el-blue">Phone</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">+91</span>
                                </div>
                                <input type="text" class="form-control" placeholder="phone" >
                            </div>
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-md-2">
                        <div class="col mb-3">
                            <label class="text-el-blue">DOB</label>
                            <input type="date" class="form-control ">
                        </div>
                        <div class="col mb-3 ">
                            <label class="text-el-blue">Batch</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>2024</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                              </select>
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-md-2">
                        <div class="col mb-3">
                            <label class="text-el-blue">From</label>
                            <input type="date" class="form-control mb-3">
                        </div>
                        <div class="col mb-3">
                            <label class="text-el-blue">To</label>
                            <input type="date" class="form-control mb-3">
                        </div>
                    </div>
                  </form>
            </div>
        </div>
    </div>
@endsection