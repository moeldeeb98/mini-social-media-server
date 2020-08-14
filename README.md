## Mini Social Media webservice
this service provides endpoints for mini social media website 
supports the following endpoints
- [POST] /api/register (user registration)
- [POST] /api/login (user login)
- [GET] /api/posts (get all available posts)
- [GET] /api/timeline (get all posts that posted by the user how request)
- [POST] /api/posts (store post by providing 'desc' of the post in the body of the request)

### To Run this service
you have to follow the following instruction:

- install laravel 7.X 
- run "php artisan install" to install all required packages
- run "php artisan migrate" to create the database
- run "php artisan passport:install" to create a key for that server to use tokens
- run "php artisan serve" to start the server

