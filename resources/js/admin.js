

import '../css/admin.scss'; 
import $ from 'jquery';
// import DataTable from 'datatables.net-bs5';
// window.DataTable = DataTable;
import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
// import intlTelInput from 'intl-tel-input';
// import 'intl-tel-input/build/js/utils.js';
// import select2 from 'select2';
// select2();
// import 'select2';


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