const elementOpen = document.getElementById("login__button");
elementOpen.addEventListener("click", functionOpen);

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

const elementClose = document.getElementById("button__close");
elementClose.addEventListener("click", functionClose);

//Closing login form
function functionClose(){
    const targetDiv = document.getElementById("login__start");
    targetDiv.style.display = 'none';
    clearFields();
}

const clearLogin = document.getElementById("login__btn");
clearLogin.addEventListener("click", hidePassword);

//Clear form panel
function clearFields(){
    document.getElementById("login__field").value = "";
    document.getElementById("password__field").value = "";
    document.getElementById("login__field__mobile").value = "";
    document.getElementById("password__field__mobile").value = "";
    document.getElementById("email__field__reset").value = "";
    document.getElementById("email__field__reset__mobile").value = "";
}

const hidePasswd = document.getElementById("eye__hide");
hidePasswd.addEventListener("click", hidePassword);
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
        passwordField.type = 'password';
    }
}