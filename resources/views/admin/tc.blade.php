@extends('admin.layout-nav')
@section('content')
    <div class="container admin-tc">
        <button type="button" class="btn border mb-3" data-bs-toggle="modal" data-bs-target="#adminAddStudentTC">Add Student TC</button>

        <div class="row" id='table'>
            <div class="col-12 table-responsive">
                <table class="table table-bordered datatable w-100" data-url='{{Route('admin.studentTc.getDataTable')}}'>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>DOB</th>
                            <th>Admission No</th>
                            {{-- <th width="100px">Action</th> --}}
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

{{-- modal add student tc --}}
    <div class="modal fade" id="adminAddStudentTC" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" >Add Student TC</h5>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action={{route('admin.studentTc.add')}} enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group mt-3">
                            <label>Name</label>
                            <input type="text" class="form-control shadow-none mt-0"  placeholder="Students Name" name="name">
                        </div>
                        <div class="form-group mt-3">
                            <label>DOB</label>
                            <input type="date" class="form-control shadow-none mt-0" name="dob">
                        </div>
                        <div class="form-group mt-3">
                            <label>Admission No</label>
                            <input type="text" class="form-control shadow-none mt-0"  placeholder="Enter Admission NO" name="admission_no">
                        </div>
                        <div class="form-group mt-3">
                            <label>Tc pdf</label>
                            <input type="file" class="form-control shadow-none mt-0" name="tc">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- modal ends --}}
@endsection