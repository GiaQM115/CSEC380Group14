import pytest
import requests

URL = "127.0.0.1/login.html"

def test_login(username, password):
	global URL
	DATA = {'username':username,
					'password':password}
	return request.post(url=URL, data=DATA)

creds = "test"
creds_wrong = "t3st"

# test successful login
response = test_login(creds, creds)

# test login with incorrect password
response = test_login(creds, creds_wrong)

# test login with incorrect username
response = test_login(creds_wrong, creds)
