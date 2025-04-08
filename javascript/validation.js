document.getElementById("signupForm").addEventListener('submit',function(e) {
e.preventDefault()

const name = document.getElementById("name").value;
const phonenumber = document.getElementById("phone").value;
const email = document.getElementById("email").value;
const pass = document.getElementById("password").value;

const nameError = document.getElementById("nameError")
const numberError = document.getElementById("phoneError")
const emailError = document.getElementById("emailError")
const passError = document.getElementById("passwordError")


let isvalid = true
if (name ==="") {
    nameError.innerText="user name cannot be empty";
    isvalid=false;
}
if (phonenumber.length < 10) {
    numberError.innerText="enter a valid phone number"
    isvalid=false;
}
if (!email.includes("@") || !email.includes(".") || email==="") {
    emailError.innerText="nter a valid email address";
    isvalid=false;
}
if (pass==="" || passError.length<6) {
    passError.innerText="Enter valid pass(length must be greater than 6)";
    isvalid=false;
}
if (isvalid) {
    alert("Form submitted successfully!");
    return true;
} else {
    return false; 
}
});