function validateLogin() {
    var username = document.getElementById('username').value.trim();
    var password = document.getElementById('password').value.trim();

    if (username === "jose" && password === "1234") {
        document.getElementById('loginPrompt').style.display = 'none';
        document.getElementById('registrationForm').style.display = 'block';
        return false;
    } else {
        alert("Incorrect login credentials.");
        return false;
    }
}