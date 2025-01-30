function validateLoginForm() {
    var username = document.getElementById('username').value.trim();
    var password = document.getElementById('password').value.trim();

    if (username === "" || password === "") {
        alert("Please enter both username and password.");
        return false; 
    }

    // Simulating password validation (update this logic later with backend authentication)
    if (username !== "joseph" || password !== "00005") {
        alert("Incorrect username or password. Please try again.");
        return false; 
    }

    return true; 
}
