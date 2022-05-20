const elementOpen = document.getElementById("login__button");
elementOpen.addEventListener("click", functionOpen);
const elementOpenMobile = document.getElementById("login__button__mobile");
elementOpenMobile.addEventListener("click", functionOpen);

//Opening login panel
function functionOpen() {
    const targetDiv = document.getElementById("login__start");
    const displaySetting = login__start.style.display;
    if (displaySetting == 'block') {
        targetDiv.style.display = 'none';
    } else {
        targetDiv.style.display = 'block';
    }

    resetDiv.style.display = 'none';
    }

/************************************************************************* */

const elementClose = document.getElementById("button__close");
elementClose.addEventListener("click", functionClose);
const elementCloseMobile = document.getElementById("button__close__mobile");
elementCloseMobile.addEventListener("click", functionClose);
//Closing login form
function functionClose(){
    const targetDiv = document.getElementById("login__start");
    targetDiv.style.display = 'none';
    clearFields();
}

/************************************************************************* */

const clearLogin = document.getElementById("login__btn");
clearLogin.addEventListener("click", clearFields);
const clearLoginMobile = document.getElementById("login__btn__mobile");
clearLoginMobile.addEventListener("click", clearFields);

//Clear form panel
function clearFields(){
    document.getElementById("login__field").value = "";
    document.getElementById("password__field").value = "";
    document.getElementById("login__field__mobile").value = "";
    document.getElementById("password__field__mobile").value = "";
    document.getElementById("email__field__reset").value = "";
    document.getElementById("email__field__reset__mobile").value = "";
}


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
const resetOpen = document.getElementById("reset__open");
resetOpen.addEventListener("click", resetFunctionOpen);
const resetOpenMobile = document.getElementById("reset__open__mobile");
resetOpenMobile.addEventListener("click", resetFunctionOpen);
//Open reset password form 
function resetFunctionOpen(){
    const targetDiv = document.getElementById("reset__start");
    const displaySetting = targetDiv.style.display;
    if (displaySetting == 'block') {
        targetDiv.style.display = 'none';
    }
    else{
        targetDiv.style.display = 'block';
    }
    functionClose()
} 


/************************************************************************* */
const resetClose = document.getElementById("reset__close");
resetClose.addEventListener("click", resetFunctionClose);
const resetCloseMobile = document.getElementById("reset__close__mobile");
resetCloseMobile.addEventListener("click", resetFunctionClose);
//Closing reset form
function resetFunctionClose(){
    const targetDiv = document.getElementById("reset__start");
    targetDiv.style.display = 'none';
    resetDiv.style.display = 'none';
    clearFields();
}