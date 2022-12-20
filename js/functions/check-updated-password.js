const PASSWORD_INPUT = document.getElementById("new-password");
const LOWERCASE_INDICATOR = document.getElementById("lowercase_indicator");
const UPPERCASE_INDICATOR = document.getElementById("uppercase_indicator");
const NUMBER_INDICATOR = document.getElementById("number_indicator");
const SPECIALCHAR_INDICATOR = document.getElementById("specialchar_indicator");
const MINIMUMCHAR_INDICATOR = document.getElementById("minimumchar_indicator");

PASSWORD_INPUT.addEventListener('input', checkPasswordRequirements);

const SPECIAL_CHARACTERS = /[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;

function checkPasswordRequirements(event) {
    let currentPasswordInput = event.target.value;
    let passwordValidated = true;

    if(currentPasswordInput.length > 8) {
        MINIMUMCHAR_INDICATOR.classList = "indicator--green";
    } else {
        MINIMUMCHAR_INDICATOR.classList = "indicator--red";
        passwordValidated = false;
    }

    if(/[a-z]/.test(currentPasswordInput)) {
        LOWERCASE_INDICATOR.classList = "indicator--green";
    } else {
        LOWERCASE_INDICATOR.classList = "indicator--red";
        passwordValidated = false;
    }

    if(/[A-Z]/.test(currentPasswordInput)) {
        UPPERCASE_INDICATOR.classList = "indicator--green";
    } else {
        UPPERCASE_INDICATOR.classList = "indicator--red";
        passwordValidated = false;
    }

    if(/[0-9]/.test(currentPasswordInput)) {
        NUMBER_INDICATOR.classList = "indicator--green";
    } else {
        NUMBER_INDICATOR.classList = "indicator--red";
        passwordValidated = false;
    }

    if(SPECIAL_CHARACTERS.test(currentPasswordInput)) {
        SPECIALCHAR_INDICATOR.classList = "indicator--green";
    } else {
        SPECIALCHAR_INDICATOR.classList = "indicator--red";
        passwordValidated = false;
    }

    if(passwordValidated) {
        document.getElementById("update-button").disabled = false;
    }
}
