let password = window.document.getElementById('password');
let confirmPassword = window.document.getElementById('confirmPassword');
let showPassword = window.document.getElementById('showpassword');

showPassword.addEventListener('click',()=>{
    if(showPassword.checked){
        password.type = 'text';
        confirmPassword.type = 'text'; 
    }else{
        password.type = 'password';
        confirmPassword.type = 'password';
    }  
})