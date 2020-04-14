# Stellar Development with Symfony 4
[Symfony 4](https://knpuniversity.com/screencast/symfony4)  
[Doctrine](https://symfonycasts.com/screencast/symfony-doctrine)


## Setup

**Download Composer dependencies**  
Make sure you have [Composer installed](https://getcomposer.org/download/) 
and then run:   
```
composer install
```

You may alternatively need to run `php composer.phar install`, depending
on how you installed Composer.  


**Check / update packages:**
```
composer require
```

**Install Doctrine**
```angular2html
composer require doctrine
```

**Install Maker**
```angular2html
composer require maker --dev
```

**Start the built-in web server**
```
php bin/console server:run
```

**Start local Apache web server with  MariaDB database server**
```angular2html
sudo /opt/lampp/lampp start
```

**Create doctrine database**
```angular2html
./bin/console doctrine:database:create
```



**Check all console commands**
```angular2html
php bin/console
```

## ORM - Create Database Entries
(Article table = Article class )    

### Maker-bundle
**Commands** with **maker-bundle**, see `src/Command/ArticleStatsCommand.php` and the
[Tutorial](https://symfonycasts.com/screencast/symfony-fundamentals/command-fun#play)

```angular2html
php bin/console
php bin/console make:
php bin/console make:command
```

### Creating an Entity Class
[Doctrine Annotations](https://www.doctrine-project.org/projects/doctrine-orm/en/2.7/reference/annotations-reference.html)
```angular2html
php bin/console make:entity -h
```
+ `src/Entity/Article.php`
+ `src/Repository/ArticleRepository.php`
+ Doctrine now knows, to save data to "article" table, but it doesnt exist yet.
### Database Migrations
[Doctrine Migration Bundle](https://symfony.com/doc/current/bundles/DoctrineMigrationsBundle/index.html)

Create corresponding article-tables:
```angular2html
php bin/console make:migration
```
+ `src/Migrations/Version....php`
+ holds SQL commands 

Execute migration:
```angular2html
php bin/console doctrine:migrations:migrate
php bin/console doctrine:migrations:status
```
+ migration gets `migration_versions`,to check if up-to-date
+ *dev* / *prod* separate migrations!

Example: small change in `Article.php` -> slug unique=true
```angular2html
php bin/console make:migration
php bin/console doctrine:migrations:status
php bin/console doctrine:migrations:migrate
```








## ...
