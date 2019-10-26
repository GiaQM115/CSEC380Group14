// When the button is clicked, call the function attemptLogin()
document.getElementById("loginButton").onclick = attemptLogin;

/**
 * Sends a login attempt to the PHP backend
 * @deprecated
 */
function attemptLogin() {
    if (window.XMLHttpRequest) {
        // for modern browsers
        var xhttp = new XMLHttpRequest();
    } else {
        // we should just tell the user to get a new browser, but whatever
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xhttp.open("POST", "/", true);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    var uname = document.getElementById("usernameField").value;
    var pword = document.getElementById("passwordField").value;

    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 401) {
            document.getElementById("loginPrompt").innerHTML = "Login Failed!";
        } else if (this.readyState === 4 && this.status >= 500) {
            location.replace("/error/");
        }
    };

    // sanitize username and password
    var uname_clean = uname.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/"/g, '&quot;').replace(/>/g, '&gt;');
    var pword_clean = pword.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/"/g, '&quot;').replace(/>/g, '&gt;');
    xhttp.send("username=" + uname_clean + "&password=" + pword_clean);
}

