<p align="center"><a href="https://laravel.com" target="_blank" rel="nofollow"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://laravel.com/docs/10.x" target="_blank" rel="nofollow"><img src="https://img.shields.io/badge/Laravel-v10.28.0-FF2D20?logo=laravel&logoColor=white&labelColor=FF2D20" alt="Laravel Version"></a>
<a href="https://www.php.net/releases/8_1_23.php" target="_blank" rel="nofollow"><img src="https://img.shields.io/badge/PHP-v8.1.23-777BB4?logo=php&logoColor=white&labelColor=777BB4" alt="PHP Version"></a>
<a href="https://getcomposer.org" target="_blank" rel="nofollow"><img src="https://img.shields.io/badge/Composer-v2.6.5-885630?logo=composer&logoColor=white&labelColor=885630" alt="Composer Version"></a>
<a href="https://www.docker.com" target="_blank" rel="nofollow"><img src="https://img.shields.io/badge/Docker-v4.25.0-2496ED?logo=docker&logoColor=white&labelColor=2496ED" alt="Docker Version"></a>
<a href="https://github.com/berkanumutlu/laravel-example-app/blob/master/LICENSE" target="_blank" rel="nofollow"><img src="https://img.shields.io/github/license/berkanumutlu/laravel-example-app" alt="License"></a>
</p>

# Laravel Test Project

# Installation

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
