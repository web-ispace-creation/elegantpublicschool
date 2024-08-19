import{a as o,$ as e}from"./app-Ck6IXbSX.js";window.axios=o;window.axios.defaults.headers.common["X-Requested-With"]="XMLHttpRequest";e(".add-row.edu").on("click",function(){e(".edu-row-container").append(`<div class="row row-cols-1 row-cols-md-4">
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
                                    <div class="d-flex align-items-center">
                                            <input type="date" class="form-control" name="in_to[]">
                                            <i class="bi bi-x-circle ms-1 text-danger rem-row" role='button'></i>
                                        </div>
                            </div>
                        </div>`),e(".rem-row").on("click",function(){e(this).parent().parent().parent().remove()})});e(".add-row.job").on("click",function(){e(".job-row-container").append(`<div class="row row-cols-1 row-cols-md-4">
                            <div class="col mb-1">
                                <label class="text-el-blue">Course</label>
                                <input type="text" class="form-control" name="designation[]">
                            </div>
                            <div class="col mb-1">
                                <label class="text-el-blue">Institution</label>
                                <input type="text" class="form-control" name="company[]">
                            </div>
                            <div class="col mb-1">
                                <label class="text-el-blue">From</label>
                                <input type="date" class="form-control" name="comp_from[]">
                            </div>
                            <div class="col mb-1">
                                <label class="text-el-blue">To</label>
                                    <div class="d-flex align-items-center">
                                            <input type="date" class="form-control" name="comp_to[]">
                                            <i class="bi bi-x-circle ms-1 text-danger rem-row" role='button'></i>
                                        </div>
                            </div>
                        </div>`),e(".rem-row").on("click",function(){e(this).parent().parent().parent().remove()})});e(".signup #addProfile").on("submit",function(t){t.preventDefault(),e.ajax({url:"/auth/store",type:"POST",data:new FormData(this),processData:!1,contentType:!1,success:function(a){a.status==200?alert("Successfully Registered! Wait for 48 hours until admin approve your request. Thank You!"):alert(a.msg)}})});e(".user-page .edit-btn").on("click",function(){e.ajax({url:e(this).attr("data-url"),type:"GET",success:function(t){console.log(t)}})});e(".rem-row.qualification").on("click",function(){e.ajax({url:"/remove-qualification",type:"GET",data:{id:e(this).attr("data-id")},success:function(t){t.status==200&&location.reload()}})});e(".rem-row.experience").on("click",function(){e.ajax({url:"/remove-experience",type:"GET",data:{id:e(this).attr("data-id")},success:function(t){t.status==200&&location.reload()}})});e(".signup #editProfile").on("submit",function(t){t.preventDefault(),e.ajax({url:e(this).attr("action"),type:"POST",data:new FormData(this),processData:!1,contentType:!1,success:function(a){a.status==200&&location.reload()}})});e("#forgotPwdModal form").on("submit",function(t){t.preventDefault(),e.ajax({url:e(this).attr("action"),type:"POST",data:new FormData(this),processData:!1,contentType:!1,success:function(a){alert(a.msg)}})});
