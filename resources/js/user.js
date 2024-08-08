

import './app'
import $ from 'jquery';
// import DataTable from 'datatables.net-bs5';
// window.DataTable = DataTable;
import axios from 'axios';
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';