// Check with the server to see if we aren't logged in
window.onload = function () {
    xhttp.open("GET", "/login.php", true);
    xhttp.send();
};
