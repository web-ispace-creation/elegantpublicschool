@extends('admin.layout-nav')
@section('content')
{{-- dashboard --}}
    {{-- <div class="tab-pane fade show active" id="admin-list-home" role="tabpanel" aria-labelledby="admin-list-home-list" > --}}
        {{-- @include('superadmin/includes/dashboard') --}}
    {{-- </div> --}}
    

    <div class="container dashboard">
        {{-- <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#superAdminHsnModalAdd">Add HSN</button> --}}

        <div class="row" id='table'>
            <div class="col-12 table-responsive">
                <table class="table table-bordered datatable w-100" data-url='{{Route('admin.get.alumni.datatable')}}'>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Batch</th>
                            <th>From</th>
                            <th>To</th>
                            <th>10th Roll No</th>
                            <th>Admission No</th>
                            <th>Role</th>
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal Edit-->
    <div class="modal fade" id="adminVerifyStudentModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" >Verify Almuni</h5>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action={{route('admin.approve.alumni.member')}}>
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label><b>Image</b></label>
                            <img src="" alt="" srcset="" width="300px">
                        </div>
                        <div class="form-group">
                            <label><b>Name</b></label>
                            <input type="text" class="form-control shadow-none mt-2"  name="name" readonly>
                        </div>
                        <div class="form-group">
                            <label><b>Email</b></label>
                            <input type="text" class="form-control shadow-none mt-2"  name="email" readonly>
                        </div>
                        <div class="form-group">
                            <label><b>Phone</b></label>
                            <input type="text" class="form-control shadow-none mt-2"  name="phone" readonly>
                        </div>
                        <div class="form-group">
                            <label><b>Batch</b></label>
                            <input type="text" class="form-control shadow-none mt-2"  name="batch" readonly>
                        </div>
                        <div class="form-group">
                            <label><b>From</b></label>
                            <input type="date" class="form-control shadow-none mt-2"  name="from" readonly>
                        </div>
                        <div class="form-group">
                            <label><b>To</b></label>
                            <input type="date" class="form-control shadow-none mt-2"  name="to" readonly>
                        </div>
                        <div class="form-group">
                            <label><b>10th Roll No</b></label>
                            <input type="text" class="form-control shadow-none mt-2" name="final_reg_no">
                        </div>
                        <div class="form-group">
                            <label><b>Admission No</b></label>
                            <input type="text" class="form-control shadow-none mt-2"  placeholder="Enter Admission No" name="application_no">
                        </div>
                        <input type="text" name="id" class="d-none">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- modal ends --}}

    <!-- Modal Add -->
    {{-- <div class="modal fade superAdminModal" id="superAdminHsnModalAdd" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" >Add HSN</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action={{route('superadmin.hsncodes.add')}}>
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label><b>HSN</b></label>
                            <input type="number" class="form-control shadow-none mt-2"  placeholder="Enter HSN" name="hsn">
                        </div>
                        <div class="form-group mt-3">
                            <label><b>Details</b></label>
                            <input type="text" min="0" class="form-control shadow-none mt-2"  placeholder="Details" name="details">
                        </div>
                        <div class="form-group mt-3">
                            <label><b>Gst Rate</b></label>
                            <input type="number" min="0" class="form-control shadow-none mt-2"  placeholder="Enter Gst" name="gst_rate">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
    {{-- modal ends --}}
@endsection
