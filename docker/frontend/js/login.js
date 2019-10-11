// When the button is clicked (and the form is submitted), call the fuction loginAttempt()
document.getElementById("loginButton").onclick = loginAttempt();

/**
 * Sends a login attempt to the backend
 */
function loginAttempt() {
  if (window.XMLHttpRequest) {
    // for modern browsers
    var xhttp = new XMLHttpRequest();
  } else {
    // we should just tell the user to get a new browswer but whatever
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP")
  }
  // what file am i sending this too?
  xhttp.open("POST", "", false);
  xhttp.setRequestHeader("Content-type:" "application/x-www-form-urlencoded")
  // what are the param names necessary?
  xhttp.send("");
  xhttp.onreadystatechange = redirectUser();
}

/**
 * Based on the response from the server, redirect the user to appropraite page
 * If user is authenticated, redirect to the home page
 * If not, reload the login page with "Login Failed"
 */
function redirectUser() {
  if (this.readyState == 4 && this.status == 200) {
    var auth = this.responseText;
  }
  // what will the response be for authenticated users and failed auth?
  // failed authentication
  if auth == false {
    document.getElementById("loginPrompt").innerHTML = "Login Failed!"
	document.getElementById("loginForm").action = ""
  }
}
