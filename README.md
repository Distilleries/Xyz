# Default Laravel project with Expendable

X.y.z is a fresh instance of laravel 4.* with Expendable package configured.
Check the require before install it.

# Installation

## Require
To use this project you have to install:

1. Php 5.5 or more
2. Active the gettext extension
3. Active mpcrypt
4. Composer (https://getcomposer.org/download/)[https://getcomposer.org/download/]
5. Sass (`gem install sass`)
6. NodeJs version 0.10.33
7. gulp in global (npm install gulp -g)


## 1.Create project
When you want create a new empty project with composer use this command:

```

composer create-project distilleries/xyz

```

If you doesn't want use composer just checkout the project and run composer install:

```

git clone https://github.com/Distilleries/Xyz.git
composer install

```

## 2.Environment and configuration

### Database and translation configuration

1. Create a file `.env and put the name of your environment (local,production,staging...).
2. Create a file `.env.ENVIRONMENT.php` (Replace ENVIRONMENT by the name put one the .env). 
If the name is production just put the name `.env.php`.


In this file put copy this configuration and replace by your value:

```php

    return[
        'database'=>[
            'host'      => 'localhost',
            'database'  => '',
            'username'  => 'root',
            'password'  => ''
        ],
        'gettext'=>[
            'default_locale'      => 'en_US',
            'default_encoding'  => 'UTF-8',

        ]
    ];
    
```

Create your database and after run the update composer:

```

composer update

```


### Vhost

Configuration your virtual host with `/public` folder in site root.


If everything was done without error you can access to the url `/admin`.
If you want to connect a the back end just run the seed command.

```
php artisan db:seed
```

After that take one user email address from the table `users` and use the password `test`.

