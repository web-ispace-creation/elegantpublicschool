@extends('users.layout')
@section('content')

<div class="bg-light tc">
    <div class="banner height-400px position-relative">
        <img src="/images/Download-TC.jpg" alt="" class="object-fit-cover position-absolute w-100 h-100">
        <div class="text-container position-relative zindex-1 text-light d-flex flex-column h-100 justify-content-center container">
          <div>
            <h1 >Download TC</h1>
          </div>
          <div class="d-flex">
            <a href="#downloadTcForm" class="btn text-decoration-none bg-el-orange text-light border-none">Download TC</a>
          {{-- </div>
          <div class="d-flex"> --}}
            <a href="https://theelegantpublicschool.com/contact-us/" class="btn text-decoration-none bg-el-orange text-light border-none ms-2">Contact us</a>
          </div>
        </div>
    </div>
    <div class="container my-5 py-5" id='downloadTcForm'>
        <h3>Download Transfer Certificate</h3>
        <form action="{{ route('user.tc.download') }}"  method="POST" class="mt-4">
            @csrf
            <div class="d-flex flex-wrap">
                <div class="col-md-4 px-1">
                    <label class="ms-2 small">Name</label>
                    <input type="text" name="name" class="form-control ms-2 shadow-none" placeholder="Name">
                </div>
                <div class="col-md-4 px-1">
                    <label class="ms-2 small">DOB</label>
                    <input type="date" name="dob" class="form-control ms-2 shadow-none" placeholder="DOB">
                </div>
                <div class="col-md-4 px-1">
                    <label class="ms-2 small">Admission No</label>
                    <input type="text" name="admission_no" class="form-control ms-2 shadow-none" placeholder="Admission No">
                </div>
            </div>
            <div class="d-flex justify-content-center mt-3">
                <input type="submit" value="Submit" class="btn-warning btn">
            </div>
            @if($errors->any())
                <div class="alert alert-danger mt-3" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger mt-3" role="alert">
                    {{ session('error') }}
                </div>
            @endif
        </form>
    </div>
</div>
@endsection