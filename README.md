# AlbelliAssignment

This project was created to follow the assignment tasks

This repository contains Two project:
- Symfony project in the root directory
- react project in ./client

For the docker configuration:
- everything related to symfony docker is inside ./docker
- everything related to react docker is inside ./client

To build and run the containers :
- Run ### `docker-compose up -d --build`
- you will have two urls accessible `127.0.0.1:80` for the frontend and `127.0.0.1:8080` for the backend

To set up the database, load fixture , install symfony libraries :
- Run ### `docker exec -it php make install-dev-first --keep-going --ignore-errors`

Backend Tests are under ./tests folder
- Manager folder for Manager unitTests
- Service folder for Service unitTests
- Integration folder for Managers and Services integration Tests

Apis:
- advertisement list `/api/advertisements` with methode GET
- advertisement get by ID `/api/advertisements/{id}` with methode GET
- advertisement delete by ID `/api/advertisements/{id}` with methode DELETE
- advertisement update by ID `/api/advertisements/{id}` with methode PUT