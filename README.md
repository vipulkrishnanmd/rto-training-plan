# Training plan application for a Registered Training Institute
This is a small application made for creating training plans for an RTO.

RTO's usually run short term courses where students can enrol throughout the year.

Trainers go through the course units as a cycle continuously and students start with the units which are currently being taught. So, every student has a customised training plan based on the time they join.

This application helps to generate the customised training plan from a common template.

The backend of the application is written in PHP without using any framework. On the front-end, it has both PHP generated pages as well as an Angular app. The Angular appis the main application page where the user can interactively create the training plan. 

The application is dockerized. `docker-compose up` command can start application.
