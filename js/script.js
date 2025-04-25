window.onload = function () {
    var rememberedUsername = localStorage.getItem('rememberedUsername');
    var rememberedPassword = localStorage.getItem('rememberedPassword');
    
    if (rememberedUsername && rememberedPassword) {
        document.getElementById('username').value = rememberedUsername;
        document.getElementById('password').value = rememberedPassword;
        document.getElementById('remember').checked = true;
    }
};
function forgotPassword() {
    var username = prompt('Enter your username to initiate password recovery:');
    if (username) {
        alert('Password recovery initiated for ' + username + '. Check your email for instructions.');
    }
}
const emailfield = document.getElementById("username")
const emailRegex=/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
const button= document.getElementById("button")
const passwordfield = document.getElementById("password")
const passwordRegex= /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[!#$%&?_"]).{8,}$/;
button.addEventListener("click", function(e) {
    if (emailfield.value===""){
        e.preventDefault()
        alert("Fill out this field")
        emailfield.style.borderColor="red";
    } else if (!emailRegex.test(emailfield.value)){
        alert("Invalid input format")
        emailfield.style.borderCcolor="red"; 
    } else if (passwordfield.value===""){
        alert("Fill out this field")
        passwordfield.style.borderColor="red";
    } else if (!passwordRegex.test(passwordfield.value)){
        alert("Invalid input format")
        passwordfield.style.borderColor="red";
    } else {
        emailfield.style.borderColor= "green";
        passwordfield.style.borderColor="green";
    }
})