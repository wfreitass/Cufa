require('./bootstrap');

import Swal from 'sweetalert2';

let buttonSubmit = window.document.getElementById('submitSearch');
let formSearch = window.document.getElementById('formSearch');
buttonSubmit.addEventListener("click",function(){
    formSearch.submit();
});

window.Swal = Swal;