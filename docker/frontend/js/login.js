
// When the button is clicked (and the form is submitted), call the fuction loginAttempt()
document.getElementById("loginButton").onclick = loginAttempt;

/**
 * Sends a login attempt to the backend
 */
function loginAttempt() {
  if (window.XMLHttpRequest) {
    // for modern browsers
    var xhttp = new XMLHttpRequest();
  } else {
    // we should just tell the user to get a new browswer but whatever
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.open("POST", "login.php", true);
  xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	var uname = document.getElementById("usernameField").value;
	var pword = document.getElementById("passwordField").value;
  xhttp.onreadystatechange = redirectUser();
}

/**
 * Based on the response from the server, redirect the user to appropraite page
 * If user is authenticated, redirect to the home page
 * If not, reload the login page with "Login Failed"
 */
function redirectUser() {
	var code = 200;
	if (code == 200) {
		location.replace("home.html")
	} else {
		document.getElementById("loginPrompt").innerHTML = "Login Failed!"
	}
}

