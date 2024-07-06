### Project documentation
- php artisan install:api
- php artisan make:controller Api/AuthController
- php artisan make:controller Api/EventController
- php artisan make:resource EventResource
- php artisan make:model Event

### Port run
- php artisan serve
- php artisan serve --port=5000

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

### Some screenshot
<details>
    <summary>See project screenshot</summary>   
    <a href="#" target="_blank"><img src="Screenshots/event1.png"></a>
    <a href="#" target="_blank"><img src="Screenshots/event2.png"></a>
    <a href="#" target="_blank"><img src="Screenshots/event3.png"></a>
    <a href="#" target="_blank"><img src="Screenshots/event4.png"></a>
    <a href="#" target="_blank"><img src="Screenshots/event5.png"></a>
    <a href="#" target="_blank"><img src="Screenshots/event6.png"></a>
    <a href="#" target="_blank"><img src="Screenshots/event7.png"></a>
    <a href="#" target="_blank"><img src="Screenshots/event8.png"></a>
    <a href="#" target="_blank"><img src="Screenshots/event9.png"></a>
    <a href="#" target="_blank"><img src="Screenshots/event10.png"></a>
    <a href="#" target="_blank"><img src="Screenshots/event11.png"></a>
    <a href="#" target="_blank"><img src="Screenshots/event12.png"></a>
    <a href="#" target="_blank"><img src="Screenshots/event13.png"></a>
    <a href="#" target="_blank"><img src="Screenshots/event14.png"></a>
    <a href="#" target="_blank"><img src="Screenshots/event15.png"></a>
</details>