require('./bootstrap');

let buttonSubmit = window.document.getElementById('submitSearch');
let formSearch = window.document.getElementById('formSearch');
buttonSubmit.addEventListener("click",function(){
    formSearch.submit();
})