# BrickFlix

A free video-sharing platform built and maintained by Group 14.<br>
Much better than ~~NoobTube~~ YouTube will ever be.


## How To Work
```
cd docker
docker-compose up --build
```
This will make the webserver run at http://localhost

## Components
### docker
This is where the components for the webserver to work are located. There is a dockerfile for a php apache server and and mariadb database

### documentation
This is where questions and videos are located for each Step

### tests
This is where all the tests are that is ran by Travis CI using pytest
