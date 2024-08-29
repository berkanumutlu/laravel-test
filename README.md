<p align="center"><a href="https://laravel.com" target="_blank" rel="nofollow"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://laravel.com/docs/10.x" target="_blank" rel="nofollow"><img src="https://img.shields.io/badge/Laravel-v10.48.12-FF2D20?logo=laravel&logoColor=white&labelColor=FF2D20" alt="Laravel Version"></a>
<a href="https://www.php.net/releases/8_1_23.php" target="_blank" rel="nofollow"><img src="https://img.shields.io/badge/PHP-v8.1.23-777BB4?logo=php&logoColor=white&labelColor=777BB4" alt="PHP Version"></a>
<a href="https://dev.mysql.com/doc/relnotes/mysql/5.7/en/news-5-7-43.html" target="_blank" rel="nofollow"><img src="https://img.shields.io/badge/MySQL-v5.7.43-F29111?logo=mysql&logoColor=white&labelColor=00758F" alt="MySQL Version"></a>
<a href="https://nginx.org" target="_blank" rel="nofollow"><img src="https://img.shields.io/badge/nginx-v1.25.5-009639?logo=nginx&logoColor=white&labelColor=009639" alt="nginx Version"></a>
<a href="https://redis.io/docs/latest/embeds/r7-breaking-changes" target="_blank" rel="nofollow"><img src="https://img.shields.io/badge/Redis-v7.0.5-FF4438?logo=redis&logoColor=white&labelColor=FF4438" alt="Redis Version"></a>
<a href="https://getcomposer.org" target="_blank" rel="nofollow"><img src="https://img.shields.io/badge/Composer-v2.6.5-885630?logo=composer&logoColor=white&labelColor=885630" alt="Composer Version"></a>
<a href="https://www.docker.com" target="_blank" rel="nofollow"><img src="https://img.shields.io/badge/Docker-v4.25.0-2496ED?logo=docker&logoColor=white&labelColor=2496ED" alt="Docker Version"></a>
<a href="https://github.com/berkanumutlu/laravel-example-app/blob/master/LICENSE" target="_blank" rel="nofollow"><img src="https://img.shields.io/github/license/berkanumutlu/laravel-example-app" alt="License"></a>
</p>

# Laravel Test Project

It is a project where document information about Laravel is used with simple examples.

## Installation

### global

```sh
$ docker-compose up
$ docker ps
$ docker exec -it {PHP8_CONTAINER_ID} bash
```

```sh
$ composer global require laravel/installer
```

```sh
$ composer global about
# Changed current directory to /root/.composer
# Composer - Dependency Manager for PHP - version 2.6.5
# Composer is a dependency manager tracking local dependencies of your projects and libraries.
# See https://getcomposer.org/ for more information.
```

```sh
$ export PATH="/root/.composer/vendor/bin:$PATH"
```

```sh
$ laravel new laravel-test
```

```sh
$ cd laravel-test
$ php artisan serve
```

### local

Clone the project and execute below command.

```sh
$ composer install
$ docker-compose up -d
```