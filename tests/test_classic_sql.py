import pytest
import requests

def test_injection():
	url = "http://localhost/"
	with requests.Session() as s:
		# login
		s.post(url+"login.php", data={'username':'test','password':'test'})
		home = s.get("http://localhost/")
		assert("What do you want to watch today" in home.text)
		# upload
		exploit = s.post(url+"search_user.php", data={'search':"test\' OR \'1\'=\'1"})
		# check
		assert(exploit.text.find("test") != -1)	
		assert(exploit.text.find("test1") != -1)	
		assert(exploit.text.find("test2") != -1)	

