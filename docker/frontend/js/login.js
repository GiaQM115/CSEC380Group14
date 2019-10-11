// When the button is clicked (and the form is submitted), call the fuction loginAttempt()
document.getElementById("loginButton").onclick = loginAttempt();

/**
 * Sends a login attempt to the backend
 */
function loginAttempt() {
	console.log("bla bla bla")
  if (window.XMLHttpRequest) {
    // for modern browsers
    var xhttp = new XMLHttpRequest();
  } else {
    // we should just tell the user to get a new browswer but whatever
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.open("POST", "../../backend/login.php", false);
  xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	var uname = document.getElementById("usernameField").textContent;
	var pword = document.getElementById("passwordField").textContent;
	console.log("Sending username="+uname+"&password="+pword+" with content length: ");
  xhttp.send("username="+uname+"&password="+pword);
  xhttp.onreadystatechange = redirectUser();
}

/**
 * Based on the response from the server, redirect the user to appropraite page
 * If user is authenticated, redirect to the home page
 * If not, reload the login page with "Login Failed"
 */
function redirectUser() {
  if (this.readyState === 4 && this.status === 302) {
		// successful authentication
		location.replace("../home.html");
  } else if (this.readyState !== 4) {
		//pass
	} else {
		// failed authentication
		document.getElementById("loginPrompt").innerHTML = "Login Failed: "+this.responseText;
		document.getElementById("usernameField").placeholder = "Enter Username";
		document.getElementById("passwordField").placeholder = "Enter Password";
	}
}
