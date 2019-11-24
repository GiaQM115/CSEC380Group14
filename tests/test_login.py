import pytest
import requests

LOGIN = "http://localhost/login.php"
HOME = "http://localhost/home.php"

def login(username, password):
	global LOGIN
	global DASH
	DATA = {'username':username,'password':password}
	with requests.Session() as s:
		req = s.post(LOGIN, data=DATA)
		auth_req = s.get(HOME)
		return "What do you want to watch today" in auth_req.text

def test_login():
	creds = "test"
	creds_wrong = "t3st"

	# test successful login
	assert login(creds, creds) == True

	# test login with incorrect password
	assert login(creds, creds_wrong) == False

	# test login with incorrect username
	assert login(creds_wrong, creds) == False
