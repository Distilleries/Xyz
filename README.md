#Default Laravel project with Expendable

X.y.z is a fresh instance of laravel 5.* with Expendable package configured.
Check the require before install it.


##Table of contents
1. [Require](#require)
1. [Installation](#installation)
    1. [Create project](#1-create-project)
    1. [Environment and configuration](#2-environment-and-configuration)
        1. [Database and translation configuration](#database-and-translation-configuration)
        1. [Vhost](#vhost)


##Require
To use this project you have to install:

1. Php 5.5 or more
3. Active mpcrypt
4. Composer (https://getcomposer.org/download/)[https://getcomposer.org/download/]
5. Sass (`gem install sass`)
6. NodeJs version 0.10.33
7. gulp in global (npm install gulp -g)

    
##Installation


###1.Create project
When you want create a new empty project with composer use this command:

```ssh
composer create-project distilleries/xyz
```

If you doesn't want use composer just checkout the project and run composer install:

```ssh
git clone https://github.com/Distilleries/Xyz.git
composer install
```

###2.Environment and configuration

#### Database and translation configuration

1. Edit `.env` file and put the name of your environment (local,production,staging...).
1. Edit `.env` add your database ocnfiguration.


Create your database and after run the update composer:

```

composer update

```


####Vhost

Configuration your virtual host with `/public` folder in site root.


If everything was done without error you can access to the url `/admin`.
If you want to connect a the back end just run the seed command.

```
php artisan db:seed
```

After that take one user email address from the table `users` and use the password `test`.

