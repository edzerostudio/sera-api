<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Sera API

Sera API is a Simple API for completing the Sera Backend Test Requirements

https://docs.google.com/document/d/1J8E68pOxGRdk9giDO-WumqAitl2QwClHUdjTPNDEIiA/edit?usp=sharing

## How To

#### If you don't use [sera-api-docker](https://github.com/edzerostudio/sera-api-docker)  
Prepare your local mysql and mongodb database and configure .env file,  
then run this command:  
`npm install`  
`npm run dev`  
`php artisan migrate`  
`php artisan serve`  

Your application will be running in `http://localhost:8000`

#### If you use [sera-api-docker](https://github.com/edzerostudio/sera-api-docker) 
Clone this project to:  
`sera-api-docker/src`  

Rename `.env.docker` to `.env`,  
Then run this command:  
`docker-compose build`  
`docker-compose up`  
`docker-compose exec php php artisan migrate`

Your application will be running in `http://localhost:8000`  
Your mysql server will be running in `http://localhost:8085`  
Your mongodb server will be running in `http://localhost:8081`  

## Endpoints

### Auth
```
(POST) /api/auth/login
{
    "email": "example@email.com",
    "password": "secret",
}
```
```
(POST) /api/auth/register
{
    "name": "John Doe",
    "email": "example@email.com",
    "password": "secret",
}
```
```
(POST) /api/auth/logout
```
```
(POST) /api/auth/refresh
```

### Regres
```
(POST) /api/regres/login
{
    "email": "example@email.com",
    "password": "secret",
}
```
```
(POST) /api/regres/register
{
    "name": "John Doe",
    "email": "example@email.com",
}
```

### Data Filter
```
(GET) /api/filter
[
    "50000",
    "75000",
    "100000",
    "150000",
    "200000"
]
```
### Articles (Firebase)
```
(GET) /api/articles
{
    "status": "success",
    "data": {
        "articles": {
            "my-first-article": {
                "body": "Lorem ipsum dolor sit amet",
                "slug": "my-first-article",
                "title": "This is my first article"
            },
            "my-second-article": {
                "body": "Lorem ipsum dolor sit amet",
                "slug": "my-second-article",
                "title": "This is my second article"
            },
        },
        "articlesCount": 2
    }
}
```
```
(GET) /api/articles/{slug}
{
    "status": "success",
    "article": {
        "body": "Lorem ipsum dolor sit amet",
        "slug": "my-first-article",
        "title": "This is my first article"
    }
}
```
```
(POST) /api/articles
{
    "title": "First Article",
    "body": "This is not my first article.",
    "slug": "first-blog-post"
}
```
```
(PUT) /api/articles/{slug}
{
    "title": "First Article",
    "body": "This is not my first article.",
    "slug": "first-blog-article"
}
```
```
(DELETE) /api/articles/{slug}
```

### Posts (Mongo)
```
(GET) /api/posts
{
    "posts": {
        "my-first-post": {
            "body": "Lorem ipsum dolor sit amet",
            "slug": "my-first-post",
            "title": "This is my first post"
        },
        "my-second-post": {
            "body": "Lorem ipsum dolor sit amet",
            "slug": "my-second-article",
            "title": "This is my second post"
        },
    },
    "postsCount": 2
}
```
```
(GET) /api/posts/{slug}
{
    "post": {
        "body": "Lorem ipsum dolor sit amet",
        "slug": "my-first-post",
        "title": "This is my first post"
    }
}
```
```
(POST) /api/posts
{
    "title": "First post",
    "body": "This is not my first post.",
    "slug": "first-blog-post"
}
```
```
(PUT) /api/posts/{slug}
{
    "title": "First Post",
    "body": "This is not my first post.",
    "slug": "first-blog-post"
}
```
```
(DELETE) /api/posts/{slug}
```
## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
