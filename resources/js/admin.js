

import '../css/admin.scss'; 
import $ from 'jquery';
import DataTable from 'datatables.net-bs5';
window.DataTable = DataTable;
// import axios from 'axios';
// window.axios = axios;
// window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
// import intlTelInput from 'intl-tel-input';
// import 'intl-tel-input/build/js/utils.js';
import select2 from 'select2';
select2();
// import 'select2';
import * as bootstrap from 'bootstrap'

$(document).ready(()=>{

    $('#open-sidebar').click(()=>{
       
        // add class active on #sidebar
        $('#sidebar').addClass('active');
        
        // show sidebar overlay
        $('#sidebar-overlay').removeClass('d-none');
      
     });
    
    
     $('#sidebar-overlay').click(function(){
       
        // add class active on #sidebar
        $('#sidebar').removeClass('active');
        
        // show sidebar overlay
        $(this).addClass('d-none');
      
     });
    
  });
//   const phoneInputs = document.getElementsByClassName('phone');

//   for (let i = 0; i < phoneInputs.length; i++) {
//      intlTelInput(phoneInputs[i], {
//         initialCountry: 'in'
//      });
//   }
//   $(".searchable-dropdown").select2({
//    placeholder: 'Select Parent Category'
//  });

$(function () {
   var routeUrl = $('.dashboard .datatable').data('url');
   var table = $('.dashboard .datatable').DataTable({
       processing: true,
       serverSide: true,
       type:'POST',
       ajax: routeUrl,
       columns: [
           {data: 'id', name: 'id'},
           {data: 'image', name: 'image'},
           {data: 'name', name: 'name'},
         //   {data: 'last_name', name: 'alumniDetails.last_name'},
           {data: 'email', name: 'email'},
           {data: 'alumni_details.phone', name: 'phone'},
           {data: 'alumni_details.batch', name: 'batch'},
           {data: 'alumni_details.from', name: 'from'},
           {data: 'alumni_details.to', name: 'to'},
           {data: 'alumni_details.application_no', name: 'application_no'},
           {data: 'role', name: 'role'},
           {data: 'action', name: 'action', orderable: false, searchable: false},
       ],
   });
});

    $(document).on('click', '.dashboard .edit-btn', function() {
        var routeUrl = $(this).data('url');
        var itemId = $(this).data('id');
        $.ajax({
            url: routeUrl,
            type: 'get',
            data:  {id:itemId},
            success: function(response){
                $("#adminVerifyStudentModal input[name='name']").val(response.name);
                $("#adminVerifyStudentModal input[name='email']").val(response.email);
                $("#adminVerifyStudentModal input[name='id']").val(response.id);
                if (response.alumni_details) {
                    $("#adminVerifyStudentModal input[name='phone']").val(response.alumni_details.phone || '');
                    $("#adminVerifyStudentModal input[name='batch']").val(response.alumni_details.batch || '');
                    $("#adminVerifyStudentModal input[name='from']").val(response.alumni_details.from || '');
                    $("#adminVerifyStudentModal input[name='to']").val(response.alumni_details.to || '');
                    $("#adminVerifyStudentModal input[name='application_no']").val(response.alumni_details.application_no || '');
                    $("#adminVerifyStudentModal img").attr('src', `/storage/images/profile/${response.alumni_details.image || ''}`);
                }
                var myModal = new bootstrap.Modal(document.getElementById('adminVerifyStudentModal'));
                myModal.toggle();

            },
            error: function(xhr, status, error){
                alert('Sorry,Something went wrong!')
            }
        });
    });


    $("#adminVerifyStudentModal form").submit(function(e){
        var routeUrl = $('#adminVerifyStudentModal form').attr('action');
        e.preventDefault(); 
        $.ajax({
            url: routeUrl,
            type: 'post',
            data:  new FormData(this),
            contentType: false,
            processData: false,
            success: function(response){
                if(response.status == 200){
                    alert(response.msg);
                    var myModal = bootstrap.Modal.getInstance(document.getElementById('adminVerifyStudentModal'));
                    myModal.hide();
                    $('.dashboard .datatable').DataTable().ajax.reload();
                }else{
                    alert(response.message);
                }
            },
        });
    });


    // alumni council

    // search members
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

    // add alumni council members
    $("#adminAddAlumniMembersModal form").submit(function(e){
      var routeUrl = $('#adminAddAlumniMembersModal form').attr('action');
      e.preventDefault(); 
      $.ajax({
          url: routeUrl,
          type: 'post',
          data:  new FormData(this),
          contentType: false,
          processData: false,
          success: function(response){
              if(response.status == 200){
                  alert(response.msg);
                  var myModal = bootstrap.Modal.getInstance(document.getElementById('adminAddAlumniMembersModal'));
                  myModal.hide();
                  $('.alumniCouncil .datatable').DataTable().ajax.reload();
              }else{
                  alert(response.msg);
              }
          },
      });
    });

    $(function () {
        var routeUrl = $('.alumniCouncil .datatable').data('url');
        var table = $('.alumniCouncil .datatable').DataTable({
            processing: true,
            serverSide: true,
            type:'POST',
            ajax: routeUrl,
            columns: [
                {data: 'id', name: 'id'},
                {data: 'image', name: 'image'},
                {data: 'users.name', name: 'name'},
                {data: 'designation', name: 'designation'},
                {data: 'users.email', name: 'email'},
                {data: 'users.alumni_details.phone', name: 'phone'},
                {data: 'users.alumni_details.batch', name: 'batch'},
                {data: 'users.alumni_details.application_no', name: 'application_no'},
                // {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
        });
     });

    //  $(document).on('click', '.alumniCouncil .edit-btn', function() {
    //     var routeUrl = $(this).data('url');
    //     var itemId = $(this).data('id');
    //     $.ajax({
    //         url: routeUrl,
    //         type: 'get',
    //         data:  {id:itemId},
    //         success: function(response){
    //             $("#adminVerifyStudentModal input[name='name']").val(response.name);
    //             $("#adminVerifyStudentModal input[name='email']").val(response.email);
    //             if (response.alumni_details) {
    //                 $("#adminVerifyStudentModal input[name='phone']").val(response.alumni_details.phone || '');
    //                 $("#adminVerifyStudentModal input[name='batch']").val(response.alumni_details.batch || '');
    //                 $("#adminVerifyStudentModal input[name='application_no']").val(response.alumni_details.application_no || '');
    //             }
    //             var myModal = new bootstrap.Modal(document.getElementById('adminVerifyStudentModal'));
    //             myModal.toggle();

    //         },
    //         error: function(xhr, status, error){
    //             alert('Sorry,Something went wrong!')
    //         }
    //     });
    // });