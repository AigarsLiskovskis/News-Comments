# News-Comments

News app with many articles, that can be sorted in categories and by writer. Viewers can add comments if they like.
Registered users can add new articles as also edit or delete old articles.
Based on Laravel framework.

## Installation

Clone this repository, install the dependencies, and create .env file.

```
git clone git@github.com:AigarsLiskovskis/News-Comments.git
composer install
cp .env.example .env
```

Then create the necessary database.

```
create database news_comments
```

Configure .env to connect your database.

And run the initial migrations and seeders.

```
php artisan migrate --seed
```
