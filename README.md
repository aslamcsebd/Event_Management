### Project documentation

- php artisan install:api
- php artisan make:model Api/EventController
- php artisan make:controller Event
- php artisan make:resource EventResource

## Api CRUD
- Show all event      : (get) => http://127.0.0.1:8000/api/events
- Add event           : (post) => http://127.0.0.1:8000/api/events
- Show specific event : (get) => http://127.0.0.1:8000/api/events/5
- Update event        : (put) => http://127.0.0.1:8000/api/events/6
- Delete event        : (delete) => http://127.0.0.1:8000/api/events/6
