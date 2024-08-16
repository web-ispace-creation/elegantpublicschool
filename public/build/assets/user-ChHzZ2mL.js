import{a as o}from"./app-D54Favus.js";import{$ as t}from"./jquery-Da2SryCc.js";import"./bootstrap.esm-BPoW-0lx.js";window.axios=o;window.axios.defaults.headers.common["X-Requested-With"]="XMLHttpRequest";t(".add-row.edu").on("click",function(){t(".edu-row-container").append(`<div class="row row-cols-1 row-cols-md-4">
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
                        </div>`),t(".rem-row").on("click",function(){t(this).parent().parent().parent().remove()})});t(".add-row.job").on("click",function(){t(".job-row-container").append(`<div class="row row-cols-1 row-cols-md-4">
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
                        </div>`),t(".rem-row").on("click",function(){t(this).parent().parent().parent().remove()})});t(".signup #addProfile").on("submit",function(e){e.preventDefault(),t.ajax({url:"/auth/store",type:"POST",data:new FormData(this),processData:!1,contentType:!1,success:function(a){a.status==200?alert("Successfully Registered! Wait for 48 hours until admin approve your request. Thank You!"):alert(a.msg)}})});t(".user-page .edit-btn").on("click",function(){t.ajax({url:t(this).attr("data-url"),type:"GET",success:function(e){console.log(e)}})});t(".rem-row.qualification").on("click",function(){t.ajax({url:"/remove-qualification",type:"GET",data:{id:t(this).attr("data-id")},success:function(e){e.status==200&&location.reload()}})});t(".rem-row.experience").on("click",function(){t.ajax({url:"/remove-experience",type:"GET",data:{id:t(this).attr("data-id")},success:function(e){e.status==200&&location.reload()}})});t(".signup #editProfile").on("submit",function(e){e.preventDefault(),t.ajax({url:t(this).attr("action"),type:"POST",data:new FormData(this),processData:!1,contentType:!1,success:function(a){a.status==200&&location.reload()}})});t("#forgotPwdModal form").on("submit",function(e){e.preventDefault(),t.ajax({url:t(this).attr("action"),type:"POST",data:new FormData(this),processData:!1,contentType:!1,success:function(a){alert(a.msg)}})});
