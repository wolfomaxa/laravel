# laravel
1. Clone 

2. Greate .env 
example: 
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:rkU7aV+F99tV/rIW/GMGWMQD++a3zv+WptE2jnAMcJM=
APP_DEBUG=true
APP_LOG_LEVEL=debug
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel // меняем на свою базу
DB_USERNAME=root // на пользователя БД
DB_PASSWORD= // прописуем пароль 

BROADCAST_DRIVER=log
CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_DRIVER=sync

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
2. artisan migrate:refresh --seed
