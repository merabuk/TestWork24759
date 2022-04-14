# TestWork24759
1. Проект содержит базу данных из двух таблиц со связью многие ко многим;
2. Работа с базой должна осуществляться через паттерн репозиторий;
3. Необходимо реализовать простую аутентификацию через ключ (не используя доп. пакеты passport, jwt etc.);
4. API должно предоставлять доступ к данным с возможностью сортировки и поиску по нескольким полям;
5. В процессе работы с данными необходимо использовать атрибут pivot для моделей и включить его в запросы по поиску.

## Установка

1. Клонировать репозиторий: `git clone git@github.com:merabuk/TestWork24759.git`
2. Перейти в репозиторий: `cd TestWork24759`
3. Установить зависимости composer: `composer install`
4. Создать файл .env в корне приложения: `cp .env.example .env` 
5. Настроить .env файл (URL, база данных) + создать БД и пользователя БД 
6. Сгенерировать ключ приложения: `php artisan key:generate`
7. Запустить миграции БД: `php artisan migrate:fresh --seed`
9. Почистить кеш: `php artisan optimize:clear`


# TestWork24759
1. The project contains a database of two tables with a connection with many to many;
2. Working with the base should be carried out through the pattern of the Repository;
3. It is necessary to implement simple authentication through the key (without using additional packages Passport, JWT etc.);
4. The API should provide access to data with the ability to sort and search for several fields;
5. In the process of working with data, you must use the Pivot attribute for models and enable it in search queries.

## Installation

1. Cloning Repository: `git clone git@github.com:merabuk/TestWork24759.git`
2. Go to repository: `cd TestWork24759`
3. Set Composer dependencies: `composer install`
4. Create .Env file at the root of the application: `cp .env.example .env`
5. Configure .env file (URL, database) + Create a database and database user
6. Generate the key key: `php artisan key:generate`
7. Run the database migration: `php artisan migrate:fresh --seed`
8. Clean the cache: `php artisan optimize:clear`
