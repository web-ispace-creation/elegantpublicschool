@extends('users.layout')
@section('content')
    <div class="signup bg-light py-5">
        <div class="container">
            <div class="bg-white rounded p-4 mt-3">
                <h3 class="text-el-blue mb-3">Edit Profile</h3>
                <form enctype="multipart/form-data" id="editProfile">
                    @csrf
                    <div class="row row-cols-1 row-cols-md-2">
                        <input type="hidden" name="data_id" value="{{$data->id}}">
                      <div class="col">
                        <label class="text-el-blue">Name</label>
                        <input type="text" class="form-control mb-3" value="{{$data->name}}" name="name">
                      </div>
                      <div class="col my-auto">
                        <label class="text-el-blue">Profile Picture</label>
                        <input class="form-control mb-3" type="file" name='image'>
                      </div>
                    </div>
                    <div class="row row-cols-1 row-cols-md-2">
                        <div class="col mb-3">
                            <label class="text-el-blue">Email</label>
                            <input type="email" class="form-control" value='{{$data->email}}' name="email">
                        </div>
                        <div class="col mb-3 ">
                            <label class="text-el-blue">Phone</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">+91</span>
                                </div>
                                <input type="text" class="form-control" value='{{$data->alumniDetails->phone}}' name='phone'>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="alumniDetails_id" value="{{$data->alumniDetails->id}}">
                    <div class="row row-cols-1 row-cols-md-2">
                        <div class="col mb-3">
                            <label class="text-el-blue">DOB</label>
                            <input type="date" class="form-control" name="dob" value="{{$data->alumniDetails->dob}}">
                        </div>
                        <div class="col mb-3 ">
                            <label class="text-el-blue">Batch</label>
                            <select class="form-select" name="batch">
                                @for ($i = date("Y"); $i > 2000; $i--)
                                <option class="dropdown-item" value="{{ $i }}" @if($i == $data->alumniDetails->batch) selected @endif>{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-md-2">
                        <div class="col mb-3">
                            <label class="text-el-blue">From</label>
                            <input type="date" class="form-control mb-3" name="from" value="{{$data->alumniDetails->from}}">
                        </div>
                        <div class="col mb-3">
                            <label class="text-el-blue">To</label>
                            <input type="date" class="form-control mb-3" name="to" value="{{$data->alumniDetails->to}}">
                        </div>
                    </div>
                    {{-- Education History --}}
                    <h6 class="text-el-blue">Education</h6>
                    <hr>
                    <div class="edu-row-container">
                        @if(count($data->qualifications) >0)
                            @foreach($data->qualifications as $item)
                                <div class="row row-cols-1 row-cols-md-4">
                                    <div class="col mb-1">
                                        <label class="text-el-blue">Course</label>
                                        <input type="text" class="form-control" name="course[]" value="{{$item->course}}">
                                    </div>
                                    <div class="col mb-1">
                                        <label class="text-el-blue">Institution</label>
                                        <input type="text" class="form-control" name="institution[]" value="{{$item->institution_name}}">
                                    </div>
                                    <div class="col mb-1">
                                        <label class="text-el-blue">From</label>
                                        <input type="date" class="form-control" name="in_fr[]" value="{{$item->from}}">
                                    </div>
                                    <div class="col mb-1">
                                        <label class="text-el-blue">To</label>
                                        <div class="d-flex align-items-center">
                                            <input type="date" class="form-control" name="in_to[]" value="{{$item->to}}">
                                            <i class="bi bi-x-circle ms-1 text-danger rem-row qualification" role='button' data-id={{$item->id}}></i>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <p class="fs-small text-el-blue add-row edu" role="button"><i class="bi bi-plus-lg"></i> Add Row</p>
                    {{-- Professional Experience --}}
                    <h6 class="text-el-blue mt-4">Professional Experience</h6>
                    <hr>
                    <div class="job-row-container">
                        @if(count($data->experience) >0)
                            @foreach($data->experience as $item)
                                <div class="row row-cols-1 row-cols-md-4">
                                    <div class="col mb-1">
                                        <label class="text-el-blue">Designation</label>
                                        <input type="text" class="form-control" name="designation[]" value="{{$item->designation}}">
                                    </div>
                                    <div class="col mb-1">
                                        <label class="text-el-blue">Company</label>
                                        <input type="text" class="form-control" name="company[]" value="{{$item->company}}">
                                    </div>
                                    <div class="col mb-1">
                                        <label class="text-el-blue">From</label>
                                        <input type="date" class="form-control" name="comp_from[]" value="{{$item->from}}">
                                    </div>
                                    <div class="col mb-1">
                                        <label class="text-el-blue">To</label>
                                        <div class="d-flex align-items-center">
                                            <input type="date" class="form-control" name="comp_to[]" value="{{$item->to}}">
                                            <i class="bi bi-x-circle ms-1 text-danger rem-row experience" role='button' data-id={{$item->id}}></i>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <p class="fs-small text-el-blue add-row job" role="button"><i class="bi bi-plus-lg"></i> Add Row</p>
                    <div class="text-center">
                        <input type="submit" value="Submit" class="btn bg-el-blue text-light mt-3">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection