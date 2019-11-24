import pytest
import requests

def test_video():
	vid_url = "https://github.com/GiaQM115/CSEC380Group14/blob/master/sample_videos/Alien%20Ant%20Farm%20-%20Smooth%20Criminal.mp4?raw=true"
	vid_file = "Alien Ant Farm - Smooth Criminal.mp4"
	vid = 'abcdefghijklmnopqrstuvwxyz'
	url = "http://localhost/"
	with requests.Session() as s:
		# login
		s.post(url+"login.php", data={'username':'test','password':'test'})
		home = s.get("http://localhost/")
		assert("What do you want to watch today" in home.text)
		# upload
		s.post(url+"download.php", data={'urlToUpload':vid_url,'nameOfFile':vid})
		s.post(url+"upload.php", files={'file':open("tests/"+vid_file, 'rb')})
		# access
		view = s.get("http://localhost/videos/"+vid)
		assert(view.status_code == 200)
		view = s.get("http://localhost/videos/"+vid_file)
		assert(view.status_code == 200)
		# delete
		s.post(url+"delete.php", data={'delVid':vid})
		# final check
		view = s.get("http://localhost/videos/"+vid)
		assert(view.status_code == 404)
