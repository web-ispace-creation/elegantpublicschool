@extends('admin.layout-nav')
@section('content')
{{-- dashboard --}}
    {{-- <div class="tab-pane fade show active" id="admin-list-home" role="tabpanel" aria-labelledby="admin-list-home-list" > --}}
        {{-- @include('superadmin/includes/dashboard') --}}
    {{-- </div> --}}
    

    <div class="container alumniCouncil">
        <button type="button" class="btn border mb-3" data-bs-toggle="modal" data-bs-target="#adminAddAlumniMembersModal">Add Council Members</button>

        <div class="row" id='table'>
            <div class="col-12 table-responsive">
                <table class="table table-bordered datatable w-100" data-url='{{Route('admin.get.alumni.council.datatable')}}'>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Batch</th>
                            <th>Application No</th>
                            {{-- <th width="100px">Action</th> --}}
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

{{-- modal add alumni members --}}
    <div class="modal fade" id="adminAddAlumniMembersModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" >Add Almuni Council Members</h5>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action={{route('admin.add-alumni-council')}}>
                    @csrf
                    <div class="modal-body">
                        <div class="alumni-council-member-select w-100 rounded">
                            <div class="select-container w-100" data-search='{{Route('admin.select-alumni-member')}}' id="selectContainer">
                                <select class="searchable-dropdown w-100 p-2" name="alumni_member_id" id="alumni_member">
                                </select>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label><b>Designation</b></label>
                            <input type="text" class="form-control shadow-none mt-2"  placeholder="Enter Designation name" name="designation">
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

    <!-- Modal Edit-->
    <div class="modal fade" id="adminAlumniCouncilModal" tabindex="-1" aria-hidden="true">
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
                            <label><b>Application No</b></label>
                            <input type="text" class="form-control shadow-none mt-2"  placeholder="Enter Application No" name="application_no">
                        </div>
                        <input type="text" name="id" class="d-none">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- modal ends --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
      var selectedItems;

      $('#selectContainer .searchable-dropdown').select2({
        placeholder: "Select alumni member",
        allowClear: true,
        dropdownParent: $('.alumni-council-member-select'),
        ajax: {
          url: $('#selectContainer').data('search'),
          dataType: 'json',
          data: function (params) {
              return {
                  search: params.term,
                  type: 'public'
              };
          },
          processResults: function (data) {
              selectedItems = data.data;
              return {
                  results: selectedItems
              };
          },
        }
      });
    });
    </script>

@endsection