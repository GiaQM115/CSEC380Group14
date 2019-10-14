
// When the button is clicked (and the form is submitted), call the fuction loginAttempt()
document.getElementById("loginButton").onclick = loginAttempt;

/**
 * Sends a login attempt to the db
 */
function loginAttempt() {
  if (window.XMLHttpRequest) {
    // for modern browsers
    var xhttp = new XMLHttpRequest();
  } else {
    // we should just tell the user to get a new browswer but whatever
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.open("POST", "/login.php", true);
  xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	var uname = document.getElementById("usernameField").value;
	var pword = document.getElementById("passwordField").value;
  xhttp.onreadystatechange = function() {
		if (this.readyState === 4 && this.status === 200) {
			location.replace("/home.html");
		} else if (this.readyState === 4 && this.status === 403) {
			document.getElementById("loginPrompt").innerHTML = "Login Failed!";
		} else if (this.readyState === 4 && this.status >= 500) {
			location.replace("/error.html");
		}
	};
	xhttp.send("username="+uname+"&password="+pword);
}

