import requests

def test():
    req = requests.get("http://127.0.0.1")
    assert "Hello World" in req.text

test()
