/************************************************************************* */
const hidePasswd = document.getElementById("eye__hide");
hidePasswd.addEventListener("click", hidePassword);
const hidePasswdMobile = document.getElementById("eye__hide__mobile");
hidePasswdMobile.addEventListener("click", hidePassword);
//Showing/hiding password
function hidePassword(){
    const passwordField = document.getElementById("password__field");
    const passwordFieldMobile = document.getElementById("password__field__mobile");
    if((passwordField.type == 'password') || (passwordFieldMobile.type == 'password'))
        {
            passwordField.type = 'text';
            passwordFieldMobile.type = 'text';
        }
    else{
        passwordField.type = 'password';
        passwordFieldMobile.type = 'password';
    }
}

/************************************************************************* */