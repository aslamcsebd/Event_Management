### Project documentation

- php artisan install:api
- php artisan make:model Api/EventController
- php artisan make:controller Event
- php artisan make:resource EventResource

### Api Auth CRUD
- Register          : (post) => http://127.0.0.1:8000/api/register?name=Aslam&email=aslam@gmail.com&password=123456
- Login             : (post) => http://127.0.0.1:8000/api/login?email=aslam@gmail.com&password=123456

- Bellow carry      : (Bearer token)
- Profile           : (get) => http://127.0.0.1:8000/api/profile
- Logout            : (get) => http://127.0.0.1:8000/api/logout

### Api event CRUD
- Show all event      : (get) => http://127.0.0.1:8000/api/events
- Add event           : (post) => http://127.0.0.1:8000/api/events
- Show specific event : (get) => http://127.0.0.1:8000/api/events/5
- Update event        : (put) => http://127.0.0.1:8000/api/events/6
- Delete event        : (delete) => http://127.0.0.1:8000/api/events/6

### Blade file create & command
- composer require laravel/breeze --dev
- php artisan breeze:install

- Bellow file use api route 
- Event add
- Event view
- Event edit
- Event delete