console.log("OK")

function passwordToggle() {

    inputField = document.querySelector("#inputPassword");
    lastInputFieldType = inputField.type;

    if (lastInputFieldType == 'password') {
        inputField.type = 'text'
    }else if(lastInputFieldType == 'text'){
        inputField.type = 'password'
    }
}