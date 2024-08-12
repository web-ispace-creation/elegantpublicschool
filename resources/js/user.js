

import './app'
import $ from 'jquery';
// import DataTable from 'datatables.net-bs5';
// window.DataTable = DataTable;
import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

$('.add-row.edu').on('click',function(){
    let newRow = `<div class="row row-cols-1 row-cols-md-4">
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
                        </div>`
    $('.edu-row-container').append(newRow)
    // remove button on click
    $('.rem-row').on('click', function(){
        $(this).parent().parent().parent().remove()
    })
})
$('.add-row.job').on('click',function(){
    let newRow = `<div class="row row-cols-1 row-cols-md-4">
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
                        </div>`
                        
    $('.job-row-container').append(newRow)
    // remove button on click
    $('.rem-row').on('click', function(){
        $(this).parent().parent().parent().remove()
    })
})

$('.signup form').on('submit',function(e){
    e.preventDefault()
    $.ajax({
        url:'/store',
        type:'POST',
        data: new FormData(this),
        processData:false,
        contentType:false,
        success:function(res){
            if(res.status == 200){
                alert('Successfully Registered! Wait for 48 hours until admin approve your request. Thank You!')
            }else{
                alert(res.msg);
            }
        }
    })
})